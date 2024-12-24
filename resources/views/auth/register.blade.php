@extends('layouts.landing.master')

@section('title','Register')

@section('content')
    <div class="r-bg-a pt85 pb120">
        <div class="container w-992">
            <div class="row pt80">
                <div class="col-lg-12">
                    <div class="page-headings text-center">
                        <ul class="breadcrus mb20">
                            <li class="bread-non"><a href="{{ route('/') }}">Beranda</a></li>
                            <li>&nbsp;/&nbsp;</li>
                            <li class="bread-active"><a href="#">Register</a></li>
                        </ul>
                        <h1>Form Registrasi</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="r-bg-x pb120">
        <div class="container w-992">
            <div class="blog-details">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sol-img mt60"></div>
                        <div class="ree-blog-details">
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
                            <div class="alert alert-success mt-3" role="alert">
                                <p style="font-style: italic; color: red;">
                                    Jika sudah memiliki akun silahkan melewati tahap registrasi dan anda dapat segera <strong><a href="{{ route('/') }}">Login</a></strong> dengan akun yang sudah ada!
                                </p>
                            </div>
                            <form action="{{ route('landing.proses-registrasi') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <i class="text-danger" style="font-size: 16px;">*</i></label>
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
                                    <label for="password">Password <i class="text-danger" style="font-size: 16px;">*</i></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kpassword">Konfirmasi Password <i class="text-danger" style="font-size: 16px;">*</i></label>
                                    <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="kpassword" name="konfirmasi_password" autocomplete="off">
                                    @error('konfirmasi_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-success btn-block" style="background-color: #55B38C !important;" value="Kirim">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
