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
   <form method="POST" action="{{ route('agentcredittypes.update', ['agentcredittype' => $agentcredittype->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->
         <input type="hidden" name="id" value="{{ $agentcredittype->id }}"  />
         <input type="hidden" name="modified_by" value="{{ $userId }}">
           <div class="row mt-15">
           <!-- Role Name -->
             <div class="col-sm-6">
                <div class="input-style-1">
                <label>Name<span class="mandatory">*</span></label>
                <input type="text"  name="name" placeholder="Role Name" value="{{ $agentcredittype->name }}"  />
                </div>
             </div>
           <!-- Active Code -->
         <div class="col-sm-6">
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $agentcredittype->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $agentcredittype->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
        </div>
      </div>
      <div class="row mt-15">
       <div class="col-sm-3">
        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
        </div>
      </div>

	</div>
</form>
</section>
@endsection



