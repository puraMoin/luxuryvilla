@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('roles.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified_by" value="{{ $userId }}">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="alias">Alias <span class="mandatory"> *</span></label>
                                <input type="text" id="alias" name="alias" class="form-control" value="{{ $role->alias }}" required>
                            </div>
                        </div>

                        <!-- Full View -->
                        <div class="col-md-2">
                            <label>Full View <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="full_view_yes" name="full_view" value="1" required
                                    {{ $role->full_view == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="full_view_no" name="full_view" value="0"
                                    {{ $role->full_view == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Full Add -->
                        <div class="col-md-2">
                            <label>Full Add <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="full_add_yes" name="full_add" value="1" required
                                    {{ $role->full_add == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="full_add_no" name="full_add" value="0"
                                    {{ $role->full_add == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Full Edit -->
                        <div class="col-md-2">
                            <label>Full Edit <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="full_edit_yes" name="full_edit" value="1" required
                                    {{ $role->full_edit == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="full_edit_no" name="full_edit" value="0"
                                    {{ $role->full_edit == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Full Delete -->
                        <div class="col-md-2">
                            <label>Full Delete <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="full_delete_yes" name="full_delete" value="1" required
                                    {{ $role->full_delete == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="full_delete_no" name="full_delete" value="0"
                                    {{ $role->full_delete == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <html></html>
                        <!-- Description -->
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Description <span class="mandatory">*</span></label>
                                <textarea name="description" class="rich-editor" placeholder="description" rows="3">{{ $role->description }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <!-- Super Config -->
                        <div class="col-md-2">
                            <label>Super Config <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="super_config_yes" name="super_config" value="1" required
                                    {{ $role->super_config == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="super_config_no" name="super_config" value="0"
                                    {{ $role->super_config == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <!-- Config -->
                        <div class="col-sm-2">
                            <label>Config <span class="mandatory"> *</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="config_yes" name="config" value="1" required
                                    {{ $role->config == '1' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="config_no" name="config" value="0"
                                    {{ $role->config == '0' ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                    <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
                    <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </form>
            </div>
    </section>
@endsection
