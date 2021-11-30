@extends('layout.app')

@section('title')
Nuevo trabajo - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Nuevo trabajo</h3>
        @endslot
        <li class="breadcrumb-item">Trabajos</li>
        <li class="breadcrumb-item active">Nuevo trabajo</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12">
                <form method="POST" action="{{ url('works') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del tipo de trabajo</label>
                        <input type="text" class="form-control w-75" id="nombre" name="name" aria-describedby="nombre">
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
