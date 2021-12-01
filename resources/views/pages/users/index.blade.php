@extends('layout.app')

@section('title')
Usuarios - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Usuarios</h3>
        @endslot
        <li class="breadcrumb-item active">Usuarios</li>
        @slot('breadcrumb_options')
            <div class="float-end p-0">
                <a class="btn btn-primary-light" type="button" href="{{ route('userAdminNew') }}">
                    Nuevo usuario
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
                                        <th scope="col">Correo</th>
                                        <th scope="col">Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="f-w-600">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles[0]->name }}</td>
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
