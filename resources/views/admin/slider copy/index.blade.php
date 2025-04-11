@extends('admin.layout.app')

@section('style')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Slider Tables</h1>
            <div class="btn-group" role="group" aria-label="Basic example">
                {{-- <span style="">
                    <a href="{{ route('add-slider') }}"><button class="btn btn-primary">Add</button></a><br><br>
                </span> --}}
                <span style="">
                    <a href="{{ route('add-slider') }}"><button class="btn btn-primary">Add</button></a><br><br>
                </span>
            </div>
            {{-- <span>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button  type="button" class="btn btn-prime">Add</button>
                  </div>
               
                <h1 style="margin-top:-30px; margin-left: 95%;"><a href="{{ route('add-slider') }}">Add </a></h1>
            </span> --}}
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
                            <h5 class="card-title"> Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th scope="col">Heading</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slider as $item)
                                        <tr id="{{ $item->id }}">
                                            <td>{{ $item->sort_col }}</td>
                                            <td>{{ $item->heading }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                    class="img-fluid" style="max-width:200px; height:150px;">
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('edit-slider', $item->id) }}"
                                                        class="btn btn-info btn-sm mx-2" title="Edit">
                                                        <i class="fa fa-edit" style="font-size:20px;"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('destroy-slider', $item->id) }}"
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
            items: "tr",
            cursor: "move",
            update: function(event, ui) {
                // Get the sorted IDs
                var sortedIDs = $(this).sortable("toArray");
                // Send the sorted IDs to the server
                $.ajax({
                    url: "{{ route('update-slider-order') }}", // Define your route here
                    method: "POST",
                    data: {
                        ids: sortedIDs,
                        _token: '{{ csrf_token() }}' // Include CSRF token
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
