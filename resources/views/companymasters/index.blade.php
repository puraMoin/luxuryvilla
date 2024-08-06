@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('companymasters.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">

    
<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th><h6><a href="#">Name<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Country<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">State<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">City<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th class="text-center"><h6>Status</h6></th>    
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@php $class = '';
      $data = '';
@endphp

@foreach ($companymasters as $companymaster)    

<tr>


<td><p> {{ $companymaster->name }} </p></td>
<td><p> {{ $companymaster->country ? $companymaster->country->name : '---' }} </p></td>
<td><p> {{ $companymaster->state ? $companymaster->state->name : '---' }} </p></td>
<td><p>{{ $companymaster->city ? $companymaster->city->name : '---' }}</p></td>
<td class="text-center">
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
<td class="text-center"><a href="{{ route('companymasters.edit',$companymaster->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('companymasters.show',$companymaster->id) }}"><i class="lni lni-list"></i></a>
</td>

</tr>

@endforeach
<!-- end table row -->

 
</tbody>
</table>
<!-- end table -->
</div>
</div>
 
    <!--Add new section end here-->
	</div>
</section>	
@endsection

<script>
    $(document).ready(function () {
        $('#search_name').on('input', function () {
            // Clear previous suggestions
            $('#suggestions').empty();

            // Get the input value
            var searchName = $(this).val();

            // Make an AJAX request to get suggestions
            if (searchName.length >= 3) {
                $.ajax({
                    url: '/your-suggestions-endpoint', // Replace with your actual endpoint
                    method: 'GET',
                    data: { search_name: searchName },
                    success: function (data) {
                        // Display suggestions
                        $.each(data, function (index, suggestion) {
                            $('#suggestions').append('<div>' + suggestion.name + '</div>');
                        });
                    }
                });
            }
        });

    });
</script>
