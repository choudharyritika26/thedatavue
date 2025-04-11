@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px">Edit Portfolio Detales</h1>
            {{-- <span>
                <h1 style="margin-top:-30px; margin-left:800px;"><a href="{{ route('portfoliodetales-index') }}">Back</a></h1>
            </span> --}}
            <span style="">
                <a href="{{ route('portfoliodetales-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
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
                            <h5 class="card-title">Portfolio Form</h5>
                            

                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('update-portfoliodetales', $portfoliodetales->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="errorlist">
                                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="portfolio" class="form-label">PortfolioSelect</label>
                                    <select class="form-select" name="portfolio" id="catagory">
                                        <option value="">Select Portfolio </option>
                                        @foreach ($portfolio as $portfolio)
                                            <option value="{{ $portfolio->id }}"
                                                {{ old('portfolio', $portfoliodetales->portfolio ?? '') == $portfolio->id ? 'selected' : '' }}>
                                                {{ $portfolio->heading }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('portfolio'))
                                        <span class="text-danger">{{ $errors->first('portfolio') }}</span>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $portfoliodetales->title }}"id="title">
                                </div>

                                {{-- <div class="col-12">
                                    <label for="platform" class="form-label">Platform</label>
                                    <input type="text" class="form-control" name="platform"
                                        value="{{ $portfoliodetales->platform }}"id="platform">
                                </div> --}}

                                @php
                                    // Retrieve selected platforms from the database record
                                    $selectedPlatforms = explode(',', $portfoliodetales->platform);
                                @endphp

                                <div class="col-12">
                                    <label for="platform" class="form-label">Platform</label>
                                    <div class="container mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]"
                                                value="Graphics"
                                                {{ in_array('Graphics', $selectedPlatforms) ? 'checked' : '' }}>

                                            <label class="form-check-label" for="inlineCheckbox1">Graphics</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]"
                                                id="inlineCheckbox2" value="iOS"
                                                {{ in_array('iOS', $selectedPlatforms) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox2">iOS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]"
                                                id="inlineCheckbox3" value="Laravel"
                                                {{ in_array('Laravel', $selectedPlatforms) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox3">Laravel</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]"
                                                id="inlineCheckbox4" value="Android"
                                                {{ in_array('Android', $selectedPlatforms) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox4">Android</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="platform[]"
                                                id="inlineCheckbox5" value="UIUX"
                                                {{ in_array('UIUX', $selectedPlatforms) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox5">UIUX</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="startdate" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="startdate"
                                        value="{{ $portfoliodetales->startdate }}"id="startdate">
                                </div>

                                <div class="col-12">
                                    <label for="enddate" class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="enddate"
                                        value="{{ $portfoliodetales->enddate }}"id="enddate">
                                </div>


                                <div class="form-group">
                                    <label for="comment">Description</label>
                                    <textarea class="form-control" id="comment" name="description" rows="3">{{ $portfoliodetales->description }} </textarea>    
                                </div>
                                <div class="col-12">

                                    <label for="image" class="form-label">Image</label>
                                    @php
                                        // Split the image string into an array
                                        $imageFilenames = explode(',', $portfoliodetales->image);
                                    @endphp

                                    <div class="image-preview mb-3">
                                        @foreach ($imageFilenames as $filename)
                                            <img src="{{ asset('storage/' . $filename) }}" alt=""
                                                class="img-fluid" style="width: 300px; height: 200px; margin: 5px;">
                                        @endforeach
                                    </div>
                                    <input type="file" class="form-control" name="images[]" multiple
                                        value="{{ $portfoliodetales->image }}" id="image"
                                        onchange="previewImage(event)">
                                </div>

                                <div class="mb-3 image-preview-container" style="display: none;">
                                    <label for="preview">Image Preview</label>
                                    <img class="image-preview" style="max-width: 100%;" />
                                    <input type="hidden" class="crop-data-x" name="cropDataX">
                                    <input type="hidden" class="crop-data-y" name="cropDataY">
                                    <input type="hidden" class="crop-data-width" name="cropDataWidth">
                                    <input type="hidden" class="crop-data-height" name="cropDataHeight">
                                </div>
                                <div class="mb-3">
                                    <label for="sort">Sort Col</label>
                                    <input class="form-control @error('sort_col') is-invalid @enderror" type="text"
                                        name="sort_col" value="{{ $portfoliodetales->sort_col }}" id="sort_col" placeholder="Sort Col" required/>
                                    @error('sort_col')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="card-action submitEditPortfoliodetaleBtn">
                                    <button class="btn btn-success"
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
            // Handle the form submission for the portfoliodetales
            $('.submitEditPortfoliodetaleBtn').click(function(e) {
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
                    // Adjust the route for the portfoliodetales form submission
                    url: '{{ route('update-portfoliodetales', $portfoliodetales->id) }}',
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

    <script>
        $(document).ready(function() {
            // Checkboxes retain state
            var selectedPlatforms = @json(explode(',', $portfoliodetales->platform)); // Convert PHP array to JS array
            $('input[type="checkbox"]').each(function() {
                var checkboxValue = $(this).val();
                if (selectedPlatforms.includes(checkboxValue)) {
                    $(this).prop('checked', true);
                }
            });
        });
    </script>
@endsection
