
    <div>
        <textarea id="editor" name="deskripsi" rows="4" class="form-control block p-1.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"wire:model.defer="deskripsi">
            {{-- @if (!empty($berita->nomor))
                {{ $berita->where('nomor', $berita->nomor)->first()->deskripsi }}
            @endif --}}
        </textarea>
    </div>

