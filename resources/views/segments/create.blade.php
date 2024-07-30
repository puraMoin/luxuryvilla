@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container-fluid">
    <!-- BreadCrumb -->
    @include('partials.breadcrumb')
    <!-- Add New Button -->
    <div class="right-mob-left">
      <a href="{{ route('segments.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card-style mt-20">
      
      <form action="{{ route('segments.store') }}" method="POST">
        @csrf
        <div class="row">
          <!-- Name -->
          <input type="hidden" name="created_by" class="form-control" value="{{$userId}}" required>
          <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>

          <div class="col-md-4">
            <div class="input-style-1">
              <label for="name">Name <span class="mandatory"> *</span></label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
          </div>
          <!-- Code -->
          <div class="col-md-4">
            <div class="input-style-1">
              <label for="Code">Code <span class="mandatory"> *</span></label>
              <input type="text" id="code" name="code" class="form-control" required>
            </div>
          </div>
          <!-- Active Code -->
        <div class="col-sm-4">  
             <label>Active</label><br>
             <label class="radio-inline"><input type="radio" name="active" class="radio-inline" value="1"> Yes</label>
            <label class="radio-inline"><input type="radio" name="active" class="radio-inline" value="0" checked> No</label>
         </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="main-btn primary-btn btn-hover btn-sm mt-3">Save</button>
            <button type="reset" class="main-btn warning-btn btn-hover btn-sm mt-3">Reset</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
