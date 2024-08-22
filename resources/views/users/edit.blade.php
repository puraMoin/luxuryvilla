@extends('layouts.app')

@section('content')
   <style>
        #imageBox {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }


   </style>
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden"  name="id" value="{{ $user->id }}"  />
         <h4>Basic Details:</h4>
         <!-- User Code -->     
         <input type="hidden" name="role_id" value="{{ $user->role_id }}" >   
         <div class="col-sm-3 mt-10">
            <div class="input-style-1">
            <label>User Code<span class="mandatory">*</span></label>
            <input type="text" name="user_code"  required="true" value = "{{ $user->user_code }}" readonly />
            </div>   
         </div>
         <!-- First Name -->
         <div class="col-sm-3 mt-10">
            <div class="input-style-1">
            <label>First Name<span class="mandatory">*</span></label>
            <input type="text"  name="first_name" placeholder="Enter Your First Name" required="true" value = "{{ $user->first_name }}" />
            </div>   
         </div>
         <!-- Last Name -->
         <div class="col-sm-3 mt-10">
            <div class="input-style-1">
            <label>Last Name<span class="mandatory">*</span></label>
            <input type="text"  name="last_name" placeholder="Enter Your Last Name" required="true" value = "{{ $user->last_name }}" />
            </div>   
         </div>
         <div  class="col-sm-3 mt-10">
            <div class="select-style-1">
            <label>Gender <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="gender" required>               
                   <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                   <option value="{{ $otherGender }}">{{ $otherGender }}</option>
             </select>
             </div>
            </div>   
         </div>
        </div> 
        <div class="row">
         <!-- DOB -->          
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>DOB<span class="mandatory">*</span></label>
            <input type="date"  name="dob" required="true" value="{{ $user->dob }}" />
            </div>   
         </div>
         <!-- Email --> 
         <div class="col-sm-3">
            <div class="input-style-1">
               <label>Email<span class="mandatory">*</span></label>
               <input type="email"  name="email" placeholder="Enter Your Email" required="true" value="{{ $user->email }}" />
            </div>   
         </div>  
         <!-- Contact -->       
         <div class="col-sm-3">
            <div class="input-style-1">
               <label>Contact<span class="mandatory">*</span></label>
               <input type="text" name="contact_no" placeholder="Enter Your Contact" class="numeric" required="true" value="{{ $user->contact_no }}" />
            </div>   
         </div>
         <!-- Alternate No --> 
          <div class="col-sm-3">
            <div class="input-style-1">
               <label>Alternate No<span class="mandatory">*</span></label>
               <input type="text"  name="mobile_no" placeholder="Enter Alternate No" class="numeric" required="true" value="{{ $user->mobile_no }}" />
            </div>   
         </div>        
       </div>  
      <hr>
      <div class="row">
         <h4>Address Information:</h4>
         <div class="col-sm-12 mt-10">
            <div class="input-style-1">
            <label>Location (Only Area, City, State, Country)<span class="mandatory">*</span></label>
            <input type="text"  name="google_address" value="{{ $user->google_address }}" />
            </div>   
         </div>
         <div class="row">
            <!-- Country Name -->
            <div class="col-sm-3">
               <div class="select-style-1">
                     <label>Country</label>
                     <div class="select-position select-sm">
                        <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                        </select>
                        </div>  
                  </div>
               </div>
               <!-- State Name -->
               <div class="col-sm-3">
                  <div class="select-style-1">
                     <label>State</label>
                        <div class="select-position select-sm">
                           <select class="jSelectbox" id="StateactionDropdown" name="state_id" required>
                           <option value="{{ $state ? $state->id : '' }}">{{ $state ? $state->name : 'Select Your State' }}</option>
                              @foreach ($otherstates as $states)
                                 <option value="{{ $states->id }}">{{ $states->name }}</option>
                              @endforeach
                          </select>
                        </div>
                     </div>
                  </div>
               <!-- City Name -->
               <div class="col-sm-3">
                  <div class="select-style-1">
                     <label>City</label>
                     <div class="select-position select-sm">
                        <select class="jSelectbox" id="cityDropdown" name="city_id" required>
                         <option value="{{ $city ? $city->id : '' }}">{{ $city ? $city->name : 'Select Your City' }}</option>
                         @foreach ($othercities as $cities)
                            <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                         @endforeach                         
                      </select>
                      </div>
                  </div>
               </div>
              <!-- Area -->
               <div class="col-sm-3">
                  <div class="input-style-1">
                  <label>Area<span class="mandatory">*</span></label>
                  <input type="text" name="area" placeholder="Enter Your Area" required="true" value="{{ $user->area }}" />
                  </div>   
               </div>
              <!-- Zip Code -->
              <div class="col-sm-3">
                  <div class="input-style-1">
                  <label>Zip Code<span class="mandatory">*</span></label>
                  <input type="text" name="zipcode" placeholder="Enter Your Zip Code" required="true" value="{{ $user->zipcode }}" />
                  </div>   
              </div>
               <!-- Address  -->
               <div class="col-sm-9">
                  <div class="input-style-1">
                   <label>Address <span class="mandatory">*</span></label>
                      <textarea name="address" rows="3">{{ $user->address }}</textarea>
                  </div>
               </div>
         </div>    
         <hr>         
      </div>   
      <div class="row">
         <!-- UserName --> 
         <h4>Login Details:</h4>
         <div class="col-sm-3 mt-10">
            <div class="input-style-1">
            <label>UserName<span class="mandatory">*</span></label>
            <input type="email"  name="username" placeholder="Enter Your Username" required="true" 
             value="{{ $user->username }}"/>
            </div>   
         </div>

      <div class="col-sm-3 col-xs-3 mt-10" style="padding-right: 0px">
         <div class="input-style-1">
            <label>Password<span class="mandatory">*</span></label>            
            <input type="password" id="psw" name="password" autocomplete="off" required disabled placeholder="Enter your password"  value="{{ $user->password }}">
        </div>
      </div>
      <div class="col-sm-3 col-xs-3 mt-35" style="padding-left: 0px">
         <div class="input-style-1">
            <button type="button" class="btn btn-sm btn-warning changePassword" style="border-radius: 0px; height:42px"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
        </div>
      </div>
      
       </div>  
      <hr>     
      <div class="row">
         <h4>Profile Information:</h4>      
               <!-- Image -->
         <div class="col-sm-3">
            <label>Image</label>
            <div id="imageBox">
            <img id="selectedImage" src="{{ $user->image_file ? asset('images/users/image_file/' . $user->id . '/' . $user->image_file) : asset('images/no-image.png') }}" alt="Selected Image">
            </div>
            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
         </div> 
         <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $user->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $user->active == 0 ? 'checked' : '' }}> No
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

<script>
    function displayIcon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#selectedIcon').attr('src', e.target.result);
                $('#iconImage').text(input.files[0].name);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
      $('.changePassword').click(function(){
         $('#psw').prop('disabled',false);
         $('#psw').val('');
      });
   });
</script>