@props(['user' => []])

<header class="siswa-top-header" role="banner">
    <!-- Search Bar -->
    <div class="searchbar-wrapper">
        <svg class="searchbar-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#7E8B9B" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input 
            type="search" 
            class="searchbar-input" 
            placeholder="Cari materi, tugas, produk BLUD, atau lowongan BKK..." 
            aria-label="Pencarian materi, tugas, produk BLUD, atau lowongan BKK"
        >
    </div>

    <!-- Header Actions & Profile Group -->
    <div class="header-right-group">
        <!-- Status Siswa Aktif Badge -->
        <div class="status-siswa-badge" title="Status Keaktifan Siswa">
            <span class="status-badge-circle" aria-hidden="true"></span>
            <span class="status-badge-text">{{ $user['status'] ?? 'SISWA AKTIF' }}</span>
            <svg class="status-badge-info-icon" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#006243" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
        </div>

        <!-- Notification Button Circle -->
        <button type="button" class="header-circle-btn" aria-label="Notifikasi" title="Notifikasi">
            <div class="icon-with-badge">
                <img src="{{ asset('assets/notif.png') }}" alt="Notifikasi" class="header-btn-icon" width="18" height="18">
                <span class="notif-red-badge" aria-label="Ada notifikasi baru"></span>
            </div>
        </button>

        <!-- History Button Circle -->
        <button type="button" class="header-circle-btn" aria-label="Riwayat Aktivitas" title="Riwayat Aktivitas">
            <img src="{{ asset('assets/riwayat.png') }}" alt="Riwayat" class="header-btn-icon" width="18" height="18">
        </button>

        <!-- User Profile Text -->
        <div class="header-profile-text">
            <span class="profile-fullname">{{ $user['name'] ?? (auth()->user()->name ?? 'Kirana Kinanti') }}</span>
            <span class="profile-subtext">{{ $user['class'] ?? 'XII RPL 1' }}</span>
        </div>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="header-logout-form">
            @csrf
            <button type="submit" class="header-circle-btn btn-logout-header" aria-label="Keluar / Logout" title="Keluar / Logout">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
            </button>
        </form>
    </div>
</header>
