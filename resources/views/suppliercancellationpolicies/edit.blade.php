@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('suppliercancellationpolicies.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('suppliercancellationpolicies.update', $suppliercancellationpolicy->id) }}" method="POST">
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


                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="cancelation_policy">Cancellation Policy <span class="mandatory">
                                        *</span></label>
                                <input type="text" id="cancelation_policy" name="cancelation_policy"
                                    class="form-control" value="{{ $suppliercancellationpolicy->cancelation_policy }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="payment_days">Payment Days <span class="mandatory">
                                        *</span></label>
                                <input type="text" id="payment_days" name="payment_days"
                                    class="form-control numeric" value="{{ $suppliercancellationpolicy->payment_days }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="payment_percent">Payment Percent <span class="mandatory">
                                        *</span></label>
                                <input type="text" id="payment_percent" name="payment_percent"
                                    class="form-control numeric" value="{{ $suppliercancellationpolicy->payment_percent }}"
                                    required>
                            </div>
                        </div>

                        <hr>
                        <div class="col-sm-3">
                            <label>Active </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1">
                                {{ $suppliercancellationpolicy->delete == 1 ? 'checked' : '' }} Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked>
                                {{ $suppliercancellationpolicy->delete == 1 ? 'checked' : '' }} No
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
