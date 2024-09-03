@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->
     <!-- Add New Button -->
     <div class="right-mob-left">
        <!-- <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button>  -->
        <a href="{{ route('properties.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
	</div>

   <div class="container-fluid">
        @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
     @endif
      <div class="card-style mt-20">
         <!-- <div class="create_update">Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
         <!-- Search Panel -->
         <div class="row"></div>
         <div class="table-wrapper table-responsive mt-10">
            <table class="table striped-table">
               <thead>
               <tr>
                  <th class=""><h6>Name</h6></th>
                  <th class=""><h6>Property Type</h6></th>
                  <th class=""><h6>Destination</h6></th>
                  <th class=""><h6>Country</h6></th>
                  <th class=""><h6>State</h6></th>
                  <th class=""><h6>Owner</h6></th>           
                  <th class="text-center"><h6>Active</h6></th>
                  <th class="text-center"><h6>Action</h6></th>
               </tr>
               </thead>
               <tbody>
                @php $class = '';
                      $data = '';
                @endphp

                @foreach ($properties as $property)
                <tr>
                  <td><p> {{ $property->name ? $property->name : '---' }} </p></td>
                  <td><p> {{ $property->its_apartment == '1' ? 'Apartment' : 'Villa' }} </p></td>
                  <td><p> {{ $property->destinations ? $property->destinations->name : '---' }} </p></td>
                  <td><p> {{ $property->country ? $property->country->name : '---' }} </p></td>
                  <td><p> {{ $property->states ? $property->states->name : '---' }} </p></td>
                  <td><p> {{ $property->it_supplier_property == '1' ? ($property->suppliers ? $property->suppliers->name : '---') : $userName }} </p></td>
                  <td class="text-center">
                      @php if($property->active == '1'){
                            $class = 'activelabel';
                            $data = 'Active';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'Inactive';
                            } @endphp
                   <div class="{{ $class; }}">{{ $data }}</div>
                   </td>
                  <td class="text-center"><a href="{{ route('properties.edit',$property->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('properties.show',$property->id) }}"><i class="lni lni-list"></i></a>
                  </td>
                 </tr>
                 @endforeach
               </tbody>
            </table>
         </div>
      </div>
      @include('partials.pagination', ['items' => $properties])
   </div>
</section>
@endsection
