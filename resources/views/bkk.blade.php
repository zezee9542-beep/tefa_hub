<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pusat Karier & Penyaluran Industri (BKK Tefa-Hub) — Pantau progres lamaran PKL & kerja, jadwal tes rekrutmen mitra DUDI, serta kelola kesiapan CV digital.">
    <title>Pusat Karier & Penyaluran Industri (BKK) — Tefa-Hub</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v=3.4.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bkk.landing.css') }}?v=1.3.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- ═══════════════════════════════════════════
         HEADER / NAVBAR (MULTIPAGE COMPATIBLE)
         ═══════════════════════════════════════════ --}}
    <header class="site-header">
        <div class="wrap">
            <a href="{{ url('/') }}" class="brand" aria-label="Tefa-Hub Beranda">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Tefa-Hub">
                <span class="brand-name">Tefa<span>-Hub</span></span>
            </a>

            <nav aria-label="Navigasi Utama">
                <ul class="nav-links">
                    <li><a href="{{ url('/#tentang') }}">Tentang</a></li>
                    <li><a href="{{ url('/#layanan') }}">Layanan</a></li>
                    <li><a href="{{ url('/#akademik') }}">Akademik</a></li>
                    <li><a href="{{ url('/#blud') }}">BLUD</a></li>
                    <li><a href="{{ route('bkk') }}" class="active-nav-link" style="color: #2563eb; font-weight: 700;">BKK</a></li>
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
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Tefa-Hub">
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
            <li><a href="{{ url('/#tentang') }}" class="mobile-nav-link">Tentang Platform</a></li>
            <li><a href="{{ url('/#layanan') }}" class="mobile-nav-link">Layanan Unggulan</a></li>
            <li><a href="{{ url('/#akademik') }}" class="mobile-nav-link">Akademik Terpadu</a></li>
            <li><a href="{{ url('/#blud') }}" class="mobile-nav-link">Teaching Factory (BLUD)</a></li>
            <li><a href="{{ route('bkk') }}" class="mobile-nav-link" style="color: #2563eb; font-weight: 700;">BKK (Pusat Karier)</a></li>
        </ul>
        <div class="mobile-nav-footer">
            <a href="{{ route('login') }}" class="btn-masuk-mobile">
                Masuk ke Portal Siswa
            </a>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════
         BKK HERO SECTION WITH 3 ECLIPSE GLOWS
         ═══════════════════════════════════════════ --}}
    <section class="bkk-hero-section">
        {{-- 3 Background Eclipse Layer Blur (#2563EB) --}}
        <div class="bkk-bg-eclipse bkk-eclipse-1" aria-hidden="true"></div>
        <div class="bkk-bg-eclipse bkk-eclipse-2" aria-hidden="true"></div>
        <div class="bkk-bg-eclipse bkk-eclipse-3" aria-hidden="true"></div>

        <div class="wrap">
            <div class="bkk-hero-grid">

                {{-- Left Content --}}
                <div class="bkk-hero-content reveal-left">
                    
                    {{-- 1. Bubble Badge: 280x22px, #DBE1FF --}}
                    <div class="bkk-bubble-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                            <polyline points="16 7 22 7 22 13"></polyline>
                        </svg>
                        <span>DASHBOARD REKRUTMEN SISWA & DUDI</span>
                    </div>

                    {{-- 2. Title: 48px Extra Bold, Hitam --}}
                    <h1 class="bkk-hero-title">
                        Pusat Karier & Penyaluran Industri (BKK Tefa–Hub)
                    </h1>

                    {{-- 3. Description: 16px Regular, #434655 --}}
                    <p class="bkk-hero-desc">
                        Pantau progres lamaran PKL & kerja, jadwal tes rekrutmen mitra DUDI, serta kelola kesiapan CV digital Anda secara terpusat dengan transparansi asesmen sekolah.
                    </p>

                    {{-- 4. Two Buttons: 232x44px --}}
                    <div class="bkk-btn-group">
                        {{-- Button 1: #2563EB, White Text --}}
                        <a href="{{ route('siswa.bkk') }}" class="bkk-btn bkk-btn-pantau">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span>Pantau Progres Lamaran</span>
                        </a>

                        {{-- Button 2: #EAEDFF, Blue Text --}}
                        <a href="#lowongan" class="bkk-btn bkk-btn-lowongan">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                            </svg>
                            <span>Eksplorasi Lowongan Baru</span>
                        </a>
                    </div>

                </div>

                {{-- Right Visual: Purely jasa.png Image --}}
                <div class="bkk-hero-visual reveal-right delay-1">
                    <img src="{{ asset('assets/jasa.png') }}" alt="Karier & BLUD Jasa Layanan Mockup" class="bkk-hero-img">
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         KATALOG 16 CARD LAYANAN & PRODUK VOKASI (4X4 GRID)
         ═══════════════════════════════════════════ --}}
    @php
        $bkkServices = [
            [
                'rating' => '4.9',
                'price' => 'Mulai 50rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Servis Berkala & Ganti Oli Mesin',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 65rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Tune-Up Injeksi & Servis Motor',
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 80rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Ganti Kampas Rem & Setel Rantai',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 45rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Pembersihan Throttle Body & CVT',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 75rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Uji Emisi & Diagnosa Scanner Motor',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 55rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Penggantian Aki & Kelistrikan Motor',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 40rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Servis Karburator & Filter Udara',
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 95rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Overhaul Mesin & Penggantian Piston',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 50rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Servis Berkala & Ganti Oli Mesin',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 35rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Tambal Ban Tubeless & Cek Tekanan',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 60rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Ganti Shockbreaker & Komstir Depan',
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 70rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Restorasi Lampu LED & Wiring Motor',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 50rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Servis Berkala & Ganti Oli Mesin',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 85rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Ganti Vanbelt & Roller Matic Presisi',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 60rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Kuras Radiator & Coolant Treatment',
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 110rb',
                'img' => 'image copy 3.png',
                'tag' => 'JASA LAYANAN',
                'title' => 'Paket Komplit Servis Motor Vokasi',
            ],
        ];
    @endphp

    <section class="bkk-catalog-section" id="katalog-layanan">
        <div class="wrap">
            <div class="bkk-cards-catalog-grid">
                @foreach ($bkkServices as $index => $item)
                    <div class="blud-card-frame reveal delay-{{ ($index % 4) + 1 }}">
                        <div class="blud-card-image-wrap">
                            <img src="{{ asset('assets/' . $item['img']) }}" alt="{{ $item['title'] }}" class="blud-bg-img" onerror="this.onerror=null; this.src='{{ asset('assets/Background (14).png') }}';">
                            
                            {{-- Top Left Rating Badge --}}
                            <span class="blud-rating-badge">
                                <svg viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                {{ $item['rating'] }}
                            </span>

                            {{-- Top Right Price Badge --}}
                            <span class="blud-price-badge">{{ $item['price'] }}</span>

                            {{-- Inner Frosted Card --}}
                            <div class="blud-inner-card">
                                <div class="blud-inner-content">
                                    <span class="blud-tag">{{ $item['tag'] }}</span>
                                    <h3 class="blud-title">{{ $item['title'] }}</h3>
                                </div>
                                <a href="{{ route('siswa.blud') }}" class="blud-btn">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Unified Reusable Landing Footer --}}
    <x-landing-footer />

    {{-- Unified Reusable Tanya Tefa AI Widget --}}
    <x-ai-widget 
        subtitle="Pusat Karir BKK"
        greetingKicker="Pusat Karir BKK"
        greetingTitle="Halo, ada yang bisa dibantu seputar Karir?"
        greetingSub="Tanyakan tips lolos seleksi, lowongan mitra industri, hingga pengurusan CV digital."
    />

    {{-- ═══════════════════════════════════════════
         SCRIPTS: SCROLL ANIMATIONS & NAVBAR
         ═══════════════════════════════════════════ --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // High-Performance Scroll Reveal Observer
        const reveals = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08, rootMargin: '0px 0px -20px 0px' });
            reveals.forEach(el => observer.observe(el));
        } else {
            reveals.forEach(el => el.classList.add('is-revealed'));
        }

        // Fixed navbar show/hide on scroll
        const header = document.querySelector('.site-header');
        if (header) {
            let isScrolling = null;
            let lastScrollY = window.pageYOffset || document.documentElement.scrollTop;

            window.addEventListener('scroll', function() {
                const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;
                if (currentScrollY <= 40) {
                    header.classList.remove('header-hidden');
                    if (isScrolling) clearTimeout(isScrolling);
                    lastScrollY = currentScrollY;
                    return;
                }
                if (currentScrollY > lastScrollY && currentScrollY > 100) {
                    header.classList.add('header-hidden');
                }
                if (isScrolling) clearTimeout(isScrolling);
                isScrolling = setTimeout(function() {
                    header.classList.remove('header-hidden');
                }, 180);
                lastScrollY = currentScrollY;
            }, { passive: true });
        }

        // Mobile drawer
        const toggleBtn = document.getElementById('mobileMenuToggle');
        const closeBtn = document.getElementById('mobileNavClose');
        const drawer = document.getElementById('mobileNavDrawer');
        const backdrop = document.getElementById('mobileNavBackdrop');

        function openDrawer() {
            if (drawer && backdrop) {
                drawer.classList.add('is-open');
                backdrop.classList.add('is-open');
                document.body.classList.add('drawer-open');
                if (toggleBtn) toggleBtn.setAttribute('aria-expanded', 'true');
            }
        }

        function closeDrawer() {
            if (drawer && backdrop) {
                drawer.classList.remove('is-open');
                backdrop.classList.remove('is-open');
                document.body.classList.remove('drawer-open');
                if (toggleBtn) toggleBtn.setAttribute('aria-expanded', 'false');
            }
        }

        if (toggleBtn) toggleBtn.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (backdrop) backdrop.addEventListener('click', closeDrawer);
    });
    </script>
</body>
</html>
