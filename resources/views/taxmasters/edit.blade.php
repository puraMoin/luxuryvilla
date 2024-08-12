@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('taxmasters.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('taxmasters.update', $taxmaster->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $taxmaster->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="alias">Alias <span class="mandatory"> *</span></label>
                                <input type="text" id="alias" name="alias"placeholder="Enter a Alias" class="form-control" value="{{ $taxmaster->alias }}" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label>Is Vat</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_vat" class="radio-inline" value="1" {{ $taxmaster->is_vat == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_vat" class="radio-inline" value="0" {{ $taxmaster->is_vat == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <label>Is Mun Tax </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_municipality_tax" class="radio-inline" value="1" {{ $taxmaster->is_municipality_tax == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_municipality_tax" class="radio-inline" value="0" {{ $taxmaster->is_municipality_tax == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ $taxmaster->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ $taxmaster->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label for="description">Description <span class="mandatory">*</span></label>
                                    <textarea name="description" id="description" class="rich-editor" placeholder="Description" rows="3" required>{{ $taxmaster->description }}</textarea>
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
