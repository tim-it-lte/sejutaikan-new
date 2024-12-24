@extends('layouts.landing.master')

@section('title', 'Beranda')

@section('content')
    <section class="home-hero slide-hero">
        <div class="hero-owl owl-carousel">
            <div class="slide owlbg11" data-background="{{ asset('app-assets/landing-new/images/svg/svg-bg1.svg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="hero-content-x">
                                <p class="mb10 ree-tt">Selamat Datang di e-Sejutaikan</p>
                                <h1 class="mb30" data-aos="fade-in" data-aos-delay="200">
                                    <span class="ree-tt">Sertifikat Hasil Pengujian Produk Perikanan</span>
                                </h1>
                                <h4>UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="sol-image m-mt30">
                                <img src="{{ asset('pimpinann-.png') }}" alt="PLT Gubernur" class="img-fluid"
                                    data-aos="fade-in" data-aos-delay="400">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide owlbg11" data-background="{{ asset('app-assets/landing-new/images/svg/svg-bg2.svg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="hero-content-x">
                                <p class="mb10 ree-tt">Selamat Datang di e-Sejutaikan</p>
                                <h1 class="mb30" data-aos="fade-in" data-aos-delay="200">
                                    <span class="ree-tt">Sertifikat Hasil Pengujian Produk Perikanan</span>
                                </h1>
                                <h4>UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="sol-image m-mt30">
                                <img src="{{ asset('pimpinann-.png') }}" alt="PLT Gubernur" class="img-fluid"
                                    data-aos="fade-in" data-aos-delay="400">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide owlbg11" data-background="{{ asset('app-assets/landing-new/images/svg/svg-bg3.svg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="hero-content-x">
                                <p class="mb10 ree-tt">Selamat Datang di e-Sejutaikan</p>
                                <h1 class="mb30" data-aos="fade-in" data-aos-delay="200"><span class="ree-tt">Sertifikat
                                        Hasil Pengujian Produk Perikanan</span></h1>
                                <h4>UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="sol-image m-mt30">
                                <img src="{{ asset('pimpinann-.png') }}" alt="PLT Gubernur" class="img-fluid"
                                    data-aos="fade-in" data-aos-delay="400">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide owlbg11" data-background="{{ asset('app-assets/landing-new/images/svg/svg-bg4.svg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="hero-content-x">
                                <p class="mb10 ree-tt">Selamat Datang di e-Sejutaikan</p>
                                <h1 class="mb30" data-aos="fade-in" data-aos-delay="200"><span class="ree-tt">Sertifikat
                                        Hasil Pengujian Produk Perikanan</span></h1>
                                <h4>UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 vcenter">
                            <div class="sol-image m-mt30">
                                <img src="{{ asset('pimpinann-.png') }}" alt="PLT Gubernur" class="img-fluid"
                                    data-aos="fade-in" data-aos-delay="400">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-i sec-pad digi-service" style="padding-top: 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sec-heading text-center pera-block">
                        <h2>Layanan</h2>
                    </div>
                </div>
            </div>
            <div class="row mt30">
                {{-- start --}}
                <div class="col-md-3">
                    <a href="{{ route('register') }}">
                        <img src="{{ asset('registrasi.png') }}" class="rounded float-left" alt="gambar-layanan"
                            style="width: 100%;">
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('landing.pantau-permohonan') }}">
                        <img src="{{ asset('pantau-status-permohonan.png') }}" class="rounded float-left"
                            alt="gambar-layanan" style="width: 100%;">
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('landing.alur-permohonan') }}">
                        <img src="{{ asset('alur-permohonan.png') }}" class="rounded float-left" alt="gambar-layanan"
                            style="width: 100%;">
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="https://api.whatsapp.com/send?phone=+6281244962783&text=Assalamualaikum">
                        <img src="{{ asset('customer-service.png') }}" class="rounded float-left" alt="gambar-layanan"
                            style="width: 100%;">
                    </a>
                </div>
                {{-- end --}}
                <!--<div class="col-lg-3 col-sm-6 mt30" data-aos="fade-up" data-aos-delay="400">-->
                <!--    <div class="ree-card bhv-tt">-->
                <!--        <div class="creative-img reebgb">-->
                <!--            <img src="{{ asset('app-assets/landing-new/images/svg/appdesign.svg') }}" alt="Registrasi" class="img-fluid">-->
                <!--        </div>-->
                <!--        <div class="creative-cntnt">-->
                <!--            <h4 class="mb15"><a href="{{ route('register') }}">Registrasi</a></h4>-->
                <!--            <p style="font-size: 14px; line-height: 22px;">Silahkan melakukan registrasi untuk Permohonan Pengujian Sampel apabila sudah memiliki akun silahkan login </p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-lg-3 col-sm-6 mt30" data-aos="fade-up" data-aos-delay="700">-->
                <!--    <div class="ree-card bhv-tt">-->
                <!--        <div class="creative-img reebgc">-->
                <!--            <img src="{{ asset('app-assets/landing-new/images/svg/content.svg') }}" alt="Pantau Permohonan" class="img-fluid">-->
                <!--        </div>-->
                <!--        <div class="creative-cntnt">-->
                <!--            <h4 class="mb15"><a href="{{ route('landing.pantau-permohonan') }}">Pantau Status Permohonan</a></h4>-->
                <!--            <p style="font-size: 14px; line-height: 22px;">Pantau Status Permohonan dengan Efisien dan mudah tanpa bertemu langsung.</p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-lg-3 col-sm-6 mt30" data-aos="fade-up" data-aos-delay="1000">-->
                <!--    <div class="ree-card bhv-tt">-->
                <!--        <div class="creative-img reebgd">-->
                <!--            <img src="{{ asset('app-assets/landing-new/images/svg/stracture.svg') }}" alt="Alur Permohonan" class="img-fluid">-->
                <!--        </div>-->
                <!--        <div class="creative-cntnt">-->
                <!--            <h4 class="mb15"><a href="{{ route('landing.alur-permohonan') }}">Alur Permohonan</a></h4>-->
                <!--            <p style="font-size: 14px; line-height: 22px;">Alur Permohonan Pengujian Sampel UPT Balai Penerapan Mutu Produk Perikanan Prov. Sulawesi Selatan.</p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-lg-3 col-sm-6 mt30" data-aos="fade-up" data-aos-delay="1000">-->
                <!--    <div class="ree-card bhv-tt">-->
                <!--        <div class="creative-img reebgd">-->
                <!--            <img src="{{ asset('app-assets/landing-new/images/svg/solutions-vector-m.png') }}" alt="Hub CS" class="img-fluid">-->
                <!--        </div>-->
                <!--        <div class="creative-cntnt">-->
                <!--            <h4 class="mb15"><a href="https://api.whatsapp.com/send?phone=+6281244962783&text=Assalamualaikum">Customer Service</a></h4>-->
                <!--            <p style="font-size: 14px; line-height: 22px;">Customer Service yang ramah siap melayani anda dengan cepat ketika mengalami kendala terhadap sistem.</p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </section>

    <section class="r-bg-i sec-pad digi-service" style="padding-top: 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sec-heading text-center pera-block">
                        <h2>Informasi</h2>
                    </div>
                </div>
            </div>
            <div class="row mt30">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8 vcenter">
                    <img src="{{ asset('kris.jpeg') }}" alt="Payment" class="img-fluid" data-aos="fade-in"
                        data-aos-delay="400" style="margin-bottom:12px">
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-12 col-sm-12">
                    <h5>Cara pembayaran Retribusi Pemakaian Barang / Peralatan Serta Bahan dan Sarana Laboratorium UPT.
                        BPMPP (Biaya Pengujian) melalui :</h5><br>
                    <h6>1. Rekening Bank Sulselbar Nomor: 13000167319 atas nama Kas Umum Daerah Provinsi Sulawesi Selatan
                    </h6>
                    <h6>2. Quick Response Code Indonesian Standar (QRIS) Bank Sulselbar</h6>
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-x zup sec-pad pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="sec-heading text-center pera-block">
                        <h2>Parameter</h2>
                    </div>
                    <div class="row mt30">
                        <div class="col-md-12 col-sm-12">
                            @if ($parameters->count() >= 1)
                                <div class="table-responsive">
                                    <table id="data_side" class="table table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Parameter</th>
                                                <th scope="col">Harga</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Parameter</th>
                                                <th scope="col">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="text-center"><i class="text-danger">no data</i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-a sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-8 vcenter">
                    <div class="heading-hz-btn">
                        <h2>Galeri</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 vcenter">
                    {{-- <div class="link-sol-header">
                        <a href="#" class="ree-card-link">Lihat Semua <i class="fas fa-arrow-right fa-btn"></i></a>
                    </div> --}}
                </div>
            </div>
            <div class="row mt60">
                <div class="col-lg-12">
                    <div class="full-work-block  owl-carousel">
                        {{-- <div class="fwb-main-x fwb-a">
                            <div class="work-thumbnails">
                                <a href="#">
                                    <img src="{{ asset('app-assets/landing/assets/images/slide4.jpg') }}" alt="portfolio reevan" class="img-fluid">
                                </a>
                            </div>
                        </div> --}}
                        <div class="fwb-main-x fwb-a">
                            <div class="work-thumbnails">
                                <a href="#">
                                    <img src="{{ asset('app-assets/landing/assets/images/slide1.jpg') }}"
                                        alt="portfolio reevan" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="fwb-main-x fwb-a">
                            <div class="work-thumbnails">
                                <a href="#">
                                    <img src="{{ asset('app-assets/landing/assets/images/slide2.jpg') }}"
                                        alt="portfolio reevan" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="fwb-main-x fwb-a">
                            <div class="work-thumbnails">
                                <a href="#">
                                    <img src="{{ asset('app-assets/landing/assets/images/slide3.jpg') }}"
                                        alt="portfolio reevan" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-a sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-8 vcenter">
                    <div class="heading-hz-btn">
                        <h2>Prosedur Pelayanan</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 vcenter">
                </div>
            </div>
            <div class="row mt60">
                <div class="col-md-6 col-12">
                    <img src="{{ asset('app-assets/landing/assets/images/prosedur.jpeg') }}" alt="sop"
                        style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('baru.jpeg') }}" alt="sop"
                        style="filter: drop-shadow(10px 10px 4px #777777); width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-x zup sec-pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="sol-img m-mt30">
                        <img src="{{ asset('app-assets/landing-new/images/others/team-business.jpg') }}" alt="survei"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7">
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

    <script>
        $(function() {
            $('#data_side').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('landing.datatable-parameter') }}",
            });
        });
    </script>
@endsection
