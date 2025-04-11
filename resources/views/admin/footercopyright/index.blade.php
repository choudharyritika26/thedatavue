@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            {{-- <h1 style="margin-top: 20px">FooterCopyRight</h1> --}}
            <span>
                @if ($footercopyright->isEmpty())
                    <a href="{{ route('add-footer-copy-right') }}"><button class="btn btn-primary">Add
                            FooterCopyRight</button></a><br><br>
                @endif
            </span>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Footer Copy Right</h5>

                            <!-- Default Table -->
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($footercopyright as $index => $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{!! html_entity_decode($item->description) !!}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('edit-footer-copy-right', $item->id) }}"
                                                            class="btn btn-info btn-sm mx-2" title="Edit">
                                                            <i class="fa fa-edit" style="font-size:20px;"></i>
                                                        </a>

                                                        <form method="POST"
                                                            action="{{ route('destroy-footer-copy-right', $item->id) }}"
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
    </script>
@endsection
