@extends('layout.app')

@section('title')
Perfiles - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Perfiles</h3>
        @endslot
        @slot('breadcrumb_options')
            <div class="float-end p-0">
                <a class="btn btn-primary-light" type="button" href="{{ url('profiles/admin/create') }}">
                    Nuevo perfil
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
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Visualizaciones</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profiles as $profile)
                                    <tr>
                                        <td class="f-w-600">
                                            {{ $profile->name . ' ' . $profile->last_name }}
                                        </td>
                                        <td class="f-w-200">
                                            {{ $profile->views }}
                                        </td>
                                        <td>
                                            <a href="{{ url('profiles/admin/' . $profile->id) }}" target="_blank" class="btn btn-primary-light">
                                                Ver
                                            </a>
                                            <a href="{{ url('profiles/admin/' . $profile->id) . '/edit' }}" class="btn btn-primary-light">
                                                Editar
                                            </a>
                                        </td>
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

