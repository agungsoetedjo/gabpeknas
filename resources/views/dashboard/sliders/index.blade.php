<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl ">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DAFTAR SLIDER</h1>
            </div>
        </div>
        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <form method="GET" action="{{ route('dashboard.sliders.index') }}" id="filterForm"
                class="mb-6 flex flex-col md:flex-row md:flex-wrap gap-4 items-start md:items-end">

                <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto flex-grow">
                    <select name="status"
                        class="w-full md:w-48 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm">
                        <option value="">Semua Status</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published
                        </option>
                    </select>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                        Cari
                    </button>
                </div>
            </form>

            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.sliders.create') }}"
                    class="inline-flex items-center gap-2 text-white rounded-md bg-green-500 hover:bg-green-600 px-4 py-2 text-sm font-medium transition-all">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Slider
                </a>
            </div>

            <div class="mt-4 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2">
                <table class="table table-striped container">
                    <thead class="border-b-2">
                        <tr>
                            <th class="py-2">Gambar Slider</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $item)
                            <tr class="text-center border-b dark:border-gray-700">
                                <td class="py-3 px-4">
                                    <div
                                        class="w-96 h-20 mx-auto rounded-md overflow-hidden border border-gray-200 dark:border-gray-700">
                                        <img src="{{ asset($item->image) }}" alt="Slider Image"
                                            class="w-full h-full object-cover">
                                    </div>
                                </td>

                                <td class="py-3 px-4">
                                    <div class="flex flex-col items-center text-center">
                                        <span
                                            class="inline-block px-3 py-1 text-sm font-medium rounded-full
                                            {{ $item->status === 'published' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>

                                        @if ($item->status === 'published' && $item->published_at)
                                            <span class="text-xs text-gray-500 mt-1">
                                                Published at:
                                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y H:i') }}
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="py-3 px-4">
                                    <div class="flex justify-center gap-2">
                                        <form action="{{ route('dashboard.sliders.publish', $item) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin mengubah status slider ini?')">
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

                                        <a href="{{ route('dashboard.sliders.edit', $item) }}"
                                            class="px-4 py-1 rounded-md bg-blue-500 text-white font-semibold">
                                            <ion-icon name="create-outline"></ion-icon>
                                        </a>

                                        <form action="{{ route('dashboard.sliders.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-1 rounded-md bg-red-500 text-white font-semibold">
                                                <ion-icon name="trash"></ion-icon>
                                            </button>
                                        </form>
                                    </div>
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
                {{ $sliders->links() }}
            </nav>
        </div>
    </div>

    <script>
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const status = form.status.value.trim();

            const params = new URLSearchParams();

            if (status) params.set('status', status);

            const queryString = params.toString();
            const baseUrl = "{{ route('dashboard.sliders.index') }}";

            window.location.href = queryString ? `${baseUrl}?${queryString}` : baseUrl;
        });
    </script>
</x-layouts.admin>
