@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('currency.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('currency.store') }}" method="POST">
                    @csrf
                    <div class="row"> 
                        <!-- ID -->
                        <input type="hidden" name="created_by" class="form-control" value="{{$userId}}" required>
                        <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <!-- ISO Code -->
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="iso_code">ISO code <span class="mandatory"> *</span></label>
                                <input type="text" class="numeric" id="iso_code" name="iso_code" class="form-control"
                                    required>
                            </div>
                        </div>

                        <!-- ISO Code Num -->
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="iso_code_num">ISO code Number <span class="mandatory"> *</span></label>
                                <input type="text" class="numeric" id="iso_code_num" name="iso_code_num" class="form-control"
                                    required>
                            </div>
                        </div>

                        <!-- Conversion Rate -->
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="conversion_rate">Conversion Rate <span class="mandatory"> *</span></label>
                                <input type="text" class="numeric" id="conversion_rate" name="conversion_rate"
                                    class="form-control" required>
                            </div>
                        </div>

                        <!-- Sign -->
                        <div class="col-sm-2">
                            <label>Sign <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="sign_yes" name="sign" class="radio-inline" value="yes"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="sign_no" name="sign" class="radio-inline" value="no"
                                    checked> No
                            </label>
                        </div>
                    </div>
                    <hr>
                  <div class="row">
                    <!-- Blank -->
                    <div class="col-sm-2">
                        <label>Blank <span class="mandatory"> *</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" id="sign_yes" name="blank" class="radio-inline" value="1"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="sign_no" name="blank" class="radio-inline" value="0" checked>
                            No
                        </label>
                    </div>

                    <!-- Format -->
                    <div class="col-sm-2">
                        <label>Format <span class="mandatory"> *</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" id="format_yes" name="format" class="radio-inline" value="1"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="format_no" name="format" class="radio-inline" value="0" checked>
                            No
                        </label>
                    </div>

                    <!-- Decimals -->
                    <div class="col-sm-2">
                        <label>Decimals <span class="mandatory"> *</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" id="decimals_yes" name="decimals" class="radio-inline" value="1">
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="decimals_no" name="decimals" class="radio-inline" value="0"
                                checked> No
                        </label>
                    </div>

                    <!-- Display on Frontend -->
                    <div class="col-sm-2">
                        <label>Disp Frontend <span class="mandatory"> *</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" id="display_yes" name="display_on_frontend" class="radio-inline"
                                value="1"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="display_no" name="display_on_frontend" class="radio-inline"
                                value="0" checked> No
                        </label>
                    </div>

                    <!-- Active Code -->
                    <div class="col-sm-4">
                        <label>Active <span class="mandatory"> *</span></label><br>
                        <label class="radio-inline">
                            <input type="radio" id="active_yes" name="active" class="radio-inline" value="1">
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="active_no" name="active" class="radio-inline" value="0"
                                checked> No
                        </label>
                    </div>
                </div>
                  </div>
                  <div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-sm mt-3">Save</button>
                            <button type="reset" class="main-btn warning-btn btn-hover btn-sm mt-3">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </section>
@endsection
