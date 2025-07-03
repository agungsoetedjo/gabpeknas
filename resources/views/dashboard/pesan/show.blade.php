<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>DETAIL PESAN</h1>
            </div>
        </div>

        <div class="mt-6 p-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <th class="py-2 pr-4 font-semibold">Waktu Kirim</th>
                            <td class="py-2">{{ \Carbon\Carbon::parse($pesan->created_at)->translatedFormat('d F Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4 font-semibold w-1/4">Nama</th>
                            <td class="py-2">{{ $pesan->nama_depan }} {{ $pesan->nama_belakang }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4 font-semibold">Email</th>
                            <td class="py-2">{{ $pesan->email }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4 font-semibold">Telepon/HP</th>
                            <td class="py-2">{{ $pesan->no_telp }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4 font-semibold">Kategori</th>
                            <td class="py-2">{{ $pesan->kategori }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pr-4 font-semibold align-top">Pesan</th>
                            <td class="py-2">
                                <div class="bg-gray-100 p-4 rounded whitespace-pre-line text-gray-800">
                                    {{ $pesan->message }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex items-center gap-2">
                <a href="{{ route('dashboard.pesan.index') }}"
                   class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-medium transition">
                    ← Kembali ke daftar pesan
                </a>
            </div>
        </div>
    </div>
</x-layouts.admin>
