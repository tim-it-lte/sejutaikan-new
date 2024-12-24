@extends('layouts.dashboard.master')

@section('title','Semua Permohonan Sampel')

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
                            <form action="{{ route('cs.all.permohonan-sampel') }}" method="GET">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tahun</label>
                                    <select class="form-control @error('tahun') is-invalid @enderror" id="exampleFormControlSelect1" name="tahun">
                                        <option value="" disabled selected hidden>Pilih...</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->year }}" {{ $get_tahun == $year->year ? 'selected' : NULL }}>{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Bulan</label>
                                    <select class="form-control @error('bulan') is-invalid @enderror" id="exampleFormControlSelect2" name="bulan">
                                        <option value="" disabled selected hidden>Pilih...</option>
                                        <option value="01" {{ $get_bulan == '01' ? 'selected' : NULL }}>Januari</option>
                                        <option value="02" {{ $get_bulan == '02' ? 'selected' : NULL }}>Februari</option>
                                        <option value="03" {{ $get_bulan == '03' ? 'selected' : NULL }}>Maret</option>
                                        <option value="04" {{ $get_bulan == '04' ? 'selected' : NULL }}>April</option>
                                        <option value="05" {{ $get_bulan == '05' ? 'selected' : NULL }}>Mei</option>
                                        <option value="06" {{ $get_bulan == '06' ? 'selected' : NULL }}>Juni</option>
                                        <option value="07" {{ $get_bulan == '07' ? 'selected' : NULL }}>Juli</option>
                                        <option value="08" {{ $get_bulan == '08' ? 'selected' : NULL }}>Agustus</option>
                                        <option value="09" {{ $get_bulan == '09' ? 'selected' : NULL }}>September</option>
                                        <option value="10" {{ $get_bulan == '10' ? 'selected' : NULL }}>Oktober</option>
                                        <option value="11" {{ $get_bulan == '11' ? 'selected' : NULL }}>November</option>
                                        <option value="12" {{ $get_bulan == '12' ? 'selected' : NULL }}>Desember</option>
                                    </select>
                                    @error('tahun')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary btn-block">Cari</button>
                                <a href="{{ route('cs.all.permohonan-sampel') }}" class="btn btn-sm btn-danger btn-block">Reset</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Daftar Semua Permohonan</h4>
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
                            <div class="table-responsive">
                                @if($c->count()>= 1)
                                    <table id="data_users_side" class="table table-bordered table-responsive-md table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pemohon</th>
                                                <th>Telp</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                @else
                                    <table id="data_side" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pemohon</th>
                                                <th>Telp</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7" class="text-center"><i class="text-danger">no data</i></td>
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
                    "url" : "{{ route('cs.datatable-all-permohonan-sampel',['tahun' => $get_tahun, 'bulan' => $get_bulan]) }}",
                    "type" : "GET"
                },
                columns: [
                    { data: 0 },
                    { data: 1 },
                    { data: 2 },
                    { data: 3 },
                    { data: 4 },
                    { data: 5 },
                    { data: 6 }
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
