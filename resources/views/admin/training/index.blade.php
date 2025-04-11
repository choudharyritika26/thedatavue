@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        {{-- <h1 style="margin-top: 20px">Training Management</h1> --}}
        <span>
            <a href="{{ route('add-training') }}"><button class="btn btn-primary">Add</button></a>
        </span>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Training Detail</h5>

                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th scope="col">Heading</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($training as $index => $item)
                                    
                                    <tr class="sortable-item" data-id="{{ $item->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->heading }}</td>
                                        <td>{!! html_entity_decode($item->description) !!}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                class="img-fluid" style="max-width:200px; height:150px;">
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <!-- Edit Button -->
                                                <a href="{{ route('edit-training', $item->id) }}"
                                                    class="btn btn-info btn-sm mx-2" title="Edit">
                                                    <i class="fa fa-edit" style="font-size:20px;"></i>
                                                </a>

                                                <form method="POST" action="{{ route('destroy-training', $item->id) }}"
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
@endsection