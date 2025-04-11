@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- Testimonial Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Career</h4>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-fluid testimonial bg-light py-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">

                    <div class="h-100 rounded">
                        <img src="{{ 'frontend/img/projects-2.jpg' }}" class="img-fluid rounded w-100" alt="Image">
                        <h4 class="text-primary"></h4>
                        <h1 class="display-4 mb-4"></h1>

                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="testimonial-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                        @foreach ($career as $career)
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp"
                                data-wow-delay="0.3s">
                                <div class="d-flex ">
                                    <div class="my-auto ">
                                        <h3>{{ $career->heading }}</h3>
                                        <h6 class="mb-0">{{ $career->exp }}</h6>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">
                                    <p class="mt-4 text-md-start"> {!! html_entity_decode($career->description) !!}
                                    </p>
                                </div> --}}

                                <div class="d-flex">
                                    <p class="mt-4 text-md-start">
                                        {!! Str::words(strip_tags(html_entity_decode($career->description)), 25) !!}
                                    </p>
                                </div>

                                {{-- <div class="col-xl-4 wow fadeInRight" data-wow-delay="0.1s">   --}}
                                    <div class="h-100 rounded">
                                        <a class="btn btn-primary rounded-pill text-white py-2 px-2 p-3" 
                                           href="{{ route('frontend.careercontact', ['heading' => $career->heading]) }}">
                                           Apply Now<i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                {{-- </div> --}}    
                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection

@section('script')
@endsection
