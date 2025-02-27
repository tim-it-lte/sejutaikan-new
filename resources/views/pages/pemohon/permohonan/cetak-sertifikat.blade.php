<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Pengujian</title>
    <style>
        .container {
            width: 97%;
            margin: auto;
            position: absolute;
            top: 0px;
            left: 0px;
            /* border: 3px solid #73AD21; */
        }
        
        .bg {
            background-image: url('http://sejutaikan-bpmpp.info/public/logo.png');
            height: 45%;
            width: 350px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.3;
            position: relative;
            top: 250px;
            left: 170px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            position: normal;
            /*page-break-before: always;*/
            /*page-break-inside:auto;*/
        }
        
        .tr {
            page-break-inside: avoid; 
            page-break-after: auto;
        }

        .gambar-logo {
            text-align: center;
            color: black;
            margin-bottom: 12px;
        }

        .gambar-logo img{
            margin-bottom: 1px;
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
            /*font-size: 13px;*/
            font-size: 11px;
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
        
        /* Pastikan footer hanya muncul di halaman pertama */
        /*@page:first {*/
        /*    margin-bottom: 100px;*/
        /*}*/
        
        .footer {
            position: fixed;
            bottom: 10px;
            left: 10px;
            right: 10px;
            text-align: left;
            font-size: 10px;
            color: #000;
        }
        
        .tte {
            position: fixed;
            bottom: 60px;
            left: 10px;
            right: 10px;
            text-align: left;
        }
        
        .tgl {
            position: fixed;
            bottom: 260px;
            left: 10px;
            right: 10px;
            text-align: left;
        }
        
        .page_break { page-break-before: always; }
        /* Hilangkan margin di halaman lain */
        /*@page {*/
        /*    margin-bottom: 0;*/
        /*}*/
    </style>
</head>
<body>
    <div class="bg"></div>
    <div class="container">
        <div class="gambar-logo">
            <img src="http://sejutaikan-bpmpp.info/public/logo.png" alt="Logo" height="70" style="float: left;">
            <img src="https://sejutaikan-bpmpp.info/public/ikan.jpg" alt="Logo" height="70" width="90" style="float: right;">
            <span class="span2">Quality Application of Fishery Products</span><br>
            <span class="span2">Of Marine and Fisheries Products</span><br>
            <span class="span2">Makassar, South Sulawesi - Indonesia</span><br>
            <span class="span3">Address: Jl. Prof.Dr.Ir. Sutami No. 23 Makassar Telp. +62 812-4496-2783<br>https://sejutaikan-bpmpp.sulselprov.go.id</span>
            <!-- <span class="span4">MAKASSAR - 90231</span><br> -->
            <hr>
            <span class="span5">CERTIFICATE OF ANALYSIS</span><br>
            <span class="span7">Sertifikat Analisis</span><br>
            <span class="span7">{{ $permohonan->nomor_sertifikat }}</span>
        </div>
        <div>
            <table>
                <tr>
                    <td width="3%">
                        <span class="span9">1.</span>
                    </td>
                    <td width="20%">
                        <span class="span8">Name Of Costumer</span><br>
                        <span class="span9">Nama Pelanggan</span>
                    </td>
                    <td width="2%">
                        <span class="span9">: </span>
                    </td>
                    <td width="75%">
                        <span class="span9">{{ $permohonan->nama }}</span>
                    </td>
                </tr>
                <tr>
                    <td width="3%">
                        <span class="span9">2.</span>
                    </td>
                    <td width="20%">
                        <span class="span8">Commodity</span><br>
                        <span class="span9">Jenis Produk</span>
                    </td>
                    <td width="2%">
                        <span class="span9">: </span>
                    </td>
                    <td width="75%">
                        <span class="span9">{{ $permohonan->jenis_sampel }}</span>
                    </td>
                </tr>
                <tr>
                    <td width="3%">
                        <span class="span9">3.</span>
                    </td>
                    <td width="20%">
                        <span class="span8">Date of Examination</span><br>
                        <span class="span9">Tanggal Pengujian</span>
                    </td>
                    <td width="2%">
                        <span class="span9">: </span>
                    </td>
                    <td width="75%">
                        <span class="span9">{{ $permohonan->kode_sampel_lab }}</span>
                    </td>
                </tr>
                <tr>
                    <td width="3%">
                        <span class="span9">4.</span>
                    </td>
                    <td width="20%">
                        <span class="span8">Sample Code</span><br>
                        <span class="span9">Kode Contoh</span>
                    </td>
                    <td width="2%">
                        <span class="span9">: </span>
                    </td>
                    <td width="75%">
                        <span class="span9">{{ $permohonan->nomor_referensi }}</span>
                    </td>
                </tr>
            </table>
            <!--<br>-->
            <span class="span8">The Products Specified Above Have Been Tested And The Result Are As Follows :</span><br>
            <span class="span9">Produk di atas telah diuji dan hasilnya sebagai berikut</span>
        </div>
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
                function printSup($str) {
                    $result = str_replace("²", '<sup>2</sup>' ,$str);
                    $result = str_replace("³", '<sup>3</sup>' ,$result);
                    $result = str_replace("⁴", '<sup>4</sup>' ,$result);
                    $result = str_replace("⁵", '<sup>5</sup>' ,$result);
                    $result = str_replace("°", '&deg;', $result);
                    $result = str_replace("⁾", '<sup>)</sup>', $result);
                    return $result;
                }
                function hasSup($str) {
                    $supChars = ["²", "³", "⁴", "⁵", "°", "⁾"];
                    foreach($supChars as $char) {
                        if(strpos($str, $char)) return true;
                    }
                    return false;
                }
            @endphp
            @foreach($parameters_select as $parameter)
                <tr class="tr">
                    <td width="1%">
                        <span class="span9">{{ $no }}</span>
                    </td>
                    @php
                        $p_ = App\Models\Parameter::where('id','=',$parameter->parameter_id)->first();
                    @endphp
                    <td width="9%">
                        <span class="span9">{{ $p_->parameter }}</span>
                    </td>
                    @php
                        $hasils = App\Models\Hasil::where('permohonanparameter_id','=',$parameter->id)->get();
                        $hasil_first = App\Models\Hasil::where('permohonanparameter_id','=',$parameter->id)->first();
                    @endphp
                    @foreach($hasils as $hasil)
                    <td width="14%" style="white-space:nowrap;">
                        @if(hasSup($hasil->hasil))
                        <span class="span9">{!! printSup($hasil->hasil) !!}</span>
                        @else
                        <span class="span9">{{ $hasil->hasil }}</span>
                        @endif
                    </td>
                    @endforeach
                    <td width="14%" style="white-space:nowrap;">
                        @if(hasSup($hasil->standar_mutu))
                        <span class="span9">{!! printSup($hasil->standar_mutu) !!}</span>
                        @else
                        <span class="span9">{{ $hasil->standar_mutu }}</span>
                        @endif
                    </td>
                    <td width="10%">
                        <span class="span9">{{ $hasil->metode_uji }}</span>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                <!--@if($no==4)-->
                <!--    <div class="page_break"></div>-->
                <!--@endif-->
            @endforeach
        </table>
        <!--<div class="page_break"></div>-->
        <span class="span8">This result related to the samples submitted only :</span><br>
        <span class="span9">Hasil uji ini hanya berlaku untuk sampel yang diterima</span>
        <table>
            <tr>
                <td style="color: white;">
                    <span class="span8">Done at :</span><br>
                    <span class="span9">Dibuat di</span>
                </td>
                <td width="140" style="color: white;">
                    <span class="span9">Makassar</span>
                </td>
                <td style="color: white;">
                    <span class="span8">On :</span><br>
                    <span class="span9">Pada</span>
                </td>
                <td style="width: 110px; color: white;">
                    <span class="span9">{{ date('d-m-Y',strtotime($permohonan->tgl_sertifikat)) }}</span>
                </td>
                <td style="font-size: 9px; font-weight: bold;">
                    Ket
                    <table>
                        @php
                            $ket_ = App\Models\Keterangan::where('permohonansampel_id','=',$permohonan->id)->get();
                        @endphp
                        @foreach($ket_ as $ket)
                        <tr>
                            <td>{!! printSup($ket->keterangan) !!}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
        <div class="tgl">
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
                    <td style="width: 110px;">
                        <span class="span9">{{ date('d-m-Y',strtotime($permohonan->tgl_sertifikat)) }}</span>
                    </td>
                    <td style="font-size: 9px; font-weight: bold;">
                    </td>
                </tr>
        </table>
        </div>
        <div class="tte" style="text-align: center;">
            @php
                $ttd = App\Models\Ttd::orderBy('id','DESC')->first();
            @endphp
            @if($permohonan->status == 8)
                @if($permohonan->istte == 0)
                    <img src="{{ 'https://sejutaikan-bpmpp.info/public/storage/ttd/'.$ttd->stempel }}" alt="stempel" width="120" height="120" style="margin-left: -50px;">
                    <img src="{{ 'https://sejutaikan-bpmpp.info/public/storage/ttd/'.$ttd->ttd }}" alt="ttd" width="90" height="90" style="margin-left: -50px;"><br>
                @endif
            @endif
            <span class="span9"><b>{{ $ttd->nama }}</b></span><br>
            <span class="span8">Name and signature (Nama dan tanda tangan)</span>
            <!--<span class="span8">Name and signature </span><span class="span8">(Nama dan tanda tangan)</span>-->
            <br>
            <span class="span10">Head of Quality Application of Feseries Products</span><br>
            <span class="span10">Makassar, South Sulawesi-Indonesia</span><br>
            <span class="span11">Balai Penerapan Mutu Produk Perikanan Makassar, Sulawesi Selatan-Indonesia</span>
        </div>
        @if($permohonan->istte == 1)
            <div class="footer">
                Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang telah diterbitkan oleh Balai Besar Sertifikasi Elektronik (BSrE), Badan Siber dan Sandi Negara
            </div>
        @endif
    </div>
</body>
<script src=""></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js"></script>
</html>