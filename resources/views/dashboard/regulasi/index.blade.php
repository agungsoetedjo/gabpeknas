<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="pt-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DAFTAR REGULASI</h1>
            </div>
            <div class="pb-4 ml-6 text-sm text-gray-700">
                <p>Berisi kumpulan regulasi yang berlaku</p>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-dashed border-gray-200 rounded-lg">

            <div class="mb-4 flex justify-end">
                <a href="{{ route('dashboard.regulasi.create') }}"
                    class="inline-flex items-center gap-2 text-white rounded-md bg-green-500 hover:bg-green-600 px-4 py-2 text-sm font-medium">
                    Tambah Regulasi
                </a>
            </div>

            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">Judul</th>
                        <th class="p-2 border">Kategori</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">File</th>
                        <th class="p-2 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($regulasi as $item)
                        <tr>
                            <td class="p-2 border">{{ $loop->iteration }}</td>
                            <td class="p-2 border">{{ $item->judul }}</td>
                            <td class="p-2 border">{{ $item->kategori->nama ?? '-' }}</td>
                            <td class="py-2 px-4 border">
                                {{ $item->aktif == 1 ? '✔️' : '❌' }}
                            </td>
                            <td class="p-2 border text-center">
                                @if ($item->file_dok)
                                    <a href="{{ asset($item->file_dok) }}" target="_blank"
                                       class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                                        {{-- Icon file --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 12h6m-6 4h6m2 4.5H7a2.25 2.25 0 01-2.25-2.25V5.25C4.75 4.56 5.31 4 6 4h7.5L18 8.5v11.75A2.25 2.25 0 0115.75 22.5z" />
                                        </svg>
                                        Lihat File
                                    </a>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs font-medium text-gray-500 bg-gray-200 rounded">
                                        Tidak ada file
                                    </span>
                                @endif
                            </td>                            
                            <td class="p-2 border text-center">
                                <a href="{{ route('dashboard.regulasi.edit', $item) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                                <form action="{{ route('dashboard.regulasi.destroy', $item) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus regulasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 p-4">Belum ada data regulasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $regulasi->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>