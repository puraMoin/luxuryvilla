@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('supplierextranets.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('supplierextranets.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="supplier_id">Supplier <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="supplier_id" name="supplier_id" class="jSelectbox">
                                        <option value="">Select Supplier</option>
                                        @foreach ($supplier as $suppliers)
                                            <option value="{{ $suppliers->id }}">{{ $suppliers->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="branch">Branch <span class="mandatory">*</span></label>
                                <input type="text" id="branch" name="branch" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="department">Department <span class="mandatory">*</span></label>
                                <input type="text" id="department" name="department" class="form-control" value="" required>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="designation">Designation <span class="mandatory">*</span></label>
                                <input type="text" id="designation" name="designation" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="email">Email <span class="mandatory">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="mobile">Mobile <span class="mandatory">*</span></label>
                                <input type="text" id="mobile" name="mobile" class="form-control numeric" value="" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" checked> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"> No
                            </label>
                        </div>

                    </div>
                </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="main-btn primary-btn btn-sm btn-hover">Save</button>
                            <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
