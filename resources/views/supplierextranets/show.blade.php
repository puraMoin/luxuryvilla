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
                <a href="{{ route('supplierextranets.index') }}">
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
                                    <p> {{ $supplierextranet->supplier ? $supplierextranet->supplier->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Branch</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierextranet->branch}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierextranet->name}} </p>
                                </td>
                            </tr>


                            <tr>
                                <th class='col-md-2'>
                                    <h6>Department</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierextranet->department}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierextranet->emmail}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Mobile</h6>
                                </th>
                                <td>
                                    <p> {{ $supplierextranet->mobile}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php
                                        $class = $supplierextranet->active == '1' ? 'activelabel' : 'inactivelabel';
                                        $data = $supplierextranet->active == '1' ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>

                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierextranet->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierextranet->updated_at }}</p>
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
