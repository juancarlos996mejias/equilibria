<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Equilibria') }}</title>

    <!-- App styles and scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Normalize (si lo necesitas) -->
    <link rel="stylesheet" href="{{ asset('css/normalizer.css') }}">

    <!-- Fonts (Google y Bunny) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Preload Google Fonts (mejora rendimiento y evita FOUT) -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    </noscript>

    <!-- Bunny (opcional si se usa) -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons y FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-equilibria shadow-sm py-3">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fw-bold text-success" href="#">
                    <img src="/images/logoEquilibriaOriginal.png" alt="Logo" width="90">
                </a>

                <!-- Botón para colapsar en móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <!-- Menú izquierdo -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="{{ route('about') }}">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="{{ route('catalogo') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="{{ route('contact') }}">Contacto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Marcas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('natier') }}">Natier</a></li>
                                <li><a class="dropdown-item" href="#">Futuro Fungi</a></li>
                                <li><a class="dropdown-item" href="#">Star Nutrición</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Menú derecho -->
                    <ul class="navbar-nav ms-auto align-items-center gap-2">
                        <!-- Carrito -->
                        <li class="nav-item">
                            <a class="nav-link position-relative text-dark" href="{{ route('cart') }}">
                                <i class="fas fa-shopping-cart fa-lg"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ session('cart') ? count(session('cart')) : 0 }}
                                </span>
                            </a>
                        </li>

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="{{ route('register') }}">Registrarse</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark fw-semibold" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Cerrar sesión</button>
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
    </div>
    </nav>
    </div>

    @stack('scripts')
</body>

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

<footer class="bgFooter text-dark mt-5 py-5 border-top w-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center text-md-start">
                <img src="images/logoEqui.png" alt="logo" width="85px">
                <h5 class="titulofooter">Equilibria</h5>
                <p class="text-muted">Tu tienda de confianza en suplementos y bienestar.</p>
            </div>
            <div class="col-md-4 text-center">
                <h5 class="titulofooter">Enlaces Útiles</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('about') }}" class="text-dark">Sobre Nosotros</a></li>
                    <li><a href="{{ route('catalogo') }}" class="text-dark">Tienda</a></li>
                    <li><a href="{{ route('contact') }}" class="text-dark">Contacto</a></li>
                    <li><a href="#" class="text-dark">Política de Privacidad</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center text-md-end">
                <h5 class="titulofooter">Síguenos</h5>
                <a href="#" class="text-dark me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-dark me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-dark me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-dark"><i class="bi bi-youtube"></i></a>
            </div>
        </div>

        <!-- Medios de Pago -->
        <div class="row mt-4">
            <div class="col text-center">
                <h5 class="titulofooter">Medios de Pago</h5>
                <img src="images/mercado.svg" alt="Mercado Pago" width="90" class="mx-2">
                <img src="images/visa2.png" alt="Visa" width="50" class="mx-2">
                <img src="images/master.png" alt="MasterCard" width="50" class="mx-2">
                <img src="images/pagoFacil.svg" alt="Pago Fácil" width="40" class="mx-2">
                <img src="images/rapipago.svg" alt="Pago Fácil" width="70" class="mx-2">
            </div>
        </div>


        <div class="footer text-center mt-3 border-top pt-3 ">
            <p class="mb-0">&copy; 2025 Equilibria. Todos los derechos reservados.</p>
        </div>

    </div>
</footer>























<script>
    document.getElementById("brandSelect").addEventListener("change", function() {
        var selectedBrand = this.value;
        if (selectedBrand) {
            window.location.href = "{{ url('/brands') }}/" + encodeURIComponent(selectedBrand);
        }
    });
</script>
<script src="{{ asset('js/app.js') }}"></script>

</html>