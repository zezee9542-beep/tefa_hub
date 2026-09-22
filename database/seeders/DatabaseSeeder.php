<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with initial users per role.
     */
    public function run(): void
    {
        // ─── Admin ─────────────────────────────────────────────────────────
        User::create([
            'name' => 'Administrator TEFA',
            'email' => 'admin@tefa.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // ─── Guru ──────────────────────────────────────────────────────────
        User::create([
            'name' => 'Budi Santoso, S.Pd.',
            'email' => 'guru@tefa.sch.id',
            'password' => Hash::make('password'),
            'role' => 'guru',
            'is_active' => true,
        ]);

        // ─── Siswa ─────────────────────────────────────────────────────────
        User::create([
            'name' => 'Kirana Kinanti',
            'email' => 'siswa@tefa.sch.id',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'nis' => '2024001',
            'is_active' => true,
        ]);
    }
}
