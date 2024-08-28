@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('supplierbanks.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('supplierbanks.update', $supplierbank->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
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
                                <label for="currency_id">Currency <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="currency_id" name="currency_id" class="jSelectbox">
                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @foreach ($currencies as $currencies)
                                            <option value="{{ $currencies->id }}"> {{ $currencies->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory">*</span></label>
                                <input type="text" id="name" name="name"
                                    class="form-control" value="{{ $supplierbank->name }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="branch">Branch <span class="mandatory">*</span></label>
                                <input type="text" id="branch" name="branch"
                                    class="form-control" value="{{ $supplierbank->branch }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="location">Location <span class="mandatory">*</span></label>
                                <input type="text" id="location" name="location"
                                    class="form-control" value="{{ $supplierbank->location }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="contact_no_1">Contact No <span class="mandatory">*</span></label>
                                <input type="text" id="contact_no_1" name="contact_no_1"
                                    class="form-control numeric" value="{{ $supplierbank->contact_no_1 }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="contact_no_2">Alternate No <span class="mandatory">*</span></label>
                                <input type="text" id="contact_no_2" name="contact_no_2"
                                    class="form-control numeric" value="{{ $supplierbank->contact_no_2 }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="fax">Fax <span class="mandatory">*</span></label>
                                <input type="text" id="fax" name="fax"
                                    class="form-control numeric" value="{{ $supplierbank->fax }}"
                                    required>
                            </div>
                        </div>
                    </div>
                        <hr>
                        <div class="row">
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label for="address">Address <span class="mandatory">*</span></label>
                                    <textarea name="address" id="address" class="rich-editor" placeholder="Address" rows="3" required>{{ $supplierbank->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="account_no">Account No <span class="mandatory">*</span></label>
                                <input type="text" id="account_no" name="account_no"
                                    class="form-control numeric" value="{{ $supplierbank->account_no }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="account_type">Account Type <span class="mandatory">*</span></label>
                                <input type="text" id="account_type" name="account_type"
                                    class="form-control" value="{{ $supplierbank->account_type }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="swift_code">Swift Code <span class="mandatory">*</span></label>
                                <input type="text" id="swift_code" name="swift_code"
                                    class="form-control numeric" value="{{ $supplierbank->swift_code }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="ifsc_code">IFSC Code <span class="mandatory">*</span></label>
                                <input type="text" id="ifsc_code" name="ifsc_code"
                                    class="form-control numeric" value="{{ $supplierbank->ifsc_code }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="iban_no">IBAN No <span class="mandatory">*</span></label>
                                <input type="text" id="iban_no" name="iban_no"
                                    class="form-control numeric" value="{{ $supplierbank->iban_no }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="email">Email <span class="mandatory">*</span></label>
                                <input type="text" id="email" name="email"
                                    class="form-control" value="{{ $supplierbank->email }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ $supplierbank->active == 1 ? 'checked' : '' }}>
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ $supplierbank->active == 0 ? 'checked' : '' }}>
                                No
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
