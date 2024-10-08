@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('accomodationtypes.index') }}">
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
                            <p>{{ $accomodationtype->name }}</p>
                        </td>
                    </tr>

                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($accomodationtype->active == '1'){
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
                        <th class='col-md-2'>
                            <h6>Created By</h6>
                        </th>
                        <td>
                            <p>{{ Auth::user()->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'>
                            <h6>Managed By</h6>
                        </th>
                        <td>
                            <p>{{ Auth::user()->name }}</p>
                        </td>
                    </tr>
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $accomodationtype->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $accomodationtype->updated_at }}</p>
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

