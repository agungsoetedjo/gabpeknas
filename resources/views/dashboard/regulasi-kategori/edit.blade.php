<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm px-6 py-5 border border-gray-200 dark:border-gray-700">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                Edit Kategori Regulasi
            </h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Ubah data kategori regulasi sesuai kebutuhan.
            </p>
        </div>

        <!-- Form Edit -->
        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="p-6 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded shadow">
                @include('dashboard.regulasi-kategori.form', ['kategori' => $kategori])
            </div>
        </div>
    </div>
</x-layouts.admin>