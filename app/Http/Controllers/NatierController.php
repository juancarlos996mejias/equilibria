<?php

namespace App\Http\Controllers;
use App\Models\Brand;

use Illuminate\Http\Request;

class NatierController extends Controller
{
    public function index()
{
    $brands = Brand::all(); // aquí obtienes los datos
    return view('natier', compact('brands')); // aquí los pasas a la vista
}

}
