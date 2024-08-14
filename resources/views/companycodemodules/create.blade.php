@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('companycodemodules.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('companycodemodules.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ $userId }}">
                    <input type="hidden" name="modified_by" value="{{ $userId }}">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label for="title">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="title" name="name" class="form-control" required>
                            </div>
                        </div>
                    <!-- Company Code Category -->
                    <div class="col-sm-4">
                        <div class="select-style-1">
                        <label>Company Code Category</label>
                        <div class="select-position select-sm">
                        <select class="jSelectbox" id="actionDropdown" name="company_code_category_id" required>
                            <option value="">Select</option>          
                                
                            @foreach ($companycodeCategory as $companycodeCategory)

                                <option value="{{ $companycodeCategory->id }}">{{ $companycodeCategory->name }}</option>
            
                                @endforeach                                
                        </select>
                        </div>
                        </div>
                    </div>
                    <!-- Active -->
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
