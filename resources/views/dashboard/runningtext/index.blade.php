<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DAFTAR RUNNING TEXT</h1>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.runningtext.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                    + Tambah Running Text
                </a>
            </div>

            <div class="rounded bg-gray-50 dark:bg-gray-800 border-2 overflow-auto">
                <table class="min-w-full bg-white rounded shadow text-sm">
                    <thead class="border-b-2">
                        <tr>
                            <th class="px-6 py-3 text-left">Teks</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($runningtexts as $item)
                            <tr class="border-b">
                                <td class="px-6 py-3">
                                    {{ $item->teks }}
                                </td>
                                <td class="px-6 py-3">
                                    <span class="inline-block px-2 py-1 rounded text-xs font-semibold
                                        {{ $item->aktif ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                        {{ $item->aktif ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 space-x-2 flex items-center">
                                    <a href="{{ route('dashboard.runningtext.edit', $item->id) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.runningtext.destroy', $item->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">Tidak ada data Running Text.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 p-2">
                {{ $runningtexts->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>
