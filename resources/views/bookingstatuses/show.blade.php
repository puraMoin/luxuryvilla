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
            <div class="right-mob-left">
                <a href="{{ route('bookingstatuses.index') }}">
                  <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
                </a>
              </div>

            <!-- Property Types Details Section -->
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $bookingstatuses->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Class</h6>
                                </th>
                                <td>
                                    <p>{{ $bookingstatuses->class }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Icon</h6>
                                </th>
                                <td>
                                    <img src="{{ $bookingstatuses->icon ? asset('images/bookingstatuses/icon/' . $bookingstatuses->id . '/' . $bookingstatuses->icon) : asset('images/no-image.png') }}"
                                        style="width: 100px; height:70px;">
                                </td>
                            </tr>


                            <tr>
                                <th class='col-md-2'>
                                    <h6>Paid</h6>
                                </th>
                                <td>
                                    <p>{{ $bookingstatuses->paid }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Invoice</h6>
                                </th>
                                <td>
                                    <p>{{ $bookingstatuses->invoice }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Email Template</h6>
                                </th>
                                <td>
                                    <p>{{ $bookingstatuses->email_template }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php
                                        $statusClass = $bookingstatuses->active ? 'activelabel' : 'inactivelabel';
                                        $statusText = $bookingstatuses->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $statusClass }}">{{ $statusText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Created</h6>
                                </th>
                                <td>
                                    <p>{{ $bookingstatuses->created_at }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Updated</h6>
                                </th>
                                <td>
                                    <p>{{ $bookingstatuses->updated_at }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Created By</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Modified By</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
