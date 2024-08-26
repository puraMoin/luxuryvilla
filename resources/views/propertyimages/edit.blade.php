@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('propertyimages.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('propertyimages.update', $propertyimages->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $propertyimages->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="display_order">Display Order <span class="mandatory"> *</span></label>
                                <input type="text" id="display_order" name="display_order" class="form-control"
                                    value="{{ $propertyimages->display_order }}" required>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Is Cover Image</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_cover_image" class="radio-inline" value="1"
                                    {{ $propertyimages->is_cover_image == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_cover_image" class="radio-inline" value="0"
                                    {{ $propertyimages->is_cover_image == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ $propertyimages->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ $propertyimages->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <hr>

                        <div class="col-sm-4">
                            @php
                                $filepath = asset(
                                    'images/propertyimages/image_file/' .
                                        $propertyimages->id .
                                        '/' .
                                        $propertyimages->image_file,
                                );
                            @endphp
                            <label>Image File<span class="mandatory">*</span></label>
                            <div id="imageBox">
                                <img id="selectedImage"
                                    src="{{ $propertyimages->image_file ? $filepath : asset('images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>
                            <input type="file" name="image_file" id="imageInput">
                        </div>
                    </div>
            </div>
            <div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="main-btn primary-btn btn-sm btn-hover">Save</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </section>
@endsection
