@extends('layouts.dashboard.master')

@section('title','Jenis Pengujian')

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
                            <h4 class="card-title">Edit Jenis Pengujian</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST" action="{{ route('admin.jenis-permohonan.update',['id' => $result->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="permohonan">Jenis Pengujian <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('permohonan') is-invalid @enderror" name="permohonan" id="exampleInputText1" placeholder="Jenis Pengujian" value="{{ old('permohonan',$result->jenis_permohonan) }}" autofocus>
                                @error('permohonan')
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

