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
                            <th class='col-md-2'><h6>Name</h6></th>
                            <td>
                                <p>{{ $employeelists->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Username</h6></th>
                            <td>
                                <p>{{ $employeelists->username }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Email</h6></th>
                            <td>
                                <p>{{ $employeelists->email }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Contact</h6></th>
                            <td>
                                <p>{{ $employeelists->contact }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Status</h6></th>
                            <td>
                                @php
                                    $statusClass = $employeelists->active ? 'activelabel' : 'inactivelabel';
                                    $statusText = $employeelists->active ? 'Yes' : 'No';
                                @endphp
                                <div class="{{ $statusClass }}">{{ $statusText }}</div>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
