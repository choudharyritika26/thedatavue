<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-6 col-md-6 ">
                <div class="footer-item d-flex flex-column">
                    <div class="footer-item">
                        <h4 class="text-white mb-4"> <img src="{{ 'frontend/img/logo4.png' }}"
                                style="height:60px; width:100px" alt="Logo"> </h4>
                        <p style="font-family: Bell MT!important;">TheDataVue Technologies is a
                            Himachal (India) based company with a wealth of experience in Mobile &amp; Web Application
                            Development, Health IT Solutions, Security, Accountability &amp; Tracking, and Healthcare
                            Domains.</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item d-flex flex-column">
                    <h4 class="" style="font-family: Bell MT!important;">Useful Links</h4>
                    <a href="#" style="font-family: Bell MT!important;"></i>
                        Home</a>
                    <a href="#" style="font-family: Bell MT!important;"></i>
                        Services</a>
                    <a href="#" style="font-family: Bell MT!important;"></i>
                        About Us</a>
                    <a href="#" style="font-family: Bell MT!important;"></i>
                        Latest Projects</a>
                    {{-- <a href="#" style="font-family: Bell MT!important;" ></i> testimonial</a>
                    <a href="#" style="font-family: Bell MT!important;" ></i> Our Team</a> --}}
                    <a href="#" style="font-family: Bell MT!important;"></i>
                        Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item d-flex flex-column">
                    @foreach ($contact_us_detales as $contact_us_detale)
                    <h4 class="" style="font-family: Bell MT!important;">Contact Us</h4>
                    <p class="mb-3" style=" line-height:25px; font-family: Bell MT!important;">
                        {{-- Ground Floor, Ward, No. 4, Nangal Rd,
                        opp. Dell Showroom and Jagat Hospital, Una, Himachal Pradesh 174303 --}}
                        {!! html_entity_decode($contact_us_detale->address) !!}
                    </p>
                    {{-- <a href=""><i class="fa fa-map-marker-alt me-2"></i> Ground Floor, Ward, No. 4, Nangal Rd,
                        opp. Dell Showroom and Jagat Hospital, Una, Himachal Pradesh 174303</a> --}}
                    <a href="" style="font-family: Bell MT!important;"><i class="fas fa-envelope "></i> {{$contact_us_detale->email_id}}</a>
                    <a href="" style="font-family: Bell MT!important;"><i class="fas fa-phone me-2"></i> {{$contact_us_detale->phone_no}}</a>
                    @endforeach
                    <div class="d-flex align-items-center ">
                        <a class="btn btn-light btn-md-square me-2"
                            href="https://www.facebook.com/TheDataVueTechnologies/" target="-blank" title="facebook"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-md-square me-2" href="https://www.instagram.com/thedatavue/"
                            target="-blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-light btn-md-square me-0"
                            href="https://www.linkedin.com/company/thedatavue-technologies" target="-blank"
                            title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="copyright" style="text-align: center">
                © Copyright2022 &nbsp;<strong>TheDataVue Technologies.</strong> &nbsp;All Rights Reserved
            </div>

        </div>
    </div>
</div>
<!-- Copyright End -->
