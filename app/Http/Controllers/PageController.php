<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function about() {
        return view('about');
    }

    public function brands() {
        return view('natier');
    }

    public function contact() {
        return view('contact');
    }

    public function catalogo() {
        return view('catalogo');
    }
 
}

