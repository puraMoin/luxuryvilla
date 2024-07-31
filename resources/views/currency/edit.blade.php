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

                <form action="{{ route('currency.update', $currency->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        
                        <!-- ID -->
                        <input type="hidden" name="created_by" class="form-control" value="{{$userId}}" required>
                        <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $currency->name }}" required>
                            </div>
                        </div>

                        <!-- ISO Code -->
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="iso_code">ISO code <span class="mandatory"> *</span></label>
                                <input type="text" id="iso_code" name="iso_code" class="form-control"
                                    value="{{ $currency->iso_code }}" required>
                            </div>
                        </div>

                        <!-- ISO Code Num -->
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="iso_code_num">ISO code Number <span class="mandatory"> *</span></label>
                                <input type="text" id="iso_code_num" name="iso_code_num" class="form-control"
                                    value="{{ $currency->iso_code_num }}" required>
                            </div>
                        </div>

                        <!-- Conversion Rate -->
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="conversion_rate">Conversion Rate <span class="mandatory"> *</span></label>
                                <input type="text" id="conversion_rate" name="conversion_rate" class="form-control"
                                    value="{{ $currency->conversion_rate }}" required>
                            </div>
                        </div>

                        <!-- Sign -->
                        <div class="col-sm-2">
                            <label>Sign <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="sign_yes" name="sign" value="yes" required
                                    {{ $currency->sign == 'yes' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="sign_no" name="sign" value="no"
                                    {{ $currency->sign == 'no' ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- Blank -->
                        <div class="col-sm-2">
                            <label>Blank <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="blank_yes" name="blank" value="1" required
                                    {{ $currency->blank == '1' ? 'checked' : '' }}> Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" id="blank_no" name="blank" value="0"
                                    {{ $currency->blank == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Format -->
                        <div class="col-sm-2">
                            <label>Format <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="format_yes" name="format" value="1" required
                                    {{ $currency->format == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="format_no" name="format" value="0"
                                    {{ $currency->format == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Decimals -->
                        <div class="col-sm-2">
                            <label>Decimals <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="decimals_yes" name="decimals" value="1" required
                                    {{ $currency->decimals == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="decimals_no" name="decimals" value="0"
                                    {{ $currency->decimals == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Display on Frontend -->
                        <div class="col-sm-2">
                            <label>Disp Frontend <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="display_on_frontend_yes" name="display_on_frontend" required
                                    value="1" {{ $currency->display_on_frontend == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="display_on_frontend_no" name="display_on_frontend"
                                    value="0" {{ $currency->display_on_frontend == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-2">
                            <label>Active <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="active_yes" name="active" value="1" required
                                    {{ $currency->active == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="active_no" name="active" value="0"
                                    {{ $currency->active == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="main-btn primary-btn btn-hover">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
