@extends('layouts.dashboard.master')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {{-- <div style="margin-bottom: 45%;"></div> --}}
                <div style="text-align: center; margin-bottom: 210px;" class="mt-5">
                    <img src="{{ asset('app-assets/landing/assets/images/logo.png') }}" alt="logo" style="width: 20%; filter: drop-shadow(3px 2px 3px black)">
                    <h4 style="font-weight: bold;">UPT Balai Penerapan Mutu Produk Perikanan DKP Prov. SulSel</h4>
                    <br>
                    <a href="{{ route('pimpinan.all.permohonan') }}">
                        <h5><span class="text-success"><i class="ri-mail-open-fill"></i> {{ $cp->count() }} Total Pengujian Belum Diverifikasi</span></h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection