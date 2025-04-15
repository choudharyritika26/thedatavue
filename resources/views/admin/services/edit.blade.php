@extends('admin.layout.app')

@section('styles')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px"></h1>
            {{-- <span>
                <h1 style="margin-top:-30px; margin-left:800px;"><a href="{{ route('services-index') }}">Back</a></h1>
            </span> --}}
            <span style="">
                <a href="{{ route('services-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
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
                            <h5 class="card-title">Edit Services</h5>



                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('update-services', $services->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="errorlist">
                                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                        <ul></ul>
                                    </div>
                                </div>

                                <!-- <div class="col-12">
                                                                                                        <label for="category" class="form-label">Category</label>
                                                                                                        <select class="form-select" name="category" id="catagory">
                                                                                                            <option value="">Select Category</option>
                                                                                                            @foreach ($servicescatagries as $category)
    <option value="{{ $category->id }}"
                                                                                                                    {{ old('category', $services->category ?? '') == $category->id ? 'selected' : '' }}>
                                                                                                                    {{ $category->category }}
                                                                                                                </option>
    @endforeach
                                                                                                        </select>
                                                                                                        @if ($errors->has('category'))
    <span class="text-danger">{{ $errors->first('category') }}</span>
    @endif
                                                                                                    </div> -->

                                <div class="col-12">
                                    <label for="heading" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="heading"
                                        value="{{ $services->heading }}"id="heading">
                                </div>

                                <div class="col-12">
                                    <label for="comment">Description</label>
                                    <textarea class="form-control description summernote" name="description" rows="3">{!! html_entity_decode($services->description) !!} </textarea>

                                </div>

                                <div class="col-12">

                                    <label for="image" class="form-label">Image</label>
                                    <img src="{{ asset('storage/' . $services->image) }}" alt=""
                                        class="img-fluid mb-3" style="width: 200px;height:150px;">
                                    <input type="file" class="form-control" name="image" value="{{ $services->image }}"
                                        id="image" onchange="previewImage(event)">
                                </div>

                                <div class="mb-3 image-preview-container" style="display: none;">
                                    <label for="preview">Image Preview</label>
                                    <img class="image-preview" style="max-width: 100%;" />
                                    <input type="hidden" class="crop-data-x" name="cropDataX">
                                    <input type="hidden" class="crop-data-y" name="cropDataY">
                                    <input type  ="hidden" class="crop-data-width" name="cropDataWidth">
                                    <input type="hidden" class="crop-data-height" name="cropDataHeight">
                                </div>

                                {{-- <div class="col-12">
                                    <label for="sort">Sort Col</label>
                                    <input class="form-control @error('sort_col') is-invalid @enderror" type="text"
                                        name="sort_col" value="{{ $services->sort_col }}" id="sort_col" placeholder="Sort Col" required/>
                                    @error('sort_col')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="card-action submitEditServicesBtn">
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

    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


    <script>
        $('.summernote').summernote({
            //   placeholder: 'Hello stand alone ui',
            tabsize: 2,
            //   height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                var description = $('.summernote').summernote('code');
                if (!description.trim()) {
                    event.preventDefault();
                    $('.summernote').addClass('is-invalid');
                    $('.summernote').parent().find('.invalid-feedback').text('Description is required');
                }
            });
        });
    </script>


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
            // Handle the form submission for the services
            $('.submitEditServicesBtn').click(function(e) {
                //alert('jijed');
                e.preventDefault();

                $('#errorMessages ul').empty();
                $('#errorMessages').hide();
                let errors = [];

                let heading = $('input[name="heading"]').val().trim();
                // let image = $('input[name="image"]').val().trim();
                let descriptionHtml = $('.description').summernote('code');
                let tempElement = document.createElement('div');
                tempElement.innerHTML = descriptionHtml;
                let descriptionText = tempElement.textContent || tempElement.innerText || '';
                descriptionText = descriptionText.replace(/\s+/g, '').trim();

                // Validate all fields in order
                if (!heading) errors.push('The heading field is required.');
                if (!descriptionText) errors.push('The description field is required.');
                //if (!image) errors.push('The image field is required.');

                if (errors.length > 0) {
                    errors.forEach(function(error) {
                        $('#errorMessages ul').append('<li>' + error + '</li>');
                    });
                    $('#errorMessages').show();
                    return;
                }

                // Proceed with AJAX submission
                var form = $(this).closest('form')[0];
                var formData = new FormData(form);
                formData.set("description", descriptionHtml);


                // Create a new FormData instance
                //var formData = new FormData($(this).closest('form')[0]);

                // Get the value from the CKEditor instance directly
                // const description = editorInstance.getData(); // Use the global editor instance
                // formData.set('description', description); // Set the description field with CKEditor data

                // Send the AJAX request with the CSRF token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    // Adjust the route for the services form submission
                    url: '{{ route('update-services', $services->id) }}',
                    data: formData,
                    contentType: false, // Important: Set this to false to send the file
                    processData: false, // Important: Set this to false to send the file
                    dataType: 'json',
                    success: function(response) {
                        if (response.message) {
                            // Display the SweetAlert with a confirmation button
                            Swal.fire({
                                title: response.message,
                                icon: 'success', // Optional: set the icon type
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to the specified URL
                                    if (response.redirect_url) {
                                        window.location.href = response.redirect_url;
                                    }
                                }
                            });
                        }
                    },
                    error: function(xhr) {
                        // Clear previous error messages
                        $('#errorMessages ul').empty();

                        // Handle the error response
                        if (xhr.responseJSON.errors) {
                            // Show the alert
                            $('#errorMessages').show();

                            // Loop through the errors and append to the error list
                            $.each(xhr.responseJSON.errors, function(key, messages) {
                                messages.forEach(function(message) {
                                    $('#errorMessages ul').append('<li>' +
                                        message + '</li>');
                                });
                            });
                        } else {
                            // If there are no specific validation errors, you can show a general error message
                            $('#errorMessages').show();
                            $('#errorMessages ul').append(
                                '<li>There was an error processing your request.</li>');
                        }
                    }
                });
            });
        });
    </script>
@endsection
