<?php

namespace Tests\Feature;

use App\Models\PpdbApplication;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_open_every_management_page(): void
    {
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);

        $this->actingAs($admin);

        foreach (['admin.users', 'admin.academic', 'admin.blud', 'admin.jobs', 'admin.ppdb', 'admin.reports', 'admin.content', 'admin.settings'] as $route) {
            $this->get(route($route))->assertOk();
        }
    }

    public function test_admin_can_create_and_verify_a_ppdb_application(): void
    {
        $admin = User::factory()->create(['role' => 'admin', 'is_active' => true]);

        $this->actingAs($admin)->post(route('admin.ppdb.store'), [
            'nama_lengkap' => 'Calon Siswa Baru',
            'nisn' => '0012345678',
            'jurusan_pilihan' => 'Rekayasa Perangkat Lunak',
            'jalur_pendaftaran' => 'Prestasi',
        ])->assertSessionHas('success');

        $application = PpdbApplication::firstOrFail();

        $this->patch(route('admin.ppdb.update', $application), [
            'status' => 'berkas_lengkap',
            'catatan_verifikasi' => 'Berkas valid.',
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('ppdb_applications', [
            'id' => $application->id,
            'status' => 'berkas_lengkap',
        ]);
    }
}
