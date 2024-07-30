@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        @include('partials.breadcrumb')

        <!-- Display success message if any -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Form to Edit Agent Details -->
        <form method="POST" action="{{ route('segments.update', $segment->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-style mt-20">
                <!-- Form Start Here -->

                <div class="row mt-12">
                <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
                    <!-- Name -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label for="name">Name <span class="mandatory"> *</span></label>
                            <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name', $segment->name) }}" />
                        </div>                        
                    </div>
                    <!-- Code -->
                    <div class="col-md-4">
                        <div class="input-style-1">
                        <label for="Code">Code <span class="mandatory"> *</span></label>
                        <input type="text" id="code" name="code" class="form-control" value="{{ $segment->code }}" required>
                        </div>
                    </div>                    
                    <!-- Active -->
                    <div class="col-sm-4">
                        <label>Active</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="1" {{ old('active', $segment->active) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="0" {{ old('active', $segment->active) == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>  
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-12 text-left">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Update</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
