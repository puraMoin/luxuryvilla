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
                                <p>{{ $segment->name }}</p>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <th><h6>Status</h6></th>
                            <td>
                                @php
                                    $statusClass = $segment->active ? 'activelabel' : 'inactivelabel';
                                    $statusText = $segment->active ? 'Active' : 'Inactive';
                                @endphp
                                <div class="{{ $statusClass }}">{{ $statusText }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Created</h6></th>
                            <td>
                                <p>{{ $segment->created_at }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Updated</h6></th>
                            <td>
                                <p>{{ $segment->updated_at }}</p>
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
