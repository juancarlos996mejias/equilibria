@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Carrusel de imágenes -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/5.jpg') }}" class="d-block w-100 img-carousel" alt="Salud y Bienestar">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/2.jpg') }}" class="d-block w-100 img-carousel" alt="Nutrición Balanceada">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/4.jpg') }}" class="d-block w-100 img-carousel" alt="Energía y Vitalidad">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
<div class="container mt-5">
    <!-- Banner principal -->
    <div class="jumbotron text-center bg-light py-5">
        <h1 class="display-4 text-success">Bienvenido a Equilibria</h1>
        <p class="lead text-muted">Suplementos dietéticos para un estilo de vida saludable</p>
          <a href="{{ route('shop') }}" class="btn btn-success btn-lg">Ver Productos</a>
    </div>

    <!-- Sección de destacados -->
    <div class="row text-center">
        <div class="col-md-4">
            <img src="{{ asset('images/proteinaNaturales.jpeg') }}" class="img-fluid rounded" alt="Proteína Natural">
            <h3 class="mt-3 text-success">Proteína Natural</h3>
            <p class="text-muted">Ideal para el crecimiento muscular y recuperación.</p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/vitaminasMinerales.jpeg') }}" class="img-fluid rounded" alt="Vitaminas y Minerales">
            <h3 class="mt-3 text-success">Vitaminas y Minerales</h3>
            <p class="text-muted">Refuerza tu sistema inmunológico y bienestar.</p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/batidos.jpeg') }}" class="img-fluid rounded" alt="Batidos Nutritivos">
            <h3 class="mt-3 text-success">Batidos Nutritivos</h3>
            <p class="text-muted">Opciones saludables y deliciosas para tu día.</p>
        </div>
    </div>

    <!-- Sección de beneficios -->
    <div class="row mt-5">
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <h2 class="text-success">Por qué elegirnos</h2>
                <ul class="text-muted">
                    <li>Productos 100% naturales</li>
                    <li>Envío rápido y seguro</li>
                    <li>Garantía de satisfacción</li>
                    <li>Asesoramiento nutricional</li>
                </ul>
               <!--  <a href="{{ route('about') }}" class="btn btn-outline-success">Más información</a>-->
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/vidaSaludable.jpeg') }}" class="img-fluid rounded" alt="Vida Saludable">
        </div>
    </div>
</div>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.me/+5491131770011" target="_blank" class="whatsapp-float">
    <img src="{{ asset('images/whatsap.png') }}" alt="WhatsApp" width="90">
</a>

<style>
    .whatsapp-float {
        position: fixed;
        bottom: 40px;
        right: 40px;
    }

    .img-producto {
        max-height: 250px !important;
        object-fit: contain !important;
        width: auto !important;
        max-width: 100% !important;
    }

    .img-carousel {
    
        max-height: 300px !important;
        object-fit: cover !important;
        width: 100vw !important;
    }
    
    .carousel-inner .carousel-item img {
        display: block;
        width: 100%;
        height: auto;
    }

    .img-producto {
        max-height: 250px;
       
        width: 200%;
    }
</style>

<!-- Footer -->
<footer class="bg-light text-dark mt-5 py-5 border-top w-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center text-md-start">
                <h5 class="text-success">Equilibria</h5>
                <p class="text-muted">Tu tienda de confianza en suplementos y bienestar.</p>
            </div>
            <div class="col-md-4 text-center">
                <h5 class="text-success">Enlaces Útiles</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-dark">Sobre Nosotros</a></li>
                    <li><a href="#" class="text-dark">Tienda</a></li>
                    <li><a href="#" class="text-dark">Contacto</a></li>
                    <li><a href="#" class="text-dark">Política de Privacidad</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center text-md-end">
                <h5 class="text-success">Síguenos</h5>
                <a href="#" class="text-dark me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-dark me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-dark me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-dark"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
        <div class="text-center mt-3 border-top pt-3">
            <p class="mb-0">&copy; 2025 Equilibria. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>





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
