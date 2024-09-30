@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <div class="header-carousel-item-img-1">
                <img src="{{ 'frontend/img/carousel-1.jpg' }}" class="img-fluid w-100" alt="Image">
            </div>
        </div>
        <div class="header-carousel-item mx-auto">
            <div class="header-carousel-item-img-2">
                <img src="{{ 'frontend/img/carousel-2.jpg' }}" class="img-fluid w-100" alt="Image">
            </div>
        </div>
        <div class="header-carousel-item">
            <div class="header-carousel-item-img-3">
                <img src="{{ 'frontend/img/carousel-3.jpg' }}" class="img-fluid w-100" alt="Image">
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-danger" style="text-align:center">About Us</h1>

            </div>
            <div class="row g-5 align-items-center">
                @foreach ($about as $aboutus)
                    
               
                <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img src="{{ asset('storage/' . $aboutus->image) }}" style="height: 400px"
                            class="img-fluid w-100 rounded-top bg-white" alt="Image">
                        {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-xl-6 wow fadeInRight" data-wow-delay="0.3s">
                    {{-- <h4 class="text-primary">About Us</h4> --}}
                    <h5 class="text-danger">{{$aboutus->heading}}</h5>
                    <p class="text ps-4 mb-4">
                        {{-- TheDataVue Technologies is a Himachal (India) based company with a wealth of
                        experience in Mobile & Web Application Development, Health IT Solutions, Security, Accountability &
                        Tracking, and Healthcare Domains.is a Himachal Pradesh based company with a wealth of experience in
                        Mobile & Web Application Development, Website Development and Designing and UI/UX designing. We
                        provide timely, cost-effective, innovative solutions using cutting edge tools & technologies, and a
                        dedicate team of experts from multiple domains such as software engineers, business analysts and
                        mobile developers for android and iOS. --}}
                        {!! html_entity_decode($aboutus->description) !!}
                    </p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="{{ route('frontend.about') }}">Read
                        More</a>

                     {{-- <div class="row g-4 justify-content-between mb-5">
                        <div class="col-lg-6 col-xl-5">
                            <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i> Custom Software Development</p>
                            <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i> Mobile App Development</p>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i>  UI/UX Design
                            </p>
                            <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i>
                                Partnerships</p>
                        </div>
                    </div> --}}
                    <div class="row g-4 text-center align-items-center justify-content-center">
                        <div class="col-sm-4">
                            <div class="bg-primary rounded p-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value fs-1 text-dark" data-toggle="counter-up">32</span>
                                    <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;">k+</h4>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-center">
                                    <p class="text-white mb-0">Project Complete</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-dark rounded p-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value fs-1  text-white" data-toggle="counter-up">21</span>
                                    <h4 class="text-white fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-center">
                                    <p class="mb-0">Years Of Experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-primary rounded p-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value fs-1  text-dark" data-toggle="counter-up">97</span>
                                    <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-center">
                                    <p class="text-white mb-0">Team Members</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                {{-- <h4 class="text-primary">Our Services</h4> --}}
                <h1 class="text-danger" style="text-align:center">Our Services</h1>

                {{-- <h1 class="display-4"> Offering the Best Consulting & Investa Services</h1> --}}
            </div>
            <div class="row g-4 justify-content-center text-center">
                @foreach ($services as $services)
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded">
                        <div class="service-img">
                            <img src="{{ asset('storage/' . $services->image) }}" style="height: 180px"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="service-content-inner">
                                <a href="#" class="h4 mb-4 d-inline-flex text-danger">
                                    {{$services->heading}}</a>
                                {{-- <p class="mb-4">Web development refers to the creating, building, and maintaining of
                                    websites. It includes aspects such as web design, web publishing, web programming, and
                                    database management. --}}
                                    {!! html_entity_decode($services->description) !!}
                                </p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded">
                        <div class="service-img">
                            <img src="{{ 'frontend/img/services/mobile.jpg' }}" style="height: 180px"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="service-content-inner">
                                <a href="#" class="h4 mb-4 d-inline-flex text-danger">Mobile
                                        Applications</a>
                                <p class="mb-4">A mobile app (or mobile application) is a software application developed
                                    specifically for use on small, wireless computer devices, such as smartphones and
                                    tablets.
                                </p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded">
                        <div class="service-img">
                            <img src="{{ 'frontend/img/services/webdesgin1.jpg' }}" style="height: 180px"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="service-content-inner">
                                <a href="#" class="h4 mb-4 d-inline-flex text-danger"> Website
                                        Designing</a>
                                <p class="mb-4">Website designing, also known as web design, is the process of creating
                                    and building a website that is visually appealing, user-friendly, and provides a good
                                    user experience.
                                </p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item bg-light rounded">
                        <div class="service-img">
                            <img src="{{ 'frontend/img/services/digital.jpg' }}" style="height: 180px"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="service-content-inner">
                                <a href="#" class="h4 mb-4 d-inline-flex text-danger"> Digital
                                        Marketing</a>
                                <p class="mb-4">Digital marketing typically refers to online marketing campaigns that
                                    appear on a computer, phone, tablet, . It can take many forms, including
                                    online video,  search engine marketing.
                                </p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-12">
                    <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s"
                        href="#">Services More</a>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Why Choose us Start -->
    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="pb-5">
                <h1 class="text-danger" style="text-align:center">Why choose Us</h1>
                {{-- <h3 class="display-4">We are providing good services to our clients.</h3> --}}
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="pb-5">
                        <p><strong>TheDataVue Technologies</strong>s is one of the leading mobile app development
                            companies in Una. At present technologies are getting quickly shifts and it is crucial one for
                            the business owners and entrepreneurs to keep on with that trend shifts. To run the enterprise
                            business, web presence and android applications turned out to be a prominent one nowadays.</p>

                    </div>
                    <div class="accordion bg-light rounded p-4" id="accordionExample">

                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Experience
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>Our IT company has years of experience in providing top-notch IT solutions and
                                        services to clients in a variety of industries.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Expertise
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>Our team of experts has a deep understanding of the latest technologies and industry
                                        trends, allowing us to provide cutting-edge solutions that meet the unique needs of
                                        our clients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                    Customized Solutions
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>We provide customized solutions that are tailored to the specific requirements of
                                        each client, ensuring that they get the most out of our services.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="faq-img RotateMoveRight rounded">
                        <img src="{{ 'frontend/img/whychoose.jpg' }}" class="img-fluid rounded w-100" alt="Image">
                        {{-- <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5"
                            href="{{ route('frontend.faq') }}">Read More
                            Q & A <i class="fas fa-arrow-right ms-2"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- why choose us End -->



    <!-- portfolio Start -->
    <div class="container-fluid blog pb-5 ">
        <div class="container pb-5 ">
            <div class="pb-5">
                <h1 class="text-danger" style="text-align:center">Portfolio</h1>
                {{-- <h3 class="display-4">We are providing good services to our clients.</h3> --}}
            </div>
            {{-- <div class="text-center mx-auto pb-5 wow fadeInUp " data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-primary "> Portfolio</h1>
                <h1 class="display-4">Latest Articles & News from the Blogs</h1> 
            </div> --}}
            <div class="row g-4 justify-content-center">
                @foreach ($portfolio as $portfolio)

                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded p-4 "
                        style="background-image: url({{ 'frontend/img/bg.png' }});">
                        <div class="project-img">
                            <img src="{{ asset('storage/' . $portfolio->image) }}" style="height: 200px"
                                class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ asset('storage/' . $portfolio->image) }}" data-lightbox="blog-1"
                                    class="btn btn-primary btn-md-square rounded-pill"><i
                                        class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded p-4"
                        style="background-image: url({{ 'frontend/img/bg.png' }});">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/portfolio/ios.jpg' }}" style="height: 200px"
                                class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ 'frontend/img/portfolio/ios.jpg' }}" data-lightbox="blog-2"
                                    class="btn btn-primary btn-md-square rounded-pill"><i
                                        class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item bg-light rounded p-4"
                        style="background-image: url({{ 'frontend/img/bg.png' }});">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/portfolio/laravel.jpg' }}" style="height: 200px"
                                class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ 'frontend/img/portfolio/laravel.jpg' }}" data-lightbox="blog-3"
                                    class="btn btn-primary btn-md-square rounded-pill"><i
                                        class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- <div class="container pb-5 "> --}}
            {{-- <div class="text-center mx-auto pb-5 wow fadeInUp " data-wow-delay="0.1s" style="max-width: 800px;"> --}}
                {{-- <h1 class="text-primary "> Portfolio</h1> --}}
                {{-- <h1 class="display-4">Latest Articles & News from the Blogs</h1> --}}
            {{-- </div> --}}
            {{-- <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded p-4"
                        style="background-image: url({{ 'frontend/img/bg.png' }});">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/portfolio/ui.jpg' }}" style="height: 200px"
                                class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ 'frontend/img/portfolio/ui.jpg' }}" data-lightbox="blog-1"
                                    class="btn btn-primary btn-md-square rounded-pill"><i
                                        class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded p-4"
                        style="background-image: url({{ 'frontend/img/bg.png' }});">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/portfolio/android1.jpg' }}" style="height: 200px"
                                class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ 'frontend/img/portfolio/android1.jpg' }}" data-lightbox="blog-2"
                                    class="btn btn-primary btn-md-square rounded-pill"><i
                                        class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item bg-light rounded p-4"
                        style="background-image: url({{ 'frontend/img/bg.png' }});">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/portfolio/ios1.jpg' }}" style="height: 200px"
                                class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ 'frontend/img/portfolio/ios1.jpg' }}" data-lightbox="blog-3"
                                    class="btn btn-primary btn-md-square rounded-pill"><i
                                        class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="container pb-5 ">
                <div class="text-center mx-auto pb-5 wow fadeInUp " data-wow-delay="0.1s" style="max-width: 800px;"> --}}
                    {{-- <h1 class="text-primary "> Portfolio</h1> --}}
                    {{-- <h1 class="display-4">Latest Articles & News from the Blogs</h1> --}}
                {{-- </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded p-4"
                            style="background-image: url({{ 'frontend/img/bg.png' }});">
                            <div class="project-img">
                                <img src="{{ 'frontend/img/portfolio/laravel1.jpg' }}" style="height: 200px"
                                    class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ 'frontend/img/portfolio/laravel1.jpg' }}" data-lightbox="blog-1"
                                        class="btn btn-primary btn-md-square rounded-pill"><i
                                            class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded p-4"
                            style="background-image: url({{ 'frontend/img/bg.png' }});">
                            <div class="project-img">
                                <img src="{{ 'frontend/img/portfolio/ui1.jpg' }}" style="height: 200px"
                                    class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ 'frontend/img/portfolio/ui1.jpg' }}" data-lightbox="blog-2"
                                        class="btn btn-primary btn-md-square rounded-pill"><i
                                            class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="blog-item bg-light rounded p-4"
                            style="background-image: url({{ 'frontend/img/bg.png' }});">
                            <div class="project-img">
                                <img src="{{ 'frontend/img/portfolio/android2.jpg' }}" style="height: 200px"
                                    class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ 'frontend/img/portfolio/android2.jpg' }}" data-lightbox="blog-3"
                                        class="btn btn-primary btn-md-square rounded-pill"><i
                                            class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- porfolio End -->


    <!-- Team Start -->
    <div class="container-fluid team pb-5 mt-4">
        <div class="container pb-5 my-4">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-danger  ">Our Team</h4>
                    <h4>Our Company Dedicated Team Member</h4>
                        {{-- <h6 class="display-4">Our Investa Company Dedicated Team Member</h6> --}}
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($team as $team)

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <div class="team-img">
                            <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid w-100 rounded-top"
                                alt="Image">
                        </div>
                        <div class="team-content bg-dark text-center rounded-bottom p-4">
                            <div class="team-content-inner rounded-bottom">
                                <h4 class="text-danger"> {{$team->heading}}</h4>
                                <p class="text-white mb-0"> {{$team->post}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        <div class="team-img">
                            <img src="{{ 'frontend/img/team-2.jpg' }}" class="img-fluid w-100 rounded-top"
                                alt="Image">
                        </div>
                        <div class="team-content bg-dark text-center rounded-bottom p-4">
                            <div class="team-content-inner rounded-bottom">
                                <h4 class="text-danger">Mark D. Brock</h4>
                                <p class="text-white mb-0">CEO & Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded">
                        <div class="team-img">
                            <img src="{{ 'frontend/img/team-3.jpg' }}" class="img-fluid w-100 rounded-top"
                                alt="Image">
                        </div>
                        <div class="team-content bg-dark text-center rounded-bottom p-4">
                            <div class="team-content-inner rounded-bottom">
                                <h4 class="text-danger">Mark D. Brock</h4>
                                <p class="text-white mb-0">CEO & Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item rounded">
                        <div class="team-img">
                            <img src="{{ 'frontend/img/team-4.jpg' }}" class="img-fluid w-100 rounded-top"
                                alt="Image">
                        </div>
                        <div class="team-content bg-dark text-center rounded-bottom p-4">
                            <div class="team-content-inner rounded-bottom">
                                <h4 class="text-danger">Mark D. Brock</h4>
                                <p class="text-white mb-0">CEO & Founder</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial bg-light py-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                        <h1 class="text-danger">Our Feedbacks</h4>
                            <h4 class="text-dark">What Our Client Say</h4>
                                {{-- <h6 class="display-4">Our Investa Company Dedicated Team Member</h6> --}}
                    </div>
                    {{-- <div class="h-100 rounded">
                        <h4 class="text-primary">Our Feedbacks </h4>
                        <h4 class="display-4 mb-4">What Our Client Say</h4>
                    </div> --}}
                </div>
                <div class="col-xl-8">
                    <div class="testimonial-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                        <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                <p class="mt-4">Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                    suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper harum veritatis porro.
                                </p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="my-auto text-end">
                                    <h4 class="text-danger">Saul Goodman</h4>
                                    {{-- <p class="mb-0">Profession</p> --}}
                                </div>
                                <div class="bg-white rounded-circle ms-3">
                                    <img src="{{ 'frontend/img/testimonial-1.jpg' }}" class="rounded-circle p-2"
                                        style="width: 100px; height: 100px; border: 1px solid; border-color: var(--bs-danger);"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                <p class="mt-4">Export tempor illum tamen malis malis eram quae irure esse labore quem
                                    cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa tempor labore.
                                </p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="my-auto text-end">
                                    <h4 class="text-danger">Sara Wilsson</h4>
                                    {{-- <p class="mb-0">Profession</p> --}}
                                </div>
                                <div class="bg-white rounded-circle ms-3">
                                    <img src="{{ 'frontend/img/testimonial-2.jpg' }}" class="rounded-circle p-2"
                                    style="width: 100px; height: 100px; border: 1px solid; border-color: var(--bs-danger);"
                                    alt="">
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="d-flex">
                                <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                <p class="mt-4"> Enim nisi quem export duis labore cillum quae magna enim sint quorum
                                    nulla quem
                                    veniam duis tempor labore minim tempor labore quem eram duis noster aute amet eram fore
                                    quis sint
                                    minim.
                                </p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="my-auto text-end">
                                    <h4 class="text-danger">Jena Karlis</h4>
                                    {{-- <p class="mb-0">Profession</p> --}}
                                </div>
                                <div class="bg-white rounded-circle ms-3">
                                    <img src="{{ 'frontend/img/testimonial-3.jpg' }}" class="rounded-circle p-2"
                                        style="width: 100px; height: 100px; border: 1px solid; border-color: var(--bs-danger);"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="d-flex">
                                <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                <p class="mt-4">Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export
                                    minim
                                    fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam tempor labore.
                                </p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="my-auto text-end">
                                    <h4 class="text-danger">Matt Brando</h4>
                                    {{-- <p class="mb-0">Profession</p> --}}
                                </div>
                                <div class="bg-white rounded-circle ms-3">
                                    <img src="{{ 'frontend/img/testimonial-3.jpg' }}" class="rounded-circle p-2"
                                        style="width: 100px; height: 100px; border: 1px solid; border-color: var(--bs-danger);"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    {{-- =================================work on it============= --}}
    <!-- Project Start -->
    <div class="container-fluid project mt-4">
        <div class="container mt-4">

            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-danger   mt-4">Our Clients</h4>
                    <h4>Explore Our Latest Projects</h4>
                        {{-- <h6 class="display-4">Our Investa Company Dedicated Team Member</h6> --}}
            </div>
            {{-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">Our Clients</h4> --}}
                {{-- <h1 class="display-4">Explore Our Latest Projects</h1> --}}
            {{-- </div> --}}

            <div class="project-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                {{-- <div class="row-lg-6 row-xl-5 wow fadeInLeft "> --}}
                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="project-img">
                        <img src="{{ 'frontend/img/project/logo6.jpg' }}" class="img-fluid w-100 rounded"
                            alt="Image">
                    </div>
                </div>
                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-img">
                        <img src="{{ 'frontend/img/project/logo7.jpg' }}" class="img-fluid w-100 rounded"
                            alt="Image">
                    </div>
                </div>
                <div class="project-item h-100">
                    <div class="project-img">
                        <img src="{{ 'frontend/img/project/logo8.jpg' }}" class="img-fluid w-100 rounded"
                            alt="Image">
                    </div>
                </div>
                <div class="project-item h-100">
                    <div class="project-img">
                        <img src="{{ 'frontend/img/project/logo9.jpg' }}" class="img-fluid w-100 rounded"
                            alt="Image">
                    </div>
                </div>
                <div class="project-item h-100">
                    <div class="project-img">
                        <img src="{{ 'frontend/img/project/logo10.jpg' }}" class="img-fluid w-100 rounded"
                            alt="Image">
                    </div>
                </div>
                <div class="project-item h-100">
                    <div class="project-img">
                        <img src="{{ 'frontend/img/project/logo11.jpg' }}" class="img-fluid w-100 rounded"
                            alt="Image">
                    </div>
                </div>
                {{-- </div> --}}

            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- FAQ Start -->
    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                        <h1 class="text-danger  ">FAQs</h4>
                            <h4>We are providing good services to our clients.</h4>
                                {{-- <h6 class="display-4">Our Investa Company Dedicated Team Member</h6> --}}
                    </div>
                    {{-- <div class="pb-5">
                        <h3 class="text-primary">FAQs</h3>
                        <h3 class="display-4">We are providing good services to our clients.</h3>
                    </div> --}}
                    <div class="accordion bg-light rounded p-4" id="accordionExample">
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button text-dark fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseTOne">
                                    How do you communicate with your clients?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>The best part of choosing us is we stay 24/7 available for our clients.
                                        Regardless of the time, we never miss communicating with our clients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-dark fs-5 rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    What industries do you specialize in?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>We understand how one idea can change the market and business graphs that is why we
                                        adhere to strict privacy policies.
                                        So, we take the client’s information secure with us.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-dark fs-5 rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Will I be getting regular updates of the app development progress?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>Well, the time taken to create a website varies on several factors like - project
                                        scope, features and functionalities,
                                        the complexity of design, and more. If you want to get a quote, then contact us
                                        today!</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-dark fs-5 rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                    Can you work on my existing site?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>Of course, we can! Let us know your
                                        requirements and our experts will help you with the right solution. Contact us now!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="faq-img RotateMoveRight rounded">
                        <img src="{{ 'frontend/img/faq-img.jpg' }}" class="img-fluid rounded w-100" alt="Image">
                        <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5"
                            href="{{ route('frontend.faq') }}">Read More
                            Q & A <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End -->
@endsection
@section('scripts')
@endsection
