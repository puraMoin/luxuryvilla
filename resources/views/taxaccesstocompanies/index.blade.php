@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('taxaccesstocompanies.create') }}">
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
                                    <h6>Tax Master</h6>
                                </th>

                                <th>
                                    <h6>Company Master</h6>
                                </th>


                                <th class="text-center">
                                    <h6>Access in Transcation</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taxaccesstocompanies as $taxaccesstocompany)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                        <tr>
                            <td>
                                <p>{{ $taxaccesstocompany->taxmaster ? $taxaccesstocompany->taxmaster->name : '---'}} </p>
                            </td>

                            <td>
                                <p>{{ $taxaccesstocompany->companymaster ? $taxaccesstocompany->companymaster->name : '---'}}</p>
                            </td>


                            <td class="text-center">
                                @php
                                  if($taxaccesstocompany->access_in_transaction == '1'){
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
                                <a href="{{ route('taxaccesstocompanies.edit', $taxaccesstocompany->id) }}">
                                    <i class="lni lni-pencil-alt"></i>
                                </a>
                                <a href="{{ route('taxaccesstocompanies.show', $taxaccesstocompany->id) }}">
                                    <i class="lni lni-list"></i>
                                </a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $taxaccesstocompanies])
        </div>
    </section>
@endsection
