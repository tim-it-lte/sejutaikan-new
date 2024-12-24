@extends('layouts.dashboard.master')

@section('title','Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('cs.all.permohonan') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/checked.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Verifikasi Permohonan </h4>
                                        <h5><span style="color: #339DAD;">{{ $verifikasi->count().' Total yang Belum Di Verifikasi' }}</span></b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('cs.all.pengkodean-sampel') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/pengkodean-sampel.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Pengkodean Sampel</h4>
                                        <h5><span style="color: #339DAD;">{{ $pengkodean_sampel->count().' Total yang Belum Pengkodean Sampel' }}</span></b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('cs.all.verifikasi_pengujian') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/search.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Verifikasi Pengujian</h4>
                                        <h5><span style="color: #339DAD;">{{ $pengujian->count().' Total yang Belum Diverifikasi Pengujian' }}</span></b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('cs.all.terbit_sertifikat') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/certificate.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Terbit Sertifikat</h4>
                                        <h5><span style="color: #339DAD;">{{ $terbit->count().' Total yang Sudah Selesai TTD Sertifikat' }}</span></b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('cs.all.permohonan-sampel') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/report.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Data <br><p style="color: #339DAD;">Semua Permohonan Sampel</p></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('cs.all.report') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/report.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Report <br><p style="color: #339DAD;">Perbulan</p></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
