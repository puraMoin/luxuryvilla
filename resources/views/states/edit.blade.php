@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('states.update', ['state' => $states->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden"  name="id" value="{{ $states->id }}"  />
         <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
         <!-- Country Name -->
         <div class="col-sm-4">
            <div class="select-style-1">
               <label>Country</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="country_id">
                  <option value="{{ $country->name }}">{{ $country->name }}</option> 
                  @foreach ($countries as $country)
                     <option value="{{ $country->name }}">{{ $country->name }}</option>
                  @endforeach
               </select>
               </div>
            </div>
         </div>
          <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="State Name" value="{{ $states->name }}"  />
            </div>   
         </div>
          <!-- State Code -->
          <div class="col-sm-4">
            <div class="input-style-1">
            <label>State Code<span class="mandatory">*</span></label>
            <input type="text"  name="state_code" placeholder="State Code" value="{{ $states->state_code }}"  />
            </div>   
         </div>
      </div>
      <hr>    
      <div class="row mt-15">
         <div class="col-sm-6">
               <div class="input-style-1">
               <label>Page Url<span class="mandatory">*</span></label>
               <input type="text"  name="page_url" placeholder="Page Url" value="{{ $states->page_url }}"  />
               </div>   
         </div>
         <div class="col-sm-6">
               <div class="input-style-1">
               <label>Canonical Url<span class="mandatory">*</span></label>
               <input type="text" name="canonical_url"  placeholder="Canonical Url" value="{{ $states->canonical_url }}" />
               </div>   
         </div>
      </div>   
      <hr>   
      <div class="row mt-15">
          <!-- Latitude -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Latitude<span class="mandatory">*</span></label>
            <input type="text"  name="latitude" placeholder="Latitude" value="{{ $states->latitude }}"  />
            </div>   
         </div>
          <!-- Longitude -->
          <div class="col-sm-3">
            <div class="input-style-1">
            <label>Longitude<span class="mandatory">*</span></label>
            <input type="text"  name="longitude" placeholder="Longitude" value="{{ $states->longitude }}" />
            </div>   
         </div>         
         <!-- Publish on Website -->       
         <div class="col-sm-3">
             <label>Publish on Website</label><br> 
             <label class="radio-inline">
             <input type="radio" name="is_publish_on_website" class="radio-inline" value="1" {{ $states->is_publish_on_website == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="is_publish_on_website" class="radio-inline" value="0" {{ $states->is_publish_on_website == 1 ? 'checked' : '' }}> No
            </label>
         </div>
        <!-- Active Code -->         
         <div class="col-sm-3">
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $states->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $states->active == 1 ? 'checked' : '' }}> No
            </label>
         </div>
      </div> 
      <hr>         
   <div class="row mt-15">           
   <!--Small Description -->
      <div class="col-sm-6">
            <div class="input-style-1">
            <label for="small_description">Small description <span class="mandatory">*</span></label> 
             <textarea name="small_description" class="rich-editor" id="small_description" placeholder="Small description"  rows="3">{{ $states->small_description  }}</textarea>
            </div>   
      </div>
   <!-- Description -->
      <div class="col-sm-6">
            <div class="input-style-1">
            <label for="description">Description<span class="mandatory">*</span></label> 
             <textarea name="description" class="rich-editor" id="description" placeholder="Description"  rows="3">{{ $states->description  }}</textarea>
            </div>   
      </div> 
   </div> 
</div>
      <div class="row mt-15">
       <div class="col-sm-3">  
         <button type="submit" class="main-btn primary-btn btn-hover btn-sm mt-3">Save</button>
         <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm mt-3" >Reset</button>
        </div>
      </div>  

	</div>
</form>
</section>	
@endsection


