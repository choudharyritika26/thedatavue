<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">TheDataVue</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
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
        <a class="nav-link " href="{{route('admin.index')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('slider-index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Slider</span>
        </a>
      </li><!-- End Slider Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('about-index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>About</span>
        </a>
      </li><!-- End About Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('services-index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Services</span>
        </a>
      </li><!-- End Services Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('portfolio-index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Portfolio</span>
        </a>
      </li><!-- End Portfolio Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('team-index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Team</span>
        </a>
      </li><!-- End team Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('client-index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Client</span>
        </a>
      </li><!-- End client Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>FAQ's</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Heading</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Question</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      
    </ul>

  </aside><!-- End Sidebar-->
