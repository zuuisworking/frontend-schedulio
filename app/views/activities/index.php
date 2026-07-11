<?php
$title = "Daftar Kegiatan - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Kegiatan Kamu</h1>
    <p class="text-gray-600 text-sm mt-1">Daftar kegiatan.</p>
</div>

<div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
    <?php if (empty($activities)): ?>
        <div class="p-16 text-center text-gray-500">
            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <p class="text-lg font-medium text-gray-900">Belum ada kegiatan</p>
            <p class="mt-1">Data kegiatan masih kosong.</p>
        </div>
    <?php else: ?>
        <ul class="divide-y divide-gray-100">
            <?php foreach ($activities as $activity): ?>
            <li class="p-6 hover:bg-gray-50 transition">
                <h4 class="text-md font-medium text-indigo-600">
                    <?= htmlspecialchars($activity['name'] ?? 'Kegiatan Tanpa Nama') ?>
                </h4>
                <p class="text-sm text-gray-500 mt-2">
                    <?= htmlspecialchars($activity['description'] ?? 'Tidak ada deskripsi') ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>