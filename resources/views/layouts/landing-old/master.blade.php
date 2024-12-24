<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>@yield('title')</title>
    @include('layouts.landing.partials.meta')
    @include('layouts.landing.partials.link')
    @yield('link')
</head>
<body class="home">
    <div class="main">
        @include('layouts.landing.partials.navbar')
        @yield('content')
        @include('layouts.landing.partials.footer')
        <!-- Scroll To Top Start -->
        <a href="#main-banner" class="scroll-top" id="scroll-to-top">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a>
        <!-- Scroll To Top End-->

        <!-- Bubbles Animation Start -->
        <div class="bubbles_wrap">
            <div class="bubble x1"></div>
            <div class="bubble x2"></div>
            <div class="bubble x3"></div>
            <div class="bubble x4"></div>
            <div class="bubble x5"></div>
            <div class="bubble x6"></div>
            <div class="bubble x7"></div>
            <div class="bubble x8"></div>
            <div class="bubble x9"></div>
            <div class="bubble x10"></div>
        </div>
        <!-- Bubbles Animation End-->
    </div>
    @include('layouts.landing.partials.script')
    @yield('script')
</body>
</html>