@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('cities.index') }}">
            <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
    </div>

     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('cities.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <input type="hidden" name="created_by" value="{{ $userId }}"  />
         <input type="hidden" name="modified_by" value="{{ $userId }}"  />
         <!-- Country Name -->
         <div class="col-sm-3">
            <div class="select-style-1">
               <label>Country</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                  <option value="">Select</option>

                   @foreach ($countries as $country)

                     <option value="{{ $country->id }}">{{ $country->name }}</option>

                    @endforeach

               </select>
               </div>
            </div>
         </div>
         <!-- State Name -->
          <div class="col-sm-3">
            <div class="select-style-1">
               <label>State</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="stateDropdown" name="state_id" required>
                  <option value="">Select</option>
               </select>
               </div>
            </div>
         </div>
         <!-- Name  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="City Name"  />
            </div>
         </div>
         <!-- City Code  -->
         <div class="col-sm-2">
            <div class="input-style-1">
            <label>City Code<span class="mandatory">*</span></label>
            <input type="text"  name="city_code" placeholder="City Code" />
            </div>
         </div>
       </div>
       <hr>
       <!-- Row 2 -->
       <div class="row mt-15">

         <!-- Latitude  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Latitude<span class="mandatory">*</span></label>
            <input type="text"  name="latitude" placeholder="Latitude" />
            </div>
         </div>
         <!-- Longitude  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Longitude<span class="mandatory">*</span></label>
            <input type="text"  name="longitude" placeholder="Longitude" />
            </div>
         </div>
         <!-- Country Code  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Country Code<span class="mandatory">*</span></label>
            <input type="text"  name="country_code" id="CountryCode" placeholder="Country Code" />
            </div>
         </div>
         <!-- Country Name  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Country Name<span class="mandatory">*</span></label>
            <input type="text"  name="country_name" id="CountryName" placeholder="Country Name" />
            </div>
         </div>
      </div>
      <hr>
       <!-- Row 3 -->
       <div class="row mt-15">
         <!-- Description -->
         <div class="col-sm-12">
            <div class="input-style-1">
            <label>Description <span class="mandatory">*</span></label>
             <textarea name="description" class="rich-editor" placeholder="Description" rows="3"></textarea>
            </div>
         </div>
      </div>
      <hr>
      <div class="row mt-15">
         <!-- Small Description-->
         <div class="col-sm-6">
            <div class="input-style-1">
               <label >Small Description <span class="mandatory">*</span></label>
               <textarea name="small_description" class="rich-editor" placeholder="Small Description"  rows="3"></textarea>
            </div>
         </div>
         <!-- Fast Facts-->
         <div class="col-sm-6">
               <div class="input-style-1">
               <label >Fast Facts <span class="mandatory">*</span></label>
               <textarea name="fast_facts" class="rich-editor" placeholder="Fast Facts"  rows="3"></textarea>
               </div>
         </div>
      </div>
      <hr>
       <!-- Row 4 -->
       <div class="row mt-15">
       <!-- Is Publish Website -->
         <div class="col-sm-4">
               <label>Is Publish Website</label><br>
               <label class="radio-inline">
               <input type="radio" name="is_publish_on_website" class="radio-inline" value="1"> Yes
               </label>
            <label class="radio-inline">
            <input type="radio" name="is_publish_on_website" class="radio-inline" value="0" checked> No
            </label>
         </div>
       <!-- Active Code -->
         <div class="col-sm-4">
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Change event for the country dropdown
        $('#actionDropdown').on('change', function () {
            var countryId = $(this).val();
            var baseUrl = "{{ url('/') }}";
            if (countryId) {
                // Make an AJAX request to get the states based on the selected country
                $.ajax({
                    type: 'GET',
                    url: baseUrl + '/get-states/' + countryId, // Replace with the actual route to get states
                    success: function (data) {
                        // Clear the current options in the state dropdown
                        $('#stateDropdown').empty();
                        // Add the defualt select box
                        $('#stateDropdown').append('<option value="">Select</option>');
                        // Add the new options based on the response
                        $.each(data, function (key, value) {

                            $('#stateDropdown').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
             } else {
                // If no country is selected, clear the state dropdown
                $('#stateDropdown').empty();
            }
        });
    });
</script>

<script>
       $(document).ready(function () {
         $('#actionDropdown').on('change', function () {
            var countryId = $(this).val();
            var baseUrl = "{{ url('/') }}";
            if (countryId) {
                // Make an AJAX request to get the states based on the selected country
                $.ajax({
                    type: 'GET',
                    datatype : 'json',
                    url: baseUrl + '/get-countrydata/' + countryId, // Replace with the actual route to get states
                    success: function (data) {
                        // Clear the current value in the country code and country name column
                        $('#CountryName').val(data['countryName']);
                        $('#CountryCode').val(data['countryCode']);
                    }
                });
            }
         });
      });
</script>

