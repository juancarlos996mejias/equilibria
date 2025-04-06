<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function catalogo()
{
    $productos = Producto::all();
    return view('catalogo', compact('productos'));
}
}

