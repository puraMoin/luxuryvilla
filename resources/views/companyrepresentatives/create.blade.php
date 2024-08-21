@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('companyrepresentatives.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('companyrepresentatives.store') }}" method="POST">
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

                        <div class="col-md-3">
                            <div class="input-style-1">
                              <label for="name">Name <span class="mandatory"> *</span></label>
                              <input type="text" id="name" placeholder="Enter Name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                              <label for="contact_1">Contact 1 <span class="mandatory"> *</span></label>
                              <input type="text" id="contact_1" placeholder="Enter Contact" name="contact_1" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                              <label for="email_1">Email 1 <span class="mandatory"> *</span></label>
                              <input type="text" id="email_1" placeholder="Enter Email" name="email_1" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-3">
                            <div class="input-style-1">
                              <label for="contact_2">Contact 2 <span class="mandatory"> *</span></label>
                              <input type="text" id="contact_2" placeholder="Enter Contact" name="contact_2" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                              <label for="email_2">Email 2 <span class="mandatory"> *</span></label>
                              <input type="text" id="email_2" placeholder="Enter Email" name="email_2" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                              <label for="fax">Fax <span class="mandatory"> *</span></label>
                              <input type="text" id="fax" placeholder="Enter Fax" name="fax" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
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
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
