@extends('layouts.dashboard.master')

@section('title','Daftar Permohonan')

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
                            <form action="{{ route('keuangan.sudah-pembayaran') }}" method="GET">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tahun</label>
                                    <select class="form-control @error('tahun') is-invalid @enderror" id="exampleFormControlSelect1" name="tahun">
                                        <option value="" disabled selected hidden>Pilih...</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->year }}" {{ $tahun == $year->year ? 'selected' : NULL }}>{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary btn-block">Cari</button>
                                <a href="{{ route('keuangan.sudah-pembayaran-cetak',['tahun' => $tahun]) }}" class="btn btn-sm btn-success btn-block">Export</a>
                                <a href="{{ route('keuangan.sudah-pembayaran') }}" class="btn btn-sm btn-danger btn-block">Reset</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Daftar Permohonan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
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
                                            <th>Kode Permohonan</th>
                                            <th>Nama Pemohon</th>
                                            <th>Tanggal Permohonan</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status Permohonan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <table id="data_side" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Kode Permohonan</th>
                                            <th>Nama Pemohon</th>
                                            <th>Tanggal Permohonan</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status Permohonan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center"><i class="text-danger">no data</i></td>
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
                    "url" : "{{ route('keuangan.sudah-pembayaran-datatable',['tahun' => $tahun]) }}",
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
        $("#alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-success").slideUp(500);
        });

        $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-danger").slideUp(500);
        });
    </script>
@endsection
