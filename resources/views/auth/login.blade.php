<!doctype html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('app-assets/dashboard/css/bootstrap.min.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('app-assets/dashboard/css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('app-assets/dashboard/css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('app-assets/dashboard/css/responsive.css') }}">
   </head>
   <body>
      <!-- loader Start -->
      {{-- <div id="loading">
         <div id="loading-center">
         </div>
      </div> --}}
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container sign-in-page-bg mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                            <img src="{{ asset('app-assets/landing/assets/images/logo.png') }}" alt="dprd" style="width: 50%; filter: drop-shadow(3px 10px 4px black);">
                            <br><br><br><br><br><br>
                            <h2 class="mb-0" style="filter: drop-shadow(3px 10px 4px black); color: white;">UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</h2>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                            <h1 class="mb-0 mt-4">Login</h1>
                            <form class="mt-4" action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" placeholder="Email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="d-flex justify-content-end">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Ingat Saya</label>
                                    </div>
                                </div> --}}
                                <div class="my-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-11 col-lg-10">
                                        <p class="text-center">Belum memiliki akun? Silahkan memilih menu <strong>Register</strong> di bawah.</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                                </div>
                                {{-- <div class="alert alert-danger mt-3" role="alert">
                                    <p style="font-style: italic;">
                                        Jika belum memiliki akun silahkan melakukan tahap registrasi <strong><a href="{{ route('register') }}">Disini</a></strong>.
                                    </p>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('app-assets/dashboard/js/jquery.min.js') }}"></script>
      <script src="{{ asset('app-assets/dashboard/js/popper.min.js') }}"></script>
      <script src="{{ asset('app-assets/dashboard/js/bootstrap.min.js') }}"></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/jquery.appear.js') }}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/countdown.min.js') }}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/waypoints.min.js') }}"></script>
      <script src="{{ asset('app-assets/dashboard/js/jquery.counterup.min.js') }}"></script>
      <!-- Wow JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/wow.min.js') }}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/apexcharts.js') }}"></script>
      <!-- Slick JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/slick.min.js') }}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/select2.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/smooth-scrollbar.js') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/chart-custom.js') }}"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('app-assets/dashboard/js/custom.js') }}"></script>
   </body>
</html>