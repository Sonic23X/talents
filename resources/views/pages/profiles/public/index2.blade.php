<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil de {{ $profile->name }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Resume Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- FontAwesome JS-->
	<script defer src="{{asset('resources/plugins/fontawesome/js/all.min.js')}}"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('resources/themes/tema-2/style.css')}}">


</head>

<body>

    <article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
		    <header class="resume-header pt-4 pt-md-0">
			    <div class="row">
				    <div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
				        <img class="picture rounded" src="{{ asset('storage/'.$profile->picture) }}" alt="" />
				    </div><!--//col-->
				    <div class="col">
					    <div class="row p-4 justify-content-center justify-content-md-between">
						    <div class="primary-info col-auto">
							    <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase">{{ $profile->name }}</h1>
							    <div class="title mb-3">{{ $work->name }}</div>
							    <ul class="list-unstyled">
								    <li class="mb-2"><a class="text-link" href="mailto: {{ $user->email }}"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i>{{ $user->email }}</a></li>
								    <li><a class="text-link" href="tel:{{ $profile->phone }}"><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i>{{ $profile->phone }}</a></li>
							    </ul>
						    </div><!--//primary-info-->
						    <div class="secondary-info col-auto mt-2">
							    <ul class="resume-social list-unstyled">
                                    @if ($profile->linkedin != '')
                                    <li class="mb-3">
                                        <a class="text-link" href="{{ $profile->linkedin }}">
                                            <span class="fa-container text-center me-2">
                                                <i class="fab fa-linkedin-in fa-fw"></i>
                                            </span>
                                            {{ $profile->name }}
                                        </a>
                                    </li>
                                    @endif
                                    @if ($profile->twitter != '')
                                    <li class="mb-3">
                                        <a class="text-link" href="{{ $profile->twitter }}">
                                            <span class="fa-container text-center me-2">
                                                <i class="fab fa-twitter fa-fw"></i>
                                            </span>
                                            {{ $profile->name }}
                                        </a>
                                    </li>
                                    @endif
                                    @if ($profile->fb != '')
                                    <li class="mb-3">
                                        <a class="text-link" href="{{ $profile->fb }}">
                                            <span class="fa-container text-center me-2">
                                                <i class="fab fa-facebook fa-fw"></i>
                                            </span>
                                            {{ $profile->name }}
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="text-link" href="{{ url('vcard/download/'. $profile->id) }}">
                                            <span class="fa-container text-center me-2">
                                                <i class="fas fa-download"></i>
                                            </span>
                                            Descargar contacto
                                        </a>
                                    </li>
							    </ul>
						    </div><!--//secondary-info-->
					    </div><!--//row-->

				    </div><!--//col-->
			    </div><!--//row-->
		    </header>
		    <div class="resume-body p-5">
			    <section class="resume-section summary-section mb-5">
				    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Acerca de mi</h2>
				    <div class="resume-section-content">
					    <p class="mb-0">
                            {{ $profile->description }}
                        </p>
				    </div>
			    </section>
                <section class="resume-section summary-section mb-5">
				    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Portafolio</h2>
				    <div class="resume-section-content">
					    <p class="mb-0">

                        </p>
				    </div>
			    </section>
		    </div>
	    </div>
    </article>


    <footer class="footer text-center pt-2 pb-5">
    </footer>

</body>
</html>

