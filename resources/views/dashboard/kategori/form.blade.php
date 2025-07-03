@props(['kategori' => null])

<form action="{{ $kategori ? route('dashboard.kategori.update', $kategori) : route('dashboard.kategori.store') }}"
    method="POST">
    @csrf
    @if ($kategori)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kategori</label>
        <input type="text"
            class="form-control w-full text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
            id="nama" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}" required>

        @error('nama')
            <p class="text-sm text-red-600 dark:text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="3"
            class="form-control w-full resize-none text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>

        @error('deskripsi')
            <p class="text-sm text-red-600 dark:text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="font-semibold px-3 py-1 rounded-md bg-blue-500 text-white">Simpan</button>
    <a href="{{ route('dashboard.kategori.index') }}"
        class="ml-3 px-6 py-1.5 rounded-md bg-red-500 text-white font-semibold">Batal</a>
</form>
