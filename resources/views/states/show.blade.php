@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('states.index') }}">
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
                            <p>{{ $states->country->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $states->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State Code</h6></th>
                        <td class=''>
                            <p>{{ $states->state_code }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Page Url</h6></th>
                        <td class=''>
                            <p>{{ $states->page_url }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Canonical Url</h6></th>
                        <td class=''>
                            <p>{{ $states->canonical_url }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Small Description</h6></th>
                        <td class=''>
                            <p>{{ $states->small_description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Latitude</h6></th>
                        <td class=''>
                            <p>{{ $states->latitude }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Longitude</h6></th>
                        <td class=''>
                            <p>{{ $states->longitude }}</p>
                        </td>
                    </tr>
                    <tr>
                    <th><h6>Publish on Website</h6></th>
                    <td>
                      @php if($states->is_publish_on_website == '1'){
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
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($states->active == '1'){
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
                           <p>{{ $states->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $states->updated_at }}</p>
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

