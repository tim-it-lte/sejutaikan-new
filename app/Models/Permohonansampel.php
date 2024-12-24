<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonansampel extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'jenis_permohonan_id', 'kode', 'jenis', 'nama', 'hp', 'alamat', 'total', 'status', 'verifikasi_cs', 'verifikasi_pemohon', 'status_pembayaran', 'tgl_diterima', 'jenis_sampel', 'spesies', 'kode_sampel', 'negara_tujuan', 'jumlah_sampel', 'bukti_bayar', 'pesan_dikembalikan', 'tgl_pengujian', 'kode_sampel_lab', 'nomor_referensi', 'perusahaan', 'nomor_sertifikat',  'tgl_sertifikat', 'tgl_bayar', 'kembalikan_verifikator', 'date_kembalikan_verifikator', 'pdf', 'istte'
    ];
}
