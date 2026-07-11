</main>

    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-500">
                    &copy; <?= date('Y') ?> Schedulio. Dibuat dengan 💻 oleh Zuu & Rara.
                </p>
                <div class="flex space-x-6 text-sm text-gray-500 font-medium">
                    <button onclick="showToast('✨ Halaman Tentang Kami sedang dalam tahap pengembangan.')" class="hover:text-indigo-600 transition outline-none">Tentang Kami</button>
                    <button onclick="showToast('💌 Hubungi email support@schedulio.com untuk bantuan.')" class="hover:text-indigo-600 transition outline-none">Bantuan</button>
                    <a href="/privacy" class="hover:text-indigo-600 transition outline-none">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col space-y-3 pointer-events-none"></div>

    <script>
        function showToast(message) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            toast.className = 'bg-gray-900 text-white px-6 py-3.5 rounded-xl shadow-2xl flex items-center space-x-3 transform transition-all duration-300 opacity-0 translate-y-4 pointer-events-auto border border-gray-700';
            toast.innerHTML = `
                <svg class="w-5 h-5 text-indigo-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium text-sm tracking-wide">${message}</span>
            `;
            
            container.appendChild(toast);
            
            // Animasi masuk (Fade In & Slide Up)
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-y-4');
            }, 10);
            
            // Animasi keluar (Fade Out) & Hapus Elemen
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-4');
                setTimeout(() => {
                    toast.remove();
                }, 300); // Waktu yang sama dengan durasi transisi
            }, 3500); // Notifikasi tampil selama 3.5 detik
        }
    </script>

</body>
</html>