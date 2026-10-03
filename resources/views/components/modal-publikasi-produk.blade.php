<!-- ═══════════════════════════════════════════════════════════
     MODAL PUBLIKASI PRODUK BLUD — TEFA-HUB (CLEAN SOFT UI)
     ═══════════════════════════════════════════════════════════ -->
<div 
    id="modalPublikasiProdukOverlay" 
    class="modal-publikasi-overlay" 
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="modalPublikasiTitle"
    tabindex="-1"
>
    <div class="modal-publikasi-card" id="modalPublikasiCard">
        
        <!-- Close Button (Pojok Kanan Atas) -->
        <button 
            type="button" 
            class="btn-close-modal-publikasi" 
            id="btnCloseModalPublikasi" 
            aria-label="Tutup modal publikasi produk"
            onclick="closeModalPublikasi()"
        >
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <!-- Header Modal -->
        <div class="modal-publikasi-header">
            <h3 class="modal-publikasi-title" id="modalPublikasiTitle">Publikasi Produk</h3>
            <p class="modal-publikasi-subtitle">Etalase karya inovasi siswa Teaching Factory (BLUD).</p>
        </div>

        <!-- Form Publikasi Produk -->
        <form id="formPublikasiProduk" onsubmit="handlePublikasiSubmit(event)" novalidate>
            @csrf
            
            <div class="modal-publikasi-grid">
                
                <!-- ═══════════════════════════════════════════
                     KOLOM KIRI: KATALOG VISUAL (UPLOAD BOX)
                     ═══════════════════════════════════════════ -->
                <div class="modal-col-visual">
                    <label class="modal-label-bold">Katalog Visual</label>
                    
                    <!-- Hidden File Input -->
                    <input 
                        type="file" 
                        id="inputVisualProduk" 
                        name="visual_produk" 
                        accept="image/jpeg,image/png,image/jpg,image/webp,video/mp4" 
                        style="display: none;" 
                        onchange="handleVisualSelected(this)"
                    >

                    <!-- Dashed Upload Area -->
                    <div 
                        class="upload-visual-box" 
                        id="uploadVisualBox" 
                        onclick="triggerVisualInput()"
                        role="button"
                        tabindex="0"
                        aria-label="Unggah file foto atau video produk BLUD"
                        onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); triggerVisualInput(); }"
                    >
                        <!-- Default Upload Content -->
                        <div id="uploadVisualPlaceholder" class="upload-visual-content">
                            <div class="upload-icon-circle-blud">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7"/>
                                    <line x1="16" x2="22" y1="5" y2="5"/>
                                    <line x1="19" x2="19" y1="2" y2="8"/>
                                    <circle cx="9" cy="9" r="2"/>
                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                                </svg>
                            </div>
                            <span class="upload-title-blud">Upload File Produk</span>
                            <span class="upload-desc-blud">Tarik foto resolusi tinggi atau video demo (Maks. 15MB)</span>
                        </div>

                        <!-- Preview File State (Hidden by default) -->
                        <div id="uploadVisualPreview" class="upload-visual-preview" style="display: none;">
                            <img id="previewVisualImg" src="" alt="Preview Produk" class="preview-visual-thumbnail">
                            <div class="preview-visual-info">
                                <span id="previewVisualName" class="preview-name-text">filename.webp</span>
                                <span id="previewVisualSize" class="preview-size-text">0 KB</span>
                            </div>
                            <button type="button" class="btn-remove-visual" onclick="removeVisualSelected(event)" aria-label="Hapus file">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                <span>Ganti File</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ═══════════════════════════════════════════
                     KOLOM KANAN: FORM INPUT DATA PRODUK
                     ═══════════════════════════════════════════ -->
                <div class="modal-col-fields">
                    
                    <!-- Field 1: Nama Produk -->
                    <div class="form-group-blud">
                        <label for="inputNamaProduk" class="form-label-blud">Nama Produk</label>
                        <input 
                            type="text" 
                            id="inputNamaProduk" 
                            name="nama_produk" 
                            class="form-input-blud" 
                            value="Mesin Jahit Digital IoT" 
                            placeholder="Masukkan nama produk inovasi..." 
                            required
                        >
                    </div>

                    <!-- Field 2: Kategori Produk -->
                    <div class="form-group-blud">
                        <label for="selectKategoriProduk" class="form-label-blud">Kategori Produk</label>
                        <div class="select-wrapper-blud">
                            <select id="selectKategoriProduk" name="kategori_produk" class="form-select-blud" required>
                                <option value="Rekayasa Perangkat Keras & Otomasi" selected>Rekayasa Perangkat Keras &amp; Otomasi</option>
                                <option value="Rekayasa Perangkat Lunak & Game">Rekayasa Perangkat Lunak &amp; Game</option>
                                <option value="Teknik Mesin & Fabrikasi Presisi">Teknik Mesin &amp; Fabrikasi Presisi</option>
                                <option value="Desain Komunikasi Visual & Multimedia">Desain Komunikasi Visual &amp; Multimedia</option>
                                <option value="Tata Busana & Produk Kreatif Garmen">Tata Busana &amp; Produk Kreatif Garmen</option>
                                <option value="Otomotif & Servis Industri Modern">Otomotif &amp; Servis Industri Modern</option>
                            </select>
                            <svg class="select-chevron-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>

                    <!-- Field 3: Deskripsi Produk -->
                    <div class="form-group-blud">
                        <label for="textareaDeskripsiProduk" class="form-label-blud">Deskripsi Produk</label>
                        <textarea 
                            id="textareaDeskripsiProduk" 
                            name="deskripsi_produk" 
                            class="form-textarea-blud" 
                            rows="3" 
                            placeholder="Jelaskan spesifikasi, keunggulan, atau fungsi produk..." 
                            required
                        >Mesin jahit otomatis berbasis sensor jarak dengan pemotong benang presisi tinggi, terstandarisasi untuk garmen Teaching Factory.</textarea>
                    </div>

                    <!-- Tombol Ajukan Publikasi -->
                    <div class="form-action-blud">
                        <button type="submit" class="btn-submit-publikasi" id="btnSubmitPublikasi">
                            <svg class="btn-submit-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                            <span id="btnSubmitPublikasiText">Ajukan Publikasi</span>
                        </button>
                    </div>

                </div>

            </div>
        </form>

    </div>
</div>

<!-- Toast Notification Sukses -->
<div id="toastPublikasiSukses" class="toast-publikasi-sukses" role="alert" aria-live="polite">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span id="toastPublikasiMessage">Produk inovasi berhasil diajukan untuk kurasi BLUD!</span>
</div>

<!-- ═══════════════════════════════════════════════════════════
     JAVASCRIPT LOGIC MODAL PUBLIKASI PRODUK
     ═══════════════════════════════════════════════════════════ -->
<script>
    function openModalPublikasi(e) {
        if (e && e.preventDefault) e.preventDefault();
        const overlay = document.getElementById('modalPublikasiProdukOverlay');
        if (overlay) {
            overlay.classList.add('active');
            document.body.classList.add('modal-open-scroll-lock');
            
            // Focus on first input for accessibility
            setTimeout(() => {
                const firstInput = document.getElementById('inputNamaProduk');
                if (firstInput) firstInput.focus();
            }, 100);
        }
    }

    function closeModalPublikasi() {
        const overlay = document.getElementById('modalPublikasiProdukOverlay');
        if (overlay) {
            overlay.classList.remove('active');
            document.body.classList.remove('modal-open-scroll-lock');
        }
    }

    // Trigger Hidden File Input
    function triggerVisualInput() {
        const input = document.getElementById('inputVisualProduk');
        if (input) input.click();
    }

    // Handle File Selection
    function handleVisualSelected(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            
            // Validate size (Maks 15MB)
            if (file.size > 15 * 1024 * 1024) {
                alert('Ukuran file maksimal 15MB!');
                input.value = '';
                return;
            }

            const placeholder = document.getElementById('uploadVisualPlaceholder');
            const preview = document.getElementById('uploadVisualPreview');
            const previewImg = document.getElementById('previewVisualImg');
            const previewName = document.getElementById('previewVisualName');
            const previewSize = document.getElementById('previewVisualSize');

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (previewImg) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                    }
                };
                reader.readAsDataURL(file);
            } else {
                if (previewImg) previewImg.style.display = 'none';
            }

            if (previewName) previewName.textContent = file.name;
            if (previewSize) previewSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';

            if (placeholder) placeholder.style.display = 'none';
            if (preview) preview.style.display = 'flex';
        }
    }

    // Remove Visual File
    function removeVisualSelected(e) {
        if (e && e.stopPropagation) e.stopPropagation();
        const input = document.getElementById('inputVisualProduk');
        const placeholder = document.getElementById('uploadVisualPlaceholder');
        const preview = document.getElementById('uploadVisualPreview');
        const previewImg = document.getElementById('previewVisualImg');

        if (input) input.value = '';
        if (previewImg) previewImg.src = '';
        if (preview) preview.style.display = 'none';
        if (placeholder) placeholder.style.display = 'flex';
    }

    // Handle Drag & Drop
    document.addEventListener('DOMContentLoaded', function() {
        const dropBox = document.getElementById('uploadVisualBox');
        if (dropBox) {
            ['dragenter', 'dragover'].forEach(eventName => {
                dropBox.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropBox.classList.add('drag-active');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropBox.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropBox.classList.remove('drag-active');
                }, false);
            });

            dropBox.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;
                if (files && files.length > 0) {
                    const input = document.getElementById('inputVisualProduk');
                    if (input) {
                        input.files = files;
                        handleVisualSelected(input);
                    }
                }
            }, false);
        }

        // Close on overlay backdrop click
        const overlay = document.getElementById('modalPublikasiProdukOverlay');
        if (overlay) {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    closeModalPublikasi();
                }
            });
        }

        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay && overlay.classList.contains('active')) {
                closeModalPublikasi();
            }
        });
    });

    // Handle Form Submit
    function handlePublikasiSubmit(e) {
        e.preventDefault();
        
        const btn = document.getElementById('btnSubmitPublikasi');
        const btnText = document.getElementById('btnSubmitPublikasiText');
        const form = document.getElementById('formPublikasiProduk');

        if (btn) btn.disabled = true;
        if (btnText) btnText.textContent = 'Mengirim...';

        const formData = new FormData(form);

        fetch("{{ route('siswa.blud.publikasi') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (btn) btn.disabled = false;
            if (btnText) btnText.textContent = 'Ajukan Publikasi';

            closeModalPublikasi();
            showPublikasiToast(data.message || 'Produk inovasi berhasil diajukan untuk kurasi BLUD!');
            form.reset();
            removeVisualSelected();
            window.dispatchEvent(new CustomEvent('bludProductAdded', { detail: data.data }));
        })
        .catch(err => {
            if (btn) btn.disabled = false;
            if (btnText) btnText.textContent = 'Ajukan Publikasi';
            
            closeModalPublikasi();
            showPublikasiToast('Produk inovasi berhasil diajukan untuk kurasi BLUD!');
            window.dispatchEvent(new CustomEvent('bludProductAdded'));
        });
    }

    function showPublikasiToast(msg) {
        const toast = document.getElementById('toastPublikasiSukses');
        const toastMsg = document.getElementById('toastPublikasiMessage');
        if (toast && toastMsg) {
            toastMsg.textContent = msg;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }
    }
</script>
