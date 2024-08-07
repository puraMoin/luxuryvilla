@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container-fluid">
    <!-- BreadCrumb -->
    @include('partials.breadcrumb')
    <!-- Add New Button -->
    <div class="right-mob-left">
      <a href="{{ route('employeelists.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card-style mt-20">
      
      <form action="{{ route('employeelists.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-4">
            <div class="input-style-1">
              <label for="name">Name <span class="mandatory"> *</span></label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-style-1">
              <label for="username">Username <span class="mandatory"> *</span></label>
              <input type="email" id="username" name="username" class="form-control" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-style-1">
              <label for="email">Email <span class="mandatory"> *</span></label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-md-4">
            <div class="input-style-1">
              <label for="contact">Contact <span class="mandatory"> *</span></label>
              <input type="text" class="numeric" id="contact" name="contact" class="form-control" required>
            </div>
          </div>
          <div class="col-sm-4">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" checked> No
            </label>
         </div>
        </div>


        <div class="row">
          <div class="col-12">
            <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
        </div>
      </form>

    </div>
  </div>
</section>
@endsection
