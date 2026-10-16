<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Pusat Karier & Penyaluran Industri (BKK Tefa-Hub) — Akses lowongan terverifikasi dari mitra DUDI nasional, pantau proses seleksi kerja & PKL, serta bangun CV Digital dan portofolio kompetensi berstandar SKKNI.">
    <title>Pusat Karier &amp; Penyaluran Industri (BKK) — Tefa-Hub</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <x-meta-og 
        title="Pusat Karier & Penyaluran Industri (BKK) — Tefa-Hub"
        description="Pusat Karier & Penyaluran Industri (BKK Tefa-Hub) — Akses lowongan terverifikasi dari mitra DUDI nasional, pantau proses seleksi kerja & PKL, serta bangun CV Digital dan portofolio kompetensi berstandar SKKNI."
    />


    <!-- Google Fonts: Plus Jakarta Sans & Caveat (High-Performance Non-Render-Blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
    </noscript>

    <!-- High-Priority LCP Hero Preload -->
    <link rel="preload" as="image" href="{{ asset('assets/image copy 3.webp') }}" type="image/webp" fetchpriority="high">

    <!-- Agentic AI Discovery & LLM Context -->
    <link rel="alternate" type="text/markdown" href="{{ url('/llms.txt') }}" title="LLM Context">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ file_exists(public_path('assets/css/landing.css')) ? filemtime(public_path('assets/css/landing.css')) : '1.0' }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bkk.landing.css') }}?v={{ file_exists(public_path('assets/css/bkk.landing.css')) ? filemtime(public_path('assets/css/bkk.landing.css')) : '1.0' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Accessibility: Skip to Main Content --}}
    <a href="#mainContent" class="skip-to-content">Lewati ke Konten Utama</a>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'bkk'" />

    {{-- Accessible Breadcrumb Navigation --}}
    <x-breadcrumbs :items="[
        ['label' => 'Layanan', 'url' => url('/#layanan')],
        ['label' => 'Bursa Kerja Khusus (BKK)', 'url' => '']
    ]" />

    {{-- ═══════════════════════════════════════════
         BKK HERO SECTION WITH GRADIENT GLOWS & BACKGROUND IMAGE
         ═══════════════════════════════════════════ --}}
    <section class="bkk-hero-section" id="mainContent">
        {{-- Background image.png Artwork (Subtle & Elegant) --}}
        <div class="bkk-hero-bg-artwork" aria-hidden="true">
            
        </div>

        {{-- Background Eclipse Glow Accents --}}
        <div class="bkk-bg-eclipse bkk-eclipse-1" aria-hidden="true"></div>
        <div class="bkk-bg-eclipse bkk-eclipse-2" aria-hidden="true"></div>
        <div class="bkk-bg-eclipse bkk-eclipse-3" aria-hidden="true"></div>

        <div class="wrap">
            <div class="bkk-hero-grid">

                {{-- Left Content Column --}}
                <div class="bkk-hero-content">
                    
                    {{-- 1. Bubble Badge: Kolaborasi Sekolah - Industri --}}
                    <div class="bkk-bubble-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                        <span>Kolaborasi Sekolah – Industri</span>
                    </div>

                    {{-- 2. Hero Title --}}
                    <h1 class="bkk-hero-title">
                        Pusat Karier &amp; Penyaluran<br>
                        Industri <span class="bkk-title-blue">(BKK Tefa–Hub)</span>
                    </h1>

                    {{-- 3. Description --}}
                    <p class="bkk-hero-desc">
                        Jembatan terpercaya antara talenta vokasi kompeten dengan ekosistem industri nasional. Pantau tahapan lamaran secara transparan, ikuti jadwal seleksi mitra resmi, dan kelola CV Digital berbasis portofolio kompetensi terverifikasi.
                    </p>

                    {{-- 4. Two Buttons --}}
                    <div class="bkk-btn-group">
                        {{-- Button 1: Biru Penuh (Pantau Progres Lamaran) --}}
                        <a href="{{ route('siswa.bkk') }}" class="bkk-btn bkk-btn-pantau">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <span>Pantau Progres Lamaran</span>
                        </a>

                        {{-- Button 2: Biru Muda (Eksplorasi Lowongan Baru) --}}
                        <a href="#katalog-layanan" class="bkk-btn bkk-btn-lowongan">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                            </svg>
                            <span>Eksplorasi Lowongan Baru</span>
                        </a>
                    </div>

                </div>

                {{-- Right Column: Compact Hero Showcase Card using image copy 3.webp --}}
                <div class="bkk-hero-visual">
                    <div class="bkk-showcase-container">
                        <div class="bkk-showcase-card">
                            <div class="bkk-showcase-media">
                                {{-- Main Hero Card Image using image copy 3.webp --}}
                                <img src="{{ asset('assets/image copy 3.webp') }}" alt="Pusat Karier dan Layanan Vokasi Tefa-Hub" class="bkk-showcase-img" decoding="async" fetchpriority="high" width="940" height="1672">
                                
                                {{-- Rating & Caption Top Left --}}
                                <div class="bkk-showcase-rating-wrap">
                                    <span class="bkk-showcase-rating-pill">
                                        <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        4.9
                                    </span>
                                    <span class="bkk-showcase-rating-caption">Motor Sehat<br>Perjalanan Lancar</span>
                                </div>

                                {{-- Price Badge Top Right --}}
                                <span class="bkk-showcase-price-badge">Mulai 50rb</span>

                                {{-- Floating White Card Inside Image --}}
                                <div class="bkk-showcase-float-card">
                                    <div class="bkk-showcase-float-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                        </svg>
                                    </div>
                                    <div class="bkk-showcase-float-body">
                                        <span class="bkk-showcase-float-tag">JASA LAYANAN</span>
                                        <h3 class="bkk-showcase-float-title">Servis Berkala &amp; Ganti Oli Mesin</h3>
                                    </div>
                                    <button type="button" onclick="openBkkDetailModal(0)" class="bkk-showcase-float-btn" aria-label="Lihat Detail: Servis Berkala &amp; Ganti Oli Mesin">
                                        <span>Lihat Selengkapnya</span>
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Script Font Accent: Karier Dimulai dari Sini! --}}
                        <div class="bkk-hero-quote-accent" aria-hidden="true">
                            <span class="bkk-hero-quote-text">Karier<br>Dimulai dari<br>Sini!</span>
                            <svg class="bkk-hero-quote-curve" viewBox="0 0 100 24" fill="none">
                                <path d="M 5,18 Q 50,4 95,14" stroke="#2563EB" stroke-width="3.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         KATALOG 16 CARD LAYANAN & PRODUK VOKASI
         (BACKGROUND PUTIH MURNI SESUAI PERMINTAAN USER)
         ═══════════════════════════════════════════ --}}
    @php
        $bkkServices = [
            [
                'rating' => '4.9',
                'price' => 'Mulai 50rb',
                'icon' => 'wrench',
                'title' => 'Servis Berkala & Ganti Oli Mesin',
                'desc' => 'Perawatan rutin untuk menjaga performa kendaraan Anda tetap optimal.',
                'full_desc' => 'Layanan perawatan berkala komprehensif untuk menjaga keawetan mesin motor, membersihkan komponen vital pembakaran, serta mengganti pelumas mesin dengan oli berkualitas sesuai rekomendasi pabrikan. Dikerjakan dengan SOP ketat untuk memastikan kendaraan selalu bertenaga, hemat bahan bakar, dan terhindar dari aus dini.',
                'duration' => '30 - 45 Menit',
                'warranty' => 'Garansi Servis 7 Hari',
                'sop' => 'SKKNI & SOP Pabrikan',
                'technician' => 'Teknisi Siswa & Instruktur TEFA',
                'category' => 'Perawatan Mesin & Pelumas',
                'scope' => [
                    'Penggantian oli mesin sesuai spesifikasi SAE pabrik',
                    'Pembersihan filter udara dan filter oli',
                    'Pengecekan celah busi dan kelistrikan pengapian',
                    'Penyetelan stasioner (idle RPM) dan kelenturan kabel gas',
                    'Pengecekan tekanan angin ban dan sistem suspensi'
                ],
                'benefits' => [
                    'Menggunakan pelumas asli 100% terverifikasi resmi',
                    'Tarikan mesin lebih enteng dan konsumsi BBM lebih hemat',
                    'Pemeriksaan gratis untuk kondisi aki dan minyak rem'
                ]
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 65rb',
                'icon' => 'disc',
                'title' => 'Ganti Ban Motor',
                'desc' => 'Tersedia berbagai merk ban berkualitas dengan pemasangan profesional.',
                'full_desc' => 'Layanan bongkar pasang ban motor matic, bebek, dan sport menggunakan mesin tyre changer modern yang aman tanpa merusak velg. Didukung pilihan merk ban ternama berstandar SNI dan pengisian nitrogen murni untuk kenyamanan berkendara maksimal.',
                'duration' => '20 - 30 Menit',
                'warranty' => 'Garansi Pasang & Pentil 14 Hari',
                'sop' => 'Tyre Changer Otomatis',
                'technician' => 'Teknisi Kaki-Kaki TEFA',
                'category' => 'Kaki-kaki & Roda',
                'scope' => [
                    'Pembongkaran ban lama dengan mesin tyre changer otomatis presisi',
                    'Pembersihan bibir velg dan pemeriksaan bearing roda',
                    'Pemasangan ban baru berstandar SNI / OEM',
                    'Pengecekan dan penggantian pentil tubeless baru',
                    'Pengisian angin nitrogen murni bertekanan presisi'
                ],
                'benefits' => [
                    'Velg bebas lecet atau bengkok berkat mesin pencongkel khusus',
                    'Pilihan kompon ban lengkap (soft, medium, touring)',
                    'Pengecekan kelurusan putaran velg (spoke & cast wheel)'
                ]
            ],
            [
                'rating' => '4.7',
                'price' => 'Mulai 45rb',
                'icon' => 'gear',
                'title' => 'Tune Up Mesin',
                'desc' => 'Menjaga performa mesin tetap stabil dan lebih bertenaga.',
                'full_desc' => 'Kalibrasi ulang performa mesin untuk mengembalikan tenaga dan efisiensi konsumsi bahan bakar seperti baru keluar pabrik. Meliputi pembersihan ruang bakar, pengujian kompresi, penyetelan katup, serta sinkronisasi sistem induksi bahan bakar.',
                'duration' => '40 - 60 Menit',
                'warranty' => 'Garansi Servis 7 Hari',
                'sop' => 'Kalibrasi Feeler Gauge & Compression Tester',
                'technician' => 'Instruktur & Siswa Senior TEFA',
                'category' => 'Performa Mesin Vokasi',
                'scope' => [
                    'Pembersihan intake manifold & ruang bakar dari kerak karbon',
                    'Pengukuran tekanan kompresi silinder mesin',
                    'Kalibrasi celah katup intake dan exhaust (feeler gauge presisi)',
                    'Pembersihan karburator / throttle body secara mendalam',
                    'Uji akselerasi stasioner dan performa putaran RPM tinggi'
                ],
                'benefits' => [
                    'Mesin tidak mudah panas dan minim getaran abnormal',
                    'Responsivitas tarikan gas kembali spontan seketika',
                    'Emisi gas buang lebih ramah lingkungan dan lolos uji emisi'
                ]
            ],
            [
                'rating' => '4.6',
                'price' => 'Mulai 35rb',
                'icon' => 'calendar',
                'title' => 'Penggantian Aki',
                'desc' => 'Aki original dengan garansi dan pemasangan cepat.',
                'full_desc' => 'Layanan uji kelayakan dan penggantian baterai motor menggunakan aki kering Maintenance Free (MF) bergaransi resmi. Dilengkapi tes arus alternator dan regulator rectifier (kiprok) agar aki baru bekerja awet tanpa risiko drop mendadak.',
                'duration' => '15 - 20 Menit',
                'warranty' => 'Garansi Pabrik hingga 6 Bulan',
                'sop' => 'Digital Battery Load Tester',
                'technician' => 'Teknisi Kelistrikan TEFA',
                'category' => 'Sistem Kelistrikan',
                'scope' => [
                    'Pengujian kapasitas Cold Cranking Amps (CCA) aki lama',
                    'Pemasangan aki kering (MF) orisinal segel pabrik',
                    'Pengecekan arus pengisian dari spul dan regulator kiprok',
                    'Pembersihan dan pelapisan anti-oksidasi kutub aki',
                    'Pengujian fungsional starter elektrik dan lampu utama'
                ],
                'benefits' => [
                    'Jaminan aki 100% baru dan bersegel original pabrikan',
                    'Pemeriksaan kesehatan sistem pengisian motor gratis',
                    'Garansi tukar unit baru jika terjadi cacat pabrik'
                ]
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 70rb',
                'icon' => 'shield',
                'title' => 'Ganti Kampas Rem & Setel Rantai',
                'desc' => 'Pemeriksaan sistem pengereman menyeluruh untuk keselamatan berkendara.',
                'full_desc' => 'Layanan perawatan pengereman dan transfer tenaga roda untuk kenyamanan dan keselamatan berkendara. Termasuk penggantian pad rem cakram/tromol, pembersihan kaliper, pengurasan minyak rem, serta penyetelan ketegangan rantai motor roda.',
                'duration' => '30 - 40 Menit',
                'warranty' => 'Garansi Pengerjaan 7 Hari',
                'sop' => 'Brake Tester & Chain Alignment',
                'technician' => 'Teknisi Chasis & Rem TEFA',
                'category' => 'Keselamatan & Kendali',
                'scope' => [
                    'Pembongkaran kaliper rem dan pengecekan ketebalan piringan cakram',
                    'Penggantian kampas rem orisinal anti-bunyi decit',
                    'Pembersihan piston kaliper dan penggantian minyak rem DOT 4',
                    'Penyetelan jarak main bebas (free play) tuas/pedal rem',
                    'Penyetelan kelurusan dan kelonggaran rantai roda motor'
                ],
                'benefits' => [
                    'Pengereman lebih pakem, responsif, dan tidak licin saat hujan',
                    'Rantai tidak mudah kendur dan gesekan gear terminimalisir',
                    'Free pelumasan rantai khusus anti-debu (high-grade chain lube)'
                ]
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 55rb',
                'icon' => 'zap',
                'title' => 'Pembersihan Throttle Body & CVT',
                'desc' => 'Mengembalikan akselerasi motor matic agar tarikan lebih enteng dan responsif.',
                'full_desc' => 'Paket perawatan komplit khusus motor matic untuk menghilangkan getaran gredek pada putaran awal dan menjaga kelancaran suplai udara injeksi. Meliputi pembongkaran blok CVT, pembersihan kampas ganda, dan pembersihan sensor throttle body.',
                'duration' => '45 - 60 Menit',
                'warranty' => 'Garansi Halus & Bebas Gredek 7 Hari',
                'sop' => 'CVT Overhaul & Throttle Cleaner Spray',
                'technician' => 'Spesialis Matic TEFA',
                'category' => 'Transmisi & Injeksi Matic',
                'scope' => [
                    'Pembongkaran bak CVT dan pembersihan residu debu kampas ganda',
                    'Pembersihan dan pelumasan ulang pulley primer & sekunder',
                    'Pemeriksaan keausan roller, per CVT, dan sliding piece',
                    'Pembersihan kerak karbon pada katup throttle body & intake',
                    'Reset bukaan katup gas melalui modul scanner ECU'
                ],
                'benefits' => [
                    'Menghilangkan penyakit getar / gredek saat akselerasi awal',
                    'Tarikan gas enteng dan akselerasi responsif di jalan menanjak',
                    'Mencegah aus dini pada belt dan pulley transmisi'
                ]
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 75rb',
                'icon' => 'cpu',
                'title' => 'Uji Emisi & Diagnosa Scanner Motor',
                'desc' => 'Deteksi kerusakan sensor injeksi motor dengan perangkat scanner modern.',
                'full_desc' => 'Pengecekan komputerisasi sistem injeksi menggunakan alat diagnostik scanner mutakhir berstandar APM. Mengetahui secara akurat kondisi sensor O2, TPS, injektor, suhu mesin, serta membaca histori kerusakan elektrik yang terekam pada ECU.',
                'duration' => '25 - 35 Menit',
                'warranty' => 'Garansi Akurasi Diagnosa Digital',
                'sop' => 'Multi-Brand OBD Diagnostic Scan',
                'technician' => 'Teknisi Elektronika Otomotif TEFA',
                'category' => 'Diagnostik Komputerisasi',
                'scope' => [
                    'Penyambungan diagnostic tool ke port OBD kendaraan',
                    'Pembacaan data parameter sensor secara real-time (Live Data)',
                    'Penghapusan kode DTC (Diagnostic Trouble Code) tersimpan',
                    'Pengujian kadar gas buang (HC, CO, Lambda) sesuai baku mutu',
                    'Pencetakan lembar hasil diagnosa performa sistem injeksi'
                ],
                'benefits' => [
                    'Mendeteksi gangguan sensor elektrik sebelum berujung mogok',
                    'Kalibrasi presisi rasio bahan bakar & udara injeksi',
                    'Dilengkapi rekomendasi perbaikan berbasis data digital resmi'
                ]
            ],
            [
                'rating' => '4.7',
                'price' => 'Mulai 40rb',
                'icon' => 'filter',
                'title' => 'Servis Karburator & Filter Udara',
                'desc' => 'Pembersihan jalur bahan bakar dan penggantian filter udara presisi.',
                'full_desc' => 'Penanganan khusus untuk motor dengan sistem karburator agar aliran bensin dan udara tetap seimbang tanpa brebet. Meliputi pembersihan nozzle spuyer (pilot & main jet), penyetelan pelampung, serta revitalisasi elemen saringan udara.',
                'duration' => '30 - 45 Menit',
                'warranty' => 'Garansi Servis 7 Hari',
                'sop' => 'Ultrasonic & Carb Cleaner SOP',
                'technician' => 'Teknisi Karburasi TEFA',
                'category' => 'Sistem Bahan Bakar',
                'scope' => [
                    'Pembongkaran unit karburator dan perendaman cleaner khusus',
                    'Pembersihan lubang spuyer pilot jet & main jet dari kerak',
                    'Pengecekan kondisi jarum skep, pelampung, dan karet vakum',
                    'Penyetelan sekrup angin dan putaran stasioner mesin optimal',
                    'Pembersihan atau penggantian elemen saringan filter udara'
                ],
                'benefits' => [
                    'Menghilangkan gejala motor brebet, tersendat, atau susah starter pagi',
                    'Konsumsi bahan bakar lebih irit dan pembakaran sempurna',
                    'Suara knalpot lebih renyah, stabil, dan bertenaga'
                ]
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 95rb',
                'icon' => 'tool',
                'title' => 'Overhaul Mesin & Penggantian Piston',
                'desc' => 'Perbaikan total mesin kendaraan oleh teknisi ahli berstandar industri.',
                'full_desc' => 'Layanan rekondisi mesin menyeluruh untuk mengatasi masalah mesin ngebul, oli berkurang drastis, hilangnya kompresi, atau suara mesin kasar. Dikerjakan oleh teknisi ahli menggunakan micrometer dan torque wrench berstandar pabrikan.',
                'duration' => '1 - 2 Hari Kerja',
                'warranty' => 'Garansi Mesin 30 Hari',
                'sop' => 'Precision Micrometer & Torque Wrench',
                'technician' => 'Instruktur Ahli Engine Overhaul TEFA',
                'category' => 'Perbaikan Berat (Heavy Repair)',
                'scope' => [
                    'Pembongkaran blok silinder dan pengukuran keausan dinding silinder',
                    'Penggantian set piston, ring seher, dan pin piston baru',
                    'Sekir klep (valve seating) dan penggantian seal klep anti-bocor oli',
                    'Penggantian paking perpak set lengkap berstandar original',
                    'Penyetelan rantai keteng (cam chain) dan torsi baut silinder head'
                ],
                'benefits' => [
                    'Kompresi mesin kembali padat bertenaga seperti motor baru',
                    'Asap putih/ngebul hilang tuntas tanpa kekhawatiran oli tekor',
                    'Dikerjakan di ruang kerja khusus dengan alat ukur presisi tinggi'
                ]
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 30rb',
                'icon' => 'circle',
                'title' => 'Tambal Ban Tubeless & Cek Tekanan',
                'desc' => 'Penanganan ban bocor cepat dengan material penambal berkualitas tinggi.',
                'full_desc' => 'Solusi cepat dan aman untuk ban tertusuk paku atau bocor halus. Menggunakan kompon karet penambal berkualitas tinggi yang menyatu sempurna dengan karkas ban tanpa merusak struktur anyaman benang ban kendaraan.',
                'duration' => '10 - 15 Menit',
                'warranty' => 'Garansi Titik Tambal 30 Hari',
                'sop' => 'Internal / String Vulcanizing SOP',
                'technician' => 'Teknisi Fast-Service TEFA',
                'category' => 'Perbaikan Cepat (Quick Service)',
                'scope' => [
                    'Pendeteksian lokasi kebocoran menggunakan cairan khusus',
                    'Ekstraksi paku atau serpihan logam tajam pada karkas ban',
                    'Aplikasi lem vulkanisir dan kompon penambal elastis berkualitas',
                    'Pemeriksaan kebocoran ulang pada bak uji air',
                    'Kalibrasi tekanan angin sesuai standar beban kendaraan'
                ],
                'benefits' => [
                    'Penanganan cepat dan rapi tanpa perlu bongkar velg',
                    'Karet tambal elastis kuat dan tidak mudah copot/mencuat',
                    'Pengecekan gratis seluruh ban depan dan belakang'
                ]
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 60rb',
                'icon' => 'compass',
                'title' => 'Ganti Shockbreaker & Komstir Depan',
                'desc' => 'Setel stang kemudi dan peredam kejut agar berkendara lebih stabil dan nyaman.',
                'full_desc' => 'Layanan spesialis peredam kejut dan setir untuk menghilangkan keluhan stang kemudi berat, goyang saat belok, atau suspensi depan jedug saat melewati jalan berlubang.',
                'duration' => '45 - 60 Menit',
                'warranty' => 'Garansi Pengerjaan 14 Hari',
                'sop' => 'Steering Stem & Suspension Calibration',
                'technician' => 'Teknisi Rangka & Suspensi TEFA',
                'category' => 'Suspensi & Kemudi',
                'scope' => [
                    'Pembongkaran segitiga depan dan pemeriksaan race ball komstir',
                    'Penggantian komstir baru dan pelumasan grease tahan panas',
                    'Penggantian seal oli shockbreaker dan kuras oli suspensi depan',
                    'Penyetelan kekencangan mur komstir agar stang stabil dan ringan',
                    'Uji redaman pantulan suspensi depan dan belakang'
                ],
                'benefits' => [
                    'Stang kemudi ringan, presisi, dan tidak ngebuang saat bermanuver',
                    'Redaman suspensi empuk tanpa bunyi jedug di jalan rusak',
                    'Meningkatkan stabilitas pengendalian pada kecepatan tinggi'
                ]
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 65rb',
                'icon' => 'sun',
                'title' => 'Restorasi Lampu LED & Wiring Motor',
                'desc' => 'Perapihan jalur kelistrikan body dan instalasi lampu motor lebih terang.',
                'full_desc' => 'Solusi kelistrikan kendaraan untuk mengatasi lampu redup, korsleting berkala, atau kabel body yang semrawut. Meliputi instalasi modul lampu LED terang benderang dengan soket anti-air dan penataan wiring rapi berisolasi tahan panas.',
                'duration' => '30 - 50 Menit',
                'warranty' => 'Garansi Kelistrikan 14 Hari',
                'sop' => 'Automotive Wiring Harness Standard',
                'technician' => 'Teknisi Elektrikal TEFA',
                'category' => 'Kelistrikan & Penerangan',
                'scope' => [
                    'Pengecekan kontinuitas jalur kabel body dan sekring pengaman',
                    'Perapihan kabel dengan spiral wrap dan pelindung anti-panas',
                    'Pemasangan lampu LED hemat daya dengan fokus cahaya presisi',
                    'Pengecekan soket saklar lampu sein, klakson, dan rem',
                    'Kalibrasi sudut sorot lampu depan agar tidak menyilaukan pengendara lain'
                ],
                'benefits' => [
                    'Sorot lampu lebih fokus, terang, dan aman berkendara malam hari',
                    'Bebas risiko korsleting kabel dan baterai aki tekor',
                    'Tampilan wiring rapi dan terlindungi berstandar OEM'
                ]
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 85rb',
                'icon' => 'rotate',
                'title' => 'Ganti Vanbelt & Roller Matic Presisi',
                'desc' => 'Penggantian komponen penggerak CVT original untuk mencegah putus di jalan.',
                'full_desc' => 'Peremajaan sabuk penggerak (drive belt) dan roller CVT untuk mencegah resiko vanbelt putus mendadak saat berkendara jauh. Dikerjakan dengan membersihkan pulley dan melumasi grease khusus CVT bertoleransi panas tinggi.',
                'duration' => '35 - 50 Menit',
                'warranty' => 'Garansi Pemasangan 14 Hari',
                'sop' => 'CVT Drive Train Standard',
                'technician' => 'Spesialis Transmisi Matic TEFA',
                'category' => 'Transmisi CVT',
                'scope' => [
                    'Pemeriksaan ketebalan dan keretakan serat sabuk vanbelt',
                    'Penimbangan gramatur roller matic sesuai standar motor',
                    'Penggantian vanbelt dan roller original bawaan motor',
                    'Pelumasan pin guide dan bearing crankshaft CVT dengan grease khusus',
                    'Pengujian torsi respons akselerasi putaran pulley'
                ],
                'benefits' => [
                    'Terbebas dari rasa was-was vanbelt putus mendadak di perjalanan',
                    'Akselerasi motor lebih padat, bertenaga, dan kuat di tanjakan',
                    'Menggunakan suku cadang original pabrikan terjamin 100%'
                ]
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 55rb',
                'icon' => 'droplet',
                'title' => 'Kuras Radiator & Coolant Treatment',
                'desc' => 'Penggantian air radiator pendingin mesin untuk mencegah overheat saat macet.',
                'full_desc' => 'Perawatan sistem pendingin cairan (liquid cooled) untuk mencegah suhu mesin panas berlebih (overheating) yang dapat merusak silinder head. Meliputi pembersihan kerak sirip radiator, pengurasan cairan lama, dan pengisian coolant konsentrat tinggi.',
                'duration' => '25 - 35 Menit',
                'warranty' => 'Garansi Sistem Pendingin 7 Hari',
                'sop' => 'Radiator Pressure Test & Bleeding',
                'technician' => 'Teknisi Cooling System TEFA',
                'category' => 'Sistem Pendingin',
                'scope' => [
                    'Pengurasan total air radiator dari blok mesin dan tabung reservoir',
                    'Pembilasan jalur sirkulasi cairan (flushing) anti-lumut dan karat',
                    'Pemeriksaan kinerja tutup radiator (radiator cap) dan seal selang',
                    'Pengisian coolant berformula anti-freeze dan anti-rust kualitas tinggi',
                    'Proses bleeding untuk memastikan sirkulasi bebas gelembung udara terjebak'
                ],
                'benefits' => [
                    'Suhu mesin tetap stabil di bawah 95°C meski terjebak macet parah',
                    'Mencegah risiko fatal silinder head melengkung akibat overheat',
                    'Memperpanjang umur pakai water pump, thermostat, dan selang radiator'
                ]
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 45rb',
                'icon' => 'sliders',
                'title' => 'Penyetelan Klep & Karburasi Presisi',
                'desc' => 'Kalibrasi kerapatan celah klep mesin agar pembakaran optimal dan hemat bensin.',
                'full_desc' => 'Penyetelan presisi celah katup intake dan exhaust menggunakan feeler gauge saat mesin dingin sesuai toleransi manual servis pabrik. Menghilangkan bunyi tik-tik pada silinder head dan memaksimalkan efisiensi kompresi.',
                'duration' => '30 - 45 Menit',
                'warranty' => 'Garansi Servis 7 Hari',
                'sop' => 'Valve Clearance Precision Adjustment',
                'technician' => 'Teknisi Mesin Presisi TEFA',
                'category' => 'Presisi Mesin',
                'scope' => [
                    'Pembongkaran tutup katup silinder head saat mesin dalam kondisi dingin',
                    'Pengukuran celah klep masuk (IN) dan buang (EX) dengan feeler gauge',
                    'Penyetelan baut setelan klep sesuai spesifikasi buku manual',
                    'Kalibrasi suplai karburasi / debit bensin agar mesin tidak nembak',
                    'Penggantian oring karet tutup klep agar tidak terjadi rembes oli'
                ],
                'benefits' => [
                    'Suara mesin halus, senyap, dan bebas bunyi ketukan gemeretak',
                    'Pembakaran bersih tanpa knalpot nembak-nembak saat deselerasi',
                    'Mesin enteng digeber pada putaran RPM tinggi tanpa ngelitik'
                ]
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 120rb',
                'icon' => 'star',
                'title' => 'Paket Komplit Servis Motor Vokasi',
                'desc' => 'Pemeriksaan total 24 titik kendaraan motor dengan garansi servis resmi bengkel.',
                'full_desc' => 'Paket perawatan terlengkap dengan inspeksi menyeluruh pada 24 titik penting motor Anda: mesin, pengereman, kelistrikan, sistem bahan bakar, transmisi, dan rangka suspensi. Dilengkapi lembar check sheet resmi unit produksi BLUD TEFA.',
                'duration' => '60 - 90 Menit',
                'warranty' => 'Garansi Servis Komplit 14 Hari',
                'sop' => '24-Point Comprehensive Vehicle Inspection',
                'technician' => 'Tim Kolaborasi Teknisi Siswa & Instruktur',
                'category' => 'All-in-One Service',
                'scope' => [
                    'Servis tune-up mesin menyeluruh dan penggantian oli mesin pilihan',
                    'Pembersihan karburator / throttle body dan elemen filter udara',
                    'Pemeriksaan sistem rem cakram/tromol, bearing, dan kelistrikan body',
                    'Servis transmisi CVT (matic) atau setel rantai roda (bebek/sport)',
                    'Pengecekan tekanan angin ban, suspensi, dan kekencangan baut bodi'
                ],
                'benefits' => [
                    'Hemat biaya hingga 30% dibanding memilih servis satuan',
                    'Inspeksi total 24 titik kendaraan dengan lembar bukti servis fisik',
                    'Jaminan kepuasan pelanggan dan pendampingan langsung instruktur senior'
                ]
            ],
        ];
    @endphp

    <section class="bkk-catalog-section" id="katalog-layanan">
        <div class="wrap">
            
            {{-- Header Bar Layanan Kami --}}
            <div class="bkk-section-header">
                {{-- Left Title & Description --}}
                <div class="bkk-header-title-wrap">
                    <div class="bkk-header-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <div>
                        <h2 class="bkk-section-title">Layanan Kami</h2>
                        <p class="bkk-section-desc">Berbagai layanan unggulan untuk mendukung karier dan kompetensi Anda.</p>
                    </div>
                </div>

                {{-- Right 3 Benefits Strip --}}
                <div class="bkk-benefits-strip">
                    <div class="bkk-benefit-item">
                        <div class="bkk-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                        </div>
                        <div class="bkk-benefit-text">
                            <span class="bkk-benefit-title">Mudah Diakses</span>
                            <span class="bkk-benefit-sub">Proses cepat &amp; transparan</span>
                        </div>
                    </div>

                    <div class="bkk-benefit-item">
                        <div class="bkk-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <polyline points="9 12 11 14 15 10"></polyline>
                            </svg>
                        </div>
                        <div class="bkk-benefit-text">
                            <span class="bkk-benefit-title">Terpercaya</span>
                            <span class="bkk-benefit-sub">Bermitra dengan industri resmi</span>
                        </div>
                    </div>

                    <div class="bkk-benefit-item">
                        <div class="bkk-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div class="bkk-benefit-text">
                            <span class="bkk-benefit-title">Didukung Sekolah</span>
                            <span class="bkk-benefit-sub">Berbasis kompetensi vokasi</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 16 Cards Catalog Grid (4x4) --}}
            <div class="bkk-cards-catalog-grid" id="bkkCatalogGrid">
                @foreach ($bkkServices as $index => $item)
                    <div class="bkk-service-card bkk-card-reveal" data-delay="{{ ($index % 4) * 60 }}" onclick="openBkkDetailModal({{ $index }})" role="button" tabindex="0" onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openBkkDetailModal({{ $index }}); }" aria-label="Lihat Penjelasan: {{ $item['title'] }}">
                        
                        {{-- Card Image Area (Enlarged and uses image copy 3.webp) --}}
                        <div class="bkk-card-img-wrap">
                            <img src="{{ asset('assets/image copy 3.webp') }}" alt="{{ $item['title'] }}" class="bkk-card-img" onerror="this.onerror=null; this.src='{{ asset('assets/Background (14).webp') }}';" loading="lazy" width="300" height="152">
                            
                            {{-- Rating Badge Top Left --}}
                            <span class="bkk-card-rating">
                                <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                {{ $item['rating'] }}
                            </span>

                            {{-- Price Badge Top Right --}}
                            <span class="bkk-card-price">{{ $item['price'] }}</span>
                        </div>

                        {{-- Floating Circle Icon Overlapping Image & Body --}}
                        <div class="bkk-card-icon-badge">
                            <div class="bkk-card-icon-inner">
                                @if ($item['icon'] === 'wrench' || $item['icon'] === 'tool')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                    </svg>
                                @elseif ($item['icon'] === 'disc' || $item['icon'] === 'circle' || $item['icon'] === 'rotate')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                @elseif ($item['icon'] === 'gear' || $item['icon'] === 'sliders')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                                @elseif ($item['icon'] === 'calendar' || $item['icon'] === 'sun')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                @elseif ($item['icon'] === 'shield')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                @elseif ($item['icon'] === 'zap')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                    </svg>
                                @elseif ($item['icon'] === 'cpu')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
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
                                @elseif ($item['icon'] === 'droplet')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                                    </svg>
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                @endif
                            </div>
                        </div>

                        {{-- Card Body Text --}}
                        <div class="bkk-card-body">
                            <h3 class="bkk-card-title">{{ $item['title'] }}</h3>
                            <p class="bkk-card-desc">{{ $item['desc'] }}</p>
                        </div>

                        {{-- Card Footer Action (Trigger Interactive Detail Modal) --}}
                        <div class="bkk-card-footer">
                            <button type="button" class="bkk-card-link" onclick="event.stopPropagation(); openBkkDetailModal({{ $index }})" aria-label="Lihat Detail Layanan: {{ $item['title'] }}">Lihat Detail</button>
                            <span class="bkk-card-arrow" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         INTERACTIVE DETAIL MODAL POPUP FOR BKK SERVICES
         ═══════════════════════════════════════════ --}}
    <div id="bkkDetailModalOverlay" class="bkk-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="bkkModalTitle" tabindex="-1">
        <div class="bkk-modal-card" role="document">
            
            {{-- Modal Header --}}
            <div class="bkk-modal-header">
                <div class="bkk-modal-header-left">
                    <div class="bkk-modal-icon-box" id="bkkModalIconBox">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                        </svg>
                    </div>
                    <div class="bkk-modal-title-area">
                        <div class="bkk-modal-badge-row">
                            <span id="bkkModalCategory" class="bkk-modal-badge-pill">Layanan Vokasi BKK &amp; BLUD</span>
                            <span class="bkk-modal-badge-rating">
                                <svg viewBox="0 0 24 24" width="12" height="12" fill="#F59E0B"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                <span id="bkkModalRating">4.9</span> (Ulasan Pengunjung)
                            </span>
                        </div>
                        <h3 id="bkkModalTitle" class="bkk-modal-title">Nama Layanan</h3>
                        <p id="bkkModalPrice" class="bkk-modal-price">Mulai 50rb</p>
                    </div>
                </div>
                <button type="button" class="bkk-modal-close-btn" onclick="closeBkkDetailModal()" aria-label="Tutup Dialog Detail">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="bkk-modal-body">
                
                {{-- Quick Badges Metrics Grid (4 items) --}}
                <div class="bkk-modal-badges-grid">
                    <div class="bkk-modal-badge-item">
                        <span class="bkk-modal-badge-label">Estimasi Waktu</span>
                        <span class="bkk-modal-badge-value" id="bkkModalDuration">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>30 - 45 Menit</span>
                        </span>
                    </div>
                    <div class="bkk-modal-badge-item">
                        <span class="bkk-modal-badge-label">Garansi Layanan</span>
                        <span class="bkk-modal-badge-value" id="bkkModalWarranty" style="color: #059669;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                            <span>Garansi 7 Hari</span>
                        </span>
                    </div>
                    <div class="bkk-modal-badge-item">
                        <span class="bkk-modal-badge-label">Standar Mutu</span>
                        <span class="bkk-modal-badge-value" id="bkkModalStandard">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><path d="M9 12l2 2 4-4"></path></svg>
                            <span>SKKNI &amp; DUDI</span>
                        </span>
                    </div>
                    <div class="bkk-modal-badge-item">
                        <span class="bkk-modal-badge-label">Pelaksana Servis</span>
                        <span class="bkk-modal-badge-value" id="bkkModalTechnician">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span>Teknisi TEFA</span>
                        </span>
                    </div>
                </div>

                {{-- 1. Penjelasan Lengkap (Description) --}}
                <div class="bkk-modal-section">
                    <h4 class="bkk-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        <span>Penjelasan &amp; Manfaat Layanan</span>
                    </h4>
                    <p class="bkk-modal-desc" id="bkkModalFullDesc">Penjelasan detail mengenai servis...</p>
                </div>

                {{-- 2. Ruang Lingkup & Poin Pengerjaan --}}
                <div class="bkk-modal-section">
                    <h4 class="bkk-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <span>Ruang Lingkup &amp; Rincian Pengerjaan (SOP)</span>
                    </h4>
                    <ul class="bkk-modal-list" id="bkkModalScopeList">
                        <!-- Dynamic -->
                    </ul>
                </div>

                {{-- 3. Keunggulan & Jaminan Kualitas --}}
                <div class="bkk-modal-section">
                    <h4 class="bkk-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span>Keunggulan Layanan TEFA Antartika 1</span>
                    </h4>
                    <ul class="bkk-modal-list" id="bkkModalBenefitsList">
                        <!-- Dynamic -->
                    </ul>
                </div>

            </div>

            {{-- Modal Footer --}}
            <div class="bkk-modal-footer">
                <button type="button" class="bkk-modal-btn-close" onclick="closeBkkDetailModal()">
                    Tutup
                </button>
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="bkk-modal-btn-action" id="bkkModalWhatsappBtn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                    </svg>
                    <span>Konsultasi Layanan via WA</span>
                </a>
            </div>

        </div>
    </div>

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
         SCRIPTS: SCROLL ANIMATIONS, DETAIL MODAL & ACCELERATION
         ═══════════════════════════════════════════ --}}
    <script>
    (function() {
        // Enriched BKK Services dataset
        const bkkServicesData = @json($bkkServices);

        // SVG Map for Modal Header Icons
        const bkkIconSvgMap = {
            wrench: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
            tool: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
            disc: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle></svg>',
            circle: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle></svg>',
            rotate: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle></svg>',
            gear: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
            sliders: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1 0-2.83 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
            calendar: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
            sun: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>',
            shield: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
            zap: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
            cpu: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>',
            droplet: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>',
            compass: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>',
            filter: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>',
            star: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>'
        };

        // Open Service Detail Modal
        window.openBkkDetailModal = function(index) {
            const item = bkkServicesData[index];
            if (!item) return;

            document.getElementById('bkkModalTitle').textContent = item.title;
            document.getElementById('bkkModalPrice').textContent = item.price;
            document.getElementById('bkkModalRating').textContent = item.rating;
            document.getElementById('bkkModalCategory').textContent = item.category || 'Layanan Vokasi BKK & BLUD';

            const durationSpan = document.getElementById('bkkModalDuration');
            if (durationSpan && durationSpan.querySelector('span')) {
                durationSpan.querySelector('span').textContent = item.duration || '30 - 45 Menit';
            }

            const warrantySpan = document.getElementById('bkkModalWarranty');
            if (warrantySpan && warrantySpan.querySelector('span')) {
                warrantySpan.querySelector('span').textContent = item.warranty || 'Garansi 7 Hari';
            }

            const standardSpan = document.getElementById('bkkModalStandard');
            if (standardSpan && standardSpan.querySelector('span')) {
                standardSpan.querySelector('span').textContent = item.sop || 'SKKNI & DUDI';
            }

            const techSpan = document.getElementById('bkkModalTechnician');
            if (techSpan && techSpan.querySelector('span')) {
                techSpan.querySelector('span').textContent = item.technician || 'Teknisi TEFA';
            }

            document.getElementById('bkkModalFullDesc').textContent = item.full_desc || item.desc;

            // Icon SVG
            const iconBox = document.getElementById('bkkModalIconBox');
            if (iconBox) {
                iconBox.innerHTML = bkkIconSvgMap[item.icon] || bkkIconSvgMap['wrench'];
            }

            // Populate Scope Checklist
            const scopeContainer = document.getElementById('bkkModalScopeList');
            if (scopeContainer) {
                scopeContainer.innerHTML = '';
                (item.scope || []).forEach(text => {
                    const li = document.createElement('li');
                    li.className = 'bkk-modal-list-item';
                    li.innerHTML = `
                        <span class="bkk-modal-list-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </span>
                        <span>${text}</span>
                    `;
                    scopeContainer.appendChild(li);
                });
            }

            // Populate Benefits List
            const benefitsContainer = document.getElementById('bkkModalBenefitsList');
            if (benefitsContainer) {
                benefitsContainer.innerHTML = '';
                (item.benefits || []).forEach(text => {
                    const li = document.createElement('li');
                    li.className = 'bkk-modal-list-item';
                    li.innerHTML = `
                        <span class="bkk-modal-list-icon green">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </span>
                        <span>${text}</span>
                    `;
                    benefitsContainer.appendChild(li);
                });
            }

            // Dynamic WhatsApp consultation link
            const waBtn = document.getElementById('bkkModalWhatsappBtn');
            if (waBtn) {
                const message = encodeURIComponent(`Halo Bengkel TEFA SMK Antartika 1 Sidoarjo, saya ingin konsultasi & booking layanan "${item.title}" (${item.price}). Mohon info jadwal dan mekanik yang bertugas.`);
                waBtn.href = `https://wa.me/6281234567890?text=${message}`;
            }

            // Show Overlay & Lock Body Scroll
            const overlay = document.getElementById('bkkDetailModalOverlay');
            if (overlay) {
                overlay.classList.add('active');
                overlay.focus();
            }
            document.body.classList.add('bkk-modal-open');
        };

        // Close Service Detail Modal
        window.closeBkkDetailModal = function() {
            const overlay = document.getElementById('bkkDetailModalOverlay');
            if (overlay) {
                overlay.classList.remove('active');
            }
            document.body.classList.remove('bkk-modal-open');
        };

        // Event listener: click outside modal card to close
        const overlay = document.getElementById('bkkDetailModalOverlay');
        if (overlay) {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    closeBkkDetailModal();
                }
            });
        }

        // Event listener: ESC key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' || e.key === 'Esc') {
                const modal = document.getElementById('bkkDetailModalOverlay');
                if (modal && modal.classList.contains('active')) {
                    closeBkkDetailModal();
                }
            }
        });

        // Card reveal animation observer
        function initBkkCardReveal() {
            const cardEls = document.querySelectorAll('.bkk-card-reveal');
            if (!cardEls.length) return;

            if ('IntersectionObserver' in window) {
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
                }, { threshold: 0.05, rootMargin: '0px 0px -20px 0px' });

                cardEls.forEach(function(el) {
                    if (!el.classList.contains('bkk-card-revealed')) {
                        cardObserver.observe(el);
                    }
                });
            } else {
                cardEls.forEach(function(el) { el.classList.add('bkk-card-revealed'); });
            }
        }

        document.addEventListener('DOMContentLoaded', initBkkCardReveal);
        window.addEventListener('pageshow', function(e) {
            document.body.style.overflow = '';
            initBkkCardReveal();
        });

        // Fail-safe: ensure cards never stay hidden
        setTimeout(function() {
            document.querySelectorAll('.bkk-card-reveal:not(.bkk-card-revealed)').forEach(function(el) {
                el.classList.add('bkk-card-revealed');
            });
        }, 500);
    })();
    </script>
</body>
</html>
