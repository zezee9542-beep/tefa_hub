<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk_bluds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('nama_produk');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->string('visual_path')->nullable()->comment('Path file gambar/dokumen produk');
            $table->enum('status', ['draft', 'diajukan', 'dikurasi', 'disetujui', 'ditolak'])->default('draft');
            $table->string('catatan_kurator')->nullable();
            $table->decimal('harga', 12, 2)->nullable();
            $table->unsignedInteger('jumlah_terjual')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_bluds');
    }
};
