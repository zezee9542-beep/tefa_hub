@props(['active' => 'dashboard'])

<aside class="sidebar" aria-label="Navigasi Utama Siswa">
    <!-- Brand Logo & Title Header -->
    <div class="sidebar-header-top">
        <a href="{{ route('home') }}" class="sidebar-brand">
            <img src="{{ asset('assets/logo.png') }}" alt="Tefa-Hub Logo" class="sidebar-logo" onerror="this.onerror=null; this.src='{{ asset('assets/1.png') }}';">
            <div class="brand-text-group">
                <span class="brand-title">Tefa-Hub</span>
                <span class="brand-subtitle">DIGITAL VOKASI</span>
            </div>
        </a>
        <button type="button" class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Tutup Sidebar" title="Tutup Menu">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <!-- Section Title -->
    <div class="nav-section-title">MENU NAVIGASI</div>

    <!-- Navigation Links List -->
    <nav>
        <ul class="sidebar-nav-list">
            <li>
                <a href="{{ route('siswa.dashboard') }}" class="nav-item-link {{ $active === 'dashboard' ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.akademik') }}" class="nav-item-link {{ $active === 'akademik' ? 'active' : '' }}">
                    Akademik
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.blud') }}" class="nav-item-link {{ $active === 'blud' ? 'active' : '' }}">
                    BLUD
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.bkk') }}" class="nav-item-link {{ $active === 'bkk' ? 'active' : '' }}">
                    BKK Career Center
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.riwayat') }}" class="nav-item-link {{ $active === 'riwayat' ? 'active' : '' }}">
                    Riwayat Aktivitas
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.tanya-tefa') }}" class="nav-item-link {{ $active === 'tanya-tefa' ? 'active' : '' }}">
                    Tanya Tefa
                </a>
            </li>
        </ul>
    </nav>

    <!-- User Profile Footer -->
    <div class="sidebar-footer-profile">
        <div class="profile-avatar">{{ strtoupper(substr($user['name'] ?? 'Kirana Kinanti', 0, 2)) }}</div>
        <div class="profile-info">
            <span class="profile-name">{{ $user['name'] ?? 'Kirana Kinanti' }}</span>
            <span class="profile-role">{{ $user['class'] ?? 'XII RPL 1' }}</span>
        </div>
    </div>
</aside>
