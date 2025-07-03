@props(['regulasi' => null, 'kategori'])

<form method="POST" action="{{ $regulasi ? route('dashboard.regulasi.update', $regulasi) : route('dashboard.regulasi.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($regulasi)
        @method('PUT')
    @endif

    {{-- Kategori Regulasi --}}
    <div class="form-group py-4">
        <select name="regulasi_kategori_id" id="regulasi_kategori_id"
            class="form-control text-gray-700 bg-gray-50 border border-gray-300 rounded-lg w-full">
            <option value="">Pilih Kategori Regulasi</option>
            @foreach ($kategori as $item)
                <option value="{{ $item->id }}"
                    {{ old('regulasi_kategori_id', $regulasi->regulasi_kategori_id ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
        @error('regulasi_kategori_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Judul --}}
    <div class="form-group mb-4">
        <input type="text" name="judul" id="judul"
            value="{{ old('judul', $regulasi->judul ?? '') }}"
            class="form-control bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2"
            placeholder="Judul Regulasi">
        @error('judul')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="form-group mb-4">
        <textarea name="deskripsi" id="deskripsi" rows="5"
            class="form-control bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2"
            placeholder="Deskripsi regulasi...">{{ old('deskripsi', $regulasi->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Upload Dokumen --}}
    <div class="form-group mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-700">Unggah File Dokumen (PDF)</label>
        <input type="file" name="file_dok" id="file_dok" accept="application/pdf"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
        @if (isset($regulasi->file_dok))
            <p class="text-sm mt-2 text-green-600">
                Dokumen Saat Ini: <a href="{{ asset($regulasi->file_dok) }}" target="_blank"
                    class="underline">Lihat Dokumen</a>
            </p>
        @endif
        @error('file_dok')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Status --}}
    <div class="form-group py-4">
        <select name="aktif" id="aktif"
            class="form-control text-gray-700 bg-gray-50 border border-gray-300 rounded-lg w-full">
            <option value="">Pilih Status</option>
            <option value="1" {{ old('aktif', $regulasi->aktif ?? '') == '1' ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ old('aktif', $regulasi->aktif ?? '') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
        @error('aktif')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tombol --}}
    <div class="py-6">
        <button type="submit" class="px-5 py-2 rounded-md bg-blue-500 text-white">Simpan</button>
        <a href="{{ route('dashboard.regulasi.index') }}"
            class="ml-3 px-8 py-2.5 rounded-md bg-red-500 text-white font-semibold">Batal</a>
    </div>
</form>