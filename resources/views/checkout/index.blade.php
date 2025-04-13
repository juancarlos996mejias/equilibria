@extends('layouts.app')
@section('content')
<div class="container min-vh-100 d-flex align-items-center">
    <div class="row w-100">
        <!-- Imagen ilustrativa -->
        <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center">
            <img src="{{ asset('images/compra.webp') }}" alt="Confirmación de compra"
                 class="img-fluid shadow rounded-4"
                 style="max-width: 100%; max-height: 400px; aspect-ratio: 1/1; object-fit: cover;">
        </div>

        <!-- Formulario de datos -->
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4 p-4 animate__animated animate__fadeInUp"
                 style="background: linear-gradient(135deg, #ffffff, #f8f9fa); border: none;">
                <h2 class="text-center mb-4">Tus datos</h2>

                @if(session('success'))
                    <div class="alert alert-success text-center animated fadeIn" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('checkout.process') }}" id="checkout-form">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" name="correo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <textarea name="direccion" class="form-control" rows="2" required></textarea>
                    </div>

                    <hr>
                    <h5>Resumen del pedido</h5>
                    <ul class="list-group mb-3">
                        @foreach($cart as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                {{ $item['nombre'] }} (x{{ $item['cantidad'] }})
                                <span>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Total</strong>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </li>
                    </ul>

                    <div class="text-center">
                        <button id="submit-btn" type="submit" class="btn btn-success w-100">
                            <i class="fas fa-check-circle me-2"></i> Confirmar compra
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('checkout-form').addEventListener('submit', function () {
        const btn = document.getElementById('submit-btn');
        btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Procesando...`;
        btn.disabled = true;
    });
</script>
@endpush
@endsection
