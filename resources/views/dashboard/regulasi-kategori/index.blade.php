<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm px-6 py-5 border border-gray-200 dark:border-gray-700">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Daftar Kategori Regulasi</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola daftar kategori regulasi yang tersedia.</p>
        </div>

        <!-- Filter & Tambah -->
        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            {{-- Filter --}}
            <form method="GET" action="{{ route('dashboard.regulasi-kategori.index') }}" id="filterForm"
                class="mb-6 flex flex-col md:flex-row md:flex-wrap gap-4 items-start md:items-end">
                <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto flex-grow">
                    <input type="text" name="search" placeholder="Cari nama kategori..."
                        value="{{ request('search') }}"
                        class="w-full md:w-64 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm" />

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                        Cari
                    </button>
                </div>
            </form>

            {{-- Tambah --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.regulasi-kategori.create') }}"
                    class="inline-flex items-center gap-2 text-white rounded-md bg-green-500 hover:bg-green-600 px-4 py-2 text-sm font-medium transition-all">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Kategori
                </a>
            </div>

            {{-- Tabel --}}
            <div class="mt-4 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2 overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="py-2 px-4 border">Nama Kategori</th>
                            <th class="py-2 px-4 border">Deskripsi</th>
                            <th class="py-2 px-4 border">Aktif</th>
                            <th class="py-2 px-4 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $item)
                            <tr class="text-center">
                                <td class="py-2 px-4">{{ $item->nama }}</td>
                                <td class="py-2 px-4">{{ $item->deskripsi }}</td>
                                <td class="py-2 px-4">
                                    {{ $item->aktif == 1 ? '✔️' : '❌' }}
                                </td>
                                <td class="py-2 px-4 flex justify-center gap-2">
                                    <a href="{{ route('dashboard.regulasi-kategori.edit', $item) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>

                                    <form action="{{ route('dashboard.regulasi-kategori.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                            <ion-icon name="trash"></ion-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada data kategori regulasi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <nav class="mt-4 p-2">
                {{ $kategori->links() }}
            </nav>
        </div>
    </div>

    {{-- Script (optional jika kamu pakai tombol search di atas) --}}
    <script>
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = e.target;
            const search = form.search.value.trim();
            const params = new URLSearchParams();

            if (search) params.set('search', search);

            const queryString = params.toString();
            const baseUrl = "{{ route('dashboard.regulasi-kategori.index') }}";

            window.location.href = queryString ? `${baseUrl}?${queryString}` : baseUrl;
        });
    </script>
</x-layouts.admin>