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
                        <h5 class="nombre-producto">{{ $producto->nombre }}</h5>
                        <p class="nombre-descripcion">{{ $producto->descripcion }}</p>
                        <div class="mt-auto">
                            <p class="tituloPrecio">$ {{ number_format($producto->precio, 2) }}</p>
                            <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $producto->id }}">
    <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
    <input type="hidden" name="precio" value="{{ $producto->precio }}">
    <input type="hidden" name="imagen" value="{{ $producto->imagen }}">
    <button type="submit" class="btn btn-sm btn-success w-100">Agregar al carrito</button>
</form>
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
