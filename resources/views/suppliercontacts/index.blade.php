@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('suppliercontacts.create') }}">
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
                                <th class="text-center">
                                    <h6>Supplier</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Name</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Designation</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Status</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliercontact as $suppliercontacts)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        <p>{{ $suppliercontacts->supplier ? $suppliercontacts->supplier->name : '---'}}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $suppliercontacts->name }}</</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $suppliercontacts->designation }}</</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $suppliercontactsClass = $suppliercontacts->active ? 'activelabel' : 'inactivelabel';
                                            $suppliercontactsText = $suppliercontacts->active ? 'Active' : 'Inactive';
                                        @endphp
                                        <div class="{{ $suppliercontactsClass }}">{{ $suppliercontactsText }}</div>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('suppliercontacts.edit', $suppliercontacts->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('suppliercontacts.show', $suppliercontacts->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $suppliercontact])
        </div>
    </section>
@endsection
