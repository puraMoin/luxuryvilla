@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('taxaccesstocompanies.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('taxaccesstocompanies.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="select-style-1">
                                <label for="tax_master_id">Tax Master <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="tax_master_id" name="tax_master_id" class="jSelectbox" required>
                                        <option value="">Tax Master</option>
                                        @foreach ($taxmaster as $taxmasters)
                                            <option value="{{ $taxmasters->id }}"> {{ $taxmasters->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="companymaster">Company Master <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="companymaster" name="company_master_id" class="jSelectbox" required>
                                        <option value="">Select Company Master</option>
                                        @foreach ($companymasters as $companymaster)
                                            <option value="{{ $companymaster->id }}">{{ $companymaster->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Is Visible In Company </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_visible_in_company" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_visible_in_company" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Edit </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="edit" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="edit" class="radio-inline" value="0" checked> No
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Delete </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="delete" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="delete" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Access in Transcation </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="access_in_transaction" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="access_in_transaction" class="radio-inline" value="0" checked> No
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
