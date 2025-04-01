<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function show() {
        return view('contact');
    }

    public function send(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        Mail::to('tuemail@dominio.com')->send(new ContactMail($request->all()));

        return redirect()->route('contact')->with('success', 'Mensaje enviado correctamente.');
    }
}

