@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Portfolio </h1>
            {{-- <span>
                <h1 style="margin-top:-30px; margin-left:750px;"><a href="{{ route('add-portfoliodetales') }}">Add Portfolio</a></h1>
            </span> --}}
            <span style="">
                <a href="{{ route('add-portfoliodetales') }}"><button class="btn btn-primary">Add</button></a><br><br>
            </span>
            
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row ">
                {{-- <div class="col-lg-12"> --}}

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th scope="col">Portfolio</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Plate Form</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($portfoliodetales as $index => $item)
                                    <tr class="sortable-item" data-id="{{ $item->id }}">

                                        <td>{{ $item->sort_col }}</td>
                                            <td>{{ $item->portfolioName->heading ?? '' }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @php
                                                    $platformsArray = json_decode($item->platform);
                                                @endphp
                                                {{ is_array($platformsArray) ? implode(', ', $platformsArray) : $item->platform }}
                                            </td>
                                            <td>{{ $item->startdate }}</td>
                                            <td>{{ $item->enddate }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                @php
                                                    // Split the image string into an array
                                                    $imageFilenames = explode(',', $item->image);
                                                @endphp

                                                <div class="image-gallery">
                                                    @foreach ($imageFilenames as $filename)
                                                        <img src="{{ asset('storage/' . $filename) }}" alt=""
                                                            class="img-fluid"
                                                            style="max-width:200px; height: auto; margin: 5px;">
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex ">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('edit-portfoliodetales', $item->id) }}"
                                                        class="btn btn-info btn-sm mx-2" title="Edit">
                                                        <i class="fa fa-edit" style="font-size:20px;"></i>
                                                    </a>

                                                    <form method="POST"
                                                        action="{{ route('destroy-portfoliodetales', $item->id) }}"
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
                {{-- </div> --}}

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
