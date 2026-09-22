<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — TEFA-Hub</title>
    <meta name="description" content="Panel administrasi TEFA-Hub. Kelola pengguna, pantau aktivitas sistem, dan konfigurasi aplikasi.">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0d1117;
            --surface: #161b22;
            --surface-2: #1c2333;
            --border: rgba(255,255,255,0.08);
            --accent: #f59e0b;
            --accent-glow: rgba(245,158,11,0.12);
            --text: #e6edf3;
            --text-muted: #8b949e;
            --font: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 3rem 2rem;
        }

        .dashboard-wrapper { width: 100%; max-width: 960px; }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent-glow);
            border: 1px solid rgba(245,158,11,0.3);
            color: var(--accent);
            padding: 0.4rem 1rem;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .dot { width: 8px; height: 8px; border-radius: 50%; background: var(--accent); animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: 0.4; } }

        h1 { font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem; }
        .subtitle { color: var(--text-muted); font-size: 1rem; margin-bottom: 2.5rem; }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            transition: border-color 0.2s, transform 0.2s;
        }

        .stat-card:hover { transform: translateY(-3px); border-color: rgba(245,158,11,0.3); }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* Role breakdown */
        .section-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .users-breakdown {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .breakdown-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.875rem 0;
            border-bottom: 1px solid var(--border);
        }

        .breakdown-row:last-child { border-bottom: none; }

        .breakdown-role {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .role-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .role-dot.admin { background: #f59e0b; }
        .role-dot.guru  { background: #22c55e; }
        .role-dot.siswa { background: #3b82f6; }

        .role-name { font-weight: 600; }
        .role-count {
            font-size: 1.25rem;
            font-weight: 800;
        }

        .info-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem;
            margin-bottom: 2rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child { border-bottom: none; }
        .info-key { color: var(--text-muted); font-size: 0.875rem; }
        .info-val { font-weight: 600; font-size: 0.9rem; }

        .logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.3);
            color: #f87171;
            border-radius: 10px;
            font-family: var(--font);
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }

        .logout-btn:hover { background: rgba(239,68,68,0.2); }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">

        <div class="role-badge">
            <span class="dot"></span>
            Administrator
        </div>

        <h1>Panel Admin — TEFA Hub ⚙️</h1>
        <p class="subtitle">Selamat datang, <strong>{{ auth()->user()->name }}</strong>. Anda memiliki akses penuh ke sistem.</p>

        <!-- Stats Total Pengguna -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total'] }}</div>
                <div class="stat-label">Total Pengguna</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color:#3b82f6;">{{ $stats['siswa'] }}</div>
                <div class="stat-label">Siswa Terdaftar</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color:#22c55e;">{{ $stats['guru'] }}</div>
                <div class="stat-label">Guru / Pengajar</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color:#f59e0b;">{{ $stats['admin'] }}</div>
                <div class="stat-label">Administrator</div>
            </div>
        </div>

        <!-- Breakdown Role -->
        <p class="section-title">Distribusi Pengguna per Role</p>
        <div class="users-breakdown">
            <div class="breakdown-row">
                <div class="breakdown-role">
                    <span class="role-dot admin"></span>
                    <span class="role-name">Administrator</span>
                </div>
                <span class="role-count" style="color:#f59e0b;">{{ $stats['admin'] }}</span>
            </div>
            <div class="breakdown-row">
                <div class="breakdown-role">
                    <span class="role-dot guru"></span>
                    <span class="role-name">Guru / Pengajar</span>
                </div>
                <span class="role-count" style="color:#22c55e;">{{ $stats['guru'] }}</span>
            </div>
            <div class="breakdown-row">
                <div class="breakdown-role">
                    <span class="role-dot siswa"></span>
                    <span class="role-name">Siswa</span>
                </div>
                <span class="role-count" style="color:#3b82f6;">{{ $stats['siswa'] }}</span>
            </div>
        </div>

        <!-- Info Akun Admin -->
        <p class="section-title">Informasi Akun Anda</p>
        <div class="info-card">
            <div class="info-row">
                <span class="info-key">Nama Lengkap</span>
                <span class="info-val">{{ auth()->user()->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Email</span>
                <span class="info-val">{{ auth()->user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Role</span>
                <span class="info-val" style="color:#f59e0b;">Administrator</span>
            </div>
            <div class="info-row">
                <span class="info-key">Status Akun</span>
                <span class="info-val" style="color:#22c55e;">● Aktif</span>
            </div>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Keluar dari Sistem
            </button>
        </form>

    </div>
</body>
</html>
