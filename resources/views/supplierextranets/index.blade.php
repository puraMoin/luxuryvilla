@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('supplierextranets.create') }}">
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
                                    <h6>Branch</h6>
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
                            @foreach ($supplierextranet as $supplierextranets)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        <p>{{ $supplierextranets->supplier ? $supplierextranets->supplier->name : '---'}}</p>
                                    </td>


                                    <td class="text-center">
                                        <p>{{ $supplierextranets->name }}</</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $supplierextranets->branch }}</</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $supplierextranetsClass = $supplierextranets->active ? 'activelabel' : 'inactivelabel';
                                            $supplierextranetsText = $supplierextranets->active ? 'Active' : 'Inactive';
                                        @endphp
                                        <div class="{{ $supplierextranetsClass }}">{{ $supplierextranetsText }}</div>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('supplierextranets.edit', $supplierextranets->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('supplierextranets.show', $supplierextranets->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $supplierextranet])
        </div>
    </section>
@endsection
