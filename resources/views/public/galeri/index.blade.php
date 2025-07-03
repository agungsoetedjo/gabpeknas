<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Galeri']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Galeri</h2>
            <div class="flex flex-col p-8 rounded-xl bg-white/20 dark:bg-gray-800 border-2 mt-4">
                <div class="pt-6 space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($galeris as $galeri)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                                <div class="aspect-square overflow-hidden">
                                    @php
                                        $thumbnail = optional($galeri->details->first())->file;
                                    @endphp

                                    @if ($thumbnail)
                                        <img src="{{ asset($thumbnail) }}" alt="{{ $galeri->judul }}"
                                            class="w-full h-full object-cover transition duration-300 hover:scale-105">
                                    @else
                                        <div class="flex items-center justify-center w-full h-full bg-gray-100 text-gray-400 text-sm">
                                            Tidak ada gambar
                                        </div>
                                    @endif
                                </div>

                                <div class="p-4 text-center">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                        {{ $galeri->judul }}
                                    </h3>
                                    <div class="text-sm text-gray-600 mb-1">
                                        {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('l, d F Y') }}
                                    </div>
                                    <a href="{{ route('gallery.show', $galeri) }}"
                                    class="inline-block mt-3 px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                                Belum ada galeri tersedia.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</x-layouts.public>