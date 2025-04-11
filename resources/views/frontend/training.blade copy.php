@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Training</h4>
            {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>     --}}
        </div>
    </div>
    <!-- Header End -->




    <!-- Why Choose us Start -->
    <div class="container-fluid faq py-5">
        <div class="container py-5">
            {{-- <div class="pb-5">
                <h1 class="text-danger" style="text-align:center">Training</h1>
                <h3 class="display-4">We are providing good services to our clients.</h3>
            </div> --}}
            <div class="row g-5 align-items-center">
                @foreach ($training as $training)
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="pb-5">
                        <h5 style="font-family: Bell MT!important;">
                            {{ $training->heading }}
                            {{-- Keep training and keep learning until you get it right. --}}
                        </h5>

                    </div>

                    <div class="accordion bg-light rounded p-4" id="accordionExample">
                        @foreach ($trainingtype as $index => $trainingtype)
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button text-danger fs-5 rounded-top" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="false" aria-controls="collapse{{ $index }}">
                                        {{ $trainingtype->heading }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            {!! html_entity_decode($trainingtype->description) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    {{-- <div class="accordion bg-light rounded p-4" id="accordionExample">
                        @foreach ($trainingtype as $trainingtype)
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                  
                                    {{ $trainingtype->heading }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    
                                    <p>
                                        {!! html_entity_decode($trainingtype->description) !!}
                                       
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                          
                        </div>
                        @endforeach --}}
                        {{-- <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    6 Month Training
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    <p>Php Development</p>
                                    <p>UI/UX</p>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-danger fs-5 rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    1 Year Training
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    
                                    <p>IOS Development</p>
                                    <p> Php Laravel FrameWork</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="faq-img RotateMoveRight rounded">
                        <img src="{{ asset('storage/' . $training->image) }}" class="img-fluid rounded w-100" alt="Image">
                        {{-- <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5"
                            href="{{route ('frontend.contactapplynow')}}">Apply Now <i class="fas fa-arrow-right ms-2"></i></a> --}}
                    </div>
                </div>
                @endforeach  
            </div>
        </div>
    </div>
    <!-- why choose us End -->
@endsection

@section('script')
@endsection
