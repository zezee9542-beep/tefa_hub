import fs from 'node:fs/promises';
import path from 'node:path';
import { pathToFileURL } from 'node:url';
import { Presentation, PresentationFile } from '@oai/artifact-tool';

const workspaceDir = 'C:/xampp/htdocs/tefa_hub';
const SKILL_DIR = 'C:/Users/muhammad zackly i/.codex/plugins/cache/openai-primary-runtime/presentations/26.909.12148/skills/presentations';
const TMP_DIR = path.join(workspaceDir, '.codex-pitchdeck-build');
const FINAL_PPTX = path.join(workspaceDir, 'deliverables', 'TEFA-Hub_Pitch_Deck_v2.pptx');
const RUNTIME_PYTHON = 'C:/Users/muhammad zackly i/.cache/codex-runtimes/codex-primary-runtime/dependencies/python/python.exe';

const { resolvePresentationFont, finalizePresentation } = await import(
  pathToFileURL(path.join(SKILL_DIR, 'container_tools', 'artifact_tool_utils.mjs')).href,
);

await fs.mkdir(TMP_DIR, { recursive: true });
await fs.mkdir(path.dirname(FINAL_PPTX), { recursive: true });

const font = resolvePresentationFont();
const deck = Presentation.create({ slideSize: { width: 1280, height: 720 } });

const C = {
  ink: '#112342',
  blue: '#2563EB',
  blueDark: '#1649BC',
  purple: '#7C3AED',
  muted: '#64748B',
  light: '#F7FAFF',
  pale: '#EAF2FF',
  palePurple: '#F2EDFF',
  line: '#DCE6F5',
  green: '#059669',
  orange: '#EA6A2A',
  white: '#FFFFFF',
};

const source = (relative) => path.join(workspaceDir, relative);

async function addImage(slide, relative, position, options = {}) {
  const filePath = source(relative);
  const extension = path.extname(filePath).toLowerCase();
  const contentType = extension === '.jpg' || extension === '.jpeg' ? 'image/jpeg' : 'image/png';
  slide.images.add({
    blob: await fs.readFile(filePath),
    contentType,
    position,
    alt: options.alt ?? path.basename(relative),
    fit: options.fit ?? 'contain',
    ...(options.geometry ? { geometry: options.geometry } : {}),
    ...(options.borderRadius ? { borderRadius: options.borderRadius } : {}),
    ...(options.crop ? { crop: options.crop } : {}),
  });
}

function addText(slide, text, position, style = {}) {
  const shape = slide.shapes.add({
    geometry: 'textbox',
    position,
    fill: 'none',
    line: { style: 'solid', fill: 'none', width: 0 },
  });
  shape.text = text;
  shape.text.style = {
    typeface: font,
    fontSize: style.fontSize ?? 18,
    color: style.color ?? C.ink,
    bold: style.bold ?? false,
    alignment: style.alignment ?? 'left',
    autoFit: 'shrinkText',
    ...(style.italic ? { italic: true } : {}),
  };
  return shape;
}

function addRect(slide, position, fill, radius = 0, line = 'none') {
  return slide.shapes.add({
    geometry: 'rect',
    position,
    fill,
    line: { style: 'solid', fill: line, width: line === 'none' ? 0 : 1 },
    ...(radius ? { borderRadius: radius } : {}),
  });
}

function addLine(slide, position, color, width = 2) {
  return slide.shapes.add({
    geometry: 'line',
    position,
    fill: 'none',
    line: { style: 'solid', fill: color, width },
  });
}

function addSlideNumber(slide, number) {
  addText(slide, String(number).padStart(2, '0'), { left: 1174, top: 655, width: 40, height: 22 }, {
    fontSize: 11, color: '#94A3B8', bold: true, alignment: 'right',
  });
  addLine(slide, { left: 1130, top: 666, width: 30, height: 0 }, C.blue, 2);
}

function addTitle(slide, title, eyebrow, number) {
  addText(slide, eyebrow.toUpperCase(), { left: 72, top: 48, width: 550, height: 22 }, {
    fontSize: 11, color: C.blue, bold: true,
  });
  addText(slide, title, { left: 72, top: 77, width: 900, height: 50 }, {
    fontSize: 34, color: C.ink, bold: true,
  });
  addLine(slide, { left: 72, top: 143, width: 84, height: 0 }, C.blue, 4);
  addSlideNumber(slide, number);
}

function addPill(slide, label, position, fill = C.pale, color = C.blue) {
  addRect(slide, position, fill, 999);
  addText(slide, label, { left: position.left + 14, top: position.top + 7, width: position.width - 28, height: position.height - 10 }, {
    fontSize: 11, color, bold: true, alignment: 'center',
  });
}

function addSectionItem(slide, number, title, description, top, accent = C.blue) {
  addText(slide, number, { left: 76, top, width: 30, height: 28 }, { fontSize: 17, color: accent, bold: true });
  addText(slide, title, { left: 122, top: top - 1, width: 336, height: 25 }, { fontSize: 17, color: C.ink, bold: true });
  addText(slide, description, { left: 122, top: top + 28, width: 350, height: 52 }, { fontSize: 14, color: C.muted });
}

// Slide 1 — Cover
{
  const slide = deck.slides.add();
  slide.background.fill = C.light;
  addRect(slide, { left: 0, top: 0, width: 1280, height: 720 }, '#F8FBFF');
  addRect(slide, { left: 0, top: 0, width: 510, height: 720 }, '#F1F6FF');
  addRect(slide, { left: 964, top: 0, width: 316, height: 720 }, '#EAF2FF');
  addImage(slide, 'public/assets/logo.png', { left: 72, top: 54, width: 52, height: 52 }, { alt: 'Logo TEFA-Hub' });
  addText(slide, 'TEFA-Hub', { left: 137, top: 64, width: 230, height: 34 }, { fontSize: 24, color: C.ink, bold: true });
  addPill(slide, 'BOOTCAMP & FINAL  •  WEB DEVELOPMENT', { left: 72, top: 166, width: 290, height: 34 }, '#E6F0FF');
  addText(slide, 'TEFA-Hub', { left: 72, top: 224, width: 350, height: 32 }, {
    fontSize: 24, color: C.blue, bold: true,
  });
  addText(slide, 'Ekosistem digital terpadu untuk perjalanan siswa SMK', { left: 72, top: 264, width: 610, height: 153 }, {
    fontSize: 43, color: C.ink, bold: true,
  });
  addText(slide, 'Platform TEFA-Hub menyatukan layanan akademik, karya BLUD, akses karier BKK, dan bantuan informasi dalam satu pengalaman web.', { left: 75, top: 434, width: 540, height: 72 }, {
    fontSize: 18, color: C.muted,
  });
  addLine(slide, { left: 72, top: 554, width: 540, height: 0 }, C.line, 1);
  addText(slide, 'Nama tim: [Isi nama tim]\nAnggota: [Isi nama anggota 1, 2, 3]\nAsal sekolah: [Isi nama sekolah]', { left: 72, top: 576, width: 450, height: 72 }, {
    fontSize: 14, color: C.ink, bold: true,
  });
  addImage(slide, 'public/assets/human.png', { left: 704, top: 102, width: 500, height: 577 }, { alt: 'Siswa pengguna TEFA-Hub' });
  addText(slide, 'Pitch deck proyek', { left: 1032, top: 663, width: 170, height: 22 }, { fontSize: 11, color: C.blue, bold: true, alignment: 'right' });
  slide.speakerNotes.textFrame.setText('Pembuka. Sampaikan bahwa TEFA-Hub menghubungkan kebutuhan belajar, produksi, dan karier siswa dalam satu platform. Ganti nama tim dan asal sekolah sebelum presentasi. Sumber visual: public/assets/logo.png dan public/assets/human.png.');
}

// Slide 2 — Features and technology
{
  const slide = deck.slides.add();
  slide.background.fill = '#FFFFFF';
  addTitle(slide, 'Fitur dan teknologi', 'Produk', 2);
  addText(slide, 'TEFA-Hub menyediakan alur layanan yang berbeda sesuai peran pengguna.', { left: 72, top: 170, width: 500, height: 32 }, { fontSize: 18, color: C.muted });
  addSectionItem(slide, '1', 'Akses berbasis peran', 'Halaman dan izin terpisah untuk siswa, guru, dan administrator dengan Spatie Permission.', 242, C.blue);
  addSectionItem(slide, '2', 'Modul vokasi', 'Akademik, publikasi produk BLUD, lowongan serta lamaran BKK, profil, dan riwayat aktivitas.', 352, C.purple);
  addSectionItem(slide, '3', 'Tanya Tefa AI', 'Navigator berbasis intent untuk PPDB, akademik, BLUD, BKK, bantuan akun, dan layanan administrasi.', 462, C.orange);
  addRect(slide, { left: 600, top: 181, width: 600, height: 392 }, '#F4F8FF', 28);
  addImage(slide, 'public/assets/ai.png', { left: 748, top: 184, width: 310, height: 292 }, { alt: 'Ilustrasi Tanya Tefa AI' });
  addText(slide, 'Teknologi inti', { left: 638, top: 488, width: 200, height: 24 }, { fontSize: 14, color: C.ink, bold: true });
  addText(slide, 'Laravel 13, PHP 8.5, Blade, MySQL, Vite, Tailwind CSS, JavaScript, dan Spatie Laravel Permission', { left: 638, top: 519, width: 514, height: 44 }, { fontSize: 15, color: C.muted });
  addText(slide, 'Implementasi aplikasi', { left: 72, top: 612, width: 172, height: 18 }, { fontSize: 11, color: '#94A3B8', bold: true });
  addText(slide, '26 route aplikasi mencakup halaman publik, autentikasi, dashboard siswa, API data, AI Navigator, dan monitor admin.', { left: 72, top: 638, width: 975, height: 24 }, { fontSize: 15, color: C.ink });
  slide.speakerNotes.textFrame.setText('Jelaskan tiga kelompok fitur utama dan teknologi yang benar-benar ada di proyek. Sumber: routes/web.php, composer show --direct, package.json, app/Http/Controllers/AiNavigatorController.php.');
}

// Slide 3 — Optimization and scalability
{
  const slide = deck.slides.add();
  slide.background.fill = '#F8FBFF';
  addTitle(slide, 'Optimasi dan strategi skalabilitas', 'Produksi', 3);
  addText(slide, 'Optimasi yang sudah dipakai menjaga proses deploy dan respons aplikasi tetap efisien.', { left: 72, top: 170, width: 730, height: 30 }, { fontSize: 18, color: C.muted });
  addRect(slide, { left: 72, top: 230, width: 522, height: 340 }, '#FFFFFF', 22, C.line);
  addText(slide, 'Sudah diimplementasikan', { left: 104, top: 262, width: 300, height: 24 }, { fontSize: 18, color: C.ink, bold: true });
  addText(slide, 'Cache aplikasi', { left: 104, top: 308, width: 160, height: 24 }, { fontSize: 15, color: C.blue, bold: true });
  addText(slide, 'Jawaban Tanya Tefa AI disimpan 2 sampai 24 jam sesuai sumber respons agar pertanyaan berulang tidak selalu memanggil API.', { left: 104, top: 337, width: 420, height: 42 }, { fontSize: 13, color: C.muted });
  addText(slide, 'Cache saat deploy', { left: 104, top: 397, width: 180, height: 24 }, { fontSize: 15, color: C.blue, bold: true });
  addText(slide, 'Pipeline produksi membuat cache konfigurasi, route, dan view setelah migration dijalankan.', { left: 104, top: 426, width: 410, height: 36 }, { fontSize: 13, color: C.muted });
  addText(slide, 'Waktu tunggu AI', { left: 104, top: 480, width: 180, height: 24 }, { fontSize: 15, color: C.blue, bold: true });
  addText(slide, 'Permintaan ke layanan AI memakai timeout 4 detik dan meneruskan fallback pengetahuan lokal bila layanan eksternal tidak tersedia.', { left: 104, top: 509, width: 420, height: 42 }, { fontSize: 13, color: C.muted });
  addRect(slide, { left: 640, top: 230, width: 560, height: 340 }, '#112342', 22);
  addText(slide, 'Saat traffic meningkat', { left: 674, top: 262, width: 340, height: 24 }, { fontSize: 18, color: C.white, bold: true });
  addText(slide, '1', { left: 675, top: 326, width: 22, height: 24 }, { fontSize: 17, color: '#92B8FF', bold: true });
  addText(slide, 'Pindahkan cache, session, dan queue dari database ke Redis.', { left: 716, top: 324, width: 420, height: 25 }, { fontSize: 15, color: C.white, bold: true });
  addText(slide, '2', { left: 675, top: 390, width: 22, height: 24 }, { fontSize: 17, color: '#92B8FF', bold: true });
  addText(slide, 'Jalankan queue worker untuk proses yang tidak harus selesai di permintaan pengguna.', { left: 716, top: 388, width: 425, height: 42 }, { fontSize: 15, color: C.white, bold: true });
  addText(slide, '3', { left: 675, top: 465, width: 22, height: 24 }, { fontSize: 17, color: '#92B8FF', bold: true });
  addText(slide, 'Tambahkan indeks database, pemantauan query lambat, reverse proxy, dan load balancer bila kapasitas satu server tidak cukup.', { left: 716, top: 463, width: 430, height: 57 }, { fontSize: 15, color: C.white, bold: true });
  addText(slide, 'Strategi berikutnya bergantung pada hasil benchmark nyata dan pola trafik pengguna.', { left: 72, top: 620, width: 800, height: 24 }, { fontSize: 15, color: C.ink, italic: true });
  slide.speakerNotes.textFrame.setText('Bedakan optimasi yang sudah terdapat dalam aplikasi dengan strategi skala berikutnya. Jangan menyampaikan rencana Redis atau load balancer sebagai fitur yang sudah aktif. Sumber: app/Http/Controllers/AiNavigatorController.php dan .github/workflows/deploy.yml.');
}

// Slide 4 — Testing and analysis
{
  const slide = deck.slides.add();
  slide.background.fill = '#FFFFFF';
  addTitle(slide, 'Uji performa dan analisis', 'Validasi', 4);
  addText(slide, 'Pengukuran beban perlu dilakukan dengan skenario yang merepresentasikan penggunaan nyata.', { left: 72, top: 170, width: 840, height: 30 }, { fontSize: 18, color: C.muted });
  addLine(slide, { left: 425, top: 238, width: 0, height: 340 }, C.line, 1);
  addLine(slide, { left: 838, top: 238, width: 0, height: 340 }, C.line, 1);
  addText(slide, 'Validasi saat ini', { left: 72, top: 231, width: 250, height: 25 }, { fontSize: 19, color: C.ink, bold: true });
  addText(slide, 'Pengujian Laravel memverifikasi halaman utama mengembalikan HTTP 200. Cache Blade juga berhasil dibuat sebelum deploy.', { left: 72, top: 276, width: 305, height: 83 }, { fontSize: 16, color: C.muted });
  addText(slide, 'Bukti yang tersedia', { left: 72, top: 402, width: 220, height: 22 }, { fontSize: 13, color: C.blue, bold: true });
  addText(slide, 'php artisan test\nphp artisan view:cache\nRoute list aplikasi', { left: 72, top: 434, width: 260, height: 78 }, { fontSize: 15, color: C.ink, bold: true });
  addText(slide, 'Benchmark berikutnya', { left: 462, top: 231, width: 300, height: 25 }, { fontSize: 19, color: C.ink, bold: true });
  addText(slide, 'Lighthouse mengukur LCP, CLS, dan Total Blocking Time halaman publik.\n\nk6 atau ApacheBench menjalankan 20, 50, lalu 100 pengguna bersamaan pada halaman utama, login, dan API dashboard.\n\nLaravel Pail, access log, serta slow query log mencatat error dan titik bottleneck.', { left: 462, top: 277, width: 315, height: 225 }, { fontSize: 15, color: C.muted });
  addText(slide, 'Output keputusan', { left: 875, top: 231, width: 260, height: 25 }, { fontSize: 19, color: C.ink, bold: true });
  addText(slide, 'Catat p95 latency, error rate, CPU, memori, dan waktu query.\n\nJika hasil melewati kapasitas server, prioritaskan Redis, indeks database, queue worker, dan cache aset statis.', { left: 875, top: 277, width: 302, height: 148 }, { fontSize: 15, color: C.muted });
  addRect(slide, { left: 875, top: 472, width: 270, height: 72 }, '#FFF7ED', 14);
  addText(slide, 'Catatan penting\nBelum ada angka benchmark yang direkam.', { left: 895, top: 488, width: 230, height: 42 }, { fontSize: 14, color: '#B45309', bold: true });
  addText(slide, 'Kejujuran data memperkuat presentasi teknis.', { left: 72, top: 624, width: 550, height: 22 }, { fontSize: 15, color: C.ink, italic: true });
  slide.speakerNotes.textFrame.setText('Jelaskan bahwa validasi aplikasi sudah dilakukan, tetapi benchmark beban belum direkam sehingga deck tidak menampilkan angka fiktif. Jelaskan rencana uji dan metrik yang akan dipakai. Sumber: tests/Feature/ExampleTest.php, hasil php artisan view:cache, serta rancangan pengujian tim.');
}

// Slide 5 — Deployment result
{
  const slide = deck.slides.add();
  slide.background.fill = '#F8FBFF';
  addTitle(slide, 'Hasil deploy website', 'Rilis', 5);
  addText(slide, 'Tampilan landing page menunjukkan akses awal ke Akademik, BLUD, BKK, PPDB, dan autentikasi pengguna.', { left: 72, top: 170, width: 812, height: 30 }, { fontSize: 18, color: C.muted });
  addRect(slide, { left: 72, top: 226, width: 690, height: 388 }, '#FFFFFF', 20, C.line);
  addImage(slide, 'public/preview2.png', { left: 87, top: 241, width: 660, height: 358 }, {
    alt: 'Tampilan landing page TEFA-Hub yang telah dideploy', fit: 'cover', geometry: 'roundRect', borderRadius: 14,
  });
  addText(slide, 'Target publik', { left: 825, top: 236, width: 180, height: 20 }, { fontSize: 12, color: C.blue, bold: true });
  addText(slide, 'tefahub.my.id', { left: 825, top: 266, width: 305, height: 34 }, { fontSize: 26, color: C.ink, bold: true });
  addLine(slide, { left: 825, top: 321, width: 320, height: 0 }, C.line, 1);
  addText(slide, 'Alur deploy', { left: 825, top: 347, width: 180, height: 22 }, { fontSize: 16, color: C.ink, bold: true });
  addText(slide, 'Push ke branch main memulai GitHub Actions. Workflow mengunggah aplikasi melalui SCP ke VPS Webuzo, memasang dependensi production, menjalankan migration, lalu membangun cache konfigurasi, route, dan view.', { left: 825, top: 381, width: 325, height: 132 }, { fontSize: 15, color: C.muted });
  addPill(slide, 'GitHub Actions', { left: 825, top: 540, width: 145, height: 34 }, '#EAF2FF');
  addPill(slide, 'Webuzo VPS', { left: 984, top: 540, width: 132, height: 34 }, '#F2EDFF', C.purple);
  addText(slide, 'Screenshot UI berasal dari hasil implementasi proyek.', { left: 72, top: 638, width: 540, height: 20 }, { fontSize: 13, color: '#94A3B8', italic: true });
  slide.speakerNotes.textFrame.setText('Tunjukkan screenshot landing page. Jelaskan alur push sampai cache Laravel aktif di VPS. Sumber: public/preview2.png dan .github/workflows/deploy.yml.');
}

// Slide 6 — Conclusion
{
  const slide = deck.slides.add();
  slide.background.fill = C.ink;
  addImage(slide, 'public/assets/logo.png', { left: 72, top: 58, width: 48, height: 48 }, { alt: 'Logo TEFA-Hub' });
  addText(slide, 'Kesimpulan dan rencana pengembangan', { left: 72, top: 145, width: 930, height: 58 }, { fontSize: 38, color: C.white, bold: true });
  addText(slide, 'TEFA-Hub telah membangun fondasi platform vokasi yang memadukan layanan sekolah dan kebutuhan pengguna dalam satu aplikasi web.', { left: 72, top: 220, width: 900, height: 56 }, { fontSize: 19, color: '#C9D8F5' });
  addLine(slide, { left: 72, top: 316, width: 1136, height: 0 }, '#3A547D', 1);
  addText(slide, 'Capaian saat ini', { left: 72, top: 355, width: 300, height: 25 }, { fontSize: 18, color: '#92B8FF', bold: true });
  addText(slide, 'Akses per peran, modul Akademik, BLUD, BKK, AI Navigator, riwayat aktivitas, dan alur deploy otomatis sudah tersedia dalam proyek.', { left: 72, top: 397, width: 468, height: 92 }, { fontSize: 17, color: C.white });
  addText(slide, 'Langkah berikutnya', { left: 664, top: 355, width: 300, height: 25 }, { fontSize: 18, color: '#92B8FF', bold: true });
  addText(slide, 'Merekam baseline performa, memperkuat cache dan queue, meningkatkan keamanan HTTPS, serta menambahkan monitoring uptime dan database.', { left: 664, top: 397, width: 454, height: 92 }, { fontSize: 17, color: C.white });
  addRect(slide, { left: 72, top: 566, width: 1136, height: 1 }, '#3A547D');
  addText(slide, 'Terima kasih', { left: 72, top: 605, width: 340, height: 38 }, { fontSize: 28, color: C.white, bold: true });
  addText(slide, 'Nama tim: [Isi nama tim]  |  TEFA-Hub', { left: 72, top: 651, width: 440, height: 22 }, { fontSize: 14, color: '#C9D8F5' });
  addText(slide, '06', { left: 1175, top: 655, width: 40, height: 22 }, { fontSize: 11, color: '#C9D8F5', bold: true, alignment: 'right' });
  slide.speakerNotes.textFrame.setText('Tutup dengan capaian yang sudah ada, lalu tunjukkan bahwa pengembangan berikutnya terukur dan realistis. Ganti nama tim sebelum presentasi. Sumber: rangkuman fitur, workflow deploy, dan rencana teknis tim.');
}

const candidatePath = path.join(TMP_DIR, 'candidate_tefa_hub_pitchdeck_v2.pptx');
await (await PresentationFile.exportPptx(deck)).save(candidatePath);

const requirements = {
  explicitTotalSlideCount: 6,
  requiredNativeTableOwnerSlides: [],
  requiredNativeChartOwnerSlides: [],
};

const result = await finalizePresentation({
  ...requirements,
  workspaceDir,
  candidatePath,
  finalPath: FINAL_PPTX,
  pythonExecutable: RUNTIME_PYTHON,
  integrityValidatorPath: path.join(SKILL_DIR, 'container_tools', 'inspect_presentation_package_integrity.py'),
  layoutValidatorPath: path.join(SKILL_DIR, 'container_tools', 'inspect_presentation_layout_geometry.py'),
  layoutArgs: [
    '--expected-slide-size-emu', '12192000,6858000',
    '--validate-bullet-geometry',
    '--validate-heading-fit',
  ],
  requiredNativeTableOwnerSlides: [],
  fontPolicy: { basis: 'design', families: [font] },
  verifyArtifactToolImport: true,
  receiptPath: path.join(TMP_DIR, 'TEFA-Hub_Pitch_Deck_v2.validation.json'),
});

console.log(JSON.stringify({ font, candidatePath, finalPath: FINAL_PPTX, result }, null, 2));
