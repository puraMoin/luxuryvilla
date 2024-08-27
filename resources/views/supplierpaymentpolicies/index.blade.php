@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('supplierpaymentpolicies.create') }}">
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
                                    <h6>Payment Policy</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Payment Percent </h6>
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
                            @foreach ($supplierpaymentpolicy as $supplierpaymentpolicies)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        <p>{{ $supplierpaymentpolicies->supplier_id }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $supplierpaymentpolicies->payment_policy }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $supplierpaymentpolicies->payment_percent }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($supplierpaymentpolicies->active == '1'){
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
                                        <a href="{{ route('supplierpaymentpolicies.edit', $supplierpaymentpolicies->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('supplierpaymentpolicies.show', $supplierpaymentpolicies->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $supplierpaymentpolicy])
        </div>
    </section>
@endsection
