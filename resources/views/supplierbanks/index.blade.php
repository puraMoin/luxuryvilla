@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('supplierbanks.create') }}">
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
                                    <h6>Currency</h6>
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
                            @foreach ($supplierbank as $supplierbanks)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        <p>{{ $supplierbanks->supplier ? $supplierbanks->supplier->name : '---'}}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $supplierbanks->currency ? $supplierbanks->currency->name : '---'}}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $supplierbanks->name }}</</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $supplierbanks->branch }}</</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $supplierbanksClass = $supplierbanks->active ? 'activelabel' : 'inactivelabel';
                                            $supplierbanksText = $supplierbanks->active ? 'Active' : 'Inactive';
                                        @endphp
                                        <div class="{{ $supplierbanksClass }}">{{ $supplierbanksText }}</div>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('supplierbanks.edit', $supplierbanks->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('supplierbanks.show', $supplierbanks->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $supplierbank])
        </div>
    </section>
@endsection
