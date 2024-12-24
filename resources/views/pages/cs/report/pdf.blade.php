<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Report</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
           table, td, th {
              /*border: 1px solid black;*/
            }

            table {
              border-collapse: collapse;
              width: 100%;
            }

            td {
              /*height: 50px;*/
              vertical-align: top;
            }

        </style>
    </head>
    <body>
        <div style="padding-bottom: 50px;">
            <h3 style="text-align: center;">
                Report Pengujian Sampel
            </h3>
            <br>
            <table class='table table1' border="1">
                <thead style="background-color: #009688; text-align: center;">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor Surat / KDP</th>
                        <th>Nama Perusahaan</th>
                        <th>Jenis Komoditi</th>
                        <th>Jenis parameter uji/jumlah uji</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($result as $r)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ date('d-m-Y', strtotime($r->created_at)) }}</td>
                            <td>{{ $r->nomor_sertifikat }}</td>
                            <td>{{ $r->nama }}</td>
                            <td>{{ $r->jenis_sampel }}</td>

                            @php
                                $parameters_select = App\Models\Permohonanparameter::where('permohonansampel_id', '=', $r->id)->get();
                                $ul_start = '
                                    <ul type="cicrle">
                                ';
                                $vp = '';
                            @endphp
                            @foreach ($parameters_select as $p_) {
                                @php
                                    $dp    = App\Models\Parameter::where('id', '=', $p_->parameter_id)->first();
                                    $vp .= '
                                        <li>' . $dp->parameter . ' : ' . $p_->jumlah . '</li>
                                    ';
                                @endphp
                            @endforeach
                            @php
                                $ul_end = '
                                    </ul>
                                ';
                            @endphp
                            <td>
                                {!! $ul_start !!}{!! $vp !!}{!! $ul_end !!}
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
