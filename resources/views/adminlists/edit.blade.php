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

        <!-- Form to Edit Agent Details -->
        <form method="POST" action="{{ route('adminlists.update', $adminlist->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="card-style mt-20">
                <!-- Form Start Here -->
                <div class="row mt-15">
                    <!-- Name -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label for="name">Name<span class="mandatory">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name', $adminlist->name) }}" />
                        </div>
                    </div>

                    <!--User Name -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label for="name">Username<span class="mandatory">*</span></label>
                            <input type="text" id="name" name="username" placeholder="Username" value="{{ old('name', $adminlist->username) }}" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label for="email">Email<span class="mandatory">*</span></label>
                            <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email', $adminlist->email) }}" />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <!-- Contact -->
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label for="contact">Contact<span class="mandatory">*</span></label>
                            <input type="text" id="contact" name="contact" placeholder="Contact" value="{{ old('contact', $adminlist->contact) }}" />
                        </div>
                    </div>

                    <!-- Active -->
                    <div class="col-sm-4">
                        <label>Active</label><br> 
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', $adminlist->active) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', $adminlist->active) == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>

                </div>

                <div class="row mt-15">
                    <div class="col-sm-12 text-left">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Update</button>
                        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
