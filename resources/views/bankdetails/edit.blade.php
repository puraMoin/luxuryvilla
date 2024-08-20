@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <!-- ========== Middle Content-wrapper start ========== -->
            <!-- Add New Button -->

            <!-- For Start Here -->
            <form method="POST" action="{{ route('bankdetails.update', $bankdetail->id) }}"
                enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
                    <!-- Form Start Here -->
                    @csrf
                    @method('PUT')
                    <div class="row mt-15">
                        <input type="hidden" name="modified_by" value="{{ $userId }}" />
                        <!-- Company Master -->
                            <div class="col-sm-3">
                                <div class="select-style-1">
                                    <label>Company Master</label>
                                    <div class="select-position select-sm">
                                        <select class="jSelectbox" id="actionDropdown" name="company_master_id" required>
                                            <option value="{{ $companymaster->id }}">{{ $companymaster->name }}</option>
                                            @foreach ($othercompanymasters as $key => $othercompanymaster)
                                                <option value="{{ $othercompanymaster->id }}">{{ $othercompanymaster->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <!-- Name  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name<span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Company Master Name"
                                    value="{{ $bankdetail->name }}" />
                            </div>
                        </div>
                        <!-- Alias  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Alias<span class="mandatory">*</span></label>
                                <input type="text" name="alias" placeholder="Enter Alias"
                                    value="{{ $bankdetail->alias }}" />
                            </div>
                        </div>
                        <!-- Sort Code  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Sort Code<span class="mandatory">*</span></label>
                                <input type="text" name="sort_code" placeholder="Enter Sort Code" value="{{ $bankdetail->sort_code }}" />
                            </div>
                        </div>
                        <hr>
                        <!-- Row 2 -->
                        <div class="row">                
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
                                            <option value="{{ $state ? $state->id : '' }}">{{ $state ? $state->name : 'Select a State' }}</option>
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
                                            <option value="{{ $city ? $city->id : '' }}">{{ $city ? $city->name : 'Select a City' }}</option>
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
                        <div class="row">
                            <!-- Account No  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Account No<span class="mandatory">*</span></label>
                                    <input type="text" name="account_no"
                                        placeholder="Enter Account No" />
                                </div>
                            </div>
                            <!-- Swift Code  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Swift Code<span class="mandatory">*</span></label>
                                    <input type="text" name="swift_code" placeholder="Enter Swift Code" value="{{ $bankdetail->swift_code }}" />
                                </div>
                            </div>
                            <!-- Iban No  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Iban No<span class="mandatory">*</span></label>
                                    <input type="text" name="iban_no" placeholder="Enter Iban No" value="{{ $bankdetail->iban_no }}" />
                                </div>
                            </div>   
                            <!-- Ifsc Code  -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Ifsc Code<span class="mandatory">*</span></label>
                                    <input type="text" name="ifsc_code" placeholder="Enter Ifsc Code" value="{{ $bankdetail->ifsc_code }}" />
                                </div>
                            </div>                         
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <!-- Bank Contact  -->                             
                          <div class="col-sm-3">
                              <div class="input-style-1">
                                  <label>Bank Contact<span class="mandatory">*</span></label>
                                  <input type="text" name="bank_contact" placeholder="Enter Bank Contact" value="{{ $bankdetail->bank_contact }}" />
                              </div>
                          </div> 
                          <!-- Connecting Bank Name  -->                              
                          <div class="col-sm-4">
                              <div class="input-style-1">
                                  <label>Connecting Bank Name<span class="mandatory">*</span></label>
                                  <input type="text" name="connecting_bank_name" placeholder="Enter Connecting Bank Name" value="{{ $bankdetail->connecting_bank_name }}" />
                              </div>
                          </div>     
                          <!-- Connecting Bank Ifsc Code  -->                             
                          <div class="col-sm-3">
                              <div class="input-style-1">
                                  <label>Connecting Bank Ifsc Code<span class="mandatory">*</span></label>
                                  <input type="text" name="connecting_bank_ifsc_code" placeholder="Enter Connecting Bank Ifsc Code" value="{{ $bankdetail->connecting_bank_ifsc_code }}" />
                              </div>
                          </div>                                                     
                          <!-- Active Code -->
                          <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ $bankdetail->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ $bankdetail->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                      </div>    
                      <hr>                    
                        <!-- Row 3 -->
                        <div class="row mt-15">
                            <!-- Address -->
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Address <span class="mandatory">*</span></label>
                                    <textarea name="address" class="rich-editor" placeholder="Address" rows="3">{{ $bankdetail->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Row 8 -->
                        <div class="row mt-15">
                            <!-- Google Address  -->
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Google Address <span class="mandatory">*</span></label>
                                    <textarea name="google_address" class="rich-editor" rows="3">{{ $bankdetail->google_address }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-15">
                    <br>
                    <div class="col-sm-3">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </form>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Change event for the country dropdown
        $('#StateactionDropdown').on('change', function() {
            var stateId = $(this).val();
            var baseUrl = "{{ url('/') }}";
            if (stateId) {
                // Make an AJAX request to get the states based on the selected country
                $.ajax({
                    type: 'GET',
                    datatype: 'json',
                    url: baseUrl + '/get-cities/' +
                    stateId, // Replace with the actual route to get states
                    success: function(data) {
                        // Clear the current options in the state dropdown
                        $('#cityDropdown').empty();
                        // Add the defualt select box
                        $('#cityDropdown').append('<option value="">Select</option>');
                        // Add the new options based on the response
                        $.each(data, function(key, value) {

                            $('#cityDropdown').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
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
