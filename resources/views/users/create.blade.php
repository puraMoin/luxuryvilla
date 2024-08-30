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
     <div class="right-mob-left">
        <a href="{{ route('users.index') }}">
          <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
      </div>

    <!-- For Start Here -->
   <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      {{-- <div class="row mt-15">
         <!-- Email/Username -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Email/UserName<span class="mandatory">*</span></label>
            <input type="email"  name="email" placeholder="Enter Your Email" required="true" />
            </div>
        </div>
         <!-- Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Password<span class="mandatory">*</span></label>
            <input type="password"  name="password" placeholder="Enter Your Password" required="true" />
            </div>
         </div>
      </div>    --}}
       <div class="row mt-15">
         <h4>Basic Details:</h4>
         <!-- User Code -->
         <input type="hidden" name="role_id" value="{{ $userType }}" >
         <div class="col-sm-3 mt-10">
            <div class="input-style-1">
            <label>User Code<span class="mandatory">*</span></label>
            <input type="text" name="user_code"  required="true" value = "{{ $userCode }}" readonly />
            </div>
         </div>
         <!-- First Name -->
         <div class="col-sm-3 mt-10">
            <div class="input-style-1">
            <label>First Name<span class="mandatory">*</span></label>
            <input type="text"  name="first_name" placeholder="Enter Your First Name" required="true" />
            </div>
         </div>
         <!-- Last Name -->
         <div class="col-sm-3 mt-10">
            <div class="input-style-1">
            <label>Last Name<span class="mandatory">*</span></label>
            <input type="text"  name="last_name" placeholder="Enter Your Last Name" required="true" />
            </div>
         </div>
         <div  class="col-sm-3 mt-10">
            <div class="select-style-1">
            <label>Gender <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="gender" required>
                <option value="">Select Gender</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
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
            <input type="date"  name="dob" required="true" />
            </div>
         </div>
         <!-- Email -->
         <div class="col-sm-3">
            <div class="input-style-1">
               <label>Email<span class="mandatory">*</span></label>
               <input type="email"  name="email" placeholder="Enter Your Email" required="true" />
            </div>
         </div>
         <!-- Contact -->
         <div class="col-sm-3">
            <div class="input-style-1">
               <label>Contact<span class="mandatory">*</span></label>
               <input type="text"  name="contact_no" placeholder="Enter Your Contact" class="numeric" required="true" />
            </div>
         </div>
         <!-- Alternate No -->
          <div class="col-sm-3">
            <div class="input-style-1">
               <label>Alternate No<span class="mandatory">*</span></label>
               <input type="text"  name="mobile_no" placeholder="Enter Alternate No" class="numeric" required="true" />
            </div>
         </div>
       </div>
      <hr>
      <div class="row">
         <h4>Address Information:</h4>
         <div class="col-sm-12 mt-10">
            <div class="input-style-1">
            <label>Location (Only Area, City, State, Country)<span class="mandatory">*</span></label>
            <input type="text"  name="google_address" />
            </div>
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
                        <option value="">Select</option>
                           @foreach ($states as $state)
                              <option value="{{ $state->id }}">{{ $state->name }}</option>
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
                      <option value="">Select</option>
                   </select>
                   </div>
               </div>
            </div>
           <!-- Area -->
            <div class="col-sm-3">
               <div class="input-style-1">
               <label>Area<span class="mandatory">*</span></label>
               <input type="text"  name="area" placeholder="Enter Your Area" required="true" />
               </div>
            </div>
           <!-- Zip Code -->
           <div class="col-sm-3">
               <div class="input-style-1">
               <label>Zip Code<span class="mandatory">*</span></label>
               <input type="text" name="zipcode" placeholder="Enter Your Zip Code" required="true" />
               </div>
           </div>
            <!-- Address  -->
            <div class="col-sm-9">
               <div class="input-style-1">
                <label>Address <span class="mandatory">*</span></label>
                   <textarea name="address" rows="3"></textarea>
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
            <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
            </div>
            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
         </div>
         <div class="col-sm-3">
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
</div>
</section>
@endsection
<script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('selectedImage').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Change event for the country dropdown
        $('#StateactionDropdown').on('change', function () {
            var stateId = $(this).val();
            var baseUrl = "{{ url('/') }}";
            if (stateId) {
                // Make an AJAX request to get the states based on the selected country
                $.ajax({
                    type: 'GET',
                    datatype : 'json',
                    url: baseUrl + '/get-cities/' + stateId, // Replace with the actual route to get states
                    success: function (data) {
                       // Clear the current options in the state dropdown
                       $('#cityDropdown').closest('.select-position').replaceWith(`
                           <div class="select-position select-sm">
                              <select id="cityDropdown" class="jSelectbox" name="city_id" required>
                                    <option value="">Select</option>
                              </select>
                           </div>
                        `);
                       // Adding New Data to the Dropdown      
                       $('#cityDropdown').html(data);
                    }
                });
             } else {
                // If no country is selected, clear the state dropdown
                $('#cityDropdown').empty();
            }
        });
    });
</script>

