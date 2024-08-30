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
                            <th class='col-md-2'><h6>Supplier</h6></th>
                            <td class=''>
                                <p>{{ $supplier->supplier_code }}</p>
                            </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Supplier Type</h6></th>
                        <td class=''>
                            <p>{{ $supplier->suppliertype ? $supplier->suppliertype->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Supplier Region Type</h6></th>
                        <td class=''>
                            <p>{{ $supplier->supplierregiontype ? $supplier->supplierregiontype->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $supplier->name }}</p>
                        </td>
                    </tr>
                   <tr>
                        <th class='col-md-2'><h6>UserName</h6></th>
                        <td class=''>
                            <p>{{ $supplier->username }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Doing Business Under Name</h6></th>
                        <td class=''>
                            <p>{{ $supplier->doing_business_under_name_of }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Gst No</h6></th>
                        <td class=''>
                            <p>{{ $supplier->gst_no ? $supplier->gst_no : '---'}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Company Address</h6></th>
                        <td class=''>
                            <p>{{ $supplier->company_address }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $supplier->country ? $supplier->country->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $supplier->state ? $supplier->state->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>City</h6></th>
                        <td class=''>
                            <p>{{ $supplier->city ? $supplier->city->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>ZipCode</h6></th>
                        <td class=''>
                            <p>{{ $supplier->zipcode }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Area</h6></th>
                        <td class=''>
                            <p>{{ $supplier->area }}</p>
                        </td>
                    </tr>
                    {{-- <tr>
                        <th class='col-md-2'><h6>Area</h6></th>
                        <td class=''>
                            <p>{{ $supplier->area }}</p>
                        </td>
                    </tr> --}}

                    <tr>
                        <th><h6>Is Default Supplier</h6></th>
                        <td>
                          @php if($supplier->is_default_supplier == '1'){
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
                        <th class='col-md-2'><h6>Contact 1</h6></th>
                        <td class=''>
                            <p>{{ $supplier->contact_no_1 }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Contact 2</h6></th>
                        <td class=''>
                            <p>{{ $supplier->contact_no_2 }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Area</h6></th>
                        <td class=''>
                            <p>{{ $supplier->area }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Fax</h6></th>
                        <td class=''>
                            <p>{{ $supplier->fax }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Email</h6></th>
                        <td class=''>
                            <p>{{ $supplier->email }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Payee Name</h6></th>
                        <td class=''>
                            <p>{{ $supplier->payee_name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Description</h6></th>
                        <td class=''>
                            <p>{{ $supplier->description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Vat Reference No</h6></th>
                        <td class=''>
                            <p>{{ $supplier->vat_ref_number }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Is Online Supplier</h6></th>
                        <td>
                            @if($supplier->is_online_supplier == '1')
                                @if ($supplier->onlineSuppliers && $supplier->onlineSuppliers->isNotEmpty())
                                    <p>
                                        @foreach ($supplier->onlineSuppliers as $onlineSupplier)
                                            {{ $onlineSupplier->name }}@if(!$loop->last), @endif
                                        @endforeach
                                    </p>
                                @else
                                @endif
                            @else
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Google Address</h6></th>
                        <td class=''>
                            <p>{{ $supplier->google_address }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Supplier Unique Number</h6></th>
                        <td class=''>
                            <p>{{ $supplier->supplier_unique_number }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th><h6>Status</h6></th>
                        <td>
                          @php if($supplier->active == '1'){
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
                        <th><h6>Is Locked</h6></th>
                        <td>
                          @php if($supplier->is_locked == '1'){
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
                        <th><h6>Is Current Active For Chat</h6></th>
                        <td>
                          @php if($supplier->is_current_active_for_chat == '1'){
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
                        <th><h6>Is Supplier</h6></th>
                        <td>
                          @php if($supplier->is_supplier == '1'){
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
                        <th><h6>Is Code Setup Used</h6></th>
                        <td>
                          @php if($supplier->is_code_setup_used == '1'){
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
                        <th class='col-md-2'><h6>Date of Birth</h6></th>
                        <td class=''>
                            <p>{{ $supplier->dob ? $supplier->dob : '---'}}</p>
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

