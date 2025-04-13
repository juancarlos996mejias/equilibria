<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
{
    $cart = session('cart', []);
    $total = collect($cart)->sum(fn($item) => $item['precio'] * $item['cantidad']);
    
    return view('checkout.index', compact('cart', 'total'));
}

    public function process(Request $request)
    {
        // Validación de datos si es necesario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'direccion' => 'required|string|max:255',
        ]);

        // Simulación de procesamiento de pedido (guardado en DB, envío, etc.)

        session()->forget('cart'); // Vacía el carrito

        return redirect()->route('home')->with('success', '¡Pedido realizado con éxito!');
    }
}
