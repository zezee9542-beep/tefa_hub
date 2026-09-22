<div class="siswa-charts-grid" role="region" aria-label="Grafik Aktivitas dan Kesiapan Kerja">
    
    <!-- ══════════════════════════════════════════════════════════
         CARD 1: AKTIVITAS JAM PRAKTIK (452x297 px)
         ══════════════════════════════════════════════════════════ -->
    <div class="chart-dashboard-card" id="cardAktivitasPraktik">
        <!-- Card Header -->
        <div class="chart-card-header">
            <div class="chart-header-text">
                <h3 class="chart-card-title">Aktivitas Jam Praktik</h3>
                <p class="chart-card-subtitle">Rasio Jam Lab vs Teori (Jan - Jun)</p>
            </div>
            <span class="chart-badge-filter">Bulanan</span>
        </div>

        <!-- Bar Chart Container -->
        <div class="bar-chart-viewport">
            <div class="bar-chart-container" id="barChartContainer">
                
                <!-- Bar 1: Jan -->
                <div class="bar-item" data-month="Jan" data-hours="16 Jam" data-height="42" tabindex="0" role="button" aria-label="Januari 16 Jam">
                    <div class="bar-tooltip">16 Jam</div>
                    <div class="bar-pillar" style="height: 42px;"></div>
                    <span class="bar-month-label">Jan</span>
                </div>

                <!-- Bar 2: Feb -->
                <div class="bar-item" data-month="Feb" data-hours="22 Jam" data-height="62" tabindex="0" role="button" aria-label="Februari 22 Jam">
                    <div class="bar-tooltip">22 Jam</div>
                    <div class="bar-pillar" style="height: 62px;"></div>
                    <span class="bar-month-label">Feb</span>
                </div>

                <!-- Bar 3: Mar -->
                <div class="bar-item" data-month="Mar" data-hours="18 Jam" data-height="48" tabindex="0" role="button" aria-label="Maret 18 Jam">
                    <div class="bar-tooltip">18 Jam</div>
                    <div class="bar-pillar" style="height: 48px;"></div>
                    <span class="bar-month-label">Mar</span>
                </div>

                <!-- Bar 4: Apr (Active default) -->
                <div class="bar-item active" data-month="Apr" data-hours="32 Jam" data-height="96" tabindex="0" role="button" aria-label="April 32 Jam">
                    <div class="bar-tooltip">32 Jam</div>
                    <div class="bar-pillar" style="height: 96px;"></div>
                    <span class="bar-month-label">Apr</span>
                </div>

                <!-- Bar 5: Mei -->
                <div class="bar-item" data-month="Mei" data-hours="26 Jam" data-height="74" tabindex="0" role="button" aria-label="Mei 26 Jam">
                    <div class="bar-tooltip">26 Jam</div>
                    <div class="bar-pillar" style="height: 74px;"></div>
                    <span class="bar-month-label">Mei</span>
                </div>

                <!-- Bar 6: Jun -->
                <div class="bar-item" data-month="Jun" data-hours="20 Jam" data-height="56" tabindex="0" role="button" aria-label="Juni 20 Jam">
                    <div class="bar-tooltip">20 Jam</div>
                    <div class="bar-pillar" style="height: 56px;"></div>
                    <span class="bar-month-label">Jun</span>
                </div>

            </div>
        </div>

        <!-- Legend Footer -->
        <div class="chart-card-legend">
            <div class="legend-item">
                <span class="legend-dot dot-blue-tefa"></span>
                <span class="legend-text">Praktik Lab TEFA</span>
            </div>
            <div class="legend-item">
                <span class="legend-dot dot-light-teori"></span>
                <span class="legend-text text-muted">Teori Kejuruan</span>
            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════════
         CARD 2: KESIAPAN KERJA BKK (452x297 px)
         ══════════════════════════════════════════════════════════ -->
    <div class="chart-dashboard-card" id="cardKesiapanBkk">
        <!-- Card Header -->
        <div class="chart-card-header">
            <div class="chart-header-text">
                <h3 class="chart-card-title">Kesiapan Kerja BKK</h3>
                <p class="chart-card-subtitle">Evaluasi Skema Standar Industri</p>
            </div>
            <span class="chart-badge-status">Siap Kerja</span>
        </div>

        <!-- Body: Donut Chart & 3 Skill Progress Bars -->
        <div class="bkk-evaluation-body">
            
            <!-- Sisi Kiri: Circular / Pie Chart Donut 84% -->
            <div class="bkk-donut-wrapper">
                <svg class="donut-svg" viewBox="0 0 100 100" width="112" height="112">
                    <!-- Background Circle Track -->
                    <circle 
                        cx="50" 
                        cy="50" 
                        r="38" 
                        fill="transparent" 
                        stroke="#EEF2FF" 
                        stroke-width="9"
                    />
                    <!-- Progress Circle (#004AC6, 84% -> 238.76 * 0.84 = 200.55) -->
                    <circle 
                        cx="50" 
                        cy="50" 
                        r="38" 
                        fill="transparent" 
                        stroke="#004AC6" 
                        stroke-width="9" 
                        stroke-dasharray="238.76" 
                        stroke-dashoffset="38.2" 
                        stroke-linecap="round"
                        transform="rotate(-90 50 50)"
                    />
                </svg>
                <div class="donut-center-text">
                    <span class="donut-score-value">84%</span>
                    <span class="donut-score-label">Match Score</span>
                </div>
            </div>

            <!-- Sisi Kanan: 3 Indikasi Skill Bars -->
            <div class="bkk-skills-list">
                
                <!-- Indikasi 1: Hard Skills (#004AC6) -->
                <div class="skill-item">
                    <div class="skill-meta">
                        <span class="skill-name">Hard Skills (Coding & UI)</span>
                        <span class="skill-value color-blue">88%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill fill-blue" style="width: 88%;"></div>
                    </div>
                </div>

                <!-- Indikasi 2: Soft Skills (#712AE2) -->
                <div class="skill-item">
                    <div class="skill-meta">
                        <span class="skill-name">Soft Skills (Kerja Tim)</span>
                        <span class="skill-value color-purple">92%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill fill-purple" style="width: 92%;"></div>
                    </div>
                </div>

                <!-- Indikasi 3: Disiplin & K3 (#006243) -->
                <div class="skill-item">
                    <div class="skill-meta">
                        <span class="skill-name">Disiplin & K3 Industri</span>
                        <span class="skill-value color-green">95%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill fill-green" style="width: 95%;"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Card Footer -->
        <footer class="bkk-card-footer">
            <p class="bkk-validation-note">Data tervalidasi oleh Guru Pembimbing & Mentor DUDI</p>
        </footer>
    </div>

</div>

<!-- Interactive JavaScript for Bar Chart Hover & Click Indikasi -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const barItems = document.querySelectorAll('.bar-chart-container .bar-item');

        barItems.forEach(item => {
            // Event klik: jadikan bar yang diklik sebagai bar aktif permanen
            item.addEventListener('click', function() {
                barItems.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });

            // Event hover (mouseenter): aktifkan sementara saat kursor mengarah
            item.addEventListener('mouseenter', function() {
                barItems.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });

            // Keyboard accessibility (Enter / Space)
            item.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    barItems.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });
    });
</script>
