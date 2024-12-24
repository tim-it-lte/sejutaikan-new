@extends('layouts.dashboard.master')

@section('title','Pengankutan')

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
                            <h4 class="mb-3">Formulir Pengambilan Sampel</h4>
                            <img src="{{ asset('app-assets/dashboard/images/permohonan.png') }}" alt="permohonan pengujian" style="max-width: 200px;">
                        </div>
                        <form class="mt-5" method="POST" action="{{ route('pengangkut.diangkut-proses',['id' => $permohonan->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama </label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputText1" placeholder="Nama" value="{{ old('nama',$permohonan->nama) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="hp">HP/Telp </label>
                                <input type="text" class="form-control @error('hp') is-invalid @enderror" id="exampleInputText1" placeholder="..." value="{{ old('hp',$permohonan->hp) }}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat </label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputText2" placeholder="..." value="{{ old('alamat',$permohonan->alamat) }}" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="jumlah_sampel">Jumlah Sampel <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('jumlah_sampel') is-invalid @enderror" name="jumlah_sampel" id="exampleInputText7" placeholder="..." value="{{ old('jumlah_sampel') }}">
                                @error('jumlah_sampel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                        <hr>
                        <button type="submit" class="mt-5 btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


