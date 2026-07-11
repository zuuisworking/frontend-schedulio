<?php
$title = "Tambah Tugas - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8">
    <a href="/tasks" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition mb-4">
        <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Tugas
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Tambah Tugas Baru</h1>
    <p class="text-gray-600 text-sm mt-1">Masukkan detail tugas yang perlu kamu selesaikan.</p>
</div>

<?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 text-sm rounded shadow-sm">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
    <form action="/tasks" method="POST" class="p-8 space-y-6">
        
        <!-- Nama Tugas -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Tugas <span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" required placeholder="Contoh: Makalah Sistem Basis Data"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition">
        </div>

        <!-- Deskripsi Tugas -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
            <textarea id="description" name="description" rows="3" placeholder="Tambahkan catatan atau detail tugas (opsional)..."
                      class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition"></textarea>
        </div>

        <!-- Deadline -->
        <div>
            <label for="deadline" class="block text-sm font-medium text-gray-700">Tenggat Waktu (Deadline) <span class="text-red-500">*</span></label>
            <input type="date" id="deadline" name="deadline" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition">
        </div>

        <!-- Grid untuk Tingkat Kesulitan & Kepentingan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="difficulty_level" class="block text-sm font-medium text-gray-700">
                    Tingkat Kesulitan (1-5) <span title="1=Sangat Mudah, 5=Sangat Sulit" class="cursor-help text-indigo-500 ml-1">ℹ️</span>
                </label>
                <input type="range" id="difficulty_level" name="difficulty_level" min="1" max="5" value="3" 
                       class="mt-2 w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                       oninput="document.getElementById('diff_output').innerText = this.value">
                <div class="text-center mt-2 font-medium text-red-600">Level: <span id="diff_output">3</span></div>
            </div>

            <div>
                <label for="importance_level" class="block text-sm font-medium text-gray-700">
                    Tingkat Kepentingan (1-5) <span title="1=Kurang Penting, 5=Sangat Mendesak/Penting" class="cursor-help text-indigo-500 ml-1">ℹ️</span>
                </label>
                <input type="range" id="importance_level" name="importance_level" min="1" max="5" value="3" 
                       class="mt-2 w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                       oninput="document.getElementById('imp_output').innerText = this.value">
                <div class="text-center mt-2 font-medium text-blue-600">Level: <span id="imp_output">3</span></div>
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="button" onclick="window.history.back();" class="mr-4 bg-white py-2.5 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                Batal
            </button>
            <button type="submit" class="bg-indigo-600 py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                Simpan Tugas
            </button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>