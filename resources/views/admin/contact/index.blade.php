@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        {{-- <h1 style="margin-top: 20px">Contact Users Management</h1> --}}
        {{-- Uncomment if you want to add a button to add new contacts --}}
        {{-- <span style="">
            <a href="{{ route('add-contact') }}"><button class="btn btn-primary">Add Client</button></a><br><br>
        </span> --}}
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Users</h5>

                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ $item->message }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <form method="POST" action="{{ route('destroy-contact', $item->id) }}"
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