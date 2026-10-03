<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tefa-Hub — Satu ekosistem digital terpadu untuk akademik, BLUD teaching factory, dan career center siswa SMK.">
    <title>Tefa-Hub | Satu Ekosistem Digital untuk Seluruh Perjalanan Siswa</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v=4.4.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Premium Modern Onboarding Splash Preloader Animation --}}
    <x-onboarding />

    {{-- Ambient background glow --}}
    <div class="glow-tl" aria-hidden="true"></div>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header />

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
                        src="{{ asset('assets/image.webp') }}"
                        alt="Siswa dan Siswi SMK Tefa-Hub"
                        class="students-img"
                    >
                </div>

                {{-- Floating 2 feature cards (Centered, Equal Size, Original Style) --}}
                @php
                    $heroCards = [
                        ['icon' => 'card.webp', 'title' => 'BKK Instan',  'desc' => 'Temukan informasi lowongan dan peluang kerja terbaru.',      'href' => route('bkk')],
                        ['icon' => 'book.webp', 'title' => 'PPDB Kilat',  'desc' => 'Daftar sebagai calon peserta didik baru dengan mudah.',       'href' => '#ppdb'],
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
                                    <img src="{{ asset('assets/back.webp') }}" alt="Lanjut">
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>
        </div>
    </main>

    {{-- ═══════════════════════════════════════════
         PARTNER / MITRA LOGOS MARQUEE
         ═══════════════════════════════════════════ --}}
    <section class="partners-section" aria-label="Mitra dan Partner Tefa-Hub">
        <p class="partners-label">Didukung oleh Mitra &amp; Partner Industri</p>
        <div class="partners-track-wrapper" id="partnersWrapper">
            <div class="partners-track" id="partnersTrack">
                {{-- Group 1 --}}
                <div class="partners-track-group">
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L1.webp') }}" alt="Jagoan Hosting Innovation Competition">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L2.webp') }}" alt="Jagoan Hosting">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L3.webp') }}" alt="Komdigi">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L4.webp') }}" alt="Garuda Spark Innovation Hub">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L5.webp') }}" alt="Ngalup.co">
                    </div>
                </div>
                {{-- Group 2 --}}
                <div class="partners-track-group" aria-hidden="true">
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L1.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L2.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L3.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L4.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L5.webp') }}" alt="">
                    </div>
                </div>
                {{-- Group 3 --}}
                <div class="partners-track-group" aria-hidden="true">
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L1.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L2.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L3.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L4.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L5.webp') }}" alt="">
                    </div>
                </div>
                {{-- Group 4 --}}
                <div class="partners-track-group" aria-hidden="true">
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L1.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L2.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L3.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L4.webp') }}" alt="">
                    </div>
                    <div class="partner-logo-item">
                        <img src="{{ asset('assets/L5.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         ABOUT SECTION
         ═══════════════════════════════════════════ --}}
    <section class="about-section" id="tentang">
        <div class="wrap">

            {{-- Left: Logo Image --}}
            <div class="about-visual reveal-left">
                <img src="{{ asset('assets/logo2.webp') }}" alt="Logo Tefa-Hub" class="about-logo-img">
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
    <section class="services-section" id="ppdb">
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
                        'icon' => '1.webp',
                        'title' => 'Penerimaan Peserta Didik Baru',
                        'desc' => 'Dokumentasi lengkap kegiatan industri. Memudahkan pengisian Logbook Harian dan pemantauan real-time oleh sekolah dan mitra industri.',
                        'link' => '#ppdb',
                    ],
                    [
                        'icon' => '2.webp',
                        'title' => 'Akademik Terintegrasi',
                        'desc' => 'Pusat pengelolaan pembelajaran digital mulai dari materi, tugas, hingga transparansi nilai dan Rapor Digital dalam satu akses.',
                        'link' => '#akademik',
                    ],
                    [
                        'icon' => '3.webp',
                        'title' => 'Produk Unggulan (BLUD)',
                        'desc' => 'Wadah publikasi karya dan jasa hasil kreativitas siswa. Mendukung kewirausahaan dengan menampilkan produk langsung di landing page publik.',
                        'link' => '#blud',
                    ],
                    [
                        'icon' => '4.webp',
                        'title' => 'Career Center (BKK)',
                        'desc' => 'Jembatan menuju dunia kerja. Membantu siswa dan alumni melamar pekerjaan menggunakan CV Digital & Portofolio ke jaringan mitra industri.',
                        'link' => route('bkk'),
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
    <section class="showcase-section" id="blud">
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
                    <img src="{{ asset('assets/card2.webp') }}" alt="Card Jasa Layanan" class="showcase-card showcase-card-1">
                    <img src="{{ asset('assets/card1.webp') }}" alt="Card Teaching Factory" class="showcase-card showcase-card-2">
                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         AI HELPER / TANYA TEFA SECTION
         ═══════════════════════════════════════════ --}}
    <section class="ai-section" id="tanya-tefa">
        <div class="wrap">

            {{-- Left: ai.webp Image --}}
            <div class="ai-visual reveal-left">
                <img src="{{ asset('assets/ai.webp') }}" alt="Tefa AI Assistant" class="ai-img">
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
                            'icon' => '11.webp',
                            'title' => 'Layanan Bantuan 24/7',
                            'desc' => 'Chatbot AI menyediakan pusat bantuan interaktif yang siap kapan saja.',
                        ],
                        [
                            'icon' => '12.webp',
                            'title' => 'Respon Cepat (Fast)',
                            'desc' => 'Kecepatan dalam memberikan informasi secara instan dan tepat.',
                        ],
                        [
                            'icon' => '13.webp',
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

    {{-- Unified Reusable Landing Footer --}}
    <x-landing-footer />

    {{-- Unified Reusable Tanya Tefa AI Widget --}}
    <x-ai-widget subtitle="Pusat Bantuan 24/7" />

    {{-- ═══════════════════════════════════════════
         SCRIPTS: SCROLL REVEALS & SEARCH (120HZ OPTIMIZED)
         ═══════════════════════════════════════════ --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {

        // ── 1. HIGH-PERFORMANCE 120HZ SCROLL REVEAL OBSERVER ────────
        const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
        
        if ('IntersectionObserver' in window && revealElements.length) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.06,
                rootMargin: '0px 0px -30px 0px'
            });

            revealElements.forEach(el => observer.observe(el));
        } else {
            revealElements.forEach(el => el.classList.add('is-revealed'));
        }

        // ── 2. HERO SEARCH BOX INTERACTIVE NAVIGATION ───────────────
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
                
                // Trigger Tanya Tefa AI assistant for comprehensive guidance
                if (window.sendNavChip) {
                    window.sendNavChip(query);
                }
            });
        }
    });
    </script>
</body>
</html>
