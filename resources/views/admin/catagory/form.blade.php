
@extends('admin.layout.app')

@section('style')
@endsection

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="margin-top: 20px"> </h1>
      <span style="">
        <a href="{{ route('catagory-index') }}"><button class="btn btn-primary">Back</button></a><br><br>
    </span>
      {{-- <span><h1 style="margin-top:-30px; margin-left:800px;"><a href="{{route('catagory-index')}}">Back</a></h1></span> --}}
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
              <h5 class="card-title">Add Portfolio Catagory</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{route('store-catagory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="errorlist">
                  <div id="errorMessages" class="alert alert-danger" style="display: none;">
                      <ul></ul>
                  </div>
              </div>
                <div class="col-12">
                  <label for="catagory" class="form-label">Catagries</label>
                  <input type="text" class="form-control" name="catagory" id="catagory">
                  @if ($errors->has('catagory'))
                  <span class="text-danger">{{$errors->first('catagory')}}</span>
                  @endif
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
                <div class="card-action submitCatagoryBtn">
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

  <script>
      $(document).ready(function() {
          // Handle the form submission for the catagory
          $('.submitCatagoryBtn').click(function(e) {
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
                  // Adjust the route for the catagory form submission
                  url: '{{ route('store-catagory', isset($catagory) ? $catagory->id : null) }}',
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
