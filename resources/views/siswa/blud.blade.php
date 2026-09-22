<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLUD Teaching Factory — TEFA-Hub</title>

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
        <x-sidebar-siswa :active="'blud'" :user="$user ?? []" />

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
                     BLUD SERVICES / PRODUCTS SECTION
                     ═══════════════════════════════════════════ -->
                <section class="blud-section-wrapper">
                    
                    <!-- Section Header -->
                    <div class="blud-section-header">
                        <div class="blud-header-text">
                            <h2 class="blud-section-title">Layanan & Produk BLUD</h2>
                            <p class="blud-section-subtitle">Katalog produk dan jasa karya siswa Teaching Factory terintegrasi industri</p>
                        </div>
                    </div>

                    <!-- 3 Cards Grid Container -->
                    <div class="blud-cards-container">

                        <!-- ── CARD 1 ── -->
                        <div class="blud-card-frame">
                            <div class="blud-card-image-wrap">
                                <img src="{{ asset('assets/Background (14).png') }}" alt="Servis Berkala & Ganti Oli Mesin" class="blud-bg-img">
                                <span class="blud-price-badge">Mulai 50rb</span>
                                
                                <!-- Inner Translucent Card (190x111) -->
                                <div class="blud-inner-card">
                                    <div class="blud-inner-content">
                                        <span class="blud-tag">JASA LAYANAN</span>
                                        <h3 class="blud-title">Servis Berkala & Ganti Oli Mesin</h3>
                                    </div>
                                    <a href="#" class="blud-btn">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                        <!-- ── CARD 2 ── -->
                        <div class="blud-card-frame">
                            <div class="blud-card-image-wrap">
                                <img src="{{ asset('assets/Background (14).png') }}" alt="Servis Berkala & Ganti Oli Mesin" class="blud-bg-img">
                                <span class="blud-price-badge">Mulai 50rb</span>
                                
                                <!-- Inner Translucent Card (190x111) -->
                                <div class="blud-inner-card">
                                    <div class="blud-inner-content">
                                        <span class="blud-tag">JASA LAYANAN</span>
                                        <h3 class="blud-title">Servis Berkala & Ganti Oli Mesin</h3>
                                    </div>
                                    <a href="#" class="blud-btn">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                        <!-- ── CARD 3 ── -->
                        <div class="blud-card-frame">
                            <div class="blud-card-image-wrap">
                                <img src="{{ asset('assets/Background (14).png') }}" alt="Servis Berkala & Ganti Oli Mesin" class="blud-bg-img">
                                <span class="blud-price-badge">Mulai 50rb</span>
                                
                                <!-- Inner Translucent Card (190x111) -->
                                <div class="blud-inner-card">
                                    <div class="blud-inner-content">
                                        <span class="blud-tag">JASA LAYANAN</span>
                                        <h3 class="blud-title">Servis Berkala & Ganti Oli Mesin</h3>
                                    </div>
                                    <a href="#" class="blud-btn">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                    </div>

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
