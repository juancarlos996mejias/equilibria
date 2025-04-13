<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Mostrar el formulario de checkout
    public function index()
    {
        $cart = session('cart', []);
    
        // Calcular el total del carrito
        $total = collect($cart)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });
    
        return view('checkout.index', compact('cart', 'total'));
    }
    

    // Procesar la compra
    public function process(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:500',
        ]);

        // Obtener el carrito desde la sesión
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('catalogo')->with('error', 'El carrito está vacío.');
        }

        // Calcular el total
        $total = collect($cart)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });

        // Crear la orden
        $order = Order::create([
            'nombre'    => $request->input('nombre'),
            'correo'    => $request->input('correo'),
            'telefono'  => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'total'     => $total,
        ]);

        // Crear los items del pedido
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'        => $order->id,
                'producto_nombre' => $item['nombre'],
                'cantidad'        => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
        }

        // Limpiar el carrito
        Session::forget('cart');

        // Redirigir con mensaje de éxito
        return redirect()->route('checkout.confirmacion')->with('success', '¡Compra realizada con éxito!');
        ;
    }


    public function confirmacion()
{
    return view('checkout.confirmacion');
}

}
