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
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="user"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0">Clientes</span>
                                <h4 class="mb-0 counter">
                                    6659
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
                                    9856
                                </h4>
                                <i class="icon-bg" data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="eye"></i></div>
                            <div class="media-body">
                                <span class="m-0">Visualizaciones</span>
                                <h4 class="mb-0 counter">
                                    893
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
                                    9856
                                </h4>
                                <i class="icon-bg" data-feather="download"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <tr>
                                        <td class="f-w-600">Trabajo 1</td>
                                        <td class="font-primary">Activo</td>
                                        <td>
                                            <div class="span badge rounded-pill pill-badge-secondary">6523</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="f-w-600">Trabajo 2</td>
                                        <td class="font-secondary">Desactivado</td>
                                        <td>
                                            <div class="span badge rounded-pill pill-badge-success">6523</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('resources/js/app/dashboard.js') }}"></script>
@endsection

