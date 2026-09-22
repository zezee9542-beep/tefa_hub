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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
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
                    <li><a href="#akademik">Akademik</a></li>
                    <li><a href="#blud">BLUD</a></li>
                    <li><a href="#career-center">Career Center (BKK)</a></li>
                </ul>
            </nav>

            <a href="{{ Route::has('login') ? route('login') : '#login' }}" class="btn-masuk">
                Masuk
            </a>
        </div>
    </header>

    {{-- ═══════════════════════════════════════════
         HERO SECTION
         ═══════════════════════════════════════════ --}}
    <main class="hero">
        <div class="wrap">

            {{-- Left: copy & search --}}
            <section class="hero-content">
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
                    <form action="#search" method="GET" class="search-box" role="search">
                        <span class="s-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="11" cy="11" r="7"/>
                                <line x1="16.5" y1="16.5" x2="22" y2="22" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <input
                            type="text" name="q"
                            class="s-input"
                            placeholder="Cari informasi yang kamu butuhkan..."
                            aria-label="Cari informasi"
                            autocomplete="off"
                        >
                        <button type="submit" class="s-btn" aria-label="Cari">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <line x1="5" y1="12" x2="19" y2="12" stroke-linecap="round"/>
                                <polyline points="12 5 19 12 12 19" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </section>

            {{-- Right: visual composition --}}
            <section class="hero-visual" aria-label="Visualisasi Siswa Tefa-Hub">

                {{-- 4-colour aura glow --}}
                <div class="aura-wrap" aria-hidden="true">
                    <div class="orb orb-b"></div>
                    <div class="orb orb-p"></div>
                    <div class="orb orb-v"></div>
                    <div class="orb orb-k"></div>
                </div>

                {{-- Dot matrix --}}
                <div class="dots" aria-hidden="true">
                    @for ($i = 0; $i < 42; $i++)
                        <span class="dot"></span>
                    @endfor
                </div>

                {{-- Students photo --}}
                <div class="students-wrap">
                    <img
                        src="{{ asset('assets/human.png') }}"
                        alt="Siswa dan Siswi SMK Tefa-Hub"
                        class="students-img"
                    >
                </div>

                {{-- Floating feature cards --}}
                @php
                    $cards = [
                        ['icon' => 'card.png', 'title' => 'BKK Instan',  'desc' => 'Temukan informasi lowongan dan peluang kerja terbaru.',      'href' => '#bkk'],
                        ['icon' => 'book.png', 'title' => 'PPDB Kilat',  'desc' => 'Daftar sebagai calon peserta didik baru dengan mudah.',       'href' => '#ppdb'],
                    ];
                @endphp

                <div class="cards-row">
                    @foreach ($cards as $card)
                        <div class="card" role="button" tabindex="0"
                             onclick="window.location.href='{{ $card['href'] }}'">
                            <div class="card-head">
                                <div class="card-icon">
                                    <img src="{{ asset('assets/' . $card['icon']) }}" alt="Icon {{ $card['title'] }}">
                                </div>
                                <h2 class="card-title">{{ $card['title'] }}</h2>
                            </div>
                            <p class="card-desc">{{ $card['desc'] }}</p>
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
            <div class="about-visual">
                <img src="{{ asset('assets/logo2.png') }}" alt="Logo Tefa-Hub" class="about-logo-img">
            </div>

            {{-- Right: Content --}}
            <div class="about-content">
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

            <div class="services-header">
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
                @foreach ($services as $service)
                    <div class="service-card">
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
            <div class="showcase-content">
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

            {{-- Right: 2 Cards --}}
            <div class="showcase-visual">
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
            <div class="ai-visual">
                <img src="{{ asset('assets/ai.png') }}" alt="Tefa AI Assistant" class="ai-img">
            </div>

            {{-- Right: Content & 3 Cards --}}
            <div class="ai-content">
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
                    @foreach ($aiFeatures as $feat)
                        <div class="ai-card">
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
            <div class="cta-banner-card">
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
                <div class="footer-col footer-col-brand">
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
                <div class="footer-col">
                    <h3 class="footer-col-title">NAVIGASI</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#akademik">Akademik</a></li>
                        <li><a href="#blud">BLUD</a></li>
                        <li><a href="#career-center">Career Center</a></li>
                    </ul>
                </div>

                {{-- Column 3: Fitur Unggulan --}}
                <div class="footer-col">
                    <h3 class="footer-col-title">FITUR UNGGULAN</h3>
                    <ul class="footer-links">
                        <li><a href="#rapor">E-Rapor Vokasi</a></li>
                        <li><a href="#blud">Kurasi BLUD</a></li>
                        <li><a href="#bkk">Pelacak BKK</a></li>
                        <li><a href="#cv">CV &amp; Portofolio</a></li>
                        <li><a href="#tanya-tefa">Tanya Tefa AI</a></li>
                    </ul>
                </div>

                {{-- Column 4: Buletin Vokasi --}}
                <div class="footer-col footer-col-newsletter">
                    <h3 class="footer-col-title">BULETIN VOKASI</h3>
                    <p class="newsletter-desc">
                        Dapatkan info lowongan kerja, sertifikasi kompetensi BNSP, dan inovasi karya terbaru.
                    </p>

                    <form action="#subscribe" method="POST" class="newsletter-box" onsubmit="event.preventDefault();">
                        <input type="email" placeholder="Alamat email..." class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">
                            Langganan
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="9 18 15 12 9 6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>

            {{-- Bottom Footer Bar --}}
            <div class="footer-bottom">
                <div class="copyright">
                    &copy; 2026 Tefa-Hub Ecosystem. Hak Cipta Dilindungi.
                </div>
                <div class="legal-links">
                    <a href="#privasi">Kebijakan Privasi</a>
                    <a href="#syarat">Syarat &amp; Ketentuan</a>
                    <a href="#keamanan">Keamanan</a>
                    <a href="#cookie">Cookie</a>
                </div>
            </div>

        </div>
    </footer>

    {{-- ═══════════════════════════════════════════
         TEFA HELP CENTER WIDGET
         ═══════════════════════════════════════════ --}}

    {{-- Floating Trigger Button --}}
    <button id="ai-toggle-btn" class="ai-trigger" aria-label="Pusat Bantuan Tefa-Hub" title="Ada yang bisa kami bantu?">
        <span class="ai-trigger-icon" id="ai-icon-help">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                <line x1="12" y1="17" x2="12.01" y2="17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </span>
        <span class="ai-trigger-icon" id="ai-icon-close" style="display:none;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </span>
        <span class="ai-trigger-label">Bantuan</span>
        <span class="ai-trigger-badge" id="ai-notif-badge" style="display:none;"></span>
    </button>

    {{-- Help Panel --}}
    <div id="ai-navigator-panel" class="ai-panel" role="dialog" aria-label="Pusat Bantuan Tefa-Hub" aria-hidden="true">

        {{-- Panel Header --}}
        <div class="ai-header">
            <div class="ai-header-brand">
                <div class="ai-header-dot"></div>
                <span class="ai-header-title">Pusat Bantuan</span>
            </div>
            <div class="ai-header-actions">
                <span class="ai-header-sub">Tefa-Hub · Selalu siap</span>
                <button class="ai-close-btn" id="ai-close-btn" aria-label="Tutup">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Greeting Card (visible before any message) --}}
        <div class="ai-greeting-card" id="ai-greeting-card">
            <p class="ai-greeting-label">Halo, ada yang bisa kami bantu? 👋</p>
            <p class="ai-greeting-sub">Temukan jawaban cepat atau tanyakan langsung kepada kami.</p>
        </div>

        {{-- Conversation Area --}}
        <div class="ai-conversation" id="ai-messages" role="log" aria-live="polite">
            <div class="ai-loading-row" id="ai-initial-typing">
                <div class="ai-loading-dots"><span></span><span></span><span></span></div>
                <span class="ai-loading-text">Memuat...</span>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="ai-quick-actions" id="ai-suggestions"></div>

        {{-- Input --}}
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
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2" fill="currentColor" opacity="0.9" stroke="none"/>
                    </svg>
                </button>
            </form>
            <p class="ai-powered">Didukung teknologi AI · Tefa-Hub 2026</p>
        </div>
    </div>

    <script>
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

        // ── Toggle ──────────────────────────────────────────────────────────
        function openPanel() {
            isOpen = true;
            panel.classList.add('is-open');
            panel.setAttribute('aria-hidden', 'false');
            document.getElementById('ai-icon-help').style.display  = 'none';
            document.getElementById('ai-icon-close').style.display = 'flex';
            badge.style.display = 'none';
            field.focus();
            if (!greeted) { greeted = true; loadGreeting(); }
        }

        function closePanel() {
            isOpen = false;
            panel.classList.remove('is-open');
            panel.setAttribute('aria-hidden', 'true');
            document.getElementById('ai-icon-help').style.display  = 'flex';
            document.getElementById('ai-icon-close').style.display = 'none';
        }

        toggleBtn.addEventListener('click', () => isOpen ? closePanel() : openPanel());
        closeBtn.addEventListener('click', closePanel);

        setTimeout(() => { if (!isOpen) { badge.style.display = 'flex'; } }, 3000);

        // ── Load greeting ───────────────────────────────────────────────────
        async function loadGreeting() {
            try {
                const r    = await fetch(GREET_URL);
                const data = await r.json();
                initLoading.remove();
                appendReply(data.answer);
                if (data.suggestions?.length) buildQuickActions(data.suggestions);
            } catch {
                initLoading.remove();
                appendReply('Halo! Ada yang bisa kami bantu hari ini?');
            }
        }

        // ── Submit ──────────────────────────────────────────────────────────
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const text = field.value.trim();
            if (!text || isBusy) return;

            // Hide greeting card on first message
            greetCard.style.display = 'none';
            quickActions.innerHTML  = '';

            appendQuestion(text);
            field.value = '';
            setBusy(true);

            try {
                const r    = await fetch(CHAT_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF_TOKEN, 'Accept': 'application/json' },
                    body: JSON.stringify({ message: text }),
                });
                const data = await r.json();
                setBusy(false);
                appendReply(data.answer, data.route, data.label);
            } catch {
                setBusy(false);
                appendReply('Koneksi terputus. Silakan coba kembali.');
            }
        });

        // ── Quick action chips ──────────────────────────────────────────────
        function buildQuickActions(items) {
            quickActions.innerHTML = '';
            items.forEach(text => {
                const btn = document.createElement('button');
                btn.className   = 'ai-action-chip';
                btn.textContent = text;
                btn.addEventListener('click', () => { field.value = text; form.dispatchEvent(new Event('submit')); });
                quickActions.appendChild(btn);
            });
        }

        // ── Message renderers ───────────────────────────────────────────────
        function appendQuestion(text) {
            const row = document.createElement('div');
            row.className   = 'ai-row ai-row--user';
            row.innerHTML   = `<div class="ai-msg ai-msg--user">${esc(text)}</div>`;
            conversation.appendChild(row);
            scrollEnd();
        }

        function appendReply(text, route, label) {
            const row = document.createElement('div');
            row.className = 'ai-row ai-row--reply';
            row.innerHTML = `
                <div class="ai-msg ai-msg--reply">
                    <p>${md(text)}</p>
                    ${route && label ? `<a href="${route}" class="ai-cta-link">${label}<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>` : ''}
                </div>`;
            conversation.appendChild(row);
            scrollEnd();
        }

        // ── Busy state ──────────────────────────────────────────────────────
        function setBusy(state) {
            isBusy = state;
            submitBtn.disabled = state;
            field.disabled = state;

            if (state) {
                const row = document.createElement('div');
                row.id        = 'ai-busy-row';
                row.className = 'ai-row ai-row--reply';
                row.innerHTML = `<div class="ai-msg ai-msg--reply ai-msg--loading"><div class="ai-loading-dots"><span></span><span></span><span></span></div></div>`;
                conversation.appendChild(row);
                scrollEnd();
            } else {
                document.getElementById('ai-busy-row')?.remove();
            }
        }

        function scrollEnd() { conversation.scrollTop = conversation.scrollHeight; }

        function esc(s) {
            return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
        }

        function md(s) {
            return esc(s).replace(/\*\*(.*?)\*\*/g,'<strong>$1</strong>').replace(/\n/g,'<br>');
        }
    })();
    </script>

</body>
</html>`n