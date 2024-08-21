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
            <form method="POST" action="{{ route('destinations.update', $destination->id) }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
                    <!-- Form Start Here -->
                    @csrf
                    @method('PUT')
                    <div class="row mt-15">
                        <!-- Name  -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name<span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Enter Destination Name"
                                    value="{{ $destination->name }}" />
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
                                        <select class="jSelectbox" id="cityDropdown" name="city_id">
                                            <?php if(!empty($city)){ ?>
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @foreach ($othercities as $cities)
                                                <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                                            @endforeach
                                            <?php } else { ?>
                                                <option value="">Select</option>
                                            <?php } ?>
                                        </select>
                                    </div>
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
                                        placeholder="Enter One Line Description" value="{{ $destination->one_line_description }}" />
                                </div>
                            </div>

                            <!-- No of elements  -->
                            <div class="col-sm-4">
                                <div class="input-style-1">
                                    <label>No of Elements<span class="mandatory">*</span></label>
                                    <input type="text" name="no_of_elements_to_show" placeholder="Enter No of Elements" value="{{ $destination->no_of_elements_to_show }}"/>
                                </div>
                            </div>
                            <!-- Homepage Order  -->
                            <div class="col-sm-4">
                                <div class="input-style-1">
                                    <label>Homepage Order<span class="mandatory">*</span></label>
                                    <input type="text" name="homepage_order" placeholder="Enter Homepage Order" value="{{ $destination->homepage_order }}" />
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
                                    <input type="text" name="slug" placeholder="Enter Slug" value="{{ $destination->slug }}" />
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
                                    <input type="radio" name="active" class="radio-inline" value="1" {{ $destination->active == 1 ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" class="radio-inline" value="0" {{ $destination->active == 0 ? 'checked' : '' }} > No
                                </label>
                            </div>

                            <!-- Display Home Code -->
                            <div class="col-sm-4">
                                <label>Display Homepage</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="display_on_homepage" class="radio-inline" value="1" {{ $destination->display_on_homepage == 1 ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="display_on_homepage" class="radio-inline" value="0" {{ $destination->display_on_homepage == 0 ? 'checked' : '' }}> No
                                </label>
                            </div>
                            <!-- Display Home Code -->
                            <div class="col-sm-4">
                                <label>Is Top Destination</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_top_destination" class="radio-inline" value="1" {{ $destination->is_top_destination == 1 ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_top_destination" class="radio-inline" value="0" {{ $destination->is_top_destination == 0 ? 'checked' : '' }}> No
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
                                    <textarea name="description" class="rich-editor" placeholder="Description" rows="3">{{ $destination->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                       <!-- Row 4 -->
                      <div class="row mt-15">
                        <!-- Cover Image -->
                        <div class="col-sm-4">
                            <label>Cover Image<span class="mandatory">*</span></label>
                            <div id="imageBox">
                                <img id="selectedImage" src="{{ $destination->cover_image ? asset('images/destination/cover_image/' . $destination->id . '/' . $destination->cover_image) : asset('images/no-image.png') }}" alt="Selected Image">
                            </div>
                            <input type="file" name="cover_image" id="imageInput">
                        </div>

                        <!-- Header Image File -->
                        <div class="col-sm-4">
                            <label>Thumbnail Image<span class="mandatory">*</span></label>
                            <div id="HeaderBox">
                                <img id="selectedHeaderImage" src="{{ $destination->thumbnail_image ? asset('images/destination/thumbnail_image/' . $destination->id . '/' . $destination->thumbnail_image) : asset('images/no-image.png') }}" alt="Selected Image">
                            </div>
                            <input type="file" name="thumbnail_image" id="imageHeaderInput">
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
