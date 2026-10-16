<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Pusat Layanan Bantuan & Kontak Siswa Resmi SMK Antartika 1 Sidoarjo — Hubungi layanan Bimbingan Konseling (BK), Tata Usaha, PPDB, Bursa Kerja Khusus (BKK), dan Teaching Factory.">
    <title>Kontak Siswa &amp; Sekolah — SMK Antartika 1 Sidoarjo | Tefa-Hub</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <x-meta-og 
        title="Kontak Siswa & Sekolah — SMK Antartika 1 Sidoarjo | Tefa-Hub"
        description="Pusat Layanan Bantuan & Kontak Siswa Resmi SMK Antartika 1 Sidoarjo — Hubungi layanan Bimbingan Konseling (BK), Tata Usaha, PPDB, Bursa Kerja Khusus (BKK), dan Teaching Factory."
    />


    <!-- Immediate Theme Script: Prevent FOUC across all pages -->
    <script>
    (function() {
        try {
            var savedTheme = localStorage.getItem('tefa_theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            if (savedTheme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.documentElement.removeAttribute('data-theme');
            }
        } catch (e) {}
    })();
    </script>

    <!-- Google Fonts: Plus Jakarta Sans & Caveat (High-Performance Non-Render-Blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
    </noscript>

    <!-- Agentic AI Discovery & LLM Context -->
    <link rel="alternate" type="text/markdown" href="{{ url('/llms.txt') }}" title="LLM Context">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ file_exists(public_path('assets/css/landing.css')) ? filemtime(public_path('assets/css/landing.css')) : '1.0' }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kontak.css') }}?v={{ file_exists(public_path('assets/css/kontak.css')) ? filemtime(public_path('assets/css/kontak.css')) : '1.0' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Accessibility: Skip to Main Content --}}
    <a href="#mainContent" class="skip-to-content">Lewati ke Konten Utama</a>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'kontak'" />

    {{-- Accessible Breadcrumb Navigation --}}
    <x-breadcrumbs :items="[
        ['label' => 'Beranda', 'url' => url('/')],
        ['label' => 'Kontak Siswa & Sekolah', 'url' => '']
    ]" />

    <div class="kontak-ambient-wrap">
        {{-- Ambient decorative glows --}}
        <div class="kontak-glow kontak-glow-1" aria-hidden="true"></div>
        <div class="kontak-glow kontak-glow-2" aria-hidden="true"></div>

        <main id="mainContent" class="wrap">

            {{-- ═══════════════════════════════════════════
                 1. HERO SECTION
                 ═══════════════════════════════════════════ --}}
            <section class="kontak-hero" aria-label="Hero Kontak Siswa dan Sekolah">
                <div class="kontak-badge">
                    <span class="kontak-badge-dot" aria-hidden="true"></span>
                    <span>Pusat Layanan &amp; Komunikasi Terpadu</span>
                </div>

                <h1 class="kontak-title">
                    Layanan Bantuan &amp; <span class="kontak-title-gradient">Kontak Siswa Terpadu</span>
                </h1>

                <p class="kontak-desc">
                    Saluran komunikasi resmi SMK Antartika 1 Sidoarjo untuk siswa aktif, orang tua/wali, calon peserta didik baru (PPDB), alumni, serta mitra industri DUDI.
                </p>

                <div class="kontak-quick-pills">
                    <div class="kontak-pill-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>Respon Cepat Jam Kerja</span>
                    </div>
                    <div class="kontak-pill-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span>Hotline WhatsApp Resmi</span>
                    </div>
                    <div class="kontak-pill-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Konseling BK &amp; Tata Usaha</span>
                    </div>
                </div>
            </section>

            {{-- ═══════════════════════════════════════════
                 2. 5 DIRECT CHANNELS (CARDS GRID)
                 ═══════════════════════════════════════════ --}}
            <section class="kontak-channels-section" aria-label="Daftar Saluran Layanan Spesifik">
                <div class="kontak-channels-grid">

                    {{-- Card 1: Bimbingan Konseling (BK) --}}
                    <div class="kontak-channel-card">
                        <div>
                            <div class="channel-icon-wrap icon-purple">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </div>
                            <h3 class="channel-title">Bimbingan &amp; Konseling (BK)</h3>
                            <p class="channel-desc">Konsultasi perkembangan belajar siswa, bimbingan karir, minat bakat, serta pendampingan pribadi siswa secara konfidensial.</p>
                        </div>
                        <div>
                            <div class="channel-officer">
                                <span>Koordinator BK: <strong>Dra. Siti Hidayati</strong></span>
                            </div>
                            <a href="https://wa.me/6281234567891?text=Halo%20Bapak%2FIbu%20Guru%20BK%20SMK%20Antartika%201%20Sidoarjo%2C%20saya%20ingin%20berkonsultasi" target="_blank" rel="noopener noreferrer" class="channel-action-btn">
                                <span>Hubungi Guru BK</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>

                    {{-- Card 2: Tata Usaha (TU) --}}
                    <div class="kontak-channel-card">
                        <div>
                            <div class="channel-icon-wrap icon-blue">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <h3 class="channel-title">Tata Usaha &amp; Administrasi</h3>
                            <p class="channel-desc">Permohonan surat keterangan siswa aktif, legalisir ijazah, administrasi SPP, mutasi siswa, dan pencatatan berkas resmi sekolah.</p>
                        </div>
                        <div>
                            <div class="channel-officer">
                                <span>Loket Layanan: <strong>Front Office TU</strong></span>
                            </div>
                            <a href="https://wa.me/6281234567892?text=Halo%20Tata%20Usaha%20SMK%20Antartika%201%20Sidoarjo%2C%20saya%20ingin%20mengurus%20administrasi%20siswa" target="_blank" rel="noopener noreferrer" class="channel-action-btn">
                                <span>Hubungi Tata Usaha</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>

                    {{-- Card 3: BKK & Kemitraan PKL --}}
                    <div class="kontak-channel-card">
                        <div>
                            <div class="channel-icon-wrap icon-emerald">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </div>
                            <h3 class="channel-title">Bursa Kerja (BKK) &amp; PKL</h3>
                            <p class="channel-desc">Penempatan magang industri siswa, lowongan kerja alumni, rekrutmen kerja DUDI, dan sertifikasi keahlian LSP-P1 BNSP.</p>
                        </div>
                        <div>
                            <div class="channel-officer">
                                <span>Tim Hubin: <strong>Divisi BKK &amp; Magang</strong></span>
                            </div>
                            <a href="{{ route('bkk') }}" class="channel-action-btn">
                                <span>Portal Karir BKK</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>

                    {{-- Card 4: PPDB Online --}}
                    <div class="kontak-channel-card">
                        <div>
                            <div class="channel-icon-wrap icon-amber">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <line x1="19" y1="8" x2="19" y2="14"></line>
                                    <line x1="22" y1="11" x2="16" y2="11"></line>
                                </svg>
                            </div>
                            <h3 class="channel-title">Panitia PPDB Online</h3>
                            <p class="channel-desc">Informasi alur pendaftaran siswa baru, beasiswa prestasi, rincian biaya, jadwal tes minat bakat, dan verifikasi berkas pendaftar.</p>
                        </div>
                        <div>
                            <div class="channel-officer">
                                <span>Helpdesk: <strong>Sekretariat PPDB</strong></span>
                            </div>
                            <a href="{{ route('ppdb') }}" class="channel-action-btn">
                                <span>Informasi PPDB</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>

                    {{-- Card 5: Teaching Factory (BLUD) --}}
                    <div class="kontak-channel-card">
                        <div>
                            <div class="channel-icon-wrap icon-rose">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                            </div>
                            <h3 class="channel-title">Produk &amp; Jasa BLUD</h3>
                            <p class="channel-desc">Pemesanan jasa servis otomotif, fabrikasi mesin presisi, instalasi kelistrikan industri, dan pembuatan software aplikasi siswa RPL.</p>
                        </div>
                        <div>
                            <div class="channel-officer">
                                <span>Unit Produksi: <strong>Manajer BLUD Sekolah</strong></span>
                            </div>
                            <a href="{{ url('/#layanan') }}" class="channel-action-btn">
                                <span>Katalog Layanan TEFA</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </section>

            {{-- ═══════════════════════════════════════════
                 3. DUAL SECTION: FORM & CAMPUS INFO
                 ═══════════════════════════════════════════ --}}
            <section class="kontak-main-section" aria-label="Formulir Pengaduan dan Peta Lokasi">
                <div class="kontak-dual-grid">

                    {{-- Left Column: Interactive Form --}}
                    <div class="kontak-form-card">
                        <div class="form-header">
                            <span class="form-header-badge">FORMULIR PERTANYAAN &amp; BANTUAN</span>
                            <h2 class="form-header-title">Kirimkan Pesan atau Kendala Anda</h2>
                            <p class="form-header-desc">Isi formulir di bawah ini. Anda dapat mengirimkan langsung via WhatsApp Center sekolah atau mencatatnya sebagai tiket pesan bantuan.</p>
                        </div>

                        <form id="kontakSiswaForm" onsubmit="event.preventDefault(); submitInquiryTicket();">
                            <div class="k-form-row">
                                <div class="k-form-group">
                                    <label for="namaLengkap" class="k-label">Nama Lengkap *</label>
                                    <input type="text" id="namaLengkap" class="k-input" placeholder="Masukkan nama Anda..." required>
                                </div>
                                <div class="k-form-group">
                                    <label for="statusPengirim" class="k-label">Status Pengirim *</label>
                                    <select id="statusPengirim" class="k-select" required>
                                        <option value="Siswa Aktif">Siswa Aktif</option>
                                        <option value="Orang Tua / Wali">Orang Tua / Wali Siswa</option>
                                        <option value="Calon Siswa (PPDB)">Calon Siswa (PPDB)</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Mitra Industri DUDI">Mitra Industri (DUDI)</option>
                                        <option value="Umum">Masyarakat Umum</option>
                                    </select>
                                </div>
                            </div>

                            <div class="k-form-row">
                                <div class="k-form-group">
                                    <label for="nomorWa" class="k-label">Nomor WhatsApp Aktif *</label>
                                    <input type="tel" id="nomorWa" class="k-input" placeholder="Contoh: 081234567890" required>
                                </div>
                                <div class="k-form-group">
                                    <label for="kategoriLayanan" class="k-label">Kategori Layanan *</label>
                                    <select id="kategoriLayanan" class="k-select" required>
                                        <option value="Bimbingan Konseling (BK)">Bimbingan Konseling (BK)</option>
                                        <option value="Tata Usaha & Administrasi">Tata Usaha &amp; Administrasi Surat</option>
                                        <option value="Informasi PPDB Online">Informasi PPDB Online</option>
                                        <option value="BKK & Magang PKL">Bursa Kerja (BKK) &amp; PKL</option>
                                        <option value="Teaching Factory & BLUD">Produk &amp; Layanan BLUD TEFA</option>
                                        <option value="Kendala Akun TEFA-Hub">Kendala Akun &amp; E-Rapor TEFA-Hub</option>
                                        <option value="Saran & Pengaduan">Saran &amp; Pengaduan Layanan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="k-form-group">
                                <label for="subjekPesan" class="k-label">Subjek / Pokok Pertanyaan *</label>
                                <input type="text" id="subjekPesan" class="k-input" placeholder="Tuliskan pokok permohonan atau pertanyaan Anda..." required>
                            </div>

                            <div class="k-form-group">
                                <label for="isiPesan" class="k-label">Isi Pesan / Uraian Detail *</label>
                                <textarea id="isiPesan" class="k-textarea" placeholder="Tuliskan secara lengkap rincian pesan, kendala, atau permohonan informasi Anda..." required></textarea>
                            </div>

                            <div class="k-form-actions">
                                <button type="button" class="k-btn-wa" onclick="sendViaWhatsApp();">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.41a8.17 8.17 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.41-1.75-.14-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/>
                                    </svg>
                                    <span>Kirim Otomatis ke WhatsApp Center</span>
                                </button>

                                <button type="submit" class="k-btn-ticket">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="22" y1="2" x2="11" y2="13"></line>
                                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                    </svg>
                                    <span>Kirim Tiket Pesan Layanan</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Right Column: Information & Map --}}
                    <div class="kontak-info-card">

                        {{-- Campus Address --}}
                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div class="info-details">
                                <h4>Alamat Kampus</h4>
                                <p>Jl. Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252</p>
                                <p style="font-size: 12.5px; color: #2563eb; margin-top: 4px; font-weight: 600;">Area Kompleks Pendidikan Vokasi Siwalanpanji</p>
                            </div>
                        </div>

                        {{-- Office Hours --}}
                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div class="info-details">
                                <h4>Jam Operasional Layanan</h4>
                                <div class="office-hours-list">
                                    <div><strong>Senin – Kamis:</strong> 07.00 – 15.30 WIB <span class="office-badge badge-open">Buka</span></div>
                                    <div><strong>Jumat:</strong> 07.00 – 14.30 WIB <span class="office-badge badge-open">Buka</span></div>
                                    <div><strong>Sabtu &amp; Minggu:</strong> Libur (Kecuali Kegiatan Khusus)</div>
                                </div>
                            </div>
                        </div>

                        {{-- Official Channels --}}
                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div class="info-details">
                                <h4>Kontak &amp; Surat Elektronik</h4>
                                <p>Email: <a href="mailto:info@smkantartika1sda.sch.id">info@smkantartika1sda.sch.id</a></p>
                                <p>Telepon: <a href="tel:0318962851">(031) 8962851</a></p>
                                <p>Website Resmi: <a href="https://www.smkantartika1sda.sch.id" target="_blank" rel="noopener noreferrer">www.smkantartika1sda.sch.id</a></p>
                            </div>
                        </div>

                        {{-- Embedded Interactive Map --}}
                        <div>
                            <h4 style="font-size: 14px; font-weight: 700; color: #0f172a; margin-bottom: 10px;">Lokasi Kampus SMK Antartika 1 Sidoarjo</h4>
                            <div class="kontak-map-wrap">
                                <iframe 
                                    title="Peta Lokasi Kampus SMK Antartika 1 Sidoarjo" 
                                    src="https://maps.google.com/maps?q=SMK+Antartika+1+Sidoarjo&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

            {{-- ═══════════════════════════════════════════
                 4. FAQ ACCORDION (FREQUENTLY ASKED QUESTIONS)
                 ═══════════════════════════════════════════ --}}
            <section class="kontak-faq-section" aria-label="Pertanyaan yang Sering Diajukan">
                <div class="faq-header">
                    <h2 class="faq-header-title">Pertanyaan Sering Diajukan (FAQ)</h2>
                    <p class="faq-header-desc">Temukan jawaban cepat untuk pertanyaan seputar administrasi siswa, akun TEFA-Hub, dan layanan sekolah.</p>
                </div>

                <div class="faq-list">

                    {{-- FAQ 1 --}}
                    <div class="faq-item active">
                        <button type="button" class="faq-question" onclick="toggleFaq(this);">
                            <span>Bagaimana cara mengurus surat keterangan siswa aktif?</span>
                            <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div class="faq-answer">
                            Siswa atau wali murid dapat langsung datang ke Loket Pelayanan Tata Usaha (TU) pada hari dan jam kerja dengan membawa kartu pelajar/NISN. Surat keterangan siswa aktif dapat diproses dalam 1 hari kerja kerja tanpa dipungut biaya.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="faq-item">
                        <button type="button" class="faq-question" onclick="toggleFaq(this);">
                            <span>Saya lupa kata sandi akun login TEFA-Hub, bagaimana solusinya?</span>
                            <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div class="faq-answer">
                            Siswa dapat menghubungi wali kelas masing-masing atau tim administrator IT di laboratorium RPL untuk melakukan reset kata sandi sementara. Pastikan menyiapkan NISN dan nama lengkap siswa.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="faq-item">
                        <button type="button" class="faq-question" onclick="toggleFaq(this);">
                            <span>Kapan layanan konsultasi pribadi Guru BK dapat dijadwalkan?</span>
                            <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div class="faq-answer">
                            Konsultasi Bimbingan Konseling (BK) terbuka setiap hari kerja pada jam istirahat atau jam kosong yang disepakati dengan guru BK. Siswa juga dapat membuat janji temu melalui tombol WhatsApp Guru BK di halaman ini.
                        </div>
                    </div>

                    {{-- FAQ 4 --}}
                    <div class="faq-item">
                        <button type="button" class="faq-question" onclick="toggleFaq(this);">
                            <span>Bagaimana alumni dapat mendaftar dan melamar lowongan kerja di BKK?</span>
                            <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div class="faq-answer">
                            Alumni SMK Antartika 1 Sidoarjo dapat mengakses menu Bursa Kerja (BKK) secara berkala pada platform ini. Lowongan dari mitra DUDI langsung terhubung dengan formulir lamaran online dan tes seleksi industri.
                        </div>
                    </div>

                </div>
            </section>

        </main>
    </div>

    {{-- Interactive Floating Feedback Toast --}}
    <div id="kontakToast" class="k-toast" role="status" aria-live="polite">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <span id="toastMsg">Pesan bantuan Anda berhasil dicatat! Tim kami akan segera menindaklanjuti.</span>
    </div>

    {{-- AI Chatbot Widget --}}
    <x-ai-widget />

    {{-- Unified Landing Footer --}}
    <x-landing-footer />

    {{-- Page Logic --}}
    <script>
        function toggleFaq(btn) {
            const item = btn.closest('.faq-item');
            if (item) {
                item.classList.toggle('active');
            }
        }

        function showToast(message) {
            const toast = document.getElementById('kontakToast');
            const toastMsg = document.getElementById('toastMsg');
            if (toast && toastMsg) {
                toastMsg.textContent = message;
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 4000);
            }
        }

        function submitInquiryTicket() {
            const nama = document.getElementById('namaLengkap').value.trim();
            const subjek = document.getElementById('subjekPesan').value.trim();
            if (!nama || !subjek) return;

            showToast(`Terima kasih, ${nama}! Tiket pertanyaan '${subjek}' berhasil kami catat.`);
            document.getElementById('kontakSiswaForm').reset();
        }

        function sendViaWhatsApp() {
            const nama     = document.getElementById('namaLengkap').value.trim() || 'Siswa/Wali';
            const status   = document.getElementById('statusPengirim').value;
            const wa       = document.getElementById('nomorWa').value.trim() || '-';
            const kategori = document.getElementById('kategoriLayanan').value;
            const subjek   = document.getElementById('subjekPesan').value.trim() || 'Pertanyaan Layanan Siswa';
            const isi      = document.getElementById('isiPesan').value.trim() || 'Mohon informasi dan tindak lanjut layanan ini.';

            const message = `Halo Layanan Terpadu SMK Antartika 1 Sidoarjo,\n\nSaya ingin mengajukan permohonan/pertanyaan dengan rincian berikut:\n\n*Nama:* ${nama}\n*Status:* ${status}\n*No. WA Pengirim:* ${wa}\n*Kategori Layanan:* ${kategori}\n*Subjek:* ${subjek}\n*Isi Pesan:*\n${isi}\n\nMohon konfirmasi dan bantuan informasinya. Terima kasih.`;

            const encoded = encodeURIComponent(message);
            // Official School Helpdesk WhatsApp
            const targetWa = '6281234567890';
            window.open(`https://wa.me/${targetWa}?text=${encoded}`, '_blank');
        }
    </script>
</body>
</html>
