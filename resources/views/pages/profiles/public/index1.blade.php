<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil de {{ $profile->name }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS-->
	<script defer src="{{asset('resources/plugins/fontawesome/js/all.min.js')}}"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('resources/assets/css/bootstrap.css')}}">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('resources/themes/tema-1/style.css')}}">
</head>

<body>
    <div class="wrapper mt-lg-5">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="img-fluid rounded" src="{{ asset('storage/'.$profile->picture) }}" alt="" />
                <h1 class="name">{{ $profile->name }}</h1>
                <h3 class="tagline">{{ $work->name }}</h3>
            </div>

            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fas fa-envelope"></i><a href="mailto: {{ $user->email }}">{{ $user->email }}</a></li>
                    <li class="phone"><i class="fas fa-phone"></i><a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a></li>
                    @if ($profile->linkedin != '')
                    <li class="linkedin">
                        <i class="fab fa-linkedin-in"></i>
                        <a href="{{ $profile->linkedin }}" target="_blank" class="text-decoration-none">{{ $profile->linkedin }}</a>
                    </li>
                    @endif
                    @if ($profile->twitter != '')
                    <li class="linkedin">
                        <i class="fab fa-twitter"></i>
                        <a href="{{ $profile->twitter }}" target="_blank" class="text-decoration-none">
                            {{ $profile->twitter }}
                        </a>
                    </li>
                    @endif
                    @if ($profile->fb != '')
                    <li class="linkedin">
                        <i class="fab fa-facebook"></i>
                        <a href="{{ $profile->fb }}" target="_blank" class="text-decoration-none">
                            {{ $profile->name }}
                        </a>
                    </li>
                    @endif
                    <li class="twitter">
                        <i class="fas fa-download"></i>
                        <a href="{{ url('vcard/download/'. $profile->id) }}" class="text-decoration-none">Descargar contacto</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-wrapper">

            <section class="section summary-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-user"></i></span>Detalles</h2>
                <div class="summary">
                    <p>
                        {{ $profile->description }}
                    </p>
                </div>
            </section>

            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-briefcase"></i></span>Portafolio de trabajos</h2>

                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">Lead Developer</h3>
                            <div class="time">2019 - Present</div>
                        </div><!--//upper-row-->
                        <div class="company">Startup Hubs, San Francisco</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo.</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                    </div><!--//details-->
                </div><!--//item-->
            </section>
        </div>
    </div>

    <footer class="footer">
    </footer>

</body>
</html>

