@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('apartmentcategories.create') }}">
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
                                <th>
                                    <h6>Name</h6>
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
                            @foreach ($apartmentcategories as $apartmentcategory)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td>
                                        <p>{{ $apartmentcategory->name }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($apartmentcategory->active == '1'){
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
                                        <a href="{{ route('apartmentcategories.edit', $apartmentcategory->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('apartmentcategories.show', $apartmentcategory->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $apartmentcategories])
        </div>
    </section>
@endsection
