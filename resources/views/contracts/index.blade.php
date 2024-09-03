@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('contracts.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="row">
                </div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                {{-- <th class="text-center">
                                    <h6>User</h6>
                                </th> --}}

                                <th class="text-center">
                                    <h6>Supplier</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Property</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Currency</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Cost Type</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Tax</h6>
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
                            @foreach ($contracts as $contract)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    {{-- <td class="text-center">
                                        <p>{{ Auth::user()->name }}</p>
                                    </td> --}}

                                    <td class="text-center">
                                        <p>{{ $contract->supplier ? $contract->supplier->name : '---' }}</p>
                                    </td>


                                    <td class="text-center">
                                        <p>{{ $contract->property ? $contract->property->name : '---' }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $contract->currency ? $contract->currency->name : '---' }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $contract->costtype ? $contract->costtype->name : '---' }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $contract->tax ? $contract->tax->name : '---' }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($contract->active == '1'){
                                            $class = 'activelabel';
                                            $data = 'Active';
                                          } else {
                                            $class = 'inactivelabel';
                                            $data = 'Inactive';
                                          }
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                      </td>

                                    <td class="text-center">
                                        <a href="{{ route('contracts.edit', $contract->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('contracts.show', $contract->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $contracts])
        </div>
    </section>
@endsection
