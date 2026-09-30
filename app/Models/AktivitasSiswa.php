<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'deskripsi',
        'tipe_ikon',
        'badge_warna',
        'waktu_aktivitas',
    ];

    protected function casts(): array
    {
        return [
            'waktu_aktivitas' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
