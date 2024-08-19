@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('crmenquirystatuses.create') }}">
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
                                    <h6>CRM Enquiry Stage</h6>
                                </th>

                                <th>
                                    <h6>Name</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Color Code</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Status</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($crmenquirystatuse as $crmenquirystatuses)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td>
                                        <p></p>
                                    </td>

                                    <td>
                                        <p>{{ $crmenquirystatuses->name }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $crmenquirystatuses->color_code }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($crmenquirystatuses->active == '1'){
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
                                        <a href="{{ route('crmenquirystatuses.edit', $crmenquirystatuses->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('crmenquirystatuses.show', $crmenquirystatuses->id) }}">
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
