@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('suppliers.index') }}">
          <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
      </div>

    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                            <th class='col-md-2'><h6>Property</h6></th>
                            <td class=''>
                                <p>{{ $propertyOwnerDetail->properties ? $propertyOwnerDetail->properties->name : '---' ;}}</p>
                            </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->name ? $propertyOwnerDetail->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Email</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->email ? $propertyOwnerDetail->email : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Mobile</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->mobile ? $propertyOwnerDetail->mobile : '---' }}</p>
                        </td>
                    </tr>
                   <tr>
                        <th class='col-md-2'><h6>Website</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->website ? $propertyOwnerDetail->website : '---'  }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Address</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->address ? $propertyOwnerDetail->address : '---'}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->country ? $propertyOwnerDetail->country->name : '---'}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->state ? $propertyOwnerDetail->state->name : '---'}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>City</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->city ? $propertyOwnerDetail->city->name : '---'}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>ZipCode</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->zipcode ? $propertyOwnerDetail->zipcode : '---' }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Google Address</h6></th>
                        <td class=''>
                            <p>{{ $propertyOwnerDetail->google_address ? $propertyOwnerDetail->google_address : '---' }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th><h6>Status</h6></th>
                        <td>
                          @php if($propertyOwnerDetail->active == '1'){
                            $class = 'activelabel';
                            $data = 'Active';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'Inactive';
                            } @endphp
                            <div class="{{ $class; }}">{{ $data }}</div>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Created By</h6></th>
                        <td class=''>
                            <p>{{ Auth::user()->name }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Modified By</h6></th>
                        <td class=''>
                            <p>{{ Auth::user()->name }}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
    <!--Add new section end here-->
	</div>
</section>
@endsection

