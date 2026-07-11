<?php
$title = "Bantuan - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Pusat Bantuan</h1>
    <p class="text-gray-600 text-sm mt-1">Temukan jawaban atas pertanyaan Anda seputar Schedulio di sini.</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100 divide-y divide-gray-100">
    <div class="pb-6">
        <h3 class="font-bold text-lg text-gray-800">Bagaimana cara menambahkan tugas baru?</h3>
        <p class="text-gray-600 mt-2">
            Anda dapat menavigasi ke menu "Tugas" di bagian atas, kemudian klik tombol "Tambah Tugas". Isi formulir nama, deskripsi, tingkat kesulitan, kepentingan, dan <em>deadline</em>, lalu simpan.
        </p>
    </div>
    
    <div class="py-6">
        <h3 class="font-bold text-lg text-gray-800">Bagaimana jadwal direkomendasikan?</h3>
        <p class="text-gray-600 mt-2">
            Schedulio menggunakan algoritma pembobotan khusus di backend untuk mengalkulasi prioritas berdasarkan kombinasi tingkat kepentingan, kesulitan, dan sisa waktu menuju <em>deadline</em>. Lihat hasilnya di menu "Jadwal".
        </p>
    </div>

    <div class="py-6">
        <h3 class="font-bold text-lg text-gray-800">Apakah data tugas saya aman?</h3>
        <p class="text-gray-600 mt-2">
            Tentu saja. Akses ke dalam sistem dilindungi dengan enkripsi token (JWT) sehingga data akun dan manajemen tugas Anda aman dan privat.
        </p>
    </div>

    <div class="pt-6">
        <h3 class="font-bold text-lg text-gray-800">Butuh bantuan lebih lanjut?</h3>
        <p class="text-gray-600 mt-2">
            Jika Anda mengalami kendala atau menemukan <em>bug</em>, silakan hubungi tim pengembangan kami melalui email di <strong class="text-indigo-600">support@schedulio.com</strong>.
        </p>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>