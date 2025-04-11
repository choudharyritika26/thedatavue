<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Investa - Investment Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>The Data Vue</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @include('frontend.layout.partials.style')

    @yield('styles')

    
</head>

<body>

    {{-- MAIN NAVIGATION BAR --}}
    @include('frontend.layout.partials.header')

    {{-- MAIN CONTENT --}}
    <div class="main">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('frontend.layout.partials.footer')

    @include('frontend.layout.partials.script')

    @yield('script')
</body>

</html>