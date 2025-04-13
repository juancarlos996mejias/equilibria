@extends('layouts.app')

@section('content')
<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-5 text-center rounded-4 animate__animated animate__fadeIn" style="max-width: 600px; background: linear-gradient(135deg, #ffffff, #f0fff0); border: none;">
        <img src="{{ asset('images/compra.webp') }}" alt="Compra confirmada" class="img-fluid mb-4" style="max-width: 150px;">

        <h2 class="mb-3 text-success"><i class="fas fa-check-circle me-2"></i>¡Gracias por tu compra!</h2>

        <p class="lead">Tu pedido ha sido registrado con éxito. En breve te enviaremos un correo con los detalles y la confirmación.</p>

        <a href="{{ route('catalogo') }}" class="btn btn-outline-success mt-4">
            <i class="fas fa-arrow-left me-2"></i> Volver al catálogo
        </a>
    </div>
</div>
@endsection
