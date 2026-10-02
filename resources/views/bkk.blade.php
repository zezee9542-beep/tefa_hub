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
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v=3.9.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bkk.landing.css') }}?v=1.3.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'bkk'" />

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
                <div class="bkk-hero-content">
                    
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
                <div class="bkk-hero-visual">
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
            <div class="bkk-cards-catalog-grid" id="bkkCatalogGrid">
                @foreach ($bkkServices as $index => $item)
                    <div class="blud-card-frame bkk-card-reveal" data-delay="{{ ($index % 4) * 70 }}">
                        <div class="blud-card-image-wrap">
                            <img src="{{ asset('assets/' . $item['img']) }}" alt="{{ $item['title'] }}" class="blud-bg-img" onerror="this.onerror=null; this.src='{{ asset('assets/Background (14).png') }}';"
                                loading="lazy">
                            
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

        // ── STAGGERED CARD REVEAL (per-card delay, smooth) ──────────
        const cardEls = document.querySelectorAll('.bkk-card-reveal');
        if ('IntersectionObserver' in window && cardEls.length) {
            const cardObserver = new IntersectionObserver(function(entries, obs) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const delay = parseInt(el.dataset.delay || 0, 10);
                        setTimeout(function() {
                            el.classList.add('bkk-card-revealed');
                        }, delay);
                        obs.unobserve(el);
                    }
                });
            }, { threshold: 0.06, rootMargin: '0px 0px -30px 0px' });
            cardEls.forEach(function(el) { cardObserver.observe(el); });
        }
    });
    </script>
</body>
</html>
