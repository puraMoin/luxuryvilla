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
                <a href="{{ route('contractseasons.index') }}">
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
                                    <h6>User</h6>
                                </th>
                                <td>
                                    <p>{{ Auth::user()->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Contract</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->contract ? $contractseasontype->contract->name : '---'}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Property</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->property ? $contractseasontype->property->name : '---'}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Contract Season Types</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->contractseasontype ? $contractseasontype->contractseasontype->name : '---'}}  </p>
                                </td>
                            </tr>


                            <tr>
                                <th class='col-md-2'>
                                    <h6>Start Date</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->start_date}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>End Date</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->end_date}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Tax Value</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->tax_value}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Is Overall Tax</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->is_overall_text}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Service Charge</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->service_charge}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Min Night Stay</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->min_night_stay}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Default B2B Markup</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->default_b2b_markup}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Default B2C Markup Percentage</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->default_b2b_markup_is_percentage}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Default B2C Markup</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->default_b2c_markup}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Default B2C Markup Percentage<</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->default_b2c_markup_is_percentage}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Commission Value</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->commission_value}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Commission Percentage</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->comission_is_percentage}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Cost Type</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->costtype ? $contractseasontype->costtype->name : '---'}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Cost</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->cost}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Allotment</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->allotment}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Release Days</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->release_days}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Release Days</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->release_days}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Deposit Amount</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->deposit_amount}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Deposit Amount in Percentage</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->deposit_amount_is_percentage}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Final Date of Payment</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->final_date_of_payment}}  </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Amount Days</h6>
                                </th>
                                <td>
                                    <p> {{ $contractseasontype->amount_days}}  </p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Status</h6></th>
                                <td>
                                    @php
                                        $statusClass = $contractseasontype->active ? 'activelabel' : 'inactivelabel';
                                        $statusText = $contractseasontype->active ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $statusClass }}">{{ $statusText }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $contractseasontype->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Upldated At</h6>
                                </th>
                                <td>
                                    <p>{{ $contractseasontype->updated_at }}</p>
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
