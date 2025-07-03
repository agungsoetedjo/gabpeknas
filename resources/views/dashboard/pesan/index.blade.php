<x-layouts.admin>
    @php
        function sortLink($label, $field, $currentSort, $currentDirection) {
            $newDirection = ($currentSort === $field && $currentDirection === 'asc') ? 'desc' : 'asc';
            $arrow = '';

            if ($currentSort === $field) {
                $arrow = $currentDirection === 'asc' ? '▲' : '▼';
            }

            $url = request()->fullUrlWithQuery(['sort' => $field, 'direction' => $newDirection]);

            return "<a href=\"$url\" class=\"hover:underline\">$label $arrow</a>";
        }
    @endphp

    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>PESAN MASUK</h1>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mt-4 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2 overflow-auto">
                <table class="min-w-full bg-white rounded shadow text-sm">
                    <thead class="border-b-2">
                        <tr>
                            <th class="px-6 py-3 text-left">{!! sortLink('Waktu', 'created_at', $sort, $direction) !!}</th>
                            <th class="px-6 py-3 text-left">{!! sortLink('Nama', 'nama', $sort, $direction) !!}</th>
                            <th class="px-6 py-3 text-left">{!! sortLink('Email', 'email', $sort, $direction) !!}</th>
                            <th class="px-6 py-3 text-left">{!! sortLink('Kategori', 'kategori', $sort, $direction) !!}</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @forelse($pesan as $p)
                            <tr class="border-b">
                                <td class="px-6 py-2">
                                    {{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('l, d F Y, H:i') }}
                                </td>
                                <td class="px-6 py-2">{{ $p->nama_depan }} {{ $p->nama_belakang }}</td>
                                <td class="px-6 py-2">{{ $p->email }}</td>
                                <td class="px-6 py-2">{{ $p->kategori }}</td>
                                
                                <td class="px-6 py-2 space-x-2 flex items-center">
                                    <a href="{{ route('dashboard.pesan.show', $p->id) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                                        Lihat
                                    </a>
                                    <form action="{{ route('dashboard.pesan.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-3">Tidak ada pesan masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <nav class="mt-4 p-2">
                {{ $pesan->links() }}
            </nav>
        </div>
    </div>
</x-layouts.admin>
