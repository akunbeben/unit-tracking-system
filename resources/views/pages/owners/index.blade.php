@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header justify-content-center">
          {{ __('List of Owners') }}
          <div class="float-right">
            <a href="{{ route('owner.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Submit Owner</a>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($data as $unit)
              <tr>
                <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                <td>{{ $unit->name }}</td>
                <td class="text-center">
                  <a href="{{ route('owner.edit', $unit->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="{{ route('owner.delete', $unit->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>

                  <form id="delete-form" action="{{ route('owner.delete', $unit->id) }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection