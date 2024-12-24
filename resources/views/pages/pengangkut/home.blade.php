@extends('layouts.dashboard.master')

@section('title','Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('pengangkut.diangkut') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/failed.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Yang Akan Diangkut <br>
                                        <span style="color: #339DAD;">{{ $segera_diangkut->count().' Total yang segera diangkut' }}</span></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('pengangkut.selesai-diangkut') }}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 75%; border: 2px solid #329CAD; filter: drop-shadow(3px 4px 4px black);">
                        <div class="iq-card-body">
                            <div class="user-details-block">
                                <div style="text-align: center;">
                                    <img src="{{ asset('app-assets/landing/assets/images/delivery-truck.png') }}" alt="fitur" class="img-fluid" style="filter: drop-shadow(3px 4px 4px black); width: 15%;">
                                </div>
                                <div class="text-center mt-3">
                                    <h4><b>Selesai Diangkut<br>
                                        <span style="color: #339DAD;">{{ $selesai_diangkut->count().' Total Selesai Terangkut' }}</span></b></h4>
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
