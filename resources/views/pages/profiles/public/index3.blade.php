<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil de {{ $profile->name }}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="{{asset('resources/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('resources/plugins/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('resources/themes/tema-3/styles.css')}}" />

    <script src="{{asset('resources/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('resources/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('resources/assets/js/bootstrap/bootstrap.min.js')}}"></script>

</head>

<body>
    <!-- ******HEADER****** -->
    <header class="header">
        <div class="container d-flex">
            <img class="rounded-circle" style="width: 200px" src="{{ asset('storage/'.$profile->picture) }}" alt="{{ $profile->name }}" />
            <div class="profile-content ms-5">
                <h1 class="name">{{ $profile->name }}</h1>
                <h2 class="desc">{{ $work->name }}</h2>
            </div>
        </div>
    </header>

    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">
                <section class="about section">
                    <div class="section-inner">
                        <h2 class="heading">Acerca de mí</h2>
                        <div class="content">
                            <p>
                                {{ $profile->description }}
                            </p>
                        </div>
                    </div>
                </section>

               <section class="latest section">
                    <div class="section-inner">
                        <h2 class="heading">Portafolio</h2>
                        <div class="content">

                            <div class="item row">
                                @if ($images != null)
                                @foreach ($images as $image)
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img class="img-fluid mb-2" src="{{ asset('storage/'.$image->path) }}" alt="Portafolio {{ $image->id }}">
                                </div>
                                @endforeach
                                @else
                                <div class="col-md-6 col-sm-6 col-xs-12" >
                                    <span>Sin portafolio</span>
                                </div>
                                @endif
                            </div><!--//item-->
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </section><!--//section-->
            </div>
            <div class="secondary col-md-4 col-sm-12 col-xs-12">
                 <aside class="info aside section">
                    <div class="section-inner">
                        <h2 class="heading sr-only">Información de contacto</h2>
                        <div class="content">
                            <ul class="list-unstyled mb-2">
                                @if ($profile->fb != '')
                                <li>
                                    <i class="fab fa-facebook"></i>
                                    <span class="sr-only">
                                        Facebook:
                                    </span>
                                    <a href="{{ $profile->fb }}" class="text-decoration-none">{{ $profile->name }}</a>
                                </li>
                                @endif
                                @if ($profile->twitter != '')
                                <li>
                                    <i class="fab fa-twitter"></i>
                                    <span class="sr-only">
                                        Twitter:
                                    </span>
                                    <a href="{{ $profile->twitter }}" class="text-decoration-none">{{ $profile->name }}</a>
                                </li>
                                @endif
                                @if ($profile->twitter != '')
                                <li>
                                    <i class="fab fa-linkedin-in"></i>
                                    <span class="sr-only">
                                        Linkedin:
                                    </span>
                                    <a href="{{ $profile->linkedin }}" class="text-decoration-none">{{ $profile->name }}</a>
                                </li>
                                @endif
                                <li>
                                    <i class="far fa-envelope"></i>
                                    <span class="sr-only">
                                        Email:
                                    </span>
                                    <a href="mailto: {{ $user->email }}">{{ $user->email }}</a>
                                </li>
                                <li>
                                    <i class="fa fa-link"></i>
                                    <span class="sr-only">
                                        Telefono:
                                    </span>
                                    <a href="tel:{{ $profile->phone }}">
                                        {{ $profile->phone }}
                                    </a>
                                </li>
                            </ul>
                            <a class="btn btn-cta-primary mt-5 text-decoration-none" href="{{ url('vcard/download/'. $profile->id) }}">
                                <i class="fa fa-paper-plane"></i>
                                Descargar contacto
                            </a>
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//aside-->
            </div>
        </div>
    </div>

    <!-- ******FOOTER****** -->
    <footer class="footer">
    </footer><!--//footer-->

</body>
</html>
