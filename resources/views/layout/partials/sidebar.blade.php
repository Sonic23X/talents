<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('dashboard')}}"><i data-feather="trello"></i><span>Perfiles</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Configuración</span></a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a class="submenu-title" href="{{ route('config.index') }}">
                                    Usuarios<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="submenu-title" href="{{ route('work') }}">
                                    Trabajos<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
