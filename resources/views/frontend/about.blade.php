@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>
            {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>     --}}
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img src="{{ 'frontend/img/hero-img.png' }}" style="height: 500px" class="img-fluid w-100 rounded-top bg-white"
                            alt="Image">
                        {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-xl-6 wow fadeInRight" data-wow-delay="0.3s">
                    {{-- <h4 class="text-primary">About Us</h4> --}}
                    <h5 class="text-danger">Who We Are</h5>
                    <p class="text ps-4 mb-4">TheDataVue Technologies is a Himachal (India) based company with a wealth of
                        experience in Mobile & Web Application Development, Health IT Solutions, Security, Accountability &
                        Tracking, and Healthcare Domains.is a Himachal Pradesh based company with a wealth of experience in
                        Mobile & Web Application Development, Website Development and Designing and UI/UX designing. We
                        provide timely, cost-effective, innovative solutions using cutting edge tools & technologies, and a
                        dedicate team of experts from multiple domains such as software engineers, business analysts and
                        mobile developers for android and iOS.
                    </p>
                    <h5 class="text-danger">Our Mission</h5>
                    <p class="text ps-4 mb-4">Our vision is to be the most admired company in the eyes of our global
                        customers by understanding their rapidly changing requirements and delivering world class solutions,
                        products and services consistently.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- What We Do -->
    <div class="container-fluid project">
        <div class="container mt-4">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-danger  ">What We Do</h4>
                    <h4>Explore Our Latest Projects</h4>
                        {{-- <h6 class="display-4">Our Investa Company Dedicated Team Member</h6> --}}
            </div>

            <div class="project-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="project-img">
                        {{-- <img src="{{ 'frontend/img/projects-1.jpg' }}" class="img-fluid w-100 rounded" alt="Image"> --}}
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-chart-line fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3">Custom Software Development</p>
                            <p>Our IT company offers custom software development services to
                                help businesses create bespoke software solutions that meet their unique requirements.</p>
                            {{-- <div class="pt-4">
                                <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-img">
                        {{-- <img src="{{ 'frontend/img/projects-1.jpg' }}" class="img-fluid w-100 rounded" alt="Image"> --}}
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3" style="">Mobile App Development</p>
                            <p>We specialise in mobile app development services that help
                                businesses reach their customers on the go.</p>
                            {{-- <div class="pt-4">
                                <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                            </div> --}}
                        </div>
                    </div>
                </div>


                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-img">
                        {{-- <img src="{{ 'frontend/img/projects-1.jpg' }}" class="img-fluid w-100 rounded" alt="Image"> --}}
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-chart-line fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3">
                                UI/UX Design</p>
                            <p>We offer UI/UX design services to help businesses create engaging and user-friendly interfaces that enhance the user experience.</p>
                            {{-- <div class="pt-4">
                                <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="project-item h-100">
                    <div class="project-img">
                        {{-- <img src="{{ 'frontend/img/projects-1.jpg' }}" class="img-fluid w-100 rounded" alt="Image"> --}}
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3">
                                Web Development</p>
                            <p>Our web development services help businesses establish a strong
                                online presence with responsive websites that are optimised for speed, security, and search
                                engine visibility.</p>
                            {{-- <div class="pt-4">
                                <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--What We Do End -->
@endsection

@section('script')
@endsection
