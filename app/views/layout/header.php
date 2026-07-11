<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Schedulio' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen text-gray-900">

    <nav class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/dashboard" class="text-xl font-extrabold tracking-wider hover:text-indigo-100 transition">
                        Schedulio
                    </a>
                </div>

                <div class="flex items-center space-x-6 text-sm font-medium">
                    <a href="/dashboard" class="hover:text-indigo-100 transition">Dashboard</a>
                    <a href="/tasks" class="hover:text-indigo-100 transition">Tugas</a>
                    <a href="/activities" class="hover:text-indigo-100 transition">Kegiatan</a>
                    <a href="/schedule" class="hover:text-indigo-100 transition">Jadwal</a>
                    
                    <span class="text-indigo-300">|</span>
                    
                    <div class="flex items-center space-x-3">
                        <span class="text-indigo-100 font-normal">
                            Halo, <strong class="font-semibold"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'User') ?></strong>
                        </span>
                        <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold shadow transition">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">