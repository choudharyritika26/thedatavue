<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center  p-4 mt-2 justify-content-between">
        <a href="{{ route('admin.index') }}" class="logo d-flex align-items-center">
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h6><span class="d-none d-lg-block">TheDataVue Technologies</span></h6>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar --> --}}

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('admin/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                    {{-- <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span> --}}
                </a><!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->




    </ul>

</aside><!-- End Sidebar-->


<!-- ======= Sidebar ======= -->

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('slider-index') ? 'active' : '' }}"
                href="{{ route('slider-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Slider</span>
            </a>
        </li><!-- End Slider Nav -->


        <!-- Start About Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('about-index', 'aboutdetail-index', 'percentage-index', 'project-index') ? 'active' : '' }}"
                data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav"
                class="nav-content collapse {{ request()->routeIs('about-index', 'aboutdetail-index', 'percentage-index', 'project-index') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('about-index') }}"
                        class="{{ request()->routeIs('about-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('aboutdetail-index') }}"
                        class="{{ request()->routeIs('aboutdetail-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>About Detail</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('percentage-index') }}"
                        class="{{ request()->routeIs('percentage-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Language</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('project-index') }}"
                        class="{{ request()->routeIs('project-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Project</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('services-index', 'servicesdetails-index') ? 'active' : '' }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav"
                class="nav-content collapse {{ request()->routeIs('services-index', 'servicesdetails-index') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                {{-- <li>
            <a href="{{ route('servicescatagries-index') }}" class="{{ request()->routeIs('servicescatagries-index') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Services Category</span>
            </a>
        </li> --}}
                <li>
                    <a href="{{ route('services-index') }}"
                        class="{{ request()->routeIs('services-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('servicesdetails-index') }}"
                        class="{{ request()->routeIs('servicesdetails-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Services Detail</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('catagory-index', 'portfolio-index') ? 'active' : '' }}"
                data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Portfolio</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav"
                class="nav-content collapse {{ request()->routeIs('catagory-index', 'portfolio-index') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('catagory-index') }}"
                        class="{{ request()->routeIs('catagory-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Portfolio Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('portfolio-index') }}"
                        class="{{ request()->routeIs('portfolio-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Portfolio</span>
                    </a>
                </li>
                {{-- <li>
            <a href="{{ route('portfoliodetales-index') }}" class="{{ request()->routeIs('portfoliodetales-index') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Portfolio Detail</span>
            </a>
        </li>
        <li>
            <a href="{{ route('technology-index') }}" class="{{ request()->routeIs('technology-index') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Portfolio Technology</span>
            </a>
        </li> --}}
            </ul>
        </li>




        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('feedback-index') ? 'active' : '' }}" 
                href="{{ route('feedback-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Feedback</span>
            </a>
        </li><!-- End Feedback Nav -->
        

        {{-- <li class="nav-item">
            <a class="nav-link " href="{{ route('technology-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Technology</span>
            </a>
        </li><!-- End Portfolio Nav --> --}}

        {{-- <li class="nav-item">
            <a class="nav-link " href="{{ route('team-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Team</span>
            </a>
        </li><!-- End team Nav --> --}}

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('client-index') ? 'active' : '' }}" 
                href="{{ route('client-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Client</span>
            </a>
        </li><!-- End Client Nav -->
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('career-index') ? 'active' : '' }}" href="{{ route('career-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Career</span>
            </a>
        </li><!-- End client Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('contactus-index') ? 'active' : '' }} " href="{{ route('contactus-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Contact Us Footer</span>
            </a>
        </li><!-- End client Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('blog-index') ? 'active' : '' }}" href="{{ route('blog-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Blog</span>
            </a>
        </li><!-- End Blog Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('faq-index') ? 'active' : '' }} " href="{{ route('faq-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Faq's Question</span>
            </a>
        </li><!-- End Faq's Question Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('trainingtype-index') ? 'active' : '' }} " href="{{ route('trainingtype-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Training</span>
            </a>
        </li><!-- End Faq's Question Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('footer-copy-right-index') ? 'active' : '' }} "
                href="{{ route('footer-copy-right-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Footer Copy Right</span>
            </a>
        </li><!-- End Slider Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('qualification-index') ? 'active' : '' }} "
                href="{{ route('qualification-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Qualification</span>
            </a>
        </li><!-- End Slider Nav -->
        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('training-index', 'trainingtype-index') ? 'active' : 'collapsed' }}"
                data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Training</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse {{ request()->routeIs('training-index', 'trainingtype-index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{ route('trainingtype-index') }}" class="{{ request()->routeIs('trainingtype-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Training</span>
                    </a>
                </li>
                 
                <li>
                    <a href="{{ route('training-index') }}" class="{{ request()->routeIs('training-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Training Detail</span>
                    </a>
                </li>
               
            </ul>
        </li>
         --}}

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-bar-chart"></i><span>Faq's</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('faqheading-index') }}">
                  <i class="bi bi-circle"></i><span>Faq's</span>
                </a>
              </li>
              <li>
                <a href="{{ route('faq-index') }}">
                  <i class="bi bi-circle"></i><span>Faq's Question</span>
                </a>
              </li>
             
            </ul>
          </li><!-- End Charts Nav --> --}}

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('whychooseus-index', 'whychooseustypes-index') ? 'active' : 'collapsed' }}" 
                data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i>
                <span>Why Choose Us</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse {{ request()->routeIs('whychooseus-index', 'whychooseustypes-index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('whychooseus-index') }}" class="{{ request()->routeIs('whychooseus-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Why Choose Us Heading</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('whychooseustypes-index') }}" class="{{ request()->routeIs('whychooseustypes-index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Why Choose Us Types</span>
                    </a>
                </li>
            </ul>
        </li>
        

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('careercontact-index') ? 'active' : '' }} " href="{{ route('careercontact-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Job Application Form</span>
            </a>
        </li><!-- End Slider Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('contact-index') ? 'active' : '' }} " href="{{ route('contact-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span> Contact Form Detail</span>
            </a>
        </li><!-- End Slider Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('enquiry-index') ? 'active' : '' }} " href="{{ route('enquiry-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span> Enquiry Form Detail</span>
            </a>
        </li><!-- End Slider Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('trainingform-index') ? 'active' : '' }} " href="{{ route('trainingform-index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span> Training Form Detail</span>
            </a>
        </li><!-- End Slider Nav -->



        {{-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="icons-bootstrap.html">
                            <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-remix.html">
                            <i class="bi bi-circle"></i><span>Remix Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-boxicons.html">
                            <i class="bi bi-circle"></i><span>Boxicons</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav --> --}}


    </ul>

</aside><!-- End Sidebar-->


</aside><!-- End Sidebar-->
