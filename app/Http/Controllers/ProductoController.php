<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('shop'); // Asegúrate de que la vista existe en resources/views/shop.blade.php
    }
}

