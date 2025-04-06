@extends('layouts.app')

@section('title', 'Catálogo de Productos - Natier')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-success">Catálogo de Productos</h1>
    <div class="row mt-4">
    @foreach($brands as $brand)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="zoom-container">
                        <img src="{{ asset('images/'.$producto->imagen) }}" class="card-img-top img-fluid zoom-img" alt="{{ $producto->nombre }}">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">{{ $producto->nombre }}</h5>
                        <p class="text-muted">{{ Str::limit($producto->descripcion, 50) }}</p>
                        <p class="text-primary fw-bold">${{ number_format($producto->precio, 2) }}</p>
                        <a href="{{ route('producto.detalle', $producto->id) }}" class="btn btn-outline-success">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .zoom-container {
        overflow: hidden;
        border-radius: 10px;
    }
    .zoom-img {
        transition: transform 0.3s ease-in-out;
    }
    .zoom-img:hover {
        transform: scale(1.1);
    }
</style>
@endsection

