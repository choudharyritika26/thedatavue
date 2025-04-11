@extends('frontend.layout.app')

@section('styles')
<style>
    .form-select {
    display: block;  
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: black;
    /* color: #818181; */
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    appearance: none;
    border-radius: 10px;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
input[disabled] {
        color: black !important;
    }
</style>
@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">      
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="contact-item">

                        <div class="d-flex align-items-center mb-4">

                            <div class="about-img">
                                <img src="{{ 'frontend/img/hero-img.png' }}" style="height: 400px"
                                    class="img-fluid w-100 rounded-top bg-white" alt="Image">
                                {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
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

                    <div class="errorlist">
                        <div id="errorMessages" class="alert alert-danger" style="display: none;">
                            <ul></ul>
                        </div>
                    </div>

                    <form method="post" action="{{ route('store-careercontact') }}" enctype="multipart/form-data">
                        @csrf

                         {{-- General Validation Message --}}
                         @if ($errors->any())
                         <div class="alert alert-danger">
                             <strong>Please fill in all required fields!</strong>    
                         </div>
                         @endif

                        <div class="row g-3">
                            <div class="">
                                <h2 class="text-primary">JOB APPLICATION FORM</h2>

                            </div>
                            <div class="col-lg-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder=" Enter Your Name" required>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder=" Enter Your Email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 ">
                                <div class="form-floating">
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder=" Enter Phone" required>
                                    <label for="phone"> Phone No</label>
                                </div>
                            </div> --}}

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone No" required 
                                           pattern="\d{10}" maxlength="10" 
                                           title="Phone number must be exactly 10 digits and contain only numbers" 
                                           oninput="this.value = this.value.replace(/\D/g, '').slice(0, 10)">
                                    <label for="phone">Phone No</label>
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>


                            {{-- <div class="col-lg-12">
                                <div class="form-floating">
                                    <select class="form-select" name="job" id="job" required>
                                        <option readonly="">Select Job</option>
                                        <option value="php">Php</option>
                                        <option value="android">Android</option>
                                        <option value="android">UI/UX</option>
                                        <option value="android">Graphic Design</option>
                                        <option value="android">UI/UX</option>
                                    </select>
                                   <label for="job">Select Job</label>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="job" id="job" placeholder="Enter Your Job" required value="{{ old('job', $heading) }}" disabled>
                                    <label for="job">Job</label>
                                </div>
                            </div> --}}

                            <div class="col-lg-12">
                                <div class="form-floating">
                                    {{-- <input type="text" class="form-control bg-white" name="job" id="job" placeholder="Enter Your Job" required value="{{ old('job', $heading) }}" disabled> --}}
                                    <input type="text" class="form-control bg-white custom-black-text" name="job" id="job" placeholder="Enter Your Job"
                                     required value="{{ old('job', $heading) }}" disabled>
                                    <label for="job">Job</label>
                                </div>
                            </div>
                            

                            {{-- <input type="hidden" name="career_heading" id="career_heading" value=""> --}}

                            {{-- <div class="col-lg-12 ">
                                <div class="form-floating" >
                                    <label for="image"></label>
                                    <input type="file" class="form-control" name="image"  id="image"
                                    placeholder=" Add Your Image" required>
                                </div>
                            </div> --}}

                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <label for="file"></label>
                                    <input type="file" class="form-control" name="file" id="file" accept=".pdf,.doc,.docx" placeholder="Add Your File">
                                    @if ($errors->has('file'))
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                    @endif
                                </div>
                            </div>

                            
                            {{-- <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <button class="btn btn-primary submitCareercontactBtn w-100 py-3">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                
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
        // Handle the form submission for the careercontact
        $('.submitCareercontactBtn').click(function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Create a new FormData instance
            var formData = new FormData($(this).closest('form')[0]);

            // Send the AJAX request with the CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Use 'content' for csrf-token
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('store-careercontact', isset($careercontact) ? $careercontact->id : null) }}',
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
                                // Clear the form fields after successful submission
                                $('form')[0].reset(); // Reset the form fields
                                $('#errorMessages ul').empty(); // Clear any error messages
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
                        // If there are no specific validation errors, show a general error message
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
