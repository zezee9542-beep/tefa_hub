<?php

namespace Database\Seeders;

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
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $guruRole = Role::firstOrCreate(['name' => 'guru']);
        $siswaRole = Role::firstOrCreate(['name' => 'siswa']);

        // ─── Admin ─────────────────────────────────────────────────────────
        $admin = User::updateOrCreate(
            ['email' => 'admin@tefa.sch.id'],
            [
                'name' => 'Administrator TEFA',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );
        $admin->assignRole($adminRole);

        // ─── Guru ──────────────────────────────────────────────────────────
        $guru = User::updateOrCreate(
            ['email' => 'guru@tefa.sch.id'],
            [
                'name' => 'Budi Santoso, S.Pd.',
                'password' => Hash::make('password'),
                'role' => 'guru',
                'is_active' => true,
            ]
        );
        $guru->assignRole($guruRole);

        // ─── Siswa ─────────────────────────────────────────────────────────
        $siswa = User::updateOrCreate(
            ['email' => 'siswa@tefa.sch.id'],
            [
                'name' => 'Kirana Kinanti',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'nis' => '2024001',
                'is_active' => true,
            ]
        );
        $siswa->assignRole($siswaRole);
    }
}
