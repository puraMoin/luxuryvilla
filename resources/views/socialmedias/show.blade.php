@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('socialmedias.index') }}">
            <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
    </div>
    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>

                    <tr>
                        <th class='col-md-2'><h6>Company Website</h6></th>
                        <td class=''>
                            <p> {{ $socialmedias->companywebsite ? $socialmedias->companywebsite->name : '---'   }} </p>
                        </td>
                    </tr>

                   <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $socialmedias->name }}</p>
                        </td>
                   </tr>

                   <tr>
                    <th><h6>Image</h6></th>
                     <td>
                        <img src="{{ $socialmedias->image ? asset('images/socialmedias/image/' . $socialmedias->id . '/' . $socialmedias->image) : asset('images/no-image.png') }}"
                            style="width: 100px; height:70px;">
                     </td>
                  </tr>

                   <tr>
                        <th class='col-md-2'><h6>Link</h6></th>
                        <td class=''>
                            <p> {{ $socialmedias->link }} </p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Order</h6></th>
                        <td class=''>
                            <p> {{ $socialmedias->order }} </p>
                        </td>
                    </tr>

                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($socialmedias->active == '1'){
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
                           <p>{{ $socialmedias->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $socialmedias->updated_at }}</p>
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

