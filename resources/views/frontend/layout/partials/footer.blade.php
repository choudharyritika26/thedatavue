<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-6 col-md-6 ">
                <div class="footer-item d-flex flex-column">
                    <div class="footer-item">
                        @foreach ($contact_us_detales as $contact_us_detale)
                            <h4 class="text-white mb-4"> <img src="{{ asset('storage/' . $contact_us_detale->image) }}"
                                    style="height:80px; width:150px" alt="Logo"> </h4>
                            <p class="text-white">TheDataVue Technologies is a
                                Himachal (India) based company with a wealth of experience in Mobile &amp; Web
                                Application
                                Development, Health IT Solutions, Security, Accountability &amp; Tracking, and
                                Healthcare
                                Domains.</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item d-flex flex-column">
                    <h4 style="font-family: Bell MT!important; color:var(--bs-danger) !important;">Useful
                        Links</h4>
                    <a class="text-white" href="{{ route('frontend.index') }}"></i>
                        Home</a>
                    <a class="text-white" href="{{ route('frontend.about') }}"></i>
                        About Us</a>
                    <a class="text-white" href="{{ route('frontend.career') }}"></i>
                        Career</a>
                    <a class="text-white" href="{{ route('frontend.blog') }}"></i>
                        Blog</a>
 
                    {{-- <a href="#"  ></i> testimonial</a>
                    <a href="#"  ></i> Our Team</a> --}}
                    <a class="text-white" href="{{ route('frontend.contact') }}"></i>
                        Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item d-flex flex-column">
                    @foreach ($contact_us_detales as $contact_us_detale)
                        <h4 style="font-family: Bell MT!important; color:var(--bs-danger)  !important;">
                            Contact Us</h4>
                        <p class="mb-3 text-white" style=" line-height:25px; font-family: Bell MT!important;">
                            {{-- Ground Floor, Ward, No. 4, Nangal Rd,
                        opp. Dell Showroom and Jagat Hospital, Una, Himachal Pradesh 174303 --}}
                            {!! html_entity_decode($contact_us_detale->address) !!}
                        </p>
                        {{-- <a href=""><i class="fa fa-map-marker-alt me-2"></i> Ground Floor, Ward, No. 4, Nangal Rd,
                        opp. Dell Showroom and Jagat Hospital, Una, Himachal Pradesh 174303</a> --}}
                        <a class="text-white" href=""><i class="fas fa-envelope  me-2"></i>
                            {{ $contact_us_detale->email_id }}</a>
                        <a class="text-white" href=""><i class="fa fa-phone me-2" style="font-size:20px"></i>
                            <span>+ 91
                                {{ $contact_us_detale->phone_no }}</span></a>
                    @endforeach
                    <div class="d-flex align-items-center p-2  ">
                        <a class="btn btn-light btn-md-square me-2"
                            href="https://www.facebook.com/TheDataVueTechnologies/" target="-blank" title="facebook"><i
                                class="fab fa-facebook-f" style="font-size:25px"></i></a>
 
                        <a class="btn btn-light btn-md-square me-2" href="https://www.instagram.com/thedatavue/"
                            target="-blank"><i class="fab fa-instagram" style="font-size:25px"></i></a>
 
                        <a class="btn btn-light btn-md-square me-0"
                            href="https://www.linkedin.com/company/thedatavue-technologies" target="-blank"
                            title="linkedin"><i class="fab fa-linkedin-in" style="font-size:25px"></i></a>
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>
 
<!-- Footer End -->
 
<!-- Copyright Start -->
<div class="container-fluid copyright py-4 ">
    <div class="container">
        <div class="row g-4 align-items-center ">
            <div style="text-align: center">
                {{-- © Copyright2022 &nbsp;<strong>TheDataVue Technologies.</strong> &nbsp;All Rights Reserved --}}
                @foreach ($footercopyright as $item)
                    {!! html_entity_decode($item->description) !!}
                @endforeach
            </div>
 
        </div>
    </div>
</div>a
<!-- Copyright End -->