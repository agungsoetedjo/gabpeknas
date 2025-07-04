<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DAFTAR FAQ</h1>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.faq.create') }}"
                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                    + Tambah FAQ
                </a>
            </div>

            <div class="rounded bg-gray-50 dark:bg-gray-800 border-2 overflow-auto">
                <table class="min-w-full bg-white rounded shadow text-sm">
                    <thead class="border-b-2">
                        <tr>
                            <th class="px-6 py-3 text-left w-1/4">Pertanyaan</th>
                            <th class="px-6 py-3 text-left w-2/5">Jawaban</th>
                            <th class="px-6 py-3 text-left w-1/6">Status</th>
                            <th class="px-6 py-3 text-left w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($faqs as $faq)
                            <tr class="border-b">
                                <td class="px-6 py-3 font-medium text-gray-700">
                                    {{ Str::limit($faq->question, 80) }}
                                </td>
                                <td class="px-6 py-3 text-gray-600">
                                    {{ Str::limit(strip_tags($faq->answer), 100) }}
                                </td>
                                <td class="px-6 py-3">
                                    <span class="inline-block px-2 py-1 rounded text-xs font-semibold
                                        {{ $faq->is_active ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                        {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 space-x-2 flex items-center">
                                    <a href="{{ route('dashboard.faq.edit', $faq->id) }}"
                                       class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.faq.destroy', $faq->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')" class="inline">
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
                                <td colspan="4" class="text-center py-4">Belum ada data FAQ.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 p-2">
                {{ $faqs->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>