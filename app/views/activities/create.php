<?php
$title = "Tambah Kegiatan - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8 flex items-center space-x-3">
    <a href="/activities" class="text-gray-400 hover:text-indigo-600 transition">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Tambah Kegiatan Baru</h1>
        <p class="text-gray-600 text-sm mt-1">Isi detail jadwal atau rutinitas yang akan kamu lakukan.</p>
    </div>
</div>

<div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden max-w-2xl">
    <form action="/activities" method="POST" class="p-8 space-y-6">
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 text-sm rounded shadow-sm">
                <?= htmlspecialchars($_SESSION['error']) ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Kegiatan <span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" required placeholder="Contoh: Rapat BEM, Kerja Kelompok..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-sm">
        </div>

        <div>
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Singkat</label>
            <textarea id="description" name="description" rows="3" placeholder="Tambahkan catatan atau detail lokasi..."
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-sm"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="activity_date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal <span class="text-red-500">*</span></label>
                <input type="date" id="activity_date" name="activity_date" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-sm text-gray-600">
            </div>
            <div>
                <label for="activity_time" class="block text-sm font-semibold text-gray-700 mb-1">Waktu <span class="text-red-500">*</span></label>
                <input type="time" id="activity_time" name="activity_time" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-sm text-gray-600">
            </div>
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end space-x-3">
            <a href="/activities" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 border border-transparent rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm transition-all">
                Simpan Kegiatan
            </button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>