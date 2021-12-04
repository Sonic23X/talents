@extends('layout.app')

@section('title')
Usuarios - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Perfiles</h3>
        @endslot
        <li class="breadcrumb-item">Perfil</li>
        <li class="breadcrumb-item active">Nuevo Perfil</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12" id="part1">
                <div class="card">
                    <div class="card-header">
                        <h4>Datos importantes</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('profiles/admin') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control w-75" id="nombre" name="name" aria-describedby="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control w-75" id="apellidos" name="last_name" aria-describedby="apellidos" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control w-75" id="correo" name="email" aria-describedby="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="number" class="form-control w-75" id="telefono" name="phone" aria-describedby="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control w-75" id="contrasena" name="password" aria-describedby="contrasena" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Repetir contraseña</label>
                                <input type="password" class="form-control w-75" id="r_contrasena" name="password_confirmation" aria-describedby="contrasena" required>
                            </div>
                            <div class="mb-3">
                                <label for="trabajo" class="form-label">Trabajo</label>
                                <select name="work_id" id="trabajo" class="form-select w-75">
                                    @foreach ($works as $work)
                                    <option value="{{ $work->id }}">{{ $work->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Vista</label>
                                <select name="type" id="tipo" class="form-select w-75">
                                    <option value="1">Tipo A</option>
                                    <option value="2">Tipo B</option>
                                    <option value="3">Tipo C</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">Acerca de </label>
                                <textarea class="form-control w-75" id="about" name="description" aria-describedby="about"></textarea>
                            </div>
                            <div class="mb-3 w-75">
                                <label for="photo-profile" class="form-label">Foto de perfil</label>
                                <input class="form-control form-control-sm" name="picture" id="photo-profile" type="file"  accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary w-75">Guardar</button>
                        </form>
                        @if ($errors->any())
                        <div class="alert alert-danger mt-3 w-75" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(() => {

    });
</script>
@endsection
