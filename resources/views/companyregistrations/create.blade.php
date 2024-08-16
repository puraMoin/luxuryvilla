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

      <form action="{{ route('companyregistrations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="created_by" class="form-control" value="{{$userId}}" required>
        <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>

        <div class="row">
        <div class="col-sm-3">
            <div class="select-style-1">
                <label for="company_master_id">Company Master <span class="mandatory">*</span></label>
                <div class="select-position select-sm">
                    <select id="company_master_id" name="company_master_id" class="jSelectbox" required>
                        <option value="">Select Company Master</option>
                        @foreach ($companymaster as $companymasters)
                            <option value="{{ $companymasters->id }}"> {{ $companymasters->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="select-style-1">
                <label for="company_text_information_id">Company Tax Info <span class="mandatory">*</span></label>
                <div class="select-position select-sm">
                    <select id="company_text_information_id" name="company_text_information_id" class="jSelectbox" required>
                        <option value="">Select Company Text Info</option>
                        @foreach ($companytextinformation as $companytextinformation)
                            <option value="{{ $companytextinformation->id }}"> {{ $companytextinformation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="input-style-1">
              <label for="registrationbody">Registration Body <span class="mandatory"> *</span></label>
              <input type="text" id="registrationbody" placeholder="Enter Registration Details" name="registration_body" class="form-control" required>
            </div>
        </div>

        <div class="col-md-3">
              <div class="input-style-1">
                <label for="registrationnumber">Registration Number <span class="mandatory"> *</span></label>
                <input type="text" id="registrationnumber" placeholder="Enter Registration Number" name="registration_number" class="form-control" required>
              </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="input-style-1">
              <label for="registrationexpirydate">Registration Expiry Date <span class="mandatory"> *</span></label>
              <input type="date" id="registrationexpirydate" placeholder="Enter Registration Number" name="registration_expiry_date" class="form-control" required>
            </div>
        </div>

        <div class="col-sm-3">
            <!-- Active Code -->
             <label>Active <span class="mandatory"> *</span></label><br>
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
</section>
@endsection
