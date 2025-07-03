<x-layouts.admin>

    <div class="p-4 sm:ml-64">
        <div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Kategori Berita
                            </h5>
                            <p class="text-3xl font-bold text-purple-500">{{ $kategoriCount }}</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 dark:bg-purple-600/20 dark:text-purple-400 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Berita Draft</h5>
                            <p class="text-3xl font-bold text-yellow-500">{{ $draftCount }}</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-yellow-100 text-yellow-600 dark:bg-yellow-600/20 dark:text-yellow-400 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Berita Published</h5>
                            <p class="text-3xl font-bold text-green-500">{{ $publishedCount }}</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-green-100 text-green-600 dark:bg-green-600/20 dark:text-green-400 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>