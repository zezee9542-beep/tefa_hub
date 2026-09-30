<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mata_pelajaran',
        'kode_mapel',
        'guru_pengampu',
        'semester',
        'tahun_ajaran',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
        'nilai_praktik',
        'nilai_akhir',
        'predikat',
        'capaian_kompetensi',
    ];

    protected function casts(): array
    {
        return [
            'nilai_tugas' => 'decimal:2',
            'nilai_uts' => 'decimal:2',
            'nilai_uas' => 'decimal:2',
            'nilai_praktik' => 'decimal:2',
            'nilai_akhir' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
