<div class="md:w-2/3 w-full order-1 md:order-none">
    <div id="alertContainer"></div>
    <form id="formKontak" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="relative z-0">
                <input type="text" id="nama_depan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " name="nama_depan" required/>
                <label for="nama_depan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama Depan</label>
            </div>
            <div class="relative z-0">
                <input type="text" id="nama_belakang" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " name="nama_belakang" />
                <label for="nama_belakang" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama Belakang</label>
            </div>
            <div class="relative z-0">
                <input type="text" id="no_telp" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " name="no_telp"/>
                <label for="no_telp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">No. Telepon/HP</label>
            </div>
            <div class="relative z-0">
                <input type="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " name="email" required/>
                <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email Anda</label>
            </div>
        </div>

        <div>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan Anda</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Tulis pemikiran Anda di sini..." name="message" required></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih Kategori</label>
            <div class="space-y-2 md:space-y-0 md:flex md:space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="kategori" value="Administrasi" class="text-red-600 focus:ring-red-500" required>
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Proses Administrasi</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="kategori" value="Keanggotaan" class="text-red-600 focus:ring-red-500" required>
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Proses Keanggotaan</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="kategori" value="Lain-lain" class="text-red-600 focus:ring-red-500" required>
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Lain-lain</span>
                </label>
            </div>
        </div>

        <div class="w-full text-right mb-6 md:mb-0">
            <button type="submit"
                class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-md transition">
                <svg class="w-5 h-5 text-white transform -rotate-45" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 6.75l10.125 4.5a.75.75 0 010 1.35l-10.125 4.5a.75.75 0 01-1.05-.675V14.25L3.75 12l5.7-2.25V7.425a.75.75 0 011.05-.675z" />
                </svg>
                Kirim Pesan
            </button>
        </div>
    </form>
    <script>
        function showAlert(type = 'success', message = '') {
            const alertContainer = document.getElementById('alertContainer');
            alertContainer.innerHTML = `
                <div class="flex items-center p-4 mb-4 text-sm text-${type === 'success' ? 'green' : 'red'}-800 border border-${type === 'success' ? 'green' : 'red'}-300 rounded-lg bg-${type === 'success' ? 'green' : 'red'}-50 dark:bg-gray-800 dark:text-${type === 'success' ? 'green' : 'red'}-400 dark:border-${type === 'success' ? 'green' : 'red'}-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="${type === 'success'
                            ? 'M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z'
                            : 'M8.257 3.099c.366-.446.973-.593 1.49-.412.518.181.875.673.875 1.223v5.175l2.38 2.379c.376.377.586.879.586 1.414 0 .535-.21 1.037-.586 1.414a1.993 1.993 0 01-2.828 0L9 12.828V7.91c0-.55.357-1.042.875-1.223.517-.18 1.124-.034 1.49.412z'}" />
                    </svg>
                    <span class="sr-only">${type === 'success' ? 'Success' : 'Error'}</span>
                    <div>${message}</div>
                </div>
            `;

            // Hilangkan alert otomatis setelah 5 detik
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 5000);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('formKontak');
            const submitButton = form.querySelector('button[type="submit"]');
            const originalButtonHTML = submitButton.innerHTML;

            form.addEventListener('submit', function (e) {
                e.preventDefault();
        
                // Disable tombol dan ganti teks/icon
                submitButton.disabled = true;
                submitButton.classList.add('opacity-50', 'cursor-not-allowed');
                submitButton.innerHTML = `<svg class="w-5 h-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg> Mengirim...`;
                
                const formData = new FormData(this);
        
                fetch("/kirim-pesan", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData
                })
                .then(async res => {
                    const contentType = res.headers.get("content-type");
                    if (contentType && contentType.includes("application/json")) {
                        return res.json();
                    } else {
                        const text = await res.text();
                        throw new Error("Bukan JSON: " + text.slice(0, 300));
                    }
                })
                .then(data => {
                    if (data.success) {
                        showAlert('success', data.message);
                        form.reset();
                    } else {
                        let msg = "Gagal mengirim pesan.<br>";
                        if (data.errors) {
                            for (const [field, messages] of Object.entries(data.errors)) {
                                msg += `<strong>${field}</strong>: ${messages.join(', ')}<br>`;
                            }
                        }
                        showAlert('error', msg);
                    }
                })
                .catch(err => {
                    console.error("Terjadi kesalahan:", err.message);
                    showAlert('error', "Terjadi kesalahan. Silakan cek console.");
                })
                .finally(() => {
                    // Aktifkan kembali tombol
                    submitButton.disabled = false;
                    submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
                    submitButton.innerHTML = originalButtonHTML;
                });
            });
        });
    </script>
</div>