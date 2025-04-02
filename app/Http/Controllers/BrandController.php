<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show($brand = null)
    {
        if (!$brand) {
            return redirect()->route('home'); // Redirigir si no hay marca seleccionada
        }

        return view('brands.show', compact('brand'));
    }
}


