@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('partials.breadcrumb')
        <!-- ========== Middle Content-wrapper start ========== -->    
        <!-- Add New Button -->

        <!-- Form Start Here -->
        <form method="POST" action="{{ route('countries.update', $countries->id) }}" enctype="multipart/form-data">  
            @csrf
            @method('PUT')
            <div class="card-style mt-20">
                <!-- Form Start Here -->
                <div class="row mt-15">
                    <!-- Name -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="text" name="name" placeholder="Country Name" value="{{ $countries->name }}" />
                        </div>   
                    </div>
                    <!-- Alpha 2 Code -->
                    <div class="col-sm-2">
                        <div class="input-style-1">
                            <label>Alpha 2 Code <span class="mandatory">*</span></label>
                            <input type="text" maxlength="2" name="alpha_2_code" placeholder="Alpha 2 Code" value="{{ $countries->alpha_2_code }}" />
                        </div>   
                    </div>
                    <!-- Alpha 3 Code -->
                    <div class="col-sm-2">
                        <div class="input-style-1">
                            <label>Alpha 3 Code <span class="mandatory">*</span></label>
                            <input type="text" maxlength="3" name="alpha_3_code" placeholder="Alpha 3 Code" value="{{ $countries->alpha_3_code }}" />
                        </div>   
                    </div>
                    <!-- Calling Code --> 
                    <div class="col-sm-2">
                        <div class="input-style-1">
                            <label>Calling Code <span class="mandatory">*</span></label>
                            <input type="text" maxlength="5" name="calling_code" placeholder="Calling Code" value="{{ $countries->calling_code }}" />
                        </div>   
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Passport Validity Yrs Adult -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Passport Validity Yrs Adult <span class="mandatory">*</span></label>
                            <input type="text" class="numeric" name="passport_validity_in_yrs_adult" placeholder="Passport Validity Yrs Adult" value="{{ $countries->passport_validity_in_yrs_adult }}" />
                        </div>   
                    </div>
                    <!-- Passport Validity Yrs Child -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Passport Validity Yrs Child <span class="mandatory">*</span></label>
                            <input type="text" maxlength="2" class="numeric" name="passport_validity_in_yrs_child" placeholder="Passport Validity Yrs Child" value="{{ $countries->passport_validity_in_yrs_child }}" />
                        </div>   
                    </div>
                    <!-- Mobile No Min Length -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Mobile No Min Length <span class="mandatory">*</span></label>
                            <input type="text" maxlength="3" class="numeric" name="mobile_number_min_length" placeholder="Mobile No Min Length" value="{{ $countries->mobile_number_min_length }}" />
                        </div>   
                    </div>
                    <!-- Mobile No Max Length --> 
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Mobile No Max Length <span class="mandatory">*</span></label>
                            <input type="text" maxlength="5" class="numeric" name="mobile_number_max_length" placeholder="Mobile No Max Length" value="{{ $countries->mobile_number_max_length }}" />
                        </div>   
                    </div>
                </div>         
                <hr>
                <div class="row mt-15">
                    <!-- Mobile Number Series -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Mobile Number Series <span class="mandatory">*</span></label>
                            <input type="text" class="numeric" name="mobile_number_series" placeholder="Mobile Number Series" value="{{ $countries->mobile_number_series }}" />
                        </div>   
                    </div>
                    <!-- Latitude -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Latitude <span class="mandatory">*</span></label>
                            <input type="text" maxlength="2" name="latitude" placeholder="Latitude" value="{{ $countries->latitude }}" />
                        </div>   
                    </div>
                    <!-- Longitude -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Longitude <span class="mandatory">*</span></label>
                            <input type="text" maxlength="3" name="longitude" placeholder="Longitude" value="{{ $countries->longitude }}" />
                        </div>   
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Country description -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Country description <span class="mandatory">*</span></label> 
                            <textarea name="country_description" placeholder="Country description" rows="3">{{ $countries->country_description }}</textarea>
                        </div>   
                    </div>
                    <!-- Country description Website -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Country description Website <span class="mandatory">*</span></label> 
                            <textarea name="country_description_website" placeholder="Country description Website" rows="3">{{ $countries->country_description_website }}</textarea>
                        </div>   
                    </div>
                </div>   
                <hr>
                <div class="row mt-15">
                    <!-- Small Description -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Small description <span class="mandatory">*</span></label> 
                            <textarea name="small_description" placeholder="Small description" rows="3">{{ $countries->small_description }}</textarea>
                        </div>   
                    </div>
                    <!-- Fast Facts -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Fast Facts <span class="mandatory">*</span></label> 
                            <textarea name="fast_facts" placeholder="Fast Facts" rows="3">{{ $countries->fast_facts }}</textarea>
                        </div>   
                    </div>
                </div> 
                <hr>
                <div class="row mt-15">
                    <!-- Is Domestic Country -->
                    <div class="col-sm-3">
                        <label>Is Domestic Country <span class="mandatory">*</span></label><br> 
                        <label class="radio-inline">
                            <input type="radio" name="is_domestic_country" class="radio-inline" value="1" {{ $countries->is_domestic_country == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_domestic_country" class="radio-inline" value="0" {{ $countries->is_domestic_country == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                    <!-- Is State Allowed -->
                    <div class="col-sm-3">
                        <label>Is State Allowed <span class="mandatory">*</span></label><br> 
                        <label class="radio-inline">
                            <input type="radio" name="is_state_allowed" class="radio-inline" value="1" {{ $countries->is_state_allowed == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_state_allowed" class="radio-inline" value="0" {{ $countries->is_state_allowed == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>   
                    <!-- Is Publish on Website -->
                    <div class="col-sm-3">
                        <label>Is Publish Website <span class="mandatory">*</span></label><br> 
                        <label class="radio-inline">
                            <input type="radio" name="is_publish_on_website" class="radio-inline" value="1" {{ $countries->is_publish_on_website == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_publish_on_website" class="radio-inline" value="0" {{ $countries->is_publish_on_website == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>   
                    <!-- Active --> 
                    <div class="col-sm-3">
                        <label>Active <span class="mandatory">*</span></label><br> 
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1" {{ $countries->active == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="0" {{ $countries->active == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>      
                </div> 
                <hr>
                <div class="row mt-15">
                    <!-- Cover Image -->
                    <div class="col-sm-3">
                        <label>Cover Image <span class="mandatory">*</span></label>
                        <div id="imageBox">
                            <img id="selectedImage" src="{{ $countries->cover_image ? asset('storage/' . $countries->cover_image) : asset('images/no-image.png') }}" alt="Selected Image">
                        </div>
                        <input type="file" name="cover_image" id="imageInput" onchange="displayImage(this)">
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
    </div>
</section>	
@endsection
