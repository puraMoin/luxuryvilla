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

                <form action="{{ route('propertyimages.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="display_order">Display Order <span class="mandatory"> *</span></label>
                                <input type="text" id="display_order" name="display_order" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Is Cover Image </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_cover_image" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_cover_image" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <label>Status </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <hr>

                        <div class="col-sm-4">
                            <label>Image File<span class="mandatory">*</span></label>
                            <div id="HeaderBox">
                                <img id="selectedHeaderImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
                            </div>
                            <input type="file" name="image_file" id="imageHeaderInput">
                        </div>

                    </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                            <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
