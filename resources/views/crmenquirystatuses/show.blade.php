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
                <a href="{{ route('crmenquirystatuses.index') }}">
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
                                    <h6>CRM Enquiry Stage</h6>
                                </th>
                                <td>
                                    <p>{{ $crmenquirystatuses->enquirystage ? $crmenquirystatuses->enquirystage->name : '---'   }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $crmenquirystatuses->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Color Code</h6>
                                </th>
                                <td>
                                    <p>{{ $crmenquirystatuses->color_code ? $crmenquirystatuses->color_code : '---'}}</p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Status</h6></th>
                                <td>
                                    @php
                                        $statusClass = $crmenquirystatuses->active ? 'activelabel' : 'inactivelabel';
                                        $statusText = $crmenquirystatuses->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $statusClass }}">{{ $statusText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $crmenquirystatuses->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $crmenquirystatuses->updated_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created By</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Managed By</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
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
