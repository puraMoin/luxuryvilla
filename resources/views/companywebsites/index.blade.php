@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('companywebsites.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
<div class="card-style mt-20">


<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th><h6><a href="#">Company Master<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Website Type<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Country<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Name<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th class="text-center"><h6>Status</h6></th>
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@php $class = '';
      $data = '';
@endphp

@foreach ($companywebsite as $companywebsites)


<tr>
    <td><p> {{ $companywebsites->companymaster ? $companywebsites->companymaster->name : '---' }} </p></td>
    <td><p> {{ $companywebsites->websitetype ? $companywebsites->websitetype->name : '---' }} </p></td>
    <td><p> {{ $companywebsites->country ? $companywebsites->country->name : '---' }} </p></td>
    <td><p> {{ $companywebsites->name }}
</p></td>
<td class="text-center">
  @php if($companywebsites->active == '1'){
    $class = 'activelabel';
    $data = 'Active';
    }
    else{
    $class = 'inactivelabel';
    $data = 'Inactive';
    } @endphp
    <div class="{{ $class; }}">{{ $data }}</div>
</td>
<td class="text-center"><a href="{{ route('companywebsites.edit',$companywebsites->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('companywebsites.show',$companywebsites->id) }}"><i class="lni lni-list"></i></a>
</td>

</tr>

@endforeach
<!-- end table row -->
</tbody>
</table>
<!-- end table -->
</div>
</div>
@include('partials.pagination', ['items' => $companywebsite])
</div>
</section>
@endsection

{{-- <script>
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
</script> --}}
