@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container-fluid">
    <!-- BreadCrumb -->
    @include('partials.breadcrumb')
    <!-- Add New Button -->
    <div class="right-mob-left">
      <a href="{{ route('employeelists.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card-style mt-20">
      <!-- Search Panel -->
      <div class="row"></div>
      <div class="table-wrapper table-responsive mt-10">
        <table class="table striped-table">
          <thead>
            <tr>
              <th><h6>Name</h6></th>
              {{-- <th><h6>Username</h6></th> --}}
              <th><h6>Email</h6></th>
              <th><h6>Contact</h6></th>
              <th class="text-center"><h6>Active</h6></th> 
              {{-- <th><h6>Created At</h6></th>
              <th><h6>Updated At</h6></th> --}}
              <th class="text-center"><h6>Action</h6></th> 
            </tr>
          </thead>
          <tbody>
            @php $class = ''; $data = ''; @endphp
            @foreach ($employeelists as $employee)
            <tr>
              <td><p>{{ $employee->name }}</p></td>
              {{-- <td><p>{{ $employee->username }}</p></td> --}}
              <td><p>{{ $employee->email }}</p></td>
              <td><p>{{ $employee->contact }}</p></td>
              <td class="text-center">
                @php
                  if($employee->active == '1'){
                    $class = 'activelabel';
                    $data = 'Yes';
                  } else {
                    $class = 'inactivelabel';
                    $data = 'No';
                  }
                @endphp
                <div class="{{ $class }}">{{ $data }}</div>
              </td>
              {{-- <td><p>{{ $employee->created_at }}</p></td>
              <td><p>{{ $employee->updated_at }}</p></td> --}}
              <td class="text-center">
                <a href="{{ route('employeelists.edit', $employee->id) }}">
                  <i class="lni lni-pencil-alt"></i>
                </a>
                <a href="{{ route('employeelists.show', $employee->id) }}">
                  <i class="lni lni-list"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody> 
        </table>
      </div>
    </div>
  </div>
</section>  
@endsection
