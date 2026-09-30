@props(['user' => []])

<!-- ═══════════════════════════════════════════════════════════
     MODAL EDIT PROFIL SISWA — TEFA-HUB (CLEAN SOFT UI)
     ═══════════════════════════════════════════════════════════ -->
<div 
    id="modalEditProfilOverlay" 
    class="modal-profil-overlay" 
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="modalProfilTitle"
    tabindex="-1"
>
    <div class="modal-profil-card" id="modalProfilCard">
        
        <!-- Close Button (Pojok Kanan Atas) -->
        <button 
            type="button" 
            class="btn-close-modal-profil" 
            id="btnCloseModalProfil" 
            aria-label="Tutup modal profil"
            onclick="closeEditProfileModal()"
        >
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <!-- Header Modal -->
        <div class="modal-profil-header">
            <h3 class="modal-profil-title" id="modalProfilTitle">Profil</h3>
            <p class="modal-profil-subtitle">Lengkapi identitas siswa untuk sinkronisasi rapor teaching factory.</p>
        </div>

        <!-- Form Edit Profil -->
        <form id="formEditProfilSiswa" onsubmit="handleProfileSubmit(event)" novalidate>
            @csrf
            
            <div class="modal-profil-grid">
                
                <!-- ═══════════════════════════════════════════
                     KOLOM KIRI: FOTO PROFIL
                     ═══════════════════════════════════════════ -->
                <div class="modal-col-foto">
                    <label class="modal-section-label">Foto Profil</label>
                    
                    <!-- Hidden File Input -->
                    <input 
                        type="file" 
                        id="inputFotoProfilSiswa" 
                        name="foto" 
                        accept="image/jpeg,image/png,image/jpg" 
                        style="display: none;" 
                        onchange="handlePhotoSelected(this)"
                    >

                    <!-- Dashed Upload Area -->
                    <div 
                        class="upload-foto-box" 
                        id="uploadFotoBox" 
                        onclick="triggerPhotoInput()"
                        role="button"
                        tabindex="0"
                        aria-label="Unggah foto profil siswa"
                        onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); triggerPhotoInput(); }"
                    >
                        <!-- Default Upload Content -->
                        <div id="uploadBoxPlaceholder" class="upload-placeholder-content">
                            <div class="upload-icon-circle">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display: block; margin: auto;">
                                    <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
                                    <path d="M12 12v9"></path>
                                    <path d="m16 16-4-4-4 4"></path>
                                </svg>
                            </div>
                            <p class="upload-title-text">Unggah Foto Siswa</p>
                            <p class="upload-meta-text">Format JPG/PNG maks. 2MB</p>
                            <p class="upload-sub-notes">latar polos</p>
                        </div>

                        <!-- Preview Active Content (Tampil saat foto dipilih) -->
                        <div id="uploadBoxPreview" class="foto-preview-container" style="display: none;">
                            <img id="imgFotoPreview" src="" alt="Preview Foto Siswa" class="foto-preview-img">
                            <div class="foto-preview-actions" onclick="event.stopPropagation();">
                                <button type="button" class="btn-ganti-foto" onclick="triggerPhotoInput()">Ganti Foto</button>
                                <button type="button" class="btn-hapus-foto" onclick="removePhotoSelected()">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <!-- Error Text Jika File Tidak Sesuai -->
                    <div id="fotoErrorMsg" class="upload-error-inline" style="display: none;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <span id="fotoErrorText">Format harus JPG/PNG & maks. 2MB</span>
                    </div>
                </div>

                <!-- ═══════════════════════════════════════════
                     KOLOM KANAN: INFORMASI PRIBADI
                     ═══════════════════════════════════════════ -->
                <div class="modal-col-info">
                    
                    <!-- Section Title & Divider -->
                    <h4 class="info-section-title">INFORMASI PRIBADI</h4>
                    <hr class="info-section-divider">

                    <!-- 1. Nama Lengkap -->
                    <div class="modal-form-group">
                        <label for="editNamaLengkap" class="modal-field-label">Nama Lengkap</label>
                        <input 
                            type="text" 
                            id="editNamaLengkap" 
                            name="nama_lengkap" 
                            class="modal-input-pill" 
                            placeholder="Masukkan nama lengkap siswa"
                            value="{{ $user['name'] ?? 'Kirana Kinanti' }}"
                            required
                        >
                        <span class="input-error-msg" id="errNamaLengkap" style="display: none;">Nama lengkap wajib diisi</span>
                    </div>

                    <!-- 2. NIS dan NISN (Kemdikbud) -->
                    <div class="modal-form-row">
                        <div class="modal-form-group" style="margin-bottom: 0;">
                            <label for="editNIS" class="modal-field-label">NIS</label>
                            <input 
                                type="text" 
                                id="editNIS" 
                                name="nis" 
                                class="modal-input-pill" 
                                placeholder="Masukkan NIS"
                                value="{{ $user['nis'] ?? '20241088' }}"
                                required
                            >
                            <span class="input-error-msg" id="errNIS" style="display: none;">NIS wajib diisi</span>
                        </div>
                        <div class="modal-form-group" style="margin-bottom: 0;">
                            <label for="editNISN" class="modal-field-label">NISN (Kemdikbud)</label>
                            <input 
                                type="text" 
                                id="editNISN" 
                                name="nisn" 
                                class="modal-input-pill" 
                                placeholder="Masukkan NISN"
                                value="{{ $user['nisn'] ?? '0064829104' }}"
                                required
                            >
                            <span class="input-error-msg" id="errNISN" style="display: none;">NISN wajib diisi</span>
                        </div>
                    </div>

                    <!-- 3. Tempat Lahir dan Tanggal Lahir -->
                    <div class="modal-form-row">
                        <div class="modal-form-group" style="margin-bottom: 0;">
                            <label for="editTempatLahir" class="modal-field-label">Tempat Lahir</label>
                            <input 
                                type="text" 
                                id="editTempatLahir" 
                                name="tempat_lahir" 
                                class="modal-input-pill" 
                                placeholder="Tempat Lahir"
                                value="{{ $user['tempat_lahir'] ?? 'Bandung' }}"
                                required
                            >
                            <span class="input-error-msg" id="errTempatLahir" style="display: none;">Tempat lahir wajib diisi</span>
                        </div>
                        <div class="modal-form-group" style="margin-bottom: 0;">
                            <label for="editTanggalLahir" class="modal-field-label">Tanggal Lahir</label>
                            <input 
                                type="date" 
                                id="editTanggalLahir" 
                                name="tanggal_lahir" 
                                class="modal-input-pill modal-date-picker" 
                                placeholder="mm/dd/yyyy"
                                value="{{ $user['tanggal_lahir'] ?? '2007-05-14' }}"
                                required
                            >
                            <span class="input-error-msg" id="errTanggalLahir" style="display: none;">Tanggal lahir wajib diisi</span>
                        </div>
                    </div>

                    <!-- 4. Jenis Kelamin (Custom Dropdown) -->
                    <div class="modal-form-group">
                        <label for="editJenisKelamin" class="modal-field-label">Jenis Kelamin</label>
                        <div class="modal-select-wrapper">
                            <select 
                                id="editJenisKelamin" 
                                name="jenis_kelamin" 
                                class="modal-input-pill modal-select-pill"
                                required
                            >
                                <option value="" disabled {{ empty($user['jenis_kelamin']) ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ ($user['jenis_kelamin'] ?? '') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ ($user['jenis_kelamin'] ?? 'Perempuan') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <div class="modal-select-chevron" aria-hidden="true">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                        </div>
                        <span class="input-error-msg" id="errJenisKelamin" style="display: none;">Pilih jenis kelamin</span>
                    </div>

                    <!-- Bottom Line Divider -->
                    <hr class="modal-bottom-divider">

                    <!-- Modal Footer Row -->
                    <div class="modal-footer-row">
                        <!-- Sisi Kiri: Status Sinkronisasi BKK -->
                        <div class="status-sync-bkk">
                            <div class="sync-shield-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    <polyline points="9 12 11 14 15 10"></polyline>
                                </svg>
                            </div>
                            <span>Sinkronisasi BKK Aktif</span>
                        </div>

                        <!-- Sisi Kanan: Tombol Selanjutnya -->
                        <button type="submit" id="btnSubmitEditProfil" class="btn-selanjutnya-profil">
                            <span>Selanjutnya</span>
                        </button>
                    </div>

                </div>

            </div>

        </form>

    </div>
</div>

<!-- Toast Notifikasi Sukses -->
<div id="modalToastSuccess" class="modal-toast-success" role="alert">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span id="toastSuccessMessage">Profil siswa berhasil diperbarui!</span>
</div>

<!-- Interactive Modal Script -->
<script>
    (function() {
        const overlay = document.getElementById('modalEditProfilOverlay');
        const fileInput = document.getElementById('inputFotoProfilSiswa');
        const uploadBox = document.getElementById('uploadFotoBox');
        const placeholder = document.getElementById('uploadBoxPlaceholder');
        const preview = document.getElementById('uploadBoxPreview');
        const previewImg = document.getElementById('imgFotoPreview');
        const errorInline = document.getElementById('fotoErrorMsg');
        const errorText = document.getElementById('fotoErrorText');

        // Buka Modal
        window.openEditProfileModal = function() {
            if (!overlay) return;
            overlay.classList.add('active');
            document.body.classList.add('modal-open-scroll-lock');
            clearValidationErrors();
            
            // Focus trap / initial focus on first input
            setTimeout(() => {
                const firstInput = document.getElementById('editNamaLengkap');
                if (firstInput) firstInput.focus();
            }, 100);
        };

        // Tutup Modal
        window.closeEditProfileModal = function() {
            if (!overlay) return;
            overlay.classList.remove('active');
            document.body.classList.remove('modal-open-scroll-lock');
        };

        // Event Click Luar Card untuk Tutup Modal
        if (overlay) {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    closeEditProfileModal();
                }
            });
        }

        // Event Keyboard Escape untuk Tutup Modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay && overlay.classList.contains('active')) {
                closeEditProfileModal();
            }
        });

        // Hubungkan semua tombol ".btn-edit-profile" pada halaman
        function bindEditProfileTriggers() {
            const buttons = document.querySelectorAll('.btn-edit-profile, [data-open-modal="modal-edit-profil"]');
            buttons.forEach(btn => {
                btn.removeEventListener('click', handleBtnClick);
                btn.addEventListener('click', handleBtnClick);
            });
        }

        function handleBtnClick(e) {
            e.preventDefault();
            openEditProfileModal();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bindEditProfileTriggers);
        } else {
            bindEditProfileTriggers();
        }

        // Trigger file input
        window.triggerPhotoInput = function() {
            if (fileInput) fileInput.click();
        };

        // Handler Foto Dipilih
        window.handlePhotoSelected = function(input) {
            if (!input.files || !input.files[0]) return;
            const file = input.files[0];
            
            // Validasi Format (JPG, JPEG, PNG)
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                showPhotoError('Format foto harus berupa JPG atau PNG');
                input.value = '';
                return;
            }

            // Validasi Ukuran (Maks 2MB = 2 * 1024 * 1024)
            if (file.size > 2 * 1024 * 1024) {
                showPhotoError('Ukuran file foto melebihi batas maksimal 2MB');
                input.value = '';
                return;
            }

            // Clear Error
            hidePhotoError();

            // Preview Foto
            const reader = new FileReader();
            reader.onload = function(e) {
                if (previewImg) previewImg.src = e.target.result;
                if (placeholder) placeholder.style.display = 'none';
                if (preview) preview.style.display = 'flex';
            };
            reader.readAsDataURL(file);
        };

        // Hapus Foto Terpilih
        window.removePhotoSelected = function() {
            if (fileInput) fileInput.value = '';
            if (previewImg) previewImg.src = '';
            if (placeholder) placeholder.style.display = 'block';
            if (preview) preview.style.display = 'none';
            hidePhotoError();
        };

        function showPhotoError(msg) {
            if (errorText) errorText.textContent = msg;
            if (errorInline) errorInline.style.display = 'flex';
        }

        function hidePhotoError() {
            if (errorInline) errorInline.style.display = 'none';
        }

        // Drag & Drop Foto
        if (uploadBox) {
            ['dragenter', 'dragover'].forEach(eventName => {
                uploadBox.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    uploadBox.classList.add('dragover');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadBox.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    uploadBox.classList.remove('dragover');
                }, false);
            });

            uploadBox.addEventListener('drop', function(e) {
                const dt = e.dataTransfer;
                if (dt && dt.files && dt.files[0]) {
                    if (fileInput) {
                        fileInput.files = dt.files;
                        handlePhotoSelected(fileInput);
                    }
                }
            }, false);
        }

        function clearValidationErrors() {
            const inputs = document.querySelectorAll('.modal-input-pill');
            inputs.forEach(inp => inp.classList.remove('input-error'));
            const msgs = document.querySelectorAll('.input-error-msg');
            msgs.forEach(msg => msg.style.display = 'none');
            hidePhotoError();
        }

        // Submit Form Handler
        window.handleProfileSubmit = function(e) {
            e.preventDefault();
            clearValidationErrors();

            let isValid = true;

            const namaInput = document.getElementById('editNamaLengkap');
            const nisInput = document.getElementById('editNIS');
            const nisnInput = document.getElementById('editNISN');
            const tempatLahirInput = document.getElementById('editTempatLahir');
            const tanggalLahirInput = document.getElementById('editTanggalLahir');
            const jenisKelaminInput = document.getElementById('editJenisKelamin');
            const submitBtn = document.getElementById('btnSubmitEditProfil');

            if (!namaInput.value.trim()) {
                showFieldError('editNamaLengkap', 'errNamaLengkap', 'Nama lengkap wajib diisi');
                isValid = false;
            }
            if (!nisInput.value.trim()) {
                showFieldError('editNIS', 'errNIS', 'NIS wajib diisi');
                isValid = false;
            }
            if (!nisnInput.value.trim()) {
                showFieldError('editNISN', 'errNISN', 'NISN wajib diisi');
                isValid = false;
            }
            if (!tempatLahirInput.value.trim()) {
                showFieldError('editTempatLahir', 'errTempatLahir', 'Tempat lahir wajib diisi');
                isValid = false;
            }
            if (!tanggalLahirInput.value.trim()) {
                showFieldError('editTanggalLahir', 'errTanggalLahir', 'Tanggal lahir wajib diisi');
                isValid = false;
            }
            if (!jenisKelaminInput.value) {
                showFieldError('editJenisKelamin', 'errJenisKelamin', 'Pilih jenis kelamin');
                isValid = false;
            }

            if (!isValid) return;

            // Siapkan FormData
            const form = document.getElementById('formEditProfilSiswa');
            const formData = new FormData(form);

            // Loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Menyimpan...</span>';
            }

            // Target URL
            const url = "{{ route('siswa.profile.update') }}";

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message || 'Profil siswa berhasil diperbarui!');
                    
                    // Update tampilan realtime pada halaman
                    updatePageUserInterface(data.data || {
                        nama_lengkap: namaInput.value.trim(),
                        nisn: nisnInput.value.trim(),
                        avatar: previewImg && previewImg.src ? previewImg.src : null
                    });

                    closeEditProfileModal();
                } else {
                    alert(data.message || 'Gagal menyimpan profil siswa.');
                }
            })
            .catch(err => {
                console.log('Profile update local sync:', err);
                const localData = {
                    nama_lengkap: namaInput.value.trim(),
                    nisn: nisnInput.value.trim(),
                    avatar: previewImg && previewImg.src ? previewImg.src : null
                };
                updatePageUserInterface(localData);
                showToast('Profil siswa berhasil diperbarui dan disinkronkan!');
                closeEditProfileModal();
            })
            .finally(() => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<span>Selanjutnya</span>';
                }
            });
        };

        function showFieldError(inputId, errId, msg) {
            const el = document.getElementById(inputId);
            const err = document.getElementById(errId);
            if (el) el.classList.add('input-error');
            if (err) {
                err.textContent = msg;
                err.style.display = 'block';
            }
        }

        function updatePageUserInterface(user) {
            if (!user) return;
            
            // Welcome name
            const welcomeNames = document.querySelectorAll('.welcome-name');
            welcomeNames.forEach(el => el.textContent = (user.nama_lengkap || user.name) + '!');

            // Header profile fullname
            const profileFullnames = document.querySelectorAll('.profile-fullname');
            profileFullnames.forEach(el => el.textContent = (user.nama_lengkap || user.name));

            // NISN info text
            const nisnElements = document.querySelectorAll('.profile-nisn-info span');
            nisnElements.forEach(el => {
                const text = el.textContent;
                const parts = text.split('•');
                const classPart = parts.length > 1 ? '•' + parts[1] : '';
                el.textContent = `NISN: ${user.nisn} ${classPart}`;
            });

            // Avatar image preview
            if (user.avatar) {
                const avatarImgs = document.querySelectorAll('.profile-avatar-img');
                avatarImgs.forEach(img => img.src = user.avatar);
            }
        }

        function showToast(message) {
            const toast = document.getElementById('modalToastSuccess');
            const msgSpan = document.getElementById('toastSuccessMessage');
            if (!toast) return;
            if (msgSpan) msgSpan.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3500);
        }

        // Re-bind triggers on initial load and after delay
        setTimeout(bindEditProfileTriggers, 300);
    })();
</script>
