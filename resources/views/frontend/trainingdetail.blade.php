@extends('frontend.layout.app')    

@section('style')
@endsection

@section('content')

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

 <!-- Header Start -->
 <div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"> Training Detail</h4>
        {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">trainingtype</li>
            </ol>     --}}
    </div>
</div>
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        {{-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-danger display-4" style="text-align:center">About Us</h1>

        </div> --}}
        <div class="row g-5 align-items-center">
            {{-- @foreach ($trainingtype as $trainingtype) --}}
            <div class="col-lg-4 col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="about-img">
                    <img src="{{ asset('storage/' . $trainingtype->image) }}" 
                            class="img-fluid w-100 rounded bg-white" alt="Image">
                    {{-- <img src="{{ 'frontend/img/about-2.jpg' }}" class="img-fluid w-100 rounded-bottom" alt="Image"> --}}
                </div>
            </div>
            <div class="col-lg-7 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                {{-- <h4 class="text-primary">About Us</h4> --}}
                <h2 class="text-danger">{{$trainingtype->heading}}</h2>
                {{-- <h4 class="text-dark">{{$trainingtype->heading}}</h4> --}}
                <p class="text ps-4 mb-4">
                    {{-- TheDataVue Technologies is a Himachal (India) based company with a wealth of
                    experience in Mobile & Web Application Development, Health IT Solutions, Security, Accountability &
                    Tracking, and Healthcare Domains.is a Himachal Pradesh based company with a wealth of experience in
                    Mobile & Web Application Development, Website Development and Designing and UI/UX designing. We
                    provide timely, cost-effective, innovative solutions using cutting edge tools & technologies, and a
                    dedicate team of experts from multiple domains such as software engineers, business analysts and
                    mobile developers for android and iOS. --}}
                    {!! html_entity_decode($trainingtype->description) !!}
                </p>


                <div class="row g-4 justify-content-between mb-5">
                    <div class="col-lg-6 col-xl-5">
                        <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i> {{$trainingtype->duration}}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-7">
                    <a class="btn btn-primary rounded-pill py-2 px-4"
                            href="{{ route('frontend.trainingform', ['duration' => $trainingtype->duration]) }}">Apply Now</a>
                            {{-- href="{{ route('frontend.careercontact', ['heading' => $career->heading]) }}"> --}}
                </div>

            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</div>
<!-- About End -->
    <!-- About End -->
@endsection

@section('script')
@endsection
