<?php

namespace App\Http\Controllers;
use App\Models\Brand; // Importa el modelo Brand

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show($brand = null)
    {
        $brands = Brand::all(); // o el método que estés usando para obtener tus productos
        return view('natier', compact('brands'));
    }
    
}


