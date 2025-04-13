@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 titulo">Mi Carrito</h2>

    @if(count($cart) > 0)
    <table class="table table-bordered text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $id => $item)
            <tr>
                <td>
                    <img src="{{ asset('images/catalogoNatier/' . $item['imagen']) }}" alt="{{ $item['nombre'] }}" width="60">
                </td>
                <td>{{ $item['nombre'] }}</td>
                <td>$ {{ number_format($item['precio'], 2) }}</td>
                <td>
                    <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-flex align-items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="quantity" value="{{ $item['cantidad'] }}" min="1" class="form-control form-control-sm" style="width: 70px;">
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-sync-alt"></i> Actualizar
                        </button>
                    </form>
                </td>
                <td>$ {{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm remove-btn">
                            <i class="fas fa-trash-alt"></i> Quitar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="4" class="text-end">Total:</td>
                <td colspan="2">$ {{ number_format($total, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4 text-end">
        <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">
            Continuar
        </a>
    </div>
    @else
    <p class="text-center fs-4">Tu carrito está vacío 🛒</p>
    <div class="text-center mt-3">
        <a href="{{ route('catalogo') }}" class="btn btn-primary">Ir al catálogo</a>
    </div>
    @endif
</div>
@endsection