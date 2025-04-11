@extends('admin.layout.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px"></h1>
            <span style="">
                <a href="{{ route('portfolio-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
            </span>
            {{-- <span><h1 style="margin-top:-30px; margin-left:800px;"><a href="{{route('portfolio-index')}}">Back</a></h1></span> --}}
            {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav> --}}
        </div><!-- End Page Title -->
        <section class="section">
            {{-- <div class="row">
                <div class="col-lg-12"> --}}
            @if ($message = Session::get('Success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Portfolio</h5>

                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{ route('store-portfolio') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="errorlist">
                            <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                <ul></ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="platform" class="form-label">Category</label>
                            <div class="mt-2">
                                @foreach ($catagory as $cat)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="category[]"
                                            id="inlineCheckbox{{ $cat->id }}" value="{{ $cat->catagory }}">
                                        <label class="form-check-label"
                                            for="inlineCheckbox{{ $cat->id }}">{{ $cat->catagory }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label for="heading" class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="heading" id="heading">
                            @if ($errors->has('heading'))
                                <span class="text-danger">{{ $errors->first('heading') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label for="comment">Description</label>
                            <textarea class="form-control" id="comment" name="description" rows="3"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image"
                                class="image-input form-control @error('image') is-invalid @enderror"
                                onchange="previewImage(event)">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 image-preview-container" style="display: none;">
                            <label for="preview">Image Preview</label>
                            <img class="image-preview" style="max-width: 100%;" />
                            <input type="hidden" class="crop-data-x" name="cropDataX">
                            <input type="hidden" class="crop-data-y" name="cropDataY">
                            <input type="hidden" class="crop-data-width" name="cropDataWidth">
                            <input type="hidden" class="crop-data-height" name="cropDataHeight">
                        </div>    


                        <div class="col-12">
                            <label for="startdate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="startdate" id="startdate">
                            @if ($errors->has('startdate'))
                                <span class="text-danger">{{ $errors->first('startdate') }}</span>
                            @endif
                        </div>


                        {{-- ================slider Image========================== --}}

                        {{-- <div class="col-12">
                            <label for="image" class="form-label"> Slider Image</label>
                            <input type="file" name="slider_image[]" multiple id="image" accept="image/*"
                                class="image-input form-control @error('image') is-invalid @enderror">

                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div> --}}

                        <div class="col-12">
                            <label for="slider_image" class="form-label">Slider Image</label>
                            <input type="file" name="slider_image[]" multiple id="slider_image" accept="image/*"
                                class="image-input form-control @error('slider_image') is-invalid @enderror"
                                onchange="previewSlidersImages(event)">
                            @if ($errors->has('slider_image'))
                                <span class="text-danger">{{ $errors->first('slider_image') }}</span>
                            @endif
                        </div>

                        <div class="slider-image-preview-container" style="display: none;">
                            <img id="sliderImagePreviews" style="max-width: 100%;" />   
                            <input type="hidden" class="slider-crop-data-x" name="slider_cropped_image_data[0][x]">
                            <input type="hidden" class="slider-crop-data-y" name="slider_cropped_image_data[0][y]">
                            <input type="hidden" class="slider-crop-data-width" name="slider_cropped_image_data[0][width]">
                            <input type="hidden" class="slider-crop-data-height" name="slider_cropped_image_data[0][height]">
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
                            <button class="btn btn-success submitServicesBtn" type="submit">Submit</button>
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
let sliderCropper; // Declare this variable outside the function to access it globally

function previewSlidersImages(event) {
    const files = event.target.files;
    if (files.length > 0) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imagePreview = document.getElementById('sliderImagePreviews');
            imagePreview.src = e.target.result;
            document.querySelector('.slider-image-preview-container').style.display = 'block';

            // Ensure the Cropper is destroyed before creating a new one
            if (sliderCropper) {
                sliderCropper.destroy();
            }

            // Initialize the Cropper after the image is loaded
            imagePreview.onload = function() {
                sliderCropper = new Cropper(imagePreview, {
                    aspectRatio: 16 / 9,
                    viewMode: 1,
                    crop(event) {
                        // Store crop data in hidden inputs
                        document.querySelector('input[name="slider_cropped_image_data[0][x]"]').value = Math.round(event.detail.x);
                        document.querySelector('input[name="slider_cropped_image_data[0][y]"]').value = Math.round(event.detail.y);
                        document.querySelector('input[name="slider_cropped_image_data[0][width]"]').value = Math.round(event.detail.width);
                        document.querySelector('input[name="slider_cropped_image_data[0][height]"]').value = Math.round(event.detail.height);
                    },
                });
            };
        };
        reader.readAsDataURL(files[0]);
    }
}
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
        // $(document).ready(function() {
        //     alert('dmkdkd');
        // });
        $(document).ready(function() {
            // Handle the form submission for the portfolio
            $('.submitServicesBtn').click(function(e) {
                // alert('jijed');
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
                    // Adjust the route for the portfolio form submission
                    url: '{{ route('store-portfolio', isset($portfolio) ? $portfolio->id : null) }}',
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
