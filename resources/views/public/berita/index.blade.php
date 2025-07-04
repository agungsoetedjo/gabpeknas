<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Berita']" />
    <section>
        <div class="mx-auto w-full max-w-7xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Berita</h2>

            <div class="flex flex-col items-start mt-4">
                <form id="filter-form" onsubmit="event.preventDefault();" class="w-full mb-6">
                    <input type="text" id="search" placeholder="Cari berita..." class="w-full md:w-1/3 border rounded px-4 py-2" />
                </form>

                @if($provFinal && !str_contains($provFinal, 'jakarta'))
                    <div class="mb-4 bg-blue-100 text-blue-700 px-4 py-2 rounded text-sm">
                        Menampilkan berita dari wilayah <strong>{{ ucwords($provFinal) }}</strong>
                    </div>
                @endif

            </div>

            <div id="berita-container">
                @include('public.berita._list', ['berita' => $berita])
            </div>
        </div>
    </section>


    <script>
        let searchTimeout;

        function fetchBerita(fetchUrl = "{{ route('news.index') }}") {
            const search = document.getElementById('search').value.trim();
            const params = new URLSearchParams();

            const urlParams = new URLSearchParams(window.location.search);
            const prov = urlParams.get('prov');
            if (prov) params.set('prov', prov);

            if (search) params.set('search', search);

            const ajaxUrl = fetchUrl + (params.toString() ? `?${params.toString()}` : '');

            fetch(ajaxUrl, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('berita-container').innerHTML = html;
                document.getElementById('filter-form').style.display = 'flex';
                history.pushState(null, '', ajaxUrl);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        function loadBeritaDetail(event, url) {
            event.preventDefault();
            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('berita-container').innerHTML = html;
                document.getElementById('filter-form').style.display = 'none';
                history.pushState(null, '', url);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        function closeBeritaDetail() {
            fetchBerita();
        }

        window.addEventListener('popstate', () => {
            fetchBerita(location.href);
        });

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('search').addEventListener('input', () => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    fetchBerita();
                }, 400);
            });
        });
    </script>
</x-layouts.public>