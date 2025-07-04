<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>TAMBAH RUNNING TEXT</h1>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form action="{{ route('dashboard.runningtext.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="teks" class="block text-sm font-medium text-gray-700">Teks Running</label>
                    <textarea id="teks" name="teks" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400">{{ old('teks') }}</textarea>
                    @error('teks')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="aktif" name="aktif" class="form-checkbox h-5 w-5 text-blue-600"
                        {{ old('aktif', true) ? 'checked' : '' }}>
                    <label for="aktif" class="text-sm text-gray-700">Tampilkan (Aktif)</label>
                </div>

                <div class="pt-4 flex space-x-3">
                    <a href="{{ route('dashboard.runningtext.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>