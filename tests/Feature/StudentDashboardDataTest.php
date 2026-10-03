<?php

namespace Tests\Feature;

use App\Models\LamaranKerja;
use App\Models\LowonganBkk;
use App\Models\NilaiAkademik;
use App\Models\ProdukBlud;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentDashboardDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_data_keeps_its_existing_statistics_contract(): void
    {
        $siswa = User::factory()->create([
            'role' => 'siswa',
            'is_active' => true,
        ]);

        ProdukBlud::create([
            'user_id' => $siswa->id,
            'nama_produk' => 'Produk Disetujui',
            'kategori' => 'Aplikasi',
            'deskripsi' => 'Deskripsi produk.',
            'status' => 'disetujui',
            'harga' => 10000,
        ]);
        ProdukBlud::create([
            'user_id' => $siswa->id,
            'nama_produk' => 'Produk Diajukan',
            'kategori' => 'Aplikasi',
            'deskripsi' => 'Deskripsi produk.',
            'status' => 'diajukan',
            'harga' => 20000,
        ]);
        LowonganBkk::create([
            'nama_perusahaan' => 'Mitra Aktif',
            'posisi' => 'Developer',
            'lokasi' => 'Bandung',
            'is_active' => true,
        ]);
        $lowonganTidakAktif = LowonganBkk::create([
            'nama_perusahaan' => 'Mitra Nonaktif',
            'posisi' => 'Designer',
            'lokasi' => 'Bandung',
            'is_active' => false,
        ]);
        LamaranKerja::create([
            'user_id' => $siswa->id,
            'lowongan_bkk_id' => $lowonganTidakAktif->id,
        ]);
        NilaiAkademik::create([
            'user_id' => $siswa->id,
            'mata_pelajaran' => 'Produktif',
            'nilai_akhir' => 80,
        ]);
        NilaiAkademik::create([
            'user_id' => $siswa->id,
            'mata_pelajaran' => 'Matematika',
            'nilai_akhir' => 90,
        ]);

        $response = $this->actingAs($siswa)->getJson(route('siswa.api.dashboard'));

        $response->assertOk()->assertJsonPath('stats', [
            'total_produk' => 2,
            'produk_tayang' => 1,
            'total_lowongan' => 1,
            'total_lamaran' => 1,
            'rata_rata_nilai' => 85,
            'total_nilai_terdata' => 2,
        ]);
    }
}
