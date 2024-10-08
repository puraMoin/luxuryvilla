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
            <a href="{{ route('customerlists.index') }}">
                <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
            </a>
        </div>

        <!-- Form to Edit Agent Details -->
        <form method="POST" action="{{ route('customerlists.update', $customerlist->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="card-style mt-20">
                <!-- Form Start Here -->
                <div class="row mt-15">
                    <!-- Name -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label for="name">Name<span class="mandatory">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name', $customerlist->name) }}" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label for="email">Email<span class="mandatory">*</span></label>
                            <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email', $customerlist->email) }}" />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <!-- Contact -->
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label for="contact">Contact<span class="mandatory">*</span></label>
                            <input type="text" id="contact" name="contact" placeholder="Contact" value="{{ old('contact', $customerlist->contact) }}" />
                        </div>
                    </div>

                    <!-- Active -->
                    <div class="col-sm-6">
                        <label>Active</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', $customerlist->active) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', $customerlist->active) == 0 ? 'checked' : '' }}> No
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
