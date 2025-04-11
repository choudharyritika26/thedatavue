<!-- Spinner Start -->
{{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid topbar px-0 d-none d-lg-block">
    <div class="container px-0">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            @foreach ($contact_us_detales as $contact_us_detale)
                <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        {{-- <a href="#" class="text-muted me-4"><i
                                class="fas fa-map-marker-alt text-danger me-2"></i>Find A Location</a> --}}
                        <a href="#" class="text-muted me-4" style="color: white !important "><i
                                class="fas fa-phone-alt text-danger me-2"></i><span>+91  {{ $contact_us_detale->phone_no }}</span></a>
                        <a href="#" class="text-muted me-0" style="color: white !important "><i
                                class="fas fa-envelope text-danger me-2"></i>{{ $contact_us_detale->email_id }}</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="https://www.facebook.com/TheDataVueTechnologies/" target="-blank" title="facebook"
                            class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i
                                class="fab fa-facebook-f text-white"></i></a>
                        {{-- <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i
                                class="fab fa-twitter text-white"></i></a> --}}
                        <a href="https://www.instagram.com/thedatavue/" target="-blank" title="instagram"
                            class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i
                                class="fab fa-instagram text-white"></i></a>
                        <a href="https://www.linkedin.com/company/thedatavue-technologies" target="-blank"
                            title="linkedin" class="btn btn-primary btn-square rounded-circle nav-fill me-0"><i
                                class="fab fa-linkedin-in text-white"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Topbar End -->



<!-- Navbar & Hero Start -->
<div class="container-fluid sticky-top px-0">
    <div class="position-absolute bg-dark">
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white py-3 px-4">
            @foreach ($contact_us_detales as $contact_us_detale)
            <a href="#" class="navbar-brand p-0">
                {{-- <h2 class="text-primary m-0"  style=" font-family:'Trirong', serif";><i class="fas fa-donate me-3"></i>TheDataVue</h2> --}}
                <img src="{{ asset('storage/' . $contact_us_detale->image) }}" style="height:50px; " alt="Logo">
            </a>
            @endforeach
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('frontend.index') }}"
                        class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('frontend.about') }}"
                        class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                    {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="blog.html" class="dropdown-item">Our Blog</a>
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="faqs.html" class="dropdown-item">FAQs</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div> --}}
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu m1-0 p-3">
                            @foreach ($services as $servicescatagries)
                                <a href="{{ route('frontend.service', $servicescatagries->id) }}" class="dropdown-item">
                                    {{ $servicescatagries->heading }}
                                </a>
                            @endforeach
                        </div>
                    </div> --}}
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu m1-0 p-3">
                            @foreach ($services as $service) <!-- Use singular $service here -->
                                <a href="{{ route('frontend.service', $service->id) }}" class="dropdown-item">
                                    {{ $service->heading ?? '' }} <!-- Assuming 'heading' is a valid attribute -->
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Conditional for displaying Portfolio only on Home page -->
                    @if (request()->is('/'))
                        <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
                    @endif --}}

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu m1-0 p-3">
                            @if ($ser->count() > 0)
                                <!-- Check if the count of the collection is greater than 0 -->
                                @foreach ($ser as $item)
                                    <a href="{{ route('frontend.service', $item->id) }}" class="dropdown-item">
                                        {{ $item->heading }} <!-- Display the item heading -->
                                    </a>
                                @endforeach
                            @else
                                <span class="dropdown-item">No services available</span>
                            @endif
                        </div>
                    </div>

                    @if (request()->is('/'))
                    <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
                @endif

                    <a href="{{ route('frontend.training') }}"
                        class="nav-item nav-link {{ request()->is('training') ? 'active' : '' }}">Training</a>
                    <a href="{{ route('frontend.career') }}"
                        class="nav-item nav-link {{ request()->is('career') ? 'active' : '' }}">Career</a>
                    
                    {{-- <a href="{{ route('frontend.faq') }}"
                        class="nav-item nav-link {{ request()->is('faq') ? 'active' : '' }}">FAQs</a> --}}
                    <a href="{{ route('frontend.blog') }}"
                        class="nav-item nav-link {{ request()->is('blog') ? 'active' : '' }}">Blog</a>

                        <a href="{{ route('frontend.contact') }}"
                        class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact Us</a>

                    
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <div class="dropdown">
                                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Our Blog</a>
                                <div class="dropdown-menu">
                                    <a href="blog-post-1.html" class="dropdown-item">Blog Post 1</a>
                                    <a href="blog-post-2.html" class="dropdown-item">Blog Post 2</a>
                                    <a href="blog-post-3.html" class="dropdown-item">Blog Post 3</a>
                                </div>
                            </div>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="faqs.html" class="dropdown-item">FAQs</a>
                            <div class="dropdown">
                                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">404 Page</a>
                                <div class="dropdown-menu">
                                    <a href="404-page-1.html" class="dropdown-item">404 Page 1</a>
                                    <a href="404-page-2.html" class="dropdown-item">404 Page 2</a>
                                    <a href="404-page-3.html" class="dropdown-item">404 Page 3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                     --}}

            {{-- <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                <button class="btn btn-primary btn-md-square mx-2" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                    <a href="{{ route('frontend.enquiry') }}"
                        class="btn btn-primary rounded-pill text-white py-2 px-4 ms-2 flex-wrap flex-sm-shrink-0">Enquiry</a>
            </div> --}}
            {{-- <div class="blog-plus-icon">
                    <a href="#" data-lightbox="blog-1"
                        class="btn btn-primary rounded-pill text-white py-2 px-4 ms-2 flex-wrap flex-sm-shrink-0">Enquiry</a>
                </div> --}}
    </div>
    </nav>
</div>
</div>
<!-- Navbar & Hero End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

<div class="floating-buttons">
    {{-- <div class="whatsapp-btn">
        <a href="https://wa.me/+91 7307269991?text=Hello" target="_blank" class="text-decoration-none">
            <div class="bg-success btn-lg-square rounded-circle p-2">
                <i class="fab fa-whatsapp text-white" style='font-size:28px;'></i>
            </div>
        </a>
    </div> --}}

    <div class="whatsapp-btn">
        <a href="https://wa.me/+917307269991?text=How%20can%20I%20help%20you?" target="_blank" class="text-decoration-none">
            <div class="bg-success btn-lg-square rounded-circle p-2">
                <i class="fab fa-whatsapp text-white" style='font-size:28px;'></i>
            </div>
        </a>
    </div>
    

    <div class="call-btn">
        <a href="{{ route('frontend.enquiry') }}" class="text-decoration-none">
            <div class="bg-danger btn-lg-square rounded-circle p-2">
                <i class="fas fa-file-alt text-white" style='font-size:28px;'></i>
            </div>

        </a>
    </div>

    {{-- <div class="call-btn">
        <a href="tel:+917307269991" class="text-decoration-none">
            <div class="bg-success btn-lg-square rounded-circle p-2">
                <i class="fas fa-phone-alt text-white" style='font-size:20px;'></i>
            </div>
        </a>
    </div> --}}

    <!-- Inquiry Form Section -->
    {{-- <div class="inquiry-form-section">
        <h4 class="text-center">Inquiry Form</h4>
        <form action="/submit-inquiry" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Submit Inquiry</button>
        </form>
    </div>
     --}}
</div>

{{-- <div class="floating-buttons" id="floating-buttons">
    <div class="whatsapp-btn" id="whatsapp-btn">
        <a href="https://wa.me/+91 7307269991?text=Hello" target="_blank" class="text-decoration-none">
            <div class="bg-success btn-lg-square rounded-circle p-2">
                <i class="fab fa-whatsapp text-white" style='font-size:28px;color:red'></i>
            </div>   
        </a>
    </div>

    <div class="call-btn" id="call-btn">
        <a href="tel:+917307269991" class="text-decoration-none">
            <div class="bg-success btn-lg-square rounded-circle p-2">
                <i class="fas fa-phone-alt text-white" style='font-size:20px;color:red'></i>
            </div>
        </a>
    </div>
</div> --}}
