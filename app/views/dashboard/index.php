<?php

$title = "Dashboard - Schedulio";

require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="text-gray-600 text-sm mt-1">Pantau ringkasan aktivitas dan prioritas tugasmu hari ini.</p>
</div>

<!-- Statistik / Ringkasan -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-sm font-medium text-gray-500">Total Tugas</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-2"><?= count($tasks) ?></p>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-sm font-medium text-gray-500">Selesai</h3>
        <?php 
            // Menghitung jumlah tugas yang statusnya 'completed'
            $completed = array_filter($tasks, function($t) {
                return isset($t['status']) && $t['status'] === 'completed';
            });
        ?>
        <p class="text-3xl font-bold text-green-500 mt-2"><?= count($completed) ?></p>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-sm font-medium text-gray-500">Perlu Dikerjakan</h3>
        <p class="text-3xl font-bold text-orange-500 mt-2"><?= count($tasks) - count($completed) ?></p>
    </div>
</div>

<!-- Daftar Tugas Terkini -->
<div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
        <h2 class="font-semibold text-gray-800">Daftar Tugas Terkini</h2>
        <a href="/tasks" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition">Lihat Semua</a>
    </div>
    
    <?php if (empty($tasks)): ?>
        <div class="p-12 text-center text-gray-500">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Belum ada tugas yang ditambahkan. <br>
            <a href="/tasks/create" class="text-indigo-600 hover:underline mt-2 inline-block">Tambah tugas pertamamu!</a>
        </div>
    <?php else: ?>
        <ul class="divide-y divide-gray-100">
            <?php 
            foreach (array_slice($tasks, 0, 5) as $task): 
            ?>
            <li class="p-6 hover:bg-gray-50 transition">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="text-md font-medium text-gray-900"><?= htmlspecialchars($task['name']) ?></h4>
                        <p class="text-sm text-gray-500 mt-1"><?= htmlspecialchars($task['description'] ?? 'Tidak ada deskripsi') ?></p>
                    </div>
                    <?php 
                        $statusClass = (isset($task['status']) && $task['status'] === 'completed') ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';
                        $statusText = (isset($task['status']) && $task['status'] === 'completed') ? 'Selesai' : 'Pending';
                    ?>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $statusClass ?>">
                        <?= $statusText ?>
                    </span>
                </div>
                <div class="mt-4 flex space-x-4 text-xs text-gray-500">
                    <span class="flex items-center">
                        ⏳ Deadline: <?= date('d M Y', strtotime($task['deadline'])) ?>
                    </span>
                    <span class="flex items-center">
                        🔥 Kesulitan: <?= $task['difficulty_level'] ?>/5
                    </span>
                    <span class="flex items-center">
                        ⭐ Kepentingan: <?= $task['importance_level'] ?>/5
                    </span>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<?php 
require_once __DIR__ . '/../layout/footer.php'; 
?>