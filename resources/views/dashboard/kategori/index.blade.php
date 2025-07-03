<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl ">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DAFTAR KATEGORI</h1>
            </div>
        </div>
        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form method="GET" action="{{ route('dashboard.kategori.index') }}" id="filterForm"
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

            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.kategori.create') }}"
                    class="inline-flex items-center gap-2 text-white rounded-md bg-green-500 hover:bg-green-600 px-4 py-2 text-sm font-medium transition-all">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Kategori
                </a>
            </div>

            <div class="mt-4 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2">
                <table class="table table-striped container">
                    <thead class="border-b-2">
                        <tr>
                            <th class="py-2">Nama Kategori</th>
                            <th class="py-2">Deskripsi</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $item)
                            <tr>
                                <td class="text-center">{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->deskripsi }}</td>

                                <td class="justify-center py-2 flex gap-2">
                                    <a href="{{ route('dashboard.kategori.edit', $item) }}"
                                        class="px-4 py-1 rounded-md bg-blue-500 text-white font-semibold">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>

                                    <form action="{{ route('dashboard.kategori.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-1 rounded-md bg-red-500 text-white font-semibold">
                                            <ion-icon name="trash"></ion-icon>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-2">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <nav class="mt-4 p-2">
                {{ $kategori->links() }}
            </nav>
        </div>
    </div>

    <script>
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const search = form.search.value.trim();

            const params = new URLSearchParams();

            if (search) params.set('search', search);

            const queryString = params.toString();
            const baseUrl = "{{ route('dashboard.kategori.index') }}";

            window.location.href = queryString ? `${baseUrl}?${queryString}` : baseUrl;
        });
    </script>
</x-layouts.admin>
