@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('suppliercancellationpolicies.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('suppliercancellationpolicies.store') }}" method="POST">
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
                            <div class="input-style-1">
                                <label for="cancelation_policy">Cancellation Policy <span class="mandatory"> *</span></label>
                                <input type="text" id="cancelation_policy" name="cancelation_policy"placeholder="Enter a Policy" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="payment_days">Payment Days <span class="mandatory"> *</span></label>
                                <input type="text" id="payment_days" name="payment_days"placeholder="Enter a Day" class="form-control numeric" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="payment_percent">Payment Percent <span class="mandatory"> *</span></label>
                                <input type="text" id="payment_percent" name="payment_percent"placeholder="Enter a Percent" class="form-control numeric" required>
                            </div>
                        </div>


                    </div>
                    <hr>
                    <div class="row">
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
