@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('financialyears.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="row">
                    <!-- Add any additional rows or content here -->
                </div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Name</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Is Current Year</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Start Date</h6>
                                </th>

                                <th class="text-center">
                                    <h6>End Date</h6>
                                </th>

                                {{-- <th class="text-center">
                                    <h6>Description</h6>
                                </th> --}}

                                <th class="text-center">
                                    <h6>Status</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($financialyears_pag as $financialyear)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td>
                                        <p>{{ $financialyear->name }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($financialyear->is_current_year == '1'){
                                            $class = 'activelabel';
                                            $data = 'Yes';
                                          } else {
                                            $class = 'inactivelabel';
                                            $data = 'No';
                                          }
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                      </td>

                                    <td class="text-center">
                                        <p>{{ $financialyear->start_date }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $financialyear->end_date }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($financialyear->active == '1'){
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
                                        <a href="{{ route('financialyears.edit', $financialyear->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('financialyears.show', $financialyear->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $financialyears_pag])
        </div>
    </section>
@endsection
