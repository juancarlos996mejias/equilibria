@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 titulo">Mi Carrito</h2>

    @if(session('success'))
    <div class="alert alert-success fadeable">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger fadeable">
        {{ session('error') }}
    </div>
@endif

@if(session('status'))
    <div class="alert alert-info fadeable">
        {{ session('status') }}
    </div>
@endif


    @if (session('cart') && count(session('cart')) > 0)
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
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
                @php $total = 0; @endphp
                @foreach (session('cart') as $item)
                @php
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
                @endphp

               


                <tr>
                    <td><img src="{{ asset($item['imagen']) }}" width="60" height="60"></td>
                    <td>{{ $item['nombre'] }}</td>
                    <td>$ {{ number_format($item['precio'], 2) }}</td>
                    <td>
    <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-flex align-items-center">
        @csrf
        @method('PATCH')

        <input type="number" name="quantity" value="{{ $item['cantidad'] }}" min="1" class="form-control form-control-sm w-50 me-2">
        <button type="submit" class="btn btn-sm btn-outline-primary">Actualizar</button>
    </form>
</td>
                    <td>$ {{ number_format($subtotal, 2) }}</td>
                    <td>


                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este producto del carrito?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash-alt"></i> Quitar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                    <td colspan="2"><strong>$ {{ number_format($total, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    @else
    <p class="text-center">Tu carrito está vacío 😔</p>
    @endif
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const messages = document.querySelectorAll('.fadeable');
        messages.forEach(function (msg) {
            setTimeout(() => {
                msg.classList.add('fade-out');
                setTimeout(() => msg.remove(), 1000); // Elimina el mensaje tras el fade-out
            }, 3000); // Espera 3 segundos antes de iniciar el fade
        });
    });
</script>

<style>
    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>
@endpush






@endsection