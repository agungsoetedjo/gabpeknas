<x-layouts.admin>

    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="pt-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DAFTAR GALERI</h1>
            </div>
            <div class="pb-4 ml-6 text-sm font-semibold text-gray-700">
                <p>Kumpulan dokumentasi kegiatan berupa foto</p>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <form method="GET" action="{{ route('dashboard.galeri.index') }}" id="filterForm"
                class="mb-6 flex flex-col md:flex-row md:flex-wrap gap-4 items-start md:items-end">

                <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto flex-grow">
                    <input type="text" name="search" placeholder="Cari judul galeri..."
                        value="{{ request('search') }}"
                        class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm" />

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                        Cari
                    </button>
                </div>
            </form>

            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.galeri.create') }}"
                    class="inline-flex items-center gap-2 text-white rounded-md bg-green-500 hover:bg-green-600 px-4 py-2 text-sm font-medium transition-all">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Galeri
                </a>
            </div>

            @forelse ($galeri as $item)
                <div class="flex h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2 mb-4">
                    <div class="w-2/3 p-2">
                        <div class="text-sm text-gray-600 mb-1">
                            <strong>Tanggal:</strong>
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}
                        </div>

                        <div class="py-2 text-xl font-semibold">{{ $item->judul }}</div>

                        <div class="text-gray-700 dark:text-gray-300 mb-4">
                            {!! $item->deskripsi !!}
                        </div>

                        <div class="py-2 flex gap-2">
                            <a href="{{ route('dashboard.galeri.edit', $item) }}"
                                class="px-4 py-1 rounded-md bg-blue-500 text-white font-semibold">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>

                            <form action="{{ route('dashboard.galeri.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-1 rounded-md bg-red-500 text-white font-semibold"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
                                    <ion-icon name="trash"></ion-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                    {{-- Preview Beberapa Foto --}}
                    <div class="w-1/3 p-2 grid grid-cols-2 gap-2 border bg-gray-100">
                        @forelse ($item->details->take(4) as $detail)
                            <div class="w-full aspect-w-1 aspect-h-1 bg-white border rounded overflow-hidden">
                                <img src="{{ asset($detail->file) }}" alt="Foto Galeri"
                                    class="object-cover w-full h-full" />
                            </div>
                        @empty
                            <div class="col-span-2 text-sm text-gray-400 flex justify-center items-center min-h-[100px]">
                                Tidak ada media
                            </div>
                        @endforelse
                    </div>
                </div>
            @empty
                <div
                    class="flex flex-col items-center justify-center py-4 text-center text-gray-500 dark:text-gray-300">
                    <h2 class="text-xl font-semibold mb-2">Data galeri tidak ditemukan</h2>
                </div>
            @endforelse

        </div>

        <div class="mt-4 p-2">
            {{ $galeri->links() }}
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
            const baseUrl = "{{ route('dashboard.galeri.index') }}";

            window.location.href = queryString ? `${baseUrl}?${queryString}` : baseUrl;
        });
    </script>

</x-layouts.admin>