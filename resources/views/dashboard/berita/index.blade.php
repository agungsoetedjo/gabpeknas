<x-layouts.admin>

    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl ">
            <div class="pt-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DAFTAR BERITA</h1>
            </div>
            <div class="pb-4 ml-6 text-sm font-semibold text-gray-700">
                <p>Berisi berita konstruski baik dalam negeri maupun luar negeri</p>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <form method="GET" action="{{ route('dashboard.berita.index') }}" id="filterForm"
                class="mb-6 flex flex-col md:flex-row md:flex-wrap gap-4 items-start md:items-end">

                <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto flex-grow">
                    <input type="text" name="search" placeholder="Cari judul berita..."
                        value="{{ request('search') }}"
                        class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm" />

                    <select name="status"
                        class="w-full md:w-48 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm">
                        <option value="">Semua Status</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published
                        </option>
                    </select>
                    <select name="provinsi"
                        class="w-full md:w-48 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm">
                        <option value="" selected>Semua Provinsi</option>
                        @foreach($provinsiList as $prov)
                            <option value="{{ $prov->kode }}" {{ request('provinsi') == $prov->kode ? 'selected' : '' }}>
                                {{ $prov->nama }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                        Cari
                    </button>
                </div>
            </form>

            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.berita.create') }}"
                    class="inline-flex items-center gap-2 text-white rounded-md bg-green-500 hover:bg-green-600 px-4 py-2 text-sm font-medium transition-all">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Berita
                </a>
            </div>

            @forelse ($berita as $item)
                <div class="flex h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2">
                    <div class="w-2/3 p-2">
                        @php
                            $statusClass = $item->status === 'published' ? 'bg-green-500' : 'bg-red-500';
                        @endphp

                        <label class="{{ $statusClass }} text-white px-2 py-1 rounded font-semibold">
                            {{ ucfirst($item->status) }}
                        </label>

                        @if ($item->status === 'published' && $item->published_at)
                            <label class="ml-2 py-2 text-sm text-gray-600 dark:text-gray-300">
                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, d F Y H:i') }}
                            </label>
                        @endif

                        @if ($item->kategori)
                            <div class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                <span class="font-semibold">Kategori:</span>
                                {{ ucfirst($item->kategori->nama ?? '-') }}
                            </div>
                        @endif

                        @if ($item->provinsi)
                            <div class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                <span class="font-semibold">Provinsi:</span>
                                {{ ucfirst($item->provinsi->nama ?? '-') }}
                            </div>
                        @endif

                        <div class="py-4 text-1xl font-semibold">{{ $item->judul }}</div>

                        <div class="max-h-40 overflow-y-auto">
                            <div class="prose text-base text-justify">
                                {!! $item->konten !!}
                            </div>
                        </div>

                        <div class="py-4 flex gap-1">
                            <form action="{{ route('dashboard.berita.publish', $item) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin mengubah status berita ini?')">
                                @csrf
                                @method('PATCH')

                                @if ($item->status === 'draft')
                                    <button type="submit"
                                        class="px-4 py-1 rounded-md bg-green-600 text-white text-balance">
                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    </button>
                                @else
                                    <button type="submit"
                                        class="px-4 py-1 rounded-md bg-red-600 text-white text-balance">
                                        <ion-icon name="close-circle-outline"></ion-icon>
                                    </button>
                                @endif
                            </form>

                            <a href="{{ route('dashboard.berita.edit', $item) }}"
                                class="px-4 py-1 rounded-md bg-blue-500 text-white font-semibold">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>

                            <form action="{{ route('dashboard.berita.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-1 rounded-md bg-red-500 text-white font-semibold"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    <ion-icon name="trash"></ion-icon>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="w-1/3 p-2 flex justify-center items-center border bg-gray-100">
                        <div class="aspect-w-4 aspect-h-3 w-full">
                            <img src="{{ asset($item->image) }}" alt="Foto Berita"
                                class="object-contain w-full h-full" />
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="flex flex-col items-center justify-center py-4 text-center text-gray-500 dark:text-gray-300">
                    <h2 class="text-xl font-semibold mb-2">Data tidak ditemukan</h2>
                </div>
            @endforelse

        </div>

        <div class="mt-4 p-2">
            {{ $berita->links() }}
        </div>
    </div>

    <script>
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();
    
            const form = e.target;
            const search = form.querySelector('input[name="search"]').value.trim();
            const status = form.querySelector('select[name="status"]').value.trim();
            const provinsi = form.querySelector('select[name="provinsi"]').value.trim();
    
            const params = new URLSearchParams();
    
            if (search) params.set('search', search);
            if (status) params.set('status', status);
    
            // Jika provinsi DKI Jakarta (kode 31), JANGAN masukkan ke URL
            if (provinsi && provinsi !== '31') {
                params.set('provinsi', provinsi);
            }
    
            const queryString = params.toString();
            const baseUrl = "{{ route('dashboard.berita.index') }}";
    
            window.location.href = queryString ? `${baseUrl}?${queryString}` : baseUrl;
        });
    </script>    
</x-layouts.admin>