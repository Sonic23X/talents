@extends('layout.app')

@section('title')
Usuarios - Talents
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Usuarios</h3>
        @endslot
    @endcomponent
    <div class="container-fluid">

    </div>
@endsection

@section('script')
<script src="{{ asset('resources/js/app/dashboard.js') }}"></script>
@endsection
