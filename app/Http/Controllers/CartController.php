<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index'); // Debe apuntar a resources/views/cart/index.blade.php
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    




}


