<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class SiswaController extends Controller
{
    /**
     * Helper to get student user metadata.
     *
     * @return array<string, string>
     */
    private function getUserData(): array
    {
        /** @var User|null $user */
        $user = auth()->user();

        return [
            'name' => $user?->name ?? 'Kirana Kinanti',
            'nisn' => $user?->nis ?? '0064829104',
            'class' => 'XII RPL 1',
            'status' => 'SISWA AKTIF',
        ];
    }

    /**
     * Display student dashboard.
     */
    public function index(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'dashboard',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display akademik page.
     */
    public function akademik(): View
    {
        return view('siswa.akademik', [
            'activeMenu' => 'akademik',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display BLUD page.
     */
    public function blud(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'blud',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display BKK Career Center page.
     */
    public function bkk(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'bkk',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display Riwayat Aktivitas page.
     */
    public function riwayat(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'riwayat',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display Tanya Tefa page.
     */
    public function tanyaTefa(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'tanya-tefa',
            'user' => $this->getUserData(),
        ]);
    }
}
