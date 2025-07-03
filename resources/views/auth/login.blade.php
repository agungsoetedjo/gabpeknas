<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" /> --}}
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="font-family: 'Outfit', sans-serif;">
    <section class="bg-gray-50 dark:bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="{{route('home.index')}}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-auto h-24 mr-2" src="{{ asset('images/gabpeknas-ori.png') }}" alt="logo">
                GABUNGAN PERUSAHAAN<br>KONTRAKTOR NASIONAL
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Masuk ke Akun Anda
                    </h1>
                    <form id="login-form" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Anda</label>
                            <input type="email" name="email" id="email" placeholder="Masukkan email" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan password" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                        </div>
                    
                        <div id="login-error" class="text-sm text-red-600"></div>
                    
                        <button type="button" id="login-btn"
                            class="w-full text-black bg-gray-300 hover:bg-gray-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Sign in
                        </button>
                    </form>                    
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('login-btn').addEventListener('click', function () {
            const form = document.getElementById('login-form');
            const formData = new FormData(form);
        
            fetch("{{ route('login.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async response => {
                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Login',
                        text: 'Anda akan diarahkan ke dashboard...',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2000
                    }).then(() => {
                        window.location.href = "/dashboard";
                    });
                } else {
                    const data = await response.json();
                    let message = data.message || "Terjadi kesalahan saat login.";
                    if (data.errors && data.errors.email) {
                        message = data.errors.email[0];
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: message,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2000
                    });
                }
            })
            .catch(error => {
                console.error('Login error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Terjadi kesalahan jaringan.',
                });
            });
        });
    </script>   
</body>
</html>