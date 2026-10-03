<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard page.
     */
    public function index(): View
    {
        $userCounts = User::query()
            ->selectRaw('COUNT(*) as total')
            ->selectRaw("SUM(CASE WHEN role = 'siswa' THEN 1 ELSE 0 END) as siswa")
            ->selectRaw("SUM(CASE WHEN role = 'guru' THEN 1 ELSE 0 END) as guru")
            ->selectRaw("SUM(CASE WHEN role = 'admin' THEN 1 ELSE 0 END) as admin")
            ->first();

        /** @var array{total: int, siswa: int, guru: int, admin: int} $stats */
        $stats = [
            'total' => (int) $userCounts->total,
            'siswa' => (int) $userCounts->siswa,
            'guru' => (int) $userCounts->guru,
            'admin' => (int) $userCounts->admin,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
