@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('companytextinformations.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('companytextinformations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" class="form-control" value="{{$userId}}" required>
                    <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
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
