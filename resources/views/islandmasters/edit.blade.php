@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('partials.breadcrumb')
        <!-- Back Button -->
        <div class="right-mob-left">
            <a href="{{ route('islandmasters.index') }}">
                <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card-style mt-20">

            <form action="{{ route('islandmasters.update', $islandmaster->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="modified_by" value="{{ $userId }}">
                <input type="hidden" name="created_by" value="{{ $userId }}">
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="name">Name <span class="mandatory"> *</span></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $islandmaster->name }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="alias">Alias <span class="mandatory"> *</span></label>
                            <input type="text" id="alias" name="alias" class="form-control" value="{{ $islandmaster->alias }}" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label>Description <span class="mandatory">*</span></label>
                            <textarea name="description" class="rich-editor" placeholder="description" rows="3">{{ $islandmaster->description }}</textarea>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="main-btn primary-btn btn-sm btn-hover">Save</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
