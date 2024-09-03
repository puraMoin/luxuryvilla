@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('contracts.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('contracts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="supplier_id">Supplier <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="supplier_id" name="supplier_id" class="jSelectbox" required>
                                        <option value="">Select Supplier</option>
                                        @foreach ($supplier as $supplier_id)
                                            <option value="{{ $supplier_id->id }}"> {{ $supplier_id->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="property_id">Property <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="property_id" name="property_id" class="jSelectbox" required>
                                        <option value="">Select Property</option>
                                        @foreach ($property as $property_id)
                                            <option value="{{ $property_id->id }}"> {{ $property_id->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="currency_id">Currency <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="currency_id" name="currency_id" class="jSelectbox" required>
                                        <option value="">Select currency</option>
                                        @foreach ($currency as $currency_id)
                                            <option value="{{ $currency_id->id }}"> {{ $currency_id->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="cost_type_id">Cost Type <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="cost_type_id" name="cost_type_id" class="jSelectbox" required>
                                        <option value="">Select Cost Type </option>
                                        @foreach ($costtype as $cost_type_id)
                                            <option value="{{ $cost_type_id->id }}"> {{ $cost_type_id->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                        <hr>
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="tax_id">Tax <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="tax_id" name="tax_id" class="jSelectbox" required>
                                        <option value="">Select Cost Type </option>
                                        @foreach ($tax as $tax_id)
                                            <option value="{{ $tax_id->id }}"> {{ $tax_id->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="start_date">Start Date <span class="mandatory"> *</span></label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="end_date">End Date <span class="mandatory"> *</span></label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="service_charge_value">Service Charge Value <span class="mandatory">
                                        *</span></label>
                                <input type="text" id="service_charge_value" name="service_charge_value"
                                    placeholder="Enter Service Charge Value" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label> Terms & Conditions <span class="mandatory">*</span></label>
                                <textarea name="terms_and_conditions" class="rich-editor" placeholder="Terms & Conditions" rows="3"></textarea>
                            </div>
                        </div>
                        <hr>


                        <div class="col-sm-3">
                            <label>Service Charge Percentage </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="service_charge_percentage" class="radio-inline" value="1">
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="service_charge_percentage" class="radio-inline" value="0"
                                    checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Active </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Its Villa </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_villa" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_villa" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Its Apartment </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_apartment" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_apartment" class="radio-inline" value="0" checked>
                                No
                            </label>
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
