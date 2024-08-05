@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        @include('partials.breadcrumb')
        
        <!-- Form Start Here -->
        <form method="POST" action="{{ route('rolesrights.update', $rolesright->id) }}" enctype="multipart/form-data">  
            @csrf
            @method('PUT')
            <input type="hidden" name="modified_by" value="{{ $userId }}">
            <div class="card-style mt-20">
                <!-- Row 1 -->
                <div class="row mt-15">   
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="text" name="name" value="{{ $rolesright->name }}" placeholder="Name" required />
                        </div>   
                    </div>
                    
                    <!-- Assigned Dashboard ID -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Assigned Dashboard ID <span class="mandatory">*</span></label>
                            <input type="text" name="assigned_dashboard_id" value="{{ $rolesright->assigned_dashboard_id }}" placeholder="Assigned Dashboard ID" required />
                        </div>   
                    </div>
                    
                    <!-- Active Code --> 
                    <div class="col-sm-4"> 
                        <label>Active <span class="mandatory">*</span></label><br> 
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1" {{ $rolesright->active == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="0" {{ $rolesright->active == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Description -->
                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label for="description">Description <span class="mandatory">*</span></label>
                            <textarea name="description" id="description" class="rich-editor" placeholder="Description" rows="3" required>{{ $rolesright->description }}</textarea>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row mt-15">
                    <!-- Created At -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Created At</label>
                            <input type="text" name="created_at" value="{{ $rolesright->created_at }}" placeholder="Created At" readonly />
                        </div>   
                    </div>
                    
                    <!-- Updated At -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Updated At</label>
                            <input type="text" name="updated_at" value="{{ $rolesright->updated_at }}" placeholder="Updated At" readonly />
                        </div>   
                    </div>
                    
                    <!-- Created By -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Created By</label>
                            <input type="text" name="created_by" value="{{ $rolesright->created_by }}" placeholder="Created By" readonly />
                        </div>   
                    </div>
                </div>
                <hr>
                <div class="row mt-15">
                    <!-- Modified By -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Modified By</label>
                            <input type="text" name="modified_by" value="{{ $rolesright->modified_by }}" placeholder="Modified By" readonly />
                        </div>   
                    </div>
                </div>

                <hr>
                <div class="row mt-15">
                    <!-- Save and Reset Buttons -->
                    <div class="col-sm-3">  
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Update</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>  
            </div>
        </form>
    </div>
</section>  
@endsection
