@props(['user' => []])

<div class="profile-hero-card" role="region" aria-label="Banner Profil Siswa">
    <!-- Ambient Layer Blur Background Eclipses -->
    <div class="card-eclipse-blur eclipse-blue-corner" aria-hidden="true"></div>
    <div class="card-eclipse-blur eclipse-purple-bottom" aria-hidden="true"></div>

    <!-- Sisi Kiri: Foto Profil & Tombol Edit -->
    <div class="profile-card-left">
        <div class="profile-avatar-wrapper">
            <img src="{{ asset('assets/orng.png') }}" alt="{{ $user['name'] ?? 'Foto Profil Siswa' }}" class="profile-avatar-img">
        </div>
        <button type="button" class="btn-edit-profile" aria-label="Edit profil">
            Edit profil
        </button>
    </div>

    <!-- Sisi Kanan: Status, Sapaan & Progress Transisi Alumni -->
    <div class="profile-card-right">
        <!-- Baris 1: Status Siswa Aktif & NISN -->
        <div class="profile-meta-row">
            <div class="badge-siswa-tefa">
                <span class="tefa-dot" aria-hidden="true"></span>
                <span class="tefa-text">SISWA AKTIF TEFA</span>
            </div>
            
            <div class="profile-nisn-info">
                <img src="{{ asset('assets/lis.png') }}" alt="Verified NISN" class="icon-verified-lis" width="16" height="16">
                <span>NISN: {{ $user['nisn'] ?? '0064829104' }} • {{ $user['class'] ?? 'XII RPL 1' }}</span>
            </div>
        </div>

        <!-- Baris 2: Sapaan Selamat Datang -->
        <div class="profile-welcome-group">
            <h2 class="welcome-heading">Selamat Datang kembali,</h2>
            <h2 class="welcome-name">{{ $user['name'] ?? 'Kirana Kinanti' }}!</h2>
        </div>

        <!-- Baris 3: Status Role & Transisi Alumni (Progress Chart) -->
        <div class="role-transition-box">
            <div class="transition-header">
                <div class="transition-title-wrap">
                    <img src="{{ asset('assets/run.png') }}" alt="Role Status Icon" class="transition-icon" width="16" height="16">
                    <span class="transition-title">Status Role & Transisi Alumni</span>
                </div>
                <span class="badge-terintegrasi">Terintegrasi</span>
            </div>

            <!-- Progress Bar Indikator -->
            <div class="transition-progress-track" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                <div class="transition-progress-fill" style="width: 82%;"></div>
            </div>

            <div class="transition-footer">
                <span class="transition-semester">Semester Akhir (Kelas XII)</span>
                <span class="transition-percentage">82% Fase Kelulusan</span>
            </div>
        </div>
    </div>
</div>
