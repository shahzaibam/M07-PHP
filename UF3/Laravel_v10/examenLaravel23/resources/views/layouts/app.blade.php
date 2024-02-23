<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">


                    <!-- Authentication Links -->
                    @guest

                        <div class="collapse navbar-collapse" id="navbarNavLightDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        Shows
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <li><a class="dropdown-item" href="{{route('listarTodo')}}">Listar todos</a></li>
                                        <li><a class="dropdown-item" href="{{route('listarOrdenPrecio')}}">Listar ordenados por precio</a></li>
                                        <li><a class="dropdown-item" href="{{route('listarShowsVerComentarios')}}">Listar shows y ver comentarios</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>



                        <div class="collapse navbar-collapse" id="navbarNavLightDropdown_2">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        Comments
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <li><a class="dropdown-item" href="/">Comentar un show</a></li>
                                        <li><a class="dropdown-item" href="/">Actualizar comentario</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>


                        <div class="collapse navbar-collapse" id="navbarNavLightDropdown_2">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        Categorias
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <li><a class="dropdown-item" href="{{route('listarCategories')}}">Listar categorias y sus shows</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
