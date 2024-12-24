<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model {
    use HasFactory;

    protected $fillable = [
        'judul', 'slug_judul', 'isi', 'foto', 'file', 'url_video',
    ];
}
