<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl">
            <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>EDIT GALERI</h1>
            </div>
        </div>

        <div class="mt-6 p-4 border-2 border-dashed rounded-lg border-gray-200">
            @include('dashboard.galeri.form', ['galeri' => $galeri])
        </div>
    </div>
</x-layouts.admin>
