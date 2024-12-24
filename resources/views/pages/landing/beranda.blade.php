@extends('layouts.landing.master')

@section('title', 'Beranda')

@section('link')
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/wow-slider/engine1/style.css') }}" />
    <!-- <script type="text/javascript" src="{{ asset('app-assets/wow-slider/engine1/jquery.js') }}"></script> -->
    <!-- End WOWSlider.com HEAD section -->
@endsection

@section('content')
    {{-- <section class="home-hero slide-hero">
        <div class="hero-owl owl-carousel">
            <div class="slide owlbg11">
                <img src="{{ asset('app-assets/landing-new/images/new_banner/hero1.webp') }}" class="img-fluid">
            </div>
            <div class="slide owlbg11">
                <img src="{{ asset('app-assets/landing-new/images/new_banner/hero2.webp') }}" class="img-fluid">
            </div>
        </div>
    </section> --}}

    <!-- Start WOWSlider.com BODY section -->
    <div id="wowslider-container1" style="margin-top:115px;">
        <div class="ws_images">
            <ul>
                <li>
                    <img src="{{ asset('/app-assets/wow-slider/data1/images/Sampul10.png') }}" alt="Aplikasi Sejuta Ikan" title="" id="wows1_0"/>
                </li>
                <li>
                    <img src="{{ asset('/app-assets/wow-slider/data1/images/Sampul11.png') }}" alt="Aplikasi Sejuta Ikan" title="" id="wows1_0"/>
                </li>
                <li>
                    <img src="{{ asset('/app-assets/wow-slider/data1/images/carousel2.webp') }}" alt="2A" title="Top 20 Inovasi Pelayanan Publik" id="wows1_1"/>
                </li>
                <li>
                    <img src="{{ asset('/app-assets/wow-slider/data1/images/carousel4.webp') }}" alt="4A" title="UPT Balai Penerapan Mutu Produk Perikanan" id="wows1_3"/>
                </li>
                <li>
                    <img src="{{ asset('/app-assets/wow-slider/data1/images/carousel3.webp') }}" alt="slider" title="Desk Evaluasi Zona Integritas Tahun 2021 Oleh Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi" id="wows1_2"/>
                </li>
            </ul>
        </div>
        <div class="ws_bullets">
            <div>
                <a href="#" title="Aplikasi Sejuta Ikan"><span><img src="{{ asset('/app-assets/wow-slider/data1/tooltips/carousel11.png') }}" alt="Aplikasi Sejuta Ikan"/>1</span></a>
                <a href="#" title="Top 20 Inovasi Pelayanan Publik"><span><img src="{{ asset('/app-assets/wow-slider/data1/tooltips/2a.png') }}" alt="Top 20 Inovasi Pelayanan Publik"/>2</span></a>
                <a href="#" title="UPT Balai Penerapan Mutu Produk Perikanan"><span><img src="{{ asset('/app-assets/wow-slider/data1/tooltips/3a.png') }}" alt="UPT Balai Penerapan Mutu Produk Perikanan"/>3</span></a>
                <a href="#" title="Dinas Kelautan dan Perikanan Prov. Sulawesi Selatan"><span><img src="{{ asset('/app-assets/wow-slider/data1/tooltips/4a.png') }}" alt="Desk Evaluasi Zona Integritas Tahun 2021 Oleh Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi"/>4</span></a>
            </div>
        </div>
        <div class="ws_shadow"></div>
    </div>
    <!-- End WOWSlider.com BODY section -->

    <!--<section class="r-bg-i sec-pad digi-service" style="padding-top: 0;">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-lg-8">-->
    <!--                <div class="sec-heading text-center pera-block">-->
    <!--                    <h2>Layanan</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row mt30">-->
                {{-- start --}}
                <!--<div class="col-md-3">-->
                <!--    <a href="{{ route('register') }}">-->
                <!--        <img src="{{ asset('registrasi.png') }}" class="rounded float-left" alt="gambar-layanan"-->
                <!--            style="width: 100%;">-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div class="col-md-3">-->
                <!--    <a href="{{ route('landing.pantau-permohonan') }}">-->
                <!--        <img src="{{ asset('pantau-status-permohonan.png') }}" class="rounded float-left"-->
                <!--            alt="gambar-layanan" style="width: 100%;">-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div class="col-md-3">-->
                <!--    <a href="{{ route('landing.alur-permohonan') }}">-->
                <!--        <img src="{{ asset('alur-permohonan.png') }}" class="rounded float-left" alt="gambar-layanan"-->
                <!--            style="width: 100%;">-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div class="col-md-3">-->
                <!--    <a href="https://api.whatsapp.com/send?phone=+6281244962783&text=Assalamualaikum">-->
                <!--        <img src="{{ asset('customer-service.png') }}" class="rounded float-left" alt="gambar-layanan"-->
                <!--            style="width: 100%;">-->
                <!--    </a>-->
                <!--</div>-->
                {{-- end --}}
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <section class="r-bg-i sec-pad mt-5 d-none" style="padding-top: 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sec-heading text-center pera-block">
                        <h2>Petunjuk Permohonan Sertifikat</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center mt30">
                <div class="col-12 col-md-12 col-lg-12">
                    <img src="{{ asset('sop-new.png') }}" alt="Payment" class="img-fluid" style="border: 4px solid #fff; background-color: #fff;" data-aos="fade-in"
                        data-aos-delay="400">
                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        
.bg-guide-pink { background: #f5324f; }

.bg-guide-red { background: #ff5b2e; }
.border-guide-red { border-color: #ff5b2e!important; }
.text-guide-red { color: #ff5b2e; }

    </style>
    <section id="guide">
        <div class="container pt85 mt-5 mb-5">
            <div class="sec-heading text-center pera-block">
                <h2 class="ree-tt">Tata Cara Permohonan sejutaikan<br><small style="font-size: 25px"><b>Sertifikasi Hasil Pengujian</b></small></h2>
                <small style="color: #F24743;"><i style="font-size: 20px; line-height: 1px;"><b>One Day Service</i></b><i style="font-size: 12px"> (organoleptik)<br> 6 hari kerja * (uji mikrobilogi, kimia)</i></i></small>
            </div>
        </div>
        <div class="bg-guide-red" data-aos="fade-up">
            <div class="container pt-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-dark text-dark mt-1 mr-2">1</span>
                            <span>Registrasi dan Login</span>
                        </h3>
                        <p class="text-light ml-4">Silahkan masuk ke menu <b>Login</b>, login menggunakan email dan password anda. Jika belum memiliki akun, silahkan melakukan Registrasi terlebih dahulu.</p>
                    </div>
                    <div class="col-10 col-md-6 col-md-4">
                        <img src="{{ asset('app-assets/prosedur2/login.png') }}" class="img-fluid" alt="Alur Pelayanan">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark" data-aos="fade-up">
            <div class="container py-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-10 col-md-4 col-lg-4">
                        <img src="{{ asset('app-assets/prosedur2/permohonan.png') }}" class="img-fluid" alt="Ajukan Permohonan">
                    </div>
                    <div class="col-md-4 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-guide-red text-guide-red mt-1 mr-2">2</span>
                            <span>Ajukan Pengujian Sampel</span>
                        </h3>
                        <p class="text-light ml-4">Pilih menu <b>Permohonan Pengujian Sampel</b>, isi form dengan benar sesuai sampel yang ingin diuji jika pengujian permohonan subkontrak harus memasukkan kode sampel lalu klik <b>Kirim</b>. Permohonan anda akan melalui proses verifikasi oleh CS kami.</p>
                    </div>
                                        <div class="col-10 col-md-4 col-lg-4">
                        <img src="{{ asset('app-assets/prosedur2/point2.png') }}" class="img-fluid" alt="Ajukan Permohonan">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-guide-red" data-aos="fade-up">
            <div class="container pt-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-dark text-dark mt-1 mr-2">3</span>
                            <span>Pantau Status Permohonan</span>
                        </h3>
                        <p class="text-light ml-4">Pilih menu <b>Pantau Status Permohonan</b>. Pada halaman ini anda dapat memantau Status Permohonan Pengujian Sampel yang sudah anda kirim sebelumnya.</p>
                    </div>
                    <div class="col-10 col-md-6 col-lg-3">
                        <img src="{{ asset('app-assets/prosedur2/pemantauan.png') }}" class="img-fluid" alt="Pantau Status Permohonan">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark" data-aos="fade-up">
            <div class="container py-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 col-md-3 col-lg-2">
                        <img src="{{ asset('app-assets/prosedur2/verifikasi.svg') }}" class="img-fluid" alt="Verifikasi Ulang">
                    </div>
                    <div class="col-md-6 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-guide-red text-guide-red mt-1 mr-2">4</span>
                            <span>Lakukan Verifikasi Ulang</span>
                        </h3>
                        <p class="text-light ml-4">Jika permohonan anda selesai diverifikasi, status permohonan anda akan berubah menjadi <b>Sudah Diverifikasi di CS</b>. Pada tahap ini, anda dapat memverifikasi permohonan anda. Silahkan pilih menu <b>Verifikasi</b>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-guide-red" data-aos="fade-up">
            <div class="container py-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-dark text-dark mt-1 mr-2">5</span>
                            <span>Lakukan Pembayaran</span>
                        </h3>
                        <p class="text-light ml-4">Jika Status Permohonan anda <b>Sudah Diterima</b>, silahkan klik <b>Lakukan Pembayaran</b>. Silahkan lakukan pembayaran biaya retribusi sesuai permohonan anda. Jangan lupa untuk mengirimkan bukti pembayaran anda.</p>
                        
                    </div>
                    <div class="col-4 col-md-3 col-lg-2">
                        <img src="{{ asset('app-assets/prosedur2/pembayaran.svg') }}" class="img-fluid" alt="Pembayaran">
                    </div>
                    <div class="col-md-12">
                         <section class="r-bg-i sec-pad mt-5 pb-0" style="padding-top: 0;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-md-6 col-lg-4 text-center">
                    <img src="{{ asset('app-assets/landing-new/images/QRCode_UPT_BPMPP_crop.png') }}" alt="Payment" class="img-fluid" style="border: 4px solid #fff; background-color: #fff;width:70%;" data-aos="fade-in"
                        data-aos-delay="400">
                </div>
                <div class="col-md-6 p-5 text-white">
                    <!--<h5 class="text-white">Cara pembayaran Retribusi Pemakaian kekayaan daerah pada UPT. BPMPP (Biaya Pengujian) melalui :</h5><br>-->
                    <h5 class="text-white">NOREG Peraturan Daerah Provinsi Sulawesi Selatan Nomor 1 Tahun 2024 Tentang Pajak Daerah dan Retribusi Daerah :</h5><br>
                    <ol>
                        <li class="mb-3">Rekening Bank Sulselbar Nomor: 13000167319 atas nama RKUD Prov. Sulawesi Selatan.</li>
                        <li>Quick Response Code Indonesian Standar (QRIS) Bank Sulselbar.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark" data-aos="fade-up">
            <div class="container py-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-10 col-md-6 col-lg-3">
                        <img src="{{ asset('app-assets/prosedur2/penjemputan.svg') }}" class="img-fluid" alt="Penjemputan Sampel">
                    </div>
                    <div class="col-md-6 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-guide-red text-guide-red mt-1 mr-2">6</span>
                            <span>Penjemputan Sampel</span>
                        </h3>
                        <p class="text-light ml-4">Setelah pembayaran, anda tinggal menunggu petugas kami datang untuk penjemputan sampel.<br>Penjemputan sampel jam 09.00 - 14.00 Wita(diupayakan sampel langsung di preparasi uji)</p>
                    </div>
                </div>
            </div>
        </div>
         <div class="bg-guide-red" data-aos="fade-up">
            <div class="container pt-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-dark text-dark mt-1 mr-2">7</span>
                            <span>Pengujian</span>
                        </h3>
                        <p class="text-light ml-4">
                        <i>One Day Service</i> untuk pengujian sensori, pengujian mirkobiologi dan kimia paling lambat 6 hari kerja tergantung pada parameter uji yang anda masukkan.</p>
                    </div>
                    <div class="col-10 col-md-6 col-lg-3">
                        <img src="{{ asset('app-assets/prosedur2/lab.svg') }}" class="img-fluid" alt="Pantau Status Permohonan">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark" data-aos="fade-up">
            <div class="container py-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-10 col-md-6 col-lg-3">
                        <img src="{{ asset('app-assets/prosedur2/sertifikat.png') }}" class="img-fluid" alt="Penjemputan Sampel">
                    </div>
                    <div class="col-md-6 my-4">
                        <h3 class="text-light d-flex align-items-start">
                            <span class="badge badge-pill bg-light border border-guide-red text-guide-red mt-1 mr-2">8</span>
                            <span>Pengantaran Sertifikat</span>
                        </h3>
                        <p class="text-light ml-4">Setelah proses pengujian selesai, sertifikat hasil uji dapat anda download sendiri atau petugas kami akan mengantarkan sertifikat anda jika anda menginginkannya dalam bentuk hardcopy.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<section class="r-bg-i sec-pad mt-5" style="padding-top: 0;">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center align-items-center mt30">-->
    <!--            <div class="col-10 col-md-6 col-lg-4">-->
    <!--                <img src="{{ asset('app-assets/landing-new/images/QRCode_UPT_BPMPP_crop.png') }}" alt="Payment" class="img-fluid" style="border: 4px solid #fff; background-color: #fff;" data-aos="fade-in"-->
    <!--                    data-aos-delay="400">-->
    <!--            </div>-->
    <!--            <div class="col-md-6 p-5">-->
    <!--                <h5>Cara pembayaran Retribusi Pemakaian Barang / Peralatan Serta Bahan dan Sarana Laboratorium UPT. BPMPP (Biaya Pengujian) melalui :</h5><br>-->
    <!--                <ol>-->
    <!--                    <li class="mb-3">Rekening Bank Sulselbar Nomor: 13000167319 atas nama RKUD Prov. Sulawesi Selatan.</li>-->
    <!--                    <li>Quick Response Code Indonesian Standar (QRIS) Bank Sulselbar.</li>-->
    <!--                </ol>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    @if ($jps->count() >= 1)
    <section class="r-bg-x sec-pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="sec-heading text-center pera-block">
                        <h2>Parameter Tersedia</h2>
                    </div>
                </div>
            </div>
            <div class="row accordion" id="accordionParameter">
                @foreach($jps as $jp)
                <div class="col-12 my-2">
                    <a class="ree-btn ree-btn-grdt2 text-center d-block" data-toggle="collapse" href="#collapseParameter{{$jp->id}}" role="button" aria-expanded="false" aria-controls="collapseParameter{{$jp->id}}">{{ $jp->jenis_permohonan }}</a>
                    <div class="collapse" id="collapseParameter{{$jp->id}}" data-parent="#accordionParameter">
                        <div class="card card-body my-2">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Parameter Pengujian</th>
                                            <th>Metode Uji</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($jp->parameter as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->parameter }}</td>
                                            <td>{{ $row->metode_uji }}</td>
                                            <td>{{ number_format($row->harga, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="bg-white">
        <div class="container pb-4">
            <div class="row justify-content-center align-items-end">
                <div class="col-4 col-md-3 col-lg-2">
                    <img src="{{ asset('app-assets/brand-logo/logo-1.jpeg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-4 col-md-3 col-lg-2">
                    <img src="{{ asset('app-assets/brand-logo/logo-2.jpeg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-4 col-md-3 col-lg-2">
                    <img src="{{ asset('app-assets/brand-logo/logo-3.jpeg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    @if(count($galleries) > 0)
    <section class="r-bg-a sec-pad" style="padding-bottom: 0;">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-6 col-sm-8 vcenter">
                    <div class="heading-hz-btn">
                        <h2 class="text-center">Galeri</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 vcenter">
                    <div class="link-sol-header">
                        <a href="#" class="ree-card-link">Lihat Semua <i class="fas fa-arrow-right fa-btn"></i></a>
                    </div>
                </div>
            </div> --}}
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="sec-heading text-center pera-block">
                        <h2>Galeri</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="full-work-block owl-carousel">
                            @foreach($galleries as $item)
                            <div class="fwb-main-x fwb-a shadow">
                                <div class="work-thumbnails" style="border-color:transparent;">
                                    <img src="{{ asset('storage/galeri/'.$item->filename) }}" class="img-fluid" alt="Foto {{ $item->description ? $item->description : 'UPT BPMPP' }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="r-bg-a sec-pad">
        <!--<div class="container">-->
        <!--    <div class="heading-hz-btn">-->
        <!--        <h2 class="mb-5">Prosedur Pelayanan</h2>-->
        <!--    </div>-->
        <!--    <div class="owl-carousel owl-theme sop-carousel">-->
        <!--        <div class="item">-->
        <!--            <div class="card bg-white">-->
        <!--                <div class="card-body">-->
        <!--                    <p><b class="border border-danger text-danger px-2 py-1 rounded-circle">1</b></p>-->
        <!--                    <img src="{{ asset('app-assets/prosedur/permohonan.svg') }}" alt="">-->
        <!--                    <h4 class="text-center">Permohonan</h4>-->
        <!--                    <p class="text-center small px-4 mt-2">Hubungi Whatsapp 0812 4496 2783, atau kunjungi website sejutaikan-bpmpp.info</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="item">-->
        <!--            <div class="card bg-white">-->
        <!--                <div class="card-body">-->
        <!--                    <p><b class="border border-danger text-danger px-2 py-1 rounded-circle">2</b></p>-->
        <!--                    <img src="{{ asset('app-assets/prosedur/verifikasi.svg') }}" alt="">-->
        <!--                    <h4 class="text-center">Verifikasi</h4>-->
        <!--                    <p class="text-center small px-4 mt-2">dan kaji ulang permohonan uji sampel</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="item">-->
        <!--            <div class="card bg-white">-->
        <!--                <div class="card-body">-->
        <!--                    <p><b class="border border-danger text-danger px-2 py-1 rounded-circle">3</b></p>-->
        <!--                    <img src="{{ asset('app-assets/prosedur/pembayaran.svg') }}" alt="">-->
        <!--                    <h4 class="text-center">Pembayaran Retribusi</h4>-->
        <!--                    <p class="text-center small px-4 mt-2">Kirim bukti pembayaran anda ke 0812 4496 2783 (Whatsapp) atau upload di website sejutaikan-bpmpp.info</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="item">-->
        <!--            <div class="card bg-white">-->
        <!--                <div class="card-body">-->
        <!--                    <p><b class="border border-danger text-danger px-2 py-1 rounded-circle">4</b></p>-->
        <!--                    <img src="{{ asset('app-assets/prosedur/penjemputan.svg') }}" alt="">-->
        <!--                    <h4 class="text-center">Penjemputan Sampel</h4>-->
        <!--                    <p class="text-center small px-4 mt-2">Tunggu kedatangan petugas kami di rumah anda</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="item">-->
        <!--            <div class="card bg-white">-->
        <!--                <div class="card-body">-->
        <!--                    <p><b class="border border-danger text-danger px-2 py-1 rounded-circle">5</b></p>-->
        <!--                    <img src="{{ asset('app-assets/prosedur/pengujian.svg') }}" alt="">-->
        <!--                    <h4 class="text-center">Pengujian</h4>-->
        <!--                    <p class="text-center small px-4 mt-2">Sampel akan diuji sesuai parameter dalam permohonan</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="item">-->
        <!--            <h4 class="mt-4 mb-2">Jenis Pengujian</h4>-->
        <!--            <div class="card bg-primary mb-2">-->
        <!--                <div class="card-body d-block">-->
        <!--                    <p class="text-white"><b>Organoleptik</b><br>-->
        <!--                    <small>(1 hari)</small></p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="card bg-success mb-2">-->
        <!--                <div class="card-body d-block">-->
        <!--                    <p class="text-white"><b>Mikrobiologi</b><br>-->
        <!--                    <small>(6 hari)</small></p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="card bg-danger">-->
        <!--                <div class="card-body d-block">-->
        <!--                    <p class="text-white"><b>Kimia</b><br>-->
        <!--                    <small>(6 hari)</small></p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="item">-->
        <!--            <div class="card bg-white">-->
        <!--                <div class="card-body">-->
        <!--                    <p><b class="border border-danger text-danger px-2 py-1 rounded-circle">6</b></p>-->
        <!--                    <img src="{{ asset('app-assets/prosedur/sertifikat.svg') }}" alt="">-->
        <!--                    <h4 class="text-center">Penerbitan Sertifikat</h4>-->
        <!--                    <p class="text-center small px-4 mt-2">Sertifikat hasil ujia akan dikirim ke rumah anda segera setelah hasilnya keluar</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </section>

    <section class="r-bg-x zup sec-pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="sol-img m-mt30">
                        <!--<img src="{{ asset('app-assets/landing-new/images/others/team-business.jpg') }}" alt="survei"-->
                        <!--    class="img-fluid">-->
                        <img src="{{ asset('grafik.png') }}" style="max-width: 100%;" alt="survei" class="img-fluid">
                        <h4 style="text-align: center; color: #F5334E;">Grafik Hasil Survei Kepuasan Masyarakat</h4>
                             <!--<div class="chartjs-bar-wrapper mt-3">-->
                             <!--       <canvas id="jumlah-pengunjung" height="400" width="720px"></canvas>-->
                             <!--   </div>-->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pera-block ml50">
                        <h2><span class="ree-tt">Survei Kepuasan Masyarakat</span></h2>
                        <p>Pemerintah berupaya meningkatkan kualitas pelayanan masyarakat demi tercapainya harapan dan
                            tuntutan publik sesuai Keputusan Menteri Pendayagunaan Aparatur Negara Nomor 14 Tahun 2017
                            tentang Pedoman Umum Penyusunan Survei Kepuasan Masyarakat Unit Penyelenggara Pelayanan Publik.
                            Mengacu pada hal tersebut, maka Tim Survei dan Pengolah Data Survei Kepuasan Masyarakat (SKM)
                            UPT BPMPP telah melakukan pengukuran Survei Kepuasaan Masyarakat terhadap pelayanan Pengujian
                            Hasil Perikanan</p>
                        <a href="{{ route('landing.survei') }}" class="btn btn-block btn-danger mt-3"> Mulai Survei</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('app-assets/dashboard/files/assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script
        src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script
        src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script
        src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>

    <script type="text/javascript" src="{{ asset('app-assets/wow-slider/engine1/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app-assets/wow-slider/engine1/script.js') }}"></script>
    
    <script>
    var xValues = ["Anak-anak", "Dewasa"];
    var yValues = [jumlah_anak, jumlah_dewasa];
    var barColors = [
    "#b91d47",
    "#00aba9"
    ];

    new Chart("jumlah-pengunjung", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Jumlah Pengunjung"
            }
        }
    });
    </script>

    <!-- <script>
        $(function() {
            $('#data_side').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('landing.datatable-parameter') }}",
            });
        });
    </script> -->
@endsection
