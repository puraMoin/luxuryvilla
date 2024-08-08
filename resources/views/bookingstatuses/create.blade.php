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
            <form method="POST" action="{{ route('bookingstatuses.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-style mt-20">
                    <!-- Form Start Here -->
                    <div class="row mt-15">
                        <input type="hidden" name="created_by" value="{{ $userId }}" />
                        <input type="hidden" name="modified_by" value="{{ $userId }}" />
                        <!-- Name -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Booking Name" />
                            </div>
                        </div>
                        <!-- Class -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Class <span class="mandatory">*</span></label>
                                <input type="text" name="class" placeholder="Booking Class" />
                            </div>
                        </div>
                        <!-- Paid -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Paid <span class="mandatory">*</span></label>
                                <input type="text" name="paid" placeholder="Booking Paid" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-15">
                        <!-- Email Template -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Email Template <span class="mandatory">*</span></label>
                                <input type="text" name="email_template" placeholder="Enter Email Template" />
                            </div>
                        </div>
                        <!-- Invoice -->
                        <div class="col-sm-4">
                            <label>Invoice <span class="mandatory">*</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" name="invoice" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="invoice" class="radio-inline" value="0" checked> No
                            </label>
                        </div>
                        <!-- Active -->
                        <div class="col-sm-2">
                            <label>Active <span class="mandatory">*</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> No
                            </label>
                        </div>
                        <!-- Image File -->
                        <div class="col-sm-4">
                            <label>Icon <span class="mandatory">*</span></label>
                            <div id="imageBox">
                                <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected icon">
                            </div>
                            <input type="file" name="icon" id="imageInput">
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
