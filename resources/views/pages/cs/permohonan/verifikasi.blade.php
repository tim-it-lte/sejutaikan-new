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
                            <h4 class="mb-3">Verifikasi Permohonan</h4>
                            <img src="{{ asset('app-assets/dashboard/images/permohonan.png') }}" alt="permohonan pengujian" style="max-width: 200px;">
                        </div>
                        <form class="mt-5" method="POST" action="{{ route('cs.verifikasi-data.permohonan',['id' => $permohonan->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                @if($permohonan->jenis == 'Perorangan')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="perorangan" name="jenis" class="custom-control-input" checked="checked" value="Perorangan">
                                        <label class="custom-control-label" for="perorangan"> Perorangan </label>
                                    </div>
                                @endif
                                @if($permohonan->jenis == 'Perusahaan')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="perusahaan" name="jenis" class="custom-control-input" value="Perusahaan" checked="checked">
                                        <label class="custom-control-label" for="perusahaan"> Perusahaan </label>
                                    </div>
                                @endif
                                @if($permohonan->jenis == 'Sub Kontrak')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sub-kontrak" name="jenis" class="custom-control-input" value="Sub Kontrak" checked="checked">
                                        <label class="custom-control-label" for="sub-kontrak"> Sub Kontrak </label>
                                    </div>
                                @endif
                                @if($permohonan->jenis == 'Lainnya')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="lainnya" name="jenis" class="custom-control-input" value="Lainnya" checked="checked">
                                        <label class="custom-control-label" for="lainnya"> Lainnya </label>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama :</label>
                                <span>{{ $permohonan->nama }}</span>
                            </div>
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan :</label>
                                <span>{{ $permohonan->perusahaan }}</span>
                            </div>
                            <div class="form-group">
                                <label for="hp">HP/Telp :</label>
                                <span>{{ $permohonan->hp }}</span>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <span>{{ $permohonan->alamat }}</span>
                            </div>
                            <div class="form-group">
                                <label for="jenis_sampel">Jenis Sampel :</label>
                                <span>{{ $permohonan->jenis_sampel }}</span>
                            </div>
                            <div class="form-group">
                                <label for="spesies">Spesies :</label>
                                <span>{{ $permohonan->spesies }}</span>
                            </div>
                            <div class="form-group">
                                <label for="kode_sampel">Kode Sampel :</label>
                                <span>{{ $permohonan->kode_sampel }}</span>
                            </div>
                            <div class="form-group">
                                <label for="negara_tujuan">Negara Tujuan :</label>
                                <span>{{ $permohonan->negara_tujuan }}</span>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sampel">Jumlah Sampel :</label>
                                <span>{{ $permohonan->jumlah_sampel }}</span>
                            </div>
                        <div class="col-md-12">
                        <hr>
                        <h5 class="mt-3"><b>Jenis Parameter Pengujian</b></h5>
                        <div style="overflow: scroll; height:400px;">
                            @php
                                $no = 1;
                            @endphp
                            @foreach($parameters_select as $value)

                                    @php
                                        $pr = App\Models\Parameter::where('id','=',$value->parameter_id)->first();
                                    @endphp
                                    <div class="form-group text-dark">
                                        <p>
                                            <b>{{ $no }}. &nbsp;&nbsp;&nbsp;<input id="{{ $value->parameter_id }}" type="checkbox" name="parameters[]" value="{{ $value->parameter_id }}" checked="checked"></b>
                                            <label for="{{ $value->id }}">{{ $pr->parameter }}</label><br>
                                            <span class="text-danger">Harga Rp {{ number_format($value->harga,0,',','.') }} </span><br>

                                            <div id="jumlah">
                                                <span class="btn btn-sm btn-danger" data-decrease>-</span>
                                                <input class="col-4 col-md-2" name="jumlahs[]" type="number" data-value value="{{ $value->jumlah }}" readonly />
                                                <span class="btn btn-sm btn-danger" data-increase>+</span>
                                            </div>

                                        </p>
                                        <hr>
                                    </div>

                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </div>
                        {{-- <span class="text-danger">Total Harga Rp. {{ number_format($permohonan->total,0,',','.') }}</span><br> --}}
                        <button type="submit" class="mt-5 btn btn-primary">Verifikasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $('[data-decrease]').click(decrease);
            $('[data-increase]').click(increase);
            $('[data-value]').change(valueChange);
        });

        function decrease() {
            var value = $(this).parent().find('[data-value]').val();
                if(value > 1) {
                value--;
                $(this).parent().find('[data-value]').val(value);
            }
        }

        function increase() {
            var value = $(this).parent().find('[data-value]').val();
            if(value < 100) {
                value++;
                $(this).parent().find('[data-value]').val(value);
            }
        }

        function valueChange() {
            var value = $(this).val();
            if(value == undefined || isNaN(value) == true || value <= 0) {
                $(this).val(1);
            } else if(value >= 101) {
                $(this).val(100);
            }
        }
    </script>
@endsection

