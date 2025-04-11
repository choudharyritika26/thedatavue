@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- About Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            {{-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="text-danger display-4" style="text-align:center">About Us</h1>

            </div> --}}
            <div class="row g-5 align-items-center">
                {{-- @foreach ($blog as $blog) --}}
                <div class="col-lg-4 col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                                class="img-fluid w-100 rounded bg-white" alt="Image">
                        {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
                    </div>
                </div>
                <div class="col-lg-7 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    {{-- <h4 class="text-primary">About Us</h4> --}}
                    <h2 class="text-danger">{{$blog->title}}</h2>
                    <h4 class="text-dark">{{$blog->heading}}</h4>
                    <p class="text ps-4 mb-4">
                        {{-- TheDataVue Technologies is a Himachal (India) based company with a wealth of
                        experience in Mobile & Web Application Development, Health IT Solutions, Security, Accountability &
                        Tracking, and Healthcare Domains.is a Himachal Pradesh based company with a wealth of experience in
                        Mobile & Web Application Development, Website Development and Designing and UI/UX designing. We
                        provide timely, cost-effective, innovative solutions using cutting edge tools & technologies, and a
                        dedicate team of experts from multiple domains such as software engineers, business analysts and
                        mobile developers for android and iOS. --}}
                        {!! html_entity_decode($blog->description) !!}
                    </p>


                    <div class="row g-4 justify-content-between mb-5">
                        <div class="col-lg-6 col-xl-5">
                            <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i> {{$blog->date}}</p>
                            {{-- <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i> Mobile App
                                Development</p> --}}
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            {{-- <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i>  UI/UX Design
                            </p> --}}
                            <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i>{{$blog->name}}</p>
                        </div>
                    </div>

                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection

@section('script')
@endsection
