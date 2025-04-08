@extends('layouts.app')

@section('content')


<div class="hero-nosotros text-center">
    <div class="container">
    <h1 class="tituloPrincipal">Bienvenidos a Equilibria</h1>
        <p class="leadtitulo">Tu espacio para el bienestar y la nutrición natural</p>
        <img src="{{ asset('images/about.avif') }}" alt="Nosotros Equilibria" class="img-fluid rounded shadow mt-4" style="max-height: 300px;">
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h2 class="text-azul">¿Quiénes somos?</h2>
            <p class="lead">
                En <strong>Equilibria</strong> creemos en el poder de la nutrición natural como camino hacia una vida más saludable.
                Ofrecemos una amplia variedad de suplementos dietéticos de calidad premium, seleccionados cuidadosamente
                para apoyar tu bienestar físico y mental.
            </p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/equipo.jpeg') }}" alt="Nutrición Natural" class="img-fluid rounded shadow">
        </div>
    </div>

    <div class="row align-items-center seccion-mision py-4 px-2 rounded">
        <div class="col-md-6 order-md-2">
            <h2 class="text-azul">Nuestra Misión</h2>
            <p class="lead">
                Inspirar y empoderar a las personas a mejorar su calidad de vida a través de productos dietéticos naturales,
                accesibles y confiables, acompañados siempre por un enfoque humano, consciente y respetuoso con el cuerpo.
            </p>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="{{ asset('images/mision.jpeg') }}" alt="Misión Equilibria" class="img-fluid rounded shadow">
        </div>
    </div>
</div>
@endsection

