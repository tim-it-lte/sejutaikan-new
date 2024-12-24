@extends('layouts.dashboard.master')

@section('title','Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('pengujian.segera-pengujian') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/chemistry.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Segera Pengujian <br>
                                        <span style="color: #339DAD;">{{ $segera_pengujian->count().' Total Segera Pengujian' }}</span></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('pengujian.pengujian-dikembalikan') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/success.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Pengujian dikembalikan<br>
                                        <span style="color: #339DAD;">{{ $pengujian_dikembalikan->count().' Total Pengujian dikembalikan' }}</span></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('pengujian.selesai-pengujian') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/success.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Selesai Pengujian<br>
                                        <span style="color: #339DAD;">{{ $selesai_pengujian->count().' Total Selesai Pengujian' }}</span></b></h4>
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
