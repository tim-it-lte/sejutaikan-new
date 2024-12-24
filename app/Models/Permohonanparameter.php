<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonanparameter extends Model {
    use HasFactory;

    protected $fillable = [
        'permohonansampel_id', 'jp_id', 'parameter_id', 'harga', 'jumlah', 'total', 'nomor', 'keterangan',
    ];

    public function Parameter() {
        return $this->belongsTo(Parameter::class);
    }
}
