<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AiNavigatorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SystemMonitorController;
use Illuminate\Support\Facades\Route;

// ─── Landing Page & Multipage Routes ─────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/bkk', function () {
    return view('bkk');
})->name('bkk');

Route::get('/pkl', function () {
    return view('pkl');
})->name('pkl');

// ─── Auth Routes (hanya bisa diakses saat belum login) ─────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    if (config('security.allow_self_registration')) {
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])
            ->middleware('throttle:registration')
            ->name('register.post');
    }
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
        Route::post('/profile', [SiswaController::class, 'updateProfile'])->name('profile.update');
        Route::post('/blud/publikasi', [SiswaController::class, 'ajukanPublikasi'])->name('blud.publikasi');

        // ─── Realtime Data & Actions Endpoints ───
        Route::get('/api/dashboard-data', [SiswaController::class, 'getDashboardData'])->name('api.dashboard');
        Route::get('/api/blud-data', [SiswaController::class, 'getBludData'])->name('api.blud');
        Route::post('/api/blud-produk', [SiswaController::class, 'storeBludProduct'])->name('api.blud.store');
        Route::get('/api/bkk-data', [SiswaController::class, 'getBkkData'])->name('api.bkk');
        Route::post('/api/bkk-lamar', [SiswaController::class, 'lamarPekerjaan'])->name('api.bkk.lamar');
        Route::get('/api/akademik-data', [SiswaController::class, 'getAkademikData'])->name('api.akademik');
        Route::get('/uploads/{directory}/{filename}', [SiswaController::class, 'showUpload'])
            ->whereIn('directory', ['avatars', 'produk'])
            ->where('filename', '[A-Za-z0-9_-]+\\.(?:jpe?g|png|webp)')
            ->name('uploads.show');
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
        Route::get('/monitor', [SystemMonitorController::class, 'index'])->name('monitor');
        Route::get('/monitor/metrics', [SystemMonitorController::class, 'metrics'])->name('monitor.metrics');
    });

// ─── AI Navigator Endpoints (Bisa diakses publik & user login) ───────────────
Route::prefix('ai-navigator')
    ->name('ai.')
    ->group(function () {
        Route::get('/greet', [AiNavigatorController::class, 'greet'])->name('greet');
        Route::post('/chat', [AiNavigatorController::class, 'chat'])
            ->middleware('throttle:ai-chat')
            ->name('chat');
    });
