<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AiNavigatorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// ─── Landing Page ──────────────────────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ─── Auth Routes (hanya bisa diakses saat belum login) ─────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ─── Siswa Routes (hanya untuk role siswa) ─────────────────────────────────
Route::prefix('siswa')
    ->name('siswa.')
    ->middleware(['auth', 'role:siswa'])
    ->group(function () {
        Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
        Route::get('/akademik', [SiswaController::class, 'akademik'])->name('akademik');
        Route::get('/blud', [SiswaController::class, 'blud'])->name('blud');
        Route::get('/bkk', [SiswaController::class, 'bkk'])->name('bkk');
        Route::get('/riwayat', [SiswaController::class, 'riwayat'])->name('riwayat');
        Route::get('/tanya-tefa', [SiswaController::class, 'tanyaTefa'])->name('tanya-tefa');
    });

// ─── Guru Routes (hanya untuk role guru) ───────────────────────────────────
Route::prefix('guru')
    ->name('guru.')
    ->middleware(['auth', 'role:guru'])
    ->group(function () {
        Route::get('/dashboard', [GuruController::class, 'index'])->name('dashboard');
    });

// ─── Admin Routes (hanya untuk role admin) ─────────────────────────────────
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    });

// ─── AI Navigator Endpoints ─────────────────────────────────────────────────
Route::prefix('ai-navigator')
    ->name('ai.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/greet', [AiNavigatorController::class, 'greet'])->name('greet');
        Route::post('/chat', [AiNavigatorController::class, 'chat'])->name('chat');
    });
