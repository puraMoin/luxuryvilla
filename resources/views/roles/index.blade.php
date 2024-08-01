@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('roles.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="row">
                    <!-- Add any additional rows or content here -->
                </div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Full View</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Full Add</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Full Edit</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Full Delete</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Super Config</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Config</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp
                                <tr>
                                    <td>
                                        <p>{{ $role->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $class = $role->full_view == 'yes' ? 'activelabel' : 'inactivelabel';
                                            $data = $role->full_view == 'yes' ? 'Yes' : 'No';
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $class = $role->full_add == 'yes' ? 'activelabel' : 'inactivelabel';
                                            $data = $role->full_add == 'yes' ? 'Yes' : 'No';
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $class = $role->full_edit == 'yes' ? 'activelabel' : 'inactivelabel';
                                            $data = $role->full_edit == 'yes' ? 'Yes' : 'No';
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $class = $role->full_delete == 'yes' ? 'activelabel' : 'inactivelabel';
                                            $data = $role->full_delete == 'yes' ? 'Yes' : 'No';
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $class = $role->super_config == 'yes' ? 'activelabel' : 'inactivelabel';
                                            $data = $role->super_config == 'yes' ? 'Yes' : 'No';
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $class = $role->active == '1' ? 'activelabel' : 'inactivelabel';
                                            $data = $role->active == '1' ? 'Yes' : 'No';
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('roles.edit', $role->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('roles.show', $role->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
