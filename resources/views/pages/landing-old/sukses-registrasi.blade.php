@extends('layouts.landing.master')

@section('title','Registrasi')

@section('content')
    <section class="main-contact inner-page-contact mt-5">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <center>
                    <img src="{{ asset('app-assets/thanks.png') }}" style="width:30%" alt="">
                    <h3>Terima Kasih. Anda berhasil melakukan registrasi. <br>
                    <br> UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel </h3>

                    <div class="alert alert-success mt-3" role="alert">
                        <p style="font-style: italic;">
                            Silahkan melakukan login <strong><a href="{{ route('login') }}">Disini</a></strong>
                        </p>
                    </div>
                </center>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $("#alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-success").slideUp(500);
        });

        $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-danger").slideUp(500);
        });
    </script>
@endsection
