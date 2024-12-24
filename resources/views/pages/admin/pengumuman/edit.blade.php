@extends('layouts.dashboard.master')

@section('title','Pengumuman')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Edit Pengumuman</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST" action="{{ route('admin.pengumuman.update',['id' => $result->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="exampleInputText1" placeholder="Judul" value="{{ old('judul',$result->judul) }}" autofocus>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('lampiran') is-invalid @enderror" id="customFile" name="lampiran" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.pdf,.jpg,.jpeg,.png">
                                    <label class="custom-file-label" for="customFile">Upload Dokumen</label>
                                </div>
                                @error('lampiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a target="_blank" href="{{ asset('storage/pengumuman/'.$result->lampiran) }}" class="btn btn-sm btn-succes">Lampiran</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

