@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('countries.store') }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <input type="hidden" name="created_by" class="form-control" value="{{$userId}}" required>
         <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
         <!-- Name -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Country Name" required />
            </div>   
         </div>
         <!-- Segments -->
          <div  class="col-sm-3">
            <div class="select-style-1">
            <label>Segments <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="segment_id" required>
                <option value="">Select Segments</option>  
                 <?php 
                    foreach ($segmentsList as $segmentsId => $segment){  ?>  
                   <option value="{{ $segmentsId }}" >{{ $segment }}</option>
                 <?php } ?>   
             </select>
             </div>
            </div>   
         </div>
         <!-- Alpha 2 Code -->
         <div class="col-sm-2">
            <div class="input-style-1">
            <label>Alpha 2 Code <span class="mandatory">*</span></label>
            <input type="text" maxlength="2"  name="alpha_2_code" placeholder="Alpha 2 Code" required />
            </div>   
         </div>
         <!-- Alpha 3 Code -->
         <div class="col-sm-2">
            <div class="input-style-1">
            <label>Alpha 3 Code <span class="mandatory">*</span></label>
            <input type="text" maxlength="3"  name="alpha_3_code" placeholder="Alpha 3 Code" required />
            </div>   
         </div>
         <!-- Calling Code --> 
         <div class="col-sm-2">
            <div class="input-style-1">
            <label >Calling Code <span class="mandatory">*</span></label>
            <input type="text" maxlength="5" name="calling_code" placeholder="Calling Code"  required/>
            </div>   
         </div>
      </div>
      <hr>
      <div class="row mt-15">
         <!-- Passport Validity Yrs Adult -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Passport Validity Yrs Adult <span class="mandatory">*</span></label>
            <input type="text" class="numeric"  name="passport_validity_in_yrs_adult" placeholder="Passport Validity Yrs Adult"  required/>
            </div>   
         </div>
         <!-- Passport Validity Yrs Child -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Passport Validity Yrs Child <span class="mandatory">*</span></label>
            <input type="text" maxlength="2" class="numeric" name="passport_validity_in_yrs_child" placeholder="Passport Validity Yrs Child" required />
            </div>   
         </div>
         <!-- Mobile No Min Length -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Mobile No Min Length <span class="mandatory">*</span></label>
            <input type="text" maxlength="3" class="numeric"  name="mobile_number_min_length" placeholder="Mobile No Min Length" required />
            </div>   
         </div>
         <!-- Mobile No Min Length --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label >Mobile No Min Length <span class="mandatory">*</span></label>
            <input type="text" maxlength="5" class="numeric"  name="mobile_number_max_length" placeholder="Mobile No Min Length" required />
            </div>   
         </div>
      </div>         
      <hr>
      <div class="row mt-15">
         <!-- Mobile Number Series -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Mobile Number Series <span class="mandatory">*</span></label>
            <input type="text" class="numeric"  name="mobile_number_series" placeholder="Mobile Number Series" required/>
            </div>   
         </div>
         <!-- Latitude -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Latitude <span class="mandatory">*</span></label>
            <input type="text" maxlength="2" name="latitude" placeholder="Latitude" required />
            </div>   
         </div>
         <!-- Longitude -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Latitude <span class="mandatory">*</span></label>
            <input type="text" maxlength="3"  name="longitude" placeholder="Latitude" required />
            </div>   
         </div>
      </div>
      <hr>
      <div class="row mt-15">
         <!-- Page Url -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Url<span class="mandatory">*</span></label>
            <input type="text"   name="page_url" placeholder="Page Url" required/>
            </div>   
         </div>
         <!-- Canonical Url -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label> Canonical Url <span class="mandatory">*</span></label>
            <input type="text" name="canonical_url" placeholder="Canonical Url" readonly required/>
            </div>   
         </div>
      </div>   
      <hr>
      <div class="row mt-15">
         <!-- Country description -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Country description <span class="mandatory">*</span></label> 
             <textarea name="country_description" class="rich-editor" placeholder="Country description" rows="3"></textarea> 
            </div>   
         </div>
         <!-- Country description Website-->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label >Country description Website <span class="mandatory">*</span></label> 
             <textarea name="country_description_website" class="rich-editor" placeholder="Country description Website"  rows="3"></textarea>
            </div>   
         </div>
      </div>   
      <hr>
      <div class="row mt-15">
         <!-- Small Description -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Small description <span class="mandatory">*</span></label> 
             <textarea name="small_description" class="rich-editor" placeholder="Small description" rows="3"></textarea>
            </div>   
         </div>
         <!-- Fast Facts -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Fast Facts <span class="mandatory">*</span></label> 
             <textarea name="fast_facts" class="rich-editor" placeholder="Fast Facts"  rows="3"></textarea>
            </div>   
         </div>
      </div> 
      <hr>
      <div class="row mt-15">
         <!-- Is Domestic Country -->
         <div class="col-sm-3">
             <label>Is Domestic Country <span class="mandatory">*</span></label><br> 
             <label class="radio-inline">
             <input type="radio" name="is_domestic_country" required class="radio-inline" value="1"> Yes 
             </label>
            <label class="radio-inline">
            <input type="radio" name="is_domestic_country" required class="radio-inline" value="0" checked> No
            </label>
         </div>
         <!-- Is State Allowed -->
         <div class="col-sm-3">
             <label>Is State Allowed <span class="mandatory">*</span></label><br> 
             <label class="radio-inline">
             <input type="radio" name="is_state_allowed" requiredrequired class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="is_state_allowed" required class="radio-inline" value="0" checked> No
            </label>
         </div>   
         <!-- Is Publish on Website -->
         <div class="col-sm-3">
             <label>Is Publish Website <span class="mandatory">*</span></label><br> 
             <label class="radio-inline">
             <input type="radio" name="is_publish_on_website" required class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="is_publish_on_website" required class="radio-inline" value="0" checked> No
            </label>
         </div>   
         <!-- Active Code --> 
         <div class="col-sm-3">
             <label>Active <span class="mandatory">*</span></label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" required class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" required class="radio-inline" value="0" checked> No
            </label>
         </div>      
      </div> 
      <hr>
      <div class="row mt-15">
          <!-- Cover Image -->
        <div class="col-sm-3">
         <label>Image File<span class="mandatory">*</span></label>
          <div id="imageBox">
         <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
        </div> 
      </div>
      </div>
      <div>  
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