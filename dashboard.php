<?php
// filename: frontend/dashboard.php
?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard - Schedulio</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

	<nav class="bg-blue-600 text-white p-4 shadow-md flex justify-between items-center">
		<h1 class="text-xl font-bold">Schedulio Dashboard</h1>
		<div>
			<span id="welcomeText" class="mr-4">Halo, User!</span>
			<button onclick="logout()" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm font-medium">Logout</button>
		</div>
	</nav>

	<div class="container mx-auto mt-8 p-4">
		<h2 class="text-2xl font-bold mb-4 text-gray-800">Daftar Tugasmu</h2>

		<!-- Wadah untuk memunculkan daftar tugas -->
		<div id="taskList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
			<p class="text-gray-500" id="loadingText">Memuat data dari server...</p>
		</div>
	</div>

	<script>
		const API_URL = 'https://backend-schedulio-production-ec22.up.railway.app/api';

		// 1. Pengecekan Kemananan di Sisi Client
		// Ibarat ngecek pointer: kalau tokennya NULL, tendang kembali ke halaman login.
		const token = localStorage.getItem('schedulio_token');
		const username = localStorage.getItem('schedulio_username');

		if (!token) {
			alert("Kamu belum login!");
			window.location.href = 'index.php';
		}

		// Tampilkan nama user
		if (username) {
			document.getElementById('welcomeText').textContent = `Halo, ${username}!`;
		}

		// 2. Fungsi untuk mengambil data dari Backend yang diproteksi JWT
		async function fetchTasks() {
			try {
				const response = await fetch(`${API_URL}/tasks`, {
					method: 'GET',
					headers: {
						// INI BAGIAN PALING KRUSIAL! Menyisipkan tiket (token) untuk masuk.
						'Authorization': `Bearer ${token}`
					}
				});

				const data = await response.json();
				const taskContainer = document.getElementById('taskList');
				taskContainer.innerHTML = ''; // Bersihkan tulisan loading

				if (response.ok && data.status === 200) {
					if (data.data.length === 0) {
						taskContainer.innerHTML = '<p class="text-gray-500 col-span-full">Belum ada tugas. Yuk buat tugas barumu!</p>';
						return;
					}

					// Looping data tugas dan buat elemen HTML (mirip cout << di perulangan for)
					data.data.forEach(task => {
						const card = document.createElement('div');
						card.className = "bg-white p-4 rounded-lg shadow border border-gray-200";
						card.innerHTML = `
                            <h3 class="font-bold text-lg text-blue-700">${task.name}</h3>
                            <p class="text-sm text-gray-600 mt-1">${task.description || 'Tidak ada deskripsi'}</p>
                            <div class="mt-3 text-xs text-gray-500 flex justify-between">
                                <span>Deadline: ${task.deadline}</span>
                                <span class="bg-gray-100 px-2 py-1 rounded">Kesulitan: ${task.difficulty_level}/5</span>
                            </div>
                        `;
						taskContainer.appendChild(card);
					});
				} else {
					// Kalau token kedaluwarsa atau ditolak server
					alert("Sesi berakhir atau error: " + data.message);
					logout();
				}
			} catch (error) {
				console.error("Error fetching tasks:", error);
				document.getElementById('taskList').innerHTML = '<p class="text-red-500">Gagal terhubung ke server.</p>';
			}
		}

		// 3. Fungsi Logout (Membersihkan Memori)
		function logout() {
			localStorage.removeItem('schedulio_token');
			localStorage.removeItem('schedulio_username');
			window.location.href = 'index.php';
		}

		// Jalankan fetch saat halaman pertama kali dibuka
		fetchTasks();
	</script>
</body>

</html>