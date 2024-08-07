@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
            <form method="POST" action="{{ route('companymasters.update', $companymaster->id) }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
                    <!-- Form Start Here -->
                    @csrf
                    @method('PUT')
                    <div class="row mt-15">
                        <input type="hidden" name="modified_by" value="{{ $userId }}" />
                        <!-- Name  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name<span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Company Master Name" value="{{ $companymaster->name }}" />
                            </div>
                        </div>
                        <!-- Alias  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Alias<span class="mandatory">*</span></label>
                                <input type="text" name="alias" placeholder="Enter Alias" value="{{ $companymaster->alias }}" />
                            </div>
                        </div>
                        <!-- Regsitration No  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Regsitration No<span class="mandatory">*</span></label>
                                <input type="text" name="registration_no" placeholder="Enter Regsitration No" value="{{ $companymaster->registration_no }}" />
                            </div>
                        </div>
                        <!-- Vat No  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Vat No<span class="mandatory">*</span></label>
                                <input type="text" name="vat_no" placeholder="Enter Vat No" value="{{ $companymaster->vat_no }}" />
                            </div>
                        </div>
                        <hr>
                        <!-- Row 2 -->
                        <div class="row mt-15">
                            <!-- Business Registration Name  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Business Registration Name<span class="mandatory">*</span></label>
                                    <input type="text" name="business_registration_name"
                                        placeholder="Enter Business Registration Name"  value="{{ $companymaster->business_registration_name }}" />
                                </div>
                            </div>
                            <!-- Tin No  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Tin No<span class="mandatory">*</span></label>
                                    <input type="text" name="tin_no" placeholder="Enter Tin No" value="{{ $companymaster->tin_no }}" />
                                </div>
                            </div>
                            <!-- Currency Name -->
                            <div class="col-sm-3">
                                <div class="select-style-1">
                                    <label>Currency</label>
                                    <div class="select-position select-sm">
                                        <select class="jSelectbox" id="actionDropdown" name="currency_id" required>
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>

                                            @foreach ($othercurrencies as $key => $currency)
                                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Incorporate Name  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Incorporate Name<span class="mandatory">*</span></label>
                                    <input type="text" name="incorporate_name" placeholder="Enter Incorporate Name" value="{{ $companymaster->incorporate_name }}" />
                                </div>
                            </div>

                        </div>
                        <!-- Row 3 -->
                        <div class="row mt-15">
                            <!-- Website  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Website<span class="mandatory">*</span></label>
                                    <input type="text" name="website" placeholder="Enter Website" value="{{ $companymaster->website }}" />
                                </div>
                            </div>
                           <!-- Country Name -->
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Country</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="country_id" required>                                    
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @foreach ($othercountries as $key => $country)
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
                                      <select class="jSelectbox" id="StateactionDropdown" name="state_id" required>
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                          @foreach ($otherstates as $state)
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
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @foreach ($othercities as $cities)
                                        <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <hr>
                        <!-- Row 3 -->
                        <div class="row mt-15">
                            <!-- Address -->
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Address <span class="mandatory">*</span></label>
                                    <textarea name="address" class="rich-editor" placeholder="Address" rows="3">{{ $companymaster->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                         <!-- Row 4 -->                       
                        <div class="row mt-15">
                            <!-- Zip Code  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Zip Code <span class="mandatory">*</span></label>
                                    <input type="text" name="zipcode" placeholder="Enter Zip Code" value="{{ $companymaster->zipcode }}" />
                                </div>
                            </div>

                            <!-- Area -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Area <span class="mandatory">*</span></label>
                                    <input type="text" name="area" placeholder="Enter Area" value="{{ $companymaster->area }}" />
                                </div>
                            </div>

                            <!-- Phone Calling Code 1  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Phone Calling Code 1 <span class="mandatory">*</span></label>
                                    <input type="text" name="phone_calling_code_1" placeholder="Enter Phone Calling Code 1" value="{{ $companymaster->phone_calling_code_1 }}" />
                                </div>
                            </div>   
                            
                            <!-- Contact No 1 -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Contact No 1 <span class="mandatory">*</span></label>
                                    <input type="text" name="contact_no_1" placeholder="Enter Contact No 1" value="{{ $companymaster->contact_no_1 }}" />
                                </div>
                            </div>

                        </div>    
                        <hr>
                        <!-- Row 5 -->                        
                        <div class="row mt-15">
                            <!-- Phone Calling Code 2  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Phone Calling Code 2 <span class="mandatory">*</span></label> 
                                    <input type="text" name="phone_calling_code_2" placeholder="Enter Phone Calling Code 2" value="{{ $companymaster->phone_calling_code_2 }}" />
                                </div>
                            </div>
                            <!--Contact no 2  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Contact no 2 <span class="mandatory">*</span></label>
                                    <input type="text" name="contact_no_2" placeholder="Enter Contact no 2" value="{{ $companymaster->contact_no_2 }}" />
                                </div>
                            </div>     
                             <!-- Email  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Email <span class="mandatory">*</span></label>
                                    <input type="email" name="email" placeholder="Enter Email"  value="{{ $companymaster->email }}" />
                                </div>
                            </div>      
                              <!-- Fax  -->
                              <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Fax <span class="mandatory">*</span></label>
                                    <input type="text" name="fax" placeholder="Enter Fax" value="{{ $companymaster->fax }}" />
                                </div>
                            </div>                               
                        </div>    
                         <!-- Row 6 -->
                        <div class="row mt-15">
                              <!-- Note  -->                            
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Note <span class="mandatory">*</span></label>
                                    <textarea name="note" class="rich-editor" rows="3">{{ $companymaster->note }}</textarea>
                                </div>
                            </div>
                        </div>    
                        <!-- Row 7 -->
                        <div class="row mt-15">
                              <!-- Facebook Link  -->                             
                            <div class="col-sm-5">
                                <div class="input-style-1">
                                    <label>Facebook Link<span class="mandatory">*</span></label>
                                    <input type="text" name="facebook_link" placeholder="Enter Facebook Link" value="{{ $companymaster->facebook_link }}" />
                                </div>
                            </div> 
                            <!-- Twitter Link  -->                              
                            <div class="col-sm-5">
                                <div class="input-style-1">
                                    <label>Twitter<span class="mandatory">*</span></label>
                                    <input type="text" name="twitter_link" placeholder="Enter Twitter Link" value="{{ $companymaster->twitter_link }}" />
                                </div>
                            </div>                                                         
                            <!-- Active Code -->
                            <div class="col-sm-2">
                                <label>Active</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" class="radio-inline" value="1" {{ $companymaster->active == 1 ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" class="radio-inline" value="0" {{ $companymaster->active == 0 ? 'checked' : '' }}> No
                                </label>
                            </div>
                        </div>
                        <hr>
                         <!-- Row 8 -->
                         <div class="row mt-15">
                            <!-- Google Address  -->                            
                          <div class="col-sm-12">
                              <div class="input-style-1">
                                  <label>Google Address <span class="mandatory">*</span></label>
                                  <textarea name="google_address" class="rich-editor" rows="3">{{ $companymaster->google_address }}</textarea>
                              </div>
                          </div>
                      </div>  
                          <!-- Row 8 -->        
                          <div class="row mt-15">
                            <!-- Image File -->
                            <div class="col-sm-4">
                            @php
                                $filepath = asset('images/companymasters/image_file/' . $companymaster->id . '/' . $companymaster->image_file);
                                $headerfilepath = asset('images/companymasters/header_image_file/' . $companymaster->id . '/' . $companymaster->header_image_file);
                                $footerfilepath = asset('images/companymasters/footer_image_file/' . $companymaster->id . '/' . $companymaster->footer_image_file);
                            @endphp    
                                <label>Image File<span class="mandatory">*</span></label>
                                <div id="imageBox">
                                    <img id="selectedImage" src="{{ $companymaster->image_file ? $filepath : asset('images/no-image.png') }}" alt="Selected Image">
                                </div>
                                <input type="file" name="image_file" id="imageInput">
                            </div>
    
                            <!-- Header Image File -->
                            <div class="col-sm-4">
                                <label>Header Image File<span class="mandatory">*</span></label>
                                <div id="HeaderBox">
                                    <img id="selectedHeaderImage" src="{{ $companymaster->header_image_file ? $headerfilepath : asset('images/no-image.png') }}" alt="Selected Image">
                                </div>
                                <input type="file" name="header_image_file" id="imageHeaderInput">
                            </div>  
                                <!-- Footer Image File -->
                                <div class="col-sm-4">
                                    <label>Footer Image File<span class="mandatory">*</span></label>
                                    <div id="FooterBox">
                                    <img id="selectedFooterImage" src="{{ $companymaster->footer_image_file ? $footerfilepath: asset('images/no-image.png') }}" alt="Selected Image">
                                    </div>
                                    <input type="file" name="footer_image_file" id="imageFooterInput">
                                </div>                                                        
                          </div>  
                                                          
                        <div class="row mt-15">
                            <hr>  
                            <div class="col-sm-3">
                                <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                                <button type="reset"
                                    class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
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
                        $('#cityDropdown').empty();
                        // Add the defualt select box
                        $('#cityDropdown').append('<option value="">Select</option>');
                        // Add the new options based on the response
                        $.each(data, function (key, value) {

                            $('#cityDropdown').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
             } else {
                // If no country is selected, clear the state dropdown
                $('#cityDropdown').empty();
            }
        });
    });
</script>


