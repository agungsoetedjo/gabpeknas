<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>
<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen flex flex-col bg-white transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <div class="p-4">
            <a href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/images/full-logo-n-text.png') }}" alt="Logo" class="h-7 w-full">
            </a>
        </div>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-[24px] h-[24px] text-red-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg class="w-[24px] h-[24px] text-red-700 dark:text-white" xmlns="http://www.w3.org/2000/svg" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9Zm0 0c2.5 2.5 2.5 14 0 14m0-14c-2.5 2.5-2.5 14 0 14M3.6 9h16.8M3.6 15h16.8" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Website</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('dashboard.sliders.index') }}"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Slider
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.runningtext.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Running Text
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.faq.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.galeri.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Galeri
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/berita"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Berita</a>
                    </li>
                    <li>
                        <a href="/dashboard/kategori"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kategori Berita</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.regulasi.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Regulasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.regulasi-kategori.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Kategori Regulasi
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('dashboard.pesan.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-[24px] h-[24px] text-red-800 dark:text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75M21.75 6.75L12 13.5 2.25 6.75M21.75 6.75H2.25" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Pesan Masuk</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
                <li>
                    <a href="/dashboard/users"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-[24px] h-[24px] text-red-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
            @endif
            
        </ul>
    </div>
    <div class="mt-auto relative border-t border-gray-200 p-4">
        <!-- Tombol Gear -->
        <button id="gearToggle"
            type="button"
            class="w-10 h-10 flex items-center justify-center rounded hover:bg-gray-100"
            onclick="toggleGearDropdown()">
            <!-- Heroicon: Bars3 -->
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 5.25h16.5m-16.5 6h16.5m-16.5 6h16.5"/>
            </svg>
        </button>
    
        <!-- Dropdown ke atas -->
        <div id="gearDropdown" class="absolute bottom-full mb-2 left-2 right-2 w-[calc(100%-1rem)] max-w-xs bg-white border border-gray-200 rounded shadow hidden z-50 px-4 py-3 text-sm space-y-2">
            <div>
                <p class="font-semibold text-gray-500">Selamat Datang, </p>
                <p class="font-semibold text-gray-900 break-words">{{ Auth::user()->name }}</p><span class="text-gray-400 text-sm">({{ Auth::user()->email }})</span> 
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-sm text-white bg-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-red-400 focus:outline-none font-medium rounded px-4 py-2 text-center">
                    Logout
                </button>
            </form>
        </div>
    </div>
    <script>
        function toggleGearDropdown() {
            const dropdown = document.getElementById('gearDropdown');
            dropdown.classList.toggle('hidden');
        }
    
        // Tutup saat klik di luar
        document.addEventListener('click', function (e) {
            const toggle = document.getElementById('gearToggle');
            const dropdown = document.getElementById('gearDropdown');
            if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</aside>