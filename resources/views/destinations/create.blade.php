@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('destinations.index') }}">
                  <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
              </div>

            <!-- For Start Here -->
            <form method="POST" action="{{ route('destinations.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
                    <!-- Form Start Here -->
                    @csrf
                    <div class="row mt-15">

                        <!-- Name  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name<span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Enter Destination Name" />
                            </div>
                        </div>
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
                                  <select class="jSelectbox" id="cityDropdown" name="city_id">
                                      <option value="">Select</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                        <hr>
                        <!-- Row 2 -->
                        <div class="row mt-15">
                            <!-- One Line Descriptoin  -->
                            <div class="col-sm-4">
                                <div class="input-style-1">
                                    <label>One Line Description<span class="mandatory">*</span></label>
                                    <input type="text" name="one_line_description"
                                        placeholder="Enter One Line Description" />
                                </div>
                            </div>

                            <!-- No of elements  -->
                            <div class="col-sm-4">
                                <div class="input-style-1">
                                    <label>No of Elements<span class="mandatory">*</span></label>
                                    <input type="text" name="no_of_elements_to_show" placeholder="Enter No of Elements" />
                                </div>
                            </div>
                            <!-- Homepage Order  -->
                            <div class="col-sm-4">
                                <div class="input-style-1">
                                    <label>Homepage Order<span class="mandatory">*</span></label>
                                    <input type="text" name="homepage_order" placeholder="Enter Homepage Order" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Row 3 -->
                        <div class="row mt-15">
                            <!-- Slug  -->
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Slug<span class="mandatory">*</span></label>
                                    <input type="text" name="slug" placeholder="Enter Slug" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Row 3 -->
                        <div class="row">
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

                            <!-- Display Home Code -->
                            <div class="col-sm-4">
                                <label>Display Homepage</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="display_on_homepage" class="radio-inline" value="1"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="display_on_homepage" class="radio-inline" value="0" checked> No
                                </label>
                            </div>
                            <!-- Display Home Code -->
                            <div class="col-sm-4">
                                <label>Is Top Destination</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_top_destination" class="radio-inline" value="1"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_top_destination" class="radio-inline" value="0" checked> No
                                </label>
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
                          <!-- Row 8 -->
                      <div class="row mt-15">
                        <!-- Cover Image -->
                        <div class="col-sm-4">
                            <label>Cover Image<span class="mandatory">*</span></label>
                            <div id="imageBox">
                                <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
                            </div>
                            <input type="file" name="cover_image" id="imageInput">
                        </div>

                        <!-- Header Image File -->
                        <div class="col-sm-4">
                            <label>Thumbnail Image<span class="mandatory">*</span></label>
                            <div id="HeaderBox">
                                <img id="selectedHeaderImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
                            </div>
                            <input type="file" name="thumbnail_image" id="imageHeaderInput">
                        </div>
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
