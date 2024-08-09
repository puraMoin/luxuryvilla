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

            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('financialyears.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $financialyears->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Is Current </h6>
                                </th>
                                <td class="text-left">
                                    @php
                                      if($financialyears->is_current_year == '1'){
                                        $class = 'activelabel';
                                        $data = 'Yes';
                                      } else {
                                        $class = 'inactivelabel';
                                        $data = 'No';
                                      }
                                    @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>
                                  </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Start Date</h6>
                                </th>
                                <td>
                                    <p>{{ $financialyears->start_date }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>End Date</h6>
                                </th>
                                <td>
                                    <p>{{ $financialyears->end_date }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p>{{ $financialyears->description }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Status</h6>
                                </th>
                                <th class="text-left">
                                    @php
                                      if($financialyears->active == '1'){
                                        $class = 'activelabel';
                                        $data = 'Active';
                                      } else {
                                        $class = 'inactivelabel';
                                        $data = 'Inactive';
                                      }
                                    @endphp
                                    <div class="{{ $class }}"> {{ $data }}</div>
                                  </th>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $financialyears->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Updated At</h6>
                                </th>
                                <td>
                                    <p>{{ $financialyears->updated_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created By</h6>
                                </th>
                                <td>
                                    <p>{{$financialyears->createdBy->name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Managed By</h6>
                                </th>
                                <td>
                                    <p>{{$financialyears->modifiedBy->name}}</p>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
