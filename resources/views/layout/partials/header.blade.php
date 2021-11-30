<div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
        <div class="logo-wrapper">
            <a href="{{ route('dashboard') }}" class="text-center text-decoration-none">
                @yield('title')
            </a>
        </div>
        <div class="dark-logo-wrapper">
            <a href="{{ route('dashboard') }}" class="text-center text-decoration-none">
                @yield('title')
            </a>
        </div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
    </div>
    <div class="left-menu-header col">
    </div>
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li>
            <div class="mode"><i class="fa fa-lightbulb-o"></i></div>
        </li>
        <li class="onhover-dropdown p-0">
          <button class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Salir</button>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
