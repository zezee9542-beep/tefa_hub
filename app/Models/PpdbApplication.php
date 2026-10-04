<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpdbApplication extends Model
{
    protected $fillable = ['nama_lengkap', 'nisn', 'email', 'nomor_telepon', 'jurusan_pilihan', 'jalur_pendaftaran', 'status', 'catatan_verifikasi', 'verified_at'];

    protected function casts(): array
    {
        return ['verified_at' => 'datetime'];
    }
}
