@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('facilities.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('facilities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <!-- Active Code --> 
                             <label>Active</label><br> 
                             <label class="radio-inline">
                             <input type="radio" name="active" class="radio-inline" value="1"> Yes
                             </label>
                            <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="0" checked> No
                            </label>
                         </div>

                      <!-- Icon Image -->
                        <div class="col-sm-4">
                            <label>Icon Image</label>
                            <div id="imageBox">
                            <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
                            </div>
                            <input type="file" name="icon_image" id="imageInput" onchange="displayImage(this)">
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>Description <span class="mandatory"> *</span></label>
                               <textarea name="description" class="form-control rich-editor" ></textarea>
                            </div>
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
