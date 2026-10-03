<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eksplorasi Peluang PKL & Karier Industri Mitra — Jembatan resmi siswa dan alumni Tefa-Hub menuju dunia usaha dan dunia industri (DUDI).">
    <title>Eksplorasi Peluang PKL & Karier Industri Mitra — Tefa-Hub</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v=4.4.0">
    <link rel="stylesheet" href="{{ asset('assets/css/pkl.landing.css') }}?v=1.3.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'pkl'" />

    {{-- ═══════════════════════════════════════════
         PKL HERO SECTION WITH 1216x444 BANNER CARD
         ═══════════════════════════════════════════ --}}
    <section class="pkl-hero-section">
        {{-- Ambient background glows --}}
        <div class="pkl-bg-glow pkl-glow-1" aria-hidden="true"></div>
        <div class="pkl-bg-glow pkl-glow-2" aria-hidden="true"></div>

        <div class="wrap">
            {{-- 1216x444 Main Card --}}
            <div class="pkl-banner-card reveal">

                {{-- Left Content Column --}}
                <div class="pkl-card-content">

                    {{-- 1. Badge Pill --}}
                    <div class="pkl-bubble-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>PUSAT KEMITRAAN VOKASI &amp; PENYALURAN KERJA</span>
                    </div>

                    {{-- 2. Title --}}
                    <h1 class="pkl-card-title">
                        Eksplorasi Peluang PKL &amp;<br>
                        Karier Industri Mitra
                    </h1>

                    {{-- 3. Description --}}
                    <p class="pkl-card-desc">
                        Jembatan resmi siswa dan alumni Tefa-Hub menuju dunia usaha dan dunia industri (DUDI). Temukan lowongan praktik kerja lapangan (PKL), program magang bersertifikat, dan rekrutmen kerja dengan jadwal interview terintegrasi secara transparan.
                    </p>

                    {{-- 4. Two Buttons --}}
                    <div class="pkl-card-actions">
                        {{-- Primary Button (Blue) --}}
                        <a href="#lowongan" class="pkl-btn pkl-btn-primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="9 12 12 15 16 10"></polyline>
                            </svg>
                            <span>Jelajahi Lowongan Tersedia</span>
                        </a>

                        {{-- Secondary Button (Light Blue Tint) --}}
                        <a href="{{ route('siswa.bkk') }}" class="pkl-btn pkl-btn-secondary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                <polyline points="9 16 11 18 15 14"></polyline>
                            </svg>
                            <span>Lihat Jadwal Interview</span>
                        </a>
                    </div>

                </div>

                {{-- Right Visual Column --}}
                <div class="pkl-card-visual">
                    {{-- Layer 1: Vector & Building Scenery Artwork --}}
                    <img src="{{ asset('assets/image copy.png') }}" alt="" class="pkl-bg-artwork" aria-hidden="true">

                    {{-- Layer 2: Main Student & Floating Cards Illustration --}}
                    <div class="pkl-illustration-wrap">
                        <img
                            src="{{ asset('assets/image copy 4.png') }}"
                            alt="Siswa Vokasi dan Peluang PKL Industri Mitra Tefa-Hub"
                            class="pkl-hero-img"
                        >
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         FILTER & SEARCH SECTION
         ═══════════════════════════════════════════ --}}
    <section class="pkl-search-section" id="lowongan">
        <div class="wrap">
            <div class="pkl-search-bar reveal">
                <div class="pkl-input-group">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" class="pkl-search-input" placeholder="Cari posisi PKL, keahlian, atau nama perusahaan...">
                </div>
                <div class="pkl-input-group">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <select class="pkl-select-input">
                        <option value="">Semua Lokasi / Kota</option>
                        <option value="surabaya">Surabaya &amp; Sekitarnya</option>
                        <option value="malang">Malang Raya</option>
                        <option value="jakarta">DKI Jakarta</option>
                        <option value="remote">Online / Remote</option>
                    </select>
                </div>
                <div class="pkl-input-group">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <select class="pkl-select-input">
                        <option value="">Semua Program</option>
                        <option value="pkl">Praktik Kerja Lapangan (PKL)</option>
                        <option value="magang">Magang Bersertifikat</option>
                        <option value="rekrutmen">Rekrutmen Lulusan</option>
                    </select>
                </div>
                <button type="button" class="pkl-btn-cari">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <span>Cari Program</span>
                </button>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         OPPORTUNITY LISTINGS (PKL, MAGANG & REKRUTMEN)
         ═══════════════════════════════════════════ --}}
    <section class="pkl-listings-section">
        <div class="wrap">
            <div class="pkl-section-header reveal">
                <div>
                    <h2 class="pkl-section-title">Peluang Penempatan Industri Terbuka</h2>
                    <p class="pkl-section-sub">Daftarkan dirimu dan pantau jadwal seleksi secara langsung melalui platform terintegrasi.</p>
                </div>
            </div>

            @php
                $opportunities = [
                    [
                        'logo' => 'L2.png',
                        'company' => 'PT Jagoan Hosting Indonesia',
                        'title' => 'Cloud & DevOps Junior Apprentice',
                        'type' => 'pkl',
                        'type_label' => 'Lowongan PKL',
                        'location' => 'Malang / Hybrid',
                        'duration' => '6 Bulan',
                        'quota' => 'Sisa 4 Kuota',
                    ],
                    [
                        'logo' => 'L4.png',
                        'company' => 'Garuda Spark Innovation Hub',
                        'title' => 'Frontend UI/UX Implementation Intern',
                        'type' => 'magang',
                        'type_label' => 'Program Magang',
                        'location' => 'Surabaya',
                        'duration' => '3 - 6 Bulan',
                        'quota' => 'Sisa 6 Kuota',
                    ],
                    [
                        'logo' => 'L5.png',
                        'company' => 'Ngalup Collaborative Network',
                        'title' => 'Digital Marketing & Content Strategy',
                        'type' => 'pkl',
                        'type_label' => 'Lowongan PKL',
                        'location' => 'Malang',
                        'duration' => '6 Bulan',
                        'quota' => 'Sisa 3 Kuota',
                    ],
                    [
                        'logo' => 'L3.png',
                        'company' => 'Mitra BPSDMP Komdigi RI',
                        'title' => 'Junior Cyber Security Support',
                        'type' => 'magang',
                        'type_label' => 'Program Magang',
                        'location' => 'Surabaya / Onsite',
                        'duration' => '6 Bulan',
                        'quota' => 'Sisa 5 Kuota',
                    ],
                    [
                        'logo' => 'L1.png',
                        'company' => 'Innovation Tech Partners Lab',
                        'title' => 'Junior Fullstack Web Developer',
                        'type' => 'rekrutmen',
                        'type_label' => 'Rekrutmen Kerja',
                        'location' => 'Remote / Malang',
                        'duration' => 'Full-time Kontrak',
                        'quota' => 'Sisa 2 Kuota',
                    ],
                    [
                        'logo' => 'logo.png',
                        'company' => 'BLUD & Teaching Factory Tefa-Hub',
                        'title' => 'Teknisi Sistem Jaringan & Perangkat',
                        'type' => 'pkl',
                        'type_label' => 'Lowongan PKL',
                        'location' => 'SMK Kampus',
                        'duration' => '6 Bulan',
                        'quota' => 'Sisa 8 Kuota',
                    ],
                ];
            @endphp

            <div class="pkl-grid">
                @foreach ($opportunities as $index => $item)
                    <div class="pkl-item-card reveal delay-{{ ($index % 3) + 1 }}">
                        <div>
                            <div class="pkl-item-top">
                                <div class="pkl-company-logo">
                                    <img src="{{ asset('assets/' . $item['logo']) }}" alt="{{ $item['company'] }}">
                                </div>
                                <span class="pkl-badge-type {{ $item['type'] }}">
                                    {{ $item['type_label'] }}
                                </span>
                            </div>
                            <h3 class="pkl-item-title">{{ $item['title'] }}</h3>
                            <p class="pkl-item-company">{{ $item['company'] }}</p>
                            <div class="pkl-item-meta">
                                <span class="pkl-meta-tag">
                                    <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    {{ $item['location'] }}
                                </span>
                                <span class="pkl-meta-tag">
                                    <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    {{ $item['duration'] }}
                                </span>
                            </div>
                        </div>
                        <div class="pkl-item-footer">
                            <span class="pkl-item-quota">{{ $item['quota'] }}</span>
                            <a href="{{ route('siswa.bkk') }}" class="pkl-item-btn">
                                <span>Ajukan Lamaran</span>
                                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Unified Landing Footer --}}
    <x-landing-footer />

    {{-- Unified Reusable Tanya Tefa AI Widget --}}
    <x-ai-widget subtitle="Pusat Bantuan PKL & BKK 24/7" />

    {{-- Scroll Reveal JS --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const revealElements = document.querySelectorAll('.reveal');
        if ('IntersectionObserver' in window && revealElements.length) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.05, rootMargin: '0px 0px -20px 0px' });
            revealElements.forEach(el => observer.observe(el));
        } else {
            revealElements.forEach(el => el.classList.add('is-revealed'));
        }
    });
    </script>
</body>
</html>
