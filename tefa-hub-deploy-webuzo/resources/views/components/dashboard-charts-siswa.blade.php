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
                <div class="bar-item" data-month="Jan" data-hours="0 Jam" data-height="6" tabindex="0" role="button" aria-label="Januari 0 Jam">
                    <div class="bar-tooltip">0 Jam</div>
                    <div class="bar-pillar" style="height: 6px;"></div>
                    <span class="bar-month-label">Jan</span>
                </div>

                <!-- Bar 2: Feb -->
                <div class="bar-item" data-month="Feb" data-hours="0 Jam" data-height="6" tabindex="0" role="button" aria-label="Februari 0 Jam">
                    <div class="bar-tooltip">0 Jam</div>
                    <div class="bar-pillar" style="height: 6px;"></div>
                    <span class="bar-month-label">Feb</span>
                </div>

                <!-- Bar 3: Mar -->
                <div class="bar-item" data-month="Mar" data-hours="0 Jam" data-height="6" tabindex="0" role="button" aria-label="Maret 0 Jam">
                    <div class="bar-tooltip">0 Jam</div>
                    <div class="bar-pillar" style="height: 6px;"></div>
                    <span class="bar-month-label">Mar</span>
                </div>

                <!-- Bar 4: Apr -->
                <div class="bar-item active" data-month="Apr" data-hours="0 Jam" data-height="6" tabindex="0" role="button" aria-label="April 0 Jam">
                    <div class="bar-tooltip">0 Jam</div>
                    <div class="bar-pillar" style="height: 6px;"></div>
                    <span class="bar-month-label">Apr</span>
                </div>

                <!-- Bar 5: Mei -->
                <div class="bar-item" data-month="Mei" data-hours="0 Jam" data-height="6" tabindex="0" role="button" aria-label="Mei 0 Jam">
                    <div class="bar-tooltip">0 Jam</div>
                    <div class="bar-pillar" style="height: 6px;"></div>
                    <span class="bar-month-label">Mei</span>
                </div>

                <!-- Bar 6: Jun -->
                <div class="bar-item" data-month="Jun" data-hours="0 Jam" data-height="6" tabindex="0" role="button" aria-label="Juni 0 Jam">
                    <div class="bar-tooltip">0 Jam</div>
                    <div class="bar-pillar" style="height: 6px;"></div>
                    <span class="bar-month-label">Jun</span>
                </div>

            </div>
        </div>

        <!-- Legend Footer -->
        <div class="chart-card-legend">
            <div class="legend-item">
                <span class="legend-dot dot-blue-tefa"></span>
                <span class="legend-text">Praktik Lab TEFA (0 Jam)</span>
            </div>
            <div class="legend-item">
                <span class="legend-dot dot-light-teori"></span>
                <span class="legend-text text-muted">Teori Kejuruan (0 Jam)</span>
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
            <span class="chart-badge-status" id="dashBkkStatusBadge">Menunggu Data</span>
        </div>

        <!-- Body: Donut Chart & 3 Skill Progress Bars -->
        <div class="bkk-evaluation-body">
            
            <!-- Sisi Kiri: Circular / Pie Chart Donut 0% -->
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
                    <!-- Progress Circle (#004AC6, 0% -> stroke-dashoffset = 238.76) -->
                    <circle 
                        id="dashboardDonutCircle"
                        cx="50" 
                        cy="50" 
                        r="38" 
                        fill="transparent" 
                        stroke="#004AC6" 
                        stroke-width="9" 
                        stroke-dasharray="238.76" 
                        stroke-dashoffset="238.76" 
                        stroke-linecap="round"
                        transform="rotate(-90 50 50)"
                    />
                </svg>
                <div class="donut-center-text">
                    <span class="donut-score-value" id="dashboardDonutScore">0%</span>
                    <span class="donut-score-label">Match Score</span>
                </div>
            </div>

            <!-- Sisi Kanan: 3 Indikasi Skill Bars 0% -->
            <div class="bkk-skills-list">
                
                <!-- Indikasi 1: Hard Skills (0%) -->
                <div class="skill-item">
                    <div class="skill-meta">
                        <span class="skill-name">Hard Skills (Coding & UI)</span>
                        <span class="skill-value color-blue" id="dashHardSkillVal">0%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill fill-blue" id="dashHardSkillBar" style="width: 0%;"></div>
                    </div>
                </div>

                <!-- Indikasi 2: Soft Skills (0%) -->
                <div class="skill-item">
                    <div class="skill-meta">
                        <span class="skill-name">Soft Skills (Kerja Tim)</span>
                        <span class="skill-value color-purple" id="dashSoftSkillVal">0%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill fill-purple" id="dashSoftSkillBar" style="width: 0%;"></div>
                    </div>
                </div>

                <!-- Indikasi 3: Disiplin & K3 (0%) -->
                <div class="skill-item">
                    <div class="skill-meta">
                        <span class="skill-name">Disiplin & K3 Industri</span>
                        <span class="skill-value color-green" id="dashK3SkillVal">0%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill fill-green" id="dashK3SkillBar" style="width: 0%;"></div>
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
            item.addEventListener('click', function() {
                barItems.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });

            item.addEventListener('mouseenter', function() {
                barItems.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });

            item.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    barItems.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });

        // Realtime Score Update (Starts from 0%)
        function updateDashboardBkkScore() {
            fetch('{{ route("siswa.api.bkk") }}')
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.match_score !== undefined) {
                        const score = Number(data.match_score) || 0;
                        const scoreEl = document.getElementById('dashboardDonutScore');
                        const circleEl = document.getElementById('dashboardDonutCircle');
                        const badgeEl = document.getElementById('dashBkkStatusBadge');

                        if (scoreEl) scoreEl.textContent = score + '%';
                        if (circleEl) {
                            const circ = 238.76;
                            const offset = circ - (score / 100 * circ);
                            circleEl.style.strokeDashoffset = offset;
                        }
                        if (badgeEl) {
                            badgeEl.textContent = score > 0 ? (score >= 75 ? 'Siap Kerja' : 'Proses Evaluasi') : 'Menunggu Data';
                        }
                    }
                })
                .catch(err => console.error('Error fetching dashboard BKK score:', err));
        }

        updateDashboardBkkScore();
        setInterval(updateDashboardBkkScore, 10000);
    });
</script>
