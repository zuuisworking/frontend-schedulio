<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Schedulio' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    
    <?php 
    if (isset($_SESSION['token'])): 
    ?>
    <nav class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo / Nama Aplikasi -->
                <div class="flex-shrink-0 font-bold text-xl tracking-wider">
                    SCHEDULIO
                </div>
                
                <!-- Menu Navigasi -->
                <div class="flex space-x-4 items-center">
                    <a href="/dashboard" class="hover:bg-indigo-500 px-3 py-2 rounded-md text-sm font-medium transition">Dashboard</a>
                    <a href="/tasks" class="hover:bg-indigo-500 px-3 py-2 rounded-md text-sm font-medium transition">Tugas</a>
                    <a href="/schedule" class="hover:bg-indigo-500 px-3 py-2 rounded-md text-sm font-medium transition">Jadwal</a>
                    
                    <!-- Sapaan untuk User -->
                    <span class="text-indigo-200 text-sm ml-4 border-l border-indigo-400 pl-4">
                        Halo, <?= htmlspecialchars($_SESSION['user']['name'] ?? 'User') ?>
                    </span>
                    
                    <!-- Tombol Logout -->
                    <a href="/logout" class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-sm font-medium transition">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <?php endif; ?>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">