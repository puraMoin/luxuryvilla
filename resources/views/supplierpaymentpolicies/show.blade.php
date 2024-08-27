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
                <a href="{{ route('supplierpaymentpolicies.index') }}">
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
                                    <p> {{ $supplierpaymentpolicy->supplier ? $supplierpaymentpolicy->supplier->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Payment Policy</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierpaymentpolicy->payment_policy }}</p>
                                    
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Payment Days</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierpaymentpolicy->payment_days }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Payment in Percent</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierpaymentpolicy->payment_percent }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierpaymentpolicy->description }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Is Visible In Company</h6></th>
                                <td>
                                    @php
                                        $supplierpaymentpolicyClass = $supplierpaymentpolicy->is_visible_in_company ? 'activelabel' : 'inactivelabel';
                                        $supplierpaymentpolicyText = $supplierpaymentpolicy->is_visible_in_company ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $supplierpaymentpolicyClass }}">{{ $supplierpaymentpolicyText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Status</h6></th>
                                <td>
                                    @php
                                        $statusClass = $supplierpaymentpolicy->active ? 'activelabel' : 'inactivelabel';
                                        $statusText = $supplierpaymentpolicy->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $statusClass }}">{{ $statusText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierpaymentpolicy->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierpaymentpolicy->updated_at }}</p>
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
