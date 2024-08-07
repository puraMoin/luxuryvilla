@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('rolesrights.update', ['rolesright' => $rolesright->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="modified_by" value="{{ $userId }}">

                <div class="card-style mt-20">
                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" value="{{ $rolesright->name }}" placeholder="Name"
                                    required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label for="assigned_dashboard_id">Assigned Dashboard <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="assigned_dashboard_id" name="assigned_dashboard_id" class="jSelectbox" required>
                                        <option value="{{ $assignedDashboard->id }}">{{ $assignedDashboard->name }}</option>
                                        @foreach ($assignedDashboardList as $dashboard)
                                            <option value="{{ $dashboard->id }}">{{ $dashboard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active <span class="mandatory">*</span></label><br>
                            <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1"{{ $rolesright->active == 1 ? 'checked' : '' }}> Yes</label>
                            <label class="radio-inline"><input type="radio" name="active" class="radio-inline" value="0"{{ $rolesright->active == 0 ? 'checked' : '' }}> No</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label for="description">Description <span class="mandatory">*</span></label>
                                <textarea name="description" id="description" class="rich-editor" placeholder="Description" rows="3" required>{{ $rolesright->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                            <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
