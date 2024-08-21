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
        <div class="right-mob-left">
            <a href="{{ route('areaunits.index') }}">
              <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
            </a>
          </div>
        <!-- Form to Edit Property Details -->
        <form method="POST" action="{{ route('areaunits.update', $areaunits->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
            @method('PATCH')
            <div class="card-style mt-20">
                <!-- Form Start Here -->

                <div class="row mt-12">
                    <!-- Name -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label for="name">Name <span class="mandatory"> *</span></label>
                            <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name', $areaunits->name) }}" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Active</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="1" {{ old('active', $areaunits->active) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="0" {{ old('active', $areaunits->active) == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-12 text-left">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
