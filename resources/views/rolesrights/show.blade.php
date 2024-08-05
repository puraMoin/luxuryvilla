@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        @include('partials.breadcrumb')

        <!-- Add new section start here -->
        <div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                        <tr>
                            <th class='col-md-2'><h6>Name</h6></th>
                            <td>
                                <p>{{ $rolesright->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class='col-md-2'><h6>Assigned Dashboard</h6></th>
                            <td>
                                <p>{{ $rolesright->assigned_dashboard_id }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class='col-md-2'><h6>Description</h6></th>
                            <td>
                                <p>{{ $rolesright->description }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class='col-md-2'><h6>Status</h6></th>
                            <td>
                                @php 
                                    $class = $rolesright->active == '1' ? 'activelabel' : 'inactivelabel';
                                    $data = $rolesright->active == '1' ? 'Active' : 'Inactive';
                                @endphp
                                <div class="{{ $class }}">{{ $data }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th class='col-md-2'><h6>Created At</h6></th>
                            <td>
                                <p>{{ $rolesright->created_at }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class='col-md-2'><h6>Updated At</h6></th>
                            <td>
                                <p>{{ $rolesright->updated_at }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class='col-md-2'><h6>Created By</h6></th>
                            <td>
                                <p>{{ $rolesright->created_by }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class='col-md-2'><h6>Modified By</h6></th>
                            <td>
                                <p>{{ $rolesright->modified_by }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Add new section end here -->
    </div>
</section>
@endsection
