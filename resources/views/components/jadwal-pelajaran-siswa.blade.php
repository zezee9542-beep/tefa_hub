@php
    $dayMap = [
        0 => 'min',
        1 => 'sen',
        2 => 'sel',
        3 => 'rab',
        4 => 'kam',
        5 => 'jum',
        6 => 'sab',
    ];
    $dayNames = [
        'sen' => 'Senin',
        'sel' => 'Selasa',
        'rab' => 'Rabu',
        'kam' => 'Kamis',
        'jum' => 'Jumat',
        'sab' => 'Sabtu',
        'min' => 'Minggu',
    ];
    $currentDayNum = (int) now()->dayOfWeek; // 0 = Sunday, 1 = Monday, ..., 6 = Saturday
    $todayKey = $dayMap[$currentDayNum] ?? 'sen';
    $activeKey = $todayKey === 'min' ? 'sen' : $todayKey;
@endphp

<section class="jadwal-section-wrapper" aria-label="Jadwal Pelajaran dan Praktik Kejuruan">
    
    <!-- ══════════════════════════════════════════════════════════
         HEADER JADWAL & TABS HARI (DINAMIS MENGIKUTI HARI LOGIN)
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
                @foreach (['sen' => 'Sen', 'sel' => 'Sel', 'rab' => 'Rab', 'kam' => 'Kam', 'jum' => 'Jum', 'sab' => 'Sab'] as $key => $short)
                    @php
                        $isActive = ($key === $activeKey);
                        $isToday = ($key === $todayKey);
                        $label = $isToday ? ($dayNames[$key] . ' (Hari Ini)') : ($isActive ? $dayNames[$key] : $short);
                    @endphp
                    <button 
                        type="button" 
                        class="day-tab-btn {{ $isActive ? 'active' : '' }}" 
                        data-day="{{ $key }}" 
                        data-day-name="{{ $dayNames[$key] }}"
                        data-is-today="{{ $isToday ? '1' : '0' }}"
                        role="tab" 
                        aria-selected="{{ $isActive ? 'true' : 'false' }}"
                    >
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <!-- Tombol Lihat Roster Lengkap -->
            <button type="button" class="btn-roster-lengkap" id="btnBukaRosterLengkap" aria-label="Lihat Roster Lengkap">
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
         3 KARTU JADWAL DINAMIS (DIRENDER OTOMATIS BERDASARKAN HARI)
         ══════════════════════════════════════════════════════════ -->
    <div class="jadwal-cards-container" id="jadwalCardsContainer">
        <!-- Rendered by JavaScript dynamically based on selected day -->
    </div>

</section>

<!-- ═══════════════════════════════════════════════════════════════
     MODAL 1: ROSTER LENGKAP PEMBELAJARAN MINGGUAN (POPUP)
     ═══════════════════════════════════════════════════════════════ -->
<div id="modalRosterOverlay" class="jadwal-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="rosterModalTitle" tabindex="-1" style="display: none;">
    <div class="jadwal-modal-card roster-modal-card">
        
        <!-- Header Modal -->
        <div class="jadwal-modal-header">
            <div class="modal-header-left">
                <div class="modal-badge-chip">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>Roster Mingguan TA 2026/2027</span>
                </div>
                <h3 class="jadwal-modal-title" id="rosterModalTitle">Roster Pembelajaran & Praktik Kejuruan</h3>
                <p class="jadwal-modal-subtitle">Jadwal lengkap seluruh mata pelajaran produktif TEFA, bengkel industri, dan teori umum (Senin – Sabtu)</p>
            </div>
            
            <button type="button" class="btn-modal-close" id="btnCloseRosterModal" aria-label="Tutup Modal Roster">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Filter Hari Roster & Search -->
        <div class="roster-toolbar">
            <div class="roster-filter-pills" id="rosterFilterPills">
                <button type="button" class="roster-filter-btn active" data-filter="all">Semua Hari</button>
                <button type="button" class="roster-filter-btn" data-filter="sen">Senin</button>
                <button type="button" class="roster-filter-btn" data-filter="sel">Selasa</button>
                <button type="button" class="roster-filter-btn" data-filter="rab">Rabu</button>
                <button type="button" class="roster-filter-btn" data-filter="kam">Kamis</button>
                <button type="button" class="roster-filter-btn" data-filter="jum">Jumat</button>
                <button type="button" class="roster-filter-btn" data-filter="sab">Sabtu</button>
            </div>
            <div class="roster-search-box">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" id="rosterSearchInput" placeholder="Cari mapel, guru, lab..." aria-label="Cari jadwal">
            </div>
        </div>

        <!-- Modal Body Content: Roster Timeline / Cards Grid -->
        <div class="roster-modal-body" id="rosterModalBody">
            <!-- Populated by JavaScript -->
        </div>

        <!-- Modal Footer Actions -->
        <div class="jadwal-modal-footer">
            <div class="modal-footer-info">
                <span class="pulse-indicator-dot"></span>
                <span>Sinkronisasi Kurikulum Merdeka TEFA • Terakhir diperbarui hari ini</span>
            </div>
            <div class="modal-footer-btns">
                <button type="button" class="btn-modal-secondary" onclick="printRosterSchedule()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    <span>Cetak Roster</span>
                </button>
                <button type="button" class="btn-modal-primary" onclick="downloadRosterPdf()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    <span>Unduh Roster (PDF)</span>
                </button>
            </div>
        </div>

    </div>
</div>

<!-- ═══════════════════════════════════════════════════════════════
     MODAL 2: BUKA LEMBAR LAB / JOBSHEET PRAKTIK KEJURUAN (POPUP)
     ═══════════════════════════════════════════════════════════════ -->
<div id="modalLembarLabOverlay" class="jadwal-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="labModalTitle" tabindex="-1" style="display: none;">
    <div class="jadwal-modal-card lab-modal-card">
        
        <!-- Header Modal Lab -->
        <div class="jadwal-modal-header">
            <div class="modal-header-left">
                <div class="modal-badge-chip lab-badge-chip" id="labModalBadge">
                    <span class="pulse-white-dot"></span>
                    <span id="labModalStatusText">Sesi Praktikum Aktif</span>
                </div>
                <h3 class="jadwal-modal-title" id="labModalTitle">Lembar Kerja Praktik Lab (Jobsheet)</h3>
                <p class="jadwal-modal-subtitle" id="labModalSubtitle">Panduan SOP instruksi kerja laboratorium, keselamatan kerja K3, dan lembar verifikasi praktikum</p>
            </div>
            
            <button type="button" class="btn-modal-close" id="btnCloseLabModal" aria-label="Tutup Lembar Lab">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Meta Information Cards -->
        <div class="lab-meta-grid" id="labMetaGrid">
            <div class="lab-meta-card">
                <span class="meta-label">Mata Pelajaran:</span>
                <span class="meta-value" id="labMetaMapel">Praktikum IoT & Otomasi TEFA</span>
            </div>
            <div class="lab-meta-card">
                <span class="meta-label">Ruang / Bengkel:</span>
                <span class="meta-value" id="labMetaRuang">Lab Hardware & Mekatronika</span>
            </div>
            <div class="lab-meta-card">
                <span class="meta-label">Guru Pembimbing:</span>
                <span class="meta-value" id="labMetaGuru">Ibu Ratna, M.T.</span>
            </div>
            <div class="lab-meta-card">
                <span class="meta-label">Alokasi Waktu:</span>
                <span class="meta-value" id="labMetaWaktu">4 JP (09.45 – 12.00 WIB)</span>
            </div>
        </div>

        <!-- Tab Navigation Jobsheet -->
        <div class="lab-tabs-nav" id="labTabsNav">
            <button type="button" class="lab-tab-btn active" data-tab="instruksi">1. Panduan & K3</button>
            <button type="button" class="lab-tab-btn" data-tab="alat">2. Alat & Bahan</button>
            <button type="button" class="lab-tab-btn" data-tab="langkah">3. Langkah Kerja / SOP</button>
            <button type="button" class="lab-tab-btn" data-tab="laporan">4. Lembar Bukti & Hasil</button>
        </div>

        <!-- Modal Body Content: Tab Panes -->
        <div class="lab-modal-body" id="labModalBody">
            
            <!-- PANE 1: Panduan & K3 -->
            <div class="lab-tab-pane active" id="pane-instruksi">
                <div class="lab-notice-box k3-box">
                    <div class="notice-icon-circle">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <div class="notice-content">
                        <h4 class="notice-title">Prosedur Keselamatan Kerja (K3) Laboratorium</h4>
                        <p class="notice-desc">Pastikan gelang antistatis terpasang, periksa tegangan input 3.3V/5V sebelum menghubungkan ke power supply, dilarang membawa makanan/minuman ke meja kerja praktikum.</p>
                    </div>
                </div>

                <div class="lab-content-section">
                    <h4 class="section-title">Capaian & Tujuan Pembelajaran Praktik</h4>
                    <ul class="lab-bullet-list">
                        <li>Memahami arsitektur integrasi modul mikrokontroler dengan sensor telemetri digital.</li>
                        <li>Mampu merangkai sirkuit sensor pada protoboard sesuai dengan skema wiring standar industri.</li>
                        <li>Mengonfigurasi protokol komunikasi serial, MQTT broker, dan sinkronisasi payload JSON ke dashboard TEFA.</li>
                        <li>Menumbuhkan etos kerja presisi, dokumentasi data pengujian, dan kepatuhan K3 bengkel kejuruan.</li>
                    </ul>
                </div>
            </div>

            <!-- PANE 2: Alat & Bahan -->
            <div class="lab-tab-pane" id="pane-alat">
                <div class="lab-content-section">
                    <h4 class="section-title">Checklist Kebutuhan Alat & Bahan Praktikum</h4>
                    <p class="section-subtitle">Centang setiap item yang telah Anda siapkan di meja laboratorium sebelum memulai perakitan:</p>
                    
                    <div class="checklist-container" id="labChecklistItems">
                        <label class="check-item-row">
                            <input type="checkbox" checked>
                            <span class="custom-check-box"></span>
                            <span class="check-item-text"><strong>Microcontroller Board:</strong> ESP32 NodeMCU v1 (30 Pin)</span>
                        </label>
                        <label class="check-item-row">
                            <input type="checkbox" checked>
                            <span class="custom-check-box"></span>
                            <span class="check-item-text"><strong>Sensor Telemetri:</strong> Sensor Suhu & Kelembaban DHT22 / BME280</span>
                        </label>
                        <label class="check-item-row">
                            <input type="checkbox">
                            <span class="custom-check-box"></span>
                            <span class="check-item-text"><strong>Komponen Pasif:</strong> Resistor 10k Ohm (Pull-up) & LED Indikator 5mm</span>
                        </label>
                        <label class="check-item-row">
                            <input type="checkbox">
                            <span class="custom-check-box"></span>
                            <span class="check-item-text"><strong>Wiring & Breadboard:</strong> Breadboard 830 Titik & Set Kabel Jumper DuPont Male-to-Male</span>
                        </label>
                        <label class="check-item-row">
                            <input type="checkbox">
                            <span class="custom-check-box"></span>
                            <span class="check-item-text"><strong>Perangkat Lunak:</strong> Arduino IDE v2 / PlatformIO & Driver CP2102/CH340</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- PANE 3: Langkah Kerja / SOP -->
            <div class="lab-tab-pane" id="pane-langkah">
                <div class="lab-steps-list">
                    <div class="lab-step-item">
                        <div class="step-num-badge">1</div>
                        <div class="step-content">
                            <h5 class="step-title">Perakitan Skema Rangkaian (Wiring Hardware)</h5>
                            <p class="step-desc">Hubungkan Pin <strong>VCC</strong> sensor ke <strong>3V3</strong> ESP32, <strong>GND</strong> ke <strong>GND</strong>, dan Pin <strong>Data Out</strong> sensor ke GPIO <strong>D22</strong> pada breadboard. Pasang resistor pull-up 10k antara VCC dan pin Data.</p>
                        </div>
                    </div>
                    <div class="lab-step-item">
                        <div class="step-num-badge">2</div>
                        <div class="step-content">
                            <h5 class="step-title">Konfigurasi Library & Kredensial WiFi TEFA</h5>
                            <p class="step-desc">Buka Arduino IDE, sertakan library <code>WiFi.h</code>, <code>PubSubClient.h</code>, dan <code>DHT.h</code>. Masukkan SSID <code>TEFA-LAB-IOT</code> dan IP broker MQTT <code>192.168.10.250</code>.</p>
                        </div>
                    </div>
                    <div class="lab-step-item">
                        <div class="step-num-badge">3</div>
                        <div class="step-content">
                            <h5 class="step-title">Pengujian Serial Monitor & Transmisi Data</h5>
                            <p class="step-desc">Upload sketch firmware ke ESP32 dengan baudrate <strong>115200</strong>. Amati pembacaan suhu/kelembaban pada serial monitor dan pastikan payload JSON berhasil dipublish ke topic <code>tefa/rpl/sensor/telemetry</code>.</p>
                        </div>
                    </div>
                    <div class="lab-step-item">
                        <div class="step-num-badge">4</div>
                        <div class="step-content">
                            <h5 class="step-title">Verifikasi pada Dashboard Monitoring TEFA</h5>
                            <p class="step-desc">Buka portal monitoring TEFA Hub, pastikan device status menyala hijau (Online) dan grafik pembacaan real-time terupdate setiap interval 3 detik.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 4: Lembar Bukti & Hasil -->
            <div class="lab-tab-pane" id="pane-laporan">
                <div class="lab-form-wrapper">
                    <div class="lab-form-group">
                        <label for="labHasilPengamatan" class="lab-field-label">Ringkasan Hasil Praktikum & Catatan Pengujian</label>
                        <textarea id="labHasilPengamatan" class="lab-textarea" rows="4" placeholder="Contoh: Rangkaian berhasil dirakit tanpa short circuit. Nilai suhu terbaca stabil di 28.4°C dan kelembaban 65% RH. Transmisi ke MQTT broker berhasil 100% tanpa paket drop..."></textarea>
                    </div>

                    <div class="lab-form-group">
                        <label class="lab-field-label">Tangkapan Layar / Foto Bukti Rangkaian Lab</label>
                        <div class="lab-upload-area" onclick="document.getElementById('labBuktiFile').click()">
                            <input type="file" id="labBuktiFile" accept="image/*,.pdf" style="display:none;" onchange="handleLabProofFile(this)">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                            <span class="upload-primary-text" id="labUploadText">Klik untuk unggah foto hasil praktik atau screenshot serial monitor</span>
                            <span class="upload-sub-text">Format didukung: JPG, PNG, WEBP, PDF (Maks. 10MB)</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal Footer Actions -->
        <div class="jadwal-modal-footer">
            <div class="modal-footer-info">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>Format Jobsheet Standar LSP-P1 & Industri TEFA Hub</span>
            </div>
            <div class="modal-footer-btns">
                <button type="button" class="btn-modal-secondary" onclick="downloadJobsheetPdf()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    <span>Unduh Jobsheet (PDF)</span>
                </button>
                <button type="button" class="btn-modal-primary" onclick="submitLaporanLab()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    <span>Kirim Laporan Praktik</span>
                </button>
            </div>
        </div>

    </div>
</div>

<!-- ═══════════════════════════════════════════════════════════════
     TOAST NOTIFIKASI INTERAKTIF
     ═══════════════════════════════════════════════════════════════ -->
<div id="jadwalToastNotification" class="jadwal-toast-notification" role="status" aria-live="polite" style="display: none;">
    <div class="toast-icon-wrapper" id="jadwalToastIcon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
    </div>
    <span class="toast-text-msg" id="jadwalToastMsg">Notifikasi aksi berhasil dijalankan</span>
</div>

<!-- ═══════════════════════════════════════════════════════════════
     STYLES KHUSUS MODAL, CARDS DINAMIS, DAN INTERAKSI JADWAL
     ═══════════════════════════════════════════════════════════════ -->
<style>
/* Modal Overlay Styling */
.jadwal-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    box-sizing: border-box;
    opacity: 0;
    transition: opacity 0.25s ease-out;
}

.jadwal-modal-overlay.active {
    opacity: 1;
}

.jadwal-modal-card {
    background: #FFFFFF;
    border-radius: 20px;
    box-shadow: 0 20px 45px -10px rgba(15, 23, 42, 0.25), 0 0 0 1px rgba(226, 232, 240, 0.8);
    width: 100%;
    max-width: 860px;
    max-height: 88vh;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transform: translateY(16px) scale(0.98);
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}

.jadwal-modal-overlay.active .jadwal-modal-card {
    transform: translateY(0) scale(1);
}

.lab-modal-card {
    max-width: 780px;
}

/* Modal Header */
.jadwal-modal-header {
    padding: 22px 26px 16px;
    border-bottom: 1px solid #E2E8F0;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 16px;
    background: #FAFCFF;
}

.modal-header-left {
    flex: 1;
    min-width: 0;
}

.modal-badge-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background-color: #EEF2FF;
    color: #004AC6;
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 11.5px;
    font-weight: 700;
    margin-bottom: 6px;
}

.lab-badge-chip {
    background-color: #004AC6;
    color: #FFFFFF;
}

.jadwal-modal-title {
    font-size: 18px;
    font-weight: 800;
    color: #0F172A;
    margin: 0 0 4px 0;
    letter-spacing: -0.015em;
}

.jadwal-modal-subtitle {
    font-size: 12.5px;
    color: #64748B;
    margin: 0;
    line-height: 1.4;
}

.btn-modal-close {
    background: #F1F5F9;
    border: none;
    border-radius: 50%;
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #475569;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.btn-modal-close:hover {
    background: #E2E8F0;
    color: #0F172A;
    transform: rotate(90deg);
}

/* Roster Toolbar */
.roster-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 26px;
    background: #FFFFFF;
    border-bottom: 1px solid #F1F5F9;
    flex-wrap: wrap;
}

.roster-filter-pills {
    display: flex;
    align-items: center;
    gap: 6px;
    overflow-x: auto;
    scrollbar-width: none;
}
.roster-filter-pills::-webkit-scrollbar { display: none; }

.roster-filter-btn {
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    color: #64748B;
    font-size: 12px;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.roster-filter-btn:hover {
    color: #0F172A;
    background: #EEF2FF;
}

.roster-filter-btn.active {
    background: #004AC6;
    color: #FFFFFF;
    border-color: #004AC6;
    font-weight: 700;
}

.roster-search-box {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    border-radius: 999px;
    padding: 5px 14px;
    min-width: 220px;
}

.roster-search-box input {
    border: none;
    background: transparent;
    font-size: 12px;
    color: #0F172A;
    outline: none;
    width: 100%;
}

/* Roster Body Content */
.roster-modal-body {
    padding: 18px 26px;
    overflow-y: auto;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 16px;
    max-height: 52vh;
}

.roster-day-group {
    background: #FAFCFF;
    border: 1px solid #E2E8F0;
    border-radius: 14px;
    padding: 14px 16px;
}

.roster-day-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    padding-bottom: 8px;
    border-bottom: 1px solid #EEF2FF;
}

.roster-day-title {
    font-size: 14px;
    font-weight: 800;
    color: #004AC6;
    display: flex;
    align-items: center;
    gap: 6px;
}

.roster-day-badge-today {
    background: #DCFCE7;
    color: #007D57;
    font-size: 10.5px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 999px;
}

.roster-items-table {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.roster-row-item {
    display: grid;
    grid-template-columns: 130px 1.4fr 1.2fr 1fr 90px;
    align-items: center;
    gap: 12px;
    background: #FFFFFF;
    border: 1px solid #EDF2F7;
    border-radius: 10px;
    padding: 8px 12px;
    font-size: 12px;
    transition: background 0.15s ease;
}

.roster-row-item:hover {
    background: #F8FAFC;
}

.roster-time-col {
    font-weight: 700;
    color: #0F172A;
}

.roster-subject-col {
    font-weight: 700;
    color: #004AC6;
}

.roster-room-col {
    color: #475569;
    display: flex;
    align-items: center;
    gap: 6px;
}

.roster-teacher-col {
    color: #64748B;
}

.roster-type-pill {
    display: inline-block;
    text-align: center;
    font-size: 10.5px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 6px;
}

.type-praktik { background: #EEF2FF; color: #004AC6; }
.type-teori { background: #F1F5F9; color: #475569; }
.type-tefa { background: #FEF3C7; color: #92400E; }

/* Lab Modal Styles */
.lab-meta-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    padding: 14px 26px;
    background: #F8FAFC;
    border-bottom: 1px solid #E2E8F0;
}

.lab-meta-card {
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-radius: 10px;
    padding: 8px 12px;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.meta-label {
    font-size: 10px;
    font-weight: 600;
    color: #64748B;
    text-transform: uppercase;
    letter-spacing: 0.03em;
}

.meta-value {
    font-size: 12px;
    font-weight: 700;
    color: #0F172A;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.lab-tabs-nav {
    display: flex;
    gap: 8px;
    padding: 12px 26px 0;
    background: #FFFFFF;
    border-bottom: 1px solid #E2E8F0;
    overflow-x: auto;
    scrollbar-width: none;
}
.lab-tabs-nav::-webkit-scrollbar { display: none; }

.lab-tab-btn {
    background: transparent;
    border: none;
    border-bottom: 2px solid transparent;
    color: #64748B;
    font-size: 13px;
    font-weight: 700;
    padding: 8px 14px 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.lab-tab-btn:hover {
    color: #004AC6;
}

.lab-tab-btn.active {
    color: #004AC6;
    border-bottom-color: #004AC6;
}

.lab-modal-body {
    padding: 20px 26px;
    overflow-y: auto;
    flex: 1;
    max-height: 48vh;
}

.lab-tab-pane {
    display: none;
    flex-direction: column;
    gap: 16px;
}

.lab-tab-pane.active {
    display: flex;
}

.lab-notice-box {
    background: #FEF3C7;
    border: 1px solid #FCD34D;
    border-radius: 12px;
    padding: 12px 16px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.notice-icon-circle {
    flex-shrink: 0;
    margin-top: 2px;
}

.notice-title {
    font-size: 13px;
    font-weight: 800;
    color: #92400E;
    margin: 0 0 3px 0;
}

.notice-desc {
    font-size: 12px;
    color: #78350F;
    margin: 0;
    line-height: 1.45;
}

.lab-content-section .section-title {
    font-size: 14px;
    font-weight: 800;
    color: #0F172A;
    margin: 0 0 8px 0;
}

.lab-content-section .section-subtitle {
    font-size: 12px;
    color: #64748B;
    margin: 0 0 12px 0;
}

.lab-bullet-list {
    margin: 0;
    padding-left: 20px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 12.5px;
    color: #334155;
    line-height: 1.5;
}

.checklist-container {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.check-item-row {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    border-radius: 10px;
    padding: 10px 14px;
    cursor: pointer;
    transition: background 0.15s ease;
}

.check-item-row:hover {
    background: #EEF2FF;
}

.check-item-row input[type="checkbox"] {
    width: 17px;
    height: 17px;
    accent-color: #004AC6;
    cursor: pointer;
}

.check-item-text {
    font-size: 12.5px;
    color: #1E293B;
}

.lab-steps-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.lab-step-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    border-radius: 12px;
    padding: 12px 16px;
}

.step-num-badge {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: #004AC6;
    color: #FFFFFF;
    font-size: 12.5px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.step-title {
    font-size: 13.5px;
    font-weight: 700;
    color: #0F172A;
    margin: 0 0 4px 0;
}

.step-desc {
    font-size: 12px;
    color: #475569;
    margin: 0;
    line-height: 1.45;
}

.step-desc code {
    background: #EEF2FF;
    color: #004AC6;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 11.5px;
    font-family: monospace;
}

.lab-form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 14px;
}

.lab-field-label {
    font-size: 12.5px;
    font-weight: 700;
    color: #0F172A;
}

.lab-textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #CBD5E1;
    border-radius: 10px;
    padding: 10px 14px;
    font-family: var(--font-main, sans-serif);
    font-size: 12.5px;
    color: #0F172A;
    outline: none;
    resize: vertical;
    transition: border-color 0.2s ease;
}

.lab-textarea:focus {
    border-color: #004AC6;
    box-shadow: 0 0 0 3px rgba(0, 74, 198, 0.12);
}

.lab-upload-area {
    border: 2px dashed #93C5FD;
    background: #EFF6FF;
    border-radius: 12px;
    padding: 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
    text-align: center;
}

.lab-upload-area:hover {
    background: #DBEAFE;
    border-color: #3B82F6;
}

.upload-primary-text {
    font-size: 12.5px;
    font-weight: 700;
    color: #1D4ED8;
}

.upload-sub-text {
    font-size: 11px;
    color: #60A5FA;
}

/* Modal Footer */
.jadwal-modal-footer {
    padding: 14px 26px;
    border-top: 1px solid #E2E8F0;
    background: #FAFCFF;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    flex-wrap: wrap;
}

.modal-footer-info {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 11.5px;
    color: #64748B;
    font-weight: 500;
}

.pulse-indicator-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #10B981;
    animation: pulseGlow 2s infinite;
}

@keyframes pulseGlow {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.4; transform: scale(0.85); }
}

.modal-footer-btns {
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-modal-secondary {
    background: #F1F5F9;
    color: #334155;
    border: 1px solid #CBD5E1;
    border-radius: 999px;
    padding: 8px 16px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
}

.btn-modal-secondary:hover {
    background: #E2E8F0;
    color: #0F172A;
}

.btn-modal-primary {
    background: #004AC6;
    color: #FFFFFF;
    border: none;
    border-radius: 999px;
    padding: 8px 20px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    box-shadow: 0 4px 10px rgba(0, 74, 198, 0.25);
}

.btn-modal-primary:hover {
    background: #003799;
    transform: translateY(-1px);
    box-shadow: 0 6px 14px rgba(0, 74, 198, 0.35);
}

/* Toast Notification */
.jadwal-toast-notification {
    position: fixed;
    bottom: 24px;
    right: 24px;
    background: #0F172A;
    color: #FFFFFF;
    padding: 12px 20px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    font-weight: 600;
    z-index: 999999;
    transform: translateY(20px);
    opacity: 0;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.jadwal-toast-notification.show {
    transform: translateY(0);
    opacity: 1;
}

.toast-icon-wrapper {
    color: #10B981;
    display: flex;
    align-items: center;
}

/* Responsive adjustments for Roster & Lab Modals */
@media (max-width: 768px) {
    .roster-row-item {
        grid-template-columns: 1fr;
        gap: 6px;
    }
    .lab-meta-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .jadwal-modal-footer {
        flex-direction: column;
        align-items: stretch;
    }
    .modal-footer-btns {
        justify-content: flex-end;
    }
}
</style>

<!-- ═══════════════════════════════════════════════════════════════
     JAVASCRIPT: DINAMISASI HARI LOGIN, ROSTER LENGKAP & LEMBAR LAB
     ═══════════════════════════════════════════════════════════════ -->
<script>
    // Master Data Roster & Jadwal Harian SMK TEFA
    const JADWAL_MASTER_DATA = {
        sen: {
            dayName: 'Senin',
            cards: [
                {
                    type: 'selesai',
                    badgeLabel: 'Selesai',
                    time: '07.15 – 09.30 WIB',
                    title: 'Upacara & Dasar Pemrograman<br>Berorientasi Objek (OOP)',
                    room: 'Lab Komputer 1 (Lab Dasar RPL)',
                    teacher: 'Bpk. Hendra, S.Kom',
                    roomIcon: "{{ asset('assets/lab.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Presensi Tervalidasi',
                    footerValue: 'Hadir (07.10)',
                    statusClass: 'status-hadir',
                    hasLabBtn: false
                },
                {
                    type: 'berlangsung',
                    badgeLabel: 'Sedang Berlangsung',
                    time: '09.45 – 12.00 WIB',
                    title: 'Praktikum Database Relasional<br>& MySQL Workbench',
                    room: 'Lab Komputer 3 (Lab RPL Lanjut)',
                    teacher: 'Ibu Diana, M.Kom',
                    roomIcon: "{{ asset('assets/la.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Modul 2: Schema & Query',
                    footerValue: 'Buka Lembar Lab',
                    statusClass: '',
                    hasLabBtn: true,
                    labData: {
                        modul: 'Modul Praktik 02: Normalisasi Basis Data & Trigger Database MySQL TEFA',
                        mapel: 'Praktikum Database Relasional',
                        ruang: 'Lab Komputer 3 (Lab RPL)',
                        guru: 'Ibu Diana, M.Kom',
                        waktu: '4 JP (09.45 – 12.00 WIB)',
                        tujuan: [
                            'Menerapkan perancangan relasi entity-relationship diagram (ERD) standar 3NF.',
                            'Membuat script DDL & DML untuk automated stored procedure.',
                            'Menguji performa query index untuk aplikasi kasir point-of-sale BLUD.',
                            'Mendokumentasikan log query dan script migrasi data.'
                        ],
                        k3: 'Pastikan perangkat komputer dimatikan melalui prosedur shutdown resmi setelah praktikum selesai, rapikan kabel LAN dan kursi kerja.',
                        alat: [
                            'MySQL Server v8.0 & MySQL Workbench',
                            'DBeaver Community Edition',
                            'Database Sample: tefa_pos_production.sql',
                            'Lembar Catatan Query Execution Plan'
                        ],
                        steps: [
                            { title: 'Inisialisasi Database ERD', desc: 'Buka MySQL Workbench dan load file skema <code>tefa_schema_v2.sql</code>.' },
                            { title: 'Pembuatan Trigger Otomatisasi Stok', desc: 'Tulis trigger <code>tr_update_stok_blud</code> untuk sinkronisasi inventory setiap ada transaksi baru.' },
                            { title: 'Uji Stress & Indexing Query', desc: 'Jalankan query <code>EXPLAIN ANALYZE</code> pada tabel transaksi dengan 10.000 record.' }
                        ]
                    }
                },
                {
                    type: 'mendatang',
                    badgeLabel: 'Akan Datang',
                    time: '13.00 – 15.15 WIB',
                    title: 'Bahasa Inggris Kejuruan &<br>Technical Presentation',
                    room: 'Ruang Teori 10 & Language Studio',
                    teacher: 'Bpk. Arya, S.Pd',
                    roomIcon: "{{ asset('assets/mark.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Handout Presentasi',
                    footerValue: 'Siap Dipelajari',
                    statusClass: 'status-siap',
                    hasLabBtn: false
                }
            ]
        },
        sel: {
            dayName: 'Selasa',
            cards: [
                {
                    type: 'selesai',
                    badgeLabel: 'Selesai',
                    time: '07.15 – 09.30 WIB',
                    title: 'Pemodelan Perangkat Lunak<br>& Agile Scrum Methodology',
                    room: 'Lab Komputer 2 (Lab Analis)',
                    teacher: 'Bpk. Hendra, S.Kom',
                    roomIcon: "{{ asset('assets/lab.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Presensi Tervalidasi',
                    footerValue: 'Hadir (07.14)',
                    statusClass: 'status-hadir',
                    hasLabBtn: false
                },
                {
                    type: 'berlangsung',
                    badgeLabel: 'Sedang Berlangsung',
                    time: '09.45 – 12.00 WIB',
                    title: 'Praktikum UI/UX Design &<br>High-Fidelity Prototyping Figma',
                    room: 'Lab Multimedia & Studio Desain',
                    teacher: 'Ibu Maya, S.Ds',
                    roomIcon: "{{ asset('assets/la.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Design Sprint Modul 3',
                    footerValue: 'Buka Lembar Lab',
                    statusClass: '',
                    hasLabBtn: true,
                    labData: {
                        modul: 'Modul Praktik 03: Desain Design System & Interaksi Micro-Animation UI TEFA',
                        mapel: 'Praktikum UI/UX Design & Prototyping',
                        ruang: 'Lab Multimedia & Studio Desain',
                        guru: 'Ibu Maya, S.Ds',
                        waktu: '4 JP (09.45 – 12.00 WIB)',
                        tujuan: [
                            'Menyusun komponen UI reusable berbasis auto-layout dan variants Figma.',
                            'Menerapkan skema warna HSL & kontras rasio WCAG AAA untuk aksesibilitas.',
                            'Membangun interactive prototype flows untuk validasi ke pengguna.',
                            'Melakukan export asset SVG dan design token untuk tim developer.'
                        ],
                        k3: 'Atur pencahayaan monitor sesuai standar ergonomis ruang desain, lakukan peregangan mata setiap 30 menit.',
                        alat: [
                            'Figma Desktop App (Akun Edukasi TEFA)',
                            'Figma Token Studio Plugin',
                            'Design System Starter Kit v2.4',
                            'Tablet Grafis Pen Display (Wacom)'
                        ],
                        steps: [
                            { title: 'Setup Color Palette & Typography Tokens', desc: 'Tentukan token semantik <code>primary</code>, <code>surface</code>, dan <code>neutral</code>.' },
                            { title: 'Penyusunan Interactive Form & Cards', desc: 'Rancang komponen input field, modal popup, dan pill bar dengan micro-interaction.' },
                            { title: 'Prototype Flows & User Testing', desc: 'Hubungkan frame dan jalankan preview prototyping pada mobile viewport.' }
                        ]
                    }
                },
                {
                    type: 'mendatang',
                    badgeLabel: 'Akan Datang',
                    time: '13.00 – 15.15 WIB',
                    title: 'Technopreneurship Vokasi &<br>Digital Marketing Produk TEFA',
                    room: 'Ruang Galeri TEFA & Live Studio',
                    teacher: 'Bpk. Wahyu & Tim DUDI',
                    roomIcon: "{{ asset('assets/mark.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Materi Kampanye BLUD',
                    footerValue: 'Siap Dipelajari',
                    statusClass: 'status-siap',
                    hasLabBtn: false
                }
            ]
        },
        rab: {
            dayName: 'Rabu',
            cards: [
                {
                    type: 'selesai',
                    badgeLabel: 'Selesai',
                    time: '07.15 – 09.30 WIB',
                    title: 'Pemrograman Web<br>Lanjut (Laravel & API)',
                    room: 'Lab Komputer 3 (Lab RPL)',
                    teacher: 'Bpk. Hendra, S.Kom',
                    roomIcon: "{{ asset('assets/lab.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Presensi Tervalidasi',
                    footerValue: 'Hadir (07.12)',
                    statusClass: 'status-hadir',
                    hasLabBtn: false
                },
                {
                    type: 'berlangsung',
                    badgeLabel: 'Sedang Berlangsung',
                    time: '09.45 – 12.00 WIB',
                    title: 'Praktikum IoT & Otomasi<br>TEFA Industri',
                    room: 'Lab Hardware & Mekatronika',
                    teacher: 'Ibu Ratna, M.T.',
                    roomIcon: "{{ asset('assets/la.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Modul 4 Aktif',
                    footerValue: 'Buka Lembar Lab',
                    statusClass: '',
                    hasLabBtn: true,
                    labData: {
                        modul: 'Modul Praktik 04: Pengkabelan & Transmisi Telemetri ESP32 IoT ke TEFA MQTT Broker',
                        mapel: 'Praktikum IoT & Otomasi TEFA',
                        ruang: 'Lab Hardware & Mekatronika',
                        guru: 'Ibu Ratna, M.T.',
                        waktu: '4 JP (09.45 – 12.00 WIB)',
                        tujuan: [
                            'Memahami arsitektur integrasi modul mikrokontroler dengan sensor telemetri digital.',
                            'Mampu merangkai sirkuit sensor pada protoboard sesuai dengan skema wiring standar industri.',
                            'Mengonfigurasi protokol komunikasi serial, MQTT broker, dan sinkronisasi payload JSON ke dashboard TEFA.',
                            'Menumbuhkan etos kerja presisi, dokumentasi data pengujian, dan kepatuhan K3 bengkel kejuruan.'
                        ],
                        k3: 'Pastikan gelang antistatis terpasang, periksa tegangan input 3.3V/5V sebelum menghubungkan ke power supply, dilarang membawa makanan/minuman ke meja kerja praktikum.',
                        alat: [
                            'Microcontroller: ESP32 NodeMCU v1 (30 Pin)',
                            'Sensor Telemetri: Suhu & Kelembaban DHT22 / BME280',
                            'Komponen Pasif: Resistor 10k Ohm & Breadboard 830 Titik',
                            'Set Kabel Jumper DuPont & Kabel USB Type-C Data'
                        ],
                        steps: [
                            { title: 'Perakitan Skema Rangkaian (Wiring Hardware)', desc: 'Hubungkan Pin <strong>VCC</strong> sensor ke <strong>3V3</strong> ESP32, <strong>GND</strong> ke <strong>GND</strong>, dan Pin <strong>Data Out</strong> ke GPIO <strong>D22</strong>.' },
                            { title: 'Konfigurasi Library & Kredensial WiFi', desc: 'Buka Arduino IDE, sertakan <code>WiFi.h</code>, <code>PubSubClient.h</code>, dan <code>DHT.h</code>.' },
                            { title: 'Pengujian Serial Monitor & Ingestion Data', desc: 'Upload sketch dengan baudrate <strong>115200</strong> dan monitor topic <code>tefa/rpl/sensor/telemetry</code>.' }
                        ]
                    }
                },
                {
                    type: 'mendatang',
                    badgeLabel: 'Akan Datang',
                    time: '13.00 – 15.15 WIB',
                    title: 'Technopreneurship &<br>Manajemen BLUD',
                    room: 'Ruang Teori 12 & Galeri Produk',
                    teacher: 'Kurator BLUD & Tim DUDI',
                    roomIcon: "{{ asset('assets/mark.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Materi Pengayaan',
                    footerValue: 'Siap Dipelajari',
                    statusClass: 'status-siap',
                    hasLabBtn: false
                }
            ]
        },
        kam: {
            dayName: 'Kamis',
            cards: [
                {
                    type: 'selesai',
                    badgeLabel: 'Selesai',
                    time: '07.15 – 09.30 WIB',
                    title: 'Cloud Infrastructure &<br>Server Deployment TEFA',
                    room: 'Lab Jaringan & Cloud Computing',
                    teacher: 'Bpk. Fikri, M.T.',
                    roomIcon: "{{ asset('assets/lab.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Presensi Tervalidasi',
                    footerValue: 'Hadir (07.15)',
                    statusClass: 'status-hadir',
                    hasLabBtn: false
                },
                {
                    type: 'berlangsung',
                    badgeLabel: 'Sedang Berlangsung',
                    time: '09.45 – 12.00 WIB',
                    title: 'Praktikum Backend API &<br>Microservices Architecture',
                    room: 'Lab Komputer 3 (Lab RPL)',
                    teacher: 'Bpk. Hendra, S.Kom',
                    roomIcon: "{{ asset('assets/la.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Modul 5: RESTful API Auth',
                    footerValue: 'Buka Lembar Lab',
                    statusClass: '',
                    hasLabBtn: true,
                    labData: {
                        modul: 'Modul Praktik 05: Implementasi REST API Autentikasi JWT & Rate Limiting Laravel',
                        mapel: 'Praktikum Backend API & Microservices',
                        ruang: 'Lab Komputer 3 (Lab RPL)',
                        guru: 'Bpk. Hendra, S.Kom',
                        waktu: '4 JP (09.45 – 12.00 WIB)',
                        tujuan: [
                            'Membangun endpoint otentikasi stateless menggunakan Sanctum / JWT tokens.',
                            'Menerapkan middleware rate limiter untuk pencegahan brute-force API.',
                            'Membuat unit test otomatis endpoint controller menggunakan Pest / PHPUnit.',
                            'Mendokumentasikan OpenAPI / Swagger specification.'
                        ],
                        k3: 'Hindari commit password/kunci API ke repository publik Git, gunakan environment variable .env aman.',
                        alat: [
                            'Postman / Insomnia REST Client',
                            'Visual Studio Code & PHP 8.3 / Composer',
                            'Docker Desktop & Redis In-Memory Cache',
                            'Git Version Control'
                        ],
                        steps: [
                            { title: 'Setup Auth Controller & Token Creation', desc: 'Generate controller autentikasi dan return token bearer yang di-hash.' },
                            { title: 'Konfigurasi Rate Limiter Middleware', desc: 'Atur rate limiting 20 requests per minute untuk public auth endpoints.' },
                            { title: 'Eksekusi Unit Test', desc: 'Jalankan <code>php artisan test --filter=AuthTest</code> untuk validasi kode respon.' }
                        ]
                    }
                },
                {
                    type: 'mendatang',
                    badgeLabel: 'Akan Datang',
                    time: '13.00 – 15.15 WIB',
                    title: 'Manajemen Proyek Perangkat Lunak<br>& Dokumentasi Teknis',
                    room: 'Ruang Teori 11',
                    teacher: 'Ibu Ratna, M.T.',
                    roomIcon: "{{ asset('assets/mark.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Dokumen SRS Proyek',
                    footerValue: 'Siap Dipelajari',
                    statusClass: 'status-siap',
                    hasLabBtn: false
                }
            ]
        },
        jum: {
            dayName: 'Jumat',
            cards: [
                {
                    type: 'selesai',
                    badgeLabel: 'Selesai',
                    time: '07.15 – 09.00 WIB',
                    title: 'Literasi Digital Kejuruan &<br>Bimbingan Karir BKK',
                    room: 'Aula Vokasi & Career Hub',
                    teacher: 'Tim BKK & Mitra Industri',
                    roomIcon: "{{ asset('assets/lab.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Presensi Tervalidasi',
                    footerValue: 'Hadir (07.08)',
                    statusClass: 'status-hadir',
                    hasLabBtn: false
                },
                {
                    type: 'berlangsung',
                    badgeLabel: 'Sedang Berlangsung',
                    time: '09.15 – 11.30 WIB',
                    title: 'Praktikum Quality Assurance &<br>Automated Software Testing',
                    room: 'Lab Komputer 1 (Lab Software)',
                    teacher: 'Ibu Diana, M.Kom',
                    roomIcon: "{{ asset('assets/la.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Modul QA Test Suite',
                    footerValue: 'Buka Lembar Lab',
                    statusClass: '',
                    hasLabBtn: true,
                    labData: {
                        modul: 'Modul Praktik 06: End-to-End Test Automation & Continuous Integration TEFA',
                        mapel: 'Praktikum Quality Assurance & Testing',
                        ruang: 'Lab Komputer 1',
                        guru: 'Ibu Diana, M.Kom',
                        waktu: '3 JP (09.15 – 11.30 WIB)',
                        tujuan: [
                            'Menulis test case fungsional skenario registrasi, login, dan transaksi.',
                            'Menjalankan automated UI testing menggunakan Playwright / Cypress.',
                            'Menganalisis coverage report dan mendeteksi bug regresi sistem.',
                            'Menerbitkan laporan Quality Assurance (QA Sign-off Report).'
                        ],
                        k3: 'Jaga kebersihan workstation sebelum ibadah sholat Jumat, matikan perlengkapan elektronik lab.',
                        alat: [
                            'Node.js v20 LTS & Playwright Test Framework',
                            'GitHub Actions Local CI Simulator',
                            'SonarQube Code Quality Analyzer',
                            'Template Dokumen Test Matrix'
                        ],
                        steps: [
                            { title: 'Penulisan Test Script Playwright', desc: 'Rancang test script <code>auth.spec.js</code> untuk simulasi login form.' },
                            { title: 'Eksekusi Headless Browser Test', desc: 'Jalankan <code>npx playwright test</code> dan amati rekaman video failure.' },
                            { title: 'Generasi Report HTML QA', desc: 'Buka report ringkasan test status dan kirim ke portal TEFA.' }
                        ]
                    }
                },
                {
                    type: 'mendatang',
                    badgeLabel: 'Akan Datang',
                    time: '13.15 – 15.00 WIB',
                    title: 'Proyek Kreatif & Kewirausahaan<br>(PKK) TEFA Production',
                    room: 'Bengkel Inovasi TEFA & Galeri',
                    teacher: 'Tim Pembina TEFA',
                    roomIcon: "{{ asset('assets/mark.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Portofolio Produk',
                    footerValue: 'Siap Dipelajari',
                    statusClass: 'status-siap',
                    hasLabBtn: false
                }
            ]
        },
        sab: {
            dayName: 'Sabtu',
            cards: [
                {
                    type: 'selesai',
                    badgeLabel: 'Selesai',
                    time: '07.30 – 09.30 WIB',
                    title: 'Mentoring Industri & Review<br>Portofolio DUDI Rekanan',
                    room: 'Studio TEFA Hub & Meeting Room',
                    teacher: 'Mentor Industri PT Telkom & DUDI',
                    roomIcon: "{{ asset('assets/lab.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Presensi Tervalidasi',
                    footerValue: 'Hadir (07.25)',
                    statusClass: 'status-hadir',
                    hasLabBtn: false
                },
                {
                    type: 'berlangsung',
                    badgeLabel: 'Sedang Berlangsung',
                    time: '09.45 – 12.00 WIB',
                    title: 'Sesi Bengkel Praktik Mandiri &<br>Inkubasi Produk BLUD',
                    room: 'Lab TEFA Software House & IoT',
                    teacher: 'Mentor TEFA Hub & Guru Pembimbing',
                    roomIcon: "{{ asset('assets/la.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Sprint Produksi 6',
                    footerValue: 'Buka Lembar Lab',
                    statusClass: '',
                    hasLabBtn: true,
                    labData: {
                        modul: 'Modul Praktik 07: Finalisasi Sprint & Packaging Produk Digital BLUD Siap Rilis',
                        mapel: 'Inkubasi Produk BLUD & Bengkel Mandiri',
                        ruang: 'Lab TEFA Software House',
                        guru: 'Mentor TEFA Hub & Guru Pembimbing',
                        waktu: '4 JP (09.45 – 12.00 WIB)',
                        tujuan: [
                            'Menuntaskan perbaikan backlog dan bug reporting dari kurator BLUD.',
                            'Menyiapkan asset dokumentasi user guide dan media promosi visual.',
                            'Menerbitkan rilis versi produksi ke galeri publik katalog TEFA Hub.',
                            'Melakukan kalkulasi margin omzet dan kesiapan uji kompetensi LSP-P1.'
                        ],
                        k3: 'Patuhi protokol keamanan data dan kerahasiaan source code proyek teaching factory.',
                        alat: [
                            'Laptop Siswa & Repo TEFA Hub Git',
                            'Perangkat Uji Demo Fisik / Hardware Kit',
                            'Template Rilis Produk & Form Kurasi BLUD',
                            'Akses Server Staging & Production'
                        ],
                        steps: [
                            { title: 'Sinkronisasi Git Staging & Resolusi Konflik', desc: 'Tarik branch terbaru dan jalankan build production bundle.' },
                            { title: 'Pengujian UAT Bersama Tim Kurator', desc: 'Demonstrasikan fitur aplikasi dan lakukan approval checklist.' },
                            { title: 'Submit Publikasi ke Menu BLUD Siswa', desc: 'Unggah data produk ke katalog publik TEFA Hub untuk diverifikasi.' }
                        ]
                    }
                },
                {
                    type: 'mendatang',
                    badgeLabel: 'Akan Datang',
                    time: '13.00 – 14.30 WIB',
                    title: 'Evaluasi Kinerja Mingguan &<br>Sinkronisasi Progress TEFA',
                    room: 'Ruang Diskusi TEFA & Coworking',
                    teacher: 'Tim Wali & Guru Pembimbing',
                    roomIcon: "{{ asset('assets/mark.png') }}",
                    teacherIcon: "{{ asset('assets/man.png') }}",
                    footerLabel: 'Rapor Progress Mingguan',
                    footerValue: 'Siap Dipelajari',
                    statusClass: 'status-siap',
                    hasLabBtn: false
                }
            ]
        }
    };

    // State Aplikasi
    let currentSelectedDay = '{{ $activeKey }}';
    let currentActiveLabData = JADWAL_MASTER_DATA[currentSelectedDay]?.cards?.find(c => c.hasLabBtn)?.labData || null;

    // Inisialisasi Deteksi Hari & Render
    document.addEventListener('DOMContentLoaded', function() {
        initDayDetection();
        renderScheduleCards(currentSelectedDay);
        initModalEvents();
    });

    // Deteksi Hari Real-time User Login
    function initDayDetection() {
        const clientDayIndex = new Date().getDay(); // 0 (Minggu) s/d 6 (Sabtu)
        const dayKeys = ['min', 'sen', 'sel', 'rab', 'kam', 'jum', 'sab'];
        const realTodayKey = dayKeys[clientDayIndex];

        const dayTabs = document.querySelectorAll('#dayTabsGroup .day-tab-btn');
        dayTabs.forEach(tab => {
            const dayKey = tab.getAttribute('data-day');
            const dayName = tab.getAttribute('data-day-name');
            const isToday = (dayKey === realTodayKey) || (realTodayKey === 'min' && dayKey === 'sen');

            tab.setAttribute('data-is-today', isToday ? '1' : '0');

            // Format label awal
            if (isToday) {
                tab.innerText = `${dayName} (Hari Ini)`;
            } else {
                tab.innerText = tab.getAttribute('data-day').toUpperCase();
            }

            // Event click switcher tab
            tab.addEventListener('click', function() {
                dayTabs.forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                    const tKey = t.getAttribute('data-day');
                    const tName = t.getAttribute('data-day-name');
                    const tIsToday = t.getAttribute('data-is-today') === '1';
                    t.innerText = tIsToday ? `${tName} (Hari Ini)` : tKey.charAt(0).toUpperCase() + tKey.slice(1);
                });

                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
                const selectedDay = this.getAttribute('data-day');
                currentSelectedDay = selectedDay;
                renderScheduleCards(selectedDay);
            });
        });
    }

    // Render 3 Kartu Jadwal
    function renderScheduleCards(dayKey) {
        const container = document.getElementById('jadwalCardsContainer');
        if (!container) return;

        const dayData = JADWAL_MASTER_DATA[dayKey] || JADWAL_MASTER_DATA['sen'];
        const cards = dayData.cards || [];

        let html = '';
        cards.forEach(card => {
            const isBerlangsung = card.type === 'berlangsung';
            const cardClass = card.type === 'selesai' ? 'card-selesai' : (card.type === 'berlangsung' ? 'card-berlangsung' : 'card-mendatang');
            const badgeClass = card.type === 'selesai' ? 'badge-selesai' : (card.type === 'berlangsung' ? 'badge-berlangsung' : 'badge-mendatang');

            let badgeHtml = '';
            if (card.type === 'selesai') {
                badgeHtml = `
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>${card.badgeLabel}</span>
                `;
            } else if (card.type === 'berlangsung') {
                badgeHtml = `
                    <span class="pulse-white-dot" aria-hidden="true"></span>
                    <span>${card.badgeLabel}</span>
                `;
            } else {
                badgeHtml = `
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span>${card.badgeLabel}</span>
                `;
            }

            let footerActionHtml = '';
            if (card.hasLabBtn) {
                currentActiveLabData = card.labData;
                footerActionHtml = `
                    <button type="button" class="btn-lembar-lab" onclick="bukaLembarLabModal()" aria-label="Buka Lembar Lab">
                        Buka Lembar Lab
                    </button>
                `;
            } else {
                footerActionHtml = `<span class="footer-status ${card.statusClass}">${card.footerValue}</span>`;
            }

            html += `
                <div class="jadwal-card ${cardClass}">
                    <div class="card-schedule-header">
                        <span class="badge-schedule ${badgeClass}">
                            ${badgeHtml}
                        </span>
                        <span class="schedule-time ${isBerlangsung ? 'time-highlight' : ''}">${card.time}</span>
                    </div>

                    <h3 class="subject-title ${isBerlangsung ? 'title-highlight' : ''}">${card.title}</h3>

                    <div class="subject-details-list">
                        <div class="subject-detail-item">
                            <img src="${card.roomIcon}" alt="Location Icon" width="15" height="15" class="detail-icon" onerror="this.src='{{ asset('assets/lab.png') }}'">
                            <span class="detail-text" title="${card.room}">${card.room}</span>
                        </div>
                        <div class="subject-detail-item">
                            <img src="${card.teacherIcon}" alt="Teacher Icon" width="15" height="15" class="detail-icon" onerror="this.src='{{ asset('assets/man.png') }}'">
                            <span class="detail-text" title="${card.teacher}">${card.teacher}</span>
                        </div>
                    </div>

                    <div class="card-schedule-footer">
                        <span class="footer-label ${isBerlangsung ? 'font-bold-dark' : ''}">${card.footerLabel}</span>
                        ${footerActionHtml}
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;
    }

    // Inisialisasi Event Listener Modal
    function initModalEvents() {
        // Tombol Buka Roster Lengkap
        const btnRoster = document.getElementById('btnBukaRosterLengkap');
        if (btnRoster) {
            btnRoster.addEventListener('click', bukaRosterLengkapModal);
        }

        // Close Roster Modal
        const btnCloseRoster = document.getElementById('btnCloseRosterModal');
        if (btnCloseRoster) {
            btnCloseRoster.addEventListener('click', tutupRosterLengkapModal);
        }

        // Close Lab Modal
        const btnCloseLab = document.getElementById('btnCloseLabModal');
        if (btnCloseLab) {
            btnCloseLab.addEventListener('click', tutupLembarLabModal);
        }

        // Close saat klik di backdrop overlay
        const rosterOverlay = document.getElementById('modalRosterOverlay');
        if (rosterOverlay) {
            rosterOverlay.addEventListener('click', function(e) {
                if (e.target === this) tutupRosterLengkapModal();
            });
        }

        const labOverlay = document.getElementById('modalLembarLabOverlay');
        if (labOverlay) {
            labOverlay.addEventListener('click', function(e) {
                if (e.target === this) tutupLembarLabModal();
            });
        }

        // Escape Key Listener
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                tutupRosterLengkapModal();
                tutupLembarLabModal();
            }
        });

        // Filter pills di dalam modal Roster
        const rosterFilterBtns = document.querySelectorAll('#rosterFilterPills .roster-filter-btn');
        rosterFilterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                rosterFilterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                renderRosterModalContent(this.getAttribute('data-filter'));
            });
        });

        // Search filter di modal Roster
        const rosterSearch = document.getElementById('rosterSearchInput');
        if (rosterSearch) {
            rosterSearch.addEventListener('input', function() {
                const keyword = this.value.toLowerCase().trim();
                filterRosterByKeyword(keyword);
            });
        }

        // Tabs di modal Lab Jobsheet
        const labTabs = document.querySelectorAll('#labTabsNav .lab-tab-btn');
        labTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                labTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                const targetTab = this.getAttribute('data-tab');
                
                document.querySelectorAll('.lab-tab-pane').forEach(pane => pane.classList.remove('active'));
                const activePane = document.getElementById(`pane-${targetTab}`);
                if (activePane) activePane.classList.add('active');
            });
        });
    }

    // Modal Roster Lengkap
    function bukaRosterLengkapModal() {
        const modal = document.getElementById('modalRosterOverlay');
        if (!modal) return;

        renderRosterModalContent('all');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        setTimeout(() => modal.classList.add('active'), 10);
    }

    function tutupRosterLengkapModal() {
        const modal = document.getElementById('modalRosterOverlay');
        if (!modal) return;

        modal.classList.remove('active');
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 250);
    }

    function renderRosterModalContent(filterDay = 'all') {
        const container = document.getElementById('rosterModalBody');
        if (!container) return;

        const days = ['sen', 'sel', 'rab', 'kam', 'jum', 'sab'];
        let html = '';

        days.forEach(dayKey => {
            if (filterDay !== 'all' && filterDay !== dayKey) return;

            const dayData = JADWAL_MASTER_DATA[dayKey];
            const isToday = dayKey === currentSelectedDay;

            html += `
                <div class="roster-day-group" data-day-group="${dayKey}">
                    <div class="roster-day-header">
                        <span class="roster-day-title">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            Hari ${dayData.dayName}
                        </span>
                        ${isToday ? '<span class="roster-day-badge-today">Hari Terpilih</span>' : ''}
                    </div>
                    <div class="roster-items-table">
            `;

            dayData.cards.forEach((c, idx) => {
                const typeClass = c.hasLabBtn ? 'type-praktik' : (idx === 2 ? 'type-tefa' : 'type-teori');
                const typeLabel = c.hasLabBtn ? 'Praktikum Lab' : (idx === 2 ? 'TEFA Proyek' : 'Teori & Lab');
                const cleanTitle = c.title.replace(/<br\s*[\/]?>/gi, ' ');

                html += `
                    <div class="roster-row-item">
                        <div class="roster-time-col">${c.time}</div>
                        <div class="roster-subject-col">${cleanTitle}</div>
                        <div class="roster-room-col">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                            <span>${c.room}</span>
                        </div>
                        <div class="roster-teacher-col">${c.teacher}</div>
                        <div><span class="roster-type-pill ${typeClass}">${typeLabel}</span></div>
                    </div>
                `;
            });

            html += `
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;
    }

    function filterRosterByKeyword(keyword) {
        const rows = document.querySelectorAll('#rosterModalBody .roster-row-item');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(keyword) ? 'grid' : 'none';
        });
    }

    // Modal Buka Lembar Lab (Jobsheet)
    function bukaLembarLabModal() {
        const modal = document.getElementById('modalLembarLabOverlay');
        if (!modal) return;

        const dayData = JADWAL_MASTER_DATA[currentSelectedDay] || JADWAL_MASTER_DATA['sen'];
        const activeCard = dayData.cards.find(c => c.hasLabBtn) || dayData.cards[1];
        const lab = activeCard.labData || {
            modul: 'Modul Praktik Kejuruan TEFA Hub',
            mapel: 'Praktikum Kejuruan TEFA',
            ruang: 'Lab Kejuruan RPL / IoT',
            guru: 'Guru Pengampu TEFA',
            waktu: '4 JP (180 Menit)',
            tujuan: ['Melaksanakan SOP praktikum industri dengan teliti dan aman.'],
            k3: 'Gunakan APD standar lab dan patuhi petunjuk pengajar.',
            alat: ['Workstation Lab', 'Perangkat Uji TEFA'],
            steps: [{ title: 'Persiapan', desc: 'Siapkan modul dan alat kerja.' }]
        };

        // Populate Modal Fields
        document.getElementById('labModalTitle').innerText = lab.modul;
        document.getElementById('labModalSubtitle').innerText = `Panduan lembar kerja laboratorium untuk mata pelajaran ${lab.mapel} (${lab.ruang})`;
        document.getElementById('labMetaMapel').innerText = lab.mapel;
        document.getElementById('labMetaRuang').innerText = lab.ruang;
        document.getElementById('labMetaGuru').innerText = lab.guru;
        document.getElementById('labMetaWaktu').innerText = lab.waktu;

        // Reset Tab ke Instruksi (Tab 1)
        const tabBtns = document.querySelectorAll('#labTabsNav .lab-tab-btn');
        tabBtns.forEach((b, i) => b.classList.toggle('active', i === 0));
        document.querySelectorAll('.lab-tab-pane').forEach((p, i) => p.classList.toggle('active', i === 0));

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        setTimeout(() => modal.classList.add('active'), 10);
    }

    function tutupLembarLabModal() {
        const modal = document.getElementById('modalLembarLabOverlay');
        if (!modal) return;

        modal.classList.remove('active');
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 250);
    }

    // Aksi Download & Submit
    function printRosterSchedule() {
        showJadwalToast('Mempersiapkan dokumen cetak roster mingguan...');
        setTimeout(() => window.print(), 500);
    }

    function downloadRosterPdf() {
        showJadwalToast('Mengunduh Roster Pembelajaran Mingguan (PDF)...');
    }

    function downloadJobsheetPdf() {
        showJadwalToast('Mengunduh Lembar Kerja Praktik / Jobsheet TEFA (PDF)...');
    }

    function submitLaporanLab() {
        const catatan = document.getElementById('labHasilPengamatan')?.value || '';
        showJadwalToast('Laporan praktikum lab berhasil dikirim ke pengajar!');
        setTimeout(() => tutupLembarLabModal(), 1200);
    }

    function handleLabProofFile(input) {
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            const textElem = document.getElementById('labUploadText');
            if (textElem) {
                textElem.innerText = `File terpilih: ${fileName}`;
                textElem.style.color = '#007D57';
            }
            showJadwalToast(`File ${fileName} berhasil dilampirkan.`);
        }
    }

    // Helper Toast Notification
    function showJadwalToast(message) {
        const toast = document.getElementById('jadwalToastNotification');
        const msgElem = document.getElementById('jadwalToastMsg');
        if (!toast || !msgElem) return;

        msgElem.innerText = message;
        toast.style.display = 'flex';
        setTimeout(() => toast.classList.add('show'), 10);

        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.style.display = 'none', 300);
        }, 3200);
    }
</script>
