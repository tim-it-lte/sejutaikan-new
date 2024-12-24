@extends('layouts.landing.master')

@section('title','Registrasi')

@section('content')
    <div class="r-bg-a pt85 pb120">
        <div class="container w-992">
            <div class="row pt80">
                <div class="col-lg-12">
                    <div class="page-headings text-center">
                        <ul class="breadcrus mb20">
                            <li class="bread-non"><a href="{{ route('/') }}">Beranda</a></li>
                            <li>&nbsp;/&nbsp;</li>
                            <li class="bread-active"><a href="#">Register</a></li>
                        </ul>
                        <h1>Sukses Registrasi</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="r-bg-x pb120">
        <div class="container w-992">
            <div class="blog-details">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sol-img mt60"></div>
                        <div class="ree-blog-details">
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
                </div>
            </div>
        </div>
    </div>
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
