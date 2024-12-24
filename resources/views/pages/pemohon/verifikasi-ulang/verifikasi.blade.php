@extends('layouts.dashboard.master')

@section('title','Permohonan Pengujian')

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
                            <h4 class="mb-3">Formulir Permohonan Pengujian</h4>
                            <img src="{{ asset('app-assets/dashboard/images/permohonan.png') }}" alt="permohonan pengujian" style="max-width: 200px;">
                        </div>
                        <form class="mt-5" method="POST" action="{{ route('pemohon.proses-pilih-parameter-lainnya',['id' => $permohonan->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="jenis" value="{{ $jenis }}">
                                <input type="hidden" name="nama" value="{{ $nama }}">
                                <input type="hidden" name="perusahaan" value="{{ $perusahaan }}">
                                <input type="hidden" name="hp" value="{{ $hp }}">
                                <input type="hidden" name="alamat" value="{{ $alamat }}">
                                <input type="hidden" name="jenis_permohonan" value="{{ $jenis_permohonan }}">
                                @foreach($parameters as $value)
                                    <input type="hidden" name="parameters[]" value="{{ $value }}">
                                @endforeach

                                @foreach($jumlahs as $value_)
                                    <input type="hidden" name="jumlahs[]" value="{{ $value_ }}">
                                @endforeach
                                <input type="hidden" name="jenis_sampel" value="{{ $jenis_sampel }}">
                                <input type="hidden" name="spesies" value="{{ $spesies }}">
                                <input type="hidden" name="kode_sampel" value="{{ $kode_sampel }}">
                                <input type="hidden" name="negara_tujuan" value="{{ $negara_tujuan }}">
                                <input type="hidden" name="jumlah_sampel" value="{{ $jumlah_sampel }}">
                            </div>
                            <div class="mb-5">
                                @php
                                    $no = 1;
                                    $total = 0;
                                @endphp
                                <b>{{ $jenis }}</b><br>
                                <b>Nama :</b> {{ $nama }} <br>
                                <b>Perusahaan :</b> {{ $perusahaan }} <br>
                                <b>Hp/Telp :</b> {{ $hp }} <br>
                                <b>Alamat :</b> {{ $alamat }} <br>
                                <b>Jenis Sampel :</b> {{ $jenis_sampel }} <br>
                                <b>Spesies :</b> {{ $spesies }} <br>
                                <b>Kode Sampel :</b> {{ $kode_sampel }} <br>
                                <b>Negara Tujuan :</b> {{ $negara_tujuan }} <br>
                                <b>Jumlah Sampel :</b> {{ $jumlah_sampel }} <br>
                                {{-- @php
                                    $jp = App\Models\Jp::where('id','=',$jenis_permohonan)->first();
                                @endphp
                                <b>Jenis Permohonan :</b> {{ $jp->jenis_permohonan }} --}}
                            </div>
                            <div style="overflow: scroll; height:400px;">
                                <h5>Parameter Pengujian :</h5>
                                @php
                                    $j = 0;
                                @endphp
                                @foreach($parameters as $value)
                                    <div class="form-group">
                                        <p>
                                            @php
                                                $get_pr = App\Models\Parameter::where('id','=',$value)->first();
                                                $total += ($get_pr->harga*$jumlahs[$j]);
                                            @endphp
                                            <b>{{ $no }}. {{ $get_pr->parameter }} <br> <span>Harga Rp {{ number_format($get_pr->harga,0,',','.') }} </span><br>
                                                <span>Jumlah {{ $jumlahs[$j] }} </span><br>
                                                <span>Total Rp {{ number_format($get_pr->harga*$jumlahs[$j],0,',','.') }}</span>
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

                                <div class="alert alert-danger" role="alert">
                                    <p style="font-style: italic;">
                                        Apakah Anda Yakin dengan Data tersebut jika Ya tekan kirim jika tidak tekan cancel !
                                    </p>
                                </div>
                            </div>
                            <div class="form-inline">
                                <a href="{{ route('pemohon.pilih-parameter-lainnya',['id' => $permohonan->id]) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


@endsection

