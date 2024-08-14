@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')



    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                        <th class='col-md-2'><h6>Company Master</h6></th>
                        <td class=''>
                            <p>{{ $companywebsite->companymaster ? $companywebsite->companymaster->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Website Type</h6></th>
                        <td class=''>
                            <p>{{ $companywebsite->websitetype ? $companywebsite->websitetype->name : '---' }}</p>
                        </td>
                    </tr>
                   <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                        <p>{{ $companywebsite->country ? $companywebsite->country->name : '---' }} </p>
                        </td>
                   </tr>

                   <tr>
                    <th class='col-md-2'><h6>Link</h6></th>
                    <td class=''>
                    <p>{{ $companywebsite->link }}</p>
                    </td>
               </tr>

                   <tr>
                    <th class='col-md-2'><h6>Name</h6></th>
                    <td class=''>
                    <p>{{ $companywebsite->name }}</p>
                    </td>
                    </tr>


                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($companywebsite->active == '1'){
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
                       <th><h6>Created At</h6></th>
                       <td>
                           <p>{{ $companywebsite->created_at }}</p>
                       </td>
                    </tr>

                    <tr>
                       <th><h6>Updated At</h6></th>
                       <td>
                           <p>{{ $companywebsite->updated_at }}</p>
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
                    </tbody>
                </table>
            </div>
        </div>


</div>


    <!--Add new section end here-->
	</div>
</section>
@endsection

