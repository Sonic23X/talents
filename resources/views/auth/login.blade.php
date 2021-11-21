<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Find my assets</title>

        <link rel="icon" href="./favicon.png">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('resources/css/login.css') }}">
    </head>
    <body class="hidden">

        <!-- loader -->
        <div class="loader">
            <div class="loadingio-spinner-spinner-65dox1ras4p">
                <div class="ldio-jsxn2qe688r">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                </div>
            </div>
        </div>

        <nav class="navbar fixed-top navbar-light bg-light">
            <a class="ms-3 navbar-brand" href="{{ route('landing') }}">
                <i class="fas fa-arrow-left"></i>
            </a>
        </nav>

        <!-- Login Form -->
        <div class="container">
            <div class="login-box">
                <form method="post" id="login1" action="{{ url('login') }}">
                    @csrf
                    <div class="part-1">
                        <h3 class="text-center">Acceso</h3>
                        <div class="form-group mt-4">
                            <input type="text" id="email" class="form-control" placeholder="E-mail" name="ingresoEmail">
                        </div>

                        <div class="input-group mb-3 mt-2">
                            <input type="password" class="form-control"  id="password" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="icon">
                            <span class="input-group-text" id="icon">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary w-100 next">Continuar</button>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-6">
                                <p class="text-center little-text mt-1">¿No tienes cuenta?</p>
                            </div>
                            <div class="col-sm-4">
                                <a id="btn-ingreso" class="ml-2 btn btn-outline-primary btn-sm" href="#">
                                    Regístrate
                                </a>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalPassword">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">Recuperar contraseña</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="recover" action="{{ url('login/password') }}">
                            <p class="text-muted">Escriba su correo electrónico:</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="icon">
                                    <i class="far fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="recoverEmail" placeholder="Correo" aria-label="Correo" aria-describedby="icon">
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Enviar">
                        </form>
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

        <!-- Custom JS -->
        <script src="{{ asset('resources/js/login.js') }}"></script>

    </body>
</html>
