@extends('admin.layout.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.css" />
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Slider Tables</h1>
            <div class="btn-group" role="group" aria-label="Basic example">
                <span>
                    <a href="{{ route('add-slider') }}"><button class="btn btn-primary">Add</button></a><br><br>
                </span>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Table</h5>

                            <!-- Default Table -->
                            <table class="table" id="sortableTable">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th scope="col">Heading</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable-body">
                                    @foreach ($slider as $index => $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $item->sort_col }}</td>
                                            <td>{{ $item->heading }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                    class="img-fluid" style="max-width:200px; height:150px;">
                                            </td>

                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <!-- Edit Button -->
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
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
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

        // Initialize Sortable functionality on the table body
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize SortableJS for dragging rows
            const sortable = new Sortable(document.getElementById('sortable-body'), {
                handle: '.sortable-handle', // Optional, use a handle for dragging (can be added to the rows)
                onEnd: function(evt) {
                    const sortedIds = [];
                    const rows = document.querySelectorAll('#sortable-body tr');
                    rows.forEach(function(row) {
                        sortedIds.push(row.getAttribute('data-id'));
                    });

                    // Send the sorted order of IDs to the server
                    fetch('{{ route("update-slider-order") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ sorted_ids: sortedIds })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Order updated successfully');
                        } else {
                            alert('There was an issue updating the order.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        });
    </script>
@endsection
