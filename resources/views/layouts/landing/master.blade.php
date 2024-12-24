<!DOCTYPE html>
<html lang="en-us" class="no-js">
<head>
    @include('layouts.landing.partials.meta')
    @include('layouts.landing.partials.link')
    @yield('link')
</head>
<body>
    {{-- <div class="onloadpage" id="page-load">
        <div class="loader-div">
            <div class="on-img">
                <img src="{{ asset('app-assets/landing-new/images/loader.gif') }}" alt="Logo" class="img-fluid" />
                <span>Loading Please Wait...</span>
            </div>
        </div>
    </div> --}}

    @include('layouts.landing.partials.navbar')
    @yield('content')
    @include('layouts.landing.partials.footer')
    @include('layouts.landing.partials.script')
    @yield('script')
</body>
</html>