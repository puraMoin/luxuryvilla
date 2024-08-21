@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('agentcredittypes.index') }}">
            <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
    </div>

    <!-- For Start Here -->
   <form method="POST" action="{{ route('agentcredittypes.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <input type="hidden" name="created_by" value="{{ $userId }}">
         <input type="hidden" name="modified_by" value="{{ $userId }}">
          <!-- Name -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Name" required="true" />
            </div>
         </div>
         <div class="col-sm-6">
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
   </div>
      <div class="row mt-15">
       <div class="col-sm-3">
        <button class="main-btn primary-btn btn-hover btn-sm" type="submit">Save</button>
        <button class="main-btn primary-btn-outline btn-hover btn-sm" type="reset">Reset</button>
        </div>
      </div>
</form>
</section>
@endsection

