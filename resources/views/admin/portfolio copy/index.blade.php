@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px"> </h1>
            {{-- <span>
                <h1 style="margin-top:-30px; margin-left:750px;"><a href="{{ route('add-portfolio') }}">Add Portfolio</a></h1>
            </span> --}}
            <span style="">
                <a href="{{ route('add-portfolio') }}"><button class="btn btn-primary">Add</button></a><br><br>
            </span>
            {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav> --}}
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Portfolio</h5>

                            <!-- Default Table -->
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Sr. no</th>
                                        <th scope="col">Catagory</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Start Date</th>
                                        {{-- <th scope="col">Project URL</th> --}}
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Slider Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($portfolio as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td> --}}
                                    @foreach ($portfolio as $index => $item)
                                        <tr class="sortable-item" data-id="{{ $item->id }}">

                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->heading }}</td>
                                            <td>{{ $item->startdate }}</td>
                                            {{-- <td>{{ $item->project_url }}</td> --}}
                                            {{-- <td>{{ $item->description }}</td> --}}
                                            <td>{!! html_entity_decode($item->description) !!}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                    class="img-fluid" style="max-width:200px; height:100px;">
                                            </td>
                                            {{-- =========================slider image===================== --}}
                                            <td>
                                                @php
                                                    // Split the image string into an array
                                                    $imageFilenames = explode(',', $item->slider_image);
                                                @endphp

                                                <div class="image-gallery">
                                                    @foreach ($imageFilenames as $filename)
                                                        <img src="{{ asset('storage/' . $filename) }}" alt=""
                                                            class="img-fluid"
                                                            style="max-width:200px; height: 100px; margin: 5px;">
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex ">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('edit-portfolio', $item->id) }}"
                                                        class="btn btn-info btn-sm mx-2" title="Edit">
                                                        <i class="fa fa-edit" style="font-size:20px;"></i>
                                                    </a>

                                                    <form method="POST"
                                                        action="{{ route('destroy-portfolio', $item->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm showConfirm mx-2"
                                                            data-toggle="tooltip" title="Delete"
                                                            onclick="confirmDelete(event, this)">
                                                            <i class="fa fa-trash" style="font-size:20px;"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('script')
    <script>
        function confirmDelete(event, button) {
            // Show a confirmation box
            if (confirm("Are you sure you want to delete this item?")) {
                // If the user clicks "Yes", submit the form
                button.closest('form').submit();
            } else {
                // If the user clicks "No", do nothing
                event.preventDefault();
            }
        }
    </script>

<script>
    $(document).ready(function() {
        // Make the table rows sortable
        $("tbody").sortable({
            items: "tr.sortable-item",  // Use the class to target the rows
            cursor: "move",
            update: function(event, ui) {
                // Get the sorted elements
                var sortedIDs = [];
                $("tbody tr.sortable-item").each(function() {
                    var id = $(this).data('id');  // Get the ID from data attribute
                    sortedIDs.push(id);
                });
    
                // Update the serial numbers based on the new order
                $("tbody tr").each(function(index) {
                    $(this).find("td:first").text(index + 1); // Update serial number
                });
    
                // Send the sorted IDs to the server to update the order in the database
                $.ajax({
                    url: "{{ route('update-portfolio-order') }}",  // Define your route here   
                    method: "POST",
                    data: {
                        ids: sortedIDs,
                        _token: '{{ csrf_token() }}'  // Include CSRF token
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.error(xhr);
                    }
                });
            }
        }).disableSelection();
    });
    </script>

@endsection
