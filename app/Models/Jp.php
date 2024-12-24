<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jp extends Model {
    use HasFactory;

    protected $fillable = [
        'jenis_permohonan',
    ];

    public function parameter() {
        return $this->hasMany(Parameter::class)->orderBy('nomor');
    }
}
