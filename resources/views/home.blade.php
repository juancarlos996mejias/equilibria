@extends('layouts.app')

@section('content')

<!-- Banner principal -->
<div class="container mt-5">
    <div class="bg-light p-5 rounded-4 text-center shadow-sm">
        <h1 class="titulo">Bienvenido a</h1>
        <!-- <img src="{{ asset('images/logoEquilibriaOriginal.png') }}" class="img-fluid my-3" alt="Proteína Natural" width="250"> -->
        <section class="video-section">
            <video autoplay muted loop playsinline class="video-background"style="width:100%; height:auto;">
                <source src="{{asset('videos/mi-video.mp4')}}" type="video/mp4">
            </video>
        </section>

        <p class="titulo mt-4">Suplementos dietéticos para un estilo de vida saludable</p>
        <a href="{{ route('catalogo') }}" class="btn btn-equilibria btn-lg px-4">Ver Productos</a>
    </div>
</div>



<!-- Productos destacados -->
<div class="container my-5">
    <h2 class="titulo text-center mb-4">Nuestros Productos Estrella</h2>
    <div class="row g-4">
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/proteinaNaturales.jpeg') }}" class="img-fluid rounded shadow-sm product-hover" alt="Proteína Natural">
            <h4 class="tituloh4 mt-3">Mas vendidos</h4>
            <p class="text-muted">Ideal para el crecimiento muscular y recuperación.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/vitaminasMinerales.jpeg') }}" class="img-fluid rounded shadow-sm product-hover" alt="Vitaminas y Minerales">
            <h4 class="tituloh4 mt-3">Combos</h4>
            <p class="text-muted">Refuerza tu sistema inmunológico y bienestar.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/batidos.jpeg') }}" class="img-fluid rounded shadow-sm product-hover" alt="Batidos Nutritivos">
            <h4 class="tituloh4 mt-3">Ofertas</h4>
            <p class="text-muted">Opciones saludables y deliciosas para tu día.</p>
        </div>
    </div>
</div>

<!-- Beneficios -->
<div class="container my-5">
    <div class="row align-items-center g-4">
        <div class="col-md-6">
            <h2 class="titulo ">¿Por qué elegirnos?</h2>
            <ul class="list-unstyled text-muted mt-3 fs-5">
                <li><i class="fas fa-check-circle text-success me-2"></i> Productos 100% naturales</li>
                <li><i class="fas fa-shipping-fast text-success me-2"></i> Envío rápido y seguro</li>
                <li><i class="fas fa-thumbs-up text-success me-2"></i> Garantía de satisfacción</li>
                <li><i class="fas fa-user-md text-success me-2"></i> Asesoramiento nutricional</li>
            </ul>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/vidaSaludable.jpeg') }}" class="img-fluid rounded shadow-sm product-hover" alt="Vida Saludable">
        </div>
    </div>
</div>










<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection