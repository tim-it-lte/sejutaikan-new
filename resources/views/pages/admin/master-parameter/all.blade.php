@extends('layouts.dashboard.master')

@section('title','Master Parameter')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/dashboard/files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <form action="{{ route('admin.parameter.all') }}" method="GET">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Pengujian</label>
                                    <select class="form-control @error('jenis_pengujian') is-invalid @enderror" id="exampleFormControlSelect1" name="jenis_pengujian">
                                        <option value="" disabled selected hidden>Pilih...</option>
                                        @foreach($jps as $jpa)
                                            <option value="{{ $jpa->id }}" {{ $jpa->id == $jp ? 'selected' : NULL }}>{{ $jpa->jenis_permohonan }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_permohonan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex mb-5">
                                    <button type="submit" class="btn btn-primary mr-2">Cari</button>
                                    <a href="{{ route('admin.parameter.all') }}" class="btn btn-danger">Reset</a>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Parameter tersedia</label>
                                    <a target="_blank" href="{{ route('admin.parameter.download') }}" class="btn btn-block btn-success">Download Laporan</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Parameter</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <span class="table-add float-right mb-5 mr-2">
                            <a style="filter: drop-shadow(3px 10px 4px black);" href="{{ route('admin.parameter.create') }}" class="btn btn-sm iq-bg-success">
                                <i class="ri-add-fill"><span class="pl-1">Tambah</span></i>
                            </a>
                        </span>
                        <div id="table" class="table-editable">
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
                            @if($c->count()>= 1)
                                <table id="data_users_side" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>Jenis Pengujian</th>
                                            <th>Parameter</th>
                                            <th>Nomor</th>
                                            <th>Harga (Rp)</th>
                                            <th>Aktif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <table id="data_side" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>Jenis Pengujian</th>
                                            <th>Parameter</th>
                                            <th>Nomor</th>
                                            <th>Harga (Rp)</th>
                                            <th>Aktif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center"><i class="text-danger">no data</i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.parameter.proses-nonaktif') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Alasan Nonaktif Paramater</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="getId" name="id">
                            <input type="text" class="form-control @error('pesan') is-invalid @enderror" name="pesan" id="exampleInputText1" placeholder="Pesan" value="{{ old('pesan') }}" autocomplete="off" autofocus required>
                            @error('pesan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/dashboard/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#data_users_side').DataTable( {
                ajax: {
                    "url" : "{{ route('admin.parameter.all-datatables',['jp' => $jp]) }}",
                    "type" : "GET"
                },
                columns: [
                    { data: 0 },
                    { data: 1 },
                    { data: 2 },
                    { data: 3 },
                    { data: 4 },
                    { data: 5 }
                ]
            });
        });
    </script>

    <script>
        function delData(id)
        {
            if(confirm("Data akan dihapus ?")){
                $.ajax({
                    url: "{{ url('/admin/master-data/delete-parameter') }}"+'/'+id,
                    type:'GET',
                    data: {},
                    success:function(data){
                        alert('Data berhasil dihapus.');
                        window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });
            }
        }

        function getId(id)
        {
            $('#getId').val(id);
        }
    </script>
    <script>
        $("#alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-success").slideUp(500);
        });

        $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-danger").slideUp(500);
        });
    </script>
@endsection
