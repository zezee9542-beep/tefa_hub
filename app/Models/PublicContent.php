<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicContent extends Model
{
    protected $fillable = ['area', 'judul', 'isi', 'is_published'];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }
}
