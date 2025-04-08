@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 titulo">Catálogo de Productos</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($productos as $producto)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($producto->imagen) }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="{{ $producto->nombre }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success fw-semibold">{{ $producto->nombre }}</h5>
                        <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                        <div class="mt-auto">
                            <p class="fw-bold text-primary">$ {{ number_format($producto->precio, 2) }}</p>
                            <a href="#" class="btn btn-sm btn-success w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-5">
        {{ $productos->links() }}
    </div>
</div>
@endsection
