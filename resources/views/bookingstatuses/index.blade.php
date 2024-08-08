@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('partials.breadcrumb')
        <!-- Add New Button -->
        <div class="right-mob-left">
            <a href="{{ route('bookingstatuses.create') }}">
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
                        @foreach ($bookingstatuses as $bookingstatus)
                        @php
                            $class = $bookingstatus->active == '1' ? 'activelabel' : 'inactivelabel';
                            $data = $bookingstatus->active == '1' ? 'Active' : 'Inactive';
                        @endphp

                        <tr>
                            <td>
                                <p>{{ $bookingstatus->name }}</p>
                            </td>
                            <td class="text-center">
                                <div class="{{ $class }}">{{ $data }}</div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('bookingstatuses.edit', $bookingstatus->id) }}">
                                    <i class="lni lni-pencil-alt"></i>
                                </a>
                                <a href="{{ route('bookingstatuses.show', $bookingstatus->id) }}">
                                    <i class="lni lni-list"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
