@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('companywebsites.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">
                <form action="{{ route('companywebsites.update', $companywebsite->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified_by" class="form-control" value="{{ $userId }}" required>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" placeholder="Enter a Name" name="name"
                                    class="form-control" value="{{ $companywebsite->name }}" required>
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

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="websitetype">Website Type <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="websitetype" name="website_type_id" class="jSelectbox" required>
                                        <option value="{{ $websitetype->id }}">{{ $websitetype->name }}</option>
                                        @foreach ($websitetypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Country</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="link">Link <span class="mandatory"> *</span></label>
                                <input type="text" id="link" placeholder="Enter a Link" name="link"
                                    class="form-control" value="{{ $companywebsite->link }}" required>
                            </div>
                        </div>

                        <hr>
                        <div class="col-sm-6">
                            <!-- Active Code -->
                            <label>Active <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ $companywebsite->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ $companywebsite->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row mt-3">
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
