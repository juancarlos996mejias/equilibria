@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 text-success fw-bold">Catálogo de Productos</h2>

    <div class="row g-4">
        @foreach ($productos as $producto)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold text-success">{{ $producto->nombre }}</h5>
                        <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                        <div class="mt-auto">
                            <p class="fw-bold">Precio: ${{ number_format($producto->precio, 2, ',', '.') }}</p>
                            <a href="#" class="btn btn-success w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

     <!-- Paginación -->
     <div class="d-flex justify-content-center mt-4">
        {{ $productos->links() }}
    </div>
</div>
@endsection
