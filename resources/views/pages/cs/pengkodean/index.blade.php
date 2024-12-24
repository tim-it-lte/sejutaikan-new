@extends('layouts.dashboard.master')

@section('title','Detail Permohonan')

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
                            <h4 class="mb-3">Isi Form Dibawah</h4>
                        </div>
                        <form method="POST" action="{{ route('cs.proses-pengkodean-permohonan.permohonan',['id' => $permohonan->id]) }}">
                            @csrf
                            <div class="mb-5">
                                @php
                                    $no = 1;
                                    $total = 0;
                                @endphp
                                <b>{{ $permohonan->jenis }}</b><br>
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
                                    <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" id="exampleInputText1" placeholder="Perusahaan" value="{{ $permohonan->perusahaan }}">
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
                                    <input type="text" class="form-control @error('kode_sampel') is-invalid @enderror" name="kode_sampel" id="exampleInputText5" placeholder="..." value="{{ old('kode_sampel') }}" autocomplete="off">
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
                                    <input type="text" class="form-control @error('jumlah_sampel') is-invalid @enderror" name="jumlah_sampel" id="exampleInputText7" placeholder="..." value="{{ $permohonan->jumlah_sampel }}" disabled>
                                    @error('jumlah_sampel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor_referensi">Nomor Referensi <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                    <input type="text" class="form-control @error('nomor_referensi') is-invalid @enderror" name="nomor_referensi" id="exampleInputText7" placeholder="..." value="{{ old('nomor_referensi') }}" autocomplete="off">
                                    @error('nomor_referensi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor_sertifikat">Nomor Sertifikat <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                    <input type="text" class="form-control @error('nomor_sertifikat') is-invalid @enderror" name="nomor_sertifikat" id="exampleInputText7" placeholder="..." value="{{ old('nomor_sertifikat') }}" autocomplete="off">
                                    @error('nomor_sertifikat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div style="overflow: scroll; height:400px;">
                                <h5>Parameter Pengujian :</h5>
                                @php
                                    $j = 0;
                                @endphp
                                @foreach($parameters as $value)
                                    <div class="form-group">
                                        <p>
                                            @php
                                                $get_pr = App\Models\Parameter::where('id','=',$value->parameter_id)->first();
                                                $get_jp = App\Models\Jp::where('id','=',$get_pr->jp_id)->first();
                                                $total += ($get_pr->harga*$value->jumlah);
                                            @endphp
                                            <b>{{ $no }}. {{ $get_pr->parameter }} - <span style="font-style: italic; font-size: 12px;" class="text-danger">({{ $get_jp->jenis_permohonan }})</span> <br> <span>Harga Rp {{ number_format($get_pr->harga,0,',','.') }} </span><br>
                                                <span>Jumlah {{ $value->jumlah }} </span><br>
                                                <span>Total Rp {{ number_format($get_pr->harga*$value->jumlah,0,',','.') }}</span>
                                        </p>
                                        <hr>
                                    </div>
                                    @php
                                        $j++;
                                        $no++;
                                    @endphp
                                @endforeach
                            </div>
                            <div>
                                <span class="text-danger">Total {{ number_format($total,0,',','.') }}</span>
                                <input type="hidden" name="total" value="{{ $total }}">
                            </div>
                            <button type="submit" class="mt-5 btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


@endsection

