<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKK Career Center — TEFA-Hub</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Siswa Dashboard & Shared CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/siswa.dashboard.css') }}">
</head>
<body>

    <div class="app-layout">
        
        <!-- ═══════════════════════════════════════════
             SIDEBAR NAVIGASI SISWA
             ═══════════════════════════════════════════ -->
        <x-sidebar-siswa :active="'bkk'" :user="$user ?? []" />

        <!-- ═══════════════════════════════════════════
             MAIN CONTENT AREA
             ═══════════════════════════════════════════ -->
        <main class="main-content">
            
            <!-- ═══════════════════════════════════════════
                 HEADER UTAMA ROLE SISWA
                 ═══════════════════════════════════════════ -->
            <x-header-siswa :user="$user ?? []" />

            <!-- Page Body Area -->
            <div class="content-body">
                
                <!-- ═══════════════════════════════════════════
                     HERO PROFILE BANNER SISWA
                     ═══════════════════════════════════════════ -->
                <x-profile-banner-siswa :user="$user ?? []" />

                <!-- ═══════════════════════════════════════════
                     CARD KESIAPAN KERJA BKK (928px CARD)
                     ═══════════════════════════════════════════ -->
                <section class="bkk-card-wrapper">
                    
                    <!-- Header Baris Atas -->
                    <div class="bkk-card-header">
                        <div class="bkk-header-text">
                            <h2 class="bkk-title">Kesiapan Kerja BKK</h2>
                            <p class="bkk-subtitle">Evaluasi Skema Standar Industri</p>
                        </div>
                        <span class="bkk-badge-status">Siap Kerja</span>
                    </div>

                    <!-- Grid / Content Body -->
                    <div class="bkk-card-body">
                        
                        <!-- Side Kiri: Circle Progress Chart (Match Score) -->
                        <div class="bkk-chart-circle-wrap">
                            <svg class="bkk-circle-svg" viewBox="0 0 120 120">
                                <!-- Background Circle Track -->
                                <circle class="circle-bg" cx="60" cy="60" r="50" stroke="#EEF2FF" stroke-width="10" fill="none" />
                                <!-- Progress Circle Fill (84%) -->
                                <circle class="circle-fill" cx="60" cy="60" r="50" stroke="#004AC6" stroke-width="10" stroke-linecap="round" fill="none" 
                                        stroke-dasharray="314.16" stroke-dashoffset="50.26" transform="rotate(-90 60 60)" />
                            </svg>
                            <div class="bkk-circle-text">
                                <span class="circle-score">84%</span>
                                <span class="circle-label">Match Score</span>
                            </div>
                        </div>

                        <!-- Side Kanan: 3 Baris Progress Skills -->
                        <div class="bkk-skills-list">

                            <!-- Skill 1: Hard Skills (Coding & UI) -->
                            <div class="bkk-skill-item">
                                <div class="skill-info-row">
                                    <span class="skill-name">Hard Skills (Coding & UI)</span>
                                    <span class="skill-val val-blue">88%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill fill-blue" style="width: 88%;"></div>
                                </div>
                            </div>

                            <!-- Skill 2: Soft Skills (Kerja Tim) -->
                            <div class="bkk-skill-item">
                                <div class="skill-info-row">
                                    <span class="skill-name">Soft Skills (Kerja Tim)</span>
                                    <span class="skill-val val-purple">92%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill fill-purple" style="width: 92%;"></div>
                                </div>
                            </div>

                            <!-- Skill 3: Disiplin & K3 Industri -->
                            <div class="bkk-skill-item">
                                <div class="skill-info-row">
                                    <span class="skill-name">Disiplin & K3 Industri</span>
                                    <span class="skill-val val-green">95%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill fill-green" style="width: 95%;"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Footer Note -->
                    <footer class="bkk-card-footer">
                        <span>Data tervalidasi oleh Guru Pembimbing & Mentor DUDI</span>
                    </footer>

                </section>

            </div>

        </main>

        <!-- Sidebar Overlay Backdrop for Responsive Mobile/Tablet -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    </div>

    <!-- Responsive Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const closeBtn = document.getElementById('sidebarCloseBtn');
            const backdrop = document.getElementById('sidebarBackdrop');

            function toggleSidebar() {
                if (window.innerWidth <= 1024) {
                    sidebar.classList.toggle('sidebar-mobile-open');
                    backdrop.classList.toggle('active');
                    document.body.classList.toggle('sidebar-no-scroll');
                } else {
                    sidebar.classList.toggle('sidebar-desktop-collapsed');
                    mainContent.classList.toggle('content-expanded');
                }
            }

            function closeSidebar() {
                sidebar.classList.remove('sidebar-mobile-open');
                backdrop.classList.remove('active');
                document.body.classList.remove('sidebar-no-scroll');
            }

            if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);
        });
    </script>

</body>
</html>
