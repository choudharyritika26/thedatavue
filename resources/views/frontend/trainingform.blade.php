@extends('frontend.layout.app')

@section('style')
    <style>
        .dark-form {
            background-color: #000;
            /* Black background */
            color: #fff;
            /* White text */
            border-color: #444;
            /* Dark border */
        }

        .dark-form::placeholder {
            color: #bbb;
            /* Light grey placeholder */
        }

        .dark-form:focus {
            background-color: #111;
            border-color: #555;
            color: #fff;
        }
    </style>
    <style>
        .white-background {
            background-color: white;
            /* Set background color to white */
            color: black;
            /* Optional: Set text color to black for better contrast */
        }
    </style>
@endsection

@section('content')
    <!-- About Start -->
    <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="pb-5">
                <h4 class="text-primary display-4">Training Apply Form</h4>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="contact-item">


                        <div class="d-flex align-items-center mb-4">

                            <div class="ms-4">
                                <img src="{{ 'frontend/img/projects-2.jpg' }}" class="img-fluid rounded w-100"
                                    alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">

                        <form method="post" action="{{ route('store-trainingform') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- General Validation Message --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Please fill in all required fields!</strong>
                                </div>
                            @endif

                            <div class="errorlist">
                                <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                    <ul></ul>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control dark-form" id="name" name="name"
                                            placeholder="Your Name" required>
                                        <label for="name">Name</label>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control dark-form" id="email"
                                            placeholder="Your Email" required>
                                        <label for="email">Email</label>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control dark-form" name="phone" id="phone"
                                            placeholder="Phone No" required pattern="\d{10}" maxlength="10"
                                            title="Phone number must be exactly 10 digits and contain only numbers"
                                            oninput="this.value = this.value.replace(/\D/g, '').slice(0, 10)">
                                        <label for="phone">Phone No</label>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="duration" name="duration" class="form-control dark-form" id="duration"
                                            placeholder="Your Duration" value="{{ old('duration', $duration) }}" readonly>
                                        <label for="duration">Duration</label>
                                        @if ($errors->has('duration'))
                                            <span class="text-danger">{{ $errors->first('duration') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                          
                                        <select name="qualification" class="form-control dark-form" id="qualification"
                                            required style="background-color: white; color: black;">
                                            <option value="" disabled selected>Select your qualification</option>
                                            @foreach ($qualification as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                            {{-- <option value="bachelor">Bachelor's Degree</option>
                                            <option value="master">Master's Degree</option>
                                            <option value="phd">PhD</option> --}}
                                            <!-- Add more options as needed -->
                                            @endforeach
                                        </select>
                                        
                                        <label for="qualification">Qualification</label>
                                        @if ($errors->has('qualification'))
                                            <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary submitTrainingformBtn w-100 py-3"
                                        type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded h-100">
                    <iframe class="rounded-top w-100"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7630.780428329606!2d76.27383590333449!3d31.467678621502454!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391adb20db78c99b%3A0x6857c2ce06a7fd5e!2sTheDataVue%20Technologies!5e0!3m2!1sen!2sin!4v1722575775594!5m2!1sen!2sin"
                        style="height: 500px; margin-bottom: -6px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div> --}}
        </div>
        <!-- Contact End -->
    @endsection

    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                // Handle the form submission for the contact
                $('.submitTrainingformBtn').click(function(e) {
                    //alert('lll');
                    e.preventDefault();

                    // Create a new FormData instance
                    var formData = new FormData($(this).closest('form')[0]);

                    // Send the AJAX request with the CSRF token
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('trainingform')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        // Adjust the route for the trainingform form submission
                        url: '{{ route('store-trainingform') }}',
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
