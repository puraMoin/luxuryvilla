@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('propertyimages.create') }}">
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
                                {{-- <th class="text-center">
                                    <h6>Property</h6>
                                </th> --}}

                                <th class="text-center">
                                    <h6>Display Order</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Name</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Is Cover Image</h6>
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
                            @foreach ($propertyimages as $propertyimage)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        <p>{{ $propertyimage->display_order }}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $propertyimage->name }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($propertyimage->is_cover_image == '1'){
                                            $class = 'activelabel';
                                            $data = 'Yes';
                                          } else {
                                            $class = 'inactivelabel';
                                            $data = 'No';
                                          }
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($propertyimage->active == '1'){
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
                                        <a href="{{ route('propertyimages.edit', $propertyimage->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('propertyimages.show', $propertyimage->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $propertyimages])
        </div>
    </section>
@endsection
