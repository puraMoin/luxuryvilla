@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        @include('partials.breadcrumb')
        <div class="right-mob-left">
            <a href="{{ route('rolesrights.index') }}">
              <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
            </a>
          </div>

        <!-- Form Start Here -->
        <form method="POST" action="{{ route('rolesrights.store') }}" enctype="multipart/form-data">
            <div class="card-style mt-20">
                @csrf

                <!-- Hidden Fields -->
                <input type="hidden" name="created_by" value="{{ $userId }}">
                <input type="hidden" name="modified_by" value="{{ $userId }}">

                <!-- Row 1 -->
                <div class="row mt-15">
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label for="name">Name <span class="mandatory">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required />
                        </div>
                    </div>

                    <!-- Assigned Dashboard ID -->
                    <div class="col-sm-4">
                        <div class="select-style-1">
                            <label for="assigned_dashboard_id">Assigned Dashboard <span class="mandatory">*</span></label>
                            <div class="select-position select-sm">
                            <select id="assigned_dashboard_id" name="assigned_dashboard_id" class="jSelectbox" required>
                                <option value="">Select Assigned Dashboard</option>
                                @foreach($assignedDashboardList as $id => $name)
                                    <option value="{{ $id }}" {{ old('assigned_dashboard_id') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
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

                <!-- Description -->
                <div class="row mt-15">
                  <div class="col-sm-12">
                     <div class="input-style-1">
                     <label>Description <span class="mandatory">*</span></label>
                      <textarea name="description" class="rich-editor" placeholder="description" rows="3"></textarea>
                     </div>
                  </div>
                </div>
            </div>
                <div>

                <!-- Save and Reset Buttons -->
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
