@extends('layouts.dashboard.master')

@section('title','Pembayaran')

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
                            <h4 class="mb-3">Pembayaran</h4>
                            <img src="{{ asset('app-assets/dashboard/images/pembayaran.png') }}" alt="permohonan pengujian" style="max-width: 200px;">
                        </div>
                        <form class="mt-5" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5">
                                @php
                                    $no = 1;
                                    $total = 0;
                                @endphp
                                <b>{{ $permohonan->jenis }}</b><br>
                                <b>Nama :</b> {{ $permohonan->nama }} <br>
                                <b>Hp/Telp :</b> {{ $permohonan->hp }} <br>
                                <b>Alamat :</b> {{ $permohonan->alamat }} <br>
                                <b>Jenis Sampel :</b> {{ $permohonan->jenis_sampel }} <br>
                                <b>Spesies :</b> {{ $permohonan->spesies }} <br>
                                <b>Kode Sampel :</b> {{ $permohonan->kode_sampel }} <br>
                                <b>Negara Tujuan :</b> {{ $permohonan->negara_tujuan }} <br>
                                <b>Jumlah Sampel :</b> {{ $permohonan->jumlah_sampel }} <br>
                            </div>
                            <hr>
                            <div style="overflow: scroll; height:400px;">
                                <h5>Parameter Pengujian :</h5>
                                @php
                                    $j = 0;
                                @endphp
                                @foreach($parameters_select as $value)
                                    <div class="form-group">
                                        <p>
                                            @php
                                                $get_pr = App\Models\Parameter::where('id','=',$value->parameter_id)->first();
                                                $total += ($get_pr->harga*$value->jumlah);
                                            @endphp
                                            <b>{{ $no }}. {{ $get_pr->parameter }} <br> <span>Harga Rp {{ number_format($get_pr->harga,0,',','.') }} </span><br>
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


                                <div class="form-group mt-2 mb-4">
                                    <b>Alasan Dikembalikan :</b>
                                    <br>
                                    <p style="color: red;">{{ $permohonan->pesan_dikembalikan }}</p>
                                </div>

                                <img src="{{ asset('storage/bukti-bayar/'.$permohonan->bukti_bayar) }}" alt="bukti-bayar" style="max-width: 300px;">

                                <div class="alert alert-danger mt-4" role="alert">
                                    <p style="font-style: italic;">
                                        Apakah Anda ingin kirim Bukti Bayar Kembali jika Ya tekan kirim jika tidak tekan cancel !
                                    </p>
                                </div>
                            </div>
                            <div class="form-inline">
                                <a href="{{ route('pemohon.all.permohonan') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                <a href="{{ route('pemohon.pembayaran',['id' => $permohonan->id]) }}" class="btn btn-primary">Kirim Lagi</a>
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

