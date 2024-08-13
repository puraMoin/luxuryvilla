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
                            <p>{{ $companymaster->name }}</p>
                            </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Alias</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->alias }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Registration No</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->registration_no }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Vat No</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->vat_no }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Business Registration Name</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->business_registration_name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Tin No</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->tin_no }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Currency</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->currency ? $companymaster->currency->name : '---' }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Incorporate Name</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->incorporate_name }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Website</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->website }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Address</h6></th>
                        <td class=''>
                        <p>{{ $companymaster->address }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->country ? $companymaster->country->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->state ? $companymaster->state->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>City</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->city ? $companymaster->city->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>ZipCode</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->zipcode }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Area</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->area }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Phone Calling Code 1</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->phone_calling_code_1 }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Contact No 1</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->contact_no_1 }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Phone Calling Code 2</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->phone_calling_code_2 }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Contact No 2</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->contact_no_2 }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Email</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->email }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Fax</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->fax }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>ImageFile</h6></th>
                        <td class=''>
                            <img src="{{ $companymaster->image_file ? asset('images/companymasters/image_file/' . $companymaster->id . '/' . $companymaster->image_file) : asset('images/no-image.png') }}"
                                        style="width: 100px; height:70px;">
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Note</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->note }}</p>
                        </td>
                    </tr>

                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($companymaster->active == '1'){
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
                        <th class='col-md-2'><h6>Facebook Link</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->facebook_link }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Twitter Link</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->twitter_link }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Header Image File</h6></th>
                        <td class=''>
                            <img src="{{ $companymaster->image_file ? asset('images/companymasters/header_image_file/' . $companymaster->id . '/' . $companymaster->header_image_file) : asset('images/no-image.png') }}"
                            style="width: 100px; height:70px;">

                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Footer Image File</h6></th>
                        <td class=''>
                            <img src="{{ $companymaster->image_file ? asset('images/companymasters/footer_image_file/' . $companymaster->id . '/' . $companymaster->header_image_file) : asset('images/no-image.png') }}"
                            style="width: 100px; height:70px;">
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Google Address</h6></th>
                        <td class=''>
                            <p>{{ $companymaster->google_address }}</p>
                        </td>
                    </tr>
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $companymaster->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $companymaster->updated_at }}</p>
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

