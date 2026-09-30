<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aktivitas_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('judul');
            $table->string('kategori')->default('akademik'); // akademik, blud, bkk, sistem
            $table->text('deskripsi')->nullable();
            $table->string('tipe_ikon')->default('activity');
            $table->string('badge_warna')->default('blue');
            $table->timestamp('waktu_aktivitas')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aktivitas_siswas');
    }
};
