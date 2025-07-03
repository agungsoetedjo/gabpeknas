<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Rekapitulasi Keanggotaan']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Rekapitulasi Keanggotaan per-provinsi</h2>
            <div class="flex flex-col p-8 rounded-xl space-y-10">
                <div class="relative overflow-x-auto rounded-lg shadow-sm">
                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                        <thead>
                            <tr class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 text-gray-700">
                                <th rowspan="2" class="px-6 py-3">No</th>
                                <th rowspan="2" class="px-6 py-3">Provinsi</th>
                                <th colspan="4" class="px-6 py-3 text-center">Kualifikasi</th>
                                <th rowspan="2" class="px-6 py-3 text-center">Jumlah</th>
                            </tr>
                            <tr class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 text-gray-700">
                                <th class="px-6 py-3 text-center">Kecil</th>
                                <th class="px-6 py-3 text-center">Menengah</th>
                                <th class="px-6 py-3 text-center">Besar</th>
                                <th class="px-6 py-3 text-center">Spesialis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            function badgeIfPositive($value) {
                                if ($value > 0) {
                                    return '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">'
                                        . $value .
                                        '</span>';
                                }
                                return '<span class="text-gray-500">-</span>';
                            }
                            @endphp
                            @forelse ($data as $index => $row)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row['provinsi'] }}
                                    </td>
                                    <td class="px-6 py-4 text-center">{!! badgeIfPositive($row['k']) !!}</td>
                                    <td class="px-6 py-4 text-center">{!! badgeIfPositive($row['m']) !!}</td>
                                    <td class="px-6 py-4 text-center">{!! badgeIfPositive($row['b']) !!}</td>
                                    <td class="px-6 py-4 text-center">{!! badgeIfPositive($row['spesialis']) !!}</td>
                                    <td class="px-6 py-4 font-semibold text-center">
                                        {{ $row['k'] + $row['m'] + $row['b'] + $row['spesialis'] }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                        Belum ada data rekap anggota.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</x-layouts.public>