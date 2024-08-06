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
                <a href="{{ route('roles.index') }}">
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
                                    <p>{{ $role->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p>{{ $role->description }}</p>
                                </td>
                            </tr>
                            
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Full View</h6>
                                </th>
                                <td>
                                    @php
                                        $fullViewClass = $role->full_view == '1' ? 'activelabel' : 'inactivelabel';
                                        $fullViewText = $role->full_view == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $fullViewClass }}">{{ $fullViewText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Full Add</h6>
                                </th>
                                <td>
                                    @php
                                        $fullAddClass = $role->full_add == '1' ? 'activelabel' : 'inactivelabel';
                                        $fullAddText = $role->full_add == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $fullAddClass }}">{{ $fullAddText }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Full Edit</h6>
                                </th>
                                <td>
                                    @php
                                        $fullEditClass = $role->full_edit == '1' ? 'activelabel' : 'inactivelabel';
                                        $fullEditText = $role->full_edit == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $fullEditClass }}">{{ $fullEditText }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Full Delete</h6>
                                </th>
                                <td>
                                    @php
                                        $fullDeleteClass = $role->full_delete == '1' ? 'activelabel' : 'inactivelabel';
                                        $fullDeleteText = $role->full_delete == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $fullDeleteClass }}">{{ $fullDeleteText }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Super Config</h6>
                                </th>
                                <td>
                                    @php
                                        $superConfigClass = $role->super_config == '1' ? 'activelabel' : 'inactivelabel';
                                        $superConfigText = $role->super_config == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $superConfigClass }}">{{ $superConfigText }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Config</h6>
                                </th>
                                <td>
                                    @php
                                        $configClass = $role->config == '1' ? 'activelabel' : 'inactivelabel';
                                        $configText = $role->config == '1' ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $configClass }}">{{ $configText }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
