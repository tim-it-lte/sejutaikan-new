@extends('layouts.dashboard.master')

@section('title','Detail Pengujian')

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
                            <h4 class="mb-3">Detail Pengujian</h4>

                                <span style="float: right;"><a href="{{ route('pimpinan.all.permohonan') }}" class="btn btn-sm btn-primary"><i class="fa fa-undo"></i>kembali</a></span>

                        </div>
                        <form>
                            <div class="mb-5">
                                @php
                                    $no = 1;
                                    $total = 0;
                                @endphp
                                <b>{{ $permohonan->jenis }}</b><br>
                                <b>Nama :</b> {{ $permohonan->nama }} <br>
                                <b>Nama :</b> {{ $permohonan->perusahaan }} <br>
                                <b>Hp/Telp :</b> {{ $permohonan->hp }} <br>
                                <b>Alamat :</b> {{ $permohonan->alamat }} <br>
                                <b>Jenis Sampel :</b> {{ $permohonan->jenis_sampel }} <br>
                                <b>Spesies :</b> {{ $permohonan->spesies }} <br>
                                <b>Kode Sampel :</b> {{ $permohonan->kode_sampel_lab }} <br>
                                <b>Negara Tujuan :</b> {{ $permohonan->negara_tujuan }} <br>
                                <b>Jumlah Sampel :</b> {{ $permohonan->jumlah_sampel }} <br>
                                <b>Tanggal Penjemputan :</b> {{ date('d-m-Y',strtotime($permohonan->tgl_diterima)) }} <br>
                                <b>Tanggal Pengujian :</b> {{ date('d-m-Y',strtotime($permohonan->tgl_pengujian)) }} <br>
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
                                        @foreach($parameters_select as $param)
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
                                            <td>{{ $hasil_->metode_uji }}</td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
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

