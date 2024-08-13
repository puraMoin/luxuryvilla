@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('cities.update', ['city' => $city->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->
         <input type="hidden" name="id" value="{{ $city->id }}"  />
         <input type="hidden" name="modified_by" value="{{ $userId }}"  />
         <!-- Country -->


        <div class="col-sm-3">
            <div class="select-style-1">
            <label>Country</label>
            <div class="select-position select-sm">
            <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
            </select>
            </div>
            </div>
        </div>


         <!--State-->
          <div class="col-sm-3">
            <div class="select-style-1">
               <label>State</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="stateDropdown" name="state_id" required>
                <option value="">Select State</option>
                @if(!empty($states))
                <?php foreach ($states as $key => $state) {
                    $selected =  ($city->state_id == $state->id) ? 'selected' : '';
                ?>
                    <option value="{{ $state->id }}" <?php echo $selected;?>>{{ $state->name }}</option>
                <?php } ?>
                @endif
               </select>
               </div>
            </div>
         </div>
             <!-- Name -->
            <div class="col-sm-3">
                <div class="input-style-1">
                    <label>Name<span class="mandatory">*</span></label>
                    <input type="text"  name="name" placeholder="State Name" value="{{ $city->name }}"  />
                </div>
            </div>
            <!-- City Code  -->
            <div class="col-sm-3">
                <div class="input-style-1">
                <label>City Code<span class="mandatory">*</span></label>
                <input type="text"  name="city_code" placeholder="City Code" value="{{ $city->city_code }}" />
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
            <input type="text"  name="latitude" placeholder="Latitude" value="{{ $city->latitude }}" />
            </div>
         </div>
         <!-- Longitude  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Longitude<span class="mandatory">*</span></label>
            <input type="text"  name="longitude" placeholder="Longitude" value="{{ $city->longitude }}" />
            </div>
         </div>
         <!-- Country Code  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Country Code<span class="mandatory">*</span></label>
            <input type="text"  name="country_code" id="CountryCode" placeholder="Country Code" value="{{ $city->country_code }}" />
            </div>
         </div>
         <!-- Country Name  -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Country Name<span class="mandatory">*</span></label>
            <input type="text"  name="country_name" id="CountryName" placeholder="Country Name" value="{{ $city->country_name }}" />
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
             <textarea name="description" class="rich-editor" placeholder="Description" rows="3" >{{ $city->description }}</textarea>
            </div>
         </div>
        </div>
        <hr>
        <!-- Row 4 -->
        <div class="row mt-15">
            <!-- Small Description -->
            <div class="col-sm-6">
               <div class="input-style-1">
               <label>Small Description <span class="mandatory">*</span></label>
                <textarea name="small_description" class="rich-editor" placeholder="Small Description" rows="3" >{{ $city->small_description }}</textarea>
               </div>
            </div>
            <!-- Fast Facts -->
            <div class="col-sm-6">
                <div class="input-style-1">
                <label>Fast Facts<span class="mandatory">*</span></label>
                 <textarea name="fast_facts" class="rich-editor" placeholder="Fast Facts" rows="3" >{{ $city->fast_facts }}</textarea>
                </div>
            </div>
        </div>
        <hr>
         <!-- Active Code -->
    <div class="row mt-15">
         <div class="col-sm-3">
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $city->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $city->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
         <div class="col-sm-3">
            <label>Publish Website</label><br>
            <label class="radio-inline">
            <input type="radio" name="is_publish_on_website" class="radio-inline" value="1" {{ $city->is_publish_on_website == 1 ? 'checked' : '' }}> Yes
            </label>
           <label class="radio-inline">
           <input type="radio" name="is_publish_on_website" class="radio-inline" value="0" {{ $city->is_publish_on_website == 0 ? 'checked' : '' }}> No
           </label>
        </div>
    </div>
      </div>
      <br>
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
                    url : baseUrl + '/get-states/' + countryId, // Replace with the actual route to get states
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

