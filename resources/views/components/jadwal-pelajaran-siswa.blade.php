<section class="jadwal-section-wrapper" aria-label="Jadwal Pelajaran dan Praktik Kejuruan">
    
    <!-- ══════════════════════════════════════════════════════════
         HEADER JADWAL & TABS HARI (SESUAI DESAIN PILL BAR)
         ══════════════════════════════════════════════════════════ -->
    <div class="jadwal-header-block">
        <div class="jadwal-title-row">
            <img src="{{ asset('assets/calendar.png') }}" alt="Calendar Icon" class="jadwal-main-icon" width="22" height="22">
            <h2 class="jadwal-title-text">Jadwal Pelajaran & Praktik Kejuruan</h2>
        </div>
        <p class="jadwal-subtitle-text">Roster pembelajaran harian, sesi bengkel TEFA & laboratorium kejuruan</p>

        <!-- Day Selector Tabs (Capsule Pill Bar) & Action Button -->
        <div class="jadwal-controls-row">
            <div class="day-tabs-pill-capsule" id="dayTabsGroup" role="tablist" aria-label="Pilih Hari Pembelajaran">
                <button type="button" class="day-tab-btn" data-day="sen" role="tab" aria-selected="false">Sen</button>
                <button type="button" class="day-tab-btn" data-day="sel" role="tab" aria-selected="false">Sel</button>
                <button type="button" class="day-tab-btn active" data-day="rab" role="tab" aria-selected="true">Rabu (Hari Ini)</button>
                <button type="button" class="day-tab-btn" data-day="kam" role="tab" aria-selected="false">Kam</button>
                <button type="button" class="day-tab-btn" data-day="jum" role="tab" aria-selected="false">Jum</button>
                <button type="button" class="day-tab-btn" data-day="sab" role="tab" aria-selected="false">Sab</button>
            </div>

            <button type="button" class="btn-roster-lengkap" aria-label="Lihat Roster Lengkap">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="btn-roster-icon">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <span>Lihat Roster Lengkap</span>
            </button>
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════════
         3 KARTU JADWAL (EAEDFF & EEF3FF DENGAN EFFECT INNER SHADOW)
         ══════════════════════════════════════════════════════════ -->
    <div class="jadwal-cards-container">
        
        <!-- CARD 1: Selesai -->
        <div class="jadwal-card card-selesai">
            <!-- Card Top Header -->
            <div class="card-schedule-header">
                <span class="badge-schedule badge-selesai">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>Selesai</span>
                </span>
                <span class="schedule-time">07.15 – 09.30 WIB</span>
            </div>

            <!-- Subject Title -->
            <h3 class="subject-title">Pemrograman Web<br>Lanjut</h3>

            <!-- Details: Location & Teacher -->
            <div class="subject-details-list">
                <div class="subject-detail-item">
                    <img src="{{ asset('assets/lab.png') }}" alt="Lab Icon" width="15" height="15" class="detail-icon">
                    <span class="detail-text">Lab Komputer 3 (Lab RPL)</span>
                </div>
                <div class="subject-detail-item">
                    <img src="{{ asset('assets/man.png') }}" alt="Teacher Icon" width="15" height="15" class="detail-icon">
                    <span class="detail-text">Bpk. Hendra, S.Kom</span>
                </div>
            </div>

            <!-- Card Bottom Footer -->
            <div class="card-schedule-footer">
                <span class="footer-label">Presensi Tervalidasi</span>
                <span class="footer-status status-hadir">Hadir (07.12)</span>
            </div>
        </div>

        <!-- CARD 2: Sedang Berlangsung -->
        <div class="jadwal-card card-berlangsung">
            <!-- Card Top Header -->
            <div class="card-schedule-header">
                <span class="badge-schedule badge-berlangsung">
                    <span class="pulse-white-dot" aria-hidden="true"></span>
                    <span>Sedang Berlangsung</span>
                </span>
                <span class="schedule-time time-highlight">09.45 – 12.00 WIB</span>
            </div>

            <!-- Subject Title -->
            <h3 class="subject-title title-highlight">Praktikum IoT & Otomasi<br>TEFA</h3>

            <!-- Details: Location & Teacher -->
            <div class="subject-details-list">
                <div class="subject-detail-item">
                    <img src="{{ asset('assets/la.png') }}" alt="Lab Icon" width="15" height="15" class="detail-icon">
                    <span class="detail-text">Lab Hardware & Mekatronika</span>
                </div>
                <div class="subject-detail-item">
                    <img src="{{ asset('assets/man.png') }}" alt="Teacher Icon" width="15" height="15" class="detail-icon">
                    <span class="detail-text">Ibu Ratna, M.T.</span>
                </div>
            </div>

            <!-- Card Bottom Footer -->
            <div class="card-schedule-footer">
                <span class="footer-label font-bold-dark">Modul 4 Aktif</span>
                <button type="button" class="btn-lembar-lab" aria-label="Buka Lembar Lab">
                    Buka Lembar Lab
                </button>
            </div>
        </div>

        <!-- CARD 3: Akan Datang -->
        <div class="jadwal-card card-mendatang">
            <!-- Card Top Header -->
            <div class="card-schedule-header">
                <span class="badge-schedule badge-mendatang">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span>Akan Datang</span>
                </span>
                <span class="schedule-time">13.00 – 15.15 WIB</span>
            </div>

            <!-- Subject Title -->
            <h3 class="subject-title">Technopreneurship &<br>Manajemen BLUD</h3>

            <!-- Details: Location & Teacher -->
            <div class="subject-details-list">
                <div class="subject-detail-item">
                    <img src="{{ asset('assets/mark.png') }}" alt="Room Icon" width="15" height="15" class="detail-icon">
                    <span class="detail-text">Ruang Teori 12 & Galeri Produk</span>
                </div>
                <div class="subject-detail-item">
                    <img src="{{ asset('assets/man.png') }}" alt="Mentor Icon" width="15" height="15" class="detail-icon">
                    <span class="detail-text">Kurator BLUD & Tim DUDI</span>
                </div>
            </div>

            <!-- Card Bottom Footer -->
            <div class="card-schedule-footer">
                <span class="footer-label">Materi Pengayaan</span>
                <span class="footer-status status-siap">Siap Dipelajari</span>
            </div>
        </div>

    </div>

</section>

<!-- Interactive Script for Day Selection -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dayTabs = document.querySelectorAll('#dayTabsGroup .day-tab-btn');
        dayTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                dayTabs.forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
            });
        });
    });
</script>
