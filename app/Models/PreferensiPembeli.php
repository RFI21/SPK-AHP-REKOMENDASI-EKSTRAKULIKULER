<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferensiPembeli extends Model
{
    use HasFactory;

    protected $table = 'preferensi_pembeli';

    protected $fillable = [
        'nama_pembeli',
        'nilai_kriteria',
    ];

    protected $casts = [
        'nilai_kriteria' => 'array',
    ];
}
