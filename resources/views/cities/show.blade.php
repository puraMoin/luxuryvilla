@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('cities.index') }}">
            <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
    </div>



    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $city->country->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            @if(!empty($city->state->name))
                            <p>{{ $city->state->name }}</p>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>City</h6></th>
                        <td class=''>
                            <p>{{ $city->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>City Code</h6></th>
                        <td class=''>
                            <p>{{ $city->city_code }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Latitude</h6></th>
                        <td class=''>
                            <p>{{ $city->latitude }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Longitude</h6></th>
                        <td class=''>
                            <p>{{ $city->longitude }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country Code</h6></th>
                        <td class=''>
                            <p>{{ $city->country_code }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country Name</h6></th>
                        <td class=''>
                            <p>{{ $city->country_name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Description</h6></th>
                        <td class=''>
                            <p>{{ $city->description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Small Description</h6></th>
                        <td class=''>
                            <p>{{ $city->small_description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Fast Facts</h6></th>
                        <td class=''>
                            <p>{{ $city->fast_facts }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th><h6>Publish Website</h6></th>
                        <td>
                          @php if($city->is_publish_on_website == '1'){
                            $class = 'activelabel';
                            $data = 'Yes';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'No';
                            } @endphp
                            <div class="{{ $class; }}">{{ $data }}</div>
                        </td>
                        </tr>
                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($city->active == '1'){
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
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $city->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $city->updated_at }}</p>
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

