@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        {{-- <h1 style="margin-top: 20px">Career Management</h1> --}}
        <span>
            <a href="{{ route('add-career') }}"><button class="btn btn-primary">Add Career</button></a><br><br>
        </span>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Career</h5>

                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th scope="col">Heading</th>
                                        <th scope="col">Experience</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($career as $index => $item)
                                    <tr class="sortable-item" data-id="{{ $item->id }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->heading }}</td>
                                        <td>{{ $item->exp }}</td>
                                        <td>{!! html_entity_decode($item->description) !!}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <!-- Edit Button -->
                                                <a href="{{ route('edit-career', $item->id) }}"
                                                    class="btn btn-info btn-sm mx-2" title="Edit">
                                                    <i class="fa fa-edit" style="font-size:20px;"></i>
                                                </a>

                                                <form method="POST" action="{{ route('destroy-career', $item->id) }}"
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
                        </div>
                        <!-- End Default Table Example -->
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
                    url: "{{ route('update-career-order') }}",  // Define your route here   
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