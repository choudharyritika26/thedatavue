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
        <div class="row g-5 ">
            @foreach ($about as $aboutus)
            <div class="col-lg-4 col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="about-img">
                    <img src="{{ asset('storage/' . $aboutus->image) }}"
                        class="img-fluid w-100 rounded bg-white" alt="Image">
                    {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
                </div>
            </div>
            <div class="col-lg-7 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                {{-- <h4 class="text-primary">About Us</h4> --}}
                <h1 class="text-danger">{{ $aboutus->heading }}</h1>
                <p class="text ps-4 mb-4">
                    {!! html_entity_decode($aboutus->description) !!}
                    {{-- TheDataVue Technologies is a Himachal (India) based company with a wealth of
                        experience in Mobile & Web Application Development, Health IT Solutions, Security, Accountability &
                        Tracking, and Healthcare Domains.is a Himachal Pradesh based company with a wealth of experience in
                        Mobile & Web Application Development, Website Development and Designing and UI/UX designing. We
                        provide timely, cost-effective, innovative solutions using cutting edge tools & technologies, and a
                        dedicate team of experts from multiple domains such as software engineers, business analysts and
                        mobile developers for android and iOS. --}}
                </p>
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

<div class="container-fluid about bg-light py-5" style="margin-top: -150px">
    <div class="container  py-5">
        {{-- <div class="row align-items-center"> --}}

        <div class="col-lg-12 col-xl-12 wow fadeInRight" data-wow-delay="0.3s">
            @foreach ($aboutdetail as $aboutdetail)
            {{-- <h4 class="text-primary">About Us</h4> --}}
            <h3 class="text-danger">{{ $aboutdetail->heading }}</h3>
            <p class="text ps-4 mb-4">
                {!! html_entity_decode($aboutdetail->description) !!}
                {{-- Our vision is to be the most admired company in the eyes of our global
                    customers by understanding their rapidly changing requirements and delivering world class solutions,
                    products and services consistently. --}}
            </p>
            {{-- <h3 class="text-danger">Expertise</h3>
                <p class="text ps-4 mb-4">Our expertise in the arena of IT solutions is well known & world recognized. Our
                    severe adherence to international quality standards on web, best quality services, creative designs,
                    practical ideas, cost-effective and economical prices, time bound & speedy project completion
                    strategies, user-friendly & easy to surf web presence differentiate us from others.
                </p>
                <h3 class="text-danger">Our Strength</h3>
                <p class="text ps-4 mb-4">TheDataVue Technologies offers a team of hard-working and dedicated professionals
                    proficient in
                    advanced hardware and software technologies. Our state-of-the-art infrastructure guarantees hassle-free
                    operations and 24x7 supports to our global clients.
                </p> --}}
            @endforeach
        </div>
    </div>
</div>



<!-- About Start -->
<div class="container-fluid about bg-light py-5" style="margin-top:-140px">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            @foreach ($achievement as $achievement)
            <div class="col-lg-4 col-xl-12 wow  fadeInLeft" data-wow-delay="0.3s">
                {{-- <h4 class="text-primary">About Us</h4> --}}
                <h3 class="text-dark p-4">We Have Achieved Experiences & Skills</h3>
                <div class=" col-lg-4 col-xl-6 text-warning p-2">
                    <i class='fas fa-trophy p-2' style='font-size:80px'></i>
                    <div class="text-danger" style="margin-left: 100px; margin-top:-80px;">
                        <h2  class="text-danger">
                            {{-- <span>12+</span> --}}
                            {{ $achievement->heading }}
                        </h2>
                    </div>
                </div>

                <p class="text ps-4 mb-4">

                    {!! html_entity_decode($achievement->description) !!}

                    {{-- At TheDataVue Technologies we don't just create project, we provide the extra
                        benefits,
                        offers, sell after service and support you throughout your journey and need. We also help our
                        customer to build a brand and we also offers to promote its products so they may reach higher level
                        through our SEO programs and other promotion programes. We develop our projects that meets all need
                        Responsive for mobile web development software development We are also an SEO/ promotion company and
                        also providing domain name and web hosting for all type of framework. --}}
                </p>
                {{-- <h3 class="text-danger">Our Mission</h3>
                    <p class="text ps-4 mb-4">Our vision is to be the most admired company in the eyes of our global
                        customers by understanding their rapidly changing requirements and delivering world class solutions,
                        products and services consistently.
                    </p> --}}
            </div>
            @endforeach

            {{-- <div class="col-lg-6 col-xl-5 wow fadeInRight" data-wow-delay="0.1s">
                @foreach ($percentage as $index => $percentage)
                <div class="containers 
            @if($index % 5 == 0) 
                html 
            @elseif($index % 5 == 1) 
                css 
            @elseif($index % 5 == 2) 
                javascript 
            @elseif($index % 5 == 3) 
                bootstrap 
            @else 
                php 
            @endif">
                    <div class="progresss-containers">
                        <h4> {{ $percentage->language }}</h4>
                        <div class="progresss-bar">
                            <span> {{ $percentage->percent }}</span>
                        </div>
                    </div>
                </div>
                @endforeach --}}

                <!-- <div class="containers css">
                        <div class="progresss-containers">
                            <h4>CSS</h4>
                            <div class="progresss-bar">
                                <span>80%</span>
                            </div>
                        </div>
                    </div>
                
                    <div class="containers javascript">
                        <div class="progresss-containers">
                            <h4>JavaScript</h4>
                            <div class="progresss-bar">
                                <span>60%</span>
                            </div>
                        </div>
                    </div>
                
                    <div class="containers bootstrap">
                        <div class="progresss-containers">
                            <h4>Bootstrap</h4>
                            <div class="progresss-bar">
                                <span>58%</span>
                            </div>
                        </div>
                    </div>
                
                    <div class="containers php">
                        <div class="progresss-containers">
                            <h4>PHP</h4>
                            <div class="progresss-bar">
                                <span>90%</span>
                            </div>
                        </div>
                    </div> -->
            </div>



        </div>
    </div>
</div>
<!-- About End -->




<!-- What We Do -->
{{-- <div class="container-fluid project">
        <div class="container mt-4">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-danger display-4  ">What We Do</h4>
                    <h4>Explore Our Latest Projects</h4>
                      
            </div>

            <div class="project-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="project-img">
                       
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-chart-line fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3">Custom Software Development</p>
                            <p>Our IT company offers custom software development services to
                                help businesses create bespoke software solutions that meet their unique requirements.</p>
                           
                        </div>
                    </div>
                </div>
                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-img">
                       
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3" style="">Mobile App Development</p>
                            <p>We specialise in mobile app development services that help
                                businesses reach their customers on the go.</p>
                           
                        </div>
                    </div>
                </div>


                <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-img">
                       
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-chart-line fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3">
                                UI/UX Design</p>
                            <p>We offer UI/UX design services to help businesses create engaging and user-friendly interfaces that enhance the user experience.</p>
                           
                        </div>
                    </div>
                </div>
                <div class="project-item h-100">
                    <div class="project-img">
                       
                    </div>
                    <div class="project-content bg-light rounded p-4">
                        <div class="project-content-inner">
                            <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                            <p class="text-dark fs-5 mb-3">
                                Web Development</p>
                            <p>Our web development services help businesses establish a strong
                                online presence with responsive websites that are optimised for speed, security, and search
                                engine visibility.</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!--What We Do End -->
@endsection

@section('script')
@endsection