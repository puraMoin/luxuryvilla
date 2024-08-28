@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('supplierpaymentpolicies.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('supplierpaymentpolicies.store') }}" method="POST">
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

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Payment Policy <span class="mandatory">*</span></label>
                                <input type="text" name="payment_policy" placeholder="Enter Payment Policy"  required="true" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Payment Days <span class="mandatory">*</span></label>
                                <input type="text" name="payment_days" placeholder="Enter Payment Day" class="numeric"  required="true" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Payment Percent <span class="mandatory">*</span></label>
                                <input type="text" name="payment_percent" placeholder="Enter a Percent"  class="numeric" required="true" />
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-15">
                            <div class="col-sm-12">
                               <div class="input-style-1">
                               <label>Description <span class="mandatory">*</span></label>
                                <textarea name="description" class="rich-editor" placeholder="description" rows="3"></textarea>
                               </div>
                            </div>
                          </div>
                          <hr>

                        <div class="col-sm-3">
                            <label>Is Before Service </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_before_service" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_before_service" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Status </label><br>
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
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                    <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
@endsection
