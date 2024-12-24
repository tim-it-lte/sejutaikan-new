@extends('layouts.landing.master')

@section('title','Berita')

@section('content')
    <section class="main-our-blog page-our-blog mt-5">
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
        </div>
        <div class="container">
            <div class="blog-list wow fadeup-animation" data-wow-delay="0.2s">
                <div class="row">

                    @foreach($beritas as $berita)
                        <div class="col-lg-6">
                            <div class="blog-box">
                                <div class="blog-img-box">
                                    <div class="blog-img back-img" style="background-image: url({{ asset('storage/berita/'.$berita->foto) }});">
                                    </div>
                                    <div class="blog-date">
                                        <a href="javascript:void(0);" title="Tanggal Berita"><i class="fa fa-calendar" aria-hidden="true"></i>{{ date('d M Y',strtotime($berita->created_at)) }} / Admin</a>
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <h3 class="h3-title"><a href="{{ route('landing.detail.berita',['slug' => $berita->slug_judul]) }}" title="Judul Berita">{{ $berita->judul }}</a></h3>
                                    <a href="{{ route('landing.detail.berita',['slug' => $berita->slug_judul]) }}" title="Selengkapnya">Selengkapnya <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <div class="blog-pagination">
                        <div class="d-flex justify-content-center">
                            {!! $beritas->links() !!}
                        </div>
                    </div>
                </div>
            </div> --}}
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
