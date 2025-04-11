
@extends('admin.layout.app')

@section('style')
@endsection

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="margin-top: 20px"></h1>
      <span>
        <a href="{{route('faq-index')}}"><button class="btn btn-primary">Back</button></a>
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
              <h5 class="card-title">Add Faq's</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{route('store-faq')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="errorlist">
                  <div id="errorMessages" class="alert alert-danger" style="display: none;">
                      <ul></ul>
                  </div>
                </div>
                
                <div class="col-12">
                  <label for="question" class="form-label">Question</label>
                  <input type="text" class="form-control" name="question" id="question">
                  @if ($errors->has('question'))
                  <span class="text-danger">{{$errors->first('question')}}</span>
                  @endif
                </div>

                <div class="col-12">
                  <label for="comment">Answer</label>
                  <textarea class="form-control" id="comment" name="answer" rows="3"></textarea>
                  @if ($errors->has('answer'))
                      <span class="text-danger">{{$errors->first('answer')}}</span>
                      @endif
              </div>
                {{-- <div class="col-12">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" name="image" id="image">
                  @if ($errors->has('image'))
                  <span class="text-danger">{{$errors->first('image')}}</span>
                  @endif
                </div> --}}

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
                  <button class="btn btn-success submitFaqBtn" type="submit">Submit</button>
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
          // Handle the form submission for the faq
          $('.submitFaqBtn').click(function(e) {
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
                  // Adjust the route for the faq form submission
                  url: '{{ route('store-faq', isset($faq) ? $faq->id : null) }}',
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
