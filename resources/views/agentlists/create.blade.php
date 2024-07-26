@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container-fluid">
    <!-- BreadCrumb -->
    @include('partials.breadcrumb')
    <!-- Add New Button -->
    <div class="right-mob-left">
      <a href="{{ route('agentlists.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card-style mt-20">
      <h3>Add New Agent</h3>
      <form action="{{ route('agentlists.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="input-style-1">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-style-1">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="input-style-1">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-style-1">
              <label for="contact">Contact</label>
              <input type="text" id="contact" name="contact" class="form-control" required>
            </div>
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
