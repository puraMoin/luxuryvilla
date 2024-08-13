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

      <form action="{{ route('companywebsites.store') }}" method="POST">
        @csrf
        <input type="hidden" name="created_by" class="form-control" value="{{$userId}}" required>
        <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>

        <div class="row">
          <div class="col-md-3">
            <div class="input-style-1">
              <label for="name">Name <span class="mandatory"> *</span></label>
              <input type="text" id="name" placeholder="Enter a Name" name="name" class="form-control" required>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="select-style-1">
                <label for="companymaster">Company Master <span class="mandatory">*</span></label>
                <div class="select-position select-sm">
                    <select id="companymaster" name="companymaster" class="jSelectbox" required>
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
                <label for="websitetype">Website Type <span class="mandatory">*</span></label>
                <div class="select-position select-sm">
                    <select id="websitetype" name="websitetype" class="jSelectbox" required>
                        <option value="">Select Website Type</option>
                        @foreach ($websitetype as $websitetypes)
                            <option value="{{ $websitetypes->id }}"> {{ $websitetypes->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="select-style-1">
                <label for="country">Country <span class="mandatory">*</span></label>
                <div class="select-position select-sm">
                    <select id="country" name="country" class="jSelectbox" required>
                        <option value="">Select Country</option>
                        @foreach ($country as $countries)
                            <option value="{{ $countries->id }}"> {{ $countries->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-style-1">
              <label for="Link">Link <span class="mandatory"> *</span></label>
              <input type="text" id="Link" placeholder="Enter a Link" name="link" class="form-control" required>
            </div>
        </div>

        <hr>
        <div class="col-sm-6">
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
        <div>
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
