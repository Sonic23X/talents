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
        <div class="container">
            <img class="profile-image img-responsive pull-left" src="images/profile.png" alt="{{ $profile->name }}" />
            <div class="profile-content pull-left">
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
                                <a class="col-md-4 col-sm-4 col-xs-12" >
                                <img class="img-responsive project-image" src="images/projects/project-4.png" alt="project name" />
                                </a>
                                <div class="desc col-md-8 col-sm-8 col-xs-12">
                                    <h3 class="title"><a >Velocity - Designed for Products</a></h3>
                                    <p>You can put one of your secondary projects here. Suspendisse in tellus dolor. Vivamus a tortor eu turpis pharetra consequat quis non metus. Aliquam aliquam, orci eu suscipit pellentesque, mauris dui tincidunt enim, eget iaculis ante dolor non turpis.</p>
                                    <p><a class="more-link"><i class="fa fa-external-link"></i> Find out more</a></p>
                                </div><!--//desc-->
                            </div><!--//item-->

                            <div class="item row">
                                <a class="col-md-4 col-sm-4 col-xs-12">
                                <img class="img-responsive project-image" src="images/projects/project-1.png" alt="project name" />
                                </a>
                                <div class="desc col-md-8 col-sm-8 col-xs-12">
                                    <h3 class="title"><a >Tempo - Designed for Startups</a></h3>
                                    <p>You can put one of your secondary projects here. Suspendisse in tellus dolor. Vivamus a tortor eu turpis pharetra consequat quis non metus. Aliquam aliquam, orci eu suscipit pellentesque, mauris dui tincidunt enim, eget iaculis ante dolor non turpis.</p>
                                    <p><a class="more-link"><i class="fa fa-external-link"></i> Find out more</a></p>
                                </div><!--//desc-->
                            </div><!--//item-->

                            <div class="item row">
                                <a class="col-md-4 col-sm-4 col-xs-12" >
                                <img class="img-responsive project-image" src="images/projects//project-2.png" alt="project name" />
                                </a>
                                <div class="desc col-md-8 col-sm-8 col-xs-12">
                                    <h3 class="title"><a >Delta - Designed for Mobile Apps</a></h3>
                                    <p> You can put one of your secondary projects here. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                                    <p><a class="more-link" ><i class="fa fa-external-link"></i> Find out more</a></p>
                                </div><!--//desc-->
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
