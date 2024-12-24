@extends('layouts.dashboard.master')

@section('title','Verifikasi Pengujian')

@section('style')
<script type="text/javascript" src="{{ asset('app-assets/dashboard/ckeditor/ckeditor.js') }}"></script>
<script src=""></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="text-center">
                        <h4 class="mb-3">Verifikasi Pengujian</h4>
                        <span style="float: right;"><a href="{{ route('cs.all.verifikasi_pengujian') }}" class="btn btn-sm btn-primary"><i class="fa fa-undo"></i>kembali</a></span>
                    </div>
                    <form method="POST" action="{{ route('cs.proses-verifikasi-pengujian.permohonan',['id' => $permohonan->id]) }}">
                        @csrf
                        <div class="mb-5"><br>
                            {{-- <b>{{ $permohonan->jenis }}</b><br> --}}
                            <div class="form-group">
                                <label for="nama">Nama </label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleInputText1" placeholder="Nama" value="{{ $permohonan->nama }}">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan </label>
                                <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" id="exampleInputText1" placeholder="perusahaan" value="{{ $permohonan->perusahaan }}">
                                @error('perusahaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hp">HP/Telp </label>
                                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" id="exampleInputText1" placeholder="..." value="{{ $permohonan->hp }}">
                                @error('hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat </label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="exampleInputText2" placeholder="..." value="{{ $permohonan->alamat }}">
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_sampel">Jenis Sampel <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('jenis_sampel') is-invalid @enderror" name="jenis_sampel" id="exampleInputText3" placeholder="..." value="{{ old('jenis_sampel',$permohonan->jenis_sampel) }}">
                                @error('jenis_sampel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="spesies">Spesies <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('spesies') is-invalid @enderror" name="spesies" id="exampleInputText4" placeholder="..." value="{{ old('spesies',$permohonan->spesies) }}">
                                @error('spesies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode_sampel">Kode Sampel Dari UPT </label>
                                <input type="text" class="form-control @error('kode_sampel') is-invalid @enderror" name="kode_sampel" id="exampleInputText5" placeholder="..." value="{{ old('kode_sampel',$permohonan->kode_sampel_lab) }}" autocomplete="off">
                                @error('kode_sampel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="negara_tujuan">Negara Tujuan <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('negara_tujuan') is-invalid @enderror" name="negara_tujuan" id="exampleInputText6" placeholder="..." value="{{ old('negara_tujuan',$permohonan->negara_tujuan) }}">
                                @error('negara_tujuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sampel">Jumlah Sampel <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('jumlah_sampel') is-invalid @enderror" name="jumlah_sampel" id="exampleInputText7" placeholder="..." value="{{ $permohonan->jumlah_sampel }}">
                                @error('jumlah_sampel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomor_referensi">Nomor Referensi <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('nomor_referensi') is-invalid @enderror" name="nomor_referensi" id="exampleInputText7" placeholder="..." value="{{ old('nomor_referensi',$permohonan->nomor_referensi) }}" autocomplete="off">
                                @error('nomor_referensi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomor_sertifikat">Nomor Sertifikat <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('nomor_sertifikat') is-invalid @enderror" name="nomor_sertifikat" id="exampleInputText7" placeholder="..." value="{{ old('nomor_sertifikat',$permohonan->nomor_sertifikat) }}" autocomplete="off">
                                @error('nomor_sertifikat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputdate">Tanggal Terbit Sertifikat <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="date" class="form-control @error('tgl_sertifikat') is-invalid @enderror" id="exampleInputdate" value="{{ date('Y-m-d') }}" name="tgl_sertifikat">
                                @error('tgl_sertifikat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <h5>Hasil Pengujian</h5>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr class="table-success" style="text-align: center;">
                                        <th scope="col" rowspan="2">No.</th>
                                        <th scope="col" rowspan="2">Parameter</th>
                                        <th scope="col" colspan="5"><span style="font-style: text-decoration: underline; font-style: italic;">Result</span><br>Hasil</th>
                                        <th scope="col" rowspan="2"><span style="font-style: text-decoration: underline; font-style: italic;">Limit of Quality</span><br>Batas Standar Mutu</th>
                                        <th scope="col" rowspan="2"><span style="font-style: text-decoration: underline; font-style: italic;">Test Methods</span><br>Metode Uji</th>
                                    </tr>
                                    <tr class="table-success" style="text-align: center;">
                                        <th scope="col">1</th>
                                        <th scope="col">2</th>
                                        <th scope="col">3</th>
                                        <th scope="col">4</th>
                                        <th scope="col">5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($parameters as $param)
                                        @php
                                            $getpr_ = App\Models\Parameter::where('id','=',$param->parameter_id)->first();
                                        @endphp
                                        <tr style="text-align: center;">
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $getpr_->parameter }}</td>
                                            @php
                                                $hasils = App\Models\Hasil::where('permohonanparameter_id','=',$param->id)->get();
                                                $hasil_ = App\Models\Hasil::where('permohonanparameter_id','=',$param->id)->first();
                                            @endphp
                                            @foreach($hasils as $hasil)
                                                <td>{{ $hasil->hasil }}</td>
                                            @endforeach
                                            <td>{{ $hasil_->standar_mutu }}</td>
                                            <td>{{ $getpr_->metode_uji }}</td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table><br>
                            <a href="{{ route('cs.cetak-sertifikat',['id' => $permohonan->id]) }}" class="btn btn btn-success" target="_blank"><i class="fa fa-file"></i>Lihat Sertifikat</a>
                        </div>
                        <a href="{{ route('cs.all.verifikasi_pengujian') }}" class="mt-5 btn btn-danger">Cancel</a>
                        <button type="submit" class="mt-5 btn btn-primary">Verifikasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection

