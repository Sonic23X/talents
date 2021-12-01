@extends('layout.app')

@section('title')
Nuevo usuario - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Nuevo usuario</h3>
        @endslot
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item active">Nuevo usuario</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12">
                <form method="POST" action="{{ url('users/admin') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control w-75" id="nombre" name="name" aria-describedby="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control w-75" id="apellidos" name="last_name" aria-describedby="apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control w-75" id="correo" name="email" aria-describedby="correo">
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="type" id="tipo" class="form-select w-75">
                            <option value="1">Cliente</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" class="form-control w-75" id="contrasena" name="password" aria-describedby="contrasena">
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Repetir contraseña</label>
                        <input type="password" class="form-control w-75" id="contrasena" name="password_confirmation" aria-describedby="contrasena">
                    </div>
                    <button type="submit" class="btn btn-primary w-75">Guardar</button>
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3 w-75" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('resources/js/app/dashboard.js') }}"></script>
@endsection
