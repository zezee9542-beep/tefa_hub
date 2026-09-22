<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Checks whether the authenticated user has the required role and an active account.
     * Denies access with 403 if role does not match or account is inactive.
     *
     * @param  array<int, string>  $roles  Accepted roles, passed via route middleware alias.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        /** @var User|null $user */
        $user = Auth::user();

        // Belum login — biarkan middleware 'auth' yang menangani redirect
        if ($user === null) {
            return redirect()->route('login');
        }

        // Akun dinonaktifkan oleh admin
        if (! $user->isActive()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->withErrors(['email' => 'Akun Anda telah dinonaktifkan. Hubungi administrator.']);
        }

        // Role tidak cocok dengan yang diizinkan untuk route ini
        if (! in_array($user->role, $roles, true)) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
