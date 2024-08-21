@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('bankdetails.index') }}">
            <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
    </div>

<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                            <th class='col-md-2'><h6>Name</h6></th>
                            <td class=''>
                            <p>{{ $bankdetail->name }}</p>
                            </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Company Master</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->companymaster ? $bankdetail->companymaster->name : '---' }}</p>
                        </td>
                </tr>
                    <tr>
                        <th class='col-md-2'><h6>Sort Code</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->sort_code }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Address</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->address }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Account No</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->account_no }}</p>
                        </td>
                   </tr>
                   <tr>
                    <th class='col-md-2'><h6>Currency</h6></th>
                    <td class=''>
                    <p>{{ $bankdetail->currency ? $bankdetail->currency->name : '---' }}</p>
                    </td>
               </tr>
                    <tr>
                        <th class='col-md-2'><h6>Swift Code</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->swift_code }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Iban No</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->iban_no }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Ifsc Code</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->ifsc_code }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Bank Contact</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->bank_contact }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Connecting Bank Name</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->connecting_bank_name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Connecting Bank Ifsc Code</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->connecting_bank_ifsc_code }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Google Address</h6></th>
                        <td class=''>
                        <p>{{ $bankdetail->google_address }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $bankdetail->country ? $bankdetail->country->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $bankdetail->state ? $bankdetail->state->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>City</h6></th>
                        <td class=''>
                            <p>{{ $bankdetail->city ? $bankdetail->city->name : '---' }}</p>
                        </td>
                    </tr>
                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($bankdetail->active == '1'){
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
                           <p>{{ $bankdetail->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $bankdetail->updated_at }}</p>
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

