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
        <li class="breadcrumb-item active">Editar Perfil</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12" id="part1">
                <div class="card">
                    <div class="card-header">
                        <h4>Datos importantes</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('profiles/admin/' . $profile->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="number" class="form-control w-75" id="telefono" name="phone" aria-describedby="nombre" value="{{ $profile->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="fb" class="form-label">Facebook</label>
                                <input type="text" class="form-control w-75" id="fb" name="fb" aria-describedby="nombre" value="{{ $profile->facebook }}">
                            </div>
                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control w-75" id="twitter" name="twitter" aria-describedby="nombre" value="{{ $profile->twitter }}">
                            </div>
                            <div class="mb-3">
                                <label for="linkedin" class="form-label">Linkedin</label>
                                <input type="text" class="form-control w-75" id="linkedin" name="linkedin" aria-describedby="nombre" value="{{ $profile->linkedin }}">
                            </div>
                            <div class="mb-3">
                                <label for="trabajo" class="form-label">Trabajo</label>
                                <select name="work" id="work_id" class="form-select w-75">
                                    @foreach ($works as $work)
                                    @if ($profile->work_id == $work->id)
                                    <option value="{{ $work->id }}" selected>{{ $work->name }}</option>
                                    @else
                                    <option value="{{ $work->id }}">{{ $work->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">Acerca de </label>
                                <textarea class="form-control w-75" id="about" name="description" aria-describedby="about">
                                    {{ $profile->description }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-75">Continuar</button>
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
