<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('kelas')->nullable()->after('nis');
            $table->string('jurusan')->nullable()->after('kelas');
        });

        Schema::create('academic_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('status', 20)->default('hadir');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('academic_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('judul');
            $table->string('mata_pelajaran');
            $table->date('batas_kumpul')->nullable();
            $table->string('status', 20)->default('ditugaskan');
            $table->decimal('nilai', 5, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

        Schema::create('ppdb_applications', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nisn', 30)->nullable()->unique();
            $table->string('email')->nullable();
            $table->string('nomor_telepon', 30)->nullable();
            $table->string('jurusan_pilihan');
            $table->string('jalur_pendaftaran')->default('Reguler');
            $table->string('status', 30)->default('menunggu_verifikasi');
            $table->text('catatan_verifikasi')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('public_contents', function (Blueprint $table) {
            $table->id();
            $table->string('area')->unique();
            $table->string('judul');
            $table->text('isi')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        Schema::create('admin_audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('aksi');
            $table->string('target_type')->nullable();
            $table->unsignedBigInteger('target_id')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_audit_logs');
        Schema::dropIfExists('app_settings');
        Schema::dropIfExists('public_contents');
        Schema::dropIfExists('ppdb_applications');
        Schema::dropIfExists('academic_assignments');
        Schema::dropIfExists('academic_attendances');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['kelas', 'jurusan']);
        });
    }
};
