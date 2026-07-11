<?php
$title = "Jadwal Belajar - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Rekomendasi Jadwal Belajar</h1>
    <p class="text-gray-600 text-sm mt-1">Berikut adalah urutan tugas yang diprioritaskan untuk memaksimalkan produktivitasmu hari ini.</p>
</div>

<?php if (isset($error_message)): ?>
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 text-sm rounded shadow-sm">
        <?= htmlspecialchars($error_message) ?>
    </div>
<?php endif; ?>

<div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
    <?php if (empty($schedules)): ?>
        <div class="p-16 text-center text-gray-500">
            <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p class="text-lg font-medium text-gray-900">Belum ada jadwal</p>
            <p class="mt-1">Tugasmu belum cukup untuk dibuatkan jadwal atau semua tugas sudah selesai. Tetap semangat!</p>
        </div>
    <?php else: ?>
        <ul class="divide-y divide-gray-100">
            <?php foreach ($schedules as $index => $task): ?>
            <li class="p-6 hover:bg-gray-50 transition">
                <div class="flex items-start gap-4">
                    <!-- Urutan -->
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm">
                        <?= $index + 1 ?>
                    </div>
                    
                    <!-- Konten Tugas -->
                    <div class="flex-grow">
                        <div class="flex justify-between">
                            <h4 class="text-md font-medium text-gray-900"><?= htmlspecialchars($task['name']) ?></h4>
                            <span class="text-xs font-semibold px-2 py-1 rounded bg-indigo-50 text-indigo-700 uppercase tracking-wider">Prioritas #<?= $index + 1 ?></span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1"><?= htmlspecialchars($task['description'] ?? 'Tanpa deskripsi') ?></p>
                        
                        <!-- Metadata -->
                        <div class="mt-3 flex flex-wrap gap-3 text-xs text-gray-500">
                            <span class="flex items-center">🔥 Kesulitan: <?= $task['difficulty_level'] ?>/5</span>
                            <span class="flex items-center">⭐ Kepentingan: <?= $task['importance_level'] ?>/5</span>
                            <span class="flex items-center">⏳ Deadline: <?= date('d M Y', strtotime($task['deadline'])) ?></span>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>