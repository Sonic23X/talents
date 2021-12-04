@extends('layout.app')

@section('title')
Inicio - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Dashboard</h3>
        @endslot
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            @if (Auth::user()->hasAnyRole(['admin', 'client']))
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="user"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0">Perfiles</span>
                                <h4 class="mb-0 counter">
                                    {{ $profiles }}
                                </h4>
                                <i class="icon-bg" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="user-check"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0">Suscripciones</span>
                                <h4 class="mb-0 counter">
                                    {{ $subs }}
                                </h4>
                                <i class="icon-bg" data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (Auth::user()->hasRole('user'))
            <div class="col-sm-6 col-xl-6 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="eye"></i></div>
                            <div class="media-body">
                                <span class="m-0">Visualizaciones</span>
                                <h4 class="mb-0 counter">
                                    {{ $views }}
                                </h4>
                                <i class="icon-bg" data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="download"></i></div>
                            <div class="media-body">
                                <span class="m-0">Descargas</span>
                                <h4 class="mb-0 counter">
                                    {{ $downloads }}
                                </h4>
                                <i class="icon-bg" data-feather="download"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <a class="btn btn-primary-light" type="button" href="{{ route('userAdminNew') }}">
                    Editar mi perfil
                </a>
            </div>
            @else
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="eye"></i></div>
                            <div class="media-body">
                                <span class="m-0">Visualizaciones</span>
                                <h4 class="mb-0 counter">
                                    {{ $views }}
                                </h4>
                                <i class="icon-bg" data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="download"></i></div>
                            <div class="media-body">
                                <span class="m-0">Descargas</span>
                                <h4 class="mb-0 counter">
                                    {{ $downloads }}
                                </h4>
                                <i class="icon-bg" data-feather="download"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (Auth::user()->hasRole('admin'))
            <div class="col-xl-6 xl-100 box-col-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5>Usuarios por trabajo</h5>
                        <div class="setting-list">
                            <ul class="list-unstyled setting-option">
                                <li>
                                    <div class="setting-primary"><i class="icon-settings"></i></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-status table-responsive text-center">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th scope="col">Trabajo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Usuarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($works as $work)
                                    <tr>
                                        <td class="f-w-600">{{ $work->name }}</td>
                                        @if ($work->deleted_at == null)
                                        <td class="font-primary">Activo</td>
                                        <td>
                                            <div class="span badge rounded-pill pill-badge-success">0</div>
                                        </td>
                                        @else
                                        <td class="font-secondary">Desactivado</td>
                                        <td>
                                            <div class="span badge rounded-pill pill-badge-secondary">0</div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('resources/js/app/dashboard.js') }}"></script>
@endsection

