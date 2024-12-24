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
                        <form class="mt-5" method="POST" action="{{ route('pemohon.verifikasi-ajuan-permohonan') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="perorangan" name="jenis" class="custom-control-input" checked="checked" value="Perorangan">
                                    <label class="custom-control-label" for="perorangan"> Perorangan </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="perusahaan" name="jenis" class="custom-control-input" value="Perusahaan">
                                    <label class="custom-control-label" for="perusahaan"> Perusahaan </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sub-kontrak" name="jenis" class="custom-control-input" value="Sub Kontrak">
                                    <label class="custom-control-label" for="sub-kontrak"> Sub Kontrak </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="lainnya" name="jenis" class="custom-control-input" value="Lainnya">
                                    <label class="custom-control-label" for="lainnya"> Lainnya </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleInputText1" placeholder="Nama" value="{{ old('nama') }}" autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" id="exampleInputText4" placeholder="..." value="{{ old('perusahaan') }}">
                                @error('perusahaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hp">HP/Telp <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" id="exampleInputText1" placeholder="..." value="{{ old('hp') }}">
                                @error('hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="exampleInputText2" placeholder="..." value="{{ old('alamat') }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_sampel">Jenis Sampel <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('jenis_sampel') is-invalid @enderror" name="jenis_sampel" id="exampleInputText3" placeholder="..." value="{{ old('jenis_sampel') }}">
                                @error('jenis_sampel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="spesies">Spesies <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('spesies') is-invalid @enderror" name="spesies" id="exampleInputText4" placeholder="..." value="{{ old('spesies') }}">
                                @error('spesies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode_sampel">Kode Sampel <i class="text-danger" style="font-size: 10px;">Wajib diisi</i></label>
                                <input type="text" class="form-control @error('kode_sampel') is-invalid @enderror" name="kode_sampel" id="exampleInputText5" placeholder="..." value="{{ old('kode_sampel') }}">
                                @error('kode_sampel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="negara_tujuan">Negara Tujuan <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('negara_tujuan') is-invalid @enderror" name="negara_tujuan" id="exampleInputText6" placeholder="..." value="{{ old('negara_tujuan') }}">
                                @error('negara_tujuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sampel">Jumlah Sampel <i class="text-danger" style="font-size: 10px;">Tidak Wajib diisi</i></label>
                                <input type="text" class="form-control @error('jumlah_sampel') is-invalid @enderror" name="jumlah_sampel" id="exampleInputText7" placeholder="..." value="{{ old('jumlah_sampel') }}">
                                @error('jumlah_sampel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Permohonan Pengujian <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <select class="form-control @error('jenis_permohonan') is-invalid @enderror" id="exampleFormControlSelect1" name="jenis_permohonan">
                                    <option value="" disabled selected hidden>Pilih...</option>
                                    @foreach($jps as $jp)
                                        <option value="{{ $jp->id }}">{{ $jp->jenis_permohonan }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_permohonan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="col-md-12">
                        <hr>
                        <h5 class="mt-3 mb-2"><b>Pilih Parameter Pengujian</b></h5>
                        <br>
                        <div id="media" style="overflow: scroll; height:400px;">
                            @foreach($parameters as $value)
                                @if($value->aktif == 1)
                                    <div class="form-group text-dark {{ 'parameter'.$value->jp_id }}">
                                        <p>
                                            @php
                                                $getJP_ = App\Models\Jp::where('id','=',$value->jp_id)->first();
                                            @endphp
                                            <b>- &nbsp;&nbsp;&nbsp;<input id="{{ $value->id }}" type="checkbox" name="parameters[]" value="{{ $value->id }}" onclick="handleSelect(this);"></b>
                                            <label for="{{ $value->id }}">{{ $value->parameter }} <span class="text-danger" style="font-style: italic;">({{ $getJP_->jenis_permohonan }})</span></label><br>
                                            <span class="text-danger">Harga Rp {{ number_format($value->harga,0,',','.') }} </span><br>
                                            <div id="jumlah{{ $value->id }}" style="display: none;">
                                                <span class="btn btn-sm btn-danger" data-decrease>-</span>
                                                <input class="col-4 col-md-2" type="number" data-value value="0" readonly />
                                                <span class="btn btn-sm btn-danger" data-increase>+</span>
                                            </div>

                                        </p>
                                        <hr>
                                    </div>
                                @else
                                    <div class="form-group text-dark {{ 'parameter'.$value->jp_id }}">
                                        <p>
                                            <b>- &nbsp;&nbsp;&nbsp;<input id="{{ $value->id }}" type="checkbox" name="parameters[]" value="{{ $value->id }}" onclick="handleSelect(this);" disabled>
                                            </b>
                                            <label for="{{ $value->id }}">{{ $value->parameter }}</label> <span class="text-danger" style="font-style: italic;">({{ $value->pesan }})</span><br>
                                            {{-- <span class="text-danger">Harga Rp {{ number_format($value->harga,0,',','.') }} </span><br> --}}
                                        </p>
                                        <hr>
                                    </div>
                                @endif
                            @endforeach
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
    <script>
        function handleClick(cb) {
            if (cb.checked == true) {
                var numItems = $('.parameter'+cb.value).length;
                for (var i = 0; i <= numItems; i++) {
                    document.getElementsByClassName("parameter"+cb.value)[i].setAttribute("style","display: inline;");
                }
            }else{
                var numItems = $('.parameter'+cb.value).length;
                for (var i = 0; i <= numItems; i++) {
                    document.getElementsByClassName("parameter"+cb.value)[i].setAttribute("style","display: none;");
                }
            }
        }

        function handleSelect(cb) {
            if (cb.checked == true) {
                document.getElementById("jumlah"+cb.value).setAttribute("style","display: inline;");
                var c = document.getElementById("jumlah"+cb.value).children;
                c[1].setAttribute('name','jumlahs[]');
            }else{
                document.getElementById("jumlah"+cb.value).setAttribute("style","display: none;");
                var c = document.getElementById("jumlah"+cb.value).children;
                c[1].removeAttribute("name");
            }
        }
    </script>
@endsection

