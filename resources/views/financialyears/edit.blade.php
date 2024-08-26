@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('financialyears.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('financialyears.update', $financialyears->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" name="created_by" value="{{ $userId }}"> --}}
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $financialyears->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="start_date">Start Date <span class="mandatory"> *</span></label>
                                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $financialyears->start_date }}" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="end_date">End Date <span class="mandatory"> *</span></label>
                                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $financialyears->end_date }}" required>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Is Current Year</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_current_year" class="radio-inline" value="1" {{ $financialyears->is_current_year == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_current_year" class="radio-inline" value="0" {{ $financialyears->is_current_year == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ $financialyears->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ $financialyears->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Description <span class="mandatory">*</span></label>
                                    <textarea name="description" class="rich-editor" placeholder="description" rows="3">{{ $financialyears->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="main-btn primary-btn  btn-sm btn-hover">Save</button>
                            <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
