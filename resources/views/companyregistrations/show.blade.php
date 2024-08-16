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
                <a href="{{ route('companyregistrations.index') }}">
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
                                    <h6>Company Master</h6>
                                </th>
                                <td>
                                    <p>{{ $companyregistrations->companymaster ? $companyregistrations->companymaster->name : '---'   }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Company Text Info</h6>
                                </th>
                                <td>
                                    <p>{{ $companyregistrations->company_text_information_id }}</p>
                                </td>
                                {{-- {{ $companyregistrations->companytextinformation ? $companyregistrations->companytextinformation->name : '---'   }} --}}
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Registration Body</h6>
                                </th>
                                <td>
                                    <p>{{ $companyregistrations->registration_body }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Registration Number</h6>
                                </th>
                                <td>
                                    <p>{{ $companyregistrations->registration_number }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Registration Expiry Date</h6>
                                </th>
                                <td>
                                    <p>{{ $companyregistrations->registration_expiry_date }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Status</h6>
                                </th>
                                <th class="text-left">
                                    @php
                                      if($companyregistrations->active == '1'){
                                        $class = 'activelabel';
                                        $data = 'Active';
                                      } else {
                                        $class = 'inactivelabel';
                                        $data = 'Inactive';
                                      }
                                    @endphp
                                    <div class="{{ $class }}"> {{ $data }}</div>
                                  </th>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $companyregistrations->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Updated At</h6>
                                </th>
                                <td>
                                    <p>{{ $companyregistrations->updated_at }}</p>
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
