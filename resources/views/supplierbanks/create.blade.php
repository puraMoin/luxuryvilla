@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('supplierbanks.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('supplierbanks.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-md-3">
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

                        <div class="col-md-3">
                            <div class="select-style-1">
                                <label for="currency_id">Currency <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="currency_id" name="currency_id" class="jSelectbox" required>
                                        <option value="">Select Currency</option>
                                        @foreach ($currency as $currency_id)
                                            <option value="{{ $currency_id->id }}"> {{ $currency_id->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name"placeholder="Enter a Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="branch">Branch <span class="mandatory"> *</span></label>
                                <input type="text" id="branch" name="branch" placeholder="Enter a Branch" class="form-control" required>
                            </div>
                        </div>
                    </div>
                <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="location">Location <span class="mandatory"> *</span></label>
                                <input type="text" id="location" name="location" placeholder="Enter a location" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="contact_no_1">Contact No <span class="mandatory"> *</span></label>
                                <input type="text" id="contact_no_1" name="contact_no_1" placeholder="Enter a Number" class="form-control numeric" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="contact_no_2">Alternate No <span class="mandatory"> *</span></label>
                                <input type="text" id="contact_no_2" name="contact_no_2" placeholder="Enter a Number" class="form-control numeric" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="fax">Fax <span class="mandatory"> *</span></label>
                                <input type="text" id="fax" name="fax" placeholder="Enter a Fax No" class="form-control numeric" required>
                            </div>
                        </div>

                    </div>
                <hr>
                    <div class="row">
                        <div class="row mt-15">
                            <div class="col-sm-12">
                               <div class="input-style-1">
                               <label>Address <span class="mandatory">*</span></label>
                                <textarea name="address" class="rich-editor" placeholder="address" rows="3"></textarea>
                               </div>
                            </div>
                          </div>
                        </div>
                <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="account_no">Account Number <span class="mandatory"> *</span></label>
                                <input type="text" id="account_no" name="account_no"placeholder="Enter Account Number" class="form-control numeric" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="account_type">Account Type <span class="mandatory"> *</span></label>
                                <input type="text" id="account_type" name="account_type"placeholder="Enter Account Type" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="swift_code">Swift Code <span class="mandatory"> *</span></label>
                                <input type="text" id="swift_code" name="swift_code"placeholder="Enter Swift Code" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="ifsc_code">IFSC Code <span class="mandatory"> *</span></label>
                                <input type="text" id="ifsc_code" name="ifsc_code" placeholder="Enter IFSC Code" class="form-control" required>
                            </div>
                        </div>
                    </div>
                <hr>

                <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="iban_no">IBAN Number <span class="mandatory"> *</span></label>
                                <input type="text" id="iban_no" name="iban_no" placeholder="Enter IBAN Number" class="form-control numeric" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="email">Email <span class="mandatory"> *</span></label>
                                <input type="text" id="email" name="email"placeholder="Enter a Email" class="form-control" required>
                            </div>
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

                    </div>
                </div>
                <br>
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
