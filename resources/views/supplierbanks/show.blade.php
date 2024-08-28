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
                <a href="{{ route('supplierbanks.index') }}">
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
                                    <p> {{ $supplierbank->supplier ? $supplierbank->supplier->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Currency</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->currency ? $supplierbank->currency->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->name}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Branch</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->branch}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Location</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->location}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Address</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->address}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Contact Number</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->contact_no_1}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Alternate Number</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->contact_no_2}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Fax</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->fax}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->email}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Account Number</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->account_no}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Account Type</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->account_type}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Switf Code</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->swift_code}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>IFSC Code</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->ifsc_code}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>IBAN Number</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierbank->iban_no}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php
                                        $class = $supplierbank->active == '1' ? 'activelabel' : 'inactivelabel';
                                        $data = $supplierbank->active == '1' ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>

                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierbank->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierbank->updated_at }}</p>
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
