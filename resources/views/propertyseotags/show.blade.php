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
                <a href="{{ route('propertyseotags.index') }}">
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
                                    <h6>Property</h6>
                                </th>
                                <td>
                                    <p> {{ $propertyseotag->property ? $propertyseotag->property->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p> {{ $propertyseotag->name ? $propertyseotag->name : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p> {{ $propertyseotag->description ? $propertyseotag->description : '---'}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Keywords</h6>
                                </th>
                                <td>
                                    <p> {{ $propertyseotag->keywords ? $propertyseotag->keywords : '---'}} </p>
                                </td>
                            </tr>


                            <tr>
                                <th><h6>Status</h6></th>
                                <td>
                                    @php
                                        $propertyseotagClass = $propertyseotag->active ? 'activelabel' : 'inactivelabel';
                                        $propertyseotagText = $propertyseotag->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $propertyseotagClass }}">{{ $propertyseotagText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $propertyseotag->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $propertyseotag->updated_at }}</p>
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
