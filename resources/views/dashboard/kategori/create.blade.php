<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl ">
            <div class="pt-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>TAMBAH KATEGORI</h1>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="p-6 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2">
                @include('dashboard.kategori.form')
            </div>
        </div>
    </div>
</x-layouts.admin>
