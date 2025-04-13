<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function addToCart(Request $request)
    {
        $producto = [
            'id' => $request->id,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'imagen' => $request->imagen,
            'cantidad' => 1,
        ];

        $cart = session()->get('cart', []);

        if (isset($cart[$producto['id']])) {
            $cart[$producto['id']]['cantidad']++;
        } else {
            $cart[$producto['id']] = $producto;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Producto agregado al carrito');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Producto eliminado del carrito.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $newQuantity = (int) $request->input('quantity');

            if ($newQuantity > 0) {
                $cart[$id]['cantidad'] = $newQuantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart')->with('success', 'Cantidad actualizada correctamente.');
    }
}
