<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Pengujian</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
            /* border: 3px solid #73AD21; */
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .gambar-logo {
            text-align: center;
            color: black;
            margin-bottom: 15px;
        }

        .gambar-logo img{
            margin-bottom: 3px;
        }

        .gambar-logo .span1{
            font-size: 13px;
            font-weight: 500;
        }

        .gambar-logo .span2{
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .gambar-logo .span3{
            font-size: 13px;
            font-weight: 70;
        }

        .gambar-logo .span4{
            font-size: 15px;
            font-weight: 500;
        }

        .gambar-logo hr {
            border: 1px solid black;
            font-weight: 500;
        }

        .span5 {
            font-size: 14px;
            font-weight: 700;
            /* letter-spacing: -1px; */
            word-spacing: 2px;
            text-decoration: underline;
            font-style: italic;
        }

        .span7 {
            font-size: 14px;
            font-weight: 700;
            /* letter-spacing: -1px; */
            word-spacing: 2px;
        }

        .span8 {
            font-size: 13px;
            font-weight: 700;
            /* letter-spacing: -1px; */
            word-spacing: 2px;
            text-decoration: underline;
            font-style: italic;
        }

        .span9 {
            font-size: 13px;
            font-weight: 700;
            /* letter-spacing: -1px; */
            word-spacing: 2px;
        }

        .span6 {
            font-size: 14px;
            /* letter-spacing: -1px; */
            word-spacing: 2px;
        }

        .container .content-1,
        .container .content-2 {
            margin-bottom: 1px;
            font-size:  15px;
        }

        .container table.perusahaan {
            margin-top: 0;
            font-size:  15px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="gambar-logo">
            <img src="http://sejutaikan-bpmpp.info/public/logo.png" alt="Logo" height="70" style="float: left;">
            <img src="http://sejutaikan-bpmpp.info/public/ikan.png" alt="Logo" height="70" width="90" style="float: right;">
            <span class="span2">Quality Application of Fishery Products</span><br>
            <span class="span2">Of Marine and Fisheries Products</span><br>
            <span class="span2">Makassar, South Sulawesi - Indonesia</span><br>
            <span class="span3">Address: Prof. Dr. Ir. Sutami No. 23 Makassar Telp. (0411) 513215 - 513216 Fax. (0411) 513216</span>
            <!-- <span class="span4">MAKASSAR - 90231</span><br> -->
            <hr>
            <span class="span5">TEST RESULT</span><br>
            <span class="span7">Hasil Pengujian</span>
        </div>
        <div>
            <table>
                <tr>
                    <td>
                        <span class="span9">1.</span>
                    </td>
                    <td width="130">
                        <span class="span8">Name Of Costumer</span><br>
                        <span class="span9">Nama Pelanggan</span>
                    </td>
                    <td>
                        <span class="span9">: {{ $permohonan->nama }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="span9">2.</span>
                    </td>
                    <td>
                        <span class="span8">Commodity</span><br>
                        <span class="span9">Jenis Produk</span>
                    </td>
                    <td>
                        <span class="span9">: {{ $permohonan->jenis_sampel }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="span9">3.</span>
                    </td>
                    <td>
                        <span class="span8">Date of Examination</span><br>
                        <span class="span9">Tanggal Pengujian</span>
                    </td>
                    <td>
                        <span class="span9">: {{ date('d-m-Y',strtotime($permohonan->tgl_pengujian)) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="span9">4.</span>
                    </td>
                    <td>
                        <span class="span8">Reference Number</span><br>
                        <span class="span9">Nomor Referensi</span>
                    </td>
                    <td>
                        <span class="span9">: {{ $permohonan->nomor_referensi }}</span>
                    </td>
                </tr>
            </table>
            <br>
            <span class="span8">The Products Specified Above Have Been Tested And The Result Are As Follows :</span><br>
            <span class="span9">Produk di atas telah diuji dan hasilnya sebagai berikut</span>
        </div>
        <br>
        <table border="1" class="table">
            <tr>
                <td rowspan="2" style="text-align: center;">
                    <span class="span9">No</span>
                </td>
                <td rowspan="2" style="text-align: center;">
                    <span class="span9">Parameter</span>
                </td>
                <td colspan="5" style="text-align: center;">
                    <span class="span8">Result</span><br>
                    <span class="span9">Hasil</span>
                </td>
                <td rowspan="2" style="text-align: center;">
                    <span class="span8">Limit of Quality</span><br>
                    <span class="span9">Batas Standar Mutu</span>
                </td>
                <td rowspan="2" style="text-align: center;">
                    <span class="span8">Test Methods</span><br>
                    <span class="span9">Metode Uji</span>
                </td>
            </tr>
            <tr>
                <td width="40" style="text-align: center;">
                    <span class="span9">1</span>
                </td>
                <td width="40" style="text-align: center;">
                    <span class="span9">2</span>
                </td>
                <td width="40" style="text-align: center;">
                    <span class="span9">3</span>
                </td>
                <td width="40" style="text-align: center;">
                    <span class="span9">4</span>
                </td>
                <td width="40" style="text-align: center;">
                    <span class="span9">5</span>
                </td>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach($parameters_select as $parameter)
                <tr>
                    <td>
                        <span class="span9">{{ $no }}</span>
                    </td>
                    @php
                        $p_ = App\Models\Parameter::where('id','=',$parameter->parameter_id)->first();
                    @endphp
                    <td>
                        <span class="span9">{{ $p_->parameter }}</span>
                    </td>
                    @php
                        $hasils = App\Models\Hasil::where('permohonanparameter_id','=',$parameter->id)->get();
                        $hasil_first = App\Models\Hasil::where('permohonanparameter_id','=',$parameter->id)->first();
                    @endphp
                    @foreach($hasils as $hasil)
                        <td>
                            <span class="span9">{{ $hasil->hasil }}</span>
                        </td>
                    @endforeach
                    <td>
                        <span class="span9">{{ $hasil->standar_mutu }}</span>
                    </td>
                    <td>
                        <span class="span9">{{ $hasil->metode_uji }}</span>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </table>
        <br>
        <span class="span8">This result related to the samples submitted only :</span><br>
        <span class="span9">Hasil uji ini hanya berlaku untuk sampel yang diterima</span>
        <br>
        <br>
        <table>
            <tr>
                <td>
                    <span class="span8">Done at :</span><br>
                    <span class="span9">Dibuat di</span>
                </td>
                <td width="140">
                    <span class="span9">Makassar</span>
                </td>
                <td>
                    <span class="span8">On :</span><br>
                    <span class="span9">Pada</span>
                </td>
                <td>
                    <span class="span9">{{ date('d-m-Y') }}</span>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <div style="text-align: center;">
            @php
                $ttd = App\Models\Ttd::orderBy('id','DESC')->first();
            @endphp
            <img src="{{ 'http://sejutaikan-bpmpp.info/public/storage/ttd/'.$ttd->ttd }}" alt="ttd" width="100" height="100" style="margin-left: -50px;"><br>
            <span class="span9"><b>{{ $ttd->nama }}</b></span><br>
            <span class="span8">Name and signature </span><span class="span8">(Nama dan tanda tangan)</span>
            <br>
            <br>
            <span class="span10">Head of Quality Application of Feseries Products</span><br>
            <span class="span10">Makassar, South Sulawesi-Indonesia</span><br>
            <span class="span11">Balai Penerapan Mutu Produk Perikanan Makassar, Sulawesi Selatan-Indonesia</span>
        </div>
    </div>
</body>
</html>