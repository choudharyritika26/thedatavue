@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px"></h1>
            {{-- <span>
                <h1 style="margin-top:-30px; margin-left:800px;"><a href="{{ route('portfolio-index') }}">Back</a></h1>
            </span> --}}
            <span style="">
                <a href="{{ route('portfolio-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
            </span>

        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if ($message = Session::get('Success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                    @endif
                    <div class="card p-4">
                        <div class="card-body">
                            <h5 class="card-title">Edit Portfolio</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('update-portfolio', $portfolio->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="errorlist">
                                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                        <ul></ul>
                                    </div>
                                </div>
                                @php
                                    // Retrieve selected platforms from the database record
                                    $selectedPlatforms = explode(',', $portfolio->category);
                                @endphp

                                <div class="col-12">
                                    <label for="platform" class="form-label">Category</label>
                                    <div class="container mt-2">
                                        @foreach ($catagory as $cat)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="category[]"
                                                    value="{{ $cat->catagory }}"
                                                    {{ in_array($cat->catagory, $selectedPlatforms) ? 'checked' : '' }}>


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
                                    <label for="heading" class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading"
                                        value="{{ $portfolio->heading }}"id="heading">
                                </div>

                                <div class="form-group">
                                    <label for="comment">Description</label>
                                    <textarea class="form-control" id="comment" name="description" rows="3">{{ $portfolio->description }} </textarea>
                                </div>

                                <div class="col-12">

                                    <label for="image" class="form-label">Image</label>
                                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt=""
                                        class="img-fluid mb-3" style="width: 200px;height:150px;">
                                    <input type="file" class="form-control" name="image"
                                        value="{{ $portfolio->image }}" id="image" onchange="previewImage(event)">
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
                                    <input type="date" class="form-control" name="startdate"
                                        value="{{ $portfolio->startdate }}"id="startdate">
                                </div>

                                {{-- <div class="col-12">
                                    <label for="enddate" class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="enddate"
                                        value="{{ $portfolio->enddate }}"id="enddate">
                                </div> --}}

                                {{-- <div class="col-12">
                                    <label for="project_url" class="form-label">Project URL</label>
                                    <input type="url" class="form-control" name="project_url"
                                        value="{{ old('project_url', $portfolio->project_url) }}" id="project_url" required>
                                    @if ($errors->has('project_url'))
                                        <span class="text-danger">{{ $errors->first('project_url') }}</span>
                                    @endif
                                </div> --}}
                                

                                {{-- <div class="form-group">
                                    <label for="comment">Description</label>
                                    <textarea class="form-control" id="comment" name="description" rows="3">{{ $portfolio->description }} </textarea>
                                </div> --}}
                                {{-- <div class="col-12">

                                    <label for="slider_image" class="form-label">Slider Image</label>
                                    @php
                                        // Split the image string into an array
                                        $imageFilenames = explode(',', $portfolio->slider_image);
                                    @endphp

                                    <div class="image-preview mb-3">
                                        @foreach ($imageFilenames as $filename)
                                            <img src="{{ asset('storage/' . $filename) }}" alt="" class="img-fluid"
                                                style="width: 300px; height: 200px; margin: 5px;">
                                        @endforeach
                                    </div>
                                    <input type="file" class="form-control" name="slider_image[]" multiple
                                        value="{{ $portfolio->slider_image }}" id="image">
                                </div> --}}
                                {{-- 
                                <div class="col-12">
                                    <label for="image" class="form-label">Main Image</label>
                                    <input type="file" name="image" id="image" class="image-input form-control" onchange="previewMainImage(event)">
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                
                                <div class="mb-3 image-preview-container" style="display: none;">
                                    <label for="preview">Main Image Preview</label>
                                    <img id="mainImagePreview" class="image-preview" style="max-width: 100%;" />
                                    <input type="hidden" class="crop-data-x" name="cropDataX">
                                    <input type="hidden" class="crop-data-y" name="cropDataY">
                                    <input type="hidden" class="crop-data-width" name="cropDataWidth">
                                    <input type="hidden" class="crop-data-height" name="cropDataHeight">
                                </div> --}}

                                <div class="col-12">
                                    <label for="slider_image" class="form-label">Slider Image</label>

                                    @php
                                        // Split the image string into an array
                                        $imageFilenames = explode(',', $portfolio->slider_image);
                                    @endphp

                                    <div class="image-preview mb-3" id="sliderImagePreview">
                                        @foreach ($imageFilenames as $index => $filename)
                                            <div class="slider-image-container"
                                                style="display: inline-block; position: relative; margin: 5px;">
                                                <img src="{{ asset('storage/' . $filename) }}" alt=""
                                                    class="img-fluid slider-image" style="width: 300px; height: 200px;"
                                                    id="sliderImage-{{ $index }}">
                                                <input type="hidden" class="crop-data-x"
                                                    name="cropDataX_{{ $index }}">
                                                <input type="hidden" class="crop-data-y"
                                                    name="cropDataY_{{ $index }}">
                                                <input type="hidden" class="crop-data-width"
                                                    name="cropDataWidth_{{ $index }}">
                                                <input type="hidden" class="crop-data-height"
                                                    name="cropDataHeight_{{ $index }}">
                                                <button type="button" class="btn btn-danger btn-sm remove-image"
                                                    style="position: absolute; top: 0; right: 0;"
                                                    data-filename="{{ $filename }}">Remove</button>
                                            </div>
                                        @endforeach
                                    </div>

                                    <input type="file" class="form-control" name="slider_image[]" multiple
                                        id="slider_image" accept="image/*" onchange="previewSliderImages(event)">
                                    @if ($errors->has('slider_image'))
                                        <span class="text-danger">{{ $errors->first('slider_image') }}</span>   
                                    @endif
                                </div>


                                {{-- <div class="mb-3">
                                    <label for="sort">Sort Col</label>
                                    <input class="form-control @error('sort_col') is-invalid @enderror" type="text"
                                        name="sort_col" value="{{ $portfolio->sort_col }}" id="sort_col"
                                        placeholder="Sort Col" required />
                                    @error('sort_col')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="card-action submitEditPortfoliosBtn">
                                    <button class="btn btn-success submitBtn" id="submitBtn" href="{{ route('portfolio-index') }}">Submit</button>
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
        document.addEventListener('DOMContentLoaded', () => {
            let cropperInstances = []; // Store Cropper instances
    
            function initCropperForSlider(imageElement, index) {
                let cropper = new Cropper(imageElement, {
                    aspectRatio: 16 / 9,
                    viewMode: 2,
                    autoCropArea: 1,
                    zoomable: false,
                    crop(event) {
                        document.querySelector(`input[name="cropDataX_${index}"]`).value = Math.round(event.detail.x);
                        document.querySelector(`input[name="cropDataY_${index}"]`).value = Math.round(event.detail.y);
                        document.querySelector(`input[name="cropDataWidth_${index}"]`).value = Math.round(event.detail.width);
                        document.querySelector(`input[name="cropDataHeight_${index}"]`).value = Math.round(event.detail.height);
                    }
                });
    
                cropperInstances[index] = cropper;
            }
    
            // Initialize cropper for existing slider images
            const sliderImages = document.querySelectorAll('.slider-image');
            sliderImages.forEach((img, index) => {
                initCropperForSlider(img, index);
            });
    
            // Preview for new slider images
            function previewSliderImages(event) {
                const sliderImagePreview = document.getElementById('sliderImagePreview');
                sliderImagePreview.innerHTML = ''; // Clear previous previews
    
                const files = event.target.files;
                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-fluid', 'slider-image');
                        img.style.width = '300px';
                        img.style.height = '200px';
                        img.style.margin = '5px';
    
                        // Create hidden inputs for crop data
                        sliderImagePreview.innerHTML += `
                            <input type="hidden" name="cropDataX_${index}" value="">
                            <input type="hidden" name="cropDataY_${index}" value="">
                            <input type="hidden" name="cropDataWidth_${index}" value="">
                            <input type="hidden" name="cropDataHeight_${index}" value="">
                        `;
    
                        sliderImagePreview.appendChild(img);
    
                        // Initialize Cropper.js after adding new image
                        initCropperForSlider(img, index);
                    };
                    reader.readAsDataURL(file);
                });
            }
    
            // Listen to file input change
            document.getElementById('slider_image').addEventListener('change', previewSliderImages);
    
            // Remove existing slider image
            // document.querySelectorAll('.remove-image').forEach(button => {
            //     button.addEventListener('click', function() {
            //         const filename = this.dataset.filename;
            //         if (confirm(`Are you sure you want to delete this image ?`)) {
            //             this.closest('.slider-image-container').remove();
            //         }
            //     });
            // });
        });
    </script>
    
    {{-- <script>
        let mainCropper;
        let sliderCropperInstances = [];
    
        function previewMainImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById('mainImagePreview');
                img.src = e.target.result;
                img.style.display = 'block';
    
                if (mainCropper) {
                    mainCropper.destroy();
                }
    
                mainCropper = new Cropper(img, {
                    aspectRatio: 16 / 9,
                    viewMode: 1,
                    ready: function () {
                        // Store crop data when the form is submitted
                        document.getElementById('submitBtn').addEventListener('click', function () {
                            const cropData = mainCropper.getData();
                            document.querySelector('input[name="cropDataX"]').value = cropData.x;
                            document.querySelector('input[name="cropDataY"]').value = cropData.y;
                            document.querySelector('input[name="cropDataWidth"]').value = cropData.width;
                            document.querySelector('input[name="cropDataHeight"]').value = cropData.height;
                        });
                    }
                });
            };
            reader.readAsDataURL(file);
        }


        function previewSliderImages(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('sliderImagePreview');
    previewContainer.innerHTML = ''; // Clear previous previews
    sliderCropperInstances = []; // Reset cropper instances

    Array.from(files).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.id = `sliderImage-${index}`;
            img.style.width = '100%';
            previewContainer.appendChild(img);

            img.onload = function() {
                const cropper = new Cropper(img, {
                    aspectRatio: 16 / 9,
                    viewMode: 1,
                    ready: function () {
                        sliderCropperInstances[index] = cropper;

                        // Store crop data when the form is submitted
                        const submitButtons = document.querySelectorAll('.submitBtn');
                        submitButtons.forEach((button) => {
                            button.addEventListener('click', function () {
                                const cropData = cropper.getData();
                                console.log(`Crop Data for Slider Image ${index}:`, cropData);
                                document.querySelector(`input[name="cropDataX_${index}"]`).value = cropData.x;
                                document.querySelector(`input[name="cropDataY_${index}"]`).value = cropData.y;
                                document.querySelector(`input[name="cropDataWidth_${index}"]`).value = cropData.width;
                                document.querySelector(`input[name="cropDataHeight_${index}"]`).value = cropData.height;
                            }, { once: true }); // Ensure the listener is only added once
                        });
                    }
                });
            };
        };
        reader.readAsDataURL(file);
    });
}
    </script> --}}

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
        $(document).on('click', '.remove-image', function() {
            const filename = $(this).data('filename'); // Get the filename from the data attribute
            const portfolioId = '{{ $portfolio->id }}'; // Get the portfolio ID

            // Check how many images are currently displayed
            const totalImages = $('.slider-image-container').length;

            // If there's only one image left, show a warning
            if (totalImages <= 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Cannot Delete',
                    text: 'At least one image is required in the slider.',
                });
                return; // Exit the function to prevent deletion
            }

            // Confirm the action
            Swal.fire({
                title: 'Are you sure?',                 
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('remove-slider-image') }}', // Your route to handle image removal
                        data: {
                            filename: filename,
                            portfolio_id: portfolioId,
                            _token: '{{ csrf_token() }}' // CSRF token for security
                        },
                        success: function(response) {
                            // Handle success response
                            Swal.fire('Deleted!', response.message, 'success');

                            // Remove the image from the DOM
                            $(this).closest('.slider-image-container').remove();
                        }.bind(this), // Bind 'this' to maintain context
                        error: function(xhr) {
                            // Handle error response
                            Swal.fire('Error!', 'There was an error deleting the image.',
                                'error');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Handle the form submission for the portfolio
            $('.submitEditPortfoliosBtn').click(function(e) {
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
                    // Adjust the route for the portfolio form submission
                    url: '{{ route('update-portfolio', $portfolio->id) }}',
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
