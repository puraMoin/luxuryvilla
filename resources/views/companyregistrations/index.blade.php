@extends('layouts.app')

@section('content')
<section class="section">
<div class="container-fluid">
<!-- BreadCrumb -->
@include('partials.breadcrumb')
<!-- Add New Button -->
<div class="right-mob-left">
<a href="{{ route('companyregistrations.create') }}">
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
        <th>
            <h6>Company Master</h6>
        </th>

        <th class="text-center">
            <h6>Company TAX Info</h6>
        </th>

        <th class="text-center">
            <h6>Registration Body</h6>
        </th>

        {{-- <th class="text-center">
            <h6>Registration Number</h6>
        </th>

        <th class="text-center">
            <h6>Registration Expiry Date</h6>
        </th> --}}

        <th class="text-center">
            <h6>Status</h6>
        </th>

        <th class="text-center">
            <h6>Actions</h6>
        </th>
    </tr>
</thead>
<tbody>
    @foreach ($companyregistrations as $companyregistrations)
        @php
            $class = '';
            $data = '';
        @endphp

        <tr>
            <td class="text-left">
                <p> {{ $companyregistrations->companymaster ? $companyregistrations->companymaster->name : '---'   }} </p>
            </td>

            <td class="text-center">
                <p> {{ $companyregistrations->companytextinformation ? $companyregistrations->companytextinformation->name : '---' }} </p>
            </td>
            <td class="text-center">
                <p>{{ $companyregistrations->registration_body }}</p>
            </td>
            {{-- <td class="text-center">
                <p>{{ $companyregistrations->registration_number }}</p>
            </td>
            <td class="text-center">
                <p>{{ $companyregistrations->registration_expiry_date }}</p>
            </td> --}}
            <td class="text-center">
                @php
                    if($companyregistrations->active == '1'){
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
                <a href="{{ route('companyregistrations.edit', $companyregistrations->id) }}">
                    <i class="lni lni-pencil-alt"></i>
                </a>
                <a href="{{ route('companyregistrations.show', $companyregistrations->id) }}">
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
