@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            {{-- <h1 style="margin-top: 20px">Edit Contact Us Footer</h1> --}}
            <span>
                <a href="{{ route('contactus-index') }}"><button class="btn btn-primary">Back</button></a>
            </span>
            {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav> --}}
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if ($message = Session::get('Success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Contact Us Form</h5>


                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('update-contactus', $contactus->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="errorlist">
                                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                        <ul></ul>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <label for="heading" class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading"
                                        value="{{ $contactus->heading }}"id="heading">
                                </div> --}}

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{!! html_entity_decode($contactus->address) !!}"id="address">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email Id</label>
                                    <input type="email" class="form-control" name="email_id"
                                        value="{{ $contactus->email_id }}" id="email">
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone No.</label>
                                    <input type="text" class="form-control" name="phone_no"
                                        value="{{ $contactus->phone_no }}" id="phone" pattern="^[0-9]{10}$"
                                        maxlength="10" oninput="validatePhone()" required>
                                </div>

                                <div class="col-12">
                                    <label for="image" class="form-label">Image</label>
                                    <img src="{{ asset('storage/' . $contactus->image) }}" alt="" class="img-fluid mb-3"
                                        style="width: 200px;height:150px;">
                                    <input type="file" class="form-control" name="image" value="{{ $contactus->image }}"
                                        id="image" onchange="previewImage(event)">
                                </div>

                                <div class="mb-3 image-preview-container" style="display: none;">
                                    <label for="preview">Image Preview</label>
                                    <img class="image-preview" style="max-width: 100%;" />
                                    <input type="hidden" class="crop-data-x" name="cropDataX">
                                    <input type="hidden" class="crop-data-y" name="cropDataY">
                                    <input type="hidden" class="crop-data-width" name="cropDataWidth">
                                    <input type="hidden" class="crop-data-height" name="cropDataHeight">
                                </div>

                                <!-- <div class="mb-3">
                                    <label for="sort">Sort Col</label>
                                    <input class="form-control @error('sort_col') is-invalid @enderror" type="text"
                                        name="sort_col" value="{{ $contactus->sort_col }}" id="sort_col"
                                        placeholder="Sort Col" required />
                                    @error('sort_col')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->

                                <div class="card-action submitEditContactusBtn">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    {{-- <button class="btn btn-danger">Cancel</button> --}}
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.umd.js"></script> 

   

    <script>
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
        } = CKEDITOR;

        let editorInstance;

        ClassicEditor
            .create(document.querySelector('#comment'), {
                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                editorInstance = editor; // Store the editor instance
            })
            .catch(error => {
                console.error(error);
            });
    </script>


    <script>
       $(document).ready(function() {
    // Handle the form submission for the contactus
    $('.submitEditContactusBtn').click(function(e) {
        e.preventDefault();

        // Create a new FormData instance
        var form = $(this).closest('form')[0]; // Ensure this selects the correct form
        var formData = new FormData(form);

        // Get the value from the CKEditor instance directly
        const description = editorInstance ? editorInstance.getData() : ''; // Check if editorInstance is defined
        formData.set('description', description); // Set the description field with CKEditor data

        // Send the AJAX request with the CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{{ route('update-contactus', $contactus->id) }}',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.message) {
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed && response.redirect_url) {
                            window.location.href = response.redirect_url;
                        }
                    });
                }
            },
            error: function(xhr) {
                $('#errorMessages ul').empty();
                $('#errorMessages').show();

                if (xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key, messages) {
                        messages.forEach(function(message) {
                            $('#errorMessages ul').append('<li>' + message + '</li>');
                        });
                    });
                } else {
                    $('#errorMessages ul').append('<li>There was an error processing your request.</li>');
                }
            }
        });
    });
});
    </script>
@endsection
