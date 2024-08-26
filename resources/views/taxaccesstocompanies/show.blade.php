@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <!-- Display success message if any -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Back Button -->
            <div class="right-mob-left">
                <a href="{{ route('taxaccesstocompanies.index') }}">
                    <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Tax Master</h6>
                                </th>
                                <td>
                                    <p> {{ $taxaccesstocompanies->taxmaster ? $taxaccesstocompanies->taxmaster->name : '---'   }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Company Master</h6>
                                </th>
                                <td>
                                    <p> {{ $taxaccesstocompanies->companymaster ? $taxaccesstocompanies->companymaster->name : '---'   }} </p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Is Visible In Company</h6></th>
                                <td>
                                    @php
                                        $isvisiableincompanyClass = $taxaccesstocompanies->active ? 'activelabel' : 'inactivelabel';
                                        $isvisiableincompanyText = $taxaccesstocompanies->active ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $isvisiableincompanyClass }}">{{ $isvisiableincompanyText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Edit</h6></th>
                                <td>
                                    @php
                                        $editClass = $taxaccesstocompanies->active ? 'activelabel' : 'inactivelabel';
                                        $editText = $taxaccesstocompanies->active ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $editClass }}">{{ $editText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Delete</h6>
                                </th>
                                <td>
                                    @php
                                        $deleteClass = $taxaccesstocompanies->active ? 'activelabel' : 'inactivelabel';
                                        $deleteText = $taxaccesstocompanies->active ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $deleteClass }}">{{ $deleteText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Access in Transcation</h6></th>
                                <td>
                                    @php
                                        $AccessintranscationClass = $taxaccesstocompanies->active ? 'activelabel' : 'inactivelabel';
                                        $AccessintranscationText = $taxaccesstocompanies->active ? 'Yes' : 'No';
                                    @endphp
                                    <div class="{{ $AccessintranscationClass }}">{{ $AccessintranscationText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $taxaccesstocompanies->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $taxaccesstocompanies->updated_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created By</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Managed By</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
