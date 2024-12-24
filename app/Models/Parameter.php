<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model {
    use HasFactory;

    protected $fillable = [
        'jp_id', 'parameter', 'harga', 'nomor', 'aktif', 'pesan', 'metode_uji'
    ];

    public function Jp() {
        return $this->belongsTo(Jp::class);
    }
}
