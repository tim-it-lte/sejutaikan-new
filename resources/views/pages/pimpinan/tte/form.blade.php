@extends('layouts.dashboard.master')

@section('title','TTE')

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
                            <h4 class="mb-3">TTE</h4>
                        </div>
                        <form class="mt-5" method="POST" action="{{ route('pimpinan.tte.post',['id' => $id]) }}" enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('success'))
                            <div id="alert-success" class="alert alert-success alert-with-border" role="alert">
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div id="alert-danger" class="alert alert-danger alert-with-border" role="alert">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="passphrase">Passphrase <i class="text-danger" style="font-size: 16px;">*</i></label>
                                <input type="password" class="form-control @error('passphrase') is-invalid @enderror" name="passphrase" id="exampleInputText1" placeholder="...." value="{{ old('passphrase') }}" autocomplete="off" autofocus>
                                @error('passphrase')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <hr>
                        <button type="submit" class="mt-5 btn btn-primary">Submit</button>
                        </form>
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

