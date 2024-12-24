@extends('layouts.dashboard.master')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 row m-0 p-0">
                <div class="col-sm-12">
                    <a href="{{ route('pemohon.ajukan-permohonan') }}">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                            <div class="iq-card-body">
                                <div class="user-details-block">
                                    <div style="text-align: center;">
                                        <img src="{{ asset('app-assets/landing/assets/images/idea-research.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h4><b>Permohonan Pengujian <br> Sampel</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 row m-0 p-0">
                <div class="col-sm-12">
                    <a href="{{ route('pemohon.all.permohonan') }}">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                            <div class="iq-card-body">
                                <div class="user-details-block">
                                    <div style="text-align: center;">
                                        <img src="{{ asset('app-assets/landing/assets/images/pantau.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h4><b>Pantau Status <br> Permohonan</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 row m-0 p-0">
                <div class="col-sm-12">
                    <a href="">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                            <div class="iq-card-body">
                                <div class="user-details-block">
                                    <div style="text-align: center;">
                                        <img src="{{ asset('app-assets/landing/assets/images/support.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h4><b>Hubungi <br>Customer Service</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
