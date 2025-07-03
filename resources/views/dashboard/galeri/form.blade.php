@props(['galeri' => null])
<style>
    .preview-thumb {
        position: relative;
        width: 120px;
        height: 120px;
        border: 1px solid #ccc;
        overflow: hidden;
        border-radius: 6px;
    }
    .preview-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .remove-btn {
        position: absolute;
        top: 2px;
        right: 2px;
        background-color: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        cursor: pointer;
    }
</style>
<form id="galeri-form" method="POST"
    action="{{ $galeri ? route('dashboard.galeri.update', $galeri) : route('dashboard.galeri.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($galeri)
        @method('PUT')
    @endif

    {{-- Judul --}}
    <div class="mb-4">
        <input type="text" name="judul" placeholder="Judul Galeri"
            class="w-full p-2 border border-gray-300 rounded"
            value="{{ old('judul', $galeri->judul ?? '') }}">
        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="mb-4">
        <textarea id="editor" name="deskripsi" rows="5" placeholder="Deskripsi"
            class="w-full p-2 border border-gray-300 rounded">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
        @error('deskripsi') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Tanggal --}}
    <div class="mb-4">
        <input type="date" name="tanggal"
            class="w-full p-2 border border-gray-300 rounded"
            value="{{ old('tanggal', $galeri->tanggal ?? '') }}">
        @error('tanggal') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Upload Multiple --}}
    <div class="mb-4">
        <label class="block mb-1">Upload Gambar Galeri (multiple)</label>
        <input id="gallery-images" type="file" name="details[]" multiple accept="image/*"
            class="w-full border border-gray-300 rounded p-2 bg-gray-50">
        <p class="text-xs text-gray-500 mt-1">Unggah lebih dari satu gambar (maks. 2MB per file).</p>
        @error('details.*') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div id="preview-container" class="flex flex-wrap gap-4 mt-4"></div>

    {{-- Existing GaleriDetail --}}
    @if ($galeri && $galeri->details->count())
    <div id="existing-images" class="flex flex-wrap gap-4 mt-4">
        @foreach ($galeri->details as $detail)
            <div class="relative preview-thumb" data-id="{{ $detail->id }}">
                <img src="{{ asset($detail->file) }}" alt="Preview">
                <button type="button" class="remove-btn" onclick="removeExistingImage({{ $detail->id }})">×</button>
            </div>
        @endforeach
    </div>
    @endif

    {{-- Tombol --}}
    <div class="mt-6">
        <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded">Simpan</button>
        <a href="{{ route('dashboard.galeri.index') }}"
            class="ml-2 px-5 py-2 bg-red-500 text-white rounded">Batal</a>
    </div>
</form>


@once
    <x-head.tinymce-galeri-config />
@endonce

<script>
    const input = document.getElementById('gallery-images');
    const previewContainer = document.getElementById('preview-container');
    let filesArray = [];

    input.addEventListener('change', function (event) {
        filesArray = Array.from(event.target.files);
        updatePreview();
    });

    function updatePreview() {
        previewContainer.innerHTML = '';

        filesArray.forEach((file, index) => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const thumb = document.createElement('div');
                thumb.classList.add('preview-thumb');

                const img = document.createElement('img');
                img.src = e.target.result;

                const removeBtn = document.createElement('button');
                removeBtn.classList.add('remove-btn');
                removeBtn.innerText = 'x';
                removeBtn.onclick = function () {
                    filesArray.splice(index, 1);
                    updateFileList();
                    updatePreview();
                };

                thumb.appendChild(img);
                thumb.appendChild(removeBtn);
                previewContainer.appendChild(thumb);
            };
            reader.readAsDataURL(file);
        });
    }

    function updateFileList() {
        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
    }    let deletedDetails = [];

    function removeExistingImage(id) {
        const thumb = document.querySelector(`[data-id="${id}"]`);
        if (thumb) {
            thumb.remove(); // hapus preview
        }

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'deleted_details[]'; // penting: gunakan array!
        input.value = id;

        document.getElementById('galeri-form').appendChild(input);
    }
</script>