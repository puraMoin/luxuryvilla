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

                <form action="{{ route('contracts.update', $contracts->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" name="created_by" value="{{ $userId }}"> --}}
                    {{-- <input type="hidden" name="modified_by" value="{{ $userId }}"> --}}
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="supplier_id">Supplier <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="supplier_id" name="supplier_id" class="jSelectbox">
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @foreach ($suppliers as $suppliers)
                                            <option value="{{ $suppliers->id }}"> {{ $suppliers->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="property_id">Property <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="property_id" name="property_id" class="jSelectbox">
                                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                                        @foreach ($properties as $property)
                                            <option value="{{ $property->id }}"> {{ $property->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="currency_id">Currency <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="currency_id" name="currency_id" class="jSelectbox">
                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}"> {{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="cost_type_id">Cost Type <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="cost_type_id" name="cost_type_id" class="jSelectbox">
                                        <option value="{{ $costtype->id }}">{{ $costtype->name }}</option>
                                        @foreach ($costtypes as $costtype)
                                            <option value="{{ $costtype->id }}"> {{ $costtype->name }}</option>
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
                                    <select id="tax_id" name="tax_id" class="jSelectbox">
                                        <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                        @foreach ($taxes as $tax)
                                            <option value="{{ $tax->id }}"> {{ $tax->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="start_date">Start Date <span class="mandatory"> *</span></label>
                                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $contracts->start_date }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="end_date">End Date <span class="mandatory"> *</span></label>
                                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $contracts->end_date }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="service_charge_value">Service Charge Value <span class="mandatory"> *</span></label>
                                <input type="text" id="service_charge_value" name="service_charge_value" class="form-control" value="{{ $contracts->service_charge_value }}" >
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Terms & Condition <span class="mandatory">*</span></label>
                                    <textarea name="terms_and_conditions" class="rich-editor" placeholder="terms_and_conditions" rows="3">{{ $contracts->terms_and_conditions }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="col-sm-3">
                            <label>Service Charge Percentage</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="service_charge_percentage" class="radio-inline" value="1" {{ $contracts->service_charge_percentage == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="service_charge_percentage" class="radio-inline" value="0" {{ $contracts->service_charge_percentage == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ $contracts->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ $contracts->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Its Villa</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_villa" class="radio-inline" value="1" {{ $contracts->its_villa == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_villa" class="radio-inline" value="0" {{ $contracts->its_villa == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Its Apartment</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_apartment" class="radio-inline" value="1" {{ $contracts->its_apartment == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_apartment" class="radio-inline" value="0" {{ $contracts->its_apartment == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                    </div>
                </div>
                <div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="main-btn primary-btn  btn-sm btn-hover">Save</button>
                            <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
