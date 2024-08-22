@extends('layouts.app')

@section('content')

<section class="section">
  <div class="container-fluid">
     <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('users.index') }}">
          <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
      </div>

    <!-- For Start Here -->
   <form method="POST" action="{{ route('users.update-password') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <!-- Old Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Old Password<span class="mandatory">*</span></label>
            <input type="password"  name="password" placeholder="Enter Old Password" required="true" />

            </div>
         </div>
         <!-- Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>New Password<span class="mandatory">*</span></label>
            <input type="password"  name="new_password" placeholder="Enter New Password" required="true" />

            </div>
         </div>

         <!-- Confirm Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Confirm Password<span class="mandatory">*</span></label>
            <input type="password"  name="confirm_password" placeholder="Enter Confirm Password" required="true" />

            </div>
         </div>
      </div>
    </div>
    <br>
       <div class="col-sm-3">
        <button type="submit" class="main-btn primary-btn  btn-sm btn-hover">Save</button>
        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
        </div>
      </div>

  </div>
</form>
</section>
@endsection


