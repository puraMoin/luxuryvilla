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
         <!-- Name -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Country Name"  />
            </div>   
         </div>
         <!-- Alpha 2 Code -->
         <div class="col-sm-2">
            <div class="input-style-1">
            <label>Alpha 2 Code<span class="mandatory">*</span></label>
            <input type="text" maxlength="2"  name="alpha_2_code" placeholder="Alpha 2 Code"  />
            </div>   
         </div>
         <!-- Alpha 3 Code -->
         <div class="col-sm-2">
            <div class="input-style-1">
            <label>Alpha 3 Code</label>
            <input type="text" maxlength="3"  name="alpha_3_code" placeholder="Alpha 3 Code"  />
            </div>   
         </div>
         <!-- Calling Code --> 
         <div class="col-sm-2">
            <div class="input-style-1">
            <label >Calling Code</label>
            <input type="text" maxlength="5" name="calling_code" placeholder="Calling Code"  />
            </div>   
         </div>
      </div>
      <hr>
      <div class="row mt-15">
         <!-- Passport Validity Yrs Adult -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Passport Validity Yrs Adult<span class="mandatory">*</span></label>
            <input type="text" class="numeric"  name="passport_validity_in_yrs_adult" placeholder="Passport Validity Yrs Adult"  />
            </div>   
         </div>
         <!-- Passport Validity Yrs Child -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Passport Validity Yrs Child<span class="mandatory">*</span></label>
            <input type="text" maxlength="2" class="numeric" name="passport_validity_in_yrs_child" placeholder="Passport Validity Yrs Child"  />
            </div>   
         </div>
         <!-- Mobile No Min Length -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Mobile No Min Length</label>
            <input type="text" maxlength="3" class="numeric"  name="mobile_number_min_length" placeholder="Mobile No Min Length"/>
            </div>   
         </div>
         <!-- Mobile No Min Length --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label >Mobile No Min Length</label>
            <input type="text" maxlength="5" class="numeric"  name="mobile_number_max_length" placeholder="Mobile No Min Length"  />
            </div>   
         </div>
      </div>         
      <hr>
      <div class="row mt-15">
         <!-- Mobile Number Series -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Mobile Number Series<span class="mandatory">*</span></label>
            <input type="text" class="numeric"  name="mobile_number_series" placeholder="Mobile Number Series" />
            </div>   
         </div>
         <!-- Latitude -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Latitude<span class="mandatory">*</span></label>
            <input type="text" maxlength="2" name="latitude" placeholder="Latitude"  />
            </div>   
         </div>
         <!-- Longitude -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Latitude</label>
            <input type="text" maxlength="3"  name="longitude" placeholder="Latitude"/>
            </div>   
         </div>
         <!-- Mobile No Min Length --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label >Mobile No Min Length</label>
            <input type="text" maxlength="5"  name="mobile_number_max_length" placeholder="Mobile No Min Length"  />
            </div>   
         </div>
      </div>
      <hr>
      <div class="row mt-15">
         <!-- Country description -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Country description<span class="mandatory">*</span></label> 
             <textarea name="country_description" placeholder="Country description" rows="3"></textarea>
            </div>   
         </div>
         <!-- Country description -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Country description Website<span class="mandatory">*</span></label> 
             <textarea name="country_description_website" placeholder="Country description Website" rows="3"></textarea>
            </div>   
         </div>
      </div>   
      <hr>
      <div class="row mt-15">
         <!-- Small Description -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Small description<span class="mandatory">*</span></label> 
             <textarea name="small_description" placeholder="Small description" rows="3"></textarea>
            </div>   
         </div>
         <!-- Fast Facts -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Fast Facts<span class="mandatory">*</span></label> 
             <textarea name="fast_facts" placeholder="Fast Facts" rows="3"></textarea>
            </div>   
         </div>
      </div> 
      <hr>
      <div class="row mt-15">
         <!-- Is Domestic Country -->
         <div class="col-sm-3">
             <label>Is Domestic Country</label><br> 
             <label class="radio-inline">
             <input type="radio" name="is_domestic_country" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="is_domestic_country" class="radio-inline" value="0" checked> No
            </label>
         </div>
         <!-- Is State Allowed -->
         <div class="col-sm-3">
             <label>Is State Allowed</label><br> 
             <label class="radio-inline">
             <input type="radio" name="is_state_allowed" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="is_state_allowed" class="radio-inline" value="0" checked> No
            </label>
         </div>   
         <!-- Is Publish on Website -->
         <div class="col-sm-3">
             <label>Is Publish Website</label><br> 
             <label class="radio-inline">
             <input type="radio" name="is_publish_on_website" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="is_publish_on_website" class="radio-inline" value="0" checked> No
            </label>
         </div>   
         <!-- Active Code --> 
         <div class="col-sm-3">
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" checked> No
            </label>
         </div>      
      </div> 
      <hr>
      <div class="row mt-15">
          <!-- Cover Image -->
        <div class="col-sm-3">
         <label>Cover Image</label>
          <div id="imageBox">
         <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="cover_image" id="imageInput" onchange="displayImage(this)">
        </div> 
                <!-- Icon Image -->
       <div class="col-sm-3">
         <label>Icon Image</label>
          <div id="iconBox">
         <img id="selectedIcon" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="icon_image" id="imageInput" onchange="displayIcon(this)">
        </div> 
      </div>  
      <div class="row mt-15">
       <div class="col-sm-3">  
        <button class="btn btn-info" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        </div>
      </div>  

	</div>
</form>
</section>	
@endsection

