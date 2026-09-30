<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru — TEFA-Hub</title>
    <meta name="description" content="Dashboard pengajar TEFA-Hub. Kelola kelas, pantau progress siswa, dan akses sumber daya pengajaran.">

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
            --accent: #22c55e;
            --accent-glow: rgba(34,197,94,0.15);
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
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .dashboard-wrapper {
            width: 100%;
            max-width: 900px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent-glow);
            border: 1px solid rgba(34,197,94,0.3);
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

        h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 2.5rem;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            transition: border-color 0.2s, transform 0.2s;
        }

        .card:hover { border-color: rgba(34,197,94,0.3); transform: translateY(-2px); }

        .card-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: var(--accent-glow);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1rem;
            color: var(--accent);
        }

        .card-label { font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-bottom: 0.3rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .card-value { font-size: 1.6rem; font-weight: 800; color: var(--text); }

        .info-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem;
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
            margin-top: 2rem;
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
            Guru / Pengajar
        </div>

        <h1>Selamat Datang, {{ auth()->user()->name }} 👋</h1>
        <p class="subtitle">Anda masuk sebagai <strong>Guru</strong> di ekosistem TEFA-Hub.</p>

        <div class="card-grid">
            <div class="card">
                <div class="card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="card-label">Total Siswa Diampu</div>
                <div class="card-value">—</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <div class="card-label">Jadwal Mengajar</div>
                <div class="card-value">—</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                    </svg>
                </div>
                <div class="card-label">Project Aktif</div>
                <div class="card-value">—</div>
            </div>
        </div>

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
                <span class="info-val">Guru / Pengajar</span>
            </div>
            <div class="info-row">
                <span class="info-key">Status Akun</span>
                <span class="info-val" style="color: #22c55e;">● Aktif</span>
            </div>
        </div>

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
