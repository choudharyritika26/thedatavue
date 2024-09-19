@extends('frontend.layout.app')

@section('style')
@endsection

@section('content')
    <!-- FAQs Start -->
    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="pb-5">
                        <h4 class="text-primary">FAQs</h4>
                        <h3 class="display-4">We are providing good services to our clients.</h3>
                    </div>
                    <div class="accordion bg-light rounded p-4" id="accordionExample">
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button text-dark fs-5 fw-bold rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseTOne">
                                    How do you communicate with your clients?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>The best part of choosing us is we stay 24/7 available for our clients.
                                        Regardless of the time, we never miss communicating with our clients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    What industries do you specialize in?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>We understand how one idea can change the market and business graphs that is why we
                                        adhere to strict privacy policies.
                                        So, we take the client’s information secure with us.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Will I be getting regular updates of the app development progress?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>Well, the time taken to create a website varies on several factors like - project
                                        scope, features and functionalities,
                                        the complexity of design, and more. If you want to get a quote, then contact us
                                        today!</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Can you work on my existing site?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    {{-- <h5>Dolor sit amet consectetur adipisicing elit.</h5> --}}
                                    <p>Of course, we can! Let us know your
                                        requirements and our experts will help you with the right solution. Contact us now!
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Which technologies does TheDataVue specialize in?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    
                                    <p>We love technologies! We have tremendous experience working on different tech stacks
                                        like - JavaScript, Laravel, Android, React JS,
                                        Node.js, PHP, Laravel, CodeIgniter, API, and more on the technologies page.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    What type of UX/UI services do you offer
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    
                                    <p>We offer a wide range of UX/UI services such as - custom web design, interface design
                                        for mobile apps, e-commerce app design,
                                        iOS, and Android App Designs, logo and brand design services, and more.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    What is your design process?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                   
                                    <p>Our design process begins with having an understanding of the project. Once the
                                        designers get an overview, we divide the design process into different milestones
                                        that include - research, wireframing, visual mockups,
                                        and more. We ensure that client’s feedback is taken from time to time.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-0">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                    Why do I need SEO services?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    
                                    <p>Without SEO, finding a website in any business sector would be exceptionally
                                        difficult via search engines. You can optimise your website to bring
                                        in the most relevant traffic, and the mostrelevant audiences time and time again.
                                    </p>
                                </div>
                            </div>
                        </div>
                         --}}

                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="faq-img RotateMoveRight rounded">
                        <img src="{{ 'frontend/img/faq-img.jpg' }}" class="img-fluid rounded w-100" alt="Image">
                        {{-- <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5" href="#">Read More Q & A
                            <i class="fas fa-arrow-right ms-2"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->
@endsection

@section('script')
@endsection
