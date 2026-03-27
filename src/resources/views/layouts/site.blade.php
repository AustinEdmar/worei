<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Worei') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Scripts -->

</head>

<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('site.index') }}">
                    <i class="fas fa-heart me-2"></i>WOREI
                </a>

                <!-- Menu Desktop - sempre visível em telas grandes -->
                <div class="navbar-desktop">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('site.about') ? 'active' : '' }}"
                                href="{{ route('site.about') }}">SOBRE NÓS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('site.events') ? 'active' : '' }}"
                                href="{{ route('site.events') }}">EVENTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('site.services') ? 'active' : '' }}"
                                href="{{ route('site.services') }}">SERVIÇOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('site.blog') ? 'active' : '' }}"
                                href="{{ route('site.blog') }}">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('site.contacts') ? 'active' : '' }}"
                                href="{{ route('site.contacts') }}">CONTACTOS</a>
                        </li>
                    </ul>

                    @guest
                        <!-- Quando NÃO está autenticado -->
                        <a href="{{ route('login') }}" class="text-decoration-none btn-volunteer">
                            LOGIN <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    @endguest

                    @auth
                        <!-- Quando ESTÁ autenticado -->
                        <a href="{{ route('dashboard.home') }}" class="text-decoration-none btn-volunteer">
                            DASHBOARD <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    @endauth


                </div>




                <!-- Menu Hamburguer customizado para Mobile/Tablet -->
                <label class="navbar-mobile ">
                    <input type="checkbox" />
                    <span class="menu">
                        <span class="hamburger"></span>
                    </span>
                    <ul class="hamburger-nav-list  ">
                        <li><a href="{{ route('site.about') }}" class="cursor-pointer">SOBRE NÓS</a></li>
                        <li><a href="{{ route('site.events') }}" class="cursor-pointer">EVENTOS</a></li>
                        <li><a href="{{ route('site.services') }}" class="cursor-pointer">SERVIÇOS</a></li>
                        <li><a href="{{ route('site.blog') }}" class="cursor-pointer">BLOG</a></li>
                        <li><a href="{{ route('site.contacts') }}" class="cursor-pointer">CONTACTOS</a></li>
                        <li>
                            <!--  <button class="btn btn-volunteer mt-3">
                            LOGIN
                        <i class="fas fa-arrow-right ms-2"></i>
                    </button> -->
                            @guest
                                <!-- Quando NÃO está autenticado -->
                                <a href="{{ route('login') }}" class="text-decoration-none btn-volunteer">
                                    LOGIN <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            @endguest

                            @auth
                                <!-- Quando ESTÁ autenticado -->
                                <a href="{{ route('dashboard.home') }}" class="text-decoration-none btn-volunteer">
                                    DASHBOARD <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            @endauth

                        </li>
                    </ul>
                </label>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row text-center text-md-start">
                    <!-- Branding e texto -->
                    <div class="col-12 col-md-6 mb-4">
                        <div class="footer-brand mb-2">
                            <i class="fas fa-heart me-2"></i>WOREI
                        </div>
                        <p class="text-secondary mb-0">
                            Empoderando mulheres e construindo um futuro mais igualitário através de ações
                            transformadoras.
                        </p>
                    </div>

                    <!-- Links e redes sociais -->
                    <div class="col-12 col-md-6 mb-4 d-flex flex-column align-items-center align-items-md-end">
                        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-end mb-2">
                            <div class="footer-links">SOBRE</div>
                            <div class="footer-links">EVENTOS</div>
                            <div class="footer-links">SERVIÇOS</div>
                            <div class="footer-links">BLOG</div>
                            <div class="footer-links">CONTATOS</div>
                        </div>
                        <div class="social-icons d-flex gap-2 justify-content-center justify-content-md-end">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-linkedin"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="border-color: #374151;">

                <!-- Rodapé final -->
                <div class="row text-center text-md-start">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <small class="text-secondary">© 2024 WOREI. Todos os direitos reservados</small>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        <small class="text-secondary">Política de Privacidade | Termos de Uso</small>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>


    <script src="script.js"></script>
</body>

</html>