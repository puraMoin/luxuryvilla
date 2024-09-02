@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('propertyseotags.create') }}">
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
                                    <h6>Property</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Name</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Keywords</h6>
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
                            @foreach ($propertyseotag as $propertyseotags)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        <p>{{ $propertyseotags->property ? $propertyseotags->property->name : '---'}}</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $propertyseotags->name ? $propertyseotags->name : '---'}}</</p>
                                    </td>

                                    <td class="text-center">
                                        <p>{{ $propertyseotags->keywords ? $propertyseotags->keywords : '---'}}</</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $propertyseotagsClass = $propertyseotags->active ? 'activelabel' : 'inactivelabel';
                                            $propertyseotagsText = $propertyseotags->active ? 'Active' : 'Inactive';
                                        @endphp
                                        <div class="{{ $propertyseotagsClass }}">{{ $propertyseotagsText }}</div>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('propertyseotags.edit', $propertyseotags->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('propertyseotags.show', $propertyseotags->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $propertyseotag])
        </div>
    </section>
@endsection
