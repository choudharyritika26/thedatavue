@extends('frontend.layout.app')

@section('style')
    <style>
        .button-group {
            margin-bottom: 20px;
        }

        .button {
            padding: 10px;
            cursor: pointer;
            margin-right: 5px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        .button.active {
            background-color: #007bff;
            color: white;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
        }

        .gallery-item {
            display: none;
            /* Hide all images by default */
            margin: 10px;
            width: calc(33.33% - 20px);
            /* Adjust width for 3 items per row */
        }

        .gallery-item img {
            width: 200px;
            height: 200px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <!-- Carousel Start -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($slider as $key => $sliders)
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($slider as $key => $sliders)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2000">
                    <img src="{{ asset('storage/' . $sliders->image) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $sliders->title }}</h5>
                        <p>{{ $sliders->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Carousel Start -->
    {{-- <div class="header-carousel owl-carousel">
        @foreach ($slider as $slider)
            <div class="header-carousel-item">
                <div class="header-carousel-item-img-1">
                    <img src="{{ asset('storage/' . $slider->image) }}" class="img-fluid " alt="Image">
                </div>
                <div class="carousel-caption">     
                    <div class="carousel-caption-inner text-start p-1">
                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">
                            {{ $slider->heading }}</h1>
                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s"
                            style="animation-delay: 1.5s;">
                          
                            {!! html_entity_decode($slider->description) !!}
                        </p>

                    </div>
                </div>
            </div>
        @endforeach
        
    </div> --}}
    <!-- Carousel End -->



    <!-- Carousel End -->




    <!-- About Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                @foreach ($about as $aboutus)
                    <div class="col-lg-4 col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="about-img">
                            <img src="{{ asset('storage/' . $aboutus->image) }}" class="img-fluid w-100 rounded bg-white"
                                alt="Image">
                            {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                        {{-- <h4 class="text-primary">About Us</h4> --}}
                        <h1 class="text-danger display-4">{{ $aboutus->heading }}</h1>
                        <p class="text ps-4 mb-4">
                            {!! html_entity_decode($aboutus->description) !!}
                        </p>
                        {{-- TheDataVue Technologies is a Himachal (India) based company with a wealth of
                        experience in Mobile & Web Application Development, Health IT Solutions, Security, Accountability &
                        Tracking, and Healthcare Domains.is a Himachal Pradesh based company with a wealth of experience in
                        Mobile & Web Application Development, Website Development and Designing and UI/UX designing. We
                        provide timely, cost-effective, innovative solutions using cutting edge tools & technologies, and a
                        dedicate team of experts from multiple domains such as software engineers, business analysts and
                        mobile developers for android and iOS. --}}
                        {{-- <a class="btn btn-light rounded-pill py-2 px-4" href="{{ route('frontend.about') }}">Read More</a> --}}
                        {{-- <h3 class="text-danger">Our Mission</h3>
                    <p class="text ps-4 mb-4">Our vision is to be the most admired company in the eyes of our global
                        customers by understanding their rapidly changing requirements and delivering world class solutions,
                        products and services consistently.
                    </p> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- About End -->



    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                {{-- <h4 class="text-primary">Our Services</h4> --}}
                <h1 class="text-danger display-4" style="text-align:center">Our Services</h1>

                {{-- <h1 class="display-4"> Offering the Best Consulting & Investa Services</h1> --}}
            </div>
            <div class="row g-4 justify-content-center text-center">
                <div class="services-slider">
                @foreach ($services as $services)
                    {{-- <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded" style="height:430px">
                            <div class="service-img">
                                <img src="{{ asset('storage/' . $services->image) }}" style="height: 180px"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4  d-inline-flex text-danger">
                                        {{ $services->heading }}</a>
                                   
                                    <p class="" style="margin-top: -10px">
                                      
                                        {!! Str::limit(html_entity_decode($services->description), 100) !!}
                                    </p>

                                    <a class="btn btn-light rounded-pill py-2 px-4"
                                        href="{{ route('frontend.service', ['id' => $services->id]) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded p-4" style="height: 380px;">
                            <div class="service-img text-center"
                                style="height: 120px; display: flex; align-items: center; justify-content: center; position: relative;">
                                <!-- Circle background -->
                                <div class="circle-background"
                                    style="position: absolute; width: 100px; height: 100px; background-color:
                                     rgba(255, 0, 0, 0.2); border-radius: 50%; top: 50%; left: 50%; transform: 
                                     translate(-50%, -50%); z-index: 1;">
                                </div>
                                <i class='fas fa-globe text-dark' style='font-size:60px; z-index: 2;'></i>
                            </div>
                            <div class="service-content text-center p-2">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 d-inline-flex text-dark">
                                        {{ $services->heading }}</a>
                                    <p class="" style="margin-top: -10px">
                                        {!! Str::limit(html_entity_decode($services->description), 100) !!}
                                    </p>

                                    <a class="btn btn-light rounded-pill py-2 px-4"
                                        href="{{ route('frontend.service', ['id' => $services->id]) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

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
    <div class="container-fluid faq py-5" style="margin-top: -80px">
        <div class="container py-5">
            <div class="pb-5">
                <h1 class="text-danger display-4" style="text-align:center">Why Choose Us</h1>
                {{-- <h3 class="display-4">We are providing good services to our clients.</h3> --}}
            </div>
            <div class="row g-5 align-items-center">
                @foreach ($whychooseus as $whychooseus)
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="pb-5">
                            <p>
                                {!! html_entity_decode($whychooseus->description) !!}
                                {{-- <strong>TheDataVue Technologies</strong>s is one of the leading mobile app development
                            companies in Una. At present technologies are getting quickly shifts and it is crucial one for
                            the business owners and entrepreneurs to keep on with that trend shifts. To run the enterprise
                            business, web presence and android applications turned out to be a prominent one nowadays. --}}
                            </p>

                        </div>
                        <div class="accordion bg-light rounded p-4" id="accordionExample">
                            @foreach ($whychooseustypes as $index => $whychooseustypes)
                                <div class="accordion-item border-0 mb-4">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button text-danger fs-5 rounded-top" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="false" aria-controls="collapse{{ $index }}">
                                            {{ $whychooseustypes->heading }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {!! html_entity_decode($whychooseustypes->description) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Expertise
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    
                                    <p>Our team of experts has a deep understanding of the latest technologies and industry
                                        trends, allowing us to provide cutting-edge solutions that meet the unique needs of
                                        our clients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Customized Solutions
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                
                                    <p>We provide customized solutions that are tailored to the specific requirements of
                                        each client, ensuring that they get the most out of our services.
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                        <div class="faq-img RotateMoveRight rounded">
                            <img src="{{ asset('storage/' . $whychooseus->image) }}" class="img-fluid rounded w-100"
                                alt="Image">
                            {{-- <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5"
                            href="{{ route('frontend.faq') }}">Read More
                            Q & A <i class="fas fa-arrow-right ms-2"></i></a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- why choose us End -->


    <!-- About Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="text-danger display-4" style="text-align:center">Project Completed</h1>

            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 col-xl-12 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="row g-4 text-center align-items-center justify-content-center">
                        @foreach ($project as $project)
                            <div class="col-sm-4">
                                <div class=" rounded p-4">
                                    <div class="w-100  p-4 d-flex align-items-center justify-content-center">
                                        <p class="text-dark mb-0">{{ $project->project }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="margin-top: -20px;">
                                        <h4> <span class="counter-value fs-1 text-danger fw-bold"
                                                data-toggle="counter-up">{{ $project->count }} </span></h2>
                                            <!-- <h4 class="text-danger fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4> -->
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="col-sm-4">
                            <div class=" rounded p-4">
                                <div class="w-100 p-4 d-flex align-items-center justify-content-center">
                                    <h4 class="mb-0  text-danger">Years Of Experience</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <h2><span class="counter-value fs-1  text-dark" data-toggle="counter-up">21</span></h2>
                                  
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class=" rounded p-4">
                                <div class="w-100 p-4 d-flex align-items-center justify-content-center">
                                    <h4 class="text-danger mb-0">Team Members</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <h2><span class="counter-value fs-1  text-dark" data-toggle="counter-up">97</span></h2>
                                  
                                </div>

                            </div>
                        </div> -->
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- About End -->

    <!-- portfolio Start -->

    <div class="container-fluid blog  mt-4 " id="portfolio">
        <div class="container  ">
            <div class="">
                <h1 class="text-danger display-4" style="text-align:center">Portfolio</h1>
            </div>

            <div class="button-group p-3">
                <button class="button active" data-filter="*">All</button>
                @foreach ($category as $item)
                    <button class="button"
                        data-filter=".{{ str_replace('/', '-', $item->catagory) }}">{{ $item->catagory }}</button>
                @endforeach
            </div>

            <div class="row g-4 justify-content-center portfolio">
                @foreach ($portfolio as $portfolioItem)
                    @php
                        // Convert the comma-separated categories into an array and replace slashes
                        $categories = explode(',', str_replace('/', '-', $portfolioItem->category));
                    @endphp
                    <div class="col-md-6 col-lg-6 col-xl-4 {{ implode(' ', $categories) }} wow fadeInUp"
                        data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded p-4"
                            style="background-image: url({{ 'frontend/img/bg.png' }});">
                            <a href="{{ route('frontend.portfoliodetales', ['id' => $portfolioItem->id]) }}"
                                class="project-link">
                                <div class="project-img">
                                    <img src="{{ asset('storage/' . $portfolioItem->image) }}" style="height: 200px"
                                        class="img-fluid w-100 rounded" alt="Image">
                                    <br><br>
                                    <h6 class="mt-2" style="margin-top: -60px">{{ $portfolioItem->heading }}</h6>
                                    <div class="blog-plus-icon">
                                        <!-- Icon or content inside this can remain as it is -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- porfolio End -->




    <!-- Team Start -->
    {{-- <div class="container-fluid team pb-5 mt-4">
        <div class="container pb-5 my-4">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-danger display-4  ">Our Team</h4>
                    <h4>Our Company Dedicated Team Member</h4>
                  
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
                                    <h4 class="text-danger"> {{ $team->heading }}</h4>
                                    <p class="text-white mb-0"> {{ $team->post }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
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
    {{-- </div>
        </div>
    </div> --}}
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial bg-light py-5" style="margin-top: 100px">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                        <h1 class="text-danger display-4">Our Feedbacks</h1>
                        <h3 class="text-dark">What Our Client Say</h3>

                    </div>

                </div>
                <div class="col-xl-8">
                    <div class="testimonial-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                        @foreach ($feedback as $feedback)
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.3s"
                                style="height:350px">
                                <div class="d-flex">
                                    <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                    <p class="mt-4">
                                        {!! html_entity_decode($feedback->description) !!}
                                        {{-- Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                    suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper harum veritatis porro. --}}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="my-auto text-end">
                                        <h5 class="text-dark">
                                            {{ $feedback->name }}
                                            {{-- Saul Goodman --}}
                                        </h5>

                                        <p class="text-danger" style="margin-top: -5px; font-size:12px;">
                                            {{ $feedback->profession }}
                                            <!-- Website Development  -->
                                        </p>

                                    </div>
                                    <div class="bg-white rounded-circle ms-3">
                                        <img src="{{ asset('storage/' . $feedback->image) }}" class="rounded-circle p-2"
                                            style="width: 100px; height: 100px; border: 1px solid; border-color: var(--bs-danger);"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.5s">
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

                                </div>
                                <div class="bg-white rounded-circle ms-3">
                                    <img src="{{ 'frontend/img/testimonial-3.jpg' }}" class="rounded-circle p-2"
                                        style="width: 100px; height: 100px; border: 1px solid; border-color: var(--bs-danger);"
                                        alt="">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->





    <!-- Project End -->


    <div class="container-fluid team pb-5 mt-4">
        <div class="container pb-5 my-4">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-danger display-4">Our Clients</h4>
            </div>
            <div class="row g-4 justify-content-center owl-carousel owl-theme">
                @foreach ($clients as $client)
                    <div class="col-sm-2 col-md-2 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="client-slider wow fadeInUp" data-wow-delay="0.1s">
                            <div class="project-img">
                                <img src="{{ asset('storage/' . $client->image) }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-sm-2 col-md-2 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="client-slider  wow fadeInUp" data-wow-delay="0.3s">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/project/logo7.jpg' }}" class="img-fluid w-100 rounded"
                                alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="client-slider ">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/project/logo8.jpg' }}" class="img-fluid w-100 rounded"
                                alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="client-slider ">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/project/logo9.jpg' }}" class="img-fluid w-100 rounded"
                                alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="client-slider ">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/project/logo10.jpg' }}" class="img-fluid w-100 rounded"
                                alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="client-slider ">
                        <div class="project-img">
                            <img src="{{ 'frontend/img/project/logo11.jpg' }}" class="img-fluid w-100 rounded"
                                alt="Image">
                        </div>
                    </div>
                </div> --}}
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- FAQ start -->
    {{-- <div class="container-fluid faq py-5" style="margin-top:-130px">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                        <h1 class="text-danger display-4 ">FAQs</h4>
                            <h4>We are providing good services to our clients.</h4>
                           
                    </div>
                    
                    <div class="accordion bg-light rounded p-4" id="accordionExample">
                        @foreach ($faq as $index => $faq)
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button text-dark fs-5 rounded-top" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="false" aria-controls="collapse{{ $index }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            {!! html_entity_decode($faq->answer) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach --}}




    {{-- <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-dark fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    What industries do you specialize in?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                  
                                    <p>We understand how one idea can change the market and business graphs that is why we
                                        adhere to strict privacy policies.
                                        So, we take the client’s information secure with us.</p>
                                </div>
                            </div>
                        </div> --}}
    {{-- <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-dark fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Will I be getting regular updates of the app development progress?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                  
                                    <p>Well, the time taken to create a website varies on several factors like - project
                                        scope, features and functionalities,
                                        the complexity of design, and more. If you want to get a quote, then contact us
                                        today!</p>
                                </div>
                            </div>
                        </div> --}}
    {{-- <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-dark fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Can you work on my existing site?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    
                                    <p>Of course, we can! Let us know your
                                        requirements and our experts will help you with the right solution. Contact us now!
                                    </p>
                                </div>
                            </div>
                        </div> --}}
    {{-- </div>
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
    </div> --}}
    <!-- FAQ End -->
@endsection

@section('scripts')
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Include Isotope.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <script>
        $(document).ready(function() {
    $('.services-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

});
    </script>

  
    <script>
        $(document).ready(function() {
            // alert('ss');
            // Initialize Isotope
            var $grid = $('.portfolio').isotope({
                itemSelector: '.col-md-6', // Adjust this selector based on your layout
                layoutMode: 'fitRows'
            });

            // Filter items on button click
            $('.button-group').on('click', '.button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });

                // Remove 'active' class from all buttons and add to the clicked button
                $('.button').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.button').click(function() {

                $('.button').removeClass('active'); // Remove active class from all buttons
                $(this).addClass('active'); // Add active class to the clicked button
            });
        });
    </script>
    {{-- faq dropdown  --}}
    <script>
        // Ensure the document is ready
        document.addEventListener('DOMContentLoaded', function() {
            var myAccordion = document.getElementById('accordionExample');
            var accordionItems = myAccordion.querySelectorAll('.accordion-button');

            accordionItems.forEach(function(button) {
                button.addEventListener('click', function() {
                    var targetCollapse = document.querySelector(this.getAttribute(
                        'data-bs-target'));

                    // If the target is already shown, hide it; otherwise, show it
                    if (targetCollapse.classList.contains('show')) {
                        var collapseInstance = bootstrap.Collapse.getInstance(targetCollapse);
                        collapseInstance.hide(); // Hide it
                    } else {
                        var collapseInstance = new bootstrap.Collapse(targetCollapse);
                        collapseInstance.show(); // Show it
                    }
                });
            });
        });
    </script>
@endsection
