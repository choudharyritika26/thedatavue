@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Portfolio  Detail</h4>
            {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>   
                </ol>     --}}
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid about bg-light py-5"  style="background-color: #e7f0f3 !important">
        <div class="container py-5" >
            <div class="row g-5 align-items-center">    
                {{-- @foreach ($portfoliodetales as $portfoliodetales) --}}
                <div class="col-lg-6 col-xl-5   wow fadeInLeft" data-wow-delay="0.1s">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" >
                        <div class="carousel-indicators">
                            @php

                                $imageFilenames = explode(',', $portfolio->slider_image);
                            @endphp
                            @foreach ($imageFilenames as $key => $sliders)
                                <button type="button" data-bs-target="#carouselExampleDark"
                                    data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                    aria-current="true"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            {{-- @foreach ($imageFilenames as $key => $filename)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2000">
                                    <img src="{{ asset('storage/' . $filename) }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach --}}

                            @foreach ($imageFilenames as $key => $filename)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2000" >
                                    <!-- Anchor tag wraps the image and uses lightbox to open the zoomed version -->
                                    <a href="{{ asset('storage/' . $filename) }}" data-lightbox="carousel">
                                        <img src="{{ asset('storage/' . $filename) }}"  style="max-height:250px;" class="d-block w-100"
                                            alt=".....">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>


                <div class="col-lg-7 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Project information</h2>
                        </div>
                        <div class="card-body">

                            {{-- <h2 class="card-title">Project information</h2> --}}
                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}

                            <ul class=" list-group list-group-flush p-4">
                                <li><strong>Project Name</strong>: <span> {{ $portfolio->heading }}</span></li>
                                {{-- <li><strong>Platform</strong>: <span> @php
                                    $platformsArray = json_decode($portfoliodetales->platform);
                                @endphp
                                {{ is_array($platformsArray) ? implode(', ', $platformsArray) : $portfoliodetales->platform }}</span></li> --}}
                                <li><strong>Catagory</strong>: <span> {{ $portfolio->category }}</span></li>
                                <li><strong>Project Start Date</strong>: <span> {{ $portfolio->startdate }}</span></li>
                                {{-- <li><strong>Project URL</strong>: <span>  <a href="#"></a> {{ $portfolio->project_url }}</span></li> --}}

                                {{-- <li><strong>Project Url</strong>: 
                                    <span>
                                        @if(!empty($portfolio->project_url))
                                            <a href="{{ $portfolio->project_url }}" target="_blank" class="text-dark">{{ $portfolio->project_url }}</a>
                                        @else
                                            <span class="text-muted">No URL provided</span>
                                        @endif
                                    </span>
                                </li> --}}
                                

                                {{-- <li><strong>Description</strong>: <span>  {!! html_entity_decode($portfoliodetales->description) !!}</span></li> --}}
                                {{-- <li><strong>Project URL</strong>: <a
                                        href="#"><span>https://www.onkarnathkasana.com/</span></a></li> --}}
                            </ul>
                            {{-- <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div> --}}
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>

                </div>

                <div class="container-fluid project">
                    <div class="container mt-4">
                        <div class="" data-wow-delay="0.3s" >
                            <h4 class="text-danger display-4  ">Description</h4>
                            <p class="">
                                {{-- TheDataVue Technologies is a Himachal (India) based company with a wealth of
                                experience in Mobile & Web Application Development, Health IT Solutions, Security,
                                Accountability &
                                Tracking, and Healthcare Domains. --}}
                                {!! html_entity_decode($portfolio->description) !!}
                            </p> 
                            
                            
                            
                           
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- What We Do -->




    <br>
    <!--What We Do End -->
@endsection

@section('script')
@endsection
