<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
{
    $productos = Producto::paginate(12); // Mostramos 12 productos por página
    return view('catalogo', compact('productos'));
}
}

