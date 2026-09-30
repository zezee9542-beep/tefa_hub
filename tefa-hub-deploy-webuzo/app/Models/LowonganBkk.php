<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganBkk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'lokasi',
        'tipe_kerja',
        'deskripsi',
        'persyaratan',
        'logo_path',
        'gaji_min',
        'gaji_max',
        'kuota',
        'pelamar_count',
        'batas_daftar',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'batas_daftar' => 'date',
            'gaji_min' => 'decimal:2',
            'gaji_max' => 'decimal:2',
            'kuota' => 'integer',
            'pelamar_count' => 'integer',
        ];
    }

    public function lamarans()
    {
        return $this->hasMany(LamaranKerja::class);
    }
}
