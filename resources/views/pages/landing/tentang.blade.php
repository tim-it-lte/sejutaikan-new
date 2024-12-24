@extends('layouts.landing.master')

@section('title','Tentang')

@section('content')
    <div class="r-bg-a pt85 pb120">
        <div class="container w-992">
            <div class="row pt80">
                <div class="col-lg-12">
                    <div class="page-headings text-center">
                        <ul class="breadcrus mb20">
                            <li class="bread-non"><a href="{{ route('/') }}">Beranda</a></li>
                            <li>&nbsp;/&nbsp;</li>
                            <li class="bread-active"><a href="#">Tentang</a></li>
                        </ul>
                        <h1>Tentang</h1>
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
                            <img src="{{ asset('tentang-1.jpeg') }}" alt="tentang" style="width: 100%;" class="mb-4">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sol-img mt60"></div>
                        <div class="ree-blog-details">
                            <img src="{{ asset('tentang-2.jpeg') }}" alt="tentang" style="width: 100%;" class="mb-4">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sol-img mt60"></div>
                        <div class="ree-blog-details">
                            <img src="{{ asset('tentang-3.jpeg') }}" alt="tentang" style="width: 100%;" class="mb-4">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sol-img mt60"></div>
                        <div class="ree-blog-details">
                            <img src="{{ asset('tentang-4.jpeg') }}" alt="tentang" style="width: 100%;" class="mb-4">
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

