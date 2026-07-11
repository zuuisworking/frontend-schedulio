<?php
$title = "Daftar Tugas - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Tugas</h1>
        <p class="text-gray-600 text-sm mt-1">Kelola semua tugas kuliah dan prioritasmu di sini.</p>
    </div>
    <a href="/tasks/create" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Tugas
    </a>
</div>

<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 text-sm rounded shadow-sm">
        <?= htmlspecialchars($_SESSION['success']) ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 text-sm rounded shadow-sm">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
    <?php if (empty($tasks)): ?>
        <div class="p-16 text-center text-gray-500 flex flex-col items-center">
            <svg class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <p class="text-lg font-medium text-gray-900">Belum ada tugas</p>
            <p class="mt-1">Mulai kelola prioritasmu dengan menambahkan tugas baru.</p>
            <a href="/tasks/create" class="mt-4 text-indigo-600 hover:text-indigo-800 font-medium hover:underline">Buat tugas sekarang &rarr;</a>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tugas</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deadline</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prioritas (Level)</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($tasks as $task): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($task['name']) ?></div>
                            <div class="text-xs text-gray-500 truncate max-w-xs"><?= htmlspecialchars($task['description'] ?? '-') ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= date('d M Y', strtotime($task['deadline'])) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center space-x-2">
                                <span title="Tingkat Kesulitan" class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                    🔥 <?= $task['difficulty_level'] ?>
                                </span>
                                <span title="Tingkat Kepentingan" class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                    ⭐ <?= $task['importance_level'] ?>
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php 
                                $isCompleted = (isset($task['status']) && $task['status'] === 'completed');
                                $statusClass = $isCompleted ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';
                                $statusText = $isCompleted ? 'Selesai' : 'Pending';
                            ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $statusClass ?>">
                                <?= $statusText ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <?php if (!$isCompleted): ?>
                                <a href="/tasks/complete?id=<?= $task['id'] ?>" class="text-green-600 hover:text-green-900">Selesai</a>
                                <span class="text-gray-300 mx-2">|</span>
                            <?php endif; ?>
                            
                            <a href="/tasks/delete?id=<?= $task['id'] ?>" 
                               onclick="return confirm('Apakah kamu yakin ingin menghapus tugas ini?');" 
                               class="text-red-600 hover:text-red-900">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>