<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model {
    use HasFactory;

    protected $fillable = [
        'permohonansampel_id',
        'jp_id',
        'parameter_id',
        'permohonanparameter_id',
        'hasil',
        'standar_mutu',
        'metode_uji',
    ];
}
