@props(['slider' => null, 'kategori'])

<form method="POST" action="{{ $slider ? route('dashboard.sliders.update', $slider) : route('dashboard.sliders.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($slider)
        @method('PUT')
    @endif



    {{-- Gambar --}}
    <div class="flex items-center justify-center w-full mb-4">
        <label for="dropzone-file"
            class="relative flex items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 overflow-hidden">
            <img id="preview-image"
                class="max-h-full max-w-full object-contain {{ isset($slider->image) ? '' : 'hidden' }}"
                src="{{ isset($slider->image) ? asset($slider->image) : '' }}" />
            <div id="dropzone-content"
                class="flex flex-col items-center justify-center text-center {{ isset($slider->image) ? 'hidden' : '' }}">
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



    {{-- Tombol --}}
    <div class="py-6">
        <button type="submit" class="px-5 py-2 rounded-md bg-blue-500 text-white">Simpan</button>
        <a href="{{ route('dashboard.sliders.index') }}"
            class="ml-3 px-8 py-2.5 rounded-md bg-red-500 text-white font-semibold">Batal</a>
    </div>
</form>

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
