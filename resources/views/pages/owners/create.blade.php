@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{ __('Owner registration form') }}
          <div class="float-right">
            <a href="{{ route('owner.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
        </div>

        <div class="card-body">
          <form id="create-form" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Owner Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name of fleet the owner" value="{{ old('name') }}">
              @error('name')
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