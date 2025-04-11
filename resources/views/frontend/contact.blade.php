@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="contact-item">
                        @foreach ($contact_us_detales as $contact_us_detale)
                            <div class="pb-5">
                                <h4 class="text-primary display-4">Contact Us</h4>
                                {{-- <h1 class="display-4 mb-4">Get In Touch With Us</h1> --}}
                                {{-- <p class="mb-0">Ground Floor, Ward, No. 4, Nangal Rd,
                                    opp. Dell Showroom and Jagat Hospital, Una, Himachal Pradesh 174303</a>.</p> --}}
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-dark btn-lg-square rounded-circle p-4">
                                    <i class="fa fa-home text-white"  style="font-size: 30px"></i>
                                </div>
                                <div class="ms-4">
                                    {{-- <h4>Addresses</h4> --}}
                                    <p class="mb-0">
                                        {!! html_entity_decode($contact_us_detale->address) !!}
                                        {{-- Ground Floor, Ward, No. 4, Nangal Rd,
                                    opp. Dell Showroom and Jagat Hospital, Una, Himachal Pradesh 174303 --}}
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-dark btn-lg-square rounded-circle p-2">
                                    <i class="fa fa-phone text-white" style="font-size: 30px"></i>
                                </div>
                                <div class="ms-4">
                                    {{-- <h4>Mobile</h4> --}}
                                    <p class="mb-0"> <span>+ 91 {{ $contact_us_detale->phone_no }}</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-dark btn-lg-square rounded-circle p-2"><i
                                        class="fa fa-envelope-open text-white" style="font-size: 25px"></i></div>
                                <div class="ms-4">
                                    {{-- <h4>Email</h4> --}}
                                    <p class="mb-0">{{ $contact_us_detale->email_id }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="errorlist">
                            <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                <ul></ul>
                            </div>
                        </div>

                        {{-- <form method="post" action="{{ route('store-contact') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-12 ">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Subject">
                                        <label for="subject">Subject</label>
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 160px"></textarea>
                                        <label for="message">Message</label>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-12 submitContactBtn">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form> --}}

                        <form method="post" action="{{ route('store-contact') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- General Validation Message --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Please fill in all required fields!</strong>
                                </div>
                            @endif

                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Name" required>
                                        <label for="name"> Name</label>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Your Email" required>
                                        <label for="email"> Email</label>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Your Email" required>
                                        <label for="email"> Email</label>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Subject" required>
                                        <label for="subject">Subject</label>
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 160px"
                                            required></textarea>
                                        <label for="message">Message</label>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 submitContactBtn">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded h-100">
                    {{-- <iframe class="rounded-top w-100" 
                    style="height: 500px; margin-bottom: -6px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd" 
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

                    <iframe class="rounded-top w-100"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7630.780428329606!2d76.27383590333449!3d31.467678621502454!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391adb20db78c99b%3A0x6857c2ce06a7fd5e!2sTheDataVue%20Technologies!5e0!3m2!1sen!2sin!4v1722575775594!5m2!1sen!2sin"
                        style="height: 500px; margin-bottom: -6px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    {{-- <div class="d-flex align-items-center justify-content-center bg-primary rounded-bottom p-4">
                        <div class="d-flex">
                            <a class="btn btn-dark btn-lg-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Contact End -->
    @endsection

    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                // Handle the form submission for the contact
                $('.submitContactBtn').click(function(e) {
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
                        url: '{{ route('store-contact', isset($contact) ? $contact->id : null) }}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            // Hide error messages if they are visible
                            $('#errorMessages').hide();
                            $('#errorMessages ul').empty(); // Clear previous error messages
        
                            if (response.message) {
                                // Display the SweetAlert with a confirmation button
                                Swal.fire({
                                    title: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Clear the form fields
                                        $('form')[0].reset();
                                    }
                                });
                            }
                        },
                        error: function(xhr) {
                            // Clear previous error messages
                            $('#errorMessages ul').empty();
        
                            // Handle the error response
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

<script>
    document.querySelector("form").addEventListener("submit", function (event) {
        var email = document.getElementById("email").value;
        if (!email.endsWith('@gmail.com')) {
            event.preventDefault(); // Prevent form submission
            alert('Please enter a valid Gmail address (ending with @gmail.com)');
        }
    });
</script>
    @endsection
