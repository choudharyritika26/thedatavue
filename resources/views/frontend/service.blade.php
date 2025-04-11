@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"></h4>

    </div>
</div>
<!-- Header End -->   

<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            {{-- <h4 class="text-primary">Our Services</h4> --}}
            <h1 class="text-danger display-4" style="text-align:center">{{$service->heading}}</h1>

        </div>

        <div class="service-content text-center p-4 wow fadeInUp" style="margin-top:-80px;">
            <div class="service-content-inner">
                <p class="mb-4">
                {!! html_entity_decode($service->description) !!}
                    <!-- Website designing, also known as web design, is the process of creating
                    and building a website that is visually appealing, user-friendly, and provides a good
                    user experience. -->
                </p>

            </div>
        </div>
        <div class="row g-4 justify-content-center text-center">
            @foreach ($servicesdetails as $servicesdetails)
            <div class="col-md-12 col-lg-12  wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-light rounded" style="">
                    {{-- <div class="service-img">
                            <p class="p-2" style="background-size: 200px;">
                                <i class="bi bi-bar-chart text-dark" 
                                 style=" font-size:40px;"></i></p>
                    </div> --}}
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner ">
                            <a href="#" class="h4 mb-4 d-inline-flex text-danger">
                                {{$servicesdetails->heading}}</a>
                            <p class="" style="margin-top:-10px">
                                {!! html_entity_decode($servicesdetails->description) !!}
                                {{-- A mobile app (or mobile application) is a software application developed
                                    specifically for use on small, wireless computer devices, such as smartphones and
                                    tablets. --}}
                            </p>
                            {{-- <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded">
                        
                        <div class="service-content text-center p-4">
                            <div class="service-content-inner">
                                <a href="#" class="h4 mb-4 d-inline-flex text-danger"> Website
                                        Designing</a>
                                <p class="mb-4">Website designing, also known as web design, is the process of creating
                                    and building a website that is visually appealing, user-friendly, and provides a good
                                    user experience.
                                </p>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item bg-light rounded">
                       
                        <div class="service-content text-center p-4">
                            <div class="service-content-inner">
                                <a href="#" class="h4 mb-4 d-inline-flex text-danger"> Digital
                                        Marketing</a>
                                <p class="mb-4">Digital marketing typically refers to online marketing campaigns that
                                    appear on a computer, phone, tablet, . It can take many forms, including
                                    online video,  search engine marketing.
                                </p>
                               
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


<!-- Services Start -->
{{-- <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="display-4">Website Development </h4>
            </div>
            <div class="row  align-items-center">
                <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img src="{{ 'frontend/img/services/website.jpg' }}" style="height: 350px"
class="img-fluid w-100 rounded-top bg-white" alt="Image">
<img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image">
</div>
</div>
<div class="col-lg-6 col-xl-6 wow fadeInRight" data-wow-delay="0.3s">

    <p class="text ps-4 mb-4">Web development refers to the creating, building, and maintaining of websites.
        It includes aspects such as web design, web publishing, web programming, and database management. It
        is the creation of an application that works over the internet i.e. websites.
    </p>
    <h5><b> The word Web Development is made up of two words, that is:</b></h5>
    <ul>

        <li>
            <h5>Web:</h5> It refers to websites, web pages or anything that works over the internet.
        </li>
        <li>
            <h5> Development:</h5> It refers to building the application from scratch.
        </li>
    </ul>
</div>
</div>
</div>
</div> --}}

<!-- Services End -->
@endsection

@section('script')
@endsection