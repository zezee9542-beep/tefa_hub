<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GuruController extends Controller
{
    /**
     * Show the guru dashboard page.
     */
    public function index(): View
    {
        return view('guru.dashboard');
    }
}
