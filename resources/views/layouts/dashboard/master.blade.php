<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.dashboard.partials.meta')
    @include('layouts.dashboard.partials.link')
    @yield('style')
</head>
<body>
    <!-- loader Start -->
    {{-- <div id="loading">
        <div id="loading-center">
        </div>
    </div> --}}
    <!-- loader END -->

    <div class="wrapper">
        @include('layouts.dashboard.partials.sidebar')
        <div id="content-page" class="content-page">
            @include('layouts.dashboard.partials.header')
            @yield('content')
            @include('layouts.dashboard.partials.footer')
        </div>
    </div>
    @include('layouts.dashboard.partials.script')
    @yield('script')
</body>
</html>
