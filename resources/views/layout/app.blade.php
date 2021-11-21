<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Demo') }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Red+Hat+Display" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('resources/css/main.css') }}">
        @yield('styles')

    </head>
    <body class="hold-transition sidebar-collapse">
        <div class="wrapper">
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="index3.html" class="brand-link text-center">
                    <span class="brand-text font-weight-light">{{ config('app.name', 'Demo') }}</span>
                </a>

                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('resources/plugins/admin-lte/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                {{ Auth::user()->name }}
                            </a>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    Usuarios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    Clientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                <button class="navbar-toggler" type="button" data-widget="pushmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button class="btn btn-link" type="button" data-widget="pushmenu">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content-wrapper">
                <div class="content">
                    <div class="container-fluid">
                        <input type="hidden" id="url" value="{{ url('') }}">
                        <div class="container-fluid mb-5"> <br> </div>

                        @yield('content')

                        <div class="container-fluid mt-4"> <br> </div>
                    </div>
                </div>
            </div>

        </div>
         <!-- jQuery library -->
        <script src="{{ asset('resources/plugins/jquery/jquery-3.5.1.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Sweet Alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <!-- Font Awesome 5.13.1 -->
        <script src="{{ asset('resources/plugins/fontawesome/js/all.min.js') }}"></script>

        @yield('script')
    </body>
</html>
