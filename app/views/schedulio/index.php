<?php
$title = "Rekomendasi Prioritas - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Rekomendasi Prioritas</h1>
            <p class="text-gray-600 text-sm mt-1">Daftar tugas yang diprioritaskan menggunakan metode TOPSIS berdasarkan tingkat kepentingan, urgensi, dan kesulitan.</p>
        </div>
        <a href="/dashboard" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 border-gray-300 transition">
            Kembali ke Dashboard
        </a>
    </div>

    <?php if (empty($recommendations)): ?>
        <div class="bg-white shadow-sm rounded-xl border border-gray-100 p-16 text-center text-gray-500 flex flex-col items-center">
            <svg class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 uppercase 18.214 7.681m4.238 11.756a9.779 9.779 0 01-8.234-11.756 9.779 9.779 0 018.234 11.756z" />
            </svg>
            <p class="text-lg font-medium text-gray-900">Belum ada rekomendasi</p>
            <p class="mt-1">Anda perlu memiliki minimal 2 tugas yang belum selesai untuk melakukan perhitungan prioritas.</p>
            <a href="/tasks/create" class="mt-4 text-indigo-600 hover:text-indigo-800 font-medium hover:underline">Tambah tugas sekarang &rarr;</a>
        </div>
    <?php else: ?>
        <div class="space-y-4">
            <?php foreach ($recommendations as $index => $item): ?>
                <div class="bg-white shadow-sm rounded-xl border border-gray-100 p-5 flex items-center hover:border-indigo-200 transition group">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-indigo-50 text-indigo-600 font-bold text-lg mr-5 group-hover:bg-indigo-600 group-hover:text-white transition">
                        #<?= $item['ranking'] ?>
                    </div>
                    
                    <div class="flex-grow">
                        <div class="flex items-center justify-between mb-1">
                            <h3 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($item['name']) ?></h3>
                            <span class="px-2 py-1 text-xs font-medium bg-indigo-100 text-indigo-700 rounded-full">
                                Score: <?= number_format($item['score'], 4) ?>
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-y-2 gap-x-4 text-sm text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-//9 5h12M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Deadline: <?= date('d M Y', strtotime($item['deadline'])) ?>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Kepentingan: <?= $item['importance_level'] ?>/5
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Kesulitan: <?= $item['difficulty_level'] ?>/5
                            </div>
                        </div>
                    </div>
                    
                    <div class="ml-4">
                        <a href="/tasks/complete?id=<?= $item['id'] ?>" 
                           class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-md hover:bg-green-700 transition">
                            Selesaikan
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
