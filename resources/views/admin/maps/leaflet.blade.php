@extends('layouts.vertical', ['title' => 'Leaflet Maps'])

@section('css')
    @vite(['node_modules/leaflet/dist/leaflet.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Maps', 'title' => 'Leaflet'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="mb-1 card-title">Basic Map</h5>
                    <p class="text-muted mb-0">A simple Leaflet map centered with default tile layer and controls.</p>
                </div>
                <div class="card-body">
                    <div id="basicMap" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="mb-1 card-title">Marker, Circle &amp; Polygon</h5>
                    <p class="text-muted mb-0">Shows how to add interactive markers, circles, and polygons on the map.</p>
                </div>
                <div class="card-body">
                    <div id="shapeMap" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="mb-1 card-title">Draggable Marker with Popup</h5>
                    <p class="text-muted mb-0">Allows dragging a marker with a popup that displays dynamic content.</p>
                </div>
                <div class="card-body">
                    <div id="dragMap" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="mb-1 card-title">User Location</h5>
                    <p class="text-muted mb-0">Uses the browser's geolocation API to show the user's current location.</p>
                </div>
                <div class="card-body">
                    <div id="userLocation" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="mb-1 card-title">Custom Icons</h5>
                    <p class="text-muted mb-0">Demonstrates using custom image icons for Leaflet map markers.</p>
                </div>
                <div class="card-body">
                    <div id="customIcons" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="mb-1 card-title">Layer Control</h5>
                    <p class="text-muted mb-0">Toggles between multiple map layers or overlays using Leaflet’s layer
                        control.</p>
                </div>
                <div class="card-body">
                    <div id="layerControl" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-block">
                    <h5 class="mb-1 card-title">Interactive Choropleth Map</h5>
                    <p class="text-muted mb-0">Displays region-based data using GeoJSON and interactive color scales.</p>
                </div>
                <div class="card-body">
                    <div id="geoJson" style="height: 300px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/maps-leaflet.js'])
@endsection
