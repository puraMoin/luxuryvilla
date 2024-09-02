@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            @include('partials.breadcrumb')
            <!-- Add New Button -->
            <div class="right-mob-left">
                <a href="{{ route('facilities.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="row">
                    <!-- Add any additional rows or content here -->
                </div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>Icon</h6>
                                </th>
                                <th>
                                    <h6>Name</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Status</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facilities as $facility)
                                @php
                                    $class = '';
                                    $data = '';
                                @endphp

                                <tr>
                                    <td class="text-center"><p> @php
                                        $firstImage = $facility->icon_image;
                                        $id = $facility->id;
                                        $imagePath = $firstImage ? asset("images/facility/icon_image/{$id}/{$firstImage}") : null;
                                    @endphp
        
                                    @if(!empty($imagePath))
                                        <img src="{{ $imagePath }}" height="20px">
                                  @endif </p></td>
                                    <td>
                                        <p>{{ $facility->name }}</p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                          if($facility->active == '1'){
                                            $class = 'activelabel';
                                            $data = 'Active';
                                          } else {
                                            $class = 'inactivelabel';
                                            $data = 'Inactive';
                                          }
                                        @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                      </td>


                                    <td class="text-center">
                                        <a href="{{ route('facilities.edit', $facility->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('facilities.show', $facility->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $facilities])
        </div>
    </section>
@endsection
