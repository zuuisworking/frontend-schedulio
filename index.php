<?php
?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Schedulio</title>
	<!-- Kita pakai Tailwind CSS agar tampilannya langsung modern -->
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

	<div class="bg-white p-8 rounded-lg shadow-md w-96">
		<h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Schedulio</h2>

		<form id="loginForm" class="space-y-4">
			<div>
				<label class="block text-sm font-medium text-gray-700">Email</label>
				<input type="email" id="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700">Password</label>
				<input type="password" id="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
			</div>

			<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
				Login
			</button>
		</form>
		<div id="alertMessage" class="mt-4 text-center text-sm text-red-600 hidden"></div>
	</div>

	<script>
		// URL API Backend-mu yang sudah mengudara di Railway
		const API_URL = 'https://backend-schedulio-production-ec22.up.railway.app/api';

		document.getElementById('loginForm').addEventListener('submit', async function(e) {
			e.preventDefault(); // Mencegah browser me-refresh halaman (seperti menahan main loop)

			const email = document.getElementById('email').value;
			const password = document.getElementById('password').value;
			const alertBox = document.getElementById('alertMessage');

			try {
				// Tembak API Login (Asynchronous Request)
				const response = await fetch(`${API_URL}/login`, {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						email: email,
						password: password
					})
				});

				const data = await response.json();

				if (response.ok && data.status === 200) {
					// BERHASIL LOGIN!
					// Simpan JWT Token ke "Heap Memory" milik browser (LocalStorage)
					localStorage.setItem('schedulio_token', data.token);
					localStorage.setItem('schedulio_username', data.user.name);

					// Pindah ke halaman dashboard
					window.location.href = 'dashboard.php';
				} else {
					// GAGAL LOGIN
					alertBox.textContent = data.message || 'Login gagal!';
					alertBox.classList.remove('hidden');
				}
			} catch (error) {
				console.error("Fetch error:", error);
				alertBox.textContent = "Gagal menghubungi server. Pastikan internet jalan.";
				alertBox.classList.remove('hidden');
			}
		});
	</script>
</body>

</html>