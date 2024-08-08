@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- Breadcrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('bookingstatuses.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-sm">Back</button>
                </a>
            </div>

            <!-- Form Start Here -->
            <form method="POST" action="{{ route('bookingstatuses.update', $bookingstatuses->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-style mt-20">
                    <!-- Form Start Here -->
                    <div class="row mt-15">
                        <input type="hidden" name="created_by" value="{{ $userId }}" />
                        <input type="hidden" name="modified_by" value="{{ $userId }}" />
                        <!-- Name -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" value="{{ $bookingstatuses->name }}" placeholder="Booking Name" />
                            </div>
                        </div>
                        <!-- Class -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Class <span class="mandatory">*</span></label>
                                <input type="text" name="class" value="{{ $bookingstatuses->class }}" placeholder="Booking Class" />
                            </div>
                        </div>
                        <!-- Paid -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Paid <span class="mandatory">*</span></label>
                                <input type="text" name="paid" value="{{ $bookingstatuses->paid }}" placeholder="Booking Paid" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-15">
                        <!-- Email Template -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Email Template <span class="mandatory">*</span></label>
                                <input type="text" name="email_template" value="{{ $bookingstatuses->email_template }}" placeholder="Enter Email Template" />
                            </div>
                        </div>
                        <!-- Invoice -->
                        <div class="col-sm-4">
                            <label>Invoice <span class="mandatory">*</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" name="invoice" class="radio-inline" value="1" {{ $bookingstatuses->invoice ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="invoice" class="radio-inline" value="0" {{ !$bookingstatuses->invoice ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <!-- Active -->
                        <div class="col-sm-2">
                            <label>Active <span class="mandatory">*</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ $bookingstatuses->active ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ !$bookingstatuses->active ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <!-- Icon File -->
                        <div class="col-sm-4 mt-15">
                            <label>Icon <span class="mandatory">*</span></label>
                            @php
                                $filepath = asset('images/bookingstatuses/icon/' . $bookingstatuses->id . '/' . $bookingstatuses->icon);
                                $imageExists = file_exists(public_path('images/bookingstatuses/icon/' . $bookingstatuses->id . '/' . $bookingstatuses->icon));
                            @endphp
                            <div id="imageBox">
                                <img id="icon" src="{{ $imageExists ? $filepath : asset('images/no-image.png') }}" alt="Selected icon">
                            </div>
                            <input type="file" name="icon" id="imageInput" onchange="previewImage(event)">
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-4">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('icon');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
