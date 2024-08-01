@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        @include('partials.breadcrumb')
        <!-- ========== Middle Content-wrapper start ========== -->
        <!-- Edit Form -->
        <form method="POST" action="{{ route('countries.update', $countries->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-style mt-20">
                <!-- Form Start Here -->
                <div class="row mt-15">
                    <!-- Name -->
                    <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>     
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $countries->name) }}" placeholder="Country Name" />
                        </div>
                    </div>
                    <!-- Segments -->
                    <div  class="col-sm-3">
                        <div class="select-style-1">
                        <label>Segments <span class="mandatory"> *</span></label>
                        <div class="select-position select-sm">
                        <select class="jSelectbox" id="actionDropdown" name="segment_id" required>
                            <option value="{{ $segment->id }}">{{ $segment->name }}</option>  
                            <?php 
                                foreach ($othersegments as $othersegment){  ?>  
                            <option value="{{ $othersegment->id }}" >{{ $othersegment->name }}</option>
                            <?php } ?>   
                        </select>
                        </div>
                        </div>   
                    </div>                    
                    <!-- Alpha 2 Code -->
                    <div class="col-sm-2">
                        <div class="input-style-1">
                            <label>Alpha 2 Code <span class="mandatory">*</span></label>
                            <input type="text" maxlength="2" name="alpha_2_code" value="{{ old('alpha_2_code', $countries->alpha_2_code) }}" placeholder="Alpha 2 Code" />
                        </div>
                    </div>
                    <!-- Alpha 3 Code -->
                    <div class="col-sm-2">
                        <div class="input-style-1">
                            <label>Alpha 3 Code <span class="mandatory">*</span></label>
                            <input type="text" maxlength="3" name="alpha_3_code" value="{{ old('alpha_3_code', $countries->alpha_3_code) }}" placeholder="Alpha 3 Code" />
                        </div>
                    </div>
                    <!-- Calling Code -->
                    <div class="col-sm-2">
                        <div class="input-style-1">
                            <label>Calling Code <span class="mandatory">*</span></label>
                            <input type="text" maxlength="5" name="calling_code" value="{{ old('calling_code', $countries->calling_code) }}" placeholder="Calling Code" />
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Passport Validity Yrs Adult -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Passport Validity Yrs Adult <span class="mandatory">*</span></label>
                            <input type="text" class="numeric" name="passport_validity_in_yrs_adult" value="{{ old('passport_validity_in_yrs_adult', $countries->passport_validity_in_yrs_adult) }}" placeholder="Passport Validity Yrs Adult" />
                        </div>
                    </div>
                    <!-- Passport Validity Yrs Child -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Passport Validity Yrs Child <span class="mandatory">*</span></label>
                            <input type="text" maxlength="2" class="numeric" name="passport_validity_in_yrs_child" value="{{ old('passport_validity_in_yrs_child', $countries->passport_validity_in_yrs_child) }}" placeholder="Passport Validity Yrs Child" />
                        </div>
                    </div>
                    <!-- Mobile No Min Length -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Mobile No Min Length <span class="mandatory">*</span></label>
                            <input type="text" maxlength="3" class="numeric" name="mobile_number_min_length" value="{{ old('mobile_number_min_length', $countries->mobile_number_min_length) }}" placeholder="Mobile No Min Length" />
                        </div>
                    </div>
                    <!-- Mobile No Max Length -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Mobile No Max Length <span class="mandatory">*</span></label>
                            <input type="text" maxlength="5" class="numeric" name="mobile_number_max_length" value="{{ old('mobile_number_max_length', $countries->mobile_number_max_length) }}" placeholder="Mobile No Max Length" />
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Mobile Number Series -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Mobile Number Series <span class="mandatory">*</span></label>
                            <input type="text" class="numeric" name="mobile_number_series" value="{{ old('mobile_number_series', $countries->mobile_number_series) }}" placeholder="Mobile Number Series" />
                        </div>
                    </div>
                    <!-- Latitude -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Latitude <span class="mandatory">*</span></label>
                            <input type="text" maxlength="2" name="latitude" value="{{ old('latitude', $countries->latitude) }}" placeholder="Latitude" />
                        </div>
                    </div>
                    <!-- Longitude -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Longitude <span class="mandatory">*</span></label>
                            <input type="text" maxlength="3" name="longitude" value="{{ old('longitude', $countries->longitude) }}" placeholder="Longitude" />
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Page Url -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                        <label>Page Url<span class="mandatory">*</span></label>
                        <input type="text"   name="page_url" placeholder="Page Url" value="{{ $countries->page_url }}" required/>
                        </div>   
                    </div>
                    <!-- Canonical Url -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                        <label> Canonical Url <span class="mandatory">*</span></label>
                        <input type="text" name="canonical_url" placeholder="Canonical Url" value="{{ $countries->canonical_url }}" readonly required/>
                        </div>   
                    </div>
                </div> 
                <hr>
                <div class="row mt-15">
                    <!-- Country description -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Country description <span class="mandatory">*</span></label>
                            <textarea name="country_description" placeholder="Country description" rows="3">{{ old('country_description', $countries->country_description) }}</textarea>
                        </div>
                    </div>
                    <!-- Country description Website -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Country description Website <span class="mandatory">*</span></label>
                            <textarea name="country_description_website" placeholder="Country description Website" rows="3">{{ old('country_description_website', $countries->country_description_website) }}</textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Small Description -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Small description <span class="mandatory">*</span></label>
                            <textarea name="small_description" placeholder="Small description" rows="3">{{ old('small_description', $countries->small_description) }}</textarea>
                        </div>
                    </div>
                    <!-- Fast Facts -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Fast Facts <span class="mandatory">*</span></label>
                            <textarea name="fast_facts" placeholder="Fast Facts" rows="3">{{ old('fast_facts', $countries->fast_facts) }}</textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Is Domestic Country -->
                    <div class="col-sm-3">
                        <label>Is Domestic Country <span class="mandatory">*</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" name="is_domestic_country" class="radio-inline" value="1" {{ old('is_domestic_country', $countries->is_domestic_country) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_domestic_country" class="radio-inline" value="0" {{ old('is_domestic_country', $countries->is_domestic_country) == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                    <!-- Is State Allowed -->
                    <div class="col-sm-3">
                        <label>Is State Allowed <span class="mandatory">*</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" name="is_state_allowed" class="radio-inline" value="1" {{ old('is_state_allowed', $countries->is_state_allowed) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_state_allowed" class="radio-inline" value="0" {{ old('is_state_allowed', $countries->is_state_allowed) == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                    <!-- Is Publish on Website -->
                    <div class="col-sm-3">
                        <label>Is Publish Website <span class="mandatory">*</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" name="is_publish_on_website" class="radio-inline" value="1" {{ old('is_publish_on_website', $countries->is_publish_on_website) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_publish_on_website" class="radio-inline" value="0" {{ old('is_publish_on_website', $countries->is_publish_on_website) == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                    <!-- Active -->
                    <div class="col-sm-3">
                        <label>Active <span class="mandatory">*</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', $countries->active) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', $countries->active) == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Cover Image -->
                    <div class="col-sm-3">
                        <label>Cover Image <span class="mandatory">*</span></label>
                        <div id="imageBox">
                            <img id="selectedImage" src="{{ $countries->image_file ? asset('images/country/image_file/' . $countries->id . '/' . $countries->image_file) : asset('images/no-image.png') }}" alt="Selected Image">
                        </div>
                        <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
                    </div>
                </div>
                <div class="row mt-15">
                    <div class="col-sm-3">
                        <button class="btn btn-info" type="submit">Update</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

<script>
    function displayImage(input) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('selectedImage').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }

    function displayIcon(input) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('selectedIcon').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
</script>
