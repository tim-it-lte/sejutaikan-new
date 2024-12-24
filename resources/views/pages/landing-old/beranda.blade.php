@extends('layouts.landing.master')

@section('title','Beranda')

@section('link')
    {{-- ikan1 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/landing/fish/style1.css') }}">
    {{-- end ikan --}}

    {{-- ikan2 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/landing/fish/style2.css') }}">
    {{-- end ikan --}}
@endsection

@section('content')
    <!-- Banner Start -->
    <section class="main-banner" id="main-banner">
        <div class="sec-shape">
            <span class="shape shape1 animate-this"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape2 animate-this"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape3 animate-this"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape4 animate-this "><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape5 animate-this"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-banner-slider wow fadeup-animation" data-wow-delay="0.6s">
                        <div class="banner-slider">
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide4.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide1.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/banner-img1.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide2.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide3.jpg') }});"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="banner-content">
                        <span class="sub-title wow fadeup-animation" data-wow-delay="0.4s" style="font-size: 30px; text-transform: capitalize;">selamat datang <span style="text-transform: lowercase;">di e-</span>Sejutaikan</span>
                        {{-- <h1 class="h1-title wow fadeup-animation" data-wow-delay="0.5s">Sertifikat Hasil Pengujian Produk Perikanan</h1> --}}
                        <p class="wow fadeup-animation" data-wow-delay="0.6s" style="color: black; font-size: 27px;">Sertifikat Hasil Pengujian Produk Perikanan </p>

                        <p class="wow fadeup-animation" data-wow-delay="0.6s" style="color: black; font-size: 27px;"><b>UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</b></p>
                        <div class="banner-call wow fadeup-animation" data-wow-delay="0.8s">
                            <a href="https://api.whatsapp.com/send?phone=+6281244962783&text=Assalamualaikum" title="081 244 962 783"><span class="icon"><img src="{{ asset('app-assets/landing/assets/images/call-icon.png') }}" alt="Call Icon"></span>Customer Service:<span>081 244 962 783</span></a>
                        </div>
                    </div>

                    {{-- ikan --}}
                    {{-- <div class="d-none d-sm-block">
                        @include('layouts.landing.fish.fish-style1')
                    </div> --}}
                    {{-- end ikan --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <section>

        <div id="carouselExampleControls" class="carousel slide mb-5 d-md-none d-lg-none d-xl-none" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('app-assets/landing/assets/images/slide4.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('app-assets/landing/assets/images/slide1.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('app-assets/landing/assets/images/slide2.jpg') }}" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('app-assets/landing/assets/images/slide3.jpg') }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 col-12" style="text-align: center;">
                    <img src="{{ asset('pbaru.jpg') }}" alt="image" style="width: 100%; border-radius: 20px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Start -->
    <section class="main-services">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape3 "><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape4"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="center-title">
                        <h2 class="h2-title">LAYANAN</h2>
                    </div>
                </div>
            </div>
            <div class="services-list">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <a href="{{ route('register') }}">
                            <div class="service-box wow fadeup-animation" data-wow-delay="0.4s">
                                <div class="service-box-text">
                                    <div class="service-img">
                                        <img src="{{ asset('app-assets/landing/assets/images/registrasi.png') }}" alt="registrasi" style="max-width: 150px;">
                                    </div>
                                    <h3 class="h3-title">Registrasi</h3>
                                    <p>Silahkan melakukan registrasi untuk Permohonan Pengujian Sampel apabila sudah memiliki akun silahkan login </p><a class="btn btn-sm btn-success mt-2" style="background-color: #55B38C;" href="{{ route('login') }}">disini</a>.
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-xl-3 col-lg-4 col-md-6">
                        <a href="{{ route('landing.permohonan-pengujian') }}">
                            <div class="service-box wow fadeup-animation" data-wow-delay="0.5s">
                                <div class="service-box-text">
                                    <div class="service-img">
                                        <img src="{{ asset('app-assets/landing/assets/images/idea-research.png') }}" alt="Pengajuan Pengujian Sampel" style="max-width: 150px;">
                                    </div>
                                    <h3 class="h3-title">Permohonan Pengujian Sampel</h3>
                                    <p>Ajukan Pengujian Sampel Dengan Mudah.</p>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <a href="{{ route('landing.pantau-permohonan') }}">
                            <div class="service-box wow fadeup-animation" data-wow-delay="0.6s">
                                <div class="service-box-text">
                                    <div class="service-img">
                                        <img src="{{ asset('app-assets/landing/assets/images/pantau.png') }}" alt="Pantau Status Pengajuan" style="max-width: 150px;">
                                    </div>
                                    <h3 class="h3-title">Pantau Status Permohonan</h3>
                                    <p>Pantau Status Permohonan dengan Efisien dan mudah tanpa bertemu langsung.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <a href="">
                            <div class="service-box wow fadeup-animation" data-wow-delay="0.9s">
                                <div class="service-box-text">
                                    <div class="service-img">
                                        <img src="{{ asset('app-assets/landing/assets/images/support.png') }}" alt="24x7 Support">
                                    </div>
                                    <h3 class="h3-title">Customer Service</h3>
                                    <p>Customer Service yang ramah siap melayani anda dengan cepat ketika mengalami kendala terhadap sistem.<br><br></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <a href="{{ asset('panduan-permohonan.pdf') }}" target="_blank">
                            <div class="service-box wow fadeup-animation" data-wow-delay="0.9s">
                                <div class="service-box-text">
                                    <div class="service-img">
                                        <img src="{{ asset('app-assets/landing/assets/images/book.png') }}" alt="24x7 Support">
                                    </div>
                                    <h3 class="h3-title">Panduan Permohonan</h3>
                                    <p>Download Panduan Tata Cara mengajukan permohonan pengujian.<br><br></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->

    {{-- <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="center-title">
                <h2 class="h2-title">SOP</h2>
            </div>
            <div class="row mb-5">
                <div class="col-md-3 col-12"></div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/sop.jpg') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                </div>
                <div class="col-md-3 col-12"></div>
            </div>
        </div>
    </section> --}}

    <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 col-12" style="text-align: center;">
                    <img src="{{ asset('app-assets/landing/assets/images/sampel.jpg') }}" alt="image" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="center-title">
                <h2 class="h2-title">Prosedur Pelayanan</h2>
            </div>
            <div class="row mb-5">
                {{-- <div class="col-md-3 col-12"></div> --}}
                <div class="col-md-6 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/prosedur.jpeg') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/sop.jpg') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                </div>
                {{-- <div class="col-md-3 col-12"></div> --}}
            </div>
        </div>
    </section>

    <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="center-title">
                <h2 class="h2-title">MAKLUMAT PELAYANAN</h2>
            </div>
            <div class="row mb-5">
                <div class="col-md-3 col-12"></div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/maklumat.jpg') }}" alt="maklumat" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                </div>
                <div class="col-md-3 col-12"></div>
            </div>
        </div>
    </section>

    <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="center-title">
                <h2 class="h2-title">CAPAIAN PENGHARGAAN</h2>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 col-12"></div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/capaian1.png') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                    <h6 class="mt-3" style="color: black; text-align: center;">ANUGERAH PENGHARGAAN TOP 40 TAHUN 2018 OLEH KEMENPAN-RB</h6>
                </div>
                <div class="col-md-4 col-12"></div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/capaian2.png') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%; height: 250px;">
                    <h6 class="mt-3" style="color: black; text-align: center;">PIAGAM PENGHARGAAN TOP 99 TAHUN 2018 OLEH KEMENPAN-RB</h6>
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/capaian3.png') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%; height: 250px;">
                    <h6 class="mt-3" style="color: black; text-align: center;">PIAGAM PENGHARGAAN TOP 20 TAHUN 2018 OLEH GUBERNUR SULAWESI SELATAN</h6>
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/capaian4.png') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%; height: 250px;">
                    <h6 class="mt-3" style="color: black; text-align: center;">SERTIFIKAT ISO/IEC 17065:2012</h6>
                </div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/capaian5.png') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%; height: 250px;">
                    <h6 class="mt-3" style="color: black; text-align: center;">SERTIFIKAT ISO/IEC 17025:2017</h6>
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/capaian6.png') }}" alt="sop" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%; height: 250px;">
                    <h6 class="mt-3" style="color: black; text-align: center;">SERTIFIKAT ISO 9001:2015</h6>
                </div>
                <div class="col-md-2 col-12"></div>
            </div>
        </div>
    </section>

    <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="center-title">
                <h2 class="h2-title">PENGADUAN</h2>
            </div>
            <div class="row mb-5">
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/pengaduan1.jpg') }}" alt="pengaduan" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%; height: 600px;">
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/pengaduan2.jpg') }}" alt="pengaduan" style="filter: drop-shadow(10px 10px 4px #777777); width: 100%; height: 600px;">
                </div>
                <div class="col-md-2 col-12"></div>
            </div>
        </div>
    </section>

    <!-- About Us Start -->
    {{-- <section class="main-about-us">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row" id="about-us">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="about-content wow right-animation" data-wow-delay="0.4s">
                        <span class="sub-title">TENTANG KAMI</span>
                        <h2 class="h2-title">UPT Balai Penerapan Mutu Produk Perikanan DKP Provinsi Sulawesi Selatan</h2>
                        <h3 class="h3-title">Visi</h3>
                        <div class="about-text">
                            <p>Sulawesi Selatan yang Inovatif, Produktif, Kompotetif, Inklusif dan Berkarakter.</p>
                        </div>
                        <h3 class="h3-title">Misi</h3>
                        <ul>
                            <li style="color: #777777 !important;">
                                Pemerintah yang berorieantasi melayani, Inovatif, dan Berkarakter.
                            </li>
                            <li style="color: #777777 !important;">
                                Peningkatan Infrastruktur yang berkualitas dan aksesibel.
                            </li>
                            <li style="color: #777777 !important;">
                                Pembangunan pusat-pusat pertumbuhan ekonomi baru yang produktif.
                            </li>
                            <li style="color: #777777 !important;">
                                Pembangunan manusia yang kompetitif dan Inklusif.
                            </li>
                            <li style="color: #777777 !important;">
                                Peningkatan produktifitas dan daya saing Produk Sumber Daya Alam yang berkelanjutan.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 wow left-animation" data-wow-delay="0.4s">
                    <img src="{{ asset('app-assets/landing/assets/images/sampel.jpg') }}" alt="gambar" class="mt-5" style="filter: drop-shadow(10px 10px 4px #777777); margin-top: 200px !important; height: 400px;">
                </div>
            </div>
        </div>
    </section> --}}
    <!-- About Us End -->

    <!-- Testimonial Start -->
    <section class="main-testimonial">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape3 "><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape4"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow right-animation" data-wow-delay="0.4s">
                    <div class="testimonial-img-box">
                        <span class="testimonial-img-circle"></span>
                        <div class="testimonial-img">
                            <img width="501" height="662" src="{{ asset('app-assets/landing/assets/images/surveyor.png') }}" alt="survey" class="mb-5">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-content wow left-animation" data-wow-delay="0.4s">
                        <h2 class="h2-title">Survei Kepuasan Masyarakat</h2>
                        <div class="">
                            <div class="">
                                <div class="testimonial-box">
                                    <div class="testimonial-text">
                                        <p style="font-size: 15px;">Pemerintah berupaya meningkatkan kualitas pelayanan masyarakat demi tercapainya harapan dan tuntutan publik sesuai Keputusan Menteri Pendayagunaan Aparatur Negara Nomor 14 Tahun 2017 tentang Pedoman Umum Penyusunan Survei Kepuasan Masyarakat Unit Penyelenggara Pelayanan Publik. Mengacu pada hal tersebut, maka Tim Survei dan Pengolah Data Survei Kepuasan Masyarakat (SKM) UPT BPMPP telah melakukan pengukuran Survei Kepuasaan Masyarakat terhadap pelayanan Pengujian Hasil Perikanan</p>
                                    </div>
                                    <a href="{{ route('landing.survei') }}">
                                        <button name="submit" type="submit" value="Submit" class="sec-btn mt-4"><span>Mulai Survei</span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->

    <section class="main-contact">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="center-title">
                <span class="sub-title" id="peraturan">Peraturan</span>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/peraturan1.png') }}" alt="peraturan" style="filter: drop-shadow(10px 10px 4px #777777);">
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/peraturan2.png') }}" alt="peraturan" style="filter: drop-shadow(10px 10px 4px #777777);">
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/peraturan3.png') }}" alt="peraturan" style="filter: drop-shadow(10px 10px 4px #777777);">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 col-6">
                    <h6>SASARAN MUTU TAHUN 2021</h6>
                    <ol>
                        <li>Balai Penerapan Mutu Produk Perikanan menerapkan sistem manajemen mutu dan memberikan pelayanan yang cepat, tepat dan akurat</li>
                        <li>Meningkatnya kepuasan pelanggan pelayanan hasil pengujian minimal ditinjau setahun sekali dengan rata-rata kepuasan klien 80% dari semua item yang diukur</li>
                        <li>Meningkatnya pemahaman personel terkait sistem manajemen SNI IS/IEC 17025:2017 dan meningkatkannya pemahaman personel terkait dokumen personel operasional sistem mutu level II s/d Level IV dan dapat menerapkan kebijakan serta prosedur dalam pekerjaan hingga mencapai 75%</li>
                        <li>Jumlah temuan ketidaksesuaian asesmen kategori 1 adalah 0</li>
                        <li>Semua hasil uji banding dan uji profisiensi diperoleh dengan nilai │z-score│≤ 2 atau dikategorikan memuaskan</li>
                        <li>Ketidaksesuaian pengujian dapat dikendalikan hingga mencapai 100% dan dilakukan tindakan perbaikan serta tindakan pencegahan bila potensi terjadi kembali</li>
                        <li>LSPro-HP Makassar dalam memberikan pelayanan sertifikasi senantiasa:</li>
                        <li>Berkomitmen menjadi lembaga sertifikasi produk yang konsisten dalam menjaga ketidakberpihakan dan independensi dalam bidang sertifikasi berdasarkan SNI ISO/IEC.17065 : 2012</li>
                        <li>Berusaha memperbaiki, menyempurnakan sistem mutu dan meningkatkan kemampuan sumber daya di LSPro-HP Makassar</li>
                        <li>Memastikan semua personil kompeten dan memahami dokumentasi sistem mutu dan menerapkan kebijakan serta prosedur dalam pekerjaan mereka.</li>
                        <li>Mengacu pada standar produk yang relevan dan dilaksanakan dengan prinsip efektifitas dan efesiensi diakui oleh stakeholder. Senantiasa berkomitmen untuk bersesuaian dengan standar SNI ISO/IEC 17065 :2012 dalam meningkatkan efektivitas system manajemen Lembaga sertifikasi produk secara berkelanjutan.</li>
                    </ol>
                </div>
                <div class="col-md-6 col-6">
                    <h6>KEBIJAKAN MUTU TAHUN 2021</h6>
                    <ol>
                        Balai Pengujian Mutu Produk Perikanan dalam memberikan pelayanan pengujian dan  pelayanan sertifikasi senantiasa:
                        <li>Melaksanakan Pelayanan secara profesional, cepat, tepat, dan akurat dengan inovasi terdepan serta senantiasa menjaga ketidakberpihakandalam melayani kepuasan pelanggan</li>
                        <li>Meningkatkan standar pelayanan pengujian dan sertifikasi yang mengacu pada ISO/IEC 17025:2017</li>
                        <li>Menerapkan Kebijakan dan prosedur system manajemen mutu sesuai standar ISO/IEC 17025:2017</li>
                        <li>Meningkatkan kompetensi personel dalam memahami dokumentasi system manajemen mutu sesuai standar ISO/IEC 17025:2017</li>
                        <li>Meningkatkan efektifitas system manajemen mutu secara berkelanjutan terhadap penerapan ISO/IEC 17025:2017</li>
                        <li>Berkomitmen menjadi lembaga sertifikasi produk yang profesional, independen, bertanggung jawab transparan dan cepat tanggap terhadap keluhan klien</li>
                        <li>Meningkatkan kemampuan dan profesionalisme semua personel dalm menerapkan kebijakan prosedur serta skema sertifikasi</li>
                        <li>Menetapkan system manajemen mutu secara berkelanjutan sesuai ruang lingkup kegiatan sertifikasi berdasarkan SNI ISO/IEC 17065: 2012</li>
                        <li>Memberikan jaminan mutu dan keamanan hasil perikanan terhadap produk yang disertifikasi sesuai SNI</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="main-team">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape3 "><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape4"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="center-title">
                        <span class="sub-title" id="team">Kegiatan</span>
                        {{-- <h2 class="h2-title">Our Expertise</h2> --}}
                    </div>
                </div>
            </div>
            <div class="main-team-sider wow fadeup-animation" data-wow-delay="0.4s">
                <div class="row team-slider">
                    <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-img-box">
                               {{--  <div class="team-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/kegiatan1.png') }});"></div> --}}
                               <img class="team-img" src="{{ asset('app-assets/landing/assets/images/kegiatan2.jpg') }}" alt="" style="width: 100%; height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-img-box">
                               {{--  <div class="team-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/kegiatan1.png') }});"></div> --}}
                               <img class="team-img" src="{{ asset('app-assets/landing/assets/images/kegiatan3.png') }}" alt="" style="width: 100%; height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-img-box">
                               {{--  <div class="team-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/kegiatan1.png') }});"></div> --}}
                               <img class="team-img" src="{{ asset('app-assets/landing/assets/images/kegiatan4.jpg') }}" alt="" style="width: 100%; height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-img-box">
                               {{--  <div class="team-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/kegiatan1.png') }});"></div> --}}
                               <img class="team-img" src="{{ asset('app-assets/landing/assets/images/kegiatan6.jpg') }}" alt="" style="width: 100%; height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-img-box">
                               {{--  <div class="team-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/kegiatan1.png') }});"></div> --}}
                               <img class="team-img" src="{{ asset('app-assets/landing/assets/images/kegiatan8.png') }}" alt="" style="width: 100%; height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-img-box">
                               {{--  <div class="team-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/kegiatan1.png') }});"></div> --}}
                               <img class="team-img" src="{{ asset('app-assets/landing/assets/images/kegiatan9.jpg') }}" alt="" style="width: 100%; height: 250px;">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3">
                        <div class="team-box">
                            <div class="team-img-box">
                                <div class="team-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/kegiatan1.png') }});"></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Get In Touch Start -->
    <section class="main-contact">
        <div class="sec-shape mt-5">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row align-items-center" id="contact">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="contact-form wow right-animation" data-wow-delay="0.4s">
                        <form class="dzForm" method="POST" action="https://shivaa.dexignzone.com/shivaa-HTML/homepage_4/assets/script/contact.php">
                            <div class="dzFormMsg"></div>
                            <input type="hidden" class="form-control" name="dzToDo" value="Contact" >
                            <input type="hidden" class="form-control" name="reCaptchaEnable" value="0" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-box">
                                        <input name="dzName" type="text" required class="form-input" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-box">
                                        <input type="text" name="dzEmail" class="form-input" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-box">
                                        <input type="text" name="dzOther[phone]" class="form-input" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-box">
                                        <textarea name="dzMessage" class="form-input" required placeholder="Saran..."></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-box">
                                        <button name="submit" type="submit" value="Submit" class="sec-btn"><span>Kirim</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="contact-text wow left-animation" data-wow-delay="0.4s">
                        <h2 class="h2-title">Saran & Masukan</h2>
                        <div class="contact-link">
                            <p>Customer Service.</p>
                            <a href="https://api.whatsapp.com/send?phone=+6281244962783&text=Assalamualaikum" title="+6281 244 962 783">081 244 962 783</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Get In Touch End -->

    <!-- Our Blog Start -->
    <section class="main-our-blog">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape3 "><img src="{{ asset('app-assets/landing/assets/images/shape2.png') }}" alt="Shape"></span>
            <span class="shape shape4"><img src="{{ asset('app-assets/landing/assets/images/shape1.png') }}" alt="Shape"></span>
        </div>
        <div class="container d-none d-sm-block">
            {{-- ikan 2 --}}
            @include('layouts.landing.fish.fish-style2')
            {{-- end ikan --}}
        </div>
    </section>
    <!-- Our Blog End -->
@endsection
