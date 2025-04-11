@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px"></h1>
            <span style="">
                <a href="{{ route('servicesdetails-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
            </span>
            {{-- <span><h1 style="margin-top:-30px; margin-left:800px;"><a href="{{route('servicesdetails-index')}}">Back</a></h1></span> --}}
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
                            <h5 class="card-title">Add Services Detail</h5>
                            

                            <!-- Vertical Form -->
                            <form class="row g-3 " action="{{ route('store-servicesdetails') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="errorlist">
                                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="col-12">
                                    {{-- <label for="category" class="form-label">Catagries</label>
                                      <input type="text" class="form-control" name="category" id="category"> --}}
                                    <label for="category" class="form-label">Service</label>
                                    <select class="form-select" name="service" id="category">
                                        <option value="">Select Service </option>
                                        @foreach ($servicescatagries as $item)         
                                            <option value="{{ $item->id }}">{{ $item->heading }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('service'))   
                                        <span class="text-danger">{{ $errors->first('service') }}</span>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="heading" class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading" id="heading">
                                    {{-- @if ($errors->has('heading'))
                      <span class="text-danger">{{$errors->first('heading')}}</span>
                      @endif --}}
                                </div>

                                <div class="col-12">
                                    <label for="comment">Description</label>
                                    <textarea class="form-control" id="comment" name="description" rows="3"></textarea>
                                    {{-- @if ($errors->has('description'))
                                        <span class="text-danger">{{$errors->first('description')}}</span>
                                    @endif --}}
                                </div>

                                {{-- <div class="col-12">
                                    <label for="sort_col">Sort Col</label>
                                    <input class="form-control @error('sort_col') is-invalid @enderror" type="text"
                                        name="sort_col" id="sort_col" placeholder="Sort Col" required />
                                    @error('sort_col')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}


                                <div class="card-action">
                                    <button class="btn btn-success submitServicesdetailesBtn" type="submit">Submit</button>
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
        document.getElementById('image').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = ''; // Clear previous previews

            const files = event.target.files; // Get the selected files

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result; // Set the image source to the file's data URL
                    img.style.width = '100px'; // Set the width of the image
                    img.style.height = 'auto'; // Maintain aspect ratio
                    img.style.margin = '5px'; // Add some margin
                    previewContainer.appendChild(img); // Append the image to the preview container
                }

                reader.readAsDataURL(file); // Read the file as a data URL
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Handle the form submission for the servicesdetails
            $('.submitServicesdetailesBtn').click(function(e) {
                //alert('jijed');
                e.preventDefault();

                // Create a new FormData instance
                var formData = new FormData($(this).closest('form')[0]);

                // Get the value from the CKEditor instance directly
                const description = editorInstance.getData(); // Use the global editor instance
                formData.set('description', description); // Set the description field with CKEditor data



                // Send the AJAX request with the CSRF token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    // Adjust the route for the servicesdetails form submission
                    url: '{{ route('store-servicesdetails', isset($servicesdetails) ? $servicesdetails->id : null) }}',
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
