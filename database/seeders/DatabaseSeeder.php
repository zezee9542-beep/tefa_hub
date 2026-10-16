<?php

namespace Database\Seeders;

use App\Models\LowonganBkk;
use App\Models\NilaiAkademik;
use App\Models\ProdukBlud;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with initial users per role.
     */
    public function run(): void
    {
        // Create Spatie Roles
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'guru']);
        Role::firstOrCreate(['name' => 'siswa']);

        // ── Default Users ───────────────────────────────────────────────────────────
        $admin = User::firstOrCreate(
            ['email' => 'admin@smktefa.sch.id'],
            [
                'name' => 'Administrator TEFA',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );
        $admin->assignRole('admin');

        $guru = User::firstOrCreate(
            ['email' => 'guru@smktefa.sch.id'],
            [
                'name' => 'Budi Santoso, S.T. (Guru Pembimbing)',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'is_active' => true,
            ]
        );
        $guru->assignRole('guru');

        $siswa = User::firstOrCreate(
            ['email' => 'siswa@smktefa.sch.id'],
            [
                'name' => 'Ahmad Fajar Pratama',
                'nis' => '12345',
                'kelas' => 'XII RPL 1',
                'jurusan' => 'Rekayasa Perangkat Lunak',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
                'is_active' => true,
            ]
        );
        $siswa->assignRole('siswa');

        // ── Showcase BLUD Products ──────────────────────────────────────────────────
        ProdukBlud::firstOrCreate(
            ['nama_produk' => 'Aplikasi Smart School & Presensi IoT'],
            [
                'user_id' => $siswa->id,
                'kategori' => 'Software & Aplikasi',
                'deskripsi' => 'Sistem manajemen presensi berbasis RFID dan dashboard analitik sekolah modern.',
                'status' => 'disetujui',
                'harga' => 3500000,
                'jumlah_terjual' => 4,
            ]
        );

        ProdukBlud::firstOrCreate(
            ['nama_produk' => 'Komponen Presisi Shaft CNC Bubut'],
            [
                'user_id' => $siswa->id,
                'kategori' => 'Manufaktur & Pemesinan',
                'deskripsi' => 'Fabrikasi shaft baja presisi tinggi dengan toleransi mikron untuk industri otomotif.',
                'status' => 'disetujui',
                'harga' => 450000,
                'jumlah_terjual' => 12,
            ]
        );

        // ── Showcase Lowongan BKK ───────────────────────────────────────────────────
        LowonganBkk::firstOrCreate(
            ['nama_perusahaan' => 'PT Astra Daihatsu Motor', 'posisi' => 'Junior Automation Technician'],
            [
                'lokasi' => 'Cikarang, Jawa Barat',
                'tipe_kerja' => 'full-time',
                'deskripsi' => 'Posisi teknisi perakitan dan pemeliharaan jalur otomatisasi manufaktur kendaraan bermotor.',
                'persyaratan' => 'Lulusan SMK Jurusan TPM/TKR/TEI, menguasai dasar otomasi dan K3 industri.',
                'kuota' => 10,
                'is_active' => true,
            ]
        );

        LowonganBkk::firstOrCreate(
            ['nama_perusahaan' => 'PT Telkom Digital Solusindo', 'posisi' => 'Junior Web Developer'],
            [
                'lokasi' => 'Surabaya / Hybrid',
                'tipe_kerja' => 'full-time',
                'deskripsi' => 'Pengembangan aplikasi portal dan integrasi API untuk mitra institusi.',
                'persyaratan' => 'Lulusan SMK Jurusan RPL, memahami PHP/Laravel, JavaScript, dan MySQL.',
                'kuota' => 5,
                'is_active' => true,
            ]
        );

        // ── Showcase Nilai Akademik ─────────────────────────────────────────────────
        NilaiAkademik::firstOrCreate(
            ['user_id' => $siswa->id, 'mata_pelajaran' => 'Pemrograman Web & Perangkat Bergerak'],
            [
                'kode_mapel' => 'RPL-01',
                'guru_pengampu' => 'Budi Santoso, S.T.',
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2025/2026',
                'nilai_tugas' => 90,
                'nilai_uts' => 88,
                'nilai_uas' => 92,
                'nilai_praktik' => 95,
                'nilai_akhir' => 92,
                'predikat' => 'A',
                'capaian_kompetensi' => 'Sangat kompeten dalam membangun aplikasi berbasis Laravel dan REST API.',
            ]
        );

        NilaiAkademik::firstOrCreate(
            ['user_id' => $siswa->id, 'mata_pelajaran' => 'Basis Data'],
            [
                'kode_mapel' => 'RPL-02',
                'guru_pengampu' => 'Siti Nurhaliza, M.Kom.',
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2025/2026',
                'nilai_tugas' => 85,
                'nilai_uts' => 86,
                'nilai_uas' => 88,
                'nilai_praktik' => 89,
                'nilai_akhir' => 87,
                'predikat' => 'B',
                'capaian_kompetensi' => 'Kompeten dalam perancangan skema relasional, normalisasi, dan indeks query.',
            ]
        );
    }
}
