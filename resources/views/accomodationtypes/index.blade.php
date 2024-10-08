@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container-fluid">
     <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('accomodationtypes.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>

    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">

<div class="col-sm-4">
<div class="filtertext">
<ul>
<!-- <li>1 Selected</li> -->
<!--<li><a href="#"><i class="lni lni-pencil"></i> Edit</a></li>-->
<!-- <li><a href="#"><i class="lni lni-trash-can"></i> Delete</a></li> -->
</ul>
</div>
</div>
<div class="col-sm-4 rowmargin10">
<div class="right-mob-left"></div>
</div>
</div>

<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>

<th><h6>Name</h6></th>
<th class="text-center"><h6>Status</h6></th>
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@php $class = '';
      $data = '';
@endphp

@foreach ($accomodationtypes as $accomodationtype)

<tr>

<td><p> {{ $accomodationtype->name }} </p></td>

<td class="text-center">
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
<td class="text-center"><a href="{{ route('accomodationtypes.edit',$accomodationtype->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('accomodationtypes.show',$accomodationtype->id) }}"><i class="lni lni-list"></i></a>
</td>

</tr>

@endforeach
<!-- end table row -->


</tbody>
</table>
<!-- end table -->
</div>
</div>
@include('partials.pagination', ['items' => $accomodationtypes])
  </div>
</section>
@endsection

