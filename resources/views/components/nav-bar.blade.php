<style>
    .dropdown-menu {
        transition: all 50ms ease-in-out;
        transform-origin: top;
        opacity: 0;
        transform: scale(0.95);
        pointer-events: none;
        visibility: hidden;
    }
    
    .dropdown-menu.show {
        opacity: 1;
        transform: scale(1);
        pointer-events: auto;
        visibility: visible;
    }
</style>
<nav class="relative top-0 left-0 right-0 bg-white border-b border-gray-200 dark:bg-gray-900 z-50">

    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 py-3">
        <a href="/" class="flex items-center space-x-2">
            <img src="{{ asset('images/gabpeknas-ori.png') }}" class="h-16" alt="Logo" />
            <img src="{{ asset('images/logo-text2.png') }}" class="h-6" alt="Text" />
        </a>
        <button type="button" class="inline-flex items-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu" aria-expanded="false" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center space-x-3">
            <a href="/" class="text-sm py-2 px-3 rounded {{ request()->is('/') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Home</a>

            <!-- Profil Dropdown (Click) -->
            <div class="relative">
                <button type="button" onclick="toggleDropdown('profilDropdown')" class="text-sm py-2 px-3 flex items-center gap-1 rounded {{ request()->routeIs(['tentang-kami','strukturorganisasi','kepengurusanpusat','legalitas']) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">
                    Profil
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="profilDropdown" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white border rounded shadow z-20">
                    <a href="{{ route('tentang-kami') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('tentang-kami') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Tentang Kami</a>
                    <a href="{{ route('strukturorganisasi') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('strukturorganisasi') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Struktur Organisasi</a>
                    <a href="{{ route('kepengurusanpusat') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('kepengurusanpusat') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Kepengurusan Pusat</a>
                    <a href="{{ route('legalitas') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('legalitas') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Legalitas</a>
                </div>
            </div>
            <!-- Organisasi Dropdown (Click) -->
            <div class="relative">
                <button type="button" onclick="toggleDropdown('organisasiDropdown')" class="text-sm py-2 px-3 flex items-center gap-1 rounded {{ request()->routeIs(['dpp','dpd']) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">
                    Organisasi
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="organisasiDropdown" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white border rounded shadow z-20">
                    <a href="{{ route('dpp') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('dpp') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Dewan Pimpinan Pusat</a>
                    <a href="{{ route('dpd') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('dpd') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Dewan Pimpinan Daerah</a>
                </div>
            </div>
            <!-- Anggota Dropdown (Click) -->
            <div class="relative">
                <button type="button" onclick="toggleDropdown('anggotaDropdown')" class="text-sm py-2 px-3 flex items-center gap-1 rounded {{ request()->routeIs(['syaratketentuan','anggota.bujk.index','rekap-anggota']) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">
                    Anggota
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="anggotaDropdown" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white border rounded shadow z-20">
                    <a href="{{ route('syaratketentuan') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('syaratketentuan') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Syarat & Ketentuan</a>
                    <a href="{{ route('anggota.bujk.index') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('anggota.bujk.index') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Daftar Anggota per-BUJK</a>
                    <a href="{{ route('rekap-anggota') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('rekap-anggota') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Rekap Anggota per-provinsi</a>
                </div>
            </div>
            <!-- Informasi Dropdown (Click) -->
            <div class="relative">
                <button type="button" onclick="toggleDropdown('informasiDropdown')" class="text-sm py-2 px-3 flex items-center gap-1 rounded {{ request()->routeIs(['news.index','gallery.index','gallery.show','regulation.index','gallery.show','faq']) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">
                    Informasi Publik
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="informasiDropdown" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white border rounded shadow z-20">
                    <a href="{{ route('regulation.index') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('regulation.index') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Regulasi</a>
                    <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('faq') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">FAQ</a>
                    <a href="{{ route('news.index') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs('news.index') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Berita</a>
                    <a href="{{ route('gallery.index') }}" class="block px-4 py-2 text-sm rounded {{ request()->routeIs(['gallery.index','gallery.show']) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-600' }}">Galeri</a>
                </div>
            </div>
            @auth
                <a href="{{ route('dashboard.index') }}" class="text-sm px-4 py-1 rounded border border-gray-400 text-black hover:bg-gray-100">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm px-4 py-1 rounded border border-gray-400 text-black hover:bg-gray-100">Login</a>
            @endauth
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden md:hidden" id="mobile-menu">
        <ul class="flex flex-col space-y-1 px-4 pb-4 text-sm">
            <li>
                <a href="/" class="block px-4 py-2 rounded {{ request()->is('/') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Home</a>
            </li>
    
            {{-- PROFIL --}}
            <li>
                <details class="group">
                    <summary class="flex justify-between items-center px-4 py-2 cursor-pointer rounded {{ request()->routeIs(['tentang-kami','strukturorganisasi','kepengurusanpusat','legalitas']) ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">
                        <span>Profil</span>
                        <svg class="w-4 h-4 transform group-open:rotate-180 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <ul class="ml-4 mt-1 space-y-1">
                        <li><a href="{{ route('tentang-kami') }}" class="block px-3 py-2 rounded {{ request()->routeIs('tentang-kami') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Tentang Kami</a></li>
                        <li><a href="{{ route('strukturorganisasi') }}" class="block px-3 py-2 rounded {{ request()->routeIs('strukturorganisasi') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Struktur Organisasi</a></li>
                        <li><a href="{{ route('kepengurusanpusat') }}" class="block px-3 py-2 rounded {{ request()->routeIs('kepengurusanpusat') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Kepengurusan Pusat</a></li>
                        <li><a href="{{ route('legalitas') }}" class="block px-3 py-2 rounded {{ request()->routeIs('legalitas') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Legalitas</a></li>
                    </ul>
                </details>
            </li>
    
            {{-- ORGANISASI --}}
            <li>
                <details class="group">
                    <summary class="flex justify-between items-center px-4 py-2 cursor-pointer rounded {{ request()->routeIs(['dpp','dpd']) ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">
                        <span>Organisasi</span>
                        <svg class="w-4 h-4 transform group-open:rotate-180 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <ul class="ml-4 mt-1 space-y-1">
                        <li><a href="{{ route('dpp') }}" class="block px-3 py-2 rounded {{ request()->routeIs('dpp') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Dewan Pimpinan Pusat</a></li>
                        <li><a href="{{ route('dpd') }}" class="block px-3 py-2 rounded {{ request()->routeIs('dpd') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Dewan Pimpinan Daerah</a></li>
                    </ul>
                </details>
            </li>
    
            {{-- ANGGOTA --}}
            <li>
                <details class="group">
                    <summary class="flex justify-between items-center px-4 py-2 cursor-pointer rounded {{ request()->routeIs(['syaratketentuan','anggota.bujk.index','rekap-anggota']) ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">
                        <span>Anggota</span>
                        <svg class="w-4 h-4 transform group-open:rotate-180 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <ul class="ml-4 mt-1 space-y-1">
                        <li><a href="{{ route('syaratketentuan') }}" class="block px-3 py-2 rounded {{ request()->routeIs('syaratketentuan') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Syarat & Ketentuan</a></li>
                        <li><a href="{{ route('anggota.bujk.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('anggota.bujk.index') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Daftar Anggota</a></li>
                        <li><a href="{{ route('rekap-anggota') }}" class="block px-3 py-2 rounded {{ request()->routeIs('rekap-anggota') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Rekap Anggota</a></li>
                    </ul>
                </details>
            </li>
    
            {{-- INFORMASI PUBLIK --}}
            <li>
                <details class="group">
                    <summary class="flex justify-between items-center px-4 py-2 cursor-pointer rounded {{ request()->routeIs(['news.index','gallery.index','gallery.show','regulation.index','faq']) ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">
                        <span>Informasi Publik</span>
                        <svg class="w-4 h-4 transform group-open:rotate-180 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <ul class="ml-4 mt-1 space-y-1">
                        <li><a href="{{ route('regulation.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('regulation.index') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Regulasi</a></li>
                        <li><a href="{{ route('faq') }}" class="block px-3 py-2 rounded {{ request()->routeIs('faq') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">FAQ</a></li>
                        <li><a href="{{ route('news.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('news.index') ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Berita</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs(['gallery.index','gallery.show']) ? 'bg-gray-100 text-gray-900 font-semibold' : 'hover:bg-gray-100 hover:text-gray-600 text-gray-700' }}">Galeri</a></li>
                    </ul>
                </details>
            </li>
    
            {{-- AUTH --}}
            <li>
                @auth
                    <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-center rounded border border-gray-700 text-black hover:bg-gray-100">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-center rounded border border-gray-700 text-black hover:bg-gray-100">Login</a>
                @endauth
            </li>
        </ul>
    </div>
    
</nav>

<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if (menu !== dropdown) {
                menu.classList.remove('show');
            }
        });
        dropdown.classList.toggle('show');
    }
    
    document.addEventListener('click', function (e) {
        if (!e.target.closest('[onclick], .dropdown-menu')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const allDetails = document.querySelectorAll('#mobile-menu details');

        allDetails.forEach(detail => {
            detail.addEventListener('toggle', function () {
                if (this.open) {
                    allDetails.forEach(otherDetail => {
                        if (otherDetail !== this) otherDetail.removeAttribute('open');
                    });
                }
            });
        });
    });
</script>