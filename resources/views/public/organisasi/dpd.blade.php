<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Dewan Pimpinan Daerah']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Dewan Pimpinan Daerah</h2>
            <div class="flex flex-col p-8 rounded-xl space-y-10">
                <form id="filter-form" class="mb-4 flex flex-col md:flex-row gap-3 md:items-center">
                    <input type="text" name="search" placeholder="Cari..."
                        value="{{ request('search') }}"
                        class="w-full md:w-1/3 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" />
                
                    <select name="sort_by" class="px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                        <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Sort by ID</option>
                        <option value="provinsi" {{ request('sort_by') == 'provinsi' ? 'selected' : '' }}>Sort by Provinsi</option>
                        <option value="kab_kota" {{ request('sort_by') == 'kab_kota' ? 'selected' : '' }}>Sort by Kota</option>
                    </select>
                
                    <select name="sort_direction" class="px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                        <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </form>

                <div id="dpd-tabel">
                    @include('public.organisasi.partials.table', [
                        'data' => $data,
                        'currentPage' => $currentPage,
                        'perPage' => $perPage,
                        'totalPages' => $totalPages,
                        'search' => $search,
                        'sortBy' => $sortBy,
                        'sortDirection' => $sortDirection,
                        'totalData' => $totalData,
                        'filteredData' => $filteredData,
                    ])
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>

    <script>
        const form = document.getElementById('filter-form');
        const tableWrapper = document.getElementById('dpd-tabel');

        function fetchData() {
            const formData = new FormData(form);
            const params = new URLSearchParams(formData).toString();

            fetch("{{ route('dpd') }}?" + params, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                tableWrapper.innerHTML = data.html;
            });
        }

        form.querySelector('[name="search"]').addEventListener('input', fetchData);
        form.querySelectorAll('select').forEach(select => select.addEventListener('change', fetchData));

        document.addEventListener('click', function (e) {
            const link = e.target.closest('.pagination a');
            if (link) {
                e.preventDefault();
                fetch(link.href, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(data => {
                    tableWrapper.innerHTML = data.html;
                });
            }
        });
    </script>
</x-layouts.public>