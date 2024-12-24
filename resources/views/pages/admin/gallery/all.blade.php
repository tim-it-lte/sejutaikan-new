@extends('layouts.dashboard.master')

@section('title', 'Galeri')

@section('link')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Galeri</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                    	<div class="d-flex mb-3 ml-2 mb-5">
                            <button class="btn btn-primary" style="filter: drop-shadow(3px 10px 4px black);" type="button" data-toggle="collapse" data-target="#collapseFormGallery" aria-expanded="false" aria-controls="collapseFormGallery"><i class="ri-add-fill"></i><span class="pl-1">Tambah gambar</span></button>
                    	</div>
                        <div class="collapse" id="collapseFormGallery">
                            <div class="card card-body mb-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-9 col-lg-6">
                                        <form method="POST" action="{{ route('admin.gallery.add') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input " id="customFile" name="img" accept="image/*" required>
                                                    <label class="custom-file-label" for="customFile">Pilih gambar</label>
                                                </div>
                                                @error('img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Deskripsi</label>
                                                <input type="text" class="form-control " name="description" id="description">
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($galleries) < 1)
                        <h6 class="text-center text-muted">Belum ada gambar.</h6>
                        @else
                        <div class="row">
                        	@foreach($galleries as $gambar)
                        	<div class="col-12 col-md-6 col-lg-4">
                        		<div class="h-full card bg-dark text-white">
                        			<img src="{{ asset('storage/galeri/'.$gambar->filename) }}" class="card-img" alt="Foto {{ $gambar->description }}">
                        			<div class="card-img-overlay d-flex flex-column p-2">
                                        <a href="{{ route('admin.gallery.destroy', [ 'id' => $gambar->id ]) }}" class="btn btn-danger ml-auto shadow">Hapus</a>
                                        @if($gambar->description)
                        				<p class="card-text text-center mx-auto mt-auto">{{ $gambar->description }}</p>
                            			@endif
                        			</div>
                        		</div>
                        	</div>
                        	@endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')