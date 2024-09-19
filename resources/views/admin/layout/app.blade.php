<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TheDataVue-Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<title>Attendance-App</title>
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
@include('admin.layout.partials.style')

@yield('styles')




</head>
<body>

{{-- MAIN NAVIGATION BAR --}}
@include('admin.layout.partials.header')

{{-- MAIN CONTENT --}}
<div class="main">
    @yield('content')
</div>

{{-- FOOTER --}}
@include('admin.layout.partials.footer')

@include('admin.layout.partials.script')

@yield('script')

</body>
