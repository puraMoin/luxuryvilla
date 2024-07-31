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
            <!-- Agent Details Section -->
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>ISO Code</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->iso_code }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>ISO Code Number</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->iso_code_num }}</p>
                                </td>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Sign</h6>
                                </th>
                                <td>
                                    @php
                                        $signClass = $currency->decimals ? 'activelabel' : 'inactivelabel';
                                        $signText = $currency->decimals ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $signClass }}">{{ $signText }}</div>
                                    {{-- <p>{{ $currency->sign }}</p> --}}
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Blank</h6>
                                </th>
                                <td>
                                    @php
                                        $blankClass = $currency->blank ? 'activelabel' : 'inactivelabel';
                                        $blankText = $currency->blank ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $blankClass }}">{{ $blankText }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Format</h6>
                                </th>
                                <td>
                                    @php
                                        $formatClass = $currency->decimals ? 'activelabel' : 'inactivelabel';
                                        $formatText = $currency->decimals ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $formatClass }}">{{ $formatText }}</div>
                                    {{-- <p>{{ $currency->format }}</p> --}}
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Decimals</h6>
                                </th>
                                <td>
                                    @php
                                        $decimalsClass = $currency->decimals ? 'activelabel' : 'inactivelabel';
                                        $decimalsText = $currency->decimals ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $decimalsClass }}">{{ $decimalsText }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Conversion Rate</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->conversion_rate }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Display on Frontend</h6>
                                </th>
                                <td>
                                    @php
                                        $dispClass = $currency->decimals ? 'activelabel' : 'inactivelabel';
                                        $dispText = $currency->decimals ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $dispClass }}">{{ $dispText }}</div>
                                    {{-- <p>{{ $currency->display_on_frontend }}</p> --}}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php
                                        $statusClass = $currency->active ? 'activelabel' : 'inactivelabel';
                                        $statusText = $currency->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $statusClass }}">{{ $statusText }}</div>
                                </td>
                            </tr>

                            <tr>
                            <tr>
                                <th>
                                    <h6>Created By</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->created_by }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Modified By</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->modified_by }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Created</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Updated</h6>
                                </th>
                                <td>
                                    <p>{{ $currency->updated_at }}</p>
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
