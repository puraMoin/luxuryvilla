@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('crmenquirystatuses.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('crmenquirystatuses.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="crm_enquiry_stage_id">CRM Enquiry Stage <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="crm_enquiry_stage_id" name="crm_enquiry_stage_id" class="jSelectbox" required>
                                        <option value="">CRM Enquiry Stage</option>
                                        {{-- @foreach ($companytextinformation as $companytextinformation)
                                            <option value="{{ $companytextinformation->id }}"> {{ $companytextinformation->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" placeholder="Enter a Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="color_code">Color Code <span class="mandatory"> *</span></label>
                                <input type="text" id="color_code" name="color_code" placeholder="Enter a Color Code" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Active </label><br>
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
