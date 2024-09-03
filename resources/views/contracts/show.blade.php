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
                <a href="{{ route('contracts.index') }}">
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
                                    <h6>User</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Supplier</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->supplier ? $contracts->supplier->name : '---'}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Property</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->property ? $contracts->property->name : '---'}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Currency</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->currency ? $contracts->currency->name : '---'}}  </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Cost Type</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->costtype ? $contracts->costtype->name : '---'}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Tax</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->tax ? $contracts->tax->name : '---'}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Start Date</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->start_date}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>End Date</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->end_date}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Terms & Condition</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->terms_and_conditions}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Service Charge Value</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->service_charge_value}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Service Charge Percentage</h6>
                                </th>
                                <td>
                                    <p> {{ $contracts->service_charge_percentage}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Status</h6></th>
                                <td>
                                    @php
                                        $statusClass = $contracts->active ? 'activelabel' : 'inactivelabel';
                                        $statusText = $contracts->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $statusClass }}">{{ $statusText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Its Villa</h6></th>
                                <td>
                                    @php
                                        $itsvillaClass = $contracts->its_villa ? 'activelabel' : 'inactivelabel';
                                        $itsvillaText = $contracts->its_villa ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $itsvillaClass }}">{{ $itsvillaText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Its Apartment</h6></th>
                                <td>
                                    @php
                                        $itsapartmentClass = $contracts->its_apartment ? 'activelabel' : 'inactivelabel';
                                        $itsapartmentText = $contracts->its_apartment ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $itsapartmentClass }}">{{ $itsapartmentText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $contracts->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $contracts->updated_at }}</p>
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
