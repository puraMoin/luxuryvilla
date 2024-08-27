@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('supplieraccesstocompanies.create') }}">
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
                                    <h6>Company Master</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Is Visible In Company</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplieraccesstocompanies as $supplieraccesstocompany)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        <p>{{ $supplieraccesstocompany->supplier ? $supplieraccesstocompany->supplier->name : '---'}}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $supplieraccesstocompany->companymaster ? $supplieraccesstocompany->companymaster->name : '---'}}</</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $supplieraccesstocompanyClass = $supplieraccesstocompany->is_visible_in_company ? 'activelabel' : 'inactivelabel';
                                            $supplieraccesstocompanyText = $supplieraccesstocompany->is_visible_in_company ? 'Yes' : 'No';
                                        @endphp
                                        <div class="{{ $supplieraccesstocompanyClass }}">{{ $supplieraccesstocompanyText }}</div>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('supplieraccesstocompanies.edit', $supplieraccesstocompany->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('supplieraccesstocompanies.show', $supplieraccesstocompany->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $supplieraccesstocompanies])
        </div>
    </section>
@endsection
