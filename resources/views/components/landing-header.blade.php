@props(['active' => ''])

{{-- ═══════════════════════════════════════════
     UNIFIED LANDING / PUBLIC HEADER & NAVBAR
     ═══════════════════════════════════════════ --}}
<header class="site-header" id="siteHeader">
    <div class="wrap">
        <a href="{{ url('/') }}" class="brand" aria-label="Tefa-Hub Beranda">
            <img src="{{ asset('assets/logo.webp') }}" alt="Logo Tefa-Hub" width="36" height="36">
            <span class="brand-name">Tefa<span>-Hub</span></span>
        </a>

        <nav aria-label="Navigasi Utama">
            <ul class="nav-links">
                {{-- Beranda --}}
                <li>
                    <a href="{{ url('/') }}" class="{{ (in_array($active, ['home', 'beranda', '']) && request()->is('/')) ? 'active-nav-link' : '' }}">Beranda</a>
                </li>

                {{-- Layanan Dropdown (PPDB, BLUD, BKK, PKL) --}}
                <li class="nav-dropdown {{ in_array($active, ['ppdb', 'blud', 'bkk', 'pkl']) ? 'has-active' : '' }}">
                    <button type="button" class="nav-dropdown-toggle {{ in_array($active, ['ppdb', 'blud', 'bkk', 'pkl']) ? 'active-nav-link' : '' }}" aria-expanded="false" aria-haspopup="true">
                        <span>Layanan</span>
                        <svg class="dropdown-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('ppdb') }}" class="dropdown-item {{ $active === 'ppdb' ? 'active-item' : '' }}">
                            <div class="dropdown-item-icon ppdb-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                            </div>
                            <div class="dropdown-item-content">
                                <span class="dropdown-item-title">PPDB</span>
                                <span class="dropdown-item-desc">Penerimaan Siswa Baru</span>
                            </div>
                        </a>
                        <a href="{{ url('/#blud') }}" class="dropdown-item {{ $active === 'blud' ? 'active-item' : '' }}">
                            <div class="dropdown-item-icon blud-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                            </div>
                            <div class="dropdown-item-content">
                                <span class="dropdown-item-title">BLUD</span>
                                <span class="dropdown-item-desc">Teaching Factory &amp; Produk</span>
                            </div>
                        </a>
                        <a href="{{ route('bkk') }}" class="dropdown-item {{ $active === 'bkk' ? 'active-item' : '' }}">
                            <div class="dropdown-item-icon bkk-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </div>
                            <div class="dropdown-item-content">
                                <span class="dropdown-item-title">BKK</span>
                                <span class="dropdown-item-desc">Bursa Kerja Khusus &amp; Karir</span>
                            </div>
                        </a>
                        <a href="{{ route('pkl') }}" class="dropdown-item {{ $active === 'pkl' ? 'active-item' : '' }}">
                            <div class="dropdown-item-icon pkl-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </div>
                            <div class="dropdown-item-content">
                                <span class="dropdown-item-title">PKL</span>
                                <span class="dropdown-item-desc">Praktik Kerja Lapangan</span>
                            </div>
                        </a>
                    </div>
                </li>

                {{-- Tentang Dropdown (Profil Sekolah) --}}
                <li class="nav-dropdown {{ in_array($active, ['tentang', 'profil']) ? 'has-active' : '' }}">
                    <button type="button" class="nav-dropdown-toggle {{ in_array($active, ['tentang', 'profil']) ? 'active-nav-link' : '' }}" aria-expanded="false" aria-haspopup="true">
                        <span>Tentang</span>
                        <svg class="dropdown-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu dropdown-menu-compact">
                        <a href="{{ url('/#tentang') }}" class="dropdown-item">
                            <div class="dropdown-item-icon tentang-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </div>
                            <div class="dropdown-item-content">
                                <span class="dropdown-item-title">Profil Sekolah</span>
                                <span class="dropdown-item-desc">Ekosistem SMK &amp; Visi Misi</span>
                            </div>
                        </a>
                    </div>
                </li>

                {{-- Kontak --}}
                <li>
                    <a href="{{ url('/#kontak') }}" class="{{ $active === 'kontak' ? 'active-nav-link' : '' }}">Kontak</a>
                </li>
            </ul>
        </nav>

        <div class="header-actions">
            <a href="{{ route('login') }}" class="btn-masuk">
                Masuk
            </a>
            <button type="button" class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Buka Menu Navigasi" aria-expanded="false">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </div>
</header>
<div class="site-header-spacer" aria-hidden="true"></div>

{{-- Mobile Navigation Drawer & Backdrop --}}
<div class="mobile-nav-backdrop" id="mobileNavBackdrop" aria-hidden="true"></div>
<div class="mobile-nav-drawer" id="mobileNavDrawer" role="dialog" aria-modal="true" aria-label="Menu Navigasi Mobile">
    <div class="mobile-nav-header">
        <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('assets/logo.webp') }}" alt="Logo Tefa-Hub" width="32" height="32">
            <span class="brand-name">Tefa<span>-Hub</span></span>
        </a>
        <button type="button" class="mobile-nav-close" id="mobileNavClose" aria-label="Tutup Menu Navigasi">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <ul class="mobile-nav-links">
        <li>
            <a href="{{ url('/') }}" class="mobile-nav-link {{ (in_array($active, ['home', 'beranda', '']) && request()->is('/')) ? 'active' : '' }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="nav-lead-icon">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span>Beranda</span>
            </a>
        </li>

        {{-- Mobile Group: Layanan --}}
        <li class="mobile-nav-group {{ in_array($active, ['ppdb', 'blud', 'bkk', 'pkl']) ? 'group-open' : 'group-open' }}">
            <button type="button" class="mobile-group-header">
                <div class="mobile-group-left">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="nav-lead-icon">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                    <span>Layanan</span>
                </div>
                <svg class="mobile-group-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <ul class="mobile-sublinks">
                <li>
                    <a href="{{ route('ppdb') }}" class="mobile-sublink {{ $active === 'ppdb' ? 'active' : '' }}">
                        <span class="sublink-badge">PPDB</span>
                        <span class="sublink-text">Penerimaan Siswa Baru</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/#blud') }}" class="mobile-sublink {{ $active === 'blud' ? 'active' : '' }}">
                        <span class="sublink-badge">BLUD</span>
                        <span class="sublink-text">Teaching Factory &amp; Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('bkk') }}" class="mobile-sublink {{ $active === 'bkk' ? 'active' : '' }}">
                        <span class="sublink-badge">BKK</span>
                        <span class="sublink-text">Bursa Kerja Khusus (Karir)</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pkl') }}" class="mobile-sublink {{ $active === 'pkl' ? 'active' : '' }}">
                        <span class="sublink-badge">PKL</span>
                        <span class="sublink-text">Praktik Kerja Lapangan</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Mobile Group: Tentang --}}
        <li class="mobile-nav-group group-open">
            <button type="button" class="mobile-group-header">
                <div class="mobile-group-left">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="nav-lead-icon">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <span>Tentang</span>
                </div>
                <svg class="mobile-group-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <ul class="mobile-sublinks">
                <li>
                    <a href="{{ url('/#tentang') }}" class="mobile-sublink">
                        <span class="sublink-badge">Profil</span>
                        <span class="sublink-text">Profil Sekolah &amp; Visi</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ url('/#kontak') }}" class="mobile-nav-link {{ $active === 'kontak' ? 'active' : '' }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="nav-lead-icon">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <span>Kontak</span>
            </a>
        </li>
    </ul>
    <div class="mobile-nav-footer">
        <a href="{{ route('login') }}" class="btn-masuk-mobile">
            Masuk ke Portal Siswa
        </a>
    </div>
</div>

<script>
(function() {
    function initHeader() {
        const header = document.getElementById('siteHeader');
        const toggleBtn = document.getElementById('mobileMenuToggle');
        const closeBtn  = document.getElementById('mobileNavClose');
        const drawer    = document.getElementById('mobileNavDrawer');
        const backdrop  = document.getElementById('mobileNavBackdrop');

        // Scroll behaviour: Scrolled background shadow + hide on scroll down
        if (header) {
            let lastScrollY = window.pageYOffset || document.documentElement.scrollTop;
            let ticking = false;

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(function() {
                        const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;
                        if (currentScrollY <= 40) {
                            header.classList.remove('nav-hidden');
                        } else if (currentScrollY > lastScrollY && currentScrollY > 100) {
                            header.classList.add('nav-hidden');
                        } else if (currentScrollY < lastScrollY) {
                            header.classList.remove('nav-hidden');
                        }

                        if (currentScrollY > 20) {
                            header.classList.add('nav-scrolled');
                        } else {
                            header.classList.remove('nav-scrolled');
                        }
                        lastScrollY = currentScrollY;
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }

        // Mobile drawer handlers
        function openDrawer() {
            if (drawer && backdrop) {
                drawer.classList.add('is-open');
                backdrop.classList.add('is-open');
                if (toggleBtn) {
                    toggleBtn.classList.add('is-active');
                    toggleBtn.setAttribute('aria-expanded', 'true');
                }
                document.body.classList.add('drawer-open');
            }
        }

        function closeDrawer() {
            if (drawer && backdrop) {
                drawer.classList.remove('is-open');
                backdrop.classList.remove('is-open');
                if (toggleBtn) {
                    toggleBtn.classList.remove('is-active');
                    toggleBtn.setAttribute('aria-expanded', 'false');
                }
                document.body.classList.remove('drawer-open');
            }
        }

        if (toggleBtn) toggleBtn.onclick = function() {
            if (drawer && drawer.classList.contains('is-open')) {
                closeDrawer();
            } else {
                openDrawer();
            }
        };
        if (closeBtn) closeBtn.onclick = closeDrawer;
        if (backdrop) backdrop.onclick = closeDrawer;

        // Close drawer on sublink / link click
        if (drawer) {
            const links = drawer.querySelectorAll('a');
            links.forEach(function(link) {
                link.addEventListener('click', closeDrawer);
            });

            // Mobile group accordion toggles
            const groupHeaders = drawer.querySelectorAll('.mobile-group-header');
            groupHeaders.forEach(function(gh) {
                gh.addEventListener('click', function(e) {
                    e.preventDefault();
                    const parent = gh.closest('.mobile-nav-group');
                    if (parent) {
                        parent.classList.toggle('group-open');
                    }
                });
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeader);
    } else {
        initHeader();
    }
})();
</script>
