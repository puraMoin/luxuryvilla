@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('taxes.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('taxes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name"placeholder="Enter a Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="code">Code <span class="mandatory"> *</span></label>
                                <input type="text" name="code"  placeholder="Enter a Code" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="value_in_percent">Value In Percent <span class="mandatory"> *</span></label>
                                <input type="text" class="numeric" id="value_in_percent" name="value_in_percent"  placeholder="Enter a Value" class="form-control" required>
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
