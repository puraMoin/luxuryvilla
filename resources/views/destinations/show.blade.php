@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('destinations.index') }}">
          <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
      </div>



    <!--Add new section start here-->
<div class="card-style mt-20">
    <div class="table-wrapper table-responsive mt-10">
        <table class="table striped-table">
            <tbody>
            <tr>
                    <th class='col-md-2'><h6>Name</h6></th>
                    <td class=''>
                    <p>{{ $destination->name }}</p>
                    </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>Country</h6></th>
                <td class=''>
                <p>{{ $destination->country ? $destination->country->name : '---' }} </p>
                </td>
            </tr>
            <tr>
            <th class='col-md-2'><h6>State</h6></th>
            <td class=''>
                <p>{{ $destination->state ? $destination->state->name : '---' }}</p>
            </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>City</h6></th>
                <td class=''>
                    <p>{{ $destination->city ? $destination->city->name : '---' }}</p>
                </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>One Line Description</h6></th>
                <td class=''>
                <p>{{ $destination->one_line_description }}</p>
                </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>Thumbnail Image</h6></th>
                <td class=''>
                <p> <img src="{{ $destination->thumbnail_image ? asset('images/destination/thumbnail_image/' . $destination->id . '/' . $destination->thumbnail_image) : '---' }}" height="50px"></p>
                </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>Cover Image</h6></th>
                <td class=''>
                <p> <img src="{{ $destination->cover_image ? asset('images/destination/cover_image/' . $destination->id . '/' . $destination->cover_image) : '---' }}" height="50px"></p>
                </td>
            </tr>
            <tr>
            <th><h6>Status</h6></th>
            <td>
                @php if($destination->active == '1'){
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
                <th><h6>Disp HomePage</h6></th>
                <td>
                    @php if($destination->display_on_homepage == '1'){
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
                <th><h6>Is Top Destination</h6></th>
                <td>
                    @php if($destination->is_top_destination == '1'){
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
                <th class='col-md-2'><h6>No of elements to Show</h6></th>
                <td class=''>
                <p>{{ $destination->no_of_elements_to_show ? $destination->no_of_elements_to_show : '---' }}</p>
                </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>Homepage Order</h6></th>
                <td class=''>
                <p>{{ $destination->homepage_order }}</p>
                </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>Description</h6></th>
                <td class=''>
                <p>{{ $destination->description }}</p>
                </td>
            </tr>
            <tr>
                <th class='col-md-2'><h6>Slug</h6></th>
                <td class=''>
                <p>{{ $destination->slug ? $destination->slug : '---' }}</p>
                </td>
            </tr>
            <tr>
                <th><h6>Created</h6></th>
                <td>
                    <p>{{ $destination->created_at }}</p>
                </td>
            </tr>
            <tr>
                <th><h6>Modified</h6></th>
                <td>
                    <p>{{ $destination->updated_at }}</p>
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

