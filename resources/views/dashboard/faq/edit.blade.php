<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>EDIT FAQ</h1>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form action="{{ route('dashboard.faq.update', $faq->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="question" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <input type="text" id="question" name="question"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        value="{{ old('question', $faq->question) }}">
                    @error('question')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="answer" class="block text-sm font-medium text-gray-700">Jawaban</label>
                    <textarea id="answer" name="answer" rows="5"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400">{{ old('answer', $faq->answer) }}</textarea>
                    @error('answer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="is_active" name="is_active"
                        class="form-checkbox h-5 w-5 text-blue-600"
                        {{ old('is_active', $faq->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="text-sm text-gray-700">Tampilkan (Aktif)</label>
                </div>

                <div class="pt-4 flex space-x-3">
                    <a href="{{ route('dashboard.faq.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
