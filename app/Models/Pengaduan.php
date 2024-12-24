<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model {
    use HasFactory;

    protected $fillable = [
        'jenis_laporan', 'nama', 'email', 'subject', 'pesan', 'fu', 'judul', 'tanggal', 'lokasi_kejadian', 'unggahan',
    ];
}
