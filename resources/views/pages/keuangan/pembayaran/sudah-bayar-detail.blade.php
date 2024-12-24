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
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('keuangan.sudah-pembayaran') }}" class="btn btn-sm btn-primary"><i class="fa fa-undo"></i>kembali</a>
                            <a target="_blank" href="{{ route(('keuangan.sudah-membayar-detail.cetak-sk'), $permohonan->id) }}" class="ml-4 btn btn-sm btn-warning"><i class="fa fa-file-pdf-o"></i>Cetak SK</a>
                        </div>
                        <h4 class="mb-3 text-center">Detail Permohonan Pengujian</h4>
                        <form>
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

                                <div class="mb-5">
                                    <label>Bukti Bayar</label>
                                    <img src="{{ asset('storage/bukti-bayar/'.$permohonan->bukti_bayar) }}" alt="bukti-bayar" style="width: 50%">
                                </div>

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

