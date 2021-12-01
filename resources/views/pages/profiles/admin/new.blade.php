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
                        <form method="POST" action="{{ url('profiles/admin') }}" id="basic">
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
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="number" class="form-control w-75" id="telefono" name="phone" aria-describedby="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control w-75" id="contrasena" name="password" aria-describedby="contrasena">
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Repetir contraseña</label>
                                <input type="password" class="form-control w-75" id="r_contrasena" name="password_confirmation" aria-describedby="contrasena">
                            </div>
                            <div class="mb-3">
                                <label for="trabajo" class="form-label">Trabajo</label>
                                <select name="work" id="trabajo" class="form-select w-75">
                                    @foreach ($works as $work)
                                    <option value="{{ $work->id }}">{{ $work->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">Acerca de </label>
                                <textarea class="form-control w-75" id="about" name="about" aria-describedby="about"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-75">Continuar</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="col-xl-12 xl-100 box-col-12 d-none" id="part2">
                <div class="card">
                    <div class="card-header">
                        <h4>Imagenes</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('users/admin') }}" id="photos">
                            @csrf
                            <div class="mb-3 w-75">
                                <label for="photo" class="form-label">Foto de perfil</label>
                                <input class="form-control form-control-sm" type="file" id="photo">
                            </div>
                            <div class="mb-3 w-75">
                                <label for="port" class="form-label">Portafolio</label>
                                <input class="form-control form-control-sm" type="file" id="port" multiple="multiple">
                            </div>
                            <button type="submit" class="btn btn-primary w-75">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(() => {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#basic').submit(event => {
            event.preventDefault();

            if($('#contrasena').val() != $('#r_contrasena').val()) {
                alert('las contraseñas no coinciden');
                return;
            }

            let data = {
                name: $('#nombre').val(),
                apellidos: $('#apellidos').val(),
                email: $('#correo').val(),
                phone: $('#telefono').val(),
                password: $('#contrasena').val(),
                trabajo: $('#trabajo').val(),
                about : $('#about').val(),
            };

            $.ajax({
                url: $('#basic').attr('action'),
                type: 'POST',
                dataType: 'json',
                data: data
            })
            .done( response => {
                window.location.href = `{{ url('profiles/admin') }}`;
            })
            .fail( jqXHR => {
                console.log(jqXHR);
            });
        });

    });
</script>
@endsection
