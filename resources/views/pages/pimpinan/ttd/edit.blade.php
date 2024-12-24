@extends('layouts.dashboard.master')

@section('title','Tanda Tangan')

@section('style')
    <script type="text/javascript" src="{{ asset('app-assets/dashboard/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="text-center">
                            <h4 class="mb-3">Formulir Tanda Tangan Sertifikat</h4>
                        </div>
                        <form class="mt-5" method="POST" action="{{ route('pimpinan.update.ttd') }}" enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('success'))
                            <div id="alert-success" class="alert alert-success alert-with-border" role="alert">
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div id="alert-danger" class="alert alert-danger alert-with-border" role="alert">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="nama">Nama <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleInputText1" placeholder="Nama" value="{{ old('nama',$result->nama) }}" autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="exampleInputText1" placeholder="..." value="{{ old('jabatan',$result->jabatan) }}">
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2 mb-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('ttd') is-invalid @enderror" id="customFile" name="ttd" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Upload Tanda Tangan</label>
                                </div>
                                @error('ttd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @if($result->ttd != '0')
                                <div class="form-group mt-2 mb-4">
                                    <img src="{{ asset('storage/ttd/'.$result->ttd) }}" alt="ttd" style="width: 15%;">
                                </div>
                            @endif
                            <div class="form-group mt-2 mb-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('stempel') is-invalid @enderror" id="customFile" name="stempel" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Upload Stempel</label>
                                </div>
                                @error('stempel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @if($result->stempel != '0')
                                <div class="form-group mt-2 mb-4">
                                    <img src="{{ asset('storage/ttd/'.$result->stempel) }}" alt="ttd" style="width: 15%;">
                                </div>
                            @endif
                        <hr>
                        <button type="submit" class="mt-5 btn btn-primary">Kirim</button>
                        </form>
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

