<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model {
    use HasFactory;

    protected $fillable = [
        'pertanyaan',
    ];

    public function options() {
        return $this->hasMany(Optionkuisioners::class, 'pertanyaan_id')->orderBy('bobot',"DESC");
    }
}
