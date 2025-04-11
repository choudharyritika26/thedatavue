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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"> Training</h4>
            {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Blog</li>
                </ol>     --}}
        </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            {{-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="text-primary display-4">Blog</h1>
                <div class="button-group">
                    <button class="button active" data-filter="*">All</button>
                    <button class="button" data-filter="*">Design</button>
                    <button class="button" data-filter="*">How To</button>
                    <button class="button" data-filter="*">Law And Policy</button>
                    <button class="button" data-filter="*">SEO</button>

                </div>
            </div> --}}
            <div class="row g-4 justify-content-center">
                @foreach ($trainingtype as $index => $trainingtype)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                            {{-- <div class="mb-4">
                            <h4 class="text-primary mb-2">{{ $trainingtype->heading }}</h4>
                            
                        </div> --}}
                            <div class="project-img">
                                <img src="{{ asset('storage/' . $trainingtype->image) }}" class="img-fluid w-100 rounded"
                                    alt="Image">
                                {{-- <div class="blog-plus-icon">
                                <a href=" {{ asset('storage/' . $trainingtype->image) }}" data-lightbox="blog-1"
                                    class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                            </div> --}}
                            </div>
                            <div class="my-4">
                                <h4> {!! html_entity_decode($trainingtype->heading) !!}</h4>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4"
                                href="{{ route('frontend.trainingdetail', ['id' => $trainingtype->id]) }}">Explore More</a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                        <div class="mb-4">
                            <h4 class="text-primary mb-2">Business</h4>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                                <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                            </div>
                        </div>
                        <div class="project-img">
                            <img src="{{ 'frontend/img/blog-2.jpg' }}" class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ 'frontend/img/blog-2.jpg' }}" data-lightbox="blog-2"
                                    class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="my-4">
                            <a href="#" class="h4">Dimensional Fund Advisors Interview with Director</a>
                        </div>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                        <div class="mb-4">
                            <h4 class="text-primary mb-2">Consulting</h4>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                                <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                            </div>
                        </div>
                        <div class="project-img">
                            <img src="{{ 'frontend/img/blog-3.jpg' }}" class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ 'frontend/img/blog-3.jpg' }}" data-lightbox="blog-3"
                                    class="btn btn-primary btn-md-square rounded-pill"><i
                                        class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="my-4">
                            <a href="#" class="h4">Interested in Giving Back this year? Here are some tips</a>
                        </div>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection

@section('script')
@endsection
