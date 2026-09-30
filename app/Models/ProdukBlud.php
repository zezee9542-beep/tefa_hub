<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBlud extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_produk',
        'kategori',
        'deskripsi',
        'visual_path',
        'status',
        'catatan_kurator',
        'harga',
        'jumlah_terjual',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
            'jumlah_terjual' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
