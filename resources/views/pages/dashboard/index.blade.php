@extends('layout.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('resources/plugins/admin-lte/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/plugins/leaflet/leaflet.css') }}">
<script type="text/javascript" src="{{ asset('resources/plugins/leaflet/leaflet.js') }}"></script>

<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
@endsection

@section('content')

    <!-- Map -->
    <div class="row">
        <div class="col">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title text-white">Ubicación de activos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="numActivos">Cantidad</label>
                            <select class="form-select" id="numActivos" onchange="mapFilter()">
                                <option value="10">10</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="">Todos</option>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="nameActivo">Nombre del activo</label>
                            <input type="text" class="form-control" id="nameActivo" placeholder="Nombre" onkeyup="mapFilter()">
                        </div>
                    </div>
                    <div id="globalMap" class="mt-2" style="height: 700px;"></div>
                </div>
            </div>
        </div>
    </div>

       
@section('script')
<script src="{{ asset('resources/plugins/admin-lte/js/adminlte.min.js') }}"></script>
<script src="{{ asset('resources/js/app/dashboard.js') }}"></script>
@endsection

@endsection

