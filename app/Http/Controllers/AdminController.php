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
        /** @var array{total: int, siswa: int, guru: int, admin: int} $stats */
        $stats = [
            'total' => User::count(),
            'siswa' => User::where('role', 'siswa')->count(),
            'guru' => User::where('role', 'guru')->count(),
            'admin' => User::where('role', 'admin')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
