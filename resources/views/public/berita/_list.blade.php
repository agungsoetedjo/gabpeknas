<div class="w-full">
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($berita as $item)
            <a href="{{ route('news.show', $item) }}"
                onclick="loadBeritaDetail(event, '{{ route('news.show', $item) }}')"
                class="flex flex-col gap-6 bg-white p-6 shadow-md rounded-lg hover:shadow-lg transition-all duration-300 ease-in-out">
                <img src="{{ asset($item->image) }}" alt="{{ $item->judul }}"
                    class="w-full h-48 object-cover rounded-md" />
                <div class="flex flex-col">
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-sm font-semibold text-gray-500">
                            {{ ucwords($item->kategori->nama ?? 'Tanpa Kategori') }}
                        </p>
                        <span class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($item->published_at)->diffForHumans() }}</span>
                    </div>
                    <p class="text-lg font-semibold text-gray-800 mb-4">{{ $item->judul }} </p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $berita->links() }}
    </div>
</div>
