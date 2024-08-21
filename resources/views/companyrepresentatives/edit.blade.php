@extends('layouts.app')

@section('content')
<section class="section">
<div class="container-fluid">

@include('partials.breadcrumb')

<div class="right-mob-left">
<a href="{{ route('companyrepresentatives.index') }}">
<button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
</a>
</div>
</div>
<div class="container-fluid">
<div class="card-style mt-20">
<form action="{{ route('companyrepresentatives.update', $companyrepresentatives->id) }}" method="POST">
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

<div class="col-md-3">
    <div class="input-style-1">
        <label for="name">Name <span class="mandatory"> *</span></label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $companyrepresentatives->name }}" required>
    </div>
</div>
<div class="col-md-3">
    <div class="input-style-1">
        <label for="contact_1">Contact 1 <span class="mandatory"> *</span></label>
        <input type="text" id="contact_1" name="contact_1" class="form-control" value="{{ $companyrepresentatives->contact_1 }}" required>
    </div>
</div>
<div class="col-md-3">
    <div class="input-style-1">
        <label for="email_1">Email 1 <span class="mandatory"> *</span></label>
        <input type="text" id="email_1" name="email_1" class="form-control" value="{{ $companyrepresentatives->email_1 }}" required>
    </div>
</div>
<hr>
<div class="col-md-3">
    <div class="input-style-1">
        <label for="contact_2">Contact 2 <span class="mandatory"> *</span></label>
        <input type="text" id="contact_2" name="contact_2" class="form-control" value="{{ $companyrepresentatives->contact_2 }}" required>
    </div>
</div>
<div class="col-md-3">
    <div class="input-style-1">
        <label for="email_2">Email 2 <span class="mandatory"> *</span></label>
        <input type="text" id="email_2" name="email_2" class="form-control" value="{{ $companyrepresentatives->email_2 }}" required>
    </div>
</div>
<div class="col-md-3">
    <div class="input-style-1">
        <label for="fax">Fax <span class="mandatory"> *</span></label>
        <input type="text" id="fax" name="fax" class="form-control" value="{{ $companyrepresentatives->fax }}" required>
    </div>
</div>

<div class="col-sm-3">
    <label>Active <span class="mandatory"> *</span></label><br>
    <label class="radio-inline">
        <input type="radio" name="active" value="1"
            {{ $companyrepresentatives->active == 1 ? 'checked' : '' }}> Yes
    </label>
    <label class="radio-inline">
        <input type="radio" name="active" value="0"
            {{ $companyrepresentatives->active == 0 ? 'checked' : '' }}> No
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
