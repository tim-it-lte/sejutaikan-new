<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PARAMETER TERSEDIA</title>
    <style>

    	header {
    		padding-bottom: 20px;
    	}

        .table {
            border-collapse: collapse;
            width: 100%;
        }
        
        .tr {
            page-break-inside: avoid; 
            page-break-after: auto;
        }
        
        .page_break { page-break-before: always; }

        hr {
        	border-color: #212529;
        }

        header hr {
        	border-top-width: medium;
        }

        .table th:not(.text-end) {
        	text-align: center;
        }

        .table th, .table td {
        	padding: 4px 8px;
        }

        .whitespace-nowrap {
        	white-space: nowrap;
        }

        body, p, table, h1, h2, h3, h4, h5, h6 {
        	font-family: Arial, Helvetica, sans-serif;
        }

        p, table {
        	font-size: 12px;
        }

        h1, h2, h3, h4, h5, h6 {
        	margin: 0;
        }

        .text-center {
        	text-align: center;
        }

        .text-end {
        	text-align: right;
        }
    </style>
</head>
<body>
	<header>
		<div class="">
			<h4 class="text-center">LAPORAN PARAMETER TERSEDIA<br>UPT BALAI PENERAPAN MUTU PRODUK PERIKANAN</h4>
			<h5 class="text-center"><b>DINAS KELAUTAN DAN PERIKANAN PROVINSI SULAWESI SELATAN</b></h5>
		</div>
	</header>
	<main>
		<div>
			<table class="table" border="1">
				<thead>
					<tr>
						<th>NO</th>
						<th>JENIS PENGUJIAN</th>
						<th>PARAMETER</th>
						<th>TARIF (Rp)</th>
					</tr>
				</thead>
				<tbody>
				@php
                    $no = 1;
                @endphp
				@foreach($parameter as $item)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td>{{ $item->jp->jenis_permohonan }}</td>
						<td>{{ $item->parameter }}</td>
						<td class="whitespace-nowrap text-end">Rp {{ number_format($item->harga,0,',','.') }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</main>
</body>
</html>