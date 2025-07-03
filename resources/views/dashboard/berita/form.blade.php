@php
    $berita = $berita ?? null;
    $kategori = $kategori ?? [];
    $provinsi = $provinsi ?? [];
@endphp


<form method="POST" action="{{ $berita ? route('dashboard.berita.update', $berita) : route('dashboard.berita.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($berita)
        @method('PUT')
    @endif

    {{-- Kategori --}}
    <div class="form-group">
        <select class="form-control text-gray-500 bg-gray-50 border border-gray-300 rounded-lg" id="kategori_id"
            name="kategori_id">
            <option value="">Pilih Kategori</option>
            @foreach ($kategori as $item)
                <option value="{{ $item->id }}"
                    {{ old('kategori_id', $berita->kategori_id ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
        @error('kategori_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Provinsi --}}
    <div class="form-group py-4">
    {{-- Hidden input untuk kode provinsi --}}
    <input type="hidden" name="kode_provinsi" id="kode_provinsi_hidden"
        value="{{ old('kode_provinsi', $berita->kode_provinsi ?? $auto_provinsi_kode ?? '') }}">

    {{-- Tampilan nama provinsi --}}
    <input type="text" id="provinsi_display"
        class="form-control bg-gray-100 border border-gray-300 text-gray-500 rounded-lg"
        value="{{
            old('kode_provinsi')
                ? ($provinsi->firstWhere('kode', old('kode_provinsi'))->nama ?? '')
                : ($provinsi->firstWhere('kode', $berita->kode_provinsi ?? $auto_provinsi_kode)->nama ?? '')
        }}"
        placeholder="Deteksi otomatis lokasi provinsi..."
        readonly>


        @error('kode_provinsi')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Judul --}}
    <div class="form-group mb-4">
        <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul ?? '') }}"
            class="form-control bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2"
            placeholder="Judul Berita">
        @error('judul')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Konten --}}
    <div class="mb-4 border border-gray-200 rounded-lg bg-gray-50">
        <div class="px-4 py-2 bg-white rounded-b-lg">
            <textarea id="editor" rows="8" name="konten"
                class="form-control w-full px-0 text-sm text-gray-800 bg-white border-0 focus:ring-0"
                placeholder="Tulis isi berita disini....">{{ old('konten', $berita->konten ?? '') }}</textarea>
        </div>
        @error('konten')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Gambar --}}
    <div class="flex items-center justify-center w-full mb-4">
        <label for="dropzone-file"
            class="relative flex items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 overflow-hidden">
            <img id="preview-image"
                class="max-h-full max-w-full object-contain {{ isset($berita->image) ? '' : 'hidden' }}"
                src="{{ isset($berita->image) ? asset($berita->image) : '' }}" />
            <div id="dropzone-content"
                class="flex flex-col items-center justify-center text-center {{ isset($berita->image) ? 'hidden' : '' }}">
                <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5A5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500">
                    <span class="font-semibold">Click to upload</span>
                </p>
                <p class="text-xs text-gray-500">SVG, PNG, JPG atau GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" name="image" type="file" class="hidden" accept="image/*" />
        </label>
    </div>
    @error('image')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror

    {{-- Status --}}
    <div class="form-group py-4">
        <select class="form-control text-gray-500 bg-gray-50 border border-gray-300 rounded-lg" id="status"
            name="status">
            <option value="">Pilih Status</option>
            <option value="draft" {{ old('status', $berita->status ?? '') == 'draft' ? 'selected' : '' }}>Draft
            </option>
            <option value="published" {{ old('status', $berita->status ?? '') == 'published' ? 'selected' : '' }}>
                Published</option>
        </select>
        @error('status')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tombol --}}
    <div class="py-6">
        <button type="submit" class="px-5 py-2 rounded-md bg-blue-500 text-white">Simpan</button>
        <a href="{{ route('dashboard.berita.index') }}"
            class="ml-3 px-8 py-2.5 rounded-md bg-red-500 text-white font-semibold">Batal</a>
    </div>
</form>

@once
    <x-head.tinymce-config />
@endonce

<script>
    document.getElementById('dropzone-file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-image');
        const content = document.getElementById('dropzone-content');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                content.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            alert('Hanya file gambar yang diperbolehkan!');
            this.value = '';
            preview.classList.add('hidden');
            content.classList.remove('hidden');
        }
    });
</script>