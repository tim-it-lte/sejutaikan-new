<?php

namespace App\Exports;
use App\Datapenghasillimbahb3;
use App\Transporter;

use Maatwebsite\Excel\Concerns\FromArray;

// use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromArray {

public function __construct($result) {
    $this->result      = $result;
}

public function array():array{
    $result_array[] = ['Pembayaran'];
    $result_array[] = ['No', 'Kode Permohonan', 'Perusahaan' ,'Nama Pemohon', 'Tanggal Permohonan', 'Pembayaran'];
    $no             = 1;
    $jumlah         = 0;
    foreach ($this->result as $r) {
        $jumlah += $r->total;
        $result_array[] = [
            'No'                            => $no,
            'Kode Permohonan'               => $r['kode'],
            'Perusahaan'                    => $r['perusahaan'],
            'Nama Pemohon'                  => $r['nama'],
            'Tanggal Permohonan'            => date('d-m-Y', strtotime($r['created_at'])),
            'Pembayaran'                    => 'Rp ' . number_format($r['total'],0,',','.'),
        ];
        $no++;
    }
    $result_array[] = ['Total   ' .'Rp ' . number_format($jumlah,0,',','.')];

    return $result_array;
}
};
