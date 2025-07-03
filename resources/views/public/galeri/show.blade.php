<x-layouts.public>
    <section>
        <div class="mx-auto max-w-8xl px-5 py-8 md:px-10 md:py-20">
            <div class="flex flex-col p-8 rounded-xl bg-white/20 dark:bg-gray-800 border-2 space-y-10">

                <div class="space-y-2 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $galeri->judul }}</h2>
                    <p class="text-gray-500 dark:text-gray-300">{!! $galeri->deskripsi !!}</p>
                    <p class="text-sm text-gray-400 dark:text-gray-400 italic">{{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('l, d F Y') }}</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($galeri->details as $item)
                        <div class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-md">
                            <a href="{{ asset($item->file) }}" 
                            class="glightbox" 
                            data-gallery="galeri-{{ $galeri->id }}" 
                            data-title="{{ $item->keterangan }}">
                                <img src="{{ asset($item->file) }}" 
                                    alt="{{ $item->keterangan ?? 'Foto Galeri' }}" 
                                    class="w-full h-60 object-cover">
                            </a>
                            
                            @if ($item->keterangan)
                                <div class="p-4">
                                    <p class="text-sm text-gray-700 dark:text-gray-200 text-center">
                                        {{ $item->keterangan }}
                                    </p>
                                </div>
                            @endif
                        </div>                    
                    @endforeach
                </div>

                @if ($galeri->details->isEmpty())
                    <div class="text-center text-gray-500 dark:text-gray-300">
                        Belum ada foto pada galeri ini.
                    </div>
                @endif

            </div>
        </div>
    </section>

    <x-footer></x-footer>
</x-layouts.public>