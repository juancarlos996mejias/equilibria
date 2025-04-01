@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <ul class="list-group">
            @foreach(session('cart') as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} - ${{ number_format($item['price'], 2) }}
                    <span class="badge bg-primary">{{ $item['quantity'] }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Tu carrito está vacío.</p>
    @endif

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Seguir comprando</a>
</div>
@endsection

