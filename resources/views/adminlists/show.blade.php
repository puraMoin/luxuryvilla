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
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                        <p>{{ $adminlist->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Username</h6></th>
                        <td class=''>
                        <p>{{ $adminlist->username }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Email</h6></th>
                        <td class=''>
                        <p>{{ $adminlist->email }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Contact</h6></th>
                        <td class=''>
                        <p>{{ $adminlist->contact }}</p>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($adminlist->active == '1'){
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
                           <p>{{ $adminlist->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Updated</h6></th>
                       <td>
                           <p>{{ $adminlist->updated_at }}</p>
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

