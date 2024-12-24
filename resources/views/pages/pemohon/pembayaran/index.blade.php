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
                        <form class="mt-5" method="POST" action="{{ route('pemohon.proses-pembayaran',['id' => $permohonan->id]) }}" enctype="multipart/form-data">
                            @csrf
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


                                <div class="form-group mt-2 mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="customFile" name="foto" accept="image/*" onchange="loadFile(event)">
                                        <label class="custom-file-label" for="customFile">Upload Bukti Bayar</label>
                                    </div>
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2 mb-5">
                                    <img id="output" style="width: 30%;" />
                                </div>


                                <div class="alert alert-danger" role="alert">
                                    <p style="font-style: italic;">
                                        Apakah Anda Yakin dengan Data yang anda ingin kirim jika Ya tekan kirim jika tidak tekan cancel !
                                    </p>
                                </div>
                            </div>
                            <div class="form-inline">
                                <a href="{{ route('pemohon.all.permohonan') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
</script>
@endsection

