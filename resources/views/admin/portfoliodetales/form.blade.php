@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Add Portfolio Details</h1>
            <span style="">
                <a href="{{ route('portfoliodetales-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
            </span>
            {{-- <span><h1 style="margin-top:-30px; margin-left:800px;"><a href="{{route('portfoliodetales-index')}}">Back</a></h1></span> --}}
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
                            <h5 class="card-title">Portfolio Form</h5>


                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('store-portfoliodetales') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="errorlist">
                                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="col-12">
                                    {{-- <label for="portfolio" class="form-label">Catagries</label>
                  <input type="text" class="form-control" name="portfolio" id="portfolio"> --}}
                                    <label for="portfolio" class="form-label">Portfolio select</label>
                                    <select class="form-select" name="portfolio" id="portfolio">
                                        <option value="">Select Portfolio Catagrie </option>
                                        @foreach ($portfolio as $portfolio)
                                            <option value="{{ $portfolio->id }}">{{ $portfolio->heading }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('heading'))
                                        <span class="text-danger">{{ $errors->first('heading') }}</span>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                    {{-- @if ($errors->has('title'))
                      <span class="text-danger">{{$errors->first('title')}}</span>
                      @endif --}}
                                </div>

                                {{-- <div class="col-12">
                                    <label for="platform" class="form-label">Plat Form</label>
                                    <input type="text" class="form-control" name="platform" id="platform">
                                </div> --}}

                                {{-- <div class="col-12">
                                    <label for="platform" class="form-label">Platform</label>
                                    <div class="container mt-2">      
                                        <div class="form-check form-check-inline">       
                                            <input class="form-check-input" type="checkbox" name="platform[]" id="inlineCheckbox1" value="Graphics">
                                            <label class="form-check-label" for="inlineCheckbox1">Graphics</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]" id="inlineCheckbox2" value="iOS">
                                            <label class="form-check-label" for="inlineCheckbox2">iOS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]" id="inlineCheckbox3" value="Laravel">
                                            <label class="form-check-label" for="inlineCheckbox3">Laravel</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]" id="inlineCheckbox4" value="Android">
                                            <label class="form-check-label" for="inlineCheckbox4">Android</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]" id="inlineCheckbox5" value="UIUX">  
                                            <label class="form-check-label" for="inlineCheckbox5">UIUX</label>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="col-12">
                                    <label for="startdate" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="startdate" id="startdate">
                                    @if ($errors->has('startdate'))
                                        <span class="text-danger">{{ $errors->first('startdate') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="sort_col">Sort Col</label>
                                    <input class="form-control @error('sort_col') is-invalid @enderror" type="text"
                                        name="sort_col" id="sort_col" placeholder="Sort Col" required />
                                    @error('sort_col')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="enddate" class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="enddate" id="enddate">
                                    @if ($errors->has('enddate'))
                                        <span class="text-danger">{{ $errors->first('enddate') }}</span>
                                    @endif
                                </div>


                                
                                <div class="col-12">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image[]" multiple id="image" accept="image/*"
                                        class="image-input form-control @error('image') is-invalid @enderror"
                                        onchange="previewImage(event)">
                                    <div id="image-preview" class="mt-2"></div>
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

                                <div class="form-group">
                                    <label for="comment">Description</label>
                                    <textarea class="form-control" id="comment" name="description" rows="3"></textarea>
                                    {{-- @if ($errors->has('description'))
                      <span class="text-danger">{{$errors->first('description')}}</span>
                      @endif --}}
                                </div>

                                {{-- <div class="col-12">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" name="image []" multiple id="image">
                  @if ($errors->has('image'))
                  <span class="text-danger">{{$errors->first('image')}}</span>
                  @endif
                </div> --}}

                                <div class="card-action">
                                    <button class="btn btn-success submitPortfoliodetalesBtn"
                                        href="{{ route('portfoliodetales-index') }}">Submit</button>
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
            // Handle the form submission for the portfoliodetales
            $('.submitPortfoliodetalesBtn').click(function(e) {
                //alert('jijed');
                e.preventDefault();

                // Create a new FormData instance
                var formData = new FormData($(this).closest('form')[0]);


                // Send the AJAX request with the CSRF token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    // Adjust the route for the portfoliodetales form submission
                    url: '{{ route('store-portfoliodetales', isset($portfoliodetales) ? $portfoliodetales->id : null) }}',
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
