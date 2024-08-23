@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container-fluid">
    <!-- BreadCrumb -->
    @include('partials.breadcrumb')
    <!-- Add New Button -->
    <div class="right-mob-left">
      <a href="{{ route('areaunits.create') }}">
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
              <th class="text-center"><h6>Status</h6></th>
              <th class="text-center"><h6>Action</h6></th>
            </tr>
          </thead>
          <tbody>
            @php $class = ''; $data = ''; @endphp

            @foreach ($areaunits as $areaunit)
            <tr>
              <td><p>{{ $areaunit->name }}</p></td>
              <td class="text-center">
                @php
                  if($areaunit->active == '1'){
                    $class = 'activelabel';
                    $data = 'Active';
                  } else {
                    $class = 'inactivelabel';
                    $data = 'Inactive';
                  }
                @endphp
                <div class="{{ $class }}">{{ $data }}</div>
              </td>
              <td class="text-center">
                <a href="{{ route('areaunits.edit', $areaunit->id) }}">
                  <i class="lni lni-pencil-alt"></i>
                </a>
                <a href="{{ route('areaunits.show', $areaunit->id) }}">
                  <i class="lni lni-list"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @include('partials.pagination', ['items' => $areaunits])
  </div>
</section>
@endsection
