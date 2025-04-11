@extends('admin.layout.app')

@section('style')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="margin-top: 20px"></h1>
            <span style="">
                <a href="{{ route('catagory-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
            </span>
           
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
                            <h5 class="card-title">Edit Portfolio Catagory </h5>
                            

                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('update-catagory',$catagory->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="errorlist">
                                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                        <ul></ul>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="catagory" class="form-label">Catagory</label>
                                    <input type="text" class="form-control" name="catagory"
                                        value="{{ $catagory->catagory }}"id="catagory">
                                </div>
                                {{-- <div class="col-12">
                                    <label for="sort">Sort Col</label>
                                    <input class="form-control @error('sort_col') is-invalid @enderror" type="text"
                                        name="sort_col" value="{{ $catagory->sort_col }}" id="sort_col" placeholder="Sort Col" required/>
                                    @error('sort_col')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="card-action submitEditCatagoryBtn">
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

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.umd.js"></script> --}}

    {{-- <script>
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
            .create( document.querySelector( '#comment' ), {
                plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            } )
            .then(editor => {
        editorInstance = editor; // Store the editor instance
    })
    .catch(error => {
        console.error(error);
    });
</script> --}}


    <script>
$(document).ready(function() {
    // Handle the form submission for the catagory
    $('.submitEditCatagoryBtn').click(function(e) {
        e.preventDefault();

        // Create a new FormData instance
        var formData = new FormData($(this).closest('form')[0]);

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
            url: '{{ route('update-catagory', $catagory->id) }}',
            data: formData,
            contentType: false, // Important: Set this to false to send the file
            processData: false, // Important: Set this to false to send the file
            dataType: 'json',
            success: function(response) {
                if (response.message) {
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (response.redirect_url) {
                                window.location.href = response.redirect_url;
                            }
                        }
                    });
                }
            },
            error: function(xhr) {
                $('#errorMessages ul').empty();
                if (xhr.responseJSON.errors) {
                    $('#errorMessages').show();
                    $.each(xhr.responseJSON.errors, function(key, messages) {
                        messages.forEach(function(message) {
                            $('#errorMessages ul').append('<li>' + message + '</li>');
                        });
                    });
                } else {
                    $('#errorMessages').show();
                    $('#errorMessages ul').append('<li>There was an error processing your request.</li>');
                }
            }
        });
    });
});
    </script>

    
@endsection
