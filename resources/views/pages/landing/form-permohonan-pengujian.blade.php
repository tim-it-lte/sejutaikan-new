@extends('layouts.landing.master')

@section('title','Formulir Permohonan Pengujian')

@section('content')
    <section class="main-contact inner-page-contact mt-5">
        <div class="sec-shape">
            <span class="shape shape1"><img src="assets/images/shape3.png" alt="Shape"></span>
            <span class="shape shape2"><img src="assets/images/shape4.png" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <h2 style="text-align: center;">Formulir Permohonan Pengujian</h2><br>
                @if(session()->has('success'))
                <div id="alert-success" class="alert alert-success alert-with-border" style="background-color: rgba(92,146,15,0.5) !important;" role="alert">
                    <i class="fa fa-check"></i> {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div id="alert-danger" class="alert alert-danger alert-with-border" role="alert">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div style="text-align: center;" class="mt-3">
                    <img src="{{ asset('app-assets/landing/assets/images/permohonan.png') }}" alt="permohonan pengujian" style="max-width: 200px;">
                </div>
                <div class="alert alert-success mt-3" role="alert">
                    <p style="font-style: italic;">
                        Jika Sudah Melakukan Permohonan Pengujian Sebelumnya Silahkan melakukan <strong><a href="{{ route('/') }}">Login</a></strong> dengan akun yang sudah ada!
                    </p>
                </div>
                <form action="{{ route('landing.post-permohonan-pengujian') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama Pemilik <i class="text-danger" style="font-size: 16px;">*</i></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" name="nama" autocomplete="off" autofocus>
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email <i class="text-danger" style="font-size: 16px;">*</i></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp/Hp <i class="text-danger" style="font-size: 16px;">*</i></label>
                        <input type="text" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}" id="telp" name="telp" autocomplete="off">
                        @error('telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <i class="text-danger" style="font-size: 16px;">*</i></label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="alamat" name="alamat" autocomplete="off">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Permohonan Pengujian <i class="text-danger" style="font-size: 16px;">*</i></label>
                        <select class="form-control @error('jenis_permohonan') is-invalid @enderror" id="exampleFormControlSelect1" name="jenis_permohonan">
                            <option value="" disabled selected hidden>Pilih...</option>
                            <option value="Kualitas air / Lingkungan">Kualitas air / Lingkungan</option>
                            <option value="Penyakit Ikan">Penyakit Ikan</option>
                        </select>
                        @error('jenis_permohonan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-success btn-block" style="background-color: #55B38C !important;" value="Kirim">
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $("#alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-success").slideUp(500);
        });

        $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-danger").slideUp(500);
        });
    </script>
@endsection
