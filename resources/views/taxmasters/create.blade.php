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

                <form action="{{ route('taxmasters.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name"placeholder="Enter a Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="alias">Alias <span class="mandatory"> *</span></label>
                                <input type="text" id="alias" name="alias"placeholder="Enter a Alias" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label>Is Vat</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_vat" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_vat" class="radio-inline" value="0" checked> No
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <label>Is Mun Tax </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_municipality_tax" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_municipality_tax" class="radio-inline" value="0" checked> No
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <label>Active </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> No
                            </label>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-12">
                               <div class="input-style-1">
                               <label>Description <span class="mandatory">*</span></label>
                                <textarea name="description" class="rich-editor" placeholder="description" rows="3"></textarea>
                               </div>
                            </div>
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
