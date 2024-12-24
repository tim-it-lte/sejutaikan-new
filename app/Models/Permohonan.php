<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'kode', 'nama_pemilik', 'alamat', 'jenis_permohonan', 'telp', 'status',
    ];
}
