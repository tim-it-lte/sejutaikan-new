@extends('layouts.dashboard.master')

@section('title','Edit Pengujian')

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
                            <h4 class="mb-3">Edit Pengujian</h4>
                        </div>
                        <form method="POST" action="{{ route('pengujian.edit-pengujian-dikembalikan-proses',['id' => $permohonan->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                @php
                                    $no = 1;
                                    $total = 0;
                                @endphp
                                {{-- <b>{{ $permohonan->jenis }}</b><br>
                                <b>Nama :</b> {{ $permohonan->nama }} <br>
                                <b>Hp/Telp :</b> {{ $permohonan->hp }} <br>
                                <b>Alamat :</b> {{ $permohonan->alamat }} <br> --}}
                                <b>Jenis Sampel :</b> {{ $permohonan->jenis_sampel }} <br>
                                <b>Spesies :</b> {{ $permohonan->spesies }} <br>
                                <b>Kode Sampel :</b> {{ $permohonan->kode_sampel_lab }} <br>
                                <b>Negara Tujuan :</b> {{ $permohonan->negara_tujuan }} <br>
                                <b>Jumlah Sampel :</b> {{ $permohonan->jumlah_sampel }} <br>
                                <b>Tanggal Penjemputan :</b> {{ date('d-m-Y',strtotime($permohonan->tgl_diterima)) }} <br>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputdate">Tanggal Pengujian <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="date" class="form-control @error('tgl_pengujian') is-invalid @enderror" id="exampleInputdate" value="{{ date('Y-m-d') }}" name="tgl_pengujian">
                                @error('tgl_pengujian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            @foreach($parameters_select as $value)
                                @php
                                    $get_pr = App\Models\Parameter::where('id','=',$value->parameter_id)->first();
                                    $hasil_get = App\Models\Hasil::where([
                                        ['permohonansampel_id','=',$permohonan->id],
                                        ['jp_id','=',$value->jp_id],
                                        ['parameter_id','=',$value->parameter_id],
                                        ['permohonanparameter_id','=',$value->id]
                                    ])->get();
                                    $tmp_hasil = [];
                                    $tmp_sm = [];
                                    $tmp_mu = [];
                                    foreach($hasil_get as $h) {
                                        array_push($tmp_hasil,$h->hasil);
                                        array_push($tmp_sm,$h->standar_mutu);
                                        array_push($tmp_mu,$h->metode_uji);
                                    }
                                @endphp
                                <label for=""><b>{{ $no }}. {{ $get_pr->parameter }}</b></label>
                                <div class="form-group">
                                    <label for="{{ 'metode_uji'.$no }}">Metode Uji <i class="text-danger" style="font-size: 16px;">*</i></label>
                                    <input type="text" id="{{ 'imetode_uji'.$no }}" class="form-control @error('metode_uji'.$no) is-invalid @enderror" id="{{ 'metode_uji'.$no }}" name="{{ 'metode_uji'.$no }}" value="{{ old('metode_uji'.$no, $tmp_mu != NULL ? $tmp_mu[0] : '') }}">
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'imetode_uji'.$no }}').value += '²'">2</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'imetode_uji'.$no }}').value += '³'">3</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'imetode_uji'.$no }}').value += '⁴'">4</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'imetode_uji'.$no }}').value += '⁵'">5</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'imetode_uji'.$no }}').value += '°'">°</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'imetode_uji'.$no }}').value += '*⁾'">*)</span>
                                    @error('metode_uji'.$no)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Hasil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="{{ 'ihasil_satu'.$no }}"  class="form-control @error('hasil_satu'.$no) is-invalid @enderror" id="{{ 'hasil_satu'.$no }}" name="{{ 'hasil_satu'.$no }}" step="any" value="{{ old('hasil_satu'.$no, $tmp_hasil != NULL ? $tmp_hasil[0] : '') }}">
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_satu'.$no }}').value += '²'">2</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_satu'.$no }}').value += '³'">3</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_satu'.$no }}').value += '⁴'">4</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_satu'.$no }}').value += '⁵'">5</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_satu'.$no }}').value += '°'">°</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_satu'.$no }}').value += '*⁾'">*)</span>
                                                        @error('hasil_satu'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="{{ 'ihasil_dua'.$no }}" class="form-control @error('hasil_dua'.$no) is-invalid @enderror" id="{{ 'hasil_dua'.$no }}" name="{{ 'hasil_dua'.$no }}" step="any" value="{{ old('hasil_dua'.$no, $tmp_hasil != NULL ? $tmp_hasil[1] : '') }}">
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_dua'.$no }}').value += '²'">2</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_dua'.$no }}').value += '³'">3</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_dua'.$no }}').value += '⁴'">4</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_dua'.$no }}').value += '⁵'">5</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_dua'.$no }}').value += '°'">°</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_dua'.$no }}').value += '*⁾'">*)</span>
                                                        @error('hasil_dua'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="{{ 'ihasil_tiga'.$no }}" class="form-control @error('hasil_tiga'.$no) is-invalid @enderror" id="{{ 'hasil_tiga'.$no }}" name="{{ 'hasil_tiga'.$no }}" step="any" value="{{ old('hasil_tiga'.$no, $tmp_hasil != NULL ? $tmp_hasil[2] : '') }}">
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_tiga'.$no }}').value += '²'">2</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_tiga'.$no }}').value += '³'">3</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_tiga'.$no }}').value += '⁴'">4</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_tiga'.$no }}').value += '⁵'">5</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_tiga'.$no }}').value += '°'">°</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_tiga'.$no }}').value += '*⁾'">*)</span>
                                                        @error('hasil_tiga'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="{{ 'ihasil_empat'.$no }}" class="form-control @error('hasil_empat'.$no) is-invalid @enderror" id="{{ 'hasil_empat'.$no }}" name="{{ 'hasil_empat'.$no }}" step="any" value="{{ old('hasil_empat'.$no, $tmp_hasil != NULL ? $tmp_hasil[3] : '') }}">
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_empat'.$no }}').value += '²'">2</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_empat'.$no }}').value += '³'">3</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_empat'.$no }}').value += '⁴'">4</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_empat'.$no }}').value += '⁵'">5</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_empat'.$no }}').value += '°'">°</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_empat'.$no }}').value += '*⁾'">*)</span>
                                                        @error('hasil_empat'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="{{ 'ihasil_lima'.$no }}" class="form-control @error('hasil_lima'.$no) is-invalid @enderror" id="{{ 'hasil_lima'.$no }}" name="{{ 'hasil_lima'.$no }}" step="any" value="{{ old('hasil_lima'.$no, $tmp_hasil != NULL ? $tmp_hasil[4] : '') }}">
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_lima'.$no }}').value += '²'">2</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_lima'.$no }}').value += '³'">3</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_lima'.$no }}').value += '⁴'">4</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_lima'.$no }}').value += '⁵'">5</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_lima'.$no }}').value += '°'">°</span>
                                                        <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'ihasil_lima'.$no }}').value += '*⁾'">*)</span>
                                                        @error('hasil_lima'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr>
                                            {{-- <tr>
                                                <th scope="row">6</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control @error('hasil_enam'.$no) is-invalid @enderror" id="{{ 'hasil_enam'.$no }}" name="{{ 'hasil_enam'.$no }}" step="any" value="{{ old('hasil_enam'.$no) }}">
                                                        @error('hasil_enam'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr> --}}
                                            {{-- <tr>
                                                <th scope="row">7</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control @error('hasil_tujuh'.$no) is-invalid @enderror" id="{{ 'hasil_tujuh'.$no }}" name="{{ 'hasil_tujuh'.$no }}" step="any" value="{{ old('hasil_tujuh'.$no) }}">
                                                        @error('hasil_tujuh'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr> --}}
                                            {{-- <tr>
                                                <th scope="row">8</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control @error('hasil_delapan'.$no) is-invalid @enderror" id="{{ 'hasil_delapan'.$no }}" name="{{ 'hasil_delapan'.$no }}" step="any" value="{{ old('hasil_delapan'.$no) }}">
                                                        @error('hasil_delapan'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr> --}}
                                            {{-- <tr>
                                                <th scope="row">9</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control @error('hasil_sembilan'.$no) is-invalid @enderror" id="{{ 'hasil_sembilan'.$no }}" name="{{ 'hasil_sembilan'.$no }}" step="any" value="{{ old('hasil_sembilan'.$no) }}">
                                                        @error('hasil_sembilan'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr> --}}
                                            {{-- <tr>
                                                <th scope="row">10</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control @error('hasil_sepuluh'.$no) is-invalid @enderror" id="{{ 'hasil_sepuluh'.$no }}" name="{{ 'hasil_sepuluh'.$no }}" step="any" value="{{ old('hasil_sepuluh'.$no) }}">
                                                        @error('hasil_sepuluh'.$no)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="{{ 'standar_mutu'.$no }}">Batas Standar Mutu <i class="text-danger" style="font-size: 16px;">*</i></label>
                                    <input type="text" id="{{ 'istandar_mutu'.$no }}" class="form-control @error('standar_mutu'.$no) is-invalid @enderror" id="{{ 'standar_mutu'.$no }}" name="{{ 'standar_mutu'.$no }}" step="any" value="{{ old('standar_mutu'.$no, $tmp_sm != NULL ? $tmp_sm[0] : '') }}">
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'istandar_mutu'.$no }}').value += '²'">2</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'istandar_mutu'.$no }}').value += '³'">3</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'istandar_mutu'.$no }}').value += '⁴'">4</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'istandar_mutu'.$no }}').value += '⁵'">5</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'istandar_mutu'.$no }}').value += '°'">°</span>
                                    <span class="ml-2 btn btn-sm btn-dark mt-2" style="font-size: 8px;" onclick="document.getElementById('{{ 'istandar_mutu'.$no }}').value += '*⁾'">*)</span>
                                    @error('standar_mutu'.$no)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <hr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                            <br>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-warning">
                                        <tr>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                </table>
                                @php
                                    $keterangan_get = App\Models\Keterangan::where('permohonansampel_id','=',$permohonan->id)->get();
                                    $tmp_ket = [];
                                    foreach($keterangan_get as $kt) {
                                        array_push($tmp_ket, $kt->keterangan);
                                    }
                                @endphp
                                <tbody>
                                    @for($x = 0; $x <= 4; $x++)
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="keterangan[]" autocomplete="off" placeholder="keterangan...." value="{{ $tmp_ket != NULL ? $tmp_ket[$x] : '' }}">
                                            </div>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </div>
                            {{-- <div style="overflow: scroll; height:400px;">
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
                            </div> --}}
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

