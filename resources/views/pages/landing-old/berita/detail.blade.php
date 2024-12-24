@extends('layouts.landing.master')

@section('title',$berita->judul)

@section('content')
    <section class="main-blog-content">
        <div class="sec-shape">
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
            <span class="shape shape11"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape12"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
            <span class="shape shape13"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape14"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape15"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape16"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape17"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape18"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow right-animation" data-wow-delay="0.2s">
                    <div class="blog-page-content">
                        <div class="page-blog-post blog-post-detail">
                            <div class="blog-img-box">
                                <div class="blog-img back-img" style="background-image: url({{ asset('storage/berita/'.$berita->foto) }})">
                                    <div class="blog-date">
                                        <a href="javascript:void(0);" title="tanggal berita"><i class="fa fa-calendar" aria-hidden="true"></i>{{ date('d M Y',strtotime($berita->created_at)) }}</a>
                                        <a href="javascript:void(0);" class="by-admin" title="By Admin"><i class="fa fa-user" aria-hidden="true"></i>Admin</a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="h3-title">{{ $berita->judul }}</h3>
                            <div class="page-blog-text">
                                {!! $berita->isi !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow left-animation" data-wow-delay="0.2s">
                    <div class="blog-sidebar wow left-animation" data-wow-delay="0.2s">
                        <div class="recent-post">
                            <h3 class="sidebar-title">Berita Terbaru</h3>

                            @foreach($beritas as $berita)
                                <div class="recent-post-box">
                                    <div class="recent-post-img back-img" style="background-image:url({{ asset('storage/berita/'.$berita->foto) }})"></div>
                                    <div class="recent-post-text">
                                        <h6><a href="{{ route('landing.detail.berita',['slug' => $berita->slug_judul]) }}">{{ $berita->judul }}</a></h6>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ date('d M Y',strtotime($berita->created_at)) }} </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
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
