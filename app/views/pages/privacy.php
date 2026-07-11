<?php
$title = "Kebijakan Privasi - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Kebijakan Privasi</h1>
    <p class="text-gray-600 text-sm mt-1">Terakhir diperbarui: <?= date('d M Y') ?></p>
</div>

<div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
    <p class="text-gray-700 mb-6">
        Privasi Anda sangat penting bagi Schedulio. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat menggunakan aplikasi kami.
    </p>
    
    <h3 class="font-bold text-lg text-gray-800 mt-6">1. Pengumpulan Data</h3>
    <p class="text-gray-600 mt-2 mb-4">
        Kami mengumpulkan informasi yang Anda berikan secara langsung saat mendaftar, termasuk nama, alamat email, kata sandi, serta seluruh konten tugas (nama tugas, deskripsi, tingkat kesulitan) yang Anda masukkan.
    </p>
    
    <h3 class="font-bold text-lg text-gray-800 mt-6">2. Penggunaan Data</h3>
    <p class="text-gray-600 mt-2 mb-4">
        Data Anda kami gunakan semata-mata untuk mengoperasikan fungsi inti Schedulio, yaitu menampilkan manajemen tugas, memberikan rekomendasi prioritas (melalui algoritma ranking), dan menjaga kelancaran sesi login Anda.
    </p>
    
    <h3 class="font-bold text-lg text-gray-800 mt-6">3. Perlindungan & Keamanan</h3>
    <p class="text-gray-600 mt-2 mb-4">
        Kata sandi Anda disimpan menggunakan algoritma <em>hashing</em> yang aman. Kami tidak akan pernah menjual, menyewakan, atau membagikan data pribadi Anda kepada pihak ketiga untuk kepentingan komersial tanpa persetujuan eksplisit dari Anda.
    </p>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>