@extends('layouts.landing.master')

@section('title','Beranda')

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
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide1.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/banner-img1.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide2.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide3.jpg') }});"></div>
                            <div class="banner-img back-img" style="background-image: url({{ asset('app-assets/landing/assets/images/slide4.jpg') }});"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-content">
                        <span class="sub-title wow fadeup-animation" data-wow-delay="0.4s" style="font-size: 30px; text-transform: capitalize;">Selamat Datang Di <span style="text-transform: lowercase;">e-</span>Sejuta Ikan</span>
                        {{-- <h1 class="h1-title wow fadeup-animation" data-wow-delay="0.5s">Sertifikat Hasil Pengujian Produk Perikanan</h1> --}}
                        <p class="wow fadeup-animation" data-wow-delay="0.6s" style="color: black; font-size: 27px;">Sertifikat Hasil Pengujian Produk Perikanan </p>

                        <p class="wow fadeup-animation" data-wow-delay="0.6s" style="color: black; font-size: 27px;"><b>UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</b></p>
                        <div class="banner-call wow fadeup-animation" data-wow-delay="0.8s">
                            <a href="https://api.whatsapp.com/send?phone=+6281244962783&text=Assalamualaikum" title="081 244 962 783"><span class="icon"><img src="{{ asset('app-assets/landing/assets/images/call-icon.png') }}" alt="Call Icon"></span>Customer Service:<span>081 244 962 783</span></a>
                        </div>
                    </div>
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
                    <img class="d-block w-100" src="{{ asset('app-assets/landing/assets/images/slide3.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('app-assets/landing/assets/images/slide2.jpg') }}" alt="Third slide">
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
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->

    <!-- About Us Start -->
    <section class="main-about-us">
        <div class="sec-shape">
            <span class="shape shape1"><img src="{{ asset('app-assets/landing/assets/images/shape3.png') }}" alt="Shape"></span>
            <span class="shape shape2"><img src="{{ asset('app-assets/landing/assets/images/shape4.png') }}" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="row" id="about-us">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="about-content wow right-animation" data-wow-delay="0.4s">
                        <span class="sub-title">TENTANG KAMI</span>
                        <h2 class="h2-title">UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SuSel</h2>
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
                    <img src="{{ asset('app-assets/landing/assets/images/sampel.jpg') }}" alt="gambar" class="mt-5" style="filter: drop-shadow(10px 10px 4px #777777); margin-top: 200px !important;">
                </div>
            </div>
        </div>
    </section>
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
                                        <p>Pemerintah berupaya meningkatkan kualitas pelayanan masyarakat demi tercapainya harapan dan tuntutan publik. Upaya tersebut dilakukan secara menyeluruh dan berkelanjutan. Untuk itu diperlukan evaluasi terhadap penyelenggaraan pelayanan yang telah dilakukan. Salah satu cara untuk memperoleh hasil evaluasi adalah dengan meminta penilaian publik terhadap kualitas pelayanan melalui survei kepuasan masyarakat.</p>
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

    <!-- Get In Touch Start -->
    <section class="main-contact">
        <div class="sec-shape">
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
    {{-- <section class="main-our-blog">
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
                        <span class="sub-title" id="blog">Berita</span>
                    </div>
                </div>
            </div>
            <div class="blog-list">
                <div class="row">

                    @foreach($beritas as $berita)
                        <div class="col-lg-6">
                            <div class="blog-box wow fadeup-animation" data-wow-delay="0.4s">
                                <div class="blog-img-box">
                                    <div class="blog-img back-img" style="background-image: url({{ asset('storage/berita/'.$berita->foto) }});">
                                    </div>
                                    <div class="blog-date">
                                        <a href="javascript:void(0);" title="7 March, 2021"><i class="fa fa-calendar" aria-hidden="true"></i>{{ date('d M Y',strtotime($berita->created_at)) }} / Admin</a>
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
                <div class="row">
                    <div class="col-12">
                        <div class="view-all">
                            <a href="{{ route('landing.berita') }}" class="sec-btn" title="Semua Berita"><span>Semua Berita</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Our Blog End -->
@endsection
