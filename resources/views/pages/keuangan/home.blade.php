@extends('layouts.dashboard.master')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 row m-0 p-0">
                <div class="col-sm-12">
                    <a href="{{ route('keuangan.belum-pembayaran') }}">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                            <div class="iq-card-body">
                                <div class="user-details-block">
                                    <div style="text-align: center;">
                                        <img src="{{ asset('app-assets/landing/assets/images/credit-card.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h4><b>Belum Pembayaran</b></h4>
                                        <span>{{ $belum_bayar->count().' Total Belum Bayar' }}</span><br>
                                        <span>{{ $dikembalikan->count().' Total Dikembalikan' }}</span><br>
                                        <span>{{ $belum_verifikasi->count().' Total Belum Verifikasi' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-5 row m-0 p-0">
                <div class="col-sm-12">
                    <a href="{{ route('keuangan.sudah-pembayaran') }}">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                            <div class="iq-card-body">
                                <div class="user-details-block">
                                    <div style="text-align: center;">
                                        <img src="{{ asset('app-assets/landing/assets/images/salary.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h4><b>Selesai Pembayaran <br><span style="color: #339DAD;">{{ $sudah_bayar->count().' Total Sudah Bayar' }}</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
