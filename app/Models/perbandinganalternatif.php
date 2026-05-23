<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganAlternatif extends Model
{
    use HasFactory;

    protected $table = 'perbandingan_alternatif';

    protected $fillable = [
        'alternatif_1_id',
        'alternatif_2_id',
        'kriteria_id',
        'nilai',
    ];

    public function alternatif1()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_1_id');
    }

    public function alternatif2()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_2_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
