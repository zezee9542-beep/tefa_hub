<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicAssignment extends Model
{
    protected $fillable = ['user_id', 'judul', 'mata_pelajaran', 'batas_kumpul', 'status', 'nilai', 'catatan'];

    protected function casts(): array
    {
        return ['batas_kumpul' => 'date', 'nilai' => 'decimal:2'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
