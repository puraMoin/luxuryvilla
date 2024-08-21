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
                        <th class='col-md-2'><h6>Role</h6></th>
                        <td class=''>
                            <p>{{ $user->roles->name }}</p>
                        </td>
                    </tr>        
                    <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $user->name }}</p>
                        </td>
                    </tr>            
                   <tr>
                        <th class='col-md-2'><h6>UserName</h6></th>
                        <td class=''>
                            <p>{{ $user->username }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Email</h6></th>
                        <td class=''>
                            <p>{{ $user->email }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Date of Birth</h6></th>
                        <td class=''>
                            <p>{{ $user->dob }}</p>
                        </td>
                    </tr>     
                    <tr>
                        <th class='col-md-2'><h6>Contact No</h6></th>
                        <td class=''>
                            <p>{{ $user->contact_no }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Alternate No</h6></th>
                        <td class=''>
                            <p>{{ $user->mobile_no }}</p>
                        </td>
                    </tr>                                            
                    <tr>
                        <th class='col-md-2'><h6>Gender</h6></th>
                        <td class=''>
                            <p>{{ $user->gender }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Address</h6></th>
                        <td class=''>
                            <p>{{ $user->address }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>ZipCode</h6></th>
                        <td class=''>
                            <p>{{ $user->zipcode }}</p>
                        </td>
                    </tr>
                  <tr>
                      <th><h6>Image</h6></th>
                       <td>
                          <p>
                             
                            @php
                                $firstImage = $user->image_file;
                                $id = $user->id;
                                $imagePath = $firstImage ? asset("images/users/image_file/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="50px">
                            @endif
                             
                           </p>
                       </td>
                    </tr>
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($user->active == '1'){
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
                    </tbody>
                </table>
            </div>
        </div>
    

</div>


    <!--Add new section end here-->
	</div>
</section>	
@endsection

