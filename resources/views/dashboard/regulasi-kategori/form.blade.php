@props(['kategori' => null])

<form action="{{ isset($kategori) ? route('dashboard.regulasi-kategori.update', $kategori->id) : route('dashboard.regulasi-kategori.store') }}"
    method="POST" class="space-y-6">
    @csrf
    @if(isset($kategori))
        @method('PUT')
    @endif

    <!-- Nama -->
    <div>
        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Kategori</label>
        <input type="text" name="nama" id="nama"
            value="{{ old('nama', $kategori->nama ?? '') }}"
            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-white"
            required>
    </div>

    <!-- Deskripsi -->
    <div>
        <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
        <input type="text" name="deskripsi" id="deskripsi"
            value="{{ old('deskripsi', $kategori->deskripsi ?? '') }}"
            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-white">
    </div>

    <!-- Aktif -->
    <div>
        <label for="aktif" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status Aktif</label>
        <select name="aktif" id="aktif"
            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-white"
            required>
            <option value="">-- Pilih Status --</option>
            <option value="1" {{ old('aktif', $kategori->aktif ?? '') == '1' ? 'selected' : '' }}>Ya</option>
            <option value="0" {{ old('aktif', $kategori->aktif ?? '') == '0' ? 'selected' : '' }}>Tidak</option>
        </select>
    </div>

    <!-- Tombol -->
    <div class="pt-4">
        <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            {{ isset($kategori) ? 'Update' : 'Simpan' }} Kategori
        </button>
    </div>
</form>