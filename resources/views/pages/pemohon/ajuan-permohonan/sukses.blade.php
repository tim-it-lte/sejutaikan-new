@extends('layouts.dashboard.master')

@section('title','Sukses Permohonan Pengujian')

@section('style')
    <script type="text/javascript" src="{{ asset('app-assets/dashboard/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <span style="float: right;"><a href="{{ route('pemohon.ajukan-permohonan') }}" class="btn btn-sm btn-primary"><i class="fa fa-undo"></i>kembali</a></span>
                        <center>
                            <img src="{{ asset('app-assets/thanks.png') }}" style="width:30%" alt="">
                            <h3>Terima Kasih. Permohonan Anda Berhasil Terkirim. Silahkan mengisi survei kami <a href="{{ route('landing.survei') }}" target="_blank" class="btn btn-sm btn-success">di sini</a> <br>
                            <br> Dinas Kelautan Dan Perikanan Provinsi Sulawesi Selatan </h3>

                            <div class="alert alert-success mt-3" role="alert">
                                <p style="font-style: italic;">
                                    Kode Permohonan : {{ $kode }} <br>
                                </p>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


@endsection

