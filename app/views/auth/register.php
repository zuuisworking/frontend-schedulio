<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Schedulio</title>
    <!-- Kita pakai Tailwind CSS via CDN biar cepat rapi -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">

    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 my-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-indigo-600 tracking-tight">Buat Akun</h2>
            <p class="text-gray-500 mt-2 text-sm">Mulai atur jadwal belajarmu dengan Schedulio.</p>
        </div>

        <!-- Menampilkan pesan error dari Session -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 text-sm rounded">
                <?= htmlspecialchars($_SESSION['error']) ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <!-- Form Register -->
        <form action="/register" method="POST" class="space-y-5">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" required 
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                <input type="email" id="email" name="email" required 
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required minlength="6"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition">
            </div>
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="6"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition">
            </div>
            
            <button type="submit" 
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition mt-6">
                Daftar
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Sudah punya akun? 
                <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500 transition">Masuk di sini</a>
            </p>
        </div>
    </div>

</body>
</html>