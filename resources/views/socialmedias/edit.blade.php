@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <!-- Add New Button -->
            <form method="POST" action="{{ route('socialmedias.update', ['socialmedia' => $socialmedias->id]) }}"
                enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- Form Start Here -->
                    @method('PUT')
                    @csrf
                    <div class="row mt-15">
                        <input type="hidden" name="id" value="{{ $socialmedias->id }}" />
                        <div class="row mt-15">








                            <div class="col-sm-6">
                                <div class="input-style-1">
                                    <label>Name<span class="mandatory">*</span></label>
                                    <input type="text" name="name" placeholder="Enter Name" required="true"
                                        value="{{ $socialmedias->name }}" />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="input-style-1">
                                    <label>Link<span class="mandatory">*</span></label>
                                    <input type="text" name="link" placeholder="Enter Link" required="true"
                                        value="{{ $socialmedias->link }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <label>Image</label>
                                <div id="iconBox">
                                    <img id="selectedIcon"
                                        src="{{ $socialmedias->image
                                            ? asset('images/socialmedias/image/' . $socialmedias->id . '/' . $socialmedias->image)
                                            : asset('images/no-image.png') }}"
                                        alt="Selected Image">
                                </div>
                                <input type="file" name="image" id="imageInput" onchange="displayIcon(this)">
                                <span id="image">{{ $socialmedias->image }}</span>
                            </div>

                            <div class="col-sm-6">

                                <label>Active</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" class="radio-inline" value="1"
                                        {{ $socialmedias->active == 1 ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" class="radio-inline" value="0"
                                        {{ $socialmedias->active == 0 ? 'checked' : '' }}> No
                                </label>
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
    </section>
@endsection
