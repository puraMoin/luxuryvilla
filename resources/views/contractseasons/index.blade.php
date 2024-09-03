@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('contractseasons.create') }}">
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
                                <th class="text-center">
                                    <h6>Contract</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Property</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Contract Season Type</h6>
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
                            @foreach ($contractseasons as $contractseason)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>

                                    <td class="text-center">
                                        <p>{{ $contractseason->contract ? $contractseason->contract->name : '---' }}</p>
                                    </td>


                                    <td class="text-center">
                                        <p>{{ $contractseason->property ? $contractseason->property->name : '---' }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $contractseason->contractseasontype ? $contractseason->contractseasontype->name : '---' }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($contractseason->active == '1'){
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
                                        <a href="{{ route('contractseasons.edit', $contractseason->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('contractseasons.show', $contractseason->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $contractseasons])
        </div>
    </section>
@endsection
