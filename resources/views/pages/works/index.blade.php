@extends('layout.app')

@section('title')
Trabajos - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Trabajos</h3>
        @endslot
        <li class="breadcrumb-item active">Trabajos</li>
        @slot('breadcrumb_options')
            <div class="float-end p-0">
                <a class="btn btn-primary-light" type="button" href="{{ route('workNew') }}">
                    Nuevo trabajo
                </a>
            </div>
        @endslot
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12">
                <div class="card">
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
                                            <div class="span badge rounded-pill pill-badge-success">6523</div>
                                        </td>
                                        @else
                                        <td class="font-secondary">Desactivado</td>
                                        <td>
                                            <div class="span badge rounded-pill pill-badge-secondary">6523</div>
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
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('resources/js/app/dashboard.js') }}"></script>
@endsection
