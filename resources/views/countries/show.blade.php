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

        <!-- Country Details Section -->
        <div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                        <!-- Name -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Name</h6>
                            </th>
                            <td>
                                <p>{{ $countries->name }}</p>
                            </td>
                        </tr>
                        <!-- Alpha 2 Code -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Alpha 2 Code</h6>
                            </th>
                            <td>
                                <p>{{ $countries->alpha_2_code }}</p>
                            </td>
                        </tr>
                        <!-- Alpha 3 Code -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Alpha 3 Code</h6>
                            </th>
                            <td>
                                <p>{{ $countries->alpha_3_code }}</p>
                            </td>
                        </tr>
                        <!-- Calling Code -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Calling Code</h6>
                            </th>
                            <td>
                                <p>{{ $countries->calling_code }}</p>
                            </td>
                        </tr>
                        <!-- Passport Validity Yrs Adult -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Passport Validity Yrs Adult</h6>
                            </th>
                            <td>
                                <p>{{ $countries->passport_validity_in_yrs_adult }}</p>
                            </td>
                        </tr>
                        <!-- Passport Validity Yrs Child -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Passport Validity Yrs Child</h6>
                            </th>
                            <td>
                                <p>{{ $countries->passport_validity_in_yrs_child }}</p>
                            </td>
                        </tr>
                        <!-- Mobile No Min Length -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Mobile No Min Length</h6>
                            </th>
                            <td>
                                <p>{{ $countries->mobile_number_min_length }}</p>
                            </td>
                        </tr>
                        <!-- Mobile No Max Length -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Mobile No Max Length</h6>
                            </th>
                            <td>
                                <p>{{ $countries->mobile_number_max_length }}</p>
                            </td>
                        </tr>
                        <!-- Mobile Number Series -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Mobile Number Series</h6>
                            </th>
                            <td>
                                <p>{{ $countries->mobile_number_series }}</p>
                            </td>
                        </tr>
                        <!-- Latitude -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Latitude</h6>
                            </th>
                            <td>
                                <p>{{ $countries->latitude }}</p>
                            </td>
                        </tr>
                        <!-- Longitude -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Longitude</h6>
                            </th>
                            <td>
                                <p>{{ $countries->longitude }}</p>
                            </td>
                        </tr>
                        <!-- Country Description -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Country Description</h6>
                            </th>
                            <td>
                                <p>{{ $countries->country_description }}</p>
                            </td>
                        </tr>
                        <!-- Country Description Website -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Country Description Website</h6>
                            </th>
                            <td>
                                <p>{{ $countries->country_description_website }}</p>
                            </td>
                        </tr>
                        <!-- Small Description -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Small Description</h6>
                            </th>
                            <td>
                                <p>{{ $countries->small_description }}</p>
                            </td>
                        </tr>
                        <!-- Fast Facts -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Fast Facts</h6>
                            </th>
                            <td>
                                <p>{{ $countries->fast_facts }}</p>
                            </td>
                        </tr>
                        <!-- Is Domestic Country -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Is Domestic Country</h6>
                            </th>
                            <td>
                                @php
                                    $domesticClass = $countries->is_domestic_country ? 'activelabel' : 'inactivelabel';
                                    $domesticText = $countries->is_domestic_country ? 'Yes' : 'No';
                                @endphp
                                <div class="{{ $domesticClass }}">{{ $domesticText }}</div>
                            </td>
                        </tr>
                        <!-- Is State Allowed -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Is State Allowed</h6>
                            </th>
                            <td>
                                @php
                                    $stateallowClass = $countries->is_state_allowed ? 'activelabel' : 'inactivelabel';
                                    $stateallowText = $countries->is_state_allowed ? 'Yes' : 'No';
                                @endphp
                                <div class="{{ $stateallowClass }}">{{ $stateallowText }}</div>
                            </td>
                        </tr>
                        <!-- Is Publish on Website -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Is Publish on Website</h6>
                            </th>
                            <td>
                                @php
                                    $pubwebsiteClass = $countries->is_publish_on_website ? 'activelabel' : 'inactivelabel';
                                    $pubwebsiteText = $countries->is_publish_on_website ? 'Yes' : 'No';
                                @endphp
                                <div class="{{ $pubwebsiteClass }}">{{ $pubwebsiteText }}</div>
                            </td>
                        </tr>
                        <!-- Active -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Active</h6>
                            </th>
                            <td>
                                @php
                                    $activeClass = $countries->active ? 'activelabel' : 'inactivelabel';
                                    $activeText = $countries->active ? 'Active' : 'Inactive';
                                @endphp
                                <div class="{{ $activeClass }}">{{ $activeText }}</div>
                            </td>
                        </tr>
                        <!-- Cover Image -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Cover Image</h6>
                            </th>
                            <td>
                                <img src="{{ $countries->cover_image ? asset('storage/' . $countries->cover_image) : asset('images/no-image.png') }}" height="50px">
                            </td>
                        </tr>
                        <!-- Icon Image -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Icon Image</h6>
                            </th>
                            <td>
                                <img src="{{ $countries->cover_image ? asset('storage/' . $countries->cover_image) : asset('images/no-image.png') }}" height="50px">
                            </td>
                        </tr>
                        <!-- Created At -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Created At</h6>
                            </th>
                            <td>
                                <p>{{ $countries->created_at }}</p>
                            </td>
                        </tr>
                        <!-- Updated At -->
                        <tr>
                            <th class='col-md-2'>
                                <h6>Updated At</h6>
                            </th>
                            <td>
                                <p>{{ $countries->updated_at }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
