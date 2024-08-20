@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- BreathCrum -->
        @include('partials.breadcrumb')
        <form method="POST" action="{{ route('socialmedias.store') }}" enctype="multipart/form-data">
            <div class="card-style mt-20">

        @csrf
        <div class="row mt-15">

            <div class="col-sm-3">
                <div class="select-style-1">
                    <label for="company_website_id">Company Website <span class="mandatory">*</span></label>
                    <div class="select-position select-sm">
                        <select id="company_website_id" name="company_website_id" class="jSelectbox" required>
                            <option value="">Select Company Website</option>
                            @foreach ($companywebsite as $companywebsite)
                                <option value="{{ $companywebsite->id }}"> {{ $companywebsite->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="input-style-1">
                    <label>Name <span class="mandatory">*</span></label>
                    <input type="text" name="name" placeholder="Enter Name" required="true" />
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-style-1">
                    <label>Link <span class="mandatory">*</span></label>
                    <input type="text" name="link" placeholder="Enter Link" required="true" />
                </div>
            </div>
        </div>


        <div class="row mt-15">
            <div class="col-sm-3">
                <label>Image <span class="mandatory">*</span></label>
                <div id="iconBox">
                    <img id="selectedIcon" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
                </div>
                <input type="file" name="image" id="imageInput" onchange="displayIcon(this)">
            </div>

            <div class="col-sm-3">
                <label>Active <span class="mandatory">*</span></label><br>
                <label class="radio-inline">
                    <input type="radio" name="active" class="radio-inline" value="1"> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="active" class="radio-inline" value="0" checked> No
                </label>
            </div>
        </div>
    </div>

        <div class="row mt-15">
            <div class="col-sm-3">
                <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
            </div>
        </div>

    </div>
        </form>
</section>
@endsection
<script></script>
