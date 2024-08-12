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
                <a href="{{ route('taxes.index') }}">
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
                                    <p>{{ $taxes->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Code</h6>
                                </th>
                                <td>
                                    <p>{{ $taxes->code }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Value in Percent</h6>
                                </th>
                                <td>
                                    <p>{{ $taxes->value_in_percent}}</p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Status</h6></th>
                                <td>
                                    @php
                                        $statusClass = $taxes->active ? 'activelabel' : 'inactivelabel';
                                        $statusText = $taxes->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $statusClass }}">{{ $statusText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $taxes->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $taxes->updated_at }}</p>
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
