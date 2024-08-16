@extends('layouts.app')

@section('content')
<section class="section">
<div class="container-fluid">
<!-- BreadCrumb -->
@include('partials.breadcrumb')
<!-- Add New Button -->
<div class="right-mob-left">
<a href="{{ route('companyregistrations.index') }}">
<button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
</a>
</div>
</div>
<div class="container-fluid">
<div class="card-style mt-20">
<form action="{{ route('companyregistrations.update', $companyregistrations->id) }}" method="POST">
@csrf
@method('PUT')
<input type="hidden" name="modified_by" class="form-control" value="{{ $userId }}" required>

<div class="row">
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
        <label for="company_text_information_id">Company TAX Info <span class="mandatory">*</span></label>
        <div class="select-position select-sm">
            <select id="company_text_information_id" name="company_text_information_id" class="jSelectbox" required>
                <option value="{{ $companytextinformation->id }}">{{ $companytextinformation->name }}</option>
                @foreach ($companytextinformations as $companytextinformations)
                    <option value="{{ $companytextinformations->id }}">{{ $companytextinformations->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="input-style-1">
        <label for="registrationbody">Registration Body <span class="mandatory"> *</span></label>
        <input type="text" id="registrationbody" placeholder="Enter Registration Details" name="registration_body"
        class="form-control" value="{{ $companyregistrations->registration_body }}" required>
    </div>
</div>

<div class="col-md-3">
        <div class="input-style-1">
        <label for="registrationnumber">Registration Number <span class="mandatory"> *</span></label>
        <input type="text" id="registrationnumber" placeholder="Enter Registration Number" name="registration_number"
        class="form-control" value="{{ $companyregistrations->registration_number }}" required>
        </div>
</div>
<hr>
<div class="col-md-3">
    <div class="input-style-1">
        <label for="registrationexpirydate">Registration Expiry Date <span class="mandatory"> *</span></label>
        <input type="date" id="registrationexpirydate" placeholder="Enter Registration Number" name="registration_expiry_date"
        class="form-control" value="{{ $companyregistrations->registration_expiry_date }}" required>
    </div>
</div>

<div class="col-sm-6">
    <!-- Active Code -->
    <label>Active <span class="mandatory"> *</span></label><br>
    <label class="radio-inline">
        <input type="radio" name="active" value="1"
            {{ $companyregistrations->active == 1 ? 'checked' : '' }}> Yes
    </label>
    <label class="radio-inline">
        <input type="radio" name="active" value="0"
            {{ $companyregistrations->active == 0 ? 'checked' : '' }}> No
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
