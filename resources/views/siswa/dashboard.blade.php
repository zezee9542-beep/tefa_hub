<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa — TEFA-Hub</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Siswa Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/siswa.dashboard.css') }}">
</head>
<body>

    <div class="app-layout">
        
        <!-- ═══════════════════════════════════════════
             SIDEBAR NAVIGASI SISWA
             ═══════════════════════════════════════════ -->
        <x-sidebar-siswa :active="$activeMenu ?? 'dashboard'" :user="$user ?? []" />

        <!-- ═══════════════════════════════════════════
             MAIN CONTENT AREA
             ═══════════════════════════════════════════ -->
        <main class="main-content">
            
            <!-- ═══════════════════════════════════════════
                 HEADER UTAMA ROLE SISWA (FULL TOP NO GAP)
                 ═══════════════════════════════════════════ -->
            <x-header-siswa :user="$user ?? []" />

            <!-- Page Body Area -->
            <div class="content-body">
                
                <!-- ═══════════════════════════════════════════
                     HERO PROFILE BANNER SISWA (928x256)
                     ═══════════════════════════════════════════ -->
                <x-profile-banner-siswa :user="$user ?? []" />

                <!-- ═══════════════════════════════════════════
                     DOUBLE CHARTS GRID SISWA (2x 452x297)
                     ═══════════════════════════════════════════ -->
                <x-dashboard-charts-siswa />

                <!-- ═══════════════════════════════════════════
                     JADWAL PELAJARAN & PRAKTIK KEJURUAN
                     ═══════════════════════════════════════════ -->
                <x-jadwal-pelajaran-siswa />

                <!-- ═══════════════════════════════════════════
                     RIWAYAT & LOG AKTIVITAS OTOMATIS (928x254)
                     ═══════════════════════════════════════════ -->
                <x-riwayat-aktivitas-siswa />

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

            if (toggleBtn) {
                toggleBtn.addEventListener('click', toggleSidebar);
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', closeSidebar);
            }

            if (backdrop) {
                backdrop.addEventListener('click', closeSidebar);
            }
        });
    </script>

</body>
</html>
