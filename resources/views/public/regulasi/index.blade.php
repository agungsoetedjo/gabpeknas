<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Regulasi']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Regulasi</h2>
            <div class="flex flex-col p-8 rounded-xl space-y-10">
                <div class="pt-6 space-y-4">
                    {{-- Tab Header --}}
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="kategori-tab" data-tabs-toggle="#kategori-tab-content" data-tabs-active-classes="text-red-600 border-red-600 dark:text-red-500 dark:border-red-500" data-tabs-inactive-classes="text-gray-500 border-transparent dark:text-gray-400 dark:border-transparent" role="tablist">
                            @foreach($kategoriRegulasi as $kategori)
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg @if($loop->first) text-red-600 border-red-600 dark:text-red-500 dark:border-red-500 @endif" 
                                        id="tab-{{ $kategori->id }}" 
                                        data-tabs-target="#content-{{ $kategori->id }}" 
                                        type="button" role="tab" 
                                        aria-controls="content-{{ $kategori->id }}" 
                                        @if($loop->first) aria-selected="true" @else aria-selected="false" @endif>
                                        {{ $kategori->nama }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Tab Content --}}
                    <div id="kategori-tab-content">
                        @foreach($kategoriRegulasi as $kategori)
                            <div class="@if($loop->first) block @else hidden @endif p-4 rounded-lg bg-white dark:bg-gray-900" 
                                 id="content-{{ $kategori->id }}" 
                                 role="tabpanel" 
                                 aria-labelledby="tab-{{ $kategori->id }}">
                                
                                @if($kategori->regulasi->count())
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-200 rounded-lg">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th class="p-4 border">Judul</th>
                                                    <th class="p-4 border">File</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kategori->regulasi as $item)
                                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                                        <td class="p-4 border font-semibold text-gray-700 dark:text-gray-200">{{ $item->judul }}</td>
                                                        <td class="p-4 border text-center">
                                                            @if ($item->file_dok)
                                                                <a href="{{ asset($item->file_dok) }}" target="_blank"
                                                                   class="inline-block px-2 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                                                    Download
                                                                </a>
                                                            @else
                                                                <span class="inline-block px-2 py-1 text-xs font-medium text-gray-500 bg-gray-200 rounded">
                                                                    Tidak ada file
                                                                </span>
                                                            @endif
                                                        </td>                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-sm text-gray-500">Belum ada regulasi untuk kategori ini.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</x-layouts.public>