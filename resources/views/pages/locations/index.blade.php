@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mb-4">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          {{ __('Unit Detail') }}
          <div class="float-right">
            <a href="{{ route('unit.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
        </div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">Unit Identity</th>
                <th class="text-center">Unit Name</th>
                <th class="text-center">Owner</th>
                <th class="text-center">Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">{{ $unit->unit_identity }}</td>
                <td class="text-center">{{ $unit->unit_name }}</td>
                <td class="text-center">{{ $unit->owner->name }}</td>
                <td class="text-center">{{ $unit->unit_description }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Unit Current Location') }}</div>

        <div class="card-body">
          <div id="map" style="width: 100%; height: 43vh;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript-section')
<script>
  var grayscale = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
    id: 'mapbox/streets-v11'
  });

  var satelite = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
    id: 'mapbox/satellite-v9'
  });


  var streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });

  var dark = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
    id: 'mapbox/dark-v10'
  });

  let rawCoordinate = '{{ $coordinate }}';
  let transformedCoordinate = rawCoordinate.split(',');

  var map = L.map('map', {
    center: [transformedCoordinate[0], transformedCoordinate[1]],
    zoom: 9,
    layers: [grayscale]
  });

  var baseMaps = {
    "Grayscale": grayscale,
    "Satellite": satelite,
    "Streets": streets,
    "Dark": dark
  };

  L.control.layers(baseMaps).addTo(map);

  // get coordinat
  var curLocation = [transformedCoordinate[0], transformedCoordinate[1]];
  map.attributionControl.setPrefix(false);

  var greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
  });

  var marker = new L.marker(curLocation, {
    draggable: false,
    icon: greenIcon
  });

  map.addLayer(marker);
</script>
@endsection