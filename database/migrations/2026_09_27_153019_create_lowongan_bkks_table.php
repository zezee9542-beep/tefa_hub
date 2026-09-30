<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lowongan_bkks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('posisi');
            $table->string('lokasi');
            $table->enum('tipe_kerja', ['full-time', 'part-time', 'magang', 'kontrak'])->default('full-time');
            $table->text('deskripsi')->nullable();
            $table->text('persyaratan')->nullable();
            $table->string('logo_path')->nullable();
            $table->decimal('gaji_min', 12, 2)->nullable();
            $table->decimal('gaji_max', 12, 2)->nullable();
            $table->unsignedInteger('kuota')->default(1);
            $table->unsignedInteger('pelamar_count')->default(0);
            $table->date('batas_daftar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongan_bkks');
    }
};
