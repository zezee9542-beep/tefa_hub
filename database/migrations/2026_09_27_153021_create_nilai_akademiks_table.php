<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_akademiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('mata_pelajaran');
            $table->string('kode_mapel')->nullable();
            $table->string('guru_pengampu')->nullable();
            $table->string('semester', 20)->default('Ganjil');
            $table->string('tahun_ajaran', 20)->default('2026/2027');
            $table->decimal('nilai_tugas', 5, 2)->nullable();
            $table->decimal('nilai_uts', 5, 2)->nullable();
            $table->decimal('nilai_uas', 5, 2)->nullable();
            $table->decimal('nilai_praktik', 5, 2)->nullable();
            $table->decimal('nilai_akhir', 5, 2)->nullable();
            $table->string('predikat', 5)->nullable();
            $table->text('capaian_kompetensi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_akademiks');
    }
};
