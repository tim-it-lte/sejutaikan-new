@extends('layouts.landing.master')

@section('title','Tentang')
@include('layouts.landing.partials.breadcrumb', [ 'breadLink' => 'Profil', 'breadTitle' => 'Profil UPT. BPMPP' ])

@section('link')
    <style type="text/css">
        ol li {
            font-size: 18px;
            line-height: 28px;
        }
    </style>
@endsection

@section('content')
    <section class="r-bg-i sec-pad digi-service">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <h3 class="ree-tt mb-2">Struktur Organisasi UPT. BPMPP</h3>
                    <p>Berdasarkan Peraturan Gubernur Provinsi Sulawesi Selatan No. 37 Tahun 2018, Susunan organisasi UPT. terdiri dari:</p>
                    <ol class="ml-4">
                        <li>Kepala UPT;</li> 
                        <li>Subbagian Tata Usaha;</li>
                        <li>Seksi Standarisasi Mutu;</li>
                        <li>Seksi Pengembangan Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="pt85 pb100 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8 col-lg-6">
                    <h3 class="mb-2">Fungsi UPT. BPMPP</h3>
                    <p>Berdasarkan Peraturan Gubernur Provinsi Sulawesi Selatan No. 37 Tahun 2018, fungsi BPMPP adalah sebagai berikut.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card card-body shadow-sm">
                        <div class="d-flex ree-tt">
                            <h3 class="mb-0 pr-2"><i class="fas fa-quote-right"></i></h3>
                            <p class="mb-0">Melaksanakan pelayanan teknis operasional pengujian mutu dan keamanan produk perikanan, diversifikasi produk, dan penerapan persyaratan Standar Nasional Indonesia  (SNI) pada produk hasil perikanan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="r-bg-x pb120 mt110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <h3>Sejarah <span class="ree-text rt40">UPT. BPMPP</span></h3>
                </div>
            </div>
        </div>
        <div class="container w-992">
            <div class="blog-details">
                <div class="row"><div class="col-lg-12">
                    <div class="ree-blog-details pt-5">
                        <p>Cikal bakal pembentukan <b>BPMPP</b> dimulai pada tahun 1978 dengan nama Laboratorium Pembinaan dan Pengujian Mutu Hasil Perikanan (LPPMHP) sebagai Unit Pelaksana Teknis Dinas Perikanan Provinsi Sulawesi Selatan yang bertugas mengawasi, menguji dan membina masyarakat umumnya dan pelaku usaha perikanan khususnya terkait mutu/kualitas produk hasil perikanan. Seiring dengan perkembangan waktu LPPMHP mengalami beberapa perubahan nomenklatur.</p>
                        <ol class="ml-4">
                            <li><b>Keputusan Gubernur Sulawesi Selatan No. 128 Tahun 2001</b> tentang Pembentukan Organisasi dan Tata Kerja Unit Pelaksana Teknis Dinas (UPTD) Pembinaan dan Pengujian Mutu Hasil Perikanan Pada Dinas Perikanan dan Kelautan (PPMHP)Provinsi Sulawesi Selatan. Mempunyai tugas Pokok melaksanakan sebagain tugas Dinas di bidang pembinaan, Pengujian dan Sertifikasi Mutu hasil perikanan sesuai dengan kebijaksanaan teknis Dinas Perikanan dan Kelautan. Sedangkan fungsinya adalah pelaksanaan pengujian laboratorium, pelaksanaan kegiatan dalam rangka penerbitan sertifikat mutu hasil perikanan, Pembinaan dan pemberian bimbingan terhadap unit pengolahan yang berhubungan dengan mutu.</li>
                            <li><b>Peraturan Gubernur Sulawesi Selatan No. 45 Tahun 2009</b> tentang Organisasai dan Tata Kerja Unit Pelaksana Teknis Dinas (UPTD)  Balai Pembinaan dan Pengujian Mutu Hasil Perikanan (BPPMHP), mempunyai fungsi menyelenggarakan tugas teknis Dinas di bidang pembinaan dan pengujian mutu hasil perikanan.  Sedangkan tugas pokok adalah melaksanakan pengujian mutu terhadap bahan baku, bahan pembantu dan produk akhir hasil perikanan; menerbitkan sertifikat mutu hasil perikanan; membina dan memberi bimbingan terhadap unit pengolahan yang berhubungan dengan pembinaan mutu.</li>
                            <li><b>Peraturan Gubernur Sulawesi Selatan No. 75 Tahun 2017</b> tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis (UPT) Balai Pembinaan, Pengujian dan Pengembangan Mutu Produk Hasil Kelautan dan Perikanan (BP3MPHKP) pada Dinas Kelautan dan Perikanan Provinsi Sulawesi Selatan, dengan tugas melaksanakan kegiatan teknis maupun opersional dalam rangka mendukung pelaksanaan tugas dan fungsi Dinas Kelautan dan Perikanan di bidang pengolahan dan pemasaran, pembinaan dan pelayanan dalam rangka jaminan mutu produk.</li>
                            <li><b>Peraturan Gubernur Sulawesi Selatan No. 37 Tahun 2018</b> tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis (UPT) Balai Penerapan Mutu Produk Perikanan (BPMPP) Pada Dinas Kelautan dan Perikanan Provinsi Sulawesi Selatan, dengan tugas melaksanakan pelayanan teknis operasional pengujian mutu dan keamanan produk perikanan, diversifikasi produk, dan penerapan persyaratan Standar Nasional Indonesia pada produk hasil perikanan serta melaksanakan pelayanan penerapan mutu sebagai bahan penyiapan rekomendasi Sertifikat Kelayakan Pengolahan (SKP).</li>
                        </ol>

                        <h4>A. Bagian Tata Usaha</h4>
                        <p>Tugas Bagian Tata Usaha adalah mengoordinasikan dan melaksanakan pelayanan teknis dan administrasi penyusunan program, pelaporan, umum, kepegawaian, dan keuangan dalam lingkungan UPT.</p>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="sol-img mb10">
                                    <img src="{{ asset('app-assets/sejarah/1.png') }}" alt="Front office Tata Usaha" class="img-fluid">
                                </div>
                                <p class="small text-center pb25">Bagian Pelayanan Tata Usaha.</p>
                            </div>
                            {{-- <div class="col-md">
                                <div class="sol-img mb10">
                                    <img src="{{ asset('app-assets/sejarah/2.png') }}" alt="Front office Tata Usaha" class="img-fluid">
                                </div>
                                <p class="small text-center pb25">Bagian Pelayanan Tata Usaha.</p>
                            </div> --}}
                        </div>

                        <h4>B. Seksi Standardisasi Mutu</h4>
                        <p>Tugas Seksi Standardisasi Mutu adalah melakukan pelayanan teknis operasional standarisasi mutu produk perikanan dan penerapan sistem manajemen mutu yang meliputi:<br>pelayanan penerapan standarisasi mutu dan jaminan keamanan pangan produk perikanan, melakukan analisis data hasil pengujian mutu produk perikanan, dan melakukan monitoring hasil perikanan.</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="sol-img">
                                    <img src="{{ asset('app-assets/sejarah/3.jpg') }}" alt="Pengujian Histamin dengan alat Fluorescence Spectro Photometer" class="img-fluid">
                                </div>
                                <!-- <p class="small text-center">Pengujian Histamin dengan alat Fluorescence Spectro Photometer.</p> -->
                                <div class="sol-img mt45 mb10">
                                    <img src="{{ asset('app-assets/sejarah/4.jpg') }}" alt="Pengujian Logam Berat dengan alat AAS" class="img-fluid">
                                </div>
                                <!-- <p class="small text-center pb25">Pengujian Logam Berat dengan alat AAS.</p> -->
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="sol-img mt45 mb10">
                                    <img src="{{ asset('app-assets/sejarah/5.png') }}" alt="Monitoring Formalin" class="img-fluid">
                                    <img src="{{ asset('app-assets/sejarah/6.png') }}" alt="Monitoring Formalin" class="img-fluid">
                                </div>
                                <p class="small text-center pb25">Monitoring Formalin.</p>
                            </div>
                            <div class="col-12">
                                <div class="sol-img mb10">
                                    <img src="{{ asset('app-assets/sejarah/14.jpg') }}" alt="Penjemputan Sampel & Pengantaran Sertifikat Hasil Uji" class="img-fluid">
                                </div>
                                <p class="small text-center pb25">Penjemputan Sampel dan Pengantaran Sertifikat Hasil Uji.</p>
                            </div>
                        </div>

                        <h4>C. Seksi Pengembangan Produk</h4>
                        <p>Tugas Seksi Pengembangan Produk adalah pelayanan teknis operasional pengembangan produk, bimbingan pemenuhan persyaratan SNI, penerapan teknologi pengolahan dan pengemasan, pengelolaan data informasi dan publikasi.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sol-img mb10">
                                    <img src="{{ asset('app-assets/sejarah/7.jpg') }}" alt="Seksi Pengembangan Produk" class="img-fluid">
                                </div>
                                <p class="small text-center">Pembinaan dalam rangka Penerbitan Rekomendasi Sertifikat Kelayakan Pengolahan (SKP).</p>
                            </div>
                            <div class="col-md">
                                <div class="sol-img mb10">
                                    <img src="{{ asset('app-assets/sejarah/8.jpg') }}" alt="Seksi Pengembangan Produk" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb10 pb25">
                                    <img src="{{ asset('app-assets/sejarah/9.png') }}" alt="Promosi Produk UKM" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <h4>D. Pelayanan UPT. BPMPP</h4>
                        <ul class="ul-list mb30">
                            <li>
                                <p>Dalam rangka pelayanan kepada pelanggannya, UPT. BPMPP telah tersertifikasi sistem manajemen ISO 9001:2015</p>
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="card card-body mb10">
                                            <img src="{{ asset('app-assets/sejarah/10.jpg') }}" alt="Sertifikat Akreditasi" class="img-fluid">
                                        </div>
                                        <p class="small text-center pb25">Akreditasi untuk sertifikasi hasil pengujian dan pemberian tanda SNI pada produk perikanan.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <p>Layanan pengujian laboratorium (Kimia, Mikrobiologi, Organoleptik) terakreditasi oleh Komite Akreditasi Nasional Sejak Tahun 2002 hingga sekarang.</p>
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="sol-img mb10">
                                            <img src="{{ asset('app-assets/sejarah/11.png') }}" alt="Sertifikat Laboratorium" class="img-fluid">
                                        </div>
                                        <p class="small text-center pb25">Akreditasi untuk Kompetensi Laboratorium Pengujian dan Laboratorium Kalibrasi.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <p>Penerbitan SPPT SNI Wajib, Sertifikat Kesesuaian SNI Wajib, dan Sertifikat Kesesuaian SNI Sukarela terakreditasi oleh Komite Akreditasi Nasional  sejak tahun 2017 hingga sekarang.</p>
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="sol-img mb10">
                                            <img src="{{ asset('app-assets/sejarah/12.png') }}" alt="Sertifikat Lembaga Produk" class="img-fluid">
                                        </div>
                                        <p class="small text-center pb25">Akreditasi sebagai Lembaga Sertifikasi Produk, Proses, dan Jasa.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <p>Ditetapkan sebagai Lembaga Penilaian Kesesuaian Pengujian Mutu Barang dalam Sistem Resi Gudang oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI) Kementerian Perdagangan Republik Indonesia pada tahun 2022.</p>
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="sol-img mb10">
                                            <img src="{{ asset('app-assets/sejarah/13.png') }}" alt="Sertifikat Penetapan BAPPEBTI Kemendag RI" class="img-fluid">
                                        </div>
                                        <p class="small text-center pb25">Sertifikat Penetapan sebagai Lembaga Penilaian Kesesuaian Pengujian Mutu Barang.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="d-flex justify-content-between">
                        <a href="{{ route('landing.profil.fungsi') }}" class="text-danger d-flex justify-content-center align-items-center">
                            <i class="fas fa-angle-double-left"></i>
                            <b class="ml-3 text-left small">Fungsi UPT.<br>BPMPP</b>
                        </a>
                        <a href="{{ route('landing.profil.struktur') }}" class="text-danger d-flex justify-content-center align-items-center">
                            <b class="mr-3 text-right small">Struktur<br>Organisasi</b>
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div> --}}
                </div></div>
            </div>
        </div>
    </section>

@endsection

@section('script')