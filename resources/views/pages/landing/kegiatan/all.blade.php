@extends('layouts.landing.master')

@section('title','Berita')

@section('content')
	<div class="r-bg-a pt85 pb120">
        <div class="container w-992">
            <div class="row pt80">
                <div class="col-lg-12">
                    <div class="page-headings text-center">
                        <ul class="breadcrus mb20">
                            <li class="bread-non"><a href="{{ route('/') }}">Beranda</a></li>
                            <li>&nbsp;/&nbsp;</li>
                            <li class="bread-active"><a href="#">Kegiatan</a></li>
                        </ul>
                        <h1>Daftar Kegiatan</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="main-our-blog page-our-blog py-5">
        {{-- <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape3"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape4"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape5"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape6"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
            <span class="shape shape7"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape8"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape9"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape10"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
        </div> --}}
        <div class="container">
            <div class="blog-list wow fadeup-animation" data-wow-delay="0.2s">
                <div class="row">

                    @foreach($kegiatanList as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="half-blog-card">
                                <div class="half-blog-img">
                                	<img src="{{ asset('storage/berita/'.$item->foto) }}" alt="{{ $item->judul }}">
                                </div>
                                <div class="half-blog-content">
                                    <h3><a href="{{ route('landing.detail.berita',['slug' => $item->slug_judul]) }}" title="Judul Berita">{{ $item->judul }}</a></h3>
                                    <p class="flex align-items-center mb-4">
                                    	<i class="fa fa-calendar" aria-hidden="true"></i>
                                    	<small><b> {{ date('d M Y',strtotime($item->created_at)) }} / Admin</b></small>
                                    </p>
                                    <p class="mb-4">{!! \Illuminate\Support\Str::limit($item->isi, 150, $end='...') !!}</p>
                                    <div>
                                    	<a class="text-danger stretched-link" href="{{ route('landing.detail.kegiatan',['slug' => $item->slug_judul]) }}" title="Selengkapnya">Selengkapnya <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
