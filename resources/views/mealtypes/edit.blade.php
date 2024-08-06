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

                <form action="{{ route('mealtypes.update', $meal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $meal->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="alias">Alias <span class="mandatory"> *</span></label>
                                <input type="text" id="alias" name="alias" class="form-control" value="{{ $meal->alias }}" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br> 
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', $meal->active) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', $meal->active) == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <hr>
                        <html></html>
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Description <span class="mandatory">*</span></label>
                                <textarea name="description" class="rich-editor" placeholder="description" rows="3">{{ $meal->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="main-btn primary-btn btn-hover">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
