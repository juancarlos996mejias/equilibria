@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
<div class="container mt-5">
    <div class="row align-items-center">
        <!-- Imagen representativa -->
        <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('images/contacto.avif') }}" class="img-fluid rounded shadow-lg" alt="Contacto Equilibria">
        </div>
        
        <!-- Formulario de contacto -->
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h2 class="text-success text-center">Contáctanos</h2>
                <p class="text-muted text-center">¿Tienes preguntas? Envíanos un mensaje y te responderemos pronto.</p>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea name="message" id="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-equilibria w-100">
                            <i class="bi bi-envelope"></i> Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        background: #ffffff;
    }
</style>
@endsection
