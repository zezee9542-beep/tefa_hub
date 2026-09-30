<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /**
     * Show the login form page.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return view('auth.login');
    }

    /**
     * Handle login authentication request.
     *
     * Applies rate limiting (5 attempts per minute per IP+email).
     * Validates credentials against MySQL via Auth::attempt().
     * Redirects to role-specific dashboard on success.
     */
    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        // Rate limiter key: kombinasi email + IP untuk mencegah brute force
        $throttleKey = Str::transliterate(Str::lower($validated['email']).'|'.$request->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, maxAttempts: 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => __('Terlalu banyak percobaan login. Silakan coba lagi dalam :seconds detik.', [
                    'seconds' => $seconds,
                ]),
            ]);
        }

        // Coba autentikasi dengan email dan password
        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($throttleKey, decay: 60);

            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        }

        /** @var User $user */
        $user = Auth::user();

        // Cek akun aktif
        if (! $user->isActive()) {
            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Akun Anda telah dinonaktifkan. Silakan hubungi administrator.',
            ]);
        }

        // Reset rate limiter setelah berhasil login
        RateLimiter::clear($throttleKey);

        // Regenerate session ID untuk mencegah session fixation attack
        $request->session()->regenerate();

        return $this->redirectByRole();
    }

    /**
     * Handle user logout.
     *
     * Clears the session and CSRF token to prevent session reuse.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda telah berhasil keluar.');
    }

    /**
     * Redirect user to their role-specific dashboard after login.
     */
    private function redirectByRole(): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'guru' => redirect()->route('guru.dashboard'),
            default => redirect()->route('siswa.dashboard'),
        };
    }

    /**
     * Show the registration form page.
     */
    public function showRegisterForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return view('auth.register');
    }

    /**
     * Handle registration request.
     *
     * Creates a new siswa account, logs them in, and redirects to dashboard.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'nis' => ['nullable', 'string', 'max:20', 'unique:users,nis'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
            'nis.unique' => 'NIS sudah digunakan oleh akun lain.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'nis' => $validated['nis'] ?? null,
            'password' => $validated['password'],
            'role' => 'siswa',
            'is_active' => true,
        ]);

        Role::firstOrCreate(['name' => 'siswa']);
        $user->assignRole('siswa');

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('siswa.dashboard');
    }
}
