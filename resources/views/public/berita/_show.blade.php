<div class="w-full px-6 md:px-10 py-8 bg-white rounded-lg shadow-lg mt-6">
    <button onclick="closeBeritaDetail()" class="mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        ← Kembali
    </button>

    <h1 class="mb-6 text-3xl md:text-4xl font-bold text-gray-800">
        {{ $berita->judul }}
    </h1>

    <p class="mb-4 text-sm font-medium text-gray-600 uppercase">
        {{ $berita->kategori->nama ?? 'Tanpa Kategori' }}
    </p>

    <p class="mb-4 text-sm text-gray-500">
        {{ \Carbon\Carbon::parse($berita->published_at)->translatedFormat('l, d F Y H:i') }}
    </p>

    <div class="mb-8 w-full overflow-hidden rounded-lg">
        <img src="{{ asset($berita->image) }}" alt="{{ $berita->judul }}"
            class="w-full h-auto object-cover rounded-lg shadow-md" />
    </div>

    <div class="prose text-base max-w-none text-justify">
        {!! $berita->konten !!}
    </div>
</div>
