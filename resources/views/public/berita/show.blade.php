<x-layouts.public>
    <section>
        <!-- Container -->
        <div class="mx-auto w-full max-w-7xl px-5 py-8 md:px-10 md:py-20">
            <!-- Header -->
            <div class="flex flex-col items-start space-y-6">

                <!-- Box Konten -->
                <div class="w-full rounded-lg border border-gray-200 shadow-lg p-8 bg-white">
                    <!-- Judul Berita -->
                    <h1 class="mb-6 text-3xl md:text-4xl font-bold text-gray-800">
                        {{ $berita->judul }}
                    </h1>

                    <!-- Kategori -->
                    <p class="mb-4 text-sm font-medium text-gray-600 uppercase">
                        {{ $berita->kategori->nama ?? 'Tanpa Kategori' }}
                    </p>

                    <!-- Waktu Publish -->
                    <p class="mb-4 text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($berita->published_at)->translatedFormat('l, d F Y H:i') }}
                    </p>

                    <!-- Gambar -->
                    <div class="mb-8 w-full max-w-2xl overflow-hidden rounded-lg mx-auto">
                        <img src="{{ asset($berita->image) }}" alt="{{ $berita->judul }}"
                            class="w-full h-auto object-cover rounded-lg shadow-md" />
                    </div>

                    <!-- Konten -->
                    {{-- <div class="text-base leading-relaxed text-gray-700 text-justify space-y-6">
                        {!! $berita->konten !!}
                    </div> --}}

                    <div class="prose text-base max-w-none text-justify">
                        {!! $berita->konten !!}
                    </div>

                    <!-- Tombol -->
                    <div class="mt-8 flex justify-center">
                        <a href="{{ url()->previous() }}"
                            class="mt-4 inline-block rounded-lg bg-blue-600 px-6 py-3 text-white font-semibold hover:bg-blue-700 transition">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layouts.public>