@extends('layouts.landing.master')

@section('title','Pengaduan')

@section('content')
    <section class="main-contact inner-page-contact mt-5">
        <div class="sec-shape">
            <span class="shape shape1"><img src="assets/images/shape3.png" alt="Shape"></span>
            <span class="shape shape2"><img src="assets/images/shape4.png" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <h2 style="text-align: center;">Form Pengaduan</h2><br>
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
                <form action="{{ route('landing.proses-pengaduan') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lengkap <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"  autocomplete="off" autofocus>
                        @if($errors->has('nama'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="off">
                        @if($errors->has('email'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"  autocomplete="off">
                        @if($errors->has('subject'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <textarea id="pesan" class="form-control @error('pesan') is-invalid @enderror" name="pesan"></textarea>
                        @if($errors->has('pesan'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('pesan') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success"> SIMPAN </button>
                    </div>
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
