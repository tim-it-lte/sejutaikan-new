@extends('layouts.dashboard.master')

@section('title', 'Berita')

@section('style')
    <script type="text/javascript" src="{{ asset('app-assets/dashboard/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Edit Berita</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST" action="{{ route('admin.berita.update', ['id' => $result->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul Berita <i class="text-danger"
                                        style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" id="exampleInputText1" placeholder="Judul"
                                    value="{{ old('judul', $result->judul) }}" autofocus>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Isi Berita</label>
                                <textarea class="ckeditor form-control ckeditor @error('isi') is-invalid @enderror" id="ckeditor" name="isi"
                                    rows="5">{{ $result->isi }}</textarea>
                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                        id="customFile" name="foto" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Foto</label>
                                </div>
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('file') is-invalid @enderror"
                                        id="customFile" name="file" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.pdf">
                                    <label class="custom-file-label" for="customFile">Upload Dokumen</label>
                                </div>
                                @error('lampiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="url_video">Url Video </label>
                                <input type="url" class="form-control @error('url_video') is-invalid @enderror"
                                    name="url_video" id="exampleInputText1"
                                    value="{{ old('url_video', $result->url_video) }}">
                                @error('url_video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
