@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header justify-content-center">
          {{ __('List of Units') }}
          <div class="float-right">
            <a href="{{ route('unit.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Submit Unit</a>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Unit</th>
                <th>Owner</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($data as $unit)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $unit->unit_name }}</td>
                <td>{{ $unit->owner->name }}</td>
                <td class="text-center">
                  <a href="{{ route('unit.track', $unit->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-map-marker-alt"></i> Find on Map</a>
                  <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="{{ route('unit.delete', $unit->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>

                  <form id="delete-form" action="{{ route('unit.delete', $unit->id) }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection