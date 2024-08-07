@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('costtypes.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('costtypes.update', $costtypes->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified" value="{{ $userId }}">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="title">Title <span class="mandatory"> *</span></label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $costtypes->name }}" required>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <label>Active</label><br> 
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', $costtypes->active) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', $costtypes->active) == 0 ? 'checked' : '' }}> No
                            </label>
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
