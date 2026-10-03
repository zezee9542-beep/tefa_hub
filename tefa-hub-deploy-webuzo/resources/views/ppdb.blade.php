@php
    \Carbon\Carbon::setLocale('id');
    $currentDateObj = \Carbon\Carbon::now();
    $currentDayName = $currentDateObj->isoFormat('dddd');
    $currentDayNum = $currentDateObj->isoFormat('D');
    $currentMonthName = $currentDateObj->isoFormat('MMMM');
    $currentYear = $currentDateObj->isoFormat('YYYY');
    $startOfMonthStr = $currentDateObj->copy()->startOfMonth()->isoFormat('D MMMM');
    $endOfMonthStr = $currentDateObj->copy()->endOfMonth()->isoFormat('D MMMM YYYY');
    $endMonthStr = $endOfMonthStr;
    $fullTodayStr = $currentDateObj->isoFormat('dddd, D MMMM YYYY');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Penerimaan Peserta Didik Baru (PPDB) SMK Antartika 1 Sidoarjo Tahun Ajaran {{ $currentYear }}/{{ (int)$currentYear + 1 }}. Wujudkan masa depanmu bersama ekosistem pendidikan vokasi unggul dan siap industri.">
    <title>PPDB SMK Antartika 1 Sidoarjo TA {{ $currentYear }}/{{ (int)$currentYear + 1 }} — TEFA-Hub</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v=4.4.0">
    <link rel="stylesheet" href="{{ asset('assets/css/ppdb.landing.css') }}?v=1.0.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="ppdb-body">

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'ppdb'" />

    <main class="ppdb-main-wrap">

        <!-- ═══════════════════════════════════════════════════════════
             1. HERO BANNER SECTION (WITH IMAGE COPY 7.WEBP)
             ═══════════════════════════════════════════════════════════ -->
        <section class="ppdb-hero-section" aria-label="Hero PPDB SMK Antartika 1 Sidoarjo">
            <div class="ppdb-hero-card">
                <div class="ppdb-hero-glow-1" aria-hidden="true"></div>
                <div class="ppdb-hero-glow-2" aria-hidden="true"></div>

                <!-- Left Content Block -->
                <div class="ppdb-hero-content">
                    <div class="ppdb-badge-pill">
                        <svg class="ppdb-badge-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                        <span>Penerimaan Peserta Didik Baru</span>
                    </div>

                    <h1 class="ppdb-hero-title">
                        PPDB SMK Antartika 1 Sidoarjo
                        <span class="title-accent">Tahun Ajaran 2026/2027</span>
                    </h1>

                    <p class="ppdb-hero-desc">
                        Wujudkan masa depanmu bersama kami. Daftar sekarang dan jadilah bagian dari generasi unggul, kreatif, dan siap menghadapi dunia industri.
                    </p>

                    <div class="ppdb-btn-group">
                        <a 
                            href="javascript:void(0)" 
                            onclick="openPpdbRegisterModal()" 
                            class="btn-ppdb-primary"
                            aria-label="Pendaftaran Online PPDB SMK Antartika 1 Sidoarjo"
                        >
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <span>Daftar Sekarang</span>
                        </a>

                        <a href="#pilihan-jurusan" class="btn-ppdb-secondary" aria-label="Lihat Pilihan Jurusan">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <span>Lihat Jurusan</span>
                        </a>
                    </div>
                </div>

                <!-- Right Illustration Media (image copy 8.webp) -->
                <div class="ppdb-hero-media">
                    <img 
                        src="{{ asset('assets/image copy 8.webp') }}"
                        alt="Siswa-Siswi SMK Antartika 1 Sidoarjo — Jadi Bagian dari Masa Depan Muda!" 
                        class="ppdb-hero-img"
                        width="720" 
                        height="380"
                    >
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════════════════════════
             2. FOUR VALUE HIGHLIGHTS STRIP
             ═══════════════════════════════════════════════════════════ -->
        <section class="ppdb-value-strip" aria-label="Keunggulan SMK Antartika 1 Sidoarjo">
            
            <!-- Item 1: Akreditasi A -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Sekolah Terakreditasi A</h4>
                    <p class="ppdb-value-sub">Terpercaya dan berkualitas</p>
                </div>
            </div>

            <!-- Item 2: Fasilitas Lengkap -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Fasilitas Lengkap &amp; Modern</h4>
                    <p class="ppdb-value-sub">Mendukung pembelajaran berbasis industri</p>
                </div>
            </div>

            <!-- Item 3: Guru Profesional -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Guru Profesional dan Berpengalaman</h4>
                    <p class="ppdb-value-sub">Berkomitmen mencetak lulusan terbaik</p>
                </div>
            </div>

            <!-- Item 4: Lulusan Siap Kerja -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Lulusan Siap Kerja &amp; Kuliah</h4>
                    <p class="ppdb-value-sub">Diterima di dunia industri dan perguruan tinggi</p>
                </div>
            </div>

        </section>

        <!-- ═══════════════════════════════════════════════════════════
             3. MAIN TWO-COLUMN CONTENT SECTION
             ═══════════════════════════════════════════════════════════ -->
        <div class="ppdb-columns-grid">
            
            <!-- ─── LEFT COLUMN (WIDER) ─── -->
            <div class="ppdb-col-left">

                <!-- CARD 1: INFORMASI PENDAFTARAN -->
                <div class="ppdb-card">
                    <div class="ppdb-card-header">
                        <svg class="ppdb-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <h3 class="ppdb-card-title">Informasi Pendaftaran</h3>
                    </div>

                    <div class="info-boxes-grid">
                        
                        <!-- Box 1: Periode Pendaftaran -->
                        <div class="info-box-item">
                            <div class="info-box-top">
                                <div class="info-box-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <span class="info-box-label">Periode Pendaftaran</span>
                            </div>
                            <div class="info-box-content">
                                1 {{ $currentMonthName }} – {{ $endMonthStr }}
                            </div>
                            <span class="info-box-badge-green">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span>Sudah Dibuka • {{ $fullTodayStr }}</span>
                            </span>
                        </div>

                        <!-- Box 2: Jalur Pendaftaran -->
                        <div class="info-box-item">
                            <div class="info-box-top">
                                <div class="info-box-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <span class="info-box-label">Jalur Pendaftaran</span>
                            </div>
                            <div class="info-box-content">
                                Online, Offline &amp; Beasiswa Prestasi
                            </div>
                            <a href="javascript:void(0)" onclick="openPpdbModal('jalur')" class="info-box-link">
                                <span>Lihat Detail</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>

                        <!-- Box 3: Program Keahlian -->
                        <div class="info-box-item">
                            <div class="info-box-top">
                                <div class="info-box-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                        <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                    </svg>
                                </div>
                                <span class="info-box-label">Program Keahlian</span>
                            </div>
                            <div class="info-box-content">
                                RPL, TKR, TPM, TITL, TEI
                            </div>
                            <a href="#pilihan-jurusan" class="info-box-link">
                                <span>Lihat Semua Jurusan</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- CARD 2: ALUR PENDAFTARAN -->
                <div class="ppdb-card">
                    <div class="ppdb-card-header">
                        <svg class="ppdb-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            <path d="M9 14l2 2 4-4"></path>
                        </svg>
                        <h3 class="ppdb-card-title">Alur Pendaftaran (Sekolah Swasta)</h3>
                    </div>

                    <!-- 5 Steps Flow -->
                    <div class="alur-steps-flow">
                        
                        <!-- Step 1 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>1</span>
                            </div>
                            <h4 class="step-title-text">Isi Formulir</h4>
                            <p class="step-desc-text">Online / Ruang PPDB</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 2 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>2</span>
                            </div>
                            <h4 class="step-title-text">Kumpul Berkas</h4>
                            <p class="step-desc-text">Didampingi Orang Tua</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 3 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>3</span>
                            </div>
                            <h4 class="step-title-text">Verifikasi Berkas</h4>
                            <p class="step-desc-text">Cek kelengkapan dokumen</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 4 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>4</span>
                            </div>
                            <h4 class="step-title-text">Daftar Ulang</h4>
                            <p class="step-desc-text">Klaim diskon gelombang</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 5 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>5</span>
                            </div>
                            <h4 class="step-title-text">Seragam</h4>
                            <p class="step-desc-text">Fitting &amp; siap MPLS</p>
                        </div>

                    </div>

                    <!-- Bottom Callout Strip -->
                    <div class="alur-bottom-capsule">
                        <a 
                            href="javascript:void(0)" 
                            onclick="openPpdbModal('panduan')"
                            class="btn-capsule-daftar"
                            aria-label="Lihat Panduan Lengkap Alur Pendaftaran"
                        >
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span>Panduan Lengkap</span>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>
                        <span class="capsule-promo-text">One-Day Service: Verifikasi berkas, tes minat bakat &amp; kepastian kuota langsung di hari yang sama!</span>
                    </div>

                </div>

            </div>

            <!-- ─── RIGHT COLUMN (SIDEBAR) ─── -->
            <div class="ppdb-col-right">

                <!-- CARD 1: INFORMASI PENTING -->
                <div class="ppdb-card">
                    <div class="info-penting-header">
                        <div class="penting-icon-circle">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="penting-title">Informasi Penting</h3>
                            <p class="penting-subtitle">Pastikan kamu membaca seluruh informasi sebelum melakukan pendaftaran.</p>
                        </div>
                    </div>

                    <!-- 4 Action Items -->
                    <div class="penting-action-list">
                        
                        <!-- 1. Syarat Pendaftaran -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('syarat')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">Syarat Pendaftaran</h4>
                                    <p class="action-item-desc">Lihat persyaratan lengkap pendaftaran</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                        <!-- 2. Jadwal PPDB -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('jadwal')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">Jadwal PPDB</h4>
                                    <p class="action-item-desc">Cek timeline penting pendaftaran</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                        <!-- 3. Panduan Pendaftaran -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('panduan')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">Panduan Pendaftaran</h4>
                                    <p class="action-item-desc">Ikuti langkah demi langkah pendaftaran</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                        <!-- 4. FAQ -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('faq')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">FAQ</h4>
                                    <p class="action-item-desc">Pertanyaan yang sering diajukan</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                    </div>

                    <!-- Button Download Brosur -->
                    <button type="button" class="btn-download-brosur" onclick="downloadBrosurPpdb()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span>Download Brosur PPDB (PDF)</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </button>
                </div>

                <!-- CARD 2: QUOTE CARD -->
                <div class="ppdb-quote-card">
                    <p class="ppdb-quote-text">
                        “Masa depan yang baik dimulai dari langkah kecil hari ini!”
                    </p>
                </div>

            </div>

        </div>

        <!-- ═══════════════════════════════════════════════════════════
             4. PILIHAN JURUSAN SECTION (5 MAJORS)
             ═══════════════════════════════════════════════════════════ -->
        <section class="ppdb-jurusan-section" id="pilihan-jurusan" aria-label="Pilihan Program Keahlian">
            <div class="jurusan-header-row">
                <div class="jurusan-title-group">
                    <h3 class="jurusan-main-title">Pilihan Jurusan</h3>
                    <p class="jurusan-main-sub">Temukan jurusan yang sesuai dengan minat dan bakatmu.</p>
                </div>
                <a href="javascript:void(0)" onclick="openPpdbModal('jurusan-all')" class="link-lihat-semua-jurusan">
                    <span>Lihat Semua Jurusan</span>
                    <span>+</span>
                </a>
            </div>

            <!-- 5 Majors Grid -->
            <div class="jurusan-cards-grid">
                
                <!-- 1. TKR -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('tkr')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <path d="M9 17h6"></path>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TKR</h4>
                        <p class="jurusan-full-name">Teknik Kendaraan Ringan</p>
                    </div>
                </div>

                <!-- 2. TEI -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('tei')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                            <rect x="9" y="9" width="6" height="6"></rect>
                            <line x1="9" y1="1" x2="9" y2="4"></line>
                            <line x1="15" y1="1" x2="15" y2="4"></line>
                            <line x1="9" y1="20" x2="9" y2="23"></line>
                            <line x1="15" y1="20" x2="15" y2="23"></line>
                            <line x1="20" y1="9" x2="23" y2="9"></line>
                            <line x1="20" y1="14" x2="23" y2="14"></line>
                            <line x1="1" y1="9" x2="4" y2="9"></line>
                            <line x1="1" y1="14" x2="4" y2="14"></line>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TEI</h4>
                        <p class="jurusan-full-name">Teknik Elektronika Industri</p>
                    </div>
                </div>

                <!-- 3. TITL -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('titl')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TITL</h4>
                        <p class="jurusan-full-name">Teknik Instalasi Tenaga Listrik</p>
                    </div>
                </div>

                <!-- 4. RPL -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('rpl')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">RPL</h4>
                        <p class="jurusan-full-name">Rekayasa Perangkat Lunak</p>
                    </div>
                </div>

                <!-- 5. TPM -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('tpm')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TPM</h4>
                        <p class="jurusan-full-name">Teknik Pemesinan</p>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- ═══════════════════════════════════════════════════════════
         PPDB POSTER WELCOME POPUP (CAROUSEL: P1.WEBP & P2.WEBP)
         ═══════════════════════════════════════════════════════════ -->
    <div id="ppdbPosterModalOverlay" class="ppdb-poster-modal-overlay" role="dialog" aria-modal="true" tabindex="-1" style="display: none;">
        <!-- Top Right Round Close Button -->
        <button type="button" class="btn-poster-modal-close" onclick="closePpdbPosterModal()" aria-label="Tutup Poster PPDB">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="ppdb-poster-container">
            <div class="ppdb-poster-carousel" id="ppdbPosterCarousel">
                <div class="ppdb-poster-slides" id="ppdbPosterSlides">
                    <!-- Slide 1: p2.webp (Muncul Pertama) -->
                    <div class="ppdb-poster-slide active">
                        <img src="{{ asset('assets/p2.webp') }}" alt="Poster PPDB SMK Antartika 1 Sidoarjo - Halaman 1" class="ppdb-poster-image">
                    </div>
                    <!-- Slide 2: p1.webp (Muncul Kedua) -->
                    <div class="ppdb-poster-slide">
                        <img src="{{ asset('assets/p1.webp') }}" alt="Poster PPDB SMK Antartika 1 Sidoarjo - Halaman 2" class="ppdb-poster-image">
                    </div>
                </div>

                <!-- Left Navigation Arrow -->
                <button type="button" class="btn-poster-nav btn-poster-prev" onclick="prevPpdbPosterSlide()" aria-label="Poster Sebelumnya">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <!-- Right Navigation Arrow -->
                <button type="button" class="btn-poster-nav btn-poster-next" onclick="nextPpdbPosterSlide()" aria-label="Poster Berikutnya">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>

                <!-- Indicator Dots -->
                <div class="ppdb-poster-dots" id="ppdbPosterDots">
                    <button type="button" class="poster-dot active" onclick="goPpdbPosterSlide(0)" aria-label="Slide 1"></button>
                    <button type="button" class="poster-dot" onclick="goPpdbPosterSlide(1)" aria-label="Slide 2"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════
         INTERACTIVE PPDB REGISTRATION WIZARD MODAL (6 STEPS)
         ═══════════════════════════════════════════════════════════ -->
    <div id="ppdbRegisterModalOverlay" class="ppdb-modal-overlay" role="dialog" aria-modal="true" tabindex="-1" style="display: none;">
        <div class="ppdb-modal-card ppdb-reg-modal-card">
            
            <!-- Modal Header -->
            <div class="ppdb-modal-header ppdb-reg-header">
                <div class="ppdb-reg-title-wrap">
                    <div class="ppdb-reg-badge">
                        <span class="pulse-dot"></span>
                        <span>PPDB Online TP 2026/2027</span>
                    </div>
                    <h3 class="ppdb-modal-title">Formulir Pendaftaran Calon Siswa Baru</h3>
                    <p class="ppdb-modal-subtitle">SMK Antartika 1 Sidoarjo &bull; Terakreditasi A &bull; SMK Pusat Keunggulan</p>
                </div>
                <button type="button" class="btn-ppdb-modal-close" onclick="closePpdbRegisterModal()" aria-label="Tutup Form Pendaftaran">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Stepper Progress Bar -->
            <div class="ppdb-reg-stepper" id="ppdbRegStepper">
                <div class="ppdb-step-pill active" id="stepPill1">
                    <span class="step-num">1</span>
                    <span class="step-label">Akun &amp; NISN</span>
                </div>
                <div class="ppdb-step-line" id="stepLine1"></div>
                <div class="ppdb-step-pill" id="stepPill2">
                    <span class="step-num">2</span>
                    <span class="step-label">Biodata</span>
                </div>
                <div class="ppdb-step-line" id="stepLine2"></div>
                <div class="ppdb-step-pill" id="stepPill3">
                    <span class="step-num">3</span>
                    <span class="step-label">Berkas</span>
                </div>
                <div class="ppdb-step-line" id="stepLine3"></div>
                <div class="ppdb-step-pill" id="stepPill4">
                    <span class="step-num">4</span>
                    <span class="step-label">Jurusan</span>
                </div>
                <div class="ppdb-step-line" id="stepLine4"></div>
                <div class="ppdb-step-pill" id="stepPill5">
                    <span class="step-num">5</span>
                    <span class="step-label">Review</span>
                </div>
                <div class="ppdb-step-line" id="stepLine5"></div>
                <div class="ppdb-step-pill" id="stepPill6">
                    <span class="step-num">6</span>
                    <span class="step-label">Bukti</span>
                </div>
            </div>

            <!-- Modal Body Form Steps -->
            <div class="ppdb-modal-body ppdb-reg-body">
                <form id="ppdbRegisterForm" onsubmit="event.preventDefault();">
                    
                    <!-- STEP 1: Akun Calon Siswa (NISN, Nama Lengkap, WA) -->
                    <div class="ppdb-form-step active" id="ppdbStep1">
                        <div class="form-step-header">
                            <h4 class="form-step-title">Langkah 1: Akun &amp; Kontak Calon Siswa</h4>
                            <p class="form-step-desc">Isi NISN, Nama Lengkap, dan Nomor WhatsApp aktif untuk memulai pendaftaran.</p>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="reg_nisn">NISN (Nomor Induk Siswa Nasional) <span class="req">*</span></label>
                                <input type="number" id="reg_nisn" class="form-control" placeholder="Contoh: 0071234567 (10 digit)" required>
                                <small class="form-help">NISN dapat dilihat pada kartu pelajar, rapor SMP, atau ijazah SD.</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="reg_nama">Nama Lengkap Calon Siswa <span class="req">*</span></label>
                                <input type="text" id="reg_nama" class="form-control" placeholder="Sesuai Ijazah SMP / Akta Kelahiran" required>
                            </div>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="reg_wa">Nomor WhatsApp Aktif Siswa/Wali <span class="req">*</span></label>
                                <div class="input-with-icon">
                                    <span class="input-prefix">+62</span>
                                    <input type="tel" id="reg_wa" class="form-control" placeholder="81234567890" required>
                                </div>
                                <small class="form-help">Informasi jadwal tes &amp; konfirmasi kelulusan dikirim ke nomor ini.</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="reg_email">Email Aktif (Opsional)</label>
                                <input type="email" id="reg_email" class="form-control" placeholder="contoh: calon.siswa@gmail.com">
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: Biodata Diri & Orang Tua/Wali -->
                    <div class="ppdb-form-step" id="ppdbStep2">
                        <div class="form-step-header">
                            <h4 class="form-step-title">Langkah 2: Biodata Diri &amp; Data Orang Tua/Wali</h4>
                            <p class="form-step-desc">Lengkapi identitas pribadi dan informasi kontak orang tua/wali siswa.</p>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin <span class="req">*</span></label>
                                <div class="radio-option-group">
                                    <label class="radio-label">
                                        <input type="radio" name="reg_jk" value="Laki-laki" checked>
                                        <span>Laki-laki</span>
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="reg_jk" value="Perempuan">
                                        <span>Perempuan</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="reg_asal_sekolah">Asal Sekolah (SMP / MTs) <span class="req">*</span></label>
                                <input type="text" id="reg_asal_sekolah" class="form-control" placeholder="Contoh: SMP Negeri 1 Sidoarjo" required>
                            </div>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="reg_tempat_lahir">Tempat Lahir <span class="req">*</span></label>
                                <input type="text" id="reg_tempat_lahir" class="form-control" placeholder="Contoh: Sidoarjo" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="reg_tanggal_lahir">Tanggal Lahir <span class="req">*</span></label>
                                <input type="date" id="reg_tanggal_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="reg_alamat">Alamat Lengkap Domisili <span class="req">*</span></label>
                            <textarea id="reg_alamat" class="form-control" rows="2" placeholder="Nama Jalan, RT/RW, Kelurahan/Desa, Kecamatan, Kota/Kabupaten" required></textarea>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="reg_nama_ortu">Nama Orang Tua / Wali <span class="req">*</span></label>
                                <input type="text" id="reg_nama_ortu" class="form-control" placeholder="Nama lengkap Ayah/Ibu/Wali" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="reg_pekerjaan_ortu">Pekerjaan Orang Tua / Wali</label>
                                <select id="reg_pekerjaan_ortu" class="form-control">
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Wiraswasta / Pengusaha">Wiraswasta / Pengusaha</option>
                                    <option value="PNS / TNI / POLRI">PNS / TNI / POLRI</option>
                                    <option value="Buruh / Petani / Nelayan">Buruh / Petani / Nelayan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: Unggah Berkas Dokumen -->
                    <div class="ppdb-form-step" id="ppdbStep3">
                        <div class="form-step-header">
                            <h4 class="form-step-title">Langkah 3: Unggah Berkas Dokumen Persyaratan</h4>
                            <p class="form-step-desc">Format berkas didukung: JPG, PNG, atau PDF (Maksimal 2MB per file).</p>
                        </div>
                        <div class="upload-grid">
                            <!-- File 1: KK -->
                            <div class="upload-card">
                                <div class="upload-card-header">
                                    <h5 class="upload-title">Kartu Keluarga (KK)</h5>
                                    <span class="upload-badge">Wajib</span>
                                </div>
                                <label class="upload-dropzone" id="dropzone_kk" for="file_kk">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span class="upload-prompt" id="file_kk_name">Pilih foto/scan KK</span>
                                    <input type="file" id="file_kk" class="upload-input" accept="image/*,application/pdf" onchange="handleFileUpload(this, 'file_kk_name', 'dropzone_kk')">
                                </label>
                            </div>

                            <!-- File 2: Akta Lahir -->
                            <div class="upload-card">
                                <div class="upload-card-header">
                                    <h5 class="upload-title">Akta Kelahiran</h5>
                                    <span class="upload-badge">Wajib</span>
                                </div>
                                <label class="upload-dropzone" id="dropzone_akta" for="file_akta">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span class="upload-prompt" id="file_akta_name">Pilih foto/scan Akta</span>
                                    <input type="file" id="file_akta" class="upload-input" accept="image/*,application/pdf" onchange="handleFileUpload(this, 'file_akta_name', 'dropzone_akta')">
                                </label>
                            </div>

                            <!-- File 3: SKL / Rapor SMP -->
                            <div class="upload-card">
                                <div class="upload-card-header">
                                    <h5 class="upload-title">SKL / Nilai Rapor SMP</h5>
                                    <span class="upload-badge">Wajib</span>
                                </div>
                                <label class="upload-dropzone" id="dropzone_skl" for="file_skl">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span class="upload-prompt" id="file_skl_name">Pilih file SKL / Rapor</span>
                                    <input type="file" id="file_skl" class="upload-input" accept="image/*,application/pdf" onchange="handleFileUpload(this, 'file_skl_name', 'dropzone_skl')">
                                </label>
                            </div>

                            <!-- File 4: Pas Foto -->
                            <div class="upload-card">
                                <div class="upload-card-header">
                                    <h5 class="upload-title">Pas Foto Berwarna 3x4</h5>
                                    <span class="upload-badge">Wajib</span>
                                </div>
                                <label class="upload-dropzone" id="dropzone_foto" for="file_foto">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span class="upload-prompt" id="file_foto_name">Pilih pas foto 3x4</span>
                                    <input type="file" id="file_foto" class="upload-input" accept="image/*" onchange="handleFileUpload(this, 'file_foto_name', 'dropzone_foto')">
                                </label>
                            </div>
                        </div>
                        <div class="upload-info-alert">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <span>Jika berkas fisik belum lengkap, Anda tetap dapat melanjutkan pendaftaran dan membawanya saat verifikasi langsung di Ruang PPDB.</span>
                        </div>
                    </div>

                    <!-- STEP 4: Pilih Konsentrasi Keahlian (Jurusan) -->
                    <div class="ppdb-form-step" id="ppdbStep4">
                        <div class="form-step-header">
                            <h4 class="form-step-title">Langkah 4: Pilih Konsentrasi Keahlian (Jurusan)</h4>
                            <p class="form-step-desc">Pilih 1 Jurusan Prioritas Utama dan 1 Jurusan Alternatif Cadangan.</p>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="reg_jurusan_1">Jurusan Pilihan 1 (Prioritas Utama) <span class="req">*</span></label>
                                <select id="reg_jurusan_1" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Konsentrasi Keahlian Utama --</option>
                                    <option value="Rekayasa Perangkat Lunak (RPL)">Rekayasa Perangkat Lunak (RPL)</option>
                                    <option value="Teknik Kendaraan Ringan (TKR)">Teknik Kendaraan Ringan (TKR)</option>
                                    <option value="Teknik Pemesinan (TPM)">Teknik Pemesinan (TPM)</option>
                                    <option value="Teknik Instalasi Tenaga Listrik (TITL)">Teknik Instalasi Tenaga Listrik (TITL)</option>
                                    <option value="Teknik Elektronika Industri (TEI)">Teknik Elektronika Industri (TEI)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="reg_jurusan_2">Jurusan Pilihan 2 (Alternatif Cadangan)</label>
                                <select id="reg_jurusan_2" class="form-control">
                                    <option value="Tidak Memilih Alternatif">-- Tidak Memilih Alternatif --</option>
                                    <option value="Rekayasa Perangkat Lunak (RPL)">Rekayasa Perangkat Lunak (RPL)</option>
                                    <option value="Teknik Kendaraan Ringan (TKR)">Teknik Kendaraan Ringan (TKR)</option>
                                    <option value="Teknik Pemesinan (TPM)">Teknik Pemesinan (TPM)</option>
                                    <option value="Teknik Instalasi Tenaga Listrik (TITL)">Teknik Instalasi Tenaga Listrik (TITL)</option>
                                    <option value="Teknik Elektronika Industri (TEI)">Teknik Elektronika Industri (TEI)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label class="form-label">Jalur / Gelombang Pendaftaran <span class="req">*</span></label>
                            <div class="radio-option-cards">
                                <label class="radio-card active">
                                    <input type="radio" name="reg_gelombang" value="Gelombang 1 (Promo Diskon SPI)" checked>
                                    <div class="radio-card-content">
                                        <div class="radio-card-top">
                                            <span class="badge-gelombang">GELOMBANG 1</span>
                                            <span class="badge-discount">Diskon Spesial</span>
                                        </div>
                                        <strong class="radio-card-name">Gelombang 1 (s.d 31 Maret 2026)</strong>
                                        <p class="radio-card-sub">Bebas biaya formulir + potongan biaya SPI s.d Rp 1.000.000,-</p>
                                    </div>
                                </label>
                                <label class="radio-card">
                                    <input type="radio" name="reg_gelombang" value="Gelombang 2 (Reguler)">
                                    <div class="radio-card-content">
                                        <div class="radio-card-top">
                                            <span class="badge-gelombang secondary">GELOMBANG 2</span>
                                        </div>
                                        <strong class="radio-card-name">Gelombang 2 (Reguler)</strong>
                                        <p class="radio-card-sub">Pendaftaran reguler pemenuhan sisa kuota jurusan.</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 5: Ringkasan Biodata & Submit -->
                    <div class="ppdb-form-step" id="ppdbStep5">
                        <div class="form-step-header">
                            <h4 class="form-step-title">Langkah 5: Ringkasan &amp; Konfirmasi Pendaftaran</h4>
                            <p class="form-step-desc">Pastikan seluruh data yang Anda masukkan sudah sesuai sebelum mengirim.</p>
                        </div>
                        
                        <div class="summary-card" id="ppdbSummaryContent">
                            <!-- Populated dynamically by JavaScript -->
                        </div>

                        <div class="agreement-box">
                            <label class="checkbox-label">
                                <input type="checkbox" id="reg_agreement" required checked>
                                <span>Saya menyatakan bahwa data yang saya isikan adalah benar dan bersedia mengikuti seluruh tahapan seleksi PPDB SMK Antartika 1 Sidoarjo.</span>
                            </label>
                        </div>
                    </div>

                    <!-- STEP 6: Bukti Pendaftaran Digital (Sukses) -->
                    <div class="ppdb-form-step" id="ppdbStep6">
                        <div class="success-screen">
                            <div class="success-icon-badge">
                                <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <h4 class="success-title">Pendaftaran Berhasil Dikirim!</h4>
                            <p class="success-subtitle">Terima kasih telah mendaftar di SMK Antartika 1 Sidoarjo. Simpan nomor pendaftaran digital Anda di bawah ini.</p>

                            <!-- Digital Proof Slip Card -->
                            <div class="reg-proof-card" id="regProofPrintable">
                                <div class="proof-card-header">
                                    <div class="proof-brand">
                                        <img src="{{ asset('assets/logo antartika.webp') }}" alt="Logo SMK" class="proof-logo">
                                        <div>
                                            <h5 class="proof-school">SMK ANTARTIKA 1 SIDOARJO</h5>
                                            <span class="proof-tagline">BUKTI PENDAFTARAN PPDB ONLINE TP 2026/2027</span>
                                        </div>
                                    </div>
                                    <span class="proof-status-badge">MENUNGGU VERIFIKASI</span>
                                </div>
                                
                                <div class="proof-body-grid">
                                    <div class="proof-item">
                                        <span class="proof-item-label">Nomor Pendaftaran</span>
                                        <strong class="proof-item-val highlight" id="proof_no_reg">PPDB-2026-08129</strong>
                                    </div>
                                    <div class="proof-item">
                                        <span class="proof-item-label">Waktu Pendaftaran</span>
                                        <strong class="proof-item-val" id="proof_tgl_daftar">-</strong>
                                    </div>
                                    <div class="proof-item">
                                        <span class="proof-item-label">NISN Siswa</span>
                                        <strong class="proof-item-val" id="proof_nisn">-</strong>
                                    </div>
                                    <div class="proof-item">
                                        <span class="proof-item-label">Nama Lengkap</span>
                                        <strong class="proof-item-val" id="proof_nama">-</strong>
                                    </div>
                                    <div class="proof-item">
                                        <span class="proof-item-label">Asal Sekolah SMP</span>
                                        <strong class="proof-item-val" id="proof_sekolah">-</strong>
                                    </div>
                                    <div class="proof-item">
                                        <span class="proof-item-label">No. WhatsApp Siswa</span>
                                        <strong class="proof-item-val" id="proof_wa">-</strong>
                                    </div>
                                    <div class="proof-item full-width">
                                        <span class="proof-item-label">Pilihan Konsentrasi Keahlian</span>
                                        <strong class="proof-item-val primary-text" id="proof_jurusan">-</strong>
                                    </div>
                                </div>

                                <div class="proof-footer-notice">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                    <span>Tunjukkan bukti pendaftaran ini saat hadir verifikasi fisik di Ruang PPDB SMK Antartika 1 Sidoarjo.</span>
                                </div>
                            </div>

                            <!-- Success Action Buttons -->
                            <div class="success-actions">
                                <button type="button" class="btn-reg-action btn-print" onclick="printRegProof()">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                    <span>Unduh / Cetak Bukti</span>
                                </button>
                                <a href="https://wa.me/6281234567890?text=Halo%20Panitia%20PPDB%20SMK%20Antartika%201%20Sidoarjo,%20saya%20sudah%20mendaftar%20online." target="_blank" rel="noopener noreferrer" class="btn-reg-action btn-wa">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                    </svg>
                                    <span>Hubungi Panitia (WA)</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Modal Footer Controls -->
            <div class="ppdb-modal-footer ppdb-reg-footer" id="ppdbRegFooter">
                <button type="button" class="btn-reg-nav btn-reg-prev" id="btnRegPrev" onclick="prevRegStep()" style="display: none;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    <span>Kembali</span>
                </button>
                <div class="footer-step-counter" id="stepCounterText">
                    Langkah <strong>1</strong> dari 5
                </div>
                <button type="button" class="btn-reg-nav btn-reg-next" id="btnRegNext" onclick="nextRegStep()">
                    <span id="btnRegNextText">Lanjutkan</span>
                    <svg id="btnRegNextIcon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </div>

        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════
         INTERACTIVE DETAIL MODAL POPUP
         ═══════════════════════════════════════════════════════════ -->
    <div id="ppdbModalOverlay" class="ppdb-modal-overlay" role="dialog" aria-modal="true" tabindex="-1" style="display: none;">
        <div class="ppdb-modal-card">
            <div class="ppdb-modal-header">
                <div>
                    <h3 class="ppdb-modal-title" id="ppdbModalTitle">Informasi PPDB</h3>
                    <p class="ppdb-modal-subtitle" id="ppdbModalSubtitle">Detail panduan dan informasi resmi SMK Antartika 1 Sidoarjo</p>
                </div>
                <button type="button" class="btn-ppdb-modal-close" onclick="closePpdbModal()" aria-label="Tutup Dialog">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="ppdb-modal-body" id="ppdbModalBody">
                <!-- Content inserted by JavaScript -->
            </div>

            <div class="ppdb-modal-footer">
                <button type="button" class="btn-ppdb-primary" onclick="closePpdbModal()" style="height: 38px; padding: 0 24px; font-size: 13px; font-weight:700;">
                    <span>Tutup Panduan</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="ppdbToast" class="ppdb-toast" role="status" aria-live="polite" style="display: none;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <span id="ppdbToastMsg">Aksi berhasil dilakukan</span>
    </div>

    {{-- Unified Landing Footer --}}
    <x-landing-footer />

    {{-- AI Navigator Widget --}}
    <x-ai-widget />

    <!-- ═══════════════════════════════════════════════════════════
         JAVASCRIPT LOGIC FOR PPDB MODALS & ACTIONS
         ═══════════════════════════════════════════════════════════ -->
    <script>
        const PPDB_DATA = {
            syarat: {
                title: 'Syarat Pendaftaran PPDB',
                subtitle: 'Kelengkapan berkas dan dokumen persyaratan calon siswa baru',
                content: `
                    <div style="display:flex; flex-direction:column; gap:16px;">
                        <!-- Top Highlights Banner -->
                        <div style="background:linear-gradient(135deg, #004AC6 0%, #002B7A 100%); color:#FFFFFF; border-radius:14px; padding:16px 18px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; box-shadow:0 8px 20px rgba(0, 74, 198, 0.2);">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:40px; height:40px; border-radius:12px; background:rgba(255,255,255,0.18); display:flex; align-items:center; justify-content:center; flex-shrink:0; border:1px solid rgba(255,255,255,0.25);">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                </div>
                                <div>
                                    <h4 style="margin:0; font-size:14.5px; font-weight:800; letter-spacing:-0.01em;">Berkas Pendaftaran Resmi</h4>
                                    <p style="margin:2px 0 0; font-size:11.5px; color:#E0E7FF; font-weight:500;">Penerimaan Peserta Didik Baru SMK Antartika 1 Sidoarjo</p>
                                </div>
                            </div>
                            <span style="background:rgba(255,255,255,0.2); border:1px solid rgba(255,255,255,0.3); color:#FFFFFF; padding:4px 10px; border-radius:20px; font-size:11px; font-weight:700;">
                                8 Poin Persyaratan
                            </span>
                        </div>

                        <!-- Section 1: Checklist Berkas Dokumen Fisik -->
                        <div>
                            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:10px;">
                                <span style="font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; color:#004AC6;">
                                    Daftar Dokumen &amp; Berkas Fisik
                                </span>
                                <span style="font-size:11px; color:#64748B; font-weight:600;">Diserahkan saat pendaftaran</span>
                            </div>

                            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:10px;">
                                <!-- 1. Formulir -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">1</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Mengisi Formulir Pendaftaran</div>
                                        <div style="font-size:11px; color:#64748B; margin-top:2px;">Secara online via web atau formulir cetak di Ruang PPDB</div>
                                    </div>
                                </div>

                                <!-- 2. Ijazah SD -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">2</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Ijazah SD Dilegalisir</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Legalisir Asli)</div>
                                    </div>
                                </div>

                                <!-- 3. SKL SMP -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">3</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy SKL SMP atau Sederajat</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Surat Keterangan Lulus)</div>
                                    </div>
                                </div>

                                <!-- 4. KK -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">4</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Kartu Keluarga (KK)</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Terbaru &amp; Jelas)</div>
                                    </div>
                                </div>

                                <!-- 5. Akta -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">5</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Akta Keluarga / Kelahiran</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar</div>
                                    </div>
                                </div>

                                <!-- 6. NISN -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">6</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Kartu NISN</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Cetak NISN Resmi)</div>
                                    </div>
                                </div>

                                <!-- 7. SKL MTs -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">7</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">SKL Untuk Lulusan MTs</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">Khusus pendaftar lulusan MTs (1 Lembar)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Ketentuan Wajib & Pendampingan -->
                        <div style="background:#FFFBEB; border:1px solid #FDE68A; border-radius:12px; padding:14px 16px; display:flex; align-items:flex-start; gap:12px;">
                            <div style="width:32px; height:32px; border-radius:10px; background:#F59E0B; color:#fff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <div>
                                <h5 style="margin:0; font-size:13px; font-weight:800; color:#92400E;">8. Calon Siswa Wajib Datang Didampingi Orang Tua / Wali Murid</h5>
                                <p style="margin:3px 0 0; font-size:12px; color:#B45309; line-height:1.5;">Kehadiran Orang Tua/Wali Murid diperlukan untuk proses wawancara penjurusan, penandatanganan komitmen tata tertib, dan klaim potongan biaya daftar ulang.</p>
                            </div>
                        </div>
                    </div>
                `
            },
            jadwal: {
                title: 'Timeline & Periode Potongan Biaya PPDB',
                subtitle: 'Daftar lebih awal untuk mendapatkan potongan biaya pendaftaran terbesar',
                content: `
                    <div style="display:flex; flex-direction:column; gap:14px;">
                        <!-- Live Active Status Banner -->
                        <div style="background:linear-gradient(135deg, #004AC6 0%, #1E40AF 100%); color:#FFFFFF; border-radius:14px; padding:14px 18px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px; box-shadow:0 6px 18px rgba(0, 74, 198, 0.22);">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div style="width:38px; height:38px; border-radius:10px; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                </div>
                                <div>
                                    <span style="font-size:10.5px; text-transform:uppercase; letter-spacing:0.06em; opacity:0.9; font-weight:700;">Status Hari Ini</span>
                                    <h4 style="margin:2px 0 0; font-size:14px; font-weight:800;">{{ $fullTodayStr }}</h4>
                                </div>
                            </div>
                            <span style="background:rgba(255,255,255,0.25); border:1px solid rgba(255,255,255,0.4); padding:5px 12px; border-radius:20px; font-size:12px; font-weight:800; display:inline-flex; align-items:center; gap:6px;">
                                <span style="width:8px; height:8px; border-radius:50%; background:#22C55E; display:inline-block; box-shadow:0 0 8px #22C55E;"></span>
                                Bulan Aktif: {{ $currentMonthName }} {{ $currentYear }}
                            </span>
                        </div>

                        <!-- Timeline Potongan Table -->
                        <div style="overflow-x:auto; border-radius:14px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(15,23,42,0.04); background:#FFFFFF;">
                            <table style="width:100%; border-collapse:collapse; text-align:left; font-size:13px;">
                                <thead>
                                    <tr style="background:#0F172A; color:#FFFFFF;">
                                        <th style="padding:13px 18px; font-weight:800; font-size:12px; text-transform:uppercase; letter-spacing:0.04em;">Periode Gelombang</th>
                                        <th style="padding:13px 18px; font-weight:800; font-size:12px; text-transform:uppercase; letter-spacing:0.04em; text-align:right;">Potongan Biaya</th>
                                        <th style="padding:13px 18px; font-weight:800; font-size:12px; text-transform:uppercase; letter-spacing:0.04em; text-align:center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid #F1F5F9; background:#FAFCFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#334155; font-size:13.5px;">1 – 31 Agustus {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#94A3B8; margin-top:2px;">Gelombang Early Bird</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#64748B; text-align:right; font-size:14px;">
                                            Rp2.500.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#F1F5F9; color:#64748B; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #E2E8F0;">Selesai</span>
                                        </td>
                                    </tr>

                                    <tr style="border-bottom:1px solid #F1F5F9; background:#FFFFFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#334155; font-size:13.5px;">1 – 30 September {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#94A3B8; margin-top:2px;">Gelombang 1</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#64748B; text-align:right; font-size:14px;">
                                            Rp2.000.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#F1F5F9; color:#64748B; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #E2E8F0;">Selesai</span>
                                        </td>
                                    </tr>

                                    <!-- October Active -->
                                    <tr style="border-bottom:1px solid #BFDBFE; background:#EFF6FF; border-left:5px solid #004AC6;">
                                        <td style="padding:14px 18px;">
                                            <strong style="color:#004AC6; font-size:14px; display:inline-flex; align-items:center; gap:6px;">
                                                1 – 31 Oktober {{ $currentYear }}
                                                <span style="background:#004AC6; color:#fff; font-size:10px; padding:2px 7px; border-radius:4px; font-weight:800;">BULAN INI</span>
                                            </strong>
                                            <div style="font-size:11.5px; font-weight:700; color:#2563EB; margin-top:3px;">★ Sedang Berlangsung Hari Ini ({{ $fullTodayStr }})</div>
                                        </td>
                                        <td style="padding:14px 18px; font-weight:900; color:#004AC6; text-align:right; font-size:16px;">
                                            Rp1.000.000
                                        </td>
                                        <td style="padding:14px 18px; text-align:center;">
                                            <span style="background:#16A34A; color:#FFFFFF; font-size:11.5px; padding:5px 12px; border-radius:999px; font-weight:800; box-shadow:0 2px 8px rgba(22,163,74,0.35); display:inline-flex; align-items:center; gap:4px;">
                                                <span style="width:6px; height:6px; border-radius:50%; background:#fff;"></span>
                                                Sedang Dibuka
                                            </span>
                                        </td>
                                    </tr>

                                    <tr style="border-bottom:1px solid #F1F5F9; background:#FFFFFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#1E293B; font-size:13.5px;">1 – 30 November {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#64748B; margin-top:2px;">Gelombang 2</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#0F172A; text-align:right; font-size:14px;">
                                            Rp750.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#FEF3C7; color:#B45309; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #FDE68A;">Akan Datang</span>
                                        </td>
                                    </tr>

                                    <tr style="background:#FAFCFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#1E293B; font-size:13.5px;">1 – 31 Desember {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#64748B; margin-top:2px;">Gelombang 3 / Penutupan</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#0F172A; text-align:right; font-size:14px;">
                                            Rp500.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#FEF3C7; color:#B45309; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #FDE68A;">Akan Datang</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Explanatory Note -->
                        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:12px 16px; display:flex; align-items:center; gap:10px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <p style="margin:0; font-size:12px; color:#475569; line-height:1.5;">
                                <strong>Catatan:</strong> Potongan biaya langsung memotong <em>Dana Sumbangan Pendidikan (DSP/Uang Pangkal Gedung)</em> pada saat calon siswa melakukan pendaftaran ulang di bulan berjalan.
                            </p>
                        </div>
                    </div>
                `
            },
            panduan: {
                title: 'Alur Pendaftaran (Sekolah Swasta)',
                subtitle: 'Tahapan lengkap penerimaan peserta didik baru SMK Antartika 1 Sidoarjo',
                content: `
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <!-- Top private school intro -->
                        <div style="background:#EFF6FF; border:1px solid #BFDBFE; border-radius:12px; padding:12px 16px; display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; border-radius:10px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="M9 14l2 2 4-4"></path></svg>
                            </div>
                            <div>
                                <h4 style="margin:0; font-size:13.5px; font-weight:800; color:#0F172A;">Alur PPDB SMK Antartika 1 Sidoarjo</h4>
                                <p style="margin:2px 0 0; font-size:11.5px; color:#475569;">Layanan pendaftaran sekolah swasta cepat &amp; transparan dengan sistem One-Day Service.</p>
                            </div>
                        </div>

                        <!-- Steps -->
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <!-- Step 1 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">1</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Pengisian Formulir Pendaftaran (Online / Di Kampus Sekolah)</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Calon siswa melakukan registrasi formulir pendaftaran via website resmi atau mengambil langsung formulir di Ruang Sekretariat PPDB SMK Antartika 1 Sidoarjo dengan memilih 2 program keahlian prioritas.</p>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">2</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Penyerahan &amp; Verifikasi Berkas (Didampingi Orang Tua / Wali)</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Menyerahkan berkas fotocopy persyaratan (Ijazah SD, SKL SMP/MTs, KK, Akta, NISN) ke panitia PPDB untuk verifikasi berkas secara langsung di tempat.</p>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">3</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Verifikasi Kelengkapan Berkas &amp; Penjurusan</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Panitia PPDB melakukan pengecekan kelengkapan berkas fisik, penentuan kelas peminatan jurusan, serta penandatanganan komitmen tata tertib bersama Orang Tua/Wali Murid.</p>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">4</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Penerimaan &amp; Daftar Ulang (Klaim Potongan Gelombang)</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Mendapatkan Surat Keputusan (SK) Penerimaan dan menyelesaikan administrasi daftar ulang dengan klaim potongan biaya gelombang aktif bulan berjalan.</p>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#10B981; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">5</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Pengukuran Seragam &amp; Persiapan MPLS</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Pengambilan paket seragam sekolah dan kejuruan, pembagian atribut, serta pembekalan Masa Pengenalan Lingkungan Sekolah (MPLS).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            },
            faq: {
                title: 'Frequently Asked Questions (FAQ)',
                subtitle: 'Jawaban atas pertanyaan umum seputar PPDB SMK Antartika 1 Sidoarjo',
                content: `
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        <details style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:10px; padding:10px 14px; cursor:pointer;" open>
                            <summary style="font-weight:700; color:#0F172A;">Berapa kuota penerimaan siswa baru tahun 2026?</summary>
                            <p style="margin:6px 0 0; font-size:12px; color:#475569; line-height:1.5;">Total kuota penerimaan adalah 18 rombel untuk 5 program keahlian unggulan (RPL, TKR, TPM, TITL, TEI).</p>
                        </details>
                        <details style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:10px; padding:10px 14px; cursor:pointer;">
                            <summary style="font-weight:700; color:#0F172A;">Apakah tersedia program beasiswa?</summary>
                            <p style="margin:6px 0 0; font-size:12px; color:#475569; line-height:1.5;">Ya, tersedia Beasiswa Prestasi Akademik/Olahraga/Seni, Beasiswa Tahfidz Quran, serta Beasiswa Afirmasi KIP/PKH.</p>
                        </details>
                        <details style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:10px; padding:10px 14px; cursor:pointer;">
                            <summary style="font-weight:700; color:#0F172A;">Apakah lulusan langsung disalurkan kerja?</summary>
                            <p style="margin:6px 0 0; font-size:12px; color:#475569; line-height:1.5;">SMK Antartika 1 Sidoarjo memiliki BKK resmi dan kemitraan dengan lebih dari 85+ perusahaan industri nasional & multinasional untuk program magang dan penyerapan lulusan.</p>
                        </details>
                    </div>
                `
            },
            jalur: {
                title: 'Jalur Pendaftaran PPDB',
                subtitle: 'Pilihan jalur pendaftaran resmi SMK Antartika 1 Sidoarjo',
                content: `
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="background:#EFF6FF; border:1px solid #BFDBFE; border-radius:12px; padding:14px 16px; border-left:5px solid #004AC6;">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                <span style="background:#004AC6; color:#fff; font-size:10.5px; font-weight:800; padding:2px 8px; border-radius:6px; text-transform:uppercase;">Jalur 1</span>
                                <strong style="color:#0F172A; font-size:14px;">Pendaftaran Online</strong>
                            </div>
                            <p style="margin:0; font-size:12.5px; color:#475569; line-height:1.5;">Pendaftaran praktis dari rumah melalui portal web resmi & media sosial sekolah. Calon siswa cukup mengisi data formulir digital dan mengunggah dokumen yang dipersyaratkan.</p>
                        </div>
                        <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; border-left:5px solid #10B981;">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                <span style="background:#10B981; color:#fff; font-size:10.5px; font-weight:800; padding:2px 8px; border-radius:6px; text-transform:uppercase;">Jalur 2</span>
                                <strong style="color:#0F172A; font-size:14px;">Pendaftaran Offline (Langsung di Sekolah)</strong>
                            </div>
                            <p style="margin:0; font-size:12.5px; color:#475569; line-height:1.5;">Calon peserta didik datang langsung ke Sekretariat PPDB SMK Antartika 1 Sidoarjo didampingi Orang Tua/Wali Murid dengan membawa berkas persyaratan fisik untuk dibantu verifikasi instan oleh panitia.</p>
                        </div>
                        <div style="background:#FFFBEB; border:1px solid #FDE68A; border-radius:12px; padding:14px 16px; border-left:5px solid #F59E0B;">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                <span style="background:#F59E0B; color:#fff; font-size:10.5px; font-weight:800; padding:2px 8px; border-radius:6px; text-transform:uppercase;">Jalur 3</span>
                                <strong style="color:#0F172A; font-size:14px;">Beasiswa Prestasi</strong>
                            </div>
                            <p style="margin:0; font-size:12.5px; color:#475569; line-height:1.5;">Jalur istimewa bagi siswa berprestasi di bidang Akademik (peringkat kelas/paralel), Kejuaraan Sains/Robotik, Olahraga, Seni, atau Tahfidz Qur'an minimal tingkat Kabupaten/Provinsi/Nasional dengan potongan biaya khusus & bebas SPP.</p>
                        </div>
                    </div>
                `
            },
            online: {
                title: 'Alur Lengkap Pendaftaran PPDB Online',
                subtitle: 'Tahapan pendaftaran calon peserta didik baru melalui sistem online TEFA-Hub',
                content: `
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="background:#EFF6FF; border:1px solid #BFDBFE; border-radius:12px; padding:12px 16px; display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; border-radius:10px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </div>
                            <div>
                                <h4 style="margin:0; font-size:13.5px; font-weight:800; color:#0F172A;">Alur Lengkap Pendaftaran PPDB Online</h4>
                                <p style="margin:2px 0 0; font-size:11.5px; color:#475569;">Ikuti tahapan registrasi online calon peserta didik baru di bawah ini:</p>
                            </div>
                        </div>

                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">1</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Buka portal PPDB online melalui halaman Beranda TEFA-Hub.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">2</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Klik tombol <strong>"Daftar Akun Calon Siswa"</strong> dan isi NISN, Nama Lengkap, serta Nomor WhatsApp aktif.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">3</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Lengkapi formulir biodata diri dan data orang tua/wali.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">4</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Unggah berkas dokumen (KK, Akta Lahir, SKL/Nilai Rapor SMP, dan Pas Foto).
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">5</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Pilih 1 atau 2 Konsentrasi Keahlian (Jurusan) yang diminati.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">6</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Unduh Bukti Pendaftaran dan tunggu jadwal verifikasi &amp; pengumuman hasil seleksi.
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:16px;">
                            <button type="button" onclick="closePpdbModal(); openPpdbRegisterModal();" class="btn-ppdb-primary" style="width:100%; height:44px; justify-content:center; font-size:13.5px; font-weight:700;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Buka Formulir Pendaftaran Sekarang</span>
                            </button>
                        </div>
                    </div>
                `
            },
            'jurusan-all': {
                title: 'Seluruh Program Keahlian (5 Jurusan Unggulan)',
                subtitle: 'Kurikulum berbasis industri dan sertifikasi kompetensi nasional LSP-P1',
                content: `
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>1. Rekayasa Perangkat Lunak (RPL)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Web & Mobile App Development, UI/UX Design, Cloud Services & AI Integration.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>2. Teknik Kendaraan Ringan (TKR)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Mekanik otomotif modern, electronic fuel injection (EFI), chassis & transmisi kendaraan roda 4.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>3. Teknik Pemesinan (TPM)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Bubut presisi, CNC Milling, CAD/CAM 3D modeling, dan manufaktur mesin industri.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>4. Teknik Instalasi Tenaga Listrik (TITL)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Instalasi penerangan & tenaga gedung, PLC automation, panel kelistrikan industri.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>5. Teknik Elektronika Industri (TEI)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Mikrokontroler IoT, mekatronika, sistem instrumentasi kontrol pabrik dan robotika.</p>
                        </div>
                    </div>
                `
            }
        };

        const JURUSAN_DETAIL_DATA = {
            tkr: {
                title: 'Teknik Kendaraan Ringan (TKR)',
                subtitle: 'Program Keahlian Otomotif Berbasis Kelas Binaan Industri',
                desc: 'Membekali siswa dengan keahlian pemeliharaan, servis, dan perbaikan mesin kendaraan roda 4 modern, sistem EFI, rem ABS, transmisi otomatis, dan electrical car technology.'
            },
            tei: {
                title: 'Teknik Elektronika Industri (TEI)',
                subtitle: 'Program Keahlian Instrumentasi & Kontrol Otomasi Pabrik',
                desc: 'Fokus pada pemrograman mikroprosesor, sistem kendali PLC, sensor telemetri industri, perakitan sirkuit PCB otomatis, dan perawatan mesin robotika industri modern.'
            },
            titl: {
                title: 'Teknik Instalasi Tenaga Listrik (TITL)',
                subtitle: 'Program Keahlian Kelistrikan Gedung & Tenaga Industri',
                desc: 'Mempelajari perancangan instalasi listrik rumah tinggal dan gedung bertingkat, panel distribusi 3 fasa, motor listrik industri, serta pembangkit listrik energi terbarukan (Solar Panel).'
            },
            rpl: {
                title: 'Rekayasa Perangkat Lunak (RPL)',
                subtitle: 'Program Keahlian Software Engineering & TEFA Software House',
                desc: 'Mendidik software engineer handal di bidang Full-Stack Web (Laravel, React, Node), Mobile App (Flutter), arsitektur REST API, UI/UX prototyping, dan integrasi Artificial Intelligence.'
            },
            tpm: {
                title: 'Teknik Pemesinan (TPM)',
                subtitle: 'Program Keahlian Manufaktur Presisi & Teknologi CNC',
                desc: 'Keahlian mengoperasikan mesin bubut konvensional, mesin frais, mesin gerinda datar/silinder, serta perancangan CAD/CAM dan pemrograman mesin CNC berstandar industri presisi.'
            }
        };

        /* ─── Poster Welcome Modal (Carousel) Logic ─── */
        let currentPosterIndex = 0;

        function openPpdbPosterModal() {
            const overlay = document.getElementById('ppdbPosterModalOverlay');
            if (!overlay) return;
            overlay.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => overlay.classList.add('active'), 20);
        }

        function closePpdbPosterModal() {
            const overlay = document.getElementById('ppdbPosterModalOverlay');
            if (!overlay) return;
            overlay.classList.remove('active');
            setTimeout(() => {
                overlay.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
        }

        function updatePosterSlide(idx) {
            const slides = document.querySelectorAll('.ppdb-poster-slide');
            const dots = document.querySelectorAll('.poster-dot');
            if (!slides.length) return;

            if (idx >= slides.length) {
                currentPosterIndex = 0;
            } else if (idx < 0) {
                currentPosterIndex = slides.length - 1;
            } else {
                currentPosterIndex = idx;
            }

            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === currentPosterIndex);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentPosterIndex);
            });
        }

        function nextPpdbPosterSlide() {
            updatePosterSlide(currentPosterIndex + 1);
        }

        function prevPpdbPosterSlide() {
            updatePosterSlide(currentPosterIndex - 1);
        }

        function goPpdbPosterSlide(idx) {
            updatePosterSlide(idx);
        }

        // Close Poster on backdrop click
        document.getElementById('ppdbPosterModalOverlay')?.addEventListener('click', function(e) {
            if (e.target === this) closePpdbPosterModal();
        });

        /* ─── Detail Modal Logic ─── */
        function openPpdbModal(key) {
            const data = PPDB_DATA[key];
            if (!data) return;

            document.getElementById('ppdbModalTitle').innerText = data.title;
            document.getElementById('ppdbModalSubtitle').innerText = data.subtitle;
            document.getElementById('ppdbModalBody').innerHTML = data.content;

            const modal = document.getElementById('ppdbModalOverlay');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => modal.classList.add('active'), 10);
        }

        /* ─── PPDB Interactive Registration Wizard Logic ─── */
        let currentRegStep = 1;
        const regFiles = {};

        function openPpdbRegisterModal() {
            // Close detail modal if open
            closePpdbModal();
            closePpdbPosterModal();

            const modal = document.getElementById('ppdbRegisterModalOverlay');
            if (!modal) return;
            goToRegStep(1);
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => modal.classList.add('active'), 10);
        }

        function closePpdbRegisterModal() {
            const modal = document.getElementById('ppdbRegisterModalOverlay');
            if (!modal) return;

            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }, 250);
        }

        function goToRegStep(step) {
            currentRegStep = step;

            // Update step bodies and indicators
            for (let i = 1; i <= 6; i++) {
                const stepElem = document.getElementById(`ppdbStep${i}`);
                if (stepElem) stepElem.classList.toggle('active', i === currentRegStep);
                
                const pillElem = document.getElementById(`stepPill${i}`);
                if (pillElem) {
                    pillElem.classList.toggle('active', i === currentRegStep);
                    pillElem.classList.toggle('completed', i < currentRegStep);
                }

                const lineElem = document.getElementById(`stepLine${i}`);
                if (lineElem) {
                    lineElem.classList.toggle('active', i < currentRegStep);
                }
            }

            // Update footer controls
            const btnPrev = document.getElementById('btnRegPrev');
            const btnNext = document.getElementById('btnRegNext');
            const btnNextText = document.getElementById('btnRegNextText');
            const stepCounter = document.getElementById('stepCounterText');
            const footer = document.getElementById('ppdbRegFooter');

            if (currentRegStep === 6) {
                if (footer) footer.style.display = 'none';
            } else {
                if (footer) footer.style.display = 'flex';
                if (btnPrev) btnPrev.style.display = currentRegStep > 1 ? 'inline-flex' : 'none';
                
                if (currentRegStep === 5) {
                    if (btnNextText) btnNextText.innerText = 'Kirim Pendaftaran';
                    if (btnNext) {
                        btnNext.style.background = '#10B981';
                        btnNext.style.boxShadow = '0 4px 12px rgba(16, 185, 129, 0.3)';
                    }
                    updateSummary();
                } else {
                    if (btnNextText) btnNextText.innerText = 'Lanjutkan';
                    if (btnNext) {
                        btnNext.style.background = '#004AC6';
                        btnNext.style.boxShadow = '0 4px 12px rgba(0, 74, 198, 0.25)';
                    }
                }

                if (stepCounter) {
                    stepCounter.innerHTML = `Langkah <strong>${currentRegStep}</strong> dari 5`;
                }
            }

            // Scroll modal body to top
            const body = document.querySelector('.ppdb-reg-body');
            if (body) body.scrollTop = 0;
        }

        function validateCurrentStep() {
            if (currentRegStep === 1) {
                const nisn = document.getElementById('reg_nisn').value.trim();
                const nama = document.getElementById('reg_nama').value.trim();
                const wa = document.getElementById('reg_wa').value.trim();

                if (!nisn || nisn.length < 5) {
                    alert('Mohon masukkan NISN yang valid (minimal 5-10 digit angka).');
                    document.getElementById('reg_nisn').focus();
                    return false;
                }
                if (!nama) {
                    alert('Mohon masukkan Nama Lengkap calon siswa.');
                    document.getElementById('reg_nama').focus();
                    return false;
                }
                if (!wa || wa.length < 8) {
                    alert('Mohon masukkan Nomor WhatsApp aktif yang valid.');
                    document.getElementById('reg_wa').focus();
                    return false;
                }
                return true;
            }

            if (currentRegStep === 2) {
                const asalSekolah = document.getElementById('reg_asal_sekolah').value.trim();
                const tempatLahir = document.getElementById('reg_tempat_lahir').value.trim();
                const tglLahir = document.getElementById('reg_tanggal_lahir').value.trim();
                const alamat = document.getElementById('reg_alamat').value.trim();
                const namaOrtu = document.getElementById('reg_nama_ortu').value.trim();

                if (!asalSekolah) {
                    alert('Mohon masukkan Asal Sekolah SMP/MTs.');
                    document.getElementById('reg_asal_sekolah').focus();
                    return false;
                }
                if (!tempatLahir) {
                    alert('Mohon masukkan Tempat Lahir.');
                    document.getElementById('reg_tempat_lahir').focus();
                    return false;
                }
                if (!tglLahir) {
                    alert('Mohon pilih Tanggal Lahir.');
                    document.getElementById('reg_tanggal_lahir').focus();
                    return false;
                }
                if (!alamat) {
                    alert('Mohon masukkan Alamat Domisili lengkap.');
                    document.getElementById('reg_alamat').focus();
                    return false;
                }
                if (!namaOrtu) {
                    alert('Mohon masukkan Nama Orang Tua / Wali.');
                    document.getElementById('reg_nama_ortu').focus();
                    return false;
                }
                return true;
            }

            if (currentRegStep === 3) {
                return true;
            }

            if (currentRegStep === 4) {
                const jurusan1 = document.getElementById('reg_jurusan_1').value;
                if (!jurusan1) {
                    alert('Mohon pilih Jurusan Pilihan 1 (Prioritas Utama).');
                    document.getElementById('reg_jurusan_1').focus();
                    return false;
                }
                return true;
            }

            if (currentRegStep === 5) {
                const agreement = document.getElementById('reg_agreement').checked;
                if (!agreement) {
                    alert('Mohon centang pernyataan persetujuan pendaftaran.');
                    return false;
                }
                return true;
            }

            return true;
        }

        function nextRegStep() {
            if (!validateCurrentStep()) return;

            if (currentRegStep < 5) {
                goToRegStep(currentRegStep + 1);
            } else if (currentRegStep === 5) {
                submitRegistration();
            }
        }

        function prevRegStep() {
            if (currentRegStep > 1) {
                goToRegStep(currentRegStep - 1);
            }
        }

        function handleFileUpload(input, labelId, dropzoneId) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const label = document.getElementById(labelId);
                const dropzone = document.getElementById(dropzoneId);
                if (label) label.innerText = '✓ ' + file.name;
                if (dropzone) dropzone.classList.add('has-file');
                regFiles[labelId] = file.name;
            }
        }

        function updateSummary() {
            const nisn = document.getElementById('reg_nisn')?.value || '-';
            const nama = document.getElementById('reg_nama')?.value || '-';
            const wa = '+62 ' + (document.getElementById('reg_wa')?.value || '-');
            const jk = document.querySelector('input[name="reg_jk"]:checked')?.value || 'Laki-laki';
            const asalSekolah = document.getElementById('reg_asal_sekolah')?.value || '-';
            const ttl = (document.getElementById('reg_tempat_lahir')?.value || '-') + ', ' + (document.getElementById('reg_tanggal_lahir')?.value || '-');
            const alamat = document.getElementById('reg_alamat')?.value || '-';
            const namaOrtu = document.getElementById('reg_nama_ortu')?.value || '-';
            const pekerjaanOrtu = document.getElementById('reg_pekerjaan_ortu')?.value || '-';
            const jurusan1 = document.getElementById('reg_jurusan_1')?.value || '-';
            const jurusan2 = document.getElementById('reg_jurusan_2')?.value || '-';
            const gelombang = document.querySelector('input[name="reg_gelombang"]:checked')?.value || 'Gelombang 1';

            const summaryElem = document.getElementById('ppdbSummaryContent');
            if (!summaryElem) return;

            summaryElem.innerHTML = `
                <div class="summary-section">
                    <div class="summary-title">Identitas Calon Siswa</div>
                    <div class="summary-grid">
                        <div class="summary-row"><span class="summary-key">NISN</span><span class="summary-val">${nisn}</span></div>
                        <div class="summary-row"><span class="summary-key">Nama Lengkap</span><span class="summary-val">${nama}</span></div>
                        <div class="summary-row"><span class="summary-key">Jenis Kelamin</span><span class="summary-val">${jk}</span></div>
                        <div class="summary-row"><span class="summary-key">Tempat, Tgl Lahir</span><span class="summary-val">${ttl}</span></div>
                        <div class="summary-row"><span class="summary-key">WhatsApp</span><span class="summary-val">${wa}</span></div>
                        <div class="summary-row"><span class="summary-key">Asal Sekolah</span><span class="summary-val">${asalSekolah}</span></div>
                    </div>
                </div>

                <div class="summary-section">
                    <div class="summary-title">Orang Tua / Wali &amp; Alamat</div>
                    <div class="summary-grid">
                        <div class="summary-row"><span class="summary-key">Nama Orang Tua</span><span class="summary-val">${namaOrtu}</span></div>
                        <div class="summary-row"><span class="summary-key">Pekerjaan</span><span class="summary-val">${pekerjaanOrtu}</span></div>
                        <div class="summary-row" style="grid-column: span 2;"><span class="summary-key">Alamat</span><span class="summary-val">${alamat}</span></div>
                    </div>
                </div>

                <div class="summary-section">
                    <div class="summary-title">Pilihan Keahlian &amp; Jalur</div>
                    <div class="summary-grid">
                        <div class="summary-row"><span class="summary-key">Jurusan Pilihan 1</span><span class="summary-val" style="color:#004AC6;">${jurusan1}</span></div>
                        <div class="summary-row"><span class="summary-key">Jurusan Alternatif</span><span class="summary-val">${jurusan2}</span></div>
                        <div class="summary-row" style="grid-column: span 2;"><span class="summary-key">Jalur Gelombang</span><span class="summary-val">${gelombang}</span></div>
                    </div>
                </div>
            `;
        }

        function submitRegistration() {
            showPpdbToast('Mengirim pendaftaran PPDB online...');

            // Generate registration receipt
            const randomCode = Math.floor(10000 + Math.random() * 90000);
            const regNumber = `PPDB-2026-${randomCode}`;
            const now = new Date();
            const dateStr = now.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' }) + ' WIB';

            const nama = document.getElementById('reg_nama')?.value || 'Calon Siswa';
            const nisn = document.getElementById('reg_nisn')?.value || '-';
            const sekolah = document.getElementById('reg_asal_sekolah')?.value || '-';
            const wa = '+62 ' + (document.getElementById('reg_wa')?.value || '-');
            const jurusan = document.getElementById('reg_jurusan_1')?.value || 'Rekayasa Perangkat Lunak';

            document.getElementById('proof_no_reg').innerText = regNumber;
            document.getElementById('proof_tgl_daftar').innerText = dateStr;
            document.getElementById('proof_nisn').innerText = nisn;
            document.getElementById('proof_nama').innerText = nama;
            document.getElementById('proof_sekolah').innerText = sekolah;
            document.getElementById('proof_wa').innerText = wa;
            document.getElementById('proof_jurusan').innerText = jurusan;

            setTimeout(() => {
                goToRegStep(6);
                showPpdbToast('Selamat! Pendaftaran Anda berhasil dikirim.');
            }, 600);
        }

        function printRegProof() {
            window.print();
        }

        // Close Registration modal on backdrop click
        document.getElementById('ppdbRegisterModalOverlay')?.addEventListener('click', function(e) {
            if (e.target === this) closePpdbRegisterModal();
        });

        function openJurusanDetail(code) {
            const item = JURUSAN_DETAIL_DATA[code];
            if (!item) return;

            document.getElementById('ppdbModalTitle').innerText = item.title;
            document.getElementById('ppdbModalSubtitle').innerText = item.subtitle;
            document.getElementById('ppdbModalBody').innerHTML = `
                <div style="font-size:13.5px; color:#334155; line-height:1.7;">
                    <p style="margin:0 0 12px 0;">${item.desc}</p>
                    <div style="background:#F0F6FF; border:1px solid #D5DCFF; border-radius:10px; padding:12px 14px;">
                        <strong style="color:#004AC6; font-size:13px;">Prospek Karir &amp; Lulusan:</strong>
                        <ul style="margin:6px 0 0; padding-left:18px; color:#475569; font-size:12.5px;">
                            <li>Teknisi Spesialis Industri Nasional & Multinasional</li>
                            <li>Wirausahawan Mandiri / Technopreneur TEFA</li>
                            <li>Melanjutkan Kuliah di Perguruan Tinggi Negeri / Vokasi</li>
                        </ul>
                    </div>
                </div>
            `;

            const modal = document.getElementById('ppdbModalOverlay');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => modal.classList.add('active'), 10);
        }

        function closePpdbModal() {
            const modal = document.getElementById('ppdbModalOverlay');
            if (!modal) return;

            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }, 250);
        }

        // Close Detail modal when clicking overlay backdrop
        document.getElementById('ppdbModalOverlay')?.addEventListener('click', function(e) {
            if (e.target === this) closePpdbModal();
        });

        // Global Keyboard Handler
        document.addEventListener('keydown', function(e) {
            const posterOverlay = document.getElementById('ppdbPosterModalOverlay');
            if (posterOverlay && posterOverlay.classList.contains('active')) {
                if (e.key === 'Escape') closePpdbPosterModal();
                if (e.key === 'ArrowRight') nextPpdbPosterSlide();
                if (e.key === 'ArrowLeft') prevPpdbPosterSlide();
                return;
            }

            if (e.key === 'Escape') {
                closePpdbModal();
                closePpdbRegisterModal();
            }
        });

        // Download Brosur PDF
        function downloadBrosurPpdb() {
            showPpdbToast('Mengunduh Brosur Resmi PPDB SMK Antartika 1 Sidoarjo (PDF)...');
        }

        function showPpdbToast(msg) {
            const toast = document.getElementById('ppdbToast');
            const msgElem = document.getElementById('ppdbToastMsg');
            if (!toast || !msgElem) return;

            msgElem.innerText = msg;
            toast.style.display = 'flex';
            setTimeout(() => toast.classList.add('show'), 10);

            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.style.display = 'none', 300);
            }, 3200);
        }

        // Auto-open poster popup when visiting the PPDB page
        window.addEventListener('DOMContentLoaded', function() {
            setTimeout(openPpdbPosterModal, 300);
        });
    </script>

</body>
</html>
