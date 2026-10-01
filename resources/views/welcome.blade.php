<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tefa-Hub — Satu ekosistem digital terpadu untuk akademik, BLUD teaching factory, dan career center siswa SMK.">
    <title>Tefa-Hub | Satu Ekosistem Digital untuk Seluruh Perjalanan Siswa</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v=3.3.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Ambient background glow --}}
    <div class="glow-tl" aria-hidden="true"></div>

    {{-- ═══════════════════════════════════════════
         HEADER / NAVBAR
         ═══════════════════════════════════════════ --}}
    <header class="site-header">
        <div class="wrap">
            <a href="{{ url('/') }}" class="brand" aria-label="Tefa-Hub Beranda">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Tefa-Hub">
                <span class="brand-name">Tefa<span>-Hub</span></span>
            </a>

            <nav aria-label="Navigasi Utama">
                <ul class="nav-links">
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#akademik">Akademik</a></li>
                    <li><a href="#blud">BLUD</a></li>
                    <li><a href="#career-center">Career Center</a></li>
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
            <li><a href="#tentang" class="mobile-nav-link">Tentang Platform</a></li>
            <li><a href="#layanan" class="mobile-nav-link">Layanan Unggulan</a></li>
            <li><a href="#akademik" class="mobile-nav-link">Akademik Terpadu</a></li>
            <li><a href="#blud" class="mobile-nav-link">Teaching Factory (BLUD)</a></li>
            <li><a href="#career-center" class="mobile-nav-link">Career Center (BKK)</a></li>
        </ul>
        <div class="mobile-nav-footer">
            <a href="{{ route('login') }}" class="btn-masuk-mobile">
                Masuk ke Portal Siswa
            </a>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════
         HERO SECTION
         ═══════════════════════════════════════════ --}}
    <main class="hero">
        <div class="wrap">

            {{-- Left: copy & search --}}
            <section class="hero-content reveal">
                <div class="pill-badge">
                    <span class="pill-dot" aria-hidden="true"></span>
                    <span class="pill-text">Ekosistem Pendidikan Vokasi Terpadu</span>
                </div>

                <h1 class="hero-title">
                    <span class="l1"><span class="hi">Satu</span> Ekosistem Digital</span>
                    <span class="l2">untuk Seluruh</span>
                    <span class="l3">Perjalanan Siswa</span>
                </h1>

                <p class="hero-desc">
                    Cari, kelola, dan pantau semua kegiatan sekolahmu di satu tempat —
                    mulai dari pembelajaran akademik, teaching factory BLUD, hingga peluang karir industri.
                </p>

                <div class="search-wrap">
                    <form id="heroSearchForm" class="search-box" role="search">
                        <span class="s-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="11" cy="11" r="7"/>
                                <line x1="16.5" y1="16.5" x2="22" y2="22" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <input
                            type="text" name="q" id="heroSearchInput"
                            class="s-input"
                            placeholder="Cari informasi yang kamu butuhkan..."
                            aria-label="Cari informasi"
                            autocomplete="off"
                        >
                        <button type="submit" class="s-btn" id="heroSearchBtn" aria-label="Cari">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <line x1="5" y1="12" x2="19" y2="12" stroke-linecap="round"/>
                                <polyline points="12 5 19 12 12 19" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </section>

            {{-- Right: visual composition --}}
            <section class="hero-visual reveal delay-1" aria-label="Visualisasi Siswa Tefa-Hub">

                {{-- Modern Organic Vector Wavy Background (Unique Fluid Wave Shapes & Ambient Glow) --}}
                <div class="hero-bubble-art" aria-hidden="true">
                    <svg class="hero-wave-svg" viewBox="0 0 580 520" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="waveGradPrimary" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#1d4ed8"/>
                                <stop offset="30%" stop-color="#2563eb"/>
                                <stop offset="65%" stop-color="#6366f1"/>
                                <stop offset="100%" stop-color="#8b5cf6"/>
                            </linearGradient>
                            <linearGradient id="waveGradCyan" x1="0%" y1="100%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#0284c7" stop-opacity="0.7"/>
                                <stop offset="50%" stop-color="#38bdf8" stop-opacity="0.85"/>
                                <stop offset="100%" stop-color="#818cf8" stop-opacity="0.7"/>
                            </linearGradient>
                            <linearGradient id="waveStrokeGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#60a5fa" stop-opacity="0.9"/>
                                <stop offset="100%" stop-color="#c084fc" stop-opacity="0.3"/>
                            </linearGradient>
                            <linearGradient id="waveStrokeGrad2" x1="100%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#38bdf8" stop-opacity="0.8"/>
                                <stop offset="100%" stop-color="#818cf8" stop-opacity="0.2"/>
                            </linearGradient>
                            <filter id="softWaveGlow" x="-20%" y="-20%" width="140%" height="140%">
                                <feGaussianBlur stdDeviation="20" result="blur"/>
                                <feComposite in="SourceGraphic" in2="blur" operator="over"/>
                            </filter>
                        </defs>

                        {{-- Ambient Glow Layer --}}
                        <path d="M 120,180 C 80,80 260,30 400,60 C 520,90 560,260 480,390 C 400,500 210,480 130,410 C 60,340 140,260 120,180 Z" 
                              fill="url(#waveGradCyan)" opacity="0.35" filter="url(#softWaveGlow)"/>

                        {{-- Main Organic Wavy Fluid Body --}}
                        <path class="wave-shape-fluid" d="M 140,150 C 120,60 280,40 420,70 C 520,100 555,230 500,350 C 450,460 300,470 190,420 C 100,380 90,260 130,180 C 135,170 138,160 140,150 Z" 
                              fill="url(#waveGradPrimary)" filter="drop-shadow(0 16px 36px rgba(37,99,235,0.25))"/>

                        {{-- Secondary Overlay Wave Crescent --}}
                        <path d="M 160,80 C 270,45 420,75 490,140 C 420,170 290,160 200,230 C 170,180 155,120 160,80 Z" 
                              fill="url(#waveGradCyan)" opacity="0.45"/>

                        {{-- Decorative Flowing Wave Lines --}}
                        <path d="M 60,190 Q 210,120 370,220 T 560,180" 
                              stroke="url(#waveStrokeGrad1)" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.8" stroke-dasharray="6 8"/>

                        <path d="M 90,400 Q 250,460 420,370 T 550,410" 
                              stroke="url(#waveStrokeGrad2)" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.65"/>

                        {{-- Floating Geometric & Wave Accents --}}
                        <circle cx="95" cy="130" r="14" stroke="#60a5fa" stroke-width="2.5" fill="none" opacity="0.75"/>
                        <circle cx="490" cy="95" r="7" fill="#38bdf8" opacity="0.85"/>
                        <circle cx="525" cy="405" r="10" stroke="#a855f7" stroke-width="2" fill="none" opacity="0.7"/>
                    </svg>

                    {{-- Tilted Accent Gradient Pills --}}
                    <div class="bubble-pill-1"></div>
                    <div class="bubble-pill-2"></div>
                    
                    {{-- Left dot matrix --}}
                    <div class="bubble-dots-left">
                        @for ($i = 0; $i < 12; $i++)
                            <span class="b-dot"></span>
                        @endfor
                    </div>

                    {{-- Right dot matrix --}}
                    <div class="bubble-dots-right">
                        @for ($i = 0; $i < 12; $i++)
                            <span class="b-dot"></span>
                        @endfor
                    </div>
                </div>

                {{-- Tagline "Siap Berkarya untuk Negeri" --}}
                <div class="hero-tagline-quote" aria-hidden="true">
                    <span>Siap<br>Berkarya<br>untuk Negeri</span>
                </div>

                {{-- Students 3D character photo --}}
                <div class="students-wrap">
                    <img
                        src="{{ asset('assets/image.png') }}"
                        alt="Siswa dan Siswi SMK Tefa-Hub"
                        class="students-img"
                    >
                </div>

                {{-- Floating 2 feature cards (Centered, Equal Size, Original Style) --}}
                @php
                    $heroCards = [
                        ['icon' => 'card.png', 'title' => 'BKK Instan',  'desc' => 'Temukan informasi lowongan dan peluang kerja terbaru.',      'href' => '#career-center'],
                        ['icon' => 'book.png', 'title' => 'PPDB Kilat',  'desc' => 'Daftar sebagai calon peserta didik baru dengan mudah.',       'href' => '#layanan'],
                    ];
                @endphp

                <div class="cards-row reveal delay-2">
                    @foreach ($heroCards as $card)
                        <div class="card" role="button" tabindex="0"
                             onclick="window.location.href='{{ $card['href'] }}'">
                            {{-- Icon kiri --}}
                            <div class="card-icon">
                                <img src="{{ asset('assets/' . $card['icon']) }}" alt="Icon {{ $card['title'] }}">
                            </div>
                            {{-- Title + desc tengah --}}
                            <div class="card-head">
                                <h2 class="card-title">{{ $card['title'] }}</h2>
                                <p class="card-desc">{{ $card['desc'] }}</p>
                            </div>
                            {{-- Arrow button biru bulat kanan --}}
                            <div class="card-foot">
                                <button class="btn-arrow" title="Buka {{ $card['title'] }}">
                                    <img src="{{ asset('assets/back.png') }}" alt="Lanjut">
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>
        </div>
    </main>

    {{-- ═══════════════════════════════════════════
         ABOUT SECTION
         ═══════════════════════════════════════════ --}}
    <section class="about-section" id="tentang">
        <div class="wrap">

            {{-- Left: Logo Image --}}
            <div class="about-visual reveal-left">
                <img src="{{ asset('assets/logo2.png') }}" alt="Logo Tefa-Hub" class="about-logo-img">
            </div>

            {{-- Right: Content --}}
            <div class="about-content reveal-right delay-1">
                <span class="about-category">SOLUSI DIGITAL TERPADU</span>

                <h2 class="about-title">
                    Apa itu <span class="gradient-text">Tefa–Hub</span> ?
                </h2>

                <p class="about-desc">
                    Tefa-Hub adalah platform digital terintegrasi yang dirancang untuk mengelola
                    seluruh ekosistem pendidikan dan pengembangan kompetensi di sekolah
                    dalam satu sistem. Platform ini mengintegrasikan berbagai layanan strategis,
                    mulai dari kurikulum sekolah, unit bisnis Teaching Factory (BLUD), Praktik Kerja
                    Lapangan (PKL), hingga penelusuran lulusan dan rekrutmen kerja industri.
                </p>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SERVICES / 4 CARDS SECTION
         ═══════════════════════════════════════════ --}}
    <section class="services-section" id="layanan">
        <div class="wrap">

            <div class="services-header reveal">
                <h2 class="services-title">Semua Kebutuhan Siswa, Satu Platform</h2>
                <p class="services-desc">
                    Akses berbagai layanan sekolah yang terintegrasi untuk mendukung perjalananmu dari
                    pembelajaran hingga persiapan dunia kerja.
                </p>
            </div>

            @php
                $services = [
                    [
                        'icon' => '1.png',
                        'title' => 'Penerimaan Peserta Didik Baru',
                        'desc' => 'Dokumentasi lengkap kegiatan industri. Memudahkan pengisian Logbook Harian dan pemantauan real-time oleh sekolah dan mitra industri.',
                        'link' => '#ppdb',
                    ],
                    [
                        'icon' => '2.png',
                        'title' => 'Akademik Terintegrasi',
                        'desc' => 'Pusat pengelolaan pembelajaran digital mulai dari materi, tugas, hingga transparansi nilai dan Rapor Digital dalam satu akses.',
                        'link' => '#akademik',
                    ],
                    [
                        'icon' => '3.png',
                        'title' => 'Produk Unggulan (BLUD)',
                        'desc' => 'Wadah publikasi karya dan jasa hasil kreativitas siswa. Mendukung kewirausahaan dengan menampilkan produk langsung di landing page publik.',
                        'link' => '#blud',
                    ],
                    [
                        'icon' => '4.png',
                        'title' => 'Career Center (BKK)',
                        'desc' => 'Jembatan menuju dunia kerja. Membantu siswa dan alumni melamar pekerjaan menggunakan CV Digital & Portofolio ke jaringan mitra industri.',
                        'link' => '#career-center',
                    ],
                ];
            @endphp

            <div class="services-grid">
                @foreach ($services as $index => $service)
                    <div class="service-card reveal delay-{{ $index + 1 }}">
                        <div class="service-card-body">
                            <div class="service-icon">
                                <img src="{{ asset('assets/' . $service['icon']) }}" alt="{{ $service['title'] }}">
                            </div>
                            <h3 class="service-card-title">{{ $service['title'] }}</h3>
                            <p class="service-card-desc">{{ $service['desc'] }}</p>
                        </div>
                        <a href="{{ $service['link'] }}" class="service-btn">
                            Lihat Selengkapnya
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SHOWCASE / TEFA TO PUBLIC SECTION
         ═══════════════════════════════════════════ --}}
    <section class="showcase-section" id="produk">
        <div class="wrap">

            {{-- Left: Text & CTA --}}
            <div class="showcase-content reveal-left">
                <span class="showcase-category">TEACHING FACTORY KE PUBLIK</span>

                <h2 class="showcase-title">Dari Karya Menjadi Produk</h2>

                <p class="showcase-desc">
                    Tefa-Hub menghubungkan kegiatan Teaching Factory dengan layanan BLUD untuk
                    memperkenalkan, mengelola, dan mengembangkan produk unggulan hasil karya siswa
                    ke pasar luas secara profesional.
                </p>

                <a href="#produk" class="showcase-btn">
                    Lihat Selengkapnya
                </a>
            </div>

            {{-- Right: Cards (Mobile: Single Image, Desktop: 2 Layered Cards) --}}
            <div class="showcase-visual reveal-right delay-1">
                <div class="showcase-cards">
                    <img src="{{ asset('assets/card2.png') }}" alt="Card Jasa Layanan" class="showcase-card showcase-card-1">
                    <img src="{{ asset('assets/card1.png') }}" alt="Card Teaching Factory" class="showcase-card showcase-card-2">
                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         AI HELPER / TANYA TEFA SECTION
         ═══════════════════════════════════════════ --}}
    <section class="ai-section" id="tanya-tefa">
        <div class="wrap">

            {{-- Left: ai.png Image --}}
            <div class="ai-visual reveal-left">
                <img src="{{ asset('assets/ai.png') }}" alt="Tefa AI Assistant" class="ai-img">
            </div>

            {{-- Right: Content & 3 Cards --}}
            <div class="ai-content reveal-right delay-1">
                <span class="ai-category">PUSAT BANTUAN CERDAS</span>

                <h2 class="ai-title">Butuh Informasi ? Tanya Tefa</h2>

                <p class="ai-desc">
                    Tanyakan berbagai informasi seputar akademik, PKL, BLUD, hingga Career
                    Center dan dapatkan jawaban dengan lebih mudah melalui Tefa, asisten
                    digital Tefa-Hub.
                </p>

                @php
                    $aiFeatures = [
                        [
                            'icon' => '11.png',
                            'title' => 'Layanan Bantuan 24/7',
                            'desc' => 'Chatbot AI menyediakan pusat bantuan interaktif yang siap kapan saja.',
                        ],
                        [
                            'icon' => '12.png',
                            'title' => 'Respon Cepat (Fast)',
                            'desc' => 'Kecepatan dalam memberikan informasi secara instan dan tepat.',
                        ],
                        [
                            'icon' => '13.png',
                            'title' => 'Efisiensi Signifikan',
                            'desc' => 'Mengurangi hingga lebih dari 80% pertanyaan rutin berulang.',
                        ],
                    ];
                @endphp

                <div class="ai-cards">
                    @foreach ($aiFeatures as $index => $feat)
                        <div class="ai-card reveal delay-{{ $index + 1 }}">
                            <div class="ai-card-icon">
                                <img src="{{ asset('assets/' . $feat['icon']) }}" alt="{{ $feat['title'] }}">
                            </div>
                            <h3 class="ai-card-title">{{ $feat['title'] }}</h3>
                            <p class="ai-card-desc">{{ $feat['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         CTA BANNER SECTION
         ═══════════════════════════════════════════ --}}
    <section class="cta-banner-section">
        <div class="wrap">
            <div class="cta-banner-card reveal-scale">
                <h2 class="cta-banner-title">
                    Wujudkan Potensi Kejuruan &amp;<br>
                    Siapkan Kariermu Bersama<br>
                    Tefa–Hub
                </h2>

                <p class="cta-banner-desc">
                    Dari sinkronisasi kurikulum, validasi produk BLUD, hingga rekrutmen industri<br>
                    otomatis dalam satu ekosistem terpadu.
                </p>

                <a href="{{ Route::has('login') ? route('login') : '#login' }}" class="cta-banner-btn">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         FOOTER SECTION
         ═══════════════════════════════════════════ --}}
    <footer class="site-footer">
        <div class="wrap">

            {{-- Main Footer Columns --}}
            <div class="footer-grid">

                {{-- Column 1: Brand & Socials --}}
                <div class="footer-col footer-col-brand reveal">
                    <a href="{{ url('/') }}" class="brand" aria-label="Tefa-Hub Beranda">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo Tefa-Hub">
                        <span class="brand-name">Tefa<span>-Hub</span></span>
                    </a>

                    <p class="footer-bio">
                        Platform ekosistem digital terintegrasi untuk menghubungkan pendidikan vokasi,
                        Teaching Factory (BLUD), dan dunia industri secara efektif.
                    </p>

                    <div class="footer-socials">
                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.25V10.9H6.46M7.86 6.78a1.62 1.62 0 1 0 0 3.24 1.62 1.62 0 0 0 0-3.24z"/>
                            </svg>
                        </a>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Column 2: Navigasi --}}
                <div class="footer-col reveal delay-1">
                    <h3 class="footer-col-title">NAVIGASI</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#akademik">Akademik</a></li>
                        <li><a href="#blud">BLUD</a></li>
                        <li><a href="#career-center">Career Center</a></li>
                    </ul>
                </div>

                {{-- Column 3: Fitur Unggulan --}}
                <div class="footer-col reveal delay-2">
                    <h3 class="footer-col-title">FITUR UNGGULAN</h3>
                    <ul class="footer-links">
                        <li><a href="#ppdb">Pendaftaran PPDB</a></li>
                        <li><a href="#blud">Katalog Produk BLUD</a></li>
                        <li><a href="#career-center">Portal Karir BKK</a></li>
                        <li><a href="#tanya-tefa">Tanya Tefa AI</a></li>
                    </ul>
                </div>

                {{-- Column 4: Newsletter --}}
                <div class="footer-col reveal delay-3">
                    <h3 class="footer-col-title">INFORMASI TERKINI</h3>
                    <p class="newsletter-desc">
                        Dapatkan informasi kegiatan sekolah, update BLUD, dan lowongan industri terbaru.
                    </p>
                    <form action="#newsletter" method="POST" class="newsletter-box" onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan!');">
                        @csrf
                        <input
                            type="email"
                            placeholder="Alamat email Anda..."
                            class="newsletter-input"
                            required
                            aria-label="Alamat email newsletter"
                        >
                        <button type="submit" class="newsletter-btn" aria-label="Langganan">
                            <span>Kirim</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>

            {{-- Bottom Bar --}}
            <div class="footer-bottom">
                <p class="copyright">
                    &copy; {{ date('Y') }} Tefa-Hub. Hak Cipta Dilindungi Undang-Undang.
                </p>
                <div class="legal-links">
                    <a href="#privacy">Kebijakan Privasi</a>
                    <a href="#terms">Syarat &amp; Ketentuan</a>
                    <a href="#cookies">Pengaturan Cookie</a>
                </div>
            </div>

        </div>
    </footer>

    {{-- ═══════════════════════════════════════════
         FLOATING TEFA AI BUBBLE & CHAT POPUP
         ═══════════════════════════════════════════ --}}

    {{-- Floating Trigger Button --}}
    <button id="ai-toggle-btn" class="ai-trigger" type="button" aria-label="Buka Tanya Tefa AI" aria-expanded="false" aria-controls="ai-navigator-panel" title="Tanya Tefa AI">
        <div class="ai-trigger-inner">
            <img src="{{ asset('assets/ai.png') }}" alt="Asisten Tanya Tefa AI" class="ai-trigger-img">
            <span class="ai-online-dot"></span>
        </div>
        <div class="ai-trigger-copy">
            <strong>Tanya Tefa AI</strong>
            <small>Pusat Bantuan 24/7</small>
        </div>
        <span class="ai-trigger-badge" id="ai-notif-badge" style="display:none;"></span>
    </button>

    {{-- Help Panel --}}
    <div id="ai-navigator-panel" class="ai-panel" role="dialog" aria-label="Pusat Bantuan Tefa-Hub" aria-hidden="true">

        {{-- Panel Header --}}
        <div class="ai-header">
            <div class="ai-header-brand">
                <div class="ai-header-avatar">
                    <img src="{{ asset('assets/ai.png') }}" alt="Tanya Tefa AI" class="ai-avatar-img">
                    <span class="ai-status-pulse"></span>
                </div>
                <div class="ai-header-info">
                    <h3 class="ai-header-title">Tanya Tefa AI</h3>
                    <span class="ai-header-sub">Asisten Digital Vokasi • Online</span>
                </div>
            </div>
            <div class="ai-header-actions">
                <button class="ai-close-btn" id="ai-close-btn" type="button" aria-label="Tutup Tanya Tefa">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Greeting Card (visible before any message) --}}
        <div class="ai-greeting-card" id="ai-greeting-card">
            <p class="ai-greeting-kicker">Mulai Percakapan</p>
            <p class="ai-greeting-label">Halo, saya Tanya Tefa <span aria-hidden="true">👋</span></p>
            <p class="ai-greeting-sub">Temukan informasi seputar SMK, PPDB, BLUD, hingga Karir BKK secara instan.</p>
            <p class="ai-role-label">Saya ingin mencari:</p>
            <div class="ai-nav-categories">
                <button class="ai-nav-cat" type="button" onclick="sendNavChip('Saya Orang Tua / Calon Siswa (Info PPDB)')">
                    <span class="ai-nav-cat-icon">👨‍👩‍👧</span>
                    <div><strong>Orang Tua & Calon</strong><span>PPDB & Jurusan</span></div>
                </button>
                <button class="ai-nav-cat" type="button" onclick="sendNavChip('Saya Siswa Aktif SMK')">
                    <span class="ai-nav-cat-icon">🎓</span>
                    <div><strong>Siswa Aktif</strong><span>BLUD, PKL & Nilai</span></div>
                </button>
                <button class="ai-nav-cat" type="button" onclick="sendNavChip('Saya Alumni / Pencari Kerja')">
                    <span class="ai-nav-cat-icon">💼</span>
                    <div><strong>Alumni & Karir</strong><span>Loker & Legalisir</span></div>
                </button>
                <button class="ai-nav-cat" type="button" onclick="sendNavChip('Saya Mitra Industri / Perusahaan')">
                    <span class="ai-nav-cat-icon">🏢</span>
                    <div><strong>Mitra Industri</strong><span>Kerjasama TEFA</span></div>
                </button>
                <button class="ai-nav-cat ai-nav-cat-wide" type="button" onclick="sendNavChip('Saya Butuh Layanan Tata Usaha (TU)')">
                    <span class="ai-nav-cat-icon">🏛️</span>
                    <div><strong>Layanan Tata Usaha & Akun</strong><span>Jam operasional TU & bantuan</span></div>
                </button>
            </div>
        </div>

        {{-- Conversation Area --}}
        <div class="ai-conversation" id="ai-messages" role="log" aria-live="polite">
            <div class="ai-loading-row" id="ai-initial-typing">
                <div class="ai-loading-dots"><span></span><span></span><span></span></div>
                <span class="ai-loading-text">Menghubungkan asisten...</span>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="ai-quick-actions" id="ai-suggestions"></div>

        {{-- Input Bar --}}
        <div class="ai-input-wrap">
            <form id="ai-chat-form" class="ai-form">
                @csrf
                <input
                    type="text"
                    id="ai-message-input"
                    class="ai-field"
                    placeholder="Tulis pertanyaan Anda..."
                    autocomplete="off"
                    maxlength="500"
                    aria-label="Pertanyaan untuk tim Tefa-Hub"
                >
                <button type="submit" class="ai-submit" id="ai-send-btn" aria-label="Kirim pertanyaan">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2" fill="currentColor" opacity="0.9" stroke="none"/>
                    </svg>
                </button>
            </form>
            <p class="ai-powered">Didukung teknologi AI · Tefa-Hub</p>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════
         SCRIPTS: SCROLL ANIMATIONS, DRAWER & CHAT
         ═══════════════════════════════════════════ --}}
    <script>
    // ── High-Performance Scroll Reveal Observer ─────────────────────────────
    document.addEventListener('DOMContentLoaded', function() {
        const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
        
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                threshold: 0.12,
                rootMargin: '0px 0px -40px 0px'
            });

            revealElements.forEach(el => observer.observe(el));
        } else {
            revealElements.forEach(el => el.classList.add('is-revealed'));
        }

        // ── Sticky Header: Hide on Active Scroll, Show on Scroll Stop ────────
        const siteHeader = document.querySelector('.site-header');
        if (siteHeader) {
            let navScrollTimer = null;
            window.addEventListener('scroll', function() {
                const currentY = window.pageYOffset || document.documentElement.scrollTop;

                // At the very top, keep visible
                if (currentY <= 15) {
                    siteHeader.classList.remove('nav-hidden');
                    siteHeader.classList.remove('nav-scrolled');
                    if (navScrollTimer) clearTimeout(navScrollTimer);
                    return;
                }

                siteHeader.classList.add('nav-scrolled');
                // Hide while actively scrolling
                siteHeader.classList.add('nav-hidden');

                // Reveal once scrolling stops
                if (navScrollTimer) clearTimeout(navScrollTimer);
                navScrollTimer = setTimeout(function() {
                    siteHeader.classList.remove('nav-hidden');
                }, 180);
            }, { passive: true });
        }

        // ── Mobile Navigation Drawer ──────────────────────────────────────────
        const toggleBtn = document.getElementById('mobileMenuToggle');
        const closeBtn = document.getElementById('mobileNavClose');
        const drawer = document.getElementById('mobileNavDrawer');
        const backdrop = document.getElementById('mobileNavBackdrop');
        const navLinks = document.querySelectorAll('.mobile-nav-link');

        function openDrawer() {
            if (drawer && backdrop) {
                drawer.classList.add('is-open');
                backdrop.classList.add('is-open');
                if (toggleBtn) {
                    toggleBtn.classList.add('is-active');
                    toggleBtn.setAttribute('aria-expanded', 'true');
                }
                document.body.style.overflow = 'hidden';
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
                document.body.style.overflow = '';
            }
        }

        if (toggleBtn) toggleBtn.addEventListener('click', () => {
            if (drawer && drawer.classList.contains('is-open')) closeDrawer();
            else openDrawer();
        });

        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (backdrop) backdrop.addEventListener('click', closeDrawer);

        navLinks.forEach(link => {
            link.addEventListener('click', closeDrawer);
        });

        // ── Hero Search Box Interactive Functionality ────────────────────────
        const heroSearchForm = document.getElementById('heroSearchForm');
        const heroSearchInput = document.getElementById('heroSearchInput');
        
        if (heroSearchForm && heroSearchInput) {
            heroSearchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const query = heroSearchInput.value.trim();
                if (!query) {
                    heroSearchInput.focus();
                    return;
                }
                
                const qLower = query.toLowerCase();
                let targetId = null;
                
                if (qLower.includes('karir') || qLower.includes('bkk') || qLower.includes('kerja') || qLower.includes('loker') || qLower.includes('lowongan')) {
                    targetId = 'career-center';
                } else if (qLower.includes('blud') || qLower.includes('produk') || qLower.includes('tefa') || qLower.includes('katalog') || qLower.includes('toko') || qLower.includes('jual')) {
                    targetId = 'blud';
                } else if (qLower.includes('akademik') || qLower.includes('nilai') || qLower.includes('jadwal') || qLower.includes('guru') || qLower.includes('siswa') || qLower.includes('kurikulum') || qLower.includes('pelajaran')) {
                    targetId = 'akademik';
                } else if (qLower.includes('layanan') || qLower.includes('fitur') || qLower.includes('ppdb') || qLower.includes('daftar')) {
                    targetId = 'layanan';
                } else if (qLower.includes('tentang') || qLower.includes('profil') || qLower.includes('sekolah') || qLower.includes('smk') || qLower.includes('apa itu')) {
                    targetId = 'tentang';
                }
                
                if (targetId) {
                    const targetEl = document.getElementById(targetId);
                    if (targetEl) {
                        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
                
                // Also trigger Tanya Tefa AI assistant for comprehensive guidance
                if (window.sendNavChip) {
                    window.sendNavChip(query);
                    const aiPanel = document.getElementById('ai-navigator-panel');
                    const aiToggleBtn = document.getElementById('ai-toggle-btn');
                    if (aiPanel && !aiPanel.classList.contains('is-open')) {
                        if (aiToggleBtn) aiToggleBtn.click();
                    }
                }
            });
        }
    });

    // ── AI Chat Assistant Logic (Bug-Free & Smooth) ──────────────────────────
    (function () {
        'use strict';

        const GREET_URL  = '{{ route("ai.greet") }}';
        const CHAT_URL   = '{{ route("ai.chat") }}';
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content || '';

        const panel        = document.getElementById('ai-navigator-panel');
        const toggleBtn    = document.getElementById('ai-toggle-btn');
        const closeBtn     = document.getElementById('ai-close-btn');
        const conversation = document.getElementById('ai-messages');
        const form         = document.getElementById('ai-chat-form');
        const field        = document.getElementById('ai-message-input');
        const submitBtn    = document.getElementById('ai-send-btn');
        const quickActions = document.getElementById('ai-suggestions');
        const badge        = document.getElementById('ai-notif-badge');
        const greetCard    = document.getElementById('ai-greeting-card');
        const initLoading  = document.getElementById('ai-initial-typing');

        let isOpen    = false;
        let isBusy    = false;
        let greeted   = false;

        function openPanel() {
            isOpen = true;
            panel.classList.add('is-open');
            panel.setAttribute('aria-hidden', 'false');
            toggleBtn.setAttribute('aria-expanded', 'true');
            if (badge) badge.style.display = 'none';
            
            setTimeout(() => { field.focus(); }, 150);
            if (!greeted) { greeted = true; loadGreeting(); }
        }

        function closePanel() {
            isOpen = false;
            panel.classList.remove('is-open');
            panel.setAttribute('aria-hidden', 'true');
            toggleBtn.setAttribute('aria-expanded', 'false');
        }

        if (toggleBtn) toggleBtn.addEventListener('click', () => isOpen ? closePanel() : openPanel());
        if (closeBtn) closeBtn.addEventListener('click', closePanel);

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && isOpen) closePanel();
        });

        async function loadGreeting() {
            try {
                const r = await fetch(GREET_URL);
                const data = await r.json();
                if (initLoading) initLoading.remove();
                if (data.suggestions && data.suggestions.length) {
                    buildQuickActions(data.suggestions);
                } else {
                    buildQuickActions(['Info PPDB & Pendaftaran', 'Katalog Produk BLUD', 'Peluang Karir BKK', 'Kurikulum Akademik']);
                }
            } catch {
                if (initLoading) initLoading.remove();
                buildQuickActions(['Info PPDB & Pendaftaran', 'Katalog Produk BLUD', 'Peluang Karir BKK', 'Kurikulum Akademik']);
            }
        }

        function sendNavChip(text) {
            if (!text || isBusy) return;
            if (greetCard) greetCard.style.display = 'none';
            if (quickActions) quickActions.innerHTML = '';
            field.value = text;
            form.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
        }
        window.sendNavChip = sendNavChip;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const text = field.value.trim();
            if (!text || isBusy) return;

            if (greetCard) greetCard.style.display = 'none';
            if (quickActions) quickActions.innerHTML = '';

            appendQuestion(text);
            field.value = '';
            setBusy(true);

            try {
                const r = await fetch(CHAT_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ message: text }),
                });
                const data = await r.json();
                setBusy(false);
                appendReply(data);
            } catch {
                setBusy(false);
                appendReply({ answer: 'Maaf, terjadi gangguan koneksi. Silakan coba kembali sesaat lagi.' });
            }
        });

        function buildQuickActions(items) {
            if (!quickActions) return;
            quickActions.innerHTML = '';
            items.forEach(text => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'ai-action-chip';
                btn.textContent = text;
                btn.addEventListener('click', () => { sendNavChip(text); });
                quickActions.appendChild(btn);
            });
        }

        function appendQuestion(text) {
            const row = document.createElement('div');
            row.className = 'ai-row ai-row--user';
            row.innerHTML = `<div class="ai-msg ai-msg--user">${esc(text)}</div>`;
            conversation.appendChild(row);
            scrollEnd();
        }

        function appendReply(data) {
            const text  = (typeof data === 'string') ? data : (data.answer || 'Pertanyaan Anda sudah diterima.');
            const route = (typeof data === 'object') ? data.route : null;
            const label = (typeof data === 'object') ? data.label : null;
            const cat   = ((typeof data === 'object') ? (data.category || '') : '').toUpperCase();
            const sugg  = (typeof data === 'object' && Array.isArray(data.suggestions)) ? data.suggestions : [];

            let badgeCls = 'ai-badge-umum', badgeTxt = 'Tanya Tefa AI';
            if (cat.includes('PPDB'))                            { badgeCls = 'ai-badge-ppdb';     badgeTxt = '👨‍👩‍👧 Info PPDB'; }
            else if (cat.includes('INDUSTRI'))                   { badgeCls = 'ai-badge-industri'; badgeTxt = '🏢 Kemitraan Industri'; }
            else if (cat.includes('BLUD'))                       { badgeCls = 'ai-badge-blud';     badgeTxt = '🏭 Teaching Factory BLUD'; }
            else if (cat.includes('BKK'))                        { badgeCls = 'ai-badge-bkk';      badgeTxt = '💼 Karir & Lowongan BKK'; }
            else if (cat.includes('AKADEMIK'))                   { badgeCls = 'ai-badge-akademik'; badgeTxt = '🎓 Pembelajaran Akademik'; }
            else if (cat.includes('ADMIN')||cat.includes('FAQ')) { badgeCls = 'ai-badge-admin';    badgeTxt = '🏛️ Layanan Tata Usaha'; }

            const ctaHtml = (route && label)
                ? `<a href="${route}" class="ai-cta-link">${esc(label)} <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>`
                : '';

            const row = document.createElement('div');
            row.className = 'ai-row ai-row--reply';
            row.innerHTML = `
                <div class="ai-msg ai-msg--reply">
                    <span class="ai-cat-badge ${badgeCls}">${badgeTxt}</span>
                    <div class="ai-reply-body">${mdFull(text)}</div>
                    ${ctaHtml}
                </div>`;
            conversation.appendChild(row);
            scrollEnd();

            if (sugg.length) buildQuickActions(sugg);
        }

        function setBusy(state) {
            isBusy = state;
            if (submitBtn) submitBtn.disabled = state;
            if (field) field.disabled = state;

            if (state) {
                const row = document.createElement('div');
                row.id = 'ai-busy-row';
                row.className = 'ai-row ai-row--reply';
                row.innerHTML = `<div class="ai-msg ai-msg--reply ai-msg--loading"><div class="ai-loading-dots"><span></span><span></span><span></span></div></div>`;
                conversation.appendChild(row);
                scrollEnd();
            } else {
                document.getElementById('ai-busy-row')?.remove();
            }
        }

        function scrollEnd() {
            requestAnimationFrame(() => {
                if (conversation) conversation.scrollTop = conversation.scrollHeight;
            });
        }

        function esc(s) {
            if (!s) return '';
            return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;');
        }

        function mdFull(text) {
            if (!text) return '';
            let raw = esc(text);
            raw = raw.replace(/\*\*(.*?)\*\*/g,'<strong>$1</strong>');
            const lines = raw.split('\n');
            let out = '', inList = false, listType = 'ul';
            lines.forEach(line => {
                const t = line.trim();
                if (!t) { if (inList) { out += `</${listType}>`; inList = false; } return; }
                const nm = t.match(/^(\d+)\.\s+(.+)$/);
                if (nm) {
                    if (!inList || listType !== 'ol') { if (inList) out += `</${listType}>`; out += '<ol>'; inList = true; listType = 'ol'; }
                    out += `<li>${nm[2]}</li>`; return;
                }
                const bm = t.match(/^[•\-\*]\s+(.+)$/);
                if (bm) {
                    if (!inList || listType !== 'ul') { if (inList) out += `</${listType}>`; out += '<ul>'; inList = true; listType = 'ul'; }
                    out += `<li>${bm[1]}</li>`; return;
                }
                if (inList) { out += `</${listType}>`; inList = false; }
                out += `<p>${t}</p>`;
            });
            if (inList) out += `</${listType}>`;
            return out;
        }
    })();
    </script>

</body>
</html>
