<?php
$title = "Daftar Kegiatan - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Kegiatan Kamu</h1>
        <p class="text-gray-600 text-sm mt-1">Kelola daftar kegiatan dan aktivitas rutinmu di sini.</p>
    </div>
    <a href="/activities/create" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Kegiatan
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
    <?php if (empty($activities)): ?>
        <div class="p-16 text-center text-gray-500 flex flex-col items-center">
            <svg class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <p class="text-lg font-medium text-gray-900">Belum ada kegiatan</p>
            <p class="mt-1">Data kegiatan masih kosong. Yuk buat kegiatan pertamamu!</p>
            <a href="/activities/create" class="mt-4 text-indigo-600 hover:text-indigo-800 font-medium hover:underline">Buat kegiatan sekarang &rarr;</a>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kegiatan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($activities as $activity): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-indigo-600"><?= htmlspecialchars($activity['name'] ?? 'Kegiatan Tanpa Nama') ?></div>
                            <div class="text-xs text-gray-500 truncate max-w-xs mt-1"><?= htmlspecialchars($activity['description'] ?? '-') ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            <?= date('d M Y', strtotime($activity['activity_date'])) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            <?= date('H:i', strtotime($activity['activity_time'])) ?> WIB
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/activities/delete?id=<?= $activity['id'] ?>" 
                               onclick="return confirm('Apakah kamu yakin ingin menghapus kegiatan ini?');" 
                               class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md transition">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>