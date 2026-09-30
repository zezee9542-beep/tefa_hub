<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaranKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lowongan_bkk_id',
        'status',
        'resume_path',
        'surat_lamaran',
        'catatan_perusahaan',
        'tanggal_lamar',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lamar' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(LowonganBkk::class, 'lowongan_bkk_id');
    }
}
