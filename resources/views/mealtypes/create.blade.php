@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('mealtypes.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('mealtypes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="alias">Alias <span class="mandatory"> *</span></label>
                                <input type="text" id="alias" name="alias" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="active">Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" id="active_yes" name="active" value="1" {{ old('active', '1') == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="active_no" name="active" value="0" {{ old('active') == '0' ? 'checked' : '' }}> No
                            </label>
                        </div> 
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="input-style-1">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="rich-editor" placeholder="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-sm mt-3">Save</button>
                            <button type="reset" class="main-btn warning-btn btn-hover btn-sm mt-3">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection