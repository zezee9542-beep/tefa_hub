@props(['active' => ''])

{{-- ═══════════════════════════════════════════
     UNIFIED LANDING / PUBLIC HEADER & NAVBAR
     ═══════════════════════════════════════════ --}}
<header class="site-header" id="siteHeader">
    <div class="wrap">
        <a href="{{ url('/') }}" class="brand" aria-label="Tefa-Hub Beranda">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo Tefa-Hub" width="36" height="36">
            <span class="brand-name">Tefa<span>-Hub</span></span>
        </a>

        <nav aria-label="Navigasi Utama">
            <ul class="nav-links">
                <li>
                    <a href="{{ route('ppdb') }}" class="{{ $active === 'ppdb' ? 'active-nav-link' : '' }}">PPDB</a>
                </li>
                <li>
                    <a href="{{ url('/#blud') }}" class="{{ $active === 'blud' ? 'active-nav-link' : '' }}">BLUD</a>
                </li>
                <li>
                    <a href="{{ route('pkl') }}" class="{{ $active === 'pkl' ? 'active-nav-link' : '' }}">PKL &amp; Industri</a>
                </li>
                <li>
                    <a href="{{ route('bkk') }}" class="{{ $active === 'bkk' ? 'active-nav-link' : '' }}">Career Center (BKK)</a>
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
            <img src="{{ asset('assets/logo.png') }}" alt="Logo Tefa-Hub" width="32" height="32">
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
        <li><a href="{{ route('ppdb') }}" class="mobile-nav-link {{ $active === 'ppdb' ? 'active' : '' }}">PPDB</a></li>
        <li><a href="{{ url('/#blud') }}" class="mobile-nav-link {{ $active === 'blud' ? 'active' : '' }}">BLUD</a></li>
        <li><a href="{{ route('pkl') }}" class="mobile-nav-link {{ $active === 'pkl' ? 'active' : '' }}">PKL &amp; Industri</a></li>
        <li><a href="{{ route('bkk') }}" class="mobile-nav-link {{ $active === 'bkk' ? 'active' : '' }}">Career Center (BKK)</a></li>
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

        // Close drawer on link click
        if (drawer) {
            const links = drawer.querySelectorAll('a');
            links.forEach(function(link) {
                link.addEventListener('click', closeDrawer);
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
