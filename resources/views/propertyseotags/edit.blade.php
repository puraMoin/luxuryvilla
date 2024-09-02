@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('propertyseotags.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('propertyseotags.update', $propertyseotag->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modified_by" class="form-control" value= "{{$userId}}" required>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="property_id">Property <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="property_id" name="property_id" class="jSelectbox">
                                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                                        @foreach ($properties as $property)
                                            <option value="{{ $property->id }}"> {{ $property->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory">
                                        *</span></label>
                                <input type="text" id="name" name="name"
                                    class="form-control" value="{{ $propertyseotag->name }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="keywords">Keywords <span class="mandatory">
                                        *</span></label>
                                <input type="text" id="keywords" name="keywords"
                                    class="form-control" value="{{ $propertyseotag->keywords }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ $propertyseotag->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ $propertyseotag->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label for="description">Description <span class="mandatory">*</span></label>
                                    <textarea name="description" id="description" class="rich-editor" placeholder="Description" rows="3" required>{{ $propertyseotag->description }}</textarea>
                                </div>
                            </div>
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
