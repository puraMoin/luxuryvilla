@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- BreathCrum -->
        @include('partials.breadcrumb')

        <!-- Edit Form -->
        <form method="POST" action="{{ route('socialmedias.update', ['socialmedia' => $socialmedias->id]) }}" enctype="multipart/form-data">
            <div class="card-style mt-20">
                <!-- Form Start Here -->
                @method('PUT')
                @csrf
                <div class="row mt-15">
                    <input type="hidden" name="id" value="{{ $socialmedias->id }}" />

                    <div class="col-sm-4">
                        <div class="select-style-1">
                            <label for="company_website_id">Company Website <span class="mandatory">*</span></label>
                            <div class="select-position select-sm">
                                <select id="company_website_id" name="company_website_id" class="jSelectbox" required>>
                                    <option value="{{ $companywebsite->id }}" selected>{{ $companywebsite->name }}</option>
                                    @foreach ($companywebsites as $companywebsites)
                                        <option value="{{ $companywebsites->id }}">{{ $companywebsites->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="text" name="name" placeholder="Enter Name" required="true" value="{{ $socialmedias->name }}" />
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Order <span class="mandatory">*</span></label>
                            <input type="text" name="order" placeholder="Enter Order" required="true" value="{{ $socialmedias->order }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label>Link <span class="mandatory">*</span></label>
                            <input type="text" name="link" placeholder="Enter Link" required="true" value="{{ $socialmedias->link }}" />
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <div class="col-sm-3">
                        @php
                        $filepath = asset( 'images/socialmediass/image/' . $socialmedias->id . '/' . $socialmedias->image );
                        @endphp

                    <label>Image <span class="mandatory">*</span></label>
                        <div id="imageBox">
                        <img id="selectedImage"
                            src="{{ $socialmedias->image ? $filepath : asset('images/no-image.png') }}" alt="Selected Image">
                        </div>

                    <input type="file" name="image" id="imageInput">
                    </div>

                    <div class="col-sm-3">
                        <label>Active <span class="mandatory">*</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1" {{ $socialmedias->active == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="0" {{ $socialmedias->active == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
            </div>
                <div class="row mt-15">
                    <div class="col-sm-3">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
