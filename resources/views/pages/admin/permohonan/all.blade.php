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
            <div class="col-sm-12">
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
                                            <th>No</th>
                                            <th>Kode Permohonan</th>
                                            <th>Tanggal Permohonan</th>
                                            <th>Nama Pemohon</th>
                                            <th>Telp/HP</th>
                                            <th>Alamat</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status Permohonan</th>
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <table id="data_side" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Permohonan</th>
                                            <th>Tanggal Permohonan</th>
                                            <th>Nama Pemohon</th>
                                            <th>Telp/HP</th>
                                            <th>Alamat</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status Permohonan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="8" class="text-center"><i class="text-danger">no data</i></td>
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
        $(function() {
            $('#data_users_side').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.datatable-all.permohonan') }}",
            });
        });
    </script>

    <script>
        function delData(id)
        {
            if(confirm("Data akan dihapus ?")){
                $.ajax({
                    url: "{{ url('/admin/permohonan/destroy') }}"+'/'+id,
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
