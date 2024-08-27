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
                <a href="{{ route('supplieraccesstocompanies.index') }}">
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
                                    <h6>Supplier</h6>
                                </th>
                                <td>
                                    <p> {{ $supplieraccesstocompanies->supplier ? $supplieraccesstocompanies->supplier->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Company Master</h6>
                                </th>
                                <td>
                                    <p> {{ $supplieraccesstocompanies->companymaster ? $supplieraccesstocompanies->companymaster->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Is Visible In Company</h6></th>
                                <td>
                                    @php
                                        $supplieraccesstocompaniesClass = $supplieraccesstocompanies->is_visible_in_company ? 'activelabel' : 'inactivelabel';
                                        $supplieraccesstocompaniesText = $supplieraccesstocompanies->is_visible_in_company ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $supplieraccesstocompaniesClass }}">{{ $supplieraccesstocompaniesText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Edit</h6>
                                </th>
                                <td>
                                    @php
                                    $class = $supplieraccesstocompanies->edit == '1' ? 'activelabel' : 'inactivelabel';
                                    $data = $supplieraccesstocompanies->edit == '1' ? 'Yes' : 'No';
                                @endphp
                                <div class="{{ $class }}">{{ $data }}</div>

                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Delete</h6>
                                </th>
                                <td>
                                    @php
                                    $class = $supplieraccesstocompanies->delete == '1' ? 'activelabel' : 'inactivelabel';
                                    $data = $supplieraccesstocompanies->delete == '1' ? 'Yes' : 'No';
                                @endphp
                                <div class="{{ $class }}">{{ $data }}</div>
                                </td>
                            </tr>

                            {{-- <tr>
                                <th class='col-md-2'>
                                    <h6>Access in Transcation</h6>
                                </th>
                                <td>
                                    @php
                                        $class = $supplieraccesstocompanies->active == '1' ? 'activelabel' : 'inactivelabel';
                                        $data = $supplieraccesstocompanies->active == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>

                                </td>
                            </tr> --}}

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Access in Transcation</h6>
                                </th>
                                <td>
                                    @php
                                        $class = $supplieraccesstocompanies->access_in_transaction == '1' ? 'activelabel' : 'inactivelabel';
                                        $data = $supplieraccesstocompanies->access_in_transaction == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>

                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplieraccesstocompanies->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplieraccesstocompanies->updated_at }}</p>
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
