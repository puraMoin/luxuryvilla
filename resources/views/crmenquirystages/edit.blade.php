@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('crmenquirystages.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('crmenquirystages.update', $crmenquirystage->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" name="created_by" value="{{ $userId }}"> --}}
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $crmenquirystage->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="color_code">Color Code <span class="mandatory"> *</span></label>
                                <input type="text" id="color_code" name="color_code" class="form-control" value="{{ $crmenquirystage->color_code }}" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ $crmenquirystage->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ $crmenquirystage->active == 0 ? 'checked' : '' }}> No
                            </label>
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
