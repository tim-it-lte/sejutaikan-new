@extends('layouts.landing.master')

@section('title','Survei')

@section('content')
    <div class="r-bg-a pt85 pb120">
        <div class="container w-992">
            <div class="row pt80">
                <div class="col-lg-12">
                    <div class="page-headings text-center">
                        <ul class="breadcrus mb20">
                            <li class="bread-non"><a href="{{ route('/') }}">Beranda</a></li>
                            <li>&nbsp;/&nbsp;</li>
                            <li class="bread-active"><a href="#">Survei</a></li>
                        </ul>
                        <h1>Form Survei Kepuasaan Masyarakat</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="r-bg-x pb120">
        <div class="container w-992">
            <div class="blog-details">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sol-img mt60"></div>
                        <div class="ree-blog-details">

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
    <div class="accordion" id="accordionSurvei">
    	<div class="card">
    		<div class="card-header" id="headingOne">
    			<h6 class="mb-0 text-primary ml-3 font-weight-normal">Data Pribadi</h6>
    		</div>
    		<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionSurvei">
    			<div class="card-body">
    				<div class="form-row">
    					<div class="col-md px-4">
    						<p class="mb-5"><small>Silahkan isi data pribadi anda terlebih dahulu. Pastikan data yang anda masukkan adalah benar sebelum mengisi kueioner.</small></p>
    						<div class="form-group mb-4">
						        <label for="nama">Nama Lengkap <i class="text-danger" style="font-size: 14px;">*</i></label>
						        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"  autocomplete="off" autofocus>
						    @if($errors->has('nama'))
						        <span class="form-text text-muted text-danger">{{ $errors->first('nama') }}</span>
						    @endif
						    </div>
						    <div class="form-group mb-4">
						        <label>Jenis Kelamin <i class="text-danger" style="font-size: 14px;">*</i></label>
							    <div class="px-4 pt-4 pb-2 border rounded d-flex flex-wrap">
							    	<div class="form-check form-check-inline mb-2">
							            <input class="form-check-input" name="jenis_kelamin" type="radio" value="Laki-laki" id="jkelL" checked>
							            <label class="form-check-label" for="jkelL">Laki-laki</label>
							        </div>
							        <div class="form-check form-check-inline mb-2">
							            <input class="form-check-input" name="jenis_kelamin" type="radio" value="Perempuan" id="jkelP">
							            <label class="form-check-label" for="jkelP">Perempuan</label>
							        </div>
							    </div>
						    @if($errors->has('jenis_kelamin'))
						        <span class="form-text text-muted text-danger">{{ $errors->first('jenis_kelamin') }}</span>
						    @endif
						    </div>
    					</div>
    					<div class="col-md px-4">
						    <div class="form-group mt-md-5 mb-4">
	                            <label for="email">Email <i class="text-danger" style="font-size: 14px;">*</i></label>
	                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="off">
                            @if($errors->has('email'))
	                            <span class="form-text text-muted text-danger">{{ $errors->first('email') }}</span>
                            @endif
	                        </div>
    						<div class="form-group mb-4">
                                <label>Pekerjaan <i class="text-danger" style="font-size: 14px;">*</i></label>
                                <div class="px-4 pt-4 pb-2 border rounded d-flex flex-wrap">
                                	<div class="form-check form-check-inline mb-2">
	                                	<input class="form-check-input" name="pekerjaan" type="radio" value="Pelajar/Mahasiswa" id="Mahasiswa" checked>
	                                    <label class="form-check-label" for="Mahasiswa">Pelajar/Mahasiswa</label>
	                                </div>
	                                <div class="form-check form-check-inline mb-2">
	                                    <input class="form-check-input" name="pekerjaan" type="radio" value="PNS" id="PNS">
	                                    <label class="form-check-label" for="PNS">PNS</label>
	                                </div>
	                                <div class="form-check form-check-inline mb-2">
	                                    <input class="form-check-input" name="pekerjaan" type="radio" value="TNI" id="TNI">
	                                    <label class="form-check-label" for="TNI">TNI</label>
	                                </div>
	                                <div class="form-check form-check-inline mb-2">
	                                    <input class="form-check-input" name="pekerjaan" type="radio" value="POLRI" id="POLRI">
	                                    <label class="form-check-label" for="POLRI">POLRI</label>
	                                </div>
	                                <div class="form-check form-check-inline mb-2">
	                                    <input class="form-check-input" name="pekerjaan" type="radio" value="BUMN" id="BUMN">
	                                    <label class="form-check-label" for="BUMN">BUMN</label>
	                                </div>
	                                <div class="form-check form-check-inline mb-2">
	                                    <input class="form-check-input" name="pekerjaan" type="radio" value="Pegawai" id="Pegawai">
	                                    <label class="form-check-label" for="Pegawai">Pegawai Swasta</label>
	                                </div>
	                                <div class="form-check form-check-inline mb-2">
	                                    <input class="form-check-input" name="pekerjaan" type="radio" value="Wiraswasta" id="Wiraswasta">
	                                    <label class="form-check-label" for="Wiraswasta">Wiraswasta</label>
	                                </div>
                                </div>
                            @if($errors->has('pekerjaan'))
                                <span class="form-text text-muted text-danger">{{ $errors->first('pekerjaan') }}</span>
                            @endif
                            </div>
    					</div>
    				</div>
                    <div class="d-flex align-items-center mx-5">
                    	<button class="btn btn-danger collapsed ml-auto" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Buka Survei</button>
                    </div>
    			</div>
    		</div>
    	</div>

    	<div class="card">
    		<div class="card-header" id="headingTwo">
    			<h6 class="mb-0 text-primary ml-3 font-weight-normal">Survei Kuesioner</h6>
    		</div>
    		<div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSurvei">
    			<div class="card-body">
    				<table class="table table-striped table-hover table-bordered">
    				@php
	                	$no = 1;
	                @endphp
	                
	                 <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Pertanyaan</th>
                                    <th class="text-center" colspan="6">Pilihan Jawaban</th>
                                </tr>
                    </thead>
	                @foreach($pertanyaan as $item)
		                <tr>
		                	<!--<td>-->
		                	    <td style=" width: 30px;">
		                	        {{ $no }}
		                	    </td>
		                	    <td  style=" width: 400px;">
		                	        {{ $item->pertanyaan }}
		                		   
		                		 </td>
		                		<!--<div class="px-4 pt-3 pb-4 d-flex flex-wrap">-->
		                		<!--<td>-->
		            			@foreach($item->options as $opt)
		            			    <td>
    		            				<div class="form-check form-check-inline mb-2">
    							            <input class="form-check-input" name="jawab_{{ $no }}" type="radio" value="{{ $opt->id }}" id="jawab{{ $no.$opt->id }}" required="required">
    							            <label class="form-check-label" for="jawab{{ $no.$opt->id }}">
    							            	<small>{{ $opt->option }}</small>
    							            </label>
    							        </div> 
							        </td>
		                        @endforeach
		                        <!--</td>-->
		                		<!--</div>-->
		                    <!--</td>-->
		                </tr>
		                @php
					    	$no++;
					    @endphp
					@endforeach
    				</table>
					<div class="d-flex align-items-center mx-md-5 mt-4">
	                	<button class="btn btn-secondary collapsed ml-auto mr-4" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Kembali</button>
	                	<button class="btn btn-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Lanjutkan</button>
	                </div>
    			</div>
    		</div>
    	</div>
    	<div class="card">
    		<div class="card-header" id="headingThree">
    			<h6 class="mb-0 text-primary ml-3 font-weight-normal">Kirim Jawaban</h6>
    		</div>
    		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSurvei">
    			<div class="card-body">
    				<div class="mb-5">
	                	<button class="btn btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Kembali</button>
	                </div>
	                <div class="row justify-content-center">
	                	<div class="col-md-6">
	                		<div class="form-group mb-4">
		                        <label for="saran" class="mb-4">Tuliskan komentar/usulan Saudara terhadap kemajuan dan pengembangan pelayanan kepuasan masyarakat </label>
		                        <textarea name="saran" class="form-control" id="saran" rows="4"></textarea>
		                    </div>
		                    <button class="btn btn-block btn-danger" type="submit">Kirim Jawaban</button>
	                	</div>
	                </div>
    			</div>
    		</div>
    	</div>
    </div>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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