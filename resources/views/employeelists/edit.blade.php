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
 
         <!-- Form to Edit Employee Details -->
         <form method="POST" action="{{ route('employeelists.update', $employeelists->id) }}" enctype="multipart/form-data">
             @csrf
             @method('PATCH')
 
             <div class="card-style mt-20">
                 <!-- Form Start Here -->
                 <div class="row mt-15">
                     <!-- Name -->
                     <div class="col-sm-4">
                         <div class="input-style-1">
                             <label for="name">Name <span class="mandatory"> * </span></label>
                             <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name', $employeelists->name) }}" />
                         </div>
                     </div>
 
                     <!-- Username -->
                     <div class="col-sm-4">
                         <div class="input-style-1">
                             <label for="username">Username <span class="mandatory"> * </span></label>
                             <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username', $employeelists->username) }}" />
                         </div>
                     </div>
 
                     <!-- Email -->
                     <div class="col-sm-4">
                         <div class="input-style-1">
                             <label for="email">Email <span class="mandatory"> * </span></label>
                             <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email', $employeelists->email) }}" />
                         </div>
                     </div>
                 </div>
 
                 <div class="row mt-15">
                     <!-- Contact -->
                     <div class="col-sm-4">
                         <div class="input-style-1">
                             <label for="contact">Contact <span class="mandatory"> * </span></label>
                             <input type="text" class="numeric" name="contact" placeholder="Contact" value="{{ old('contact', $employeelists->contact) }}" />
                         </div>
                     </div>
 
                     <!-- Active -->
                     <div class="col-sm-4">
                         <label>Active</label><br> 
                         <label class="radio-inline">
                             <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', $employeelists->active) == 1 ? 'checked' : '' }}> Active
                         </label>
                         <label class="radio-inline">
                             <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', $employeelists->active) == 0 ? 'checked' : '' }}> Inactive
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
 
 