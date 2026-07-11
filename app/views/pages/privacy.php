<?php
$title = "Kebijakan Privasi - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="max-w-4xl mx-auto mb-12">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Kebijakan Privasi</h1>
        <p class="text-gray-500 mt-3 text-sm">Terakhir diperbarui: <?= date('d M Y') ?></p>
    </div>

    <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 prose prose-indigo max-w-none text-gray-600 text-sm md:text-base leading-relaxed space-y-6">
        <p>Selamat datang di <strong>Schedulio</strong>. Kami sangat menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi yang Anda bagikan dengan kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda saat menggunakan layanan Schedulio.</p>

        <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mt-8 mb-4">1. Informasi yang Kami Kumpulkan</h2>
        <p>Saat Anda menggunakan Schedulio, kami mengumpulkan beberapa informasi dasar untuk memastikan aplikasi berjalan dengan baik:</p>
        <ul class="list-disc pl-5 space-y-2">
            <li><strong>Informasi Akun:</strong> Nama dan alamat email saat Anda melakukan pendaftaran.</li>
            <li><strong>Data Aplikasi:</strong> Informasi tugas, tingkat prioritas, tenggat waktu (deadline), dan jadwal kegiatan yang Anda masukkan ke dalam sistem.</li>
        </ul>

        <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mt-8 mb-4">2. Bagaimana Kami Menggunakan Informasi Anda</h2>
        <p>Kami menggunakan data yang dikumpulkan semata-mata untuk memberikan pengalaman terbaik dalam mengelola produktivitas Anda, seperti:</p>
        <ul class="list-disc pl-5 space-y-2">
            <li>Menyediakan, mengoperasikan, dan memelihara aplikasi Schedulio.</li>
            <li>Mengingatkan Anda tentang tenggat waktu tugas dan jadwal terdekat (melalui dashboard).</li>
            <li>Meningkatkan keamanan akun dengan sistem autentikasi yang dienkripsi.</li>
        </ul>

        <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mt-8 mb-4">3. Keamanan Data</h2>
        <p>Keamanan data Anda adalah prioritas utama kami. Kata sandi (password) Anda dienkripsi (di-hash) sebelum disimpan di database kami. Kami juga menggunakan infrastruktur cloud yang modern untuk mencegah akses yang tidak sah, kebocoran, atau modifikasi data.</p>

        <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mt-8 mb-4">4. Berbagi Data Pihak Ketiga</h2>
        <p>Kami <strong>tidak pernah</strong> menjual, menyewakan, atau membagikan informasi pribadi atau data jadwal Anda kepada pihak ketiga untuk tujuan pemasaran atau iklan. Data Anda sepenuhnya milik Anda.</p>

        <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mt-8 mb-4">5. Hubungi Kami</h2>
        <p>Jika Anda memiliki pertanyaan, masukan, atau kekhawatiran terkait Kebijakan Privasi ini, jangan ragu untuk menghubungi tim dukungan kami melalui email di <a href="mailto:support@schedulio.com" class="text-indigo-600 hover:underline font-medium">support@schedulio.com</a>.</p>
        
        <div class="mt-10 p-5 bg-indigo-50 rounded-xl border border-indigo-100 text-center">
            <p class="text-indigo-800 font-medium">Dengan menggunakan Schedulio, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini.</p>
        </div>
    </div>
    
    <div class="mt-8 text-center">
        <a href="/dashboard" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all">
            <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>