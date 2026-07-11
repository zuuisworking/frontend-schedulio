<?php
$title = "Dashboard - Schedulio";
require_once __DIR__ . '/../layout/header.php';
?>

<div class="mb-8 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Dashboard Schedulio</h1>
        <p class="text-gray-600 mt-2 text-sm">Pantau produktivitas dan jadwal kegiatanmu dengan mudah di sini.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <a href="/schedule/create" class="inline-flex items-center px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
            <svg class="-ml-1 mr-2 h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Tambah Kegiatan
        </a>
        <a href="/tasks/create" class="inline-flex items-center px-4 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Tugas
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">
        <h3 class="text-lg font-bold text-gray-800 mb-1">Statistik Produktivitas</h3>
        <p class="text-xs text-gray-500 mb-6">Perbandingan penyelesaian tugas dan kegiatan 7 hari terakhir.</p>
        <div class="relative h-72 w-full flex-grow">
            <canvas id="dashboardChart"></canvas>
        </div>
    </div>
    <div class="space-y-6">
        <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-md p-6 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
            
            <h3 class="text-sm font-semibold text-indigo-100 uppercase tracking-wider">Total Diselesaikan</h3>
            <div class="mt-3 flex items-baseline text-4xl font-extrabold">
                <span id="completedCount">12</span>
                <span class="ml-2 text-sm font-medium text-indigo-200">Tugas / Kegiatan</span>
            </div>
            <p class="mt-3 text-xs text-indigo-200">Terus pertahankan ritme belajarmu! 🔥</p>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 flex items-center">
                <svg class="w-4 h-4 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                Jadwal Terdekat
            </h3>
            <div class="text-center py-6 text-gray-400">
                <svg class="mx-auto h-12 w-12 text-gray-200 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <p class="text-sm font-medium text-gray-500">Belum ada jadwal dalam waktu dekat.</p>
                <a href="/schedule/create" class="mt-3 inline-block text-xs font-semibold text-indigo-600 hover:text-indigo-500">Buat jadwal sekarang &rarr;</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('dashboardChart').getContext('2d');
        const gradientBlue = ctx.createLinearGradient(0, 0, 0, 300);

        gradientBlue.addColorStop(0, 'rgba(79, 70, 229, 0.4)');
        gradientBlue.addColorStop(1, 'rgba(79, 70, 229, 0.0)');

        const gradientPurple = ctx.createLinearGradient(0, 0, 0, 300);
        gradientPurple.addColorStop(0, 'rgba(168, 85, 247, 0.4)');
        gradientPurple.addColorStop(1, 'rgba(168, 85, 247, 0.0)');

        const dashboardChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [
                    {
                        label: 'Tugas',
                        data: [1, 3, 2, 5, 3, 7, 4],
                        borderColor: '#4f46e5',
                        backgroundColor: gradientBlue,
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#4f46e5',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    },
                    {
                        label: 'Kegiatan',
                        data: [2, 1, 4, 2, 4, 3, 2],
                        borderColor: '#a855f7',
                        backgroundColor: gradientPurple,
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#a855f7',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 8,
                            font: { family: "'Inter', sans-serif", size: 12, weight: '500' }
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(17, 24, 39, 0.95)',
                        titleFont: { family: "'Inter', sans-serif", size: 13 },
                        bodyFont: { family: "'Inter', sans-serif", size: 13 },
                        padding: 12,
                        cornerRadius: 8,
                        boxPadding: 4
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(243, 244, 246, 1)',
                            drawBorder: false
                        },
                        ticks: {
                            font: { family: "'Inter', sans-serif" },
                            stepSize: 2
                        }
                    },
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: { font: { family: "'Inter', sans-serif" } }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    });
</script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>