@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- FAQ Start -->
    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s">
                    @foreach ($faqheading as $faqheading)
                        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                            <h1 class="text-danger display-4  ">{{ $faqheading->heading }}</h4>
                                <h4> {!! html_entity_decode($faqheading->description) !!}</h4>
                                {{-- <h6 class="display-4">Our Investa Company Dedicated Team Member</h6> --}}
                        </div>
                        {{-- <div class="pb-5">
                    <h3 class="text-primary">FAQs</h3>
                    <h3 class="display-4">We are providing good services to our clients.</h3>
                </div> --}}
                        <div class="accordion bg-light rounded p-4" id="accordionExample">
                            @foreach ($faq as $index => $faq)
                                <div class="accordion-item border-0 mb-4">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button text-danger fs-5 rounded-top" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="false" aria-controls="collapse{{ $index }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {!! html_entity_decode($faq->answer) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="accordion-item border-0 mb-4">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed text-dark fs-5 rounded-top" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                What industries do you specialize in?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                              
                                <p>We understand how one idea can change the market and business graphs that is why we
                                    adhere to strict privacy policies.
                                    So, we take the client’s information secure with us.</p>
                            </div>
                        </div>
                    </div> --}}
                            {{-- <div class="accordion-item border-0 mb-4">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed text-dark fs-5 rounded-top" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Will I be getting regular updates of the app development progress?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                              
                                <p>Well, the time taken to create a website varies on several factors like - project
                                    scope, features and functionalities,
                                    the complexity of design, and more. If you want to get a quote, then contact us
                                    today!</p>
                            </div>
                        </div>
                    </div> --}}
                            {{-- <div class="accordion-item border-0 mb-0">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed text-dark fs-5 rounded-top" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                Can you work on my existing site?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                                
                                <p>Of course, we can! Let us know your
                                    requirements and our experts will help you with the right solution. Contact us now!
                                </p>
                            </div>
                        </div>
                    </div> --}}
                        </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- FAQ End -->

 
@endsection

@section('script')
@endsection
