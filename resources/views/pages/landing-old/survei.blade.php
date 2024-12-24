@extends('layouts.landing.master')

@section('title','Survei')

@section('content')
    <section class="main-contact inner-page-contact mt-5">
        <div class="sec-shape">
            <span class="shape shape1"><img src="assets/images/shape3.png" alt="Shape"></span>
            <span class="shape shape2"><img src="assets/images/shape4.png" alt="Shape"></span>
        </div>
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <h2 style="text-align: center;">Form Survei Kepuasan Masyarakat</h2><br>
                @if(session()->has('success'))
                <div id="alert-success" class="alert alert-success alert-with-border" style="background-color: rgba(92,146,15,0.5) !important;" role="alert">
                    <i class="fa fa-check"></i> {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div id="alert-danger" class="alert alert-danger alert-with-border" role="alert">
                    {{ session()->get('error') }}
                </div>
                @endif
                <form action="{{ route('landing.proses-survei') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lengkap <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"  autocomplete="off" autofocus>
                        @if($errors->has('nama'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <div class="form-check">
                            <input class="form-check-input" name="jenis_kelamin" type="radio" value="Laki-laki" id="Laki-laki" checked>
                            <label class="form-check-label" for="Laki-laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="jenis_kelamin" type="radio" value="Perempuan" id="Perempuan">
                            <label class="form-check-label" for="Perempuan">
                                Perempuan
                            </label>
                        </div>
                        @if($errors->has('jenis_kelamin'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for=""> Pekerjaan <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <div class="form-check">
                            <input class="form-check-input" name="pekerjaan" type="radio" value="Pelajar/Mahasiswa" id="Mahasiswa" checked>
                            <label class="form-check-label" for="Mahasiswa">
                                Pelajar/Mahasiswa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="pekerjaan" type="radio" value="PNS" id="PNS">
                            <label class="form-check-label" for="PNS">
                                PNS
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="pekerjaan" type="radio" value="TNI" id="TNI">
                            <label class="form-check-label" for="TNI">
                                TNI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="pekerjaan" type="radio" value="POLRI" id="POLRI">
                            <label class="form-check-label" for="POLRI">
                                POLRI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="pekerjaan" type="radio" value="BUMN" id="BUMN">
                            <label class="form-check-label" for="BUMN">
                                BUMN
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="pekerjaan" type="radio" value="Pegawai" id="Pegawai">
                            <label class="form-check-label" for="Pegawai">
                                Pegawai Swasta
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="pekerjaan" type="radio" value="Wiraswasta" id="Wiraswasta">
                            <label class="form-check-label" for="Wiraswasta">
                                Wiraswasta
                            </label>
                        </div>
                        @if($errors->has('pekerjaan'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('pekerjaan') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email <i class="text-danger" style="font-size: 14px;">*</i></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="off">
                        @if($errors->has('email'))
                        <span class="form-text text-muted text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h3><b>Pertanyaan - Pertanyaan Kuesioner</b></h3>
                        <div style="overflow: scroll; height:400px;">
                            @php
                            $pertanyaans = App\Models\Pertanyaan::all();
                            $no = 1;
                            @endphp
                            @foreach($pertanyaans as $value)
                            <div class="form-group">
                                <p><b>{{ $no }}. </b> {{ $value->pertanyaan }}  <br>
                                    <div style="margin-left:30px;">
                                        <input type="radio" name="jawab_{{ $no }}" value="Sangat Baik">Sangat Baik<br>
                                        <input type="radio" name="jawab_{{ $no }}" value="Baik">Baik<br>
                                        <input type="radio" name="jawab_{{ $no }}" value="Cukup">Cukup Baik<br>
                                        <input type="radio" name="jawab_{{ $no }}" value="Tidak Baik">Tidak Baik<br>
                                    </div>
                                </p>
                                <hr>
                            </div>

                            @php
                            $no++;
                            @endphp
                            @endforeach

                            <div class="form-group">
                                <p>Tuliskan komentar/usulan Saudara terhadap kemajuan dan pengembangan pelayanan kepuasan masyarakat </p>
                                <textarea name="saran" class="form-control"></textarea>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-success"> SIMPAN </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $("#alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-success").slideUp(500);
        });

        $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-danger").slideUp(500);
        });
    </script>
@endsection
