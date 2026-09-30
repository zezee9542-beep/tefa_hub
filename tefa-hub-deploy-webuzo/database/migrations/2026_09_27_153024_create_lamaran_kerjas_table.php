<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lamaran_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lowongan_bkk_id')->constrained('lowongan_bkks')->cascadeOnDelete();
            $table->enum('status', ['diajukan', 'seleksi_berkas', 'wawancara', 'diterima', 'ditolak'])->default('diajukan');
            $table->string('resume_path')->nullable();
            $table->text('surat_lamaran')->nullable();
            $table->text('catatan_perusahaan')->nullable();
            $table->timestamp('tanggal_lamar')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamaran_kerjas');
    }
};
