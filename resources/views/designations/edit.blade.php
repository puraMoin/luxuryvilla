@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('designations.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('designations.update', $designation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $designation->name }}" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br> 
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', $designation->active) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', $designation->active) == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>                        
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>Description <span class="mandatory"> *</span></label>
                               <textarea name="description" class="form-control rich-editor">{{ $designation->description }}</textarea>
                            </div>
                        </div>
                    </div>                     
                </form>

            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="main-btn primary-btn  btn-sm btn-hover">Save</button>
                    <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                </div>
            </div>
        </div>

    </section>
@endsection
