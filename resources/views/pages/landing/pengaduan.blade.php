@extends('layouts.landing.master')

@section('title','Pengaduan')

@include('layouts.landing.partials.breadcrumb', [ 'breadLink' => 'Pengaduan', 'breadTitle' => 'Pengaduan' ])

@section('content')
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
                            <form action="{{ route('landing.proses-pengaduan') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4" style="background-color: #538135; padding: 20px 12px; color: white;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="defaultCheck1" name="jenis_laporan" value="permintaan informasi">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Permintaan Informasi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="background-color: #C00000; padding: 20px 12px; color: white;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="defaultCheck2" name="jenis_laporan" value="pengaduan">
                                                <label class="form-check-label" for="defaultCheck2">
                                                    Pengaduan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="background-color: #8496B0; padding: 20px 12px; color: white;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="defaultCheck3" name="jenis_laporan" value="aspirasi">
                                                <label class="form-check-label" for="defaultCheck3">
                                                    Aspirasi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <label for="subject">Judul Laporan <i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"  autocomplete="off">
                                    @if($errors->has('judul'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('judul') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="isi_laporan">Isi Laporan <i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <textarea id="pesan" class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan"></textarea>
                                    @if($errors->has('isi_laporan'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('isi_laporan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="fu">Tanggal Kejadian <i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"  autocomplete="off">
                                    @if($errors->has('tanggal'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('tanggal') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_kejadian">Lokasi Kejadian <i class="text-danger" style="font-size: 14px;">*</i></label>
                                    <input type="text" class="form-control @error('lokasi_kejadian') is-invalid @enderror" name="lokasi_kejadian"  autocomplete="off">
                                    @if($errors->has('lokasi_kejadian'))
                                    <span class="form-text text-muted text-danger">{{ $errors->first('lokasi_kejadian') }}</span>
                                    @endif
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="unggahan" placeholder="Unggahan Bukti (Lampiran)">
                                    <label class="custom-file-label" for="customFile">Unggahan Bukti (Lampiran)</label>
                                </div>
                                <br><br><br>
                                <button type="submit" class="btn btn-success"> SIMPAN </button>
                                </div>
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
