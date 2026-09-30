<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SystemMonitorController extends Controller
{
    /**
     * Show the full realtime monitoring dashboard.
     */
    public function index(): View
    {
        return view('admin.monitor');
    }

    /**
     * Return a live system metrics snapshot as JSON.
     * Called every few seconds by the frontend via fetch().
     */
    public function metrics(): JsonResponse
    {
        $dbStatus = $this->getDatabaseStatus();
        $userStats = $this->getUserStats();
        $systemInfo = $this->getSystemInfo();
        $activityLog = $this->getRecentActivity();
        $sessionStats = $this->getSessionStats();

        return response()->json([
            'timestamp' => now()->toIso8601String(),
            'server_time' => now()->format('H:i:s'),
            'server_date' => now()->translatedFormat('l, d F Y'),
            'db' => $dbStatus,
            'users' => $userStats,
            'system' => $systemInfo,
            'activity' => $activityLog,
            'sessions' => $sessionStats,
        ]);
    }

    /**
     * Test database connectivity and response time.
     *
     * @return array{status: string, latency_ms: float, driver: string, size_mb: float}
     */
    private function getDatabaseStatus(): array
    {
        $start = microtime(true);
        $driver = 'unknown';
        $sizeMb = 0.0;

        try {
            DB::connection()->getPdo();
            $latency = round((microtime(true) - $start) * 1000, 2);
            $driver = DB::connection()->getDriverName();

            if ($driver === 'mysql' || $driver === 'mariadb') {
                $rows = DB::select('
                    SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS size_mb
                    FROM information_schema.tables
                    WHERE table_schema = DATABASE()
                ');
                $sizeMb = (float) ($rows[0]->size_mb ?? 0);
            }

            return [
                'status' => 'online',
                'latency_ms' => $latency,
                'driver' => strtoupper($driver),
                'size_mb' => $sizeMb,
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 'offline',
                'latency_ms' => 0,
                'driver' => $driver,
                'size_mb' => 0,
            ];
        }
    }

    /**
     * Aggregate user counts grouped by role.
     *
     * @return array{total: int, siswa: int, guru: int, admin: int, new_today: int}
     */
    private function getUserStats(): array
    {
        $counts = User::selectRaw('role, COUNT(*) as cnt')
            ->groupBy('role')
            ->pluck('cnt', 'role')
            ->toArray();

        $newToday = User::whereDate('created_at', today())->count();

        return [
            'total' => array_sum($counts),
            'siswa' => (int) ($counts['siswa'] ?? 0),
            'guru' => (int) ($counts['guru'] ?? 0),
            'admin' => (int) ($counts['admin'] ?? 0),
            'new_today' => $newToday,
        ];
    }

    /**
     * Gather server / PHP environment info.
     *
     * @return array{php_version: string, laravel_version: string, environment: string, uptime: string, memory_mb: float, peak_memory_mb: float, cache_driver: string, queue_driver: string}
     */
    private function getSystemInfo(): array
    {
        $memoryMb = round(memory_get_usage(true) / 1024 / 1024, 2);
        $peakMb = round(memory_get_peak_usage(true) / 1024 / 1024, 2);

        return [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'environment' => app()->environment(),
            'uptime' => $this->getUptimeString(),
            'memory_mb' => $memoryMb,
            'peak_memory_mb' => $peakMb,
            'cache_driver' => config('cache.default', 'file'),
            'queue_driver' => config('queue.default', 'sync'),
        ];
    }

    /**
     * Return recent user registrations as activity feed.
     *
     * @return list<array{name: string, role: string, created_at: string, ago: string}>
     */
    private function getRecentActivity(): array
    {
        return User::latest()
            ->take(8)
            ->get(['name', 'role', 'created_at'])
            ->map(fn (User $u) => [
                'name' => $u->name,
                'role' => $u->role ?? 'siswa',
                'created_at' => $u->created_at?->format('d M Y, H:i') ?? '-',
                'ago' => $u->created_at?->diffForHumans() ?? '-',
            ])
            ->toArray();
    }

    /**
     * Estimate active sessions from session storage.
     *
     * @return array{driver: string, active_estimate: int}
     */
    private function getSessionStats(): array
    {
        $driver = config('session.driver', 'file');
        $activeEstimate = 0;

        if ($driver === 'file') {
            $sessionPath = config('session.files', storage_path('framework/sessions'));
            if (is_dir($sessionPath)) {
                $files = glob($sessionPath.DIRECTORY_SEPARATOR.'*');
                if ($files !== false) {
                    $lifetime = config('session.lifetime', 120) * 60;
                    foreach ($files as $file) {
                        if (is_file($file) && (time() - filemtime($file)) < $lifetime) {
                            $activeEstimate++;
                        }
                    }
                }
            }
        } elseif ($driver === 'database') {
            try {
                $table = config('session.table', 'sessions');
                $lifetime = config('session.lifetime', 120);
                $activeEstimate = DB::table($table)
                    ->where('last_activity', '>=', now()->subMinutes($lifetime)->timestamp)
                    ->count();
            } catch (\Throwable) {
                $activeEstimate = 0;
            }
        }

        return [
            'driver' => strtoupper($driver),
            'active_estimate' => $activeEstimate,
        ];
    }

    /**
     * Get PHP process uptime (approximation using opcache or start time).
     */
    private function getUptimeString(): string
    {
        if (function_exists('opcache_get_status')) {
            $opcache = @opcache_get_status(false);
            if (is_array($opcache) && isset($opcache['opcache_statistics']['start_time'])) {
                $start = (int) $opcache['opcache_statistics']['start_time'];
                $diff = time() - $start;
                $days = intdiv($diff, 86400);
                $hours = intdiv($diff % 86400, 3600);
                $mins = intdiv($diff % 3600, 60);

                return "{$days}d {$hours}h {$mins}m";
            }
        }

        return 'N/A';
    }
}
