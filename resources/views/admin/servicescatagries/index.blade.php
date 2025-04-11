@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px"> </h1>
            <div class="btn-group" role="group" aria-label="Basic example">
                {{-- <span style="">
                    <a href="{{ route('add-servicescatagries') }}"><button class="btn btn-primary">Add</button></a><br><br>
                </span> --}}
                <span style="">
                    <a href="{{ route('add-servicescatagries') }}"><button class="btn btn-primary">Add</button></a><br><br>
                </span>
            </div>
            {{-- <span>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button  type="button" class="btn btn-prime">Add</button>
                  </div>
               
                <h1 style="margin-top:-30px; margin-left: 95%;"><a href="{{ route('add-servicescatagries') }}">Add </a></h1>
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
                            <h5 class="card-title"> Services Category</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th scope="col">Catagory</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($servicescatagries as $index => $item)
                                    <tr class="sortable-item" data-id="{{ $item->id }}">

                                        <td>{{ $item->sort_col }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td class="text-center">
                                                <div class="d-flex ">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('edit-servicescatagries', $item->id) }}"
                                                        class="btn btn-info btn-sm mx-2" title="Edit">
                                                        <i class="fa fa-edit" style="font-size:20px;"></i>
                                                    </a>


                                                    <form method="POST"
                                                        action="{{ route('destroy-servicescatagries', $item->id) }}"
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
