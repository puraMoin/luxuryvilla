@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('supplieraccesstocompanies.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('supplieraccesstocompanies.update', $supplieraccesstocompanies->id) }}" method="POST">
                    @csrf
                    @method('PUT')

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
                                <label for="companymaster">Company Master <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="companymaster" name="company_master_id" class="jSelectbox" required>
                                        <option value="{{ $companymaster->id }}">{{ $companymaster->name }}</option>
                                        @foreach ($companymasters as $companymaster)
                                            <option value="{{ $companymaster->id }}">{{ $companymaster->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="access_in_transaction">Access in Transcation <span class="mandatory">
                                        *</span></label>
                                <input type="text" id="access_in_transaction" name="access_in_transaction"
                                    class="form-control" value="{{ $supplieraccesstocompanies->access_in_transaction }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Is Visible in Company</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_visible_in_company" class="radio-inline" value="1"
                                    {{ $supplieraccesstocompanies->is_visible_in_company == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_visible_in_company" class="radio-inline" value="0"
                                    {{ $supplieraccesstocompanies->is_visible_in_company == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <hr>
                        <div class="col-sm-3">
                            <label>Edit</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="edit" class="radio-inline" value="1"
                                    {{ $supplieraccesstocompanies->edit == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="edit" class="radio-inline" value="0"
                                    {{ $supplieraccesstocompanies->edit == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Delete</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="delete" class="radio-inline" value="1"
                                    {{ $supplieraccesstocompanies->delete == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="delete" class="radio-inline" value="0"
                                    {{ $supplieraccesstocompanies->delete == 0 ? 'checked' : '' }}> No
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
