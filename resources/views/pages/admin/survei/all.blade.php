@extends('layouts.dashboard.master')

@section('title','Survei')

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
                            <h4 class="card-title">Survei</h4>
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
                            <br>
                            <table style="font-size: 18px;">
                                <tr>
                                    <td><b>Jumlah Responden</b></td>
                                    <td><b>: {{ $c->count() }} Orang</b></td>
                                </tr>
                                <tr>
                                    <td><b>Nilai IKM:</b></td>
                                    <td><b>: {{ number_format($hasil_skm, 2, '.', '') }}% 
                                    
                                    @if($hasil_skm>=88.31 && $hasil_skm<=100)
                                        (Sangat Baik)
                                    @elseif($hasil_skm>=76.61 && $hasil_skm<=88.30)
                                        (Baik)
                                    @elseif($hasil_skm>=65 && $hasil_skm<=88.30)
                                        (Kurang Baik)
                                    @elseif($hasil_skm>=25 && $hasil_skm<=64.99)
                                        (Tidak Baik)
                                    @endif
                                    </b></td>
                                </tr>
                            </table><br><br>
                            @if($c->count()>= 1)
                                <table id="data_users_side" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tgl</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <table id="data_side" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tgl</th>
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
                    "url" : "{{ route('admin.datatable-all.survei') }}",
                    "type" : "GET"
                },
                columns: [
                    { data: 0 },
                    { data: 1 },
                    { data: 2 },
                    { data: 3 },
                    { data: 4 }
                ]
            });
        });
    </script>

    <script>
        function delData(id)
        {
            if(confirm("Data akan dihapus ?")){
                $.ajax({
                    url: "{{ url('/admin/survei/destroy') }}"+'/'+id,
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
