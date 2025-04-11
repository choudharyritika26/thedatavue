@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Team Tables</h1>
            {{-- <span>
                <h1 style="margin-top:-30px; margin-left:750px;"><a href="{{ route('add-team') }}">Add Team</a></h1>
            </span> --}}
            <span style="">
                <a href="{{ route('add-team') }}"><button class="btn btn-primary">Add</button></a><br><br>
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
                            <h5 class="card-title"> Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th scope="col">Heading</th>
                                        <th scope="col">Post</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($team as $index => $item)
                                    <tr class="sortable-item" data-id="{{ $item->id }}">

                                        <td>{{ $item->sort_col }}</td>
                                            <td>{{ $item->heading }}</td>
                                            <td>{{ $item->post }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                    class="img-fluid" style="max-width:200px; height:150px;">
                                            </td>
                                            
                                            {{-- <td>
                                                <a href="{{ route('edit-team', $item->id) }}"> <i class="fa fa-edit"
                                                        style="font-size:30px"></i></a>
                                                <br>
                                               
                                                <form action="{{ route('destroy-team', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    @method('delete')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="fa fa-trash-o text-danger"
                                                        style="font-size:25px"></button>
                                                </form>
                                            </td> --}}
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('edit-team', $item->id) }}"
                                                        class="btn btn-info btn-sm mx-2" title="Edit">
                                                        <i class="fa fa-edit" style="font-size:20px;"></i>
                                                    </a>

                                                    <form method="POST" action="{{ route('destroy-team', $item->id) }}"
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
