@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{ __('Unit registration form') }}
          <div class="float-right">
            <a href="{{ route('unit.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
        </div>

        <div class="card-body">
          <form id="create-form" method="POST">
            @csrf
            <div class="form-group">
              <label for="unit_identity">Unit Identity <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('unit_identity') is-invalid @enderror" id="unit_identity" name="unit_identity" placeholder="Identity of unit">
              @error('unit_identity')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="unit_name">Unit Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('unit_name') is-invalid @enderror" id="unit_name" name="unit_name" placeholder="Name of unit">
              @error('unit_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="owner_id">Unit Owner <span class="text-danger">*</span></label>
              <select type="text" class="form-control @error('owner_id') is-invalid @enderror" id="owner_id" name="owner_id">
                @foreach($owners as $owner)
                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                @endforeach
              </select>
              @error('owner_id')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="unit_description">Unit Description</label>
              <textarea type="text" class="form-control @error('unit_description') is-invalid @enderror" id="unit_description" name="unit_description" placeholder="Description of unit"></textarea>
              @error('unit_description')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="float-right">
            <button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('create-form').submit();"><i class="fas fa-save"></i> Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript-section')
<script>
  $(document).ready(function() {
    $('#owner_id').select2({
      theme: 'bootstrap4'
    });
  });
</script>
@endsection