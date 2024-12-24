@extends('layouts.dashboard.master')

@section('title','Detail Survei')

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
                            <form>
                                <div class="form-group row">
                                    <label class="col-md-2">Nama</label>
                                    <div class="col-md-10" style="margin-bottom: 15px;">
                                        {{ $result->nama }}
                                    </div>
                                    <label class="col-md-2">Email</label>
                                    <div class="col-md-10" style="margin-bottom: 15px;">
                                        {{ $result->email }}
                                    </div>
                                    <label class="col-md-2">Pekerjaan</label>
                                    <div class="col-md-10" style="margin-bottom: 15px;">
                                        {{ $result->pekerjaan }}
                                    </div>
                                    <label class="col-md-2">Jenis Kelamin</label>
                                    <div class="col-md-10" style="margin-bottom: 15px;">
                                        {{ $result->jenis_kelamin }}
                                    </div>
                                    <label class="col-md-2">Saran</label>
                                    <div class="col-md-10" style="margin-bottom: 15px;">
                                        {{ $result->saran }}
                                    </div>
                                    <div class="col-md-12">
                                        @php
                                        $pertanyaans = App\Models\Pertanyaan::all();

                                        $no = 1;
                                        @endphp

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    @foreach($pertanyaans as $pertanyaan)
                                                    <tr>
                                                        <th scope="row">{{ $no }}</th>
                                                        <td>{{ $pertanyaan->pertanyaan }}</td>
                                                        <td>
                                                            @php
                                                            $hasil = App\Models\Survei::where([
                                                                ['pertanyaan_id','=',$no],
                                                                ['responden_id','=',$result->id],
                                                            ])->first();
                                                            $jawab = App\Models\Optionkuisioners::where('id','=',$hasil->jawaban)->first();
                                                            @endphp
                                                            {{ $jawab ? $jawab->option : '' }}
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $no++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
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
        $("#alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-success").slideUp(500);
        });

        $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-danger").slideUp(500);
        });
    </script>
@endsection
