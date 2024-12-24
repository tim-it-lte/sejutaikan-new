@extends('layouts.dashboard.master')

@section('title','Verifikasi Permohonan')

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
                            <h4 class="mb-3">Verifikasi Permohonan Pengujian</h4>
                            <img src="{{ asset('app-assets/dashboard/images/permohonan.png') }}" alt="permohonan pengujian" style="max-width: 200px;">
                        </div>
                        <form class="mt-5" method="POST" action="{{ route('cs.proses-verifikasi.permohonan',['id' => $permohonan->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                @foreach($parameters as $value)
                                    <input type="hidden" name="parameters[]" value="{{ $value }}">
                                @endforeach

                                @foreach($jumlahs as $value_)
                                    <input type="hidden" name="jumlahs[]" value="{{ $value_ }}">
                                @endforeach
                            </div>
                            <div class="mb-5">
                                @php
                                    $no = 1;
                                    $total = 0;
                                @endphp
                                <b>{{ $permohonan->jenis }}</b><br>
                                <b>Nama :</b> {{ $permohonan->nama }} <br>
                                <b>Perusahaan :</b> {{ $permohonan->perusahaan }} <br>
                                <b>Hp/Telp :</b> {{ $permohonan->hp }} <br>
                                <b>Alamat :</b> {{ $permohonan->alamat }} <br>
                                <b>Jenis Sampel :</b> {{ $permohonan->jenis_sampel }} <br>
                                <b>Spesies :</b> {{ $permohonan->spesies }} <br>
                                <b>Kode Sampel :</b> {{ $permohonan->kode_sampel }} <br>
                                <b>Negara Tujuan :</b> {{ $permohonan->negara_tujuan }} <br>
                                <b>Jumlah Sampel :</b> {{ $permohonan->jumlah_sampel }} <br>

                                {{-- @php
                                    $jp = App\Models\Jp::where('id','=',$permohonan->jenis_permohonan_id)->first();
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
                                        Apakah Anda Yakin ingin memverifikasi permohonan tersebut jika Ya tekan kirim jika tidak tekan cancel !
                                    </p>
                                </div>
                            </div>
                            <div class="form-inline">
                                <a href="{{ route('cs.verifikasi.permohonan',['id' => $permohonan->id]) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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

