@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        @include('partials.breadcrumb')

        <div class="right-mob-left">
            <a href="{{ route('rolesrights.create') }}">
                <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
            </a>
        </div>

        <!-- Add new section start here -->
        <div class="card-style mt-20">
            <div class="row">
                {{-- <div class="col-sm-4">
                    <div class="searchfield">
                        <input type="text" placeholder="Search...">
                        <button><i class="lni lni-search-alt"></i></button>
                    </div>
                </div> --}}
                {{-- <div class="col-sm-4">
                    <div class="filtertext">
                        <ul>
                            <!-- Add filter options here if needed -->
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="col-sm-4 rowmargin10">
                    <div class="right-mob-left">
                        <button type="button" class="main-btn dark-btn btn-hover btn-xs">Export</button>
                    </div>
                </div> --}}
            </div>

            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <thead>
                        <tr>
                            <th width="25">
                                <div class="check-input-primary">
                                    <input class="form-check-input" type="checkbox" id="checkbox-1">
                                </div>
                            </th>
                            <th><h6>Name<i class="lni lni-sort-alpha-asc"></i></h6></th>
                            <th><h6>Assigned Dashboard ID<i class="lni lni-sort-alpha-asc"></i></h6></th>
                            <th><h6>Description<i class="lni lni-sort-alpha-asc"></i></h6></th>
                            <th class="text-center"><h6>Status</h6></th>
                            <th class="text-center"><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach ($rolesrights as $rolesright)
                            <tr>
                                <td>
                                    <div class="check-input-primary">
                                        <input class="form-check-input" type="checkbox" id="checkbox-{{ $rolesright->id }}">
                                    </div>
                                </td>
                                <td><p>{{ $rolesright->name }}</p></td>
                                {{-- <td><p>{{ $rolesright->assigned_dashboard_id }}</p></td> --}}
                                <td><p>{{ $rolesright->assignedDashboard ? $rolesright->assignedDashboard->name : '---' }}</p></td>
                                <td><p>{{ $rolesright->description }}</p></td>
                                <td class="text-center">
                                    @if ($rolesright->active)
                                        <div class="activelabel">Active</div>
                                    @else
                                        <div class="inactivelabel">Inactive</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('rolesrights.edit', $rolesright->id) }}"><i class="lni lni-pencil-alt"></i></a>
                                    <a href="{{ route('rolesrights.show', $rolesright->id) }}"><i class="lni lni-list"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->
            </div>
        </div>
        <div class="mt-30">
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_records">Total Records: <span>{{ $rolesrights->count() }}</span></div>
                </div>
            </div>
        </div>
        <!-- Add new section end here -->
    </div>
</section>
@endsection


<!-- MenuLinks -->
{{-- <div class="col-sm-4">
    <div class="select-style-1">
        <label>MenuLinks</label>
        <div class="select-position select-sm">
            <select class="jSelectbox" id="actionDropdown" name="menuLinks[]" multiple="true" required>
                @foreach ($menuLinks as $menuLink)
                    <option value="{{ $menuLink->id }}" {{ in_array($menuLink->id, $selectedMenuLinks->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $menuLink->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div> --}}
