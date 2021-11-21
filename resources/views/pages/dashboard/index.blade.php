@extends('layout.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('resources/plugins/admin-lte/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/plugins/leaflet/leaflet.css') }}">
<script type="text/javascript" src="{{ asset('resources/plugins/leaflet/leaflet.js') }}"></script>

<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
@endsection

@section('content')

    <div class="row">
        Aqui van las graficas y datos importantes del admin/usuario
    </div>


@section('script')
<script src="{{ asset('resources/plugins/admin-lte/js/adminlte.min.js') }}"></script>
<script src="{{ asset('resources/js/app/dashboard.js') }}"></script>
@endsection

@endsection

