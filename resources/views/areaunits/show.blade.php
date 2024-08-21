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
            <a href="{{ route('areaunits.index') }}">
              <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
            </a>
          </div>
        <!-- Property Types Details Section -->
        <div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                        <tr>
                            <th class='col-md-2'><h6>Name</h6></th>
                            <td>
                                <p>{{ $areaunits->name }}</p>
                            </td>
                        </tr>
                        <tr>

                        <tr>
                            <th><h6>Status</h6></th>
                            <td>
                                @php
                                    $statusClass = $areaunits->active ? 'activelabel' : 'inactivelabel';
                                    $statusText = $areaunits->active ? 'Active' : 'Inactive';
                                @endphp
                                <div class="{{ $statusClass }}">{{ $statusText }}</div>
                            </td>
                        </tr>

                        <tr>
                            <th><h6>Created</h6></th>
                            <td>
                               <p>{{ $areaunits->created_at }}</p>
                            </td>
                        </tr>

                        <tr>
                            <th><h6>Updated</h6></th>
                            <td>
                               <p>{{ $areaunits->updated_at }}</p>
                            </td>
                        </tr>

                        <tr>
                            <th><h6>Created By</h6></th>
                            <td>
                                <p>{{ Auth::user()->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Modified By</h6></th>
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
