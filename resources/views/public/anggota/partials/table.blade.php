@php
    $maxPagesToShow = 5;
    $start = max(1, $currentPage - 2);
    $end = min($totalPages, $start + $maxPagesToShow - 1);
    if ($end - $start < $maxPagesToShow - 1) {
        $start = max(1, $end - $maxPagesToShow + 1);
    }

    $startItem = ($currentPage - 1) * $perPage + 1;
    $endItem = min($startItem + $perPage - 1, $filteredData);
@endphp

<div class="relative overflow-x-auto rounded-lg shadow-sm">
    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 text-gray-700">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Nama Badan Usaha</th>
                <th class="px-6 py-3">Provinsi</th>
                <th class="px-6 py-3">Kabupaten/Kota</th>
                <th class="px-6 py-3">Kualifikasi</th>
                <th class="px-6 py-3">Tgl Pembuatan</th>
                <th class="px-6 py-3">Berlaku Hingga</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $bu)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ ($currentPage - 1) * $perPage + $index + 1 }}
                    </td>
                    <td class="px-6 py-4">{{ $bu->nama_bujk }}</td>
                    <td class="px-6 py-4">{{ $bu->provinsi->nama }}</td>
                    <td class="px-6 py-4">{{ $bu->kabupatenKota->kab_kota }}</td>
                    <td class="px-6 py-4">{{ $bu->kualifikasi }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($bu->tgl_pembuatan)->translatedFormat('d F Y') }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($bu->tgl_berakhir)->translatedFormat('d F Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="flex justify-between items-center pt-6 flex-wrap gap-2 text-sm text-gray-600 dark:text-gray-400">
    <div>
        <p>
            Menampilkan <strong>{{ $startItem }} s/d {{ $endItem }}</strong> dari <strong>{{ $filteredData }}</strong> hasil
            @if (!empty($search))
                untuk pencarian "<strong>{{ $search }}</strong>"
            @endif
            @if ($filteredData < $totalData)
                <span class="text-xs text-gray-500">(Total anggota: {{ $totalData }})</span>
            @endif
        </p>
    </div>

    <div class="flex flex-wrap items-center gap-1 pagination">
        @if ($currentPage > 1)
            <a href="?page={{ $currentPage - 1 }}&search={{ $search }}&sort_by={{ $sortBy }}&sort_direction={{ $sortDirection }}"
                class="px-3 py-1 text-sm bg-gray-200 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                &larr; Sebelumnya
            </a>
        @endif

        @if ($start > 1)
            <a href="?page=1&search={{ $search }}&sort_by={{ $sortBy }}&sort_direction={{ $sortDirection }}"
                class="px-3 py-1 text-sm bg-gray-200 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                1
            </a>
            <span class="px-2 text-sm">...</span>
        @endif

        @for ($i = $start; $i <= $end; $i++)
            <a href="?page={{ $i }}&search={{ $search }}&sort_by={{ $sortBy }}&sort_direction={{ $sortDirection }}"
                class="px-3 py-1 text-sm rounded {{ $i == $currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600' }}">
                {{ $i }}
            </a>
        @endfor

        @if ($end < $totalPages)
            <span class="px-2 text-sm">...</span>
            <a href="?page={{ $totalPages }}&search={{ $search }}&sort_by={{ $sortBy }}&sort_direction={{ $sortDirection }}"
                class="px-3 py-1 text-sm bg-gray-200 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                {{ $totalPages }}
            </a>
        @endif

        @if ($currentPage < $totalPages)
            <a href="?page={{ $currentPage + 1 }}&search={{ $search }}&sort_by={{ $sortBy }}&sort_direction={{ $sortDirection }}"
                class="px-3 py-1 text-sm bg-gray-200 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                Selanjutnya &rarr;
            </a>
        @endif
    </div>
</div>