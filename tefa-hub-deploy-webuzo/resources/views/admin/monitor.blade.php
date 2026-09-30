<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Sistem — TEFA-Hub Admin</title>
    <meta name="description" content="Dashboard monitoring realtime TEFA-Hub: pantau status database, pengguna, server, dan aktivitas sistem secara live.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #060b14;
            --bg2: #0d1624;
            --surface: #111b2e;
            --surface2: #162035;
            --border: rgba(99,179,237,0.10);
            --border-bright: rgba(99,179,237,0.22);
            --accent: #38bdf8;
            --accent2: #818cf8;
            --accent3: #34d399;
            --accent4: #fb923c;
            --accent5: #f87171;
            --text: #e2f0ff;
            --text-muted: #6b8aba;
            --text-dim: #3a5070;
            --font: 'Plus Jakarta Sans', sans-serif;
            --mono: 'JetBrains Mono', monospace;
            --glow-blue: 0 0 30px rgba(56,189,248,0.15);
            --glow-green: 0 0 30px rgba(52,211,153,0.12);
            --glow-red: 0 0 30px rgba(248,113,113,0.12);
            --radius: 16px;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: rgba(56,189,248,0.25); border-radius: 3px; }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(56,189,248,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(56,189,248,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(6,11,20,0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            height: 64px;
        }

        .topbar-left { display: flex; align-items: center; gap: 1.25rem; }

        .logo-badge {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--accent);
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #0ea5e9, #818cf8);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .breadcrumb { display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; color: var(--text-muted); }
        .breadcrumb a { color: var(--text-muted); text-decoration: none; }
        .breadcrumb a:hover { color: var(--accent); }
        .breadcrumb span { color: var(--text-dim); }

        .topbar-right { display: flex; align-items: center; gap: 1rem; }

        .live-pill {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(52,211,153,0.1);
            border: 1px solid rgba(52,211,153,0.3);
            color: #34d399;
            padding: 0.35rem 0.9rem;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .live-dot {
            width: 7px; height: 7px; border-radius: 50%; background: #34d399;
            animation: pulseLive 1.5s ease-in-out infinite;
        }

        @keyframes pulseLive {
            0%,100% { opacity:1; transform:scale(1); }
            50% { opacity:0.4; transform:scale(0.75); }
        }

        .server-clock {
            font-family: var(--mono);
            font-size: 0.9rem;
            color: var(--text-muted);
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 0.4rem 0.9rem;
            border-radius: 8px;
            min-width: 80px;
            text-align: center;
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.45rem 1rem;
            background: rgba(248,113,113,0.08);
            border: 1px solid rgba(248,113,113,0.25);
            color: #f87171;
            border-radius: 8px;
            font-family: var(--font);
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-logout:hover { background: rgba(248,113,113,0.18); }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.45rem 1rem;
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--text-muted);
            border-radius: 8px;
            font-family: var(--font);
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
        .btn-back:hover { background: var(--surface2); color: var(--text); }

        .main {
            position: relative;
            z-index: 1;
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-header { margin-bottom: 2rem; }
        .page-header h1 {
            font-size: 1.9rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            background: linear-gradient(135deg, #e2f0ff 0%, #38bdf8 50%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.35rem;
        }
        .page-header p { color: var(--text-muted); font-size: 0.9rem; }

        .refresh-info {
            font-size: 0.78rem;
            color: var(--text-dim);
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin-top: 0.5rem;
        }

        .refresh-bar { height: 2px; background: var(--surface2); border-radius: 1px; margin-bottom: 2rem; overflow: hidden; }
        .refresh-fill {
            height: 100%;
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            border-radius: 1px;
            transition: width 0.1s linear;
            box-shadow: 0 0 8px rgba(56,189,248,0.5);
        }

        .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 1.5rem; }
        .grid-2-1 { display: grid; grid-template-columns: 2fr 1fr; gap: 1.25rem; margin-bottom: 1.5rem; }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: border-color 0.3s;
        }
        .card:hover { border-color: var(--border-bright); }
        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(56,189,248,0.3), transparent);
        }
        .card-glow-green { box-shadow: 0 0 30px rgba(52,211,153,0.12); }

        .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; }
        .card-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .card-icon {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center; font-size: 0.9rem;
        }

        .metric-value { font-size: 2.6rem; font-weight: 800; line-height: 1; letter-spacing: -0.04em; margin-bottom: 0.4rem; }
        .metric-label { font-size: 0.78rem; color: var(--text-muted); font-weight: 500; }
        .metric-change {
            display: inline-flex; align-items: center; gap: 0.3rem;
            font-size: 0.72rem; font-weight: 700;
            padding: 0.2rem 0.5rem; border-radius: 100px; margin-top: 0.5rem;
            background: rgba(56,189,248,0.1); color: #38bdf8;
        }

        .status-badge {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.3rem 0.8rem; border-radius: 100px;
            font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em;
        }
        .status-online { background: rgba(52,211,153,0.12); border: 1px solid rgba(52,211,153,0.3); color: #34d399; }
        .status-offline { background: rgba(248,113,113,0.12); border: 1px solid rgba(248,113,113,0.3); color: #f87171; }

        .gauge-wrap { display: flex; align-items: center; gap: 1rem; margin-top: 1.25rem; }
        .gauge-ring { position: relative; width: 80px; height: 80px; flex-shrink: 0; }
        .gauge-ring svg { transform: rotate(-90deg); }
        .gauge-ring .track { fill: none; stroke: var(--surface2); stroke-width: 6; }
        .gauge-ring .fill { fill: none; stroke-width: 6; stroke-linecap: round; transition: stroke-dashoffset 0.6s cubic-bezier(.4,0,.2,1); }
        .gauge-center { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .gauge-center .val { font-family: var(--mono); font-size: 0.95rem; font-weight: 500; line-height: 1; }
        .gauge-center .unit { font-size: 0.6rem; color: var(--text-muted); }
        .gauge-info .big { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.25rem; }
        .gauge-info .sm { font-size: 0.78rem; color: var(--text-muted); }

        .prog-row { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.9rem; }
        .prog-row:last-child { margin-bottom: 0; }
        .prog-label { width: 80px; font-size: 0.8rem; color: var(--text-muted); font-weight: 500; flex-shrink: 0; }
        .prog-bar { flex: 1; height: 6px; background: var(--surface2); border-radius: 3px; overflow: hidden; }
        .prog-fill { height: 100%; border-radius: 3px; transition: width 0.6s cubic-bezier(.4,0,.2,1); }
        .prog-fill.blue  { background: linear-gradient(90deg, #0ea5e9, #38bdf8); }
        .prog-fill.green { background: linear-gradient(90deg, #059669, #34d399); }
        .prog-fill.amber { background: linear-gradient(90deg, #d97706, #fb923c); }
        .prog-count { width: 32px; font-family: var(--mono); font-size: 0.78rem; font-weight: 500; text-align: right; flex-shrink: 0; }

        .info-row { display: flex; align-items: center; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid var(--border); }
        .info-row:last-child { border-bottom: none; }
        .info-key { font-size: 0.8rem; color: var(--text-muted); }
        .info-val { font-size: 0.82rem; font-weight: 600; font-family: var(--mono); }

        .feed-item { display: flex; align-items: center; gap: 0.85rem; padding: 0.85rem 0; border-bottom: 1px solid var(--border); animation: fadeIn 0.4s ease; }
        .feed-item:last-child { border-bottom: none; }
        @keyframes fadeIn { from { opacity:0; transform:translateX(-8px); } to { opacity:1; transform:translateX(0); } }

        .feed-avatar { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; flex-shrink: 0; }
        .feed-avatar.siswa { background: rgba(56,189,248,0.15); color: #38bdf8; border: 1px solid rgba(56,189,248,0.25); }
        .feed-avatar.guru  { background: rgba(52,211,153,0.15); color: #34d399; border: 1px solid rgba(52,211,153,0.25); }
        .feed-avatar.admin { background: rgba(251,146,60,0.15); color: #fb923c; border: 1px solid rgba(251,146,60,0.25); }

        .feed-info { flex: 1; min-width: 0; }
        .feed-name { font-size: 0.85rem; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .feed-meta { font-size: 0.72rem; color: var(--text-muted); margin-top: 0.15rem; }
        .feed-time { font-family: var(--mono); font-size: 0.7rem; color: var(--text-dim); flex-shrink: 0; text-align: right; }

        .role-chip { display: inline-block; padding: 0.12rem 0.5rem; border-radius: 100px; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; }
        .role-chip.siswa { background: rgba(56,189,248,0.1); color: #38bdf8; }
        .role-chip.guru  { background: rgba(52,211,153,0.1); color: #34d399; }
        .role-chip.admin { background: rgba(251,146,60,0.1); color: #fb923c; }

        .num-blue   { color: #38bdf8; }
        .num-green  { color: #34d399; }
        .num-amber  { color: #fb923c; }
        .num-purple { color: #818cf8; }

        .skeleton {
            background: linear-gradient(90deg, var(--surface2) 25%, var(--surface) 50%, var(--surface2) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 6px;
            height: 1rem;
        }
        @keyframes shimmer { 0% { background-position:200% 0; } 100% { background-position:-200% 0; } }

        .last-updated { text-align: center; font-size: 0.72rem; color: var(--text-dim); padding: 1.5rem 0 0.5rem; font-family: var(--mono); }

        @media (max-width: 1200px) { .grid-4 { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 900px)  { .grid-2-1 { grid-template-columns: 1fr; } }
        @media (max-width: 640px)  {
            .topbar {
                height: auto;
                min-height: 60px;
                flex-wrap: wrap;
                gap: 8px;
                padding: 10px 14px;
            }
            .topbar-left { min-width: 0; gap: 8px; }
            .logo-badge { font-size: .95rem; white-space: nowrap; }
            .logo-icon { width: 32px; height: 32px; }
            .breadcrumb { display: none; }
            .topbar-right { width: 100%; justify-content: flex-end; gap: .5rem; }
            .main { padding: 1rem; }
            .page-header { margin-bottom: 1.5rem; }
            .page-header h1 { font-size: 1.45rem; line-height: 1.25; }
            .page-header p { font-size: .82rem; line-height: 1.55; }
            .grid-4 { grid-template-columns: 1fr 1fr; gap: .75rem; }
            .grid-2-1 { gap: .75rem; }
            .card { padding: 1rem; border-radius: 14px; }
            .metric-value { font-size: 2rem; }
            .gauge-wrap { gap: .75rem; }
        }

        @media (max-width: 420px) {
            .live-pill,
            .server-clock { display: none; }
            .topbar-right { margin-left: auto; width: auto; }
            .btn-back,
            .btn-logout { padding: .45rem .7rem; }
            .grid-4 { grid-template-columns: 1fr; }
            .feed-time { font-size: .64rem; }
        }
    </style>
</head>
<body>

    <header class="topbar">
        <div class="topbar-left">
            <div class="logo-badge">
                <div class="logo-icon">📡</div>
                TEFA Monitor
            </div>
            <nav class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Admin</a>
                <span>›</span>
                <span style="color:var(--text);">Monitor Sistem</span>
            </nav>
        </div>
        <div class="topbar-right">
            <div class="live-pill"><span class="live-dot"></span> Live</div>
            <div class="server-clock" id="serverClock">--:--:--</div>
            <a href="{{ route('admin.dashboard') }}" class="btn-back">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                Dashboard
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </header>

    <main class="main">

        <div class="page-header">
            <h1>🖥 Dashboard Monitoring Realtime</h1>
            <p>Pantau status sistem, database, pengguna, dan aktivitas secara live — diperbarui setiap 3 detik.</p>
            <div class="refresh-info">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.5"/></svg>
                Auto-refresh setiap 3 detik &nbsp;|&nbsp; <span id="lastUpdatedInline">Menunggu data...</span>
            </div>
        </div>

        <div class="refresh-bar">
            <div class="refresh-fill" id="refreshFill" style="width:0%"></div>
        </div>

        <!-- Row 1: 4 Key Stats -->
        <div class="grid-4">

            <!-- DB Card -->
            <div class="card card-glow-green">
                <div class="card-header">
                    <span class="card-title">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                        Database
                    </span>
                    <div class="card-icon" style="background:rgba(52,211,153,0.1)">🗄</div>
                </div>
                <div id="dbStatus" class="status-badge status-online">
                    <span class="live-dot" style="width:6px;height:6px;background:#34d399"></span>
                    Online
                </div>
                <div class="gauge-wrap">
                    <div class="gauge-ring">
                        <svg width="80" height="80" viewBox="0 0 80 80">
                            <circle class="track" cx="40" cy="40" r="31"/>
                            <circle class="fill" id="dbGaugeFill" cx="40" cy="40" r="31"
                                stroke="#34d399"
                                stroke-dasharray="195"
                                stroke-dashoffset="195"/>
                        </svg>
                        <div class="gauge-center">
                            <span class="val" id="dbLatencyVal">—</span>
                            <span class="unit">ms</span>
                        </div>
                    </div>
                    <div class="gauge-info">
                        <div class="big num-green" id="dbDriver">—</div>
                        <div class="sm" id="dbSize">Ukuran DB: —</div>
                        <div class="sm" style="margin-top:0.25rem" id="dbLatencyLabel">Latency: — ms</div>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Total Pengguna
                    </span>
                    <div class="card-icon" style="background:rgba(56,189,248,0.1)">👥</div>
                </div>
                <div class="metric-value num-blue" id="totalUsers">—</div>
                <div class="metric-label">Akun Terdaftar</div>
                <div class="metric-change" id="newTodayBadge">✦ — Baru Hari Ini</div>
            </div>

            <!-- Memory -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        Memory PHP
                    </span>
                    <div class="card-icon" style="background:rgba(129,140,248,0.1)">💾</div>
                </div>
                <div class="metric-value num-purple" id="memVal">—</div>
                <div class="metric-label">MB digunakan sekarang</div>
                <div class="metric-change" style="margin-top:0.5rem">Peak: <span id="memPeak">—</span> MB</div>
            </div>

            <!-- Sessions -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                        Sesi Aktif
                    </span>
                    <div class="card-icon" style="background:rgba(251,146,60,0.1)">📶</div>
                </div>
                <div class="metric-value num-amber" id="sessVal">—</div>
                <div class="metric-label">Estimasi sesi berjalan</div>
                <div class="metric-change" id="sessDriver" style="margin-top:0.5rem">Driver: —</div>
            </div>

        </div>

        <!-- Row 2: Distribution + Server Info -->
        <div class="grid-2-1">

            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3v18h18"/><polyline points="7 16 12 11 16 13 21 8"/></svg>
                        Distribusi Pengguna
                    </span>
                </div>
                <div class="prog-row">
                    <span class="prog-label">Siswa</span>
                    <div class="prog-bar"><div class="prog-fill blue" id="progSiswa" style="width:0%"></div></div>
                    <span class="prog-count num-blue" id="cntSiswa">—</span>
                </div>
                <div class="prog-row">
                    <span class="prog-label">Guru</span>
                    <div class="prog-bar"><div class="prog-fill green" id="progGuru" style="width:0%"></div></div>
                    <span class="prog-count num-green" id="cntGuru">—</span>
                </div>
                <div class="prog-row">
                    <span class="prog-label">Admin</span>
                    <div class="prog-bar"><div class="prog-fill amber" id="progAdmin" style="width:0%"></div></div>
                    <span class="prog-count num-amber" id="cntAdmin">—</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                        Info Server
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-key">PHP Version</span>
                    <span class="info-val num-green" id="phpVer">—</span>
                </div>
                <div class="info-row">
                    <span class="info-key">Laravel</span>
                    <span class="info-val num-blue" id="laravelVer">—</span>
                </div>
                <div class="info-row">
                    <span class="info-key">Environment</span>
                    <span class="info-val num-amber" id="envVal">—</span>
                </div>
                <div class="info-row">
                    <span class="info-key">Cache Driver</span>
                    <span class="info-val" id="cacheDriver">—</span>
                </div>
                <div class="info-row">
                    <span class="info-key">Queue Driver</span>
                    <span class="info-val" id="queueDriver">—</span>
                </div>
                <div class="info-row">
                    <span class="info-key">Uptime</span>
                    <span class="info-val num-purple" id="uptime">—</span>
                </div>
            </div>

        </div>

        <!-- Row 3: Activity Feed -->
        <div class="card" style="margin-bottom:1.5rem;">
            <div class="card-header">
                <span class="card-title">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Aktivitas Pendaftaran Terbaru
                </span>
                <span class="status-badge status-online" style="font-size:0.65rem;padding:0.2rem 0.6rem;">Live Feed</span>
            </div>
            <div id="activityFeed">
                <div class="feed-item">
                    <div class="skeleton" style="width:36px;height:36px;border-radius:50%;flex-shrink:0;"></div>
                    <div style="flex:1;"><div class="skeleton" style="margin-bottom:0.4rem;width:60%;"></div><div class="skeleton" style="width:40%;"></div></div>
                </div>
            </div>
        </div>

        <div class="last-updated" id="lastUpdated">Memuat data sistem...</div>

    </main>

    <script>
    const METRICS_URL = '{{ route("admin.monitor.metrics") }}';
    const REFRESH_MS  = 3000;
    const CIRC = 195;

    let progressAnim = null;
    let progressStart = null;

    function tickClock() {
        const el = document.getElementById('serverClock');
        el.textContent = new Date().toLocaleTimeString('id-ID', { hour12: false });
    }
    setInterval(tickClock, 1000);
    tickClock();

    function startProgress() {
        const fill = document.getElementById('refreshFill');
        progressStart = performance.now();
        cancelAnimationFrame(progressAnim);
        (function step(now) {
            const pct = Math.min(((now - progressStart) / REFRESH_MS) * 100, 100);
            fill.style.width = pct + '%';
            if (pct < 100) { progressAnim = requestAnimationFrame(step); }
        })(performance.now());
    }

    function updateGauge(ms) {
        const fill = document.getElementById('dbGaugeFill');
        const val  = document.getElementById('dbLatencyVal');
        const pct  = Math.min(ms / 200, 1);
        fill.style.strokeDashoffset = CIRC - pct * CIRC;
        fill.style.stroke = ms < 20 ? '#34d399' : ms < 80 ? '#38bdf8' : ms < 150 ? '#fb923c' : '#f87171';
        val.textContent = ms.toFixed(1);
    }

    function render(data) {
        document.getElementById('serverClock').textContent = data.server_time;

        // DB
        const db = data.db;
        const dbEl = document.getElementById('dbStatus');
        dbEl.className = 'status-badge ' + (db.status === 'online' ? 'status-online' : 'status-offline');
        dbEl.innerHTML = db.status === 'online'
            ? '<span class="live-dot" style="width:6px;height:6px;background:#34d399"></span> Online'
            : '&#x2715; Offline';
        document.getElementById('dbDriver').textContent        = db.driver;
        document.getElementById('dbSize').textContent          = 'Ukuran DB: ' + db.size_mb + ' MB';
        document.getElementById('dbLatencyLabel').textContent  = 'Latency: ' + db.latency_ms + ' ms';
        updateGauge(db.latency_ms);

        // Users
        const u = data.users;
        document.getElementById('totalUsers').textContent   = u.total;
        document.getElementById('newTodayBadge').textContent = '\u2736 ' + u.new_today + ' Baru Hari Ini';
        document.getElementById('cntSiswa').textContent     = u.siswa;
        document.getElementById('cntGuru').textContent      = u.guru;
        document.getElementById('cntAdmin').textContent     = u.admin;
        const tot = u.total || 1;
        document.getElementById('progSiswa').style.width = Math.round(u.siswa / tot * 100) + '%';
        document.getElementById('progGuru').style.width  = Math.round(u.guru  / tot * 100) + '%';
        document.getElementById('progAdmin').style.width = Math.round(u.admin / tot * 100) + '%';

        // System
        const s = data.system;
        document.getElementById('memVal').textContent     = s.memory_mb;
        document.getElementById('memPeak').textContent    = s.peak_memory_mb;
        document.getElementById('phpVer').textContent     = s.php_version;
        document.getElementById('laravelVer').textContent = 'v' + s.laravel_version;
        document.getElementById('envVal').textContent     = s.environment.toUpperCase();
        document.getElementById('cacheDriver').textContent = s.cache_driver.toUpperCase();
        document.getElementById('queueDriver').textContent = s.queue_driver.toUpperCase();
        document.getElementById('uptime').textContent     = s.uptime;

        // Sessions
        const ss = data.sessions;
        document.getElementById('sessVal').textContent    = ss.active_estimate;
        document.getElementById('sessDriver').textContent = 'Driver: ' + ss.driver;

        // Activity Feed
        const feed = document.getElementById('activityFeed');
        if (data.activity && data.activity.length) {
            feed.innerHTML = data.activity.map(item => {
                const initials  = (item.name || 'U').split(' ').map(w => w[0]).join('').toUpperCase().slice(0, 2);
                const roleClass = ['admin','guru','siswa'].includes(item.role) ? item.role : 'siswa';
                return `<div class="feed-item">
                    <div class="feed-avatar ${roleClass}">${initials}</div>
                    <div class="feed-info">
                        <div class="feed-name">${item.name} <span class="role-chip ${roleClass}">${item.role}</span></div>
                        <div class="feed-meta">Terdaftar ${item.ago}</div>
                    </div>
                    <div class="feed-time">${item.created_at}</div>
                </div>`;
            }).join('');
        } else {
            feed.innerHTML = '<div style="padding:1.5rem;text-align:center;color:var(--text-muted);font-size:0.85rem;">Belum ada aktivitas.</div>';
        }

        const now = new Date().toLocaleString('id-ID');
        document.getElementById('lastUpdated').textContent       = '\u27f3 Terakhir diperbarui: ' + now;
        document.getElementById('lastUpdatedInline').textContent = now;
    }

    async function fetchMetrics() {
        try {
            const res = await fetch(METRICS_URL);
            if (!res.ok) throw new Error('HTTP ' + res.status);
            render(await res.json());
        } catch (e) {
            document.getElementById('lastUpdated').textContent = '\u26a0 Gagal memuat data: ' + e.message;
        }
    }

    function poll() {
        fetchMetrics();
        startProgress();
        setTimeout(poll, REFRESH_MS);
    }

    document.addEventListener('DOMContentLoaded', poll);
    </script>
</body>
</html>
