@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Website Development</h4>
            {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Service</li>
            </ol> --}}
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            {{-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="display-4">Website Development </h4>
            </div> --}}
            <div class="row  align-items-center">
                <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img src="{{ 'frontend/img/services/website.jpg' }}" style="height: 350px"
                            class="img-fluid w-100 rounded-top bg-white" alt="Image">
                        {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 wow fadeInRight" data-wow-delay="0.3s">
                    {{-- <h4 class="text-primary">About Us</h4>
                    <h1 class="display-5 mb-4">Who We Are</h1> --}}
                    <p class="text ps-4 mb-4">Web development refers to the creating, building, and maintaining of websites.
                        It includes aspects such as web design, web publishing, web programming, and database management. It
                        is the creation of an application that works over the internet i.e. websites.
                    </p>
                    <h5><b>  The word Web Development is made up of two words, that is:</b></h5>
                    {{-- <p class="text ps-4 mb-4">

                        -> Web: It refers to websites, web pages or anything that works over the internet.
                        -> Development: It refers to building the application from scratch.
                    </p> --}}
                    <ul>
                     
                        <li><h5>Web:</h5> It refers to websites, web pages or anything that works over the internet.</li>
                        <li><h5> Development:</h5> It refers to building the application from scratch.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Services End -->
@endsection

@section('script')
@endsection
