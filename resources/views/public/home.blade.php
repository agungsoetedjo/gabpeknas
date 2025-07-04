<x-layouts.public>

    @if ($sliders->isNotEmpty())
        <x-slide :sliders="$sliders" />
    @endif
    
    <div class="flex mt-2 mb-2 px-2 bg-yellow-200">
        <marquee class="py-1 lg:py-2" direction="left" onmouseover="this.stop()" onmouseout="this.start()"
            scrollamount="10" behavior="scroll">
            <div class="flex text-sm lg:text-lg xl:text-xl">
                @foreach($runningText as $text)
                    <div class="px-3">
                        "{{ $text->teks }}"
                    </div> |
                @endforeach
            </div>
        </marquee>
    </div>

    <div class="bg-white py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-xl p-8 md:p-12 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">STATISTIK KEANGGOTAAN</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center">
                            <span class="text-5xl font-bold text-green-600 purecounter"
                                  data-purecounter-start="0"
                                  data-purecounter-end="{{ $totalAnggota }}"
                                  data-purecounter-duration="2">0</span>
                            <span class="text-5xl font-bold text-green-500 ml-1">+</span>
                        </div>
                        <p class="mt-2 text-sm font-semibold text-gray-700 uppercase">Anggota Teregistrasi</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center">
                            <span class="text-5xl font-bold text-yellow-600 purecounter"
                                  data-purecounter-start="0"
                                  data-purecounter-end="{{ $anggotaKadaluarsa }}"
                                  data-purecounter-duration="2">0</span>
                            <span class="text-5xl font-bold text-yellow-500 ml-1">+</span>
                        </div>
                        <p class="mt-2 text-sm font-semibold text-gray-700 uppercase">Anggota Kadaluarsa<br>per-hari ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <div id="section-berita" class="bg-white/50 ">
        <div class="p-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">BERITA TERBARU</h2>
                <span class="block text-center text-md italic text-gray-500 mb-8">Artikel pilihan seputar layanan, kebijakan, dan perkembangan terbaru.</span>
                
            </div>
            @if(request('prov') && !str_contains(request('prov'), 'jakarta'))
                <div class="text-center bg-blue-100 text-blue-800 p-2 rounded mb-4 text-sm">
                    Menampilkan berita wilayah: <strong>{{ ucwords(request('prov')) }}</strong>
                </div>
            @endif
            
            <div class="max-w-7xl mx-auto">
                <div id="berita-container">
                    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 mb-6 ">
                    @foreach ($berita as $item)
                        <a href="{{ route('news.show', $item->slug) }}"
                            onclick="loadBeritaDetail(event, '{{ route('news.show', $item->slug) }}')"                 
                            class="group rounded-md border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">

                                <div class="w-full h-64 overflow-hidden">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                                </div>

                                <div class="p-6">
                                    <div class="flex justify-between items-center">
                                        <p class="text-xs font-medium text-gray-500 uppercase">
                                            {{ $item->kategori->nama ?? 'Tanpa Kategori' }}
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            {{ \Carbon\Carbon::parse($item->published_at)->diffForHumans() }}
                                        </p>
                                    </div>

                                    <h3 class="mt-2 text-lg font-semibold text-gray-800 line-clamp-3">
                                        {{ $item->judul }}
                                    </h3>
                                </div>
                        </a>
                    @endforeach
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <a class="py-3 px-4 inline-flex items-center gap-x-1 text-sm font-medium rounded-full border border-gray-200 bg-white text-blue-600 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-blue-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        href="{{ route('news.index') }}">
                        Berita lainnya
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full py-12 px-4 sm:px-6 lg:px-12 mb-5 bg-white/50">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2" data-aos="fade-up">
            DIDUKUNG OLEH INSTANSI TERKAIT
        </h2>
        <span class="block text-center text-md italic text-gray-500 mb-8" data-aos="zoom-in">
            "Klik setiap logo untuk mengetahui peran dan informasi instansi terkait."
        </span>
        <div class="flex items-center gap-12 justify-between mx-20">
            @php
                $logos = [
                    ['src' => 'puprlogo.png', 'alt' => 'Logo PUPR', 'url' => 'https://pu.go.id/'],       
                    ['src' => 'kanlogo.png', 'alt' => 'Logo KAN', 'url' => 'https://kan.or.id/'],
                    ['src' => 'psatlogo.png', 'alt' => 'Logo PSAT', 'url' => 'https://lsbupsat.id/'],
                ];
            @endphp
            @foreach ($logos as $logo)
                <a href="{{ $logo['url'] }}" target="_blank" rel="noopener noreferrer"
                   class="flex items-center justify-center">
                    {{-- <img src="{{ asset($logo['src']) }}" alt="{{ $logo['alt'] }}" class="h-20 md:h-24 object-contain transition duration-300 hover:scale-105" /> --}}
                    <img src="{{ asset($logo['src']) }}" alt="{{ $logo['alt'] }}" class="h-16 sm:h-20 md:h-24 object-contain transition duration-300 hover:scale-105" />
                </a>
            @endforeach
        </div>
    </div>
    
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">HUBUNGI KAMI</h2>
            <span class="block text-center text-md italic text-gray-500 mb-8">
                Silakan hubungi kami melalui form di dibawah atau melalui kontak di bawah ini:
            </span>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 flex flex-col md:flex-row md:space-x-6">

            <!-- Kontak Informasi -->
            <div class="w-full md:basis-1/3 md:flex-none bg-[#a9a7a6] rounded-lg p-5 space-y-4 order-2 md:order-none mt-6 md:mt-0"
            style="background-image: url('gabpeknaslogo.png');
                    background-repeat: no-repeat;
                    background-position: bottom right;
                    background-size: 100px;
                    background-blend-mode: overlay;">
                <h2 class="text-2xl text-white">Kontak Informasi</h2>
                <p class="text-sm text-white mt-4">Silahkan kirim pesan apabila ada kritik, saran ataupun pertanyaan.</p>
                <ul class="mt-8 space-y-8">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='#fff'
                            viewBox="0 0 479.058 479.058">
                            <path
                                d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                                data-original="#000000" />
                        </svg>
                        <a href="javascript:void(0)" class=" text-sm text-white ml-4">
                            gabpeknasdpp@gmail.com
                        </a>
                    </li>
                    <li class="flex">
                        <div class="mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='#fff' viewBox="0 0 368.16 368.16">
                                <path d="M184.08 0c-74.992 0-136 61.008-136 136 0 24.688 11.072 51.24 11.536 52.36 3.576 8.488 10.632 21.672 15.72 29.4l93.248 141.288c3.816 5.792 9.464 9.112 15.496 9.112s11.68-3.32 15.496-9.104l93.256-141.296c5.096-7.728 12.144-20.912 15.72-29.4.464-1.112 11.528-27.664 11.528-52.36 0-74.992-61.008-136-136-136zM293.8 182.152c-3.192 7.608-9.76 19.872-14.328 26.8l-93.256 141.296c-1.84 2.792-2.424 2.792-4.264 0L88.696 208.952c-4.568-6.928-11.136-19.2-14.328-26.808-.136-.328-10.288-24.768-10.288-46.144 0-66.168 53.832-120 120-120s120 53.832 120 120c0 21.408-10.176 45.912-10.28 46.152z" data-original="#000000"></path>
                                <path d="M184.08 64.008c-39.704 0-72 32.304-72 72s32.296 72 72 72 72-32.304 72-72-32.296-72-72-72zm0 128c-30.872 0-56-25.12-56-56s25.128-56 56-56 56 25.12 56 56-25.128 56-56 56z" data-original="#000000"></path>
                            </svg>
                        </div>
                        <a href="javascript:void(0)" class="text-sm text-white ml-4">
                            Jl. Cipinang Kebembem I No.2A, RT.6/RW.7, Kel. Cipinang, Kec. Pulo Gadung, Kota Jakarta Timur, DKI Jakarta 13240
                        </a>
                    </li>
                    <li class="flex">
                        <div class="mt-1">
                            <svg fill="#fff" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="40"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <circle cx="256.001" cy="424.201" r="6.905"></circle> <circle cx="87.8" cy="256.001" r="6.906"></circle> <circle cx="137.065" cy="137.064" r="6.906"></circle> <path d="M256,49.043c-114.116,0-206.957,92.84-206.957,206.957S141.884,462.957,256,462.957S462.957,370.116,462.957,256 S370.116,49.043,256,49.043z M256,446.609c-105.102,0-190.609-85.507-190.609-190.609S150.898,65.391,256,65.391 S446.609,150.898,446.609,256S361.102,446.609,256,446.609z"></path> <circle cx="256" cy="87.799" r="6.906"></circle> <circle cx="137.065" cy="374.937" r="6.906"></circle> <path d="M370.053,370.052c-2.698,2.697-2.698,7.07-0.001,9.767c2.7,2.695,7.069,2.696,9.766,0c2.7-2.695,2.697-7.069,0.001-9.765 C377.124,367.356,372.752,367.355,370.053,370.052z"></path> <path d="M424.201,249.095c-3.813-0.001-6.906,3.089-6.906,6.904c0,3.816,3.091,6.907,6.905,6.907 c3.814-0.003,6.905-3.092,6.905-6.906C431.109,252.187,428.015,249.095,424.201,249.095z"></path> <path d="M379.819,141.949c2.694-2.7,2.696-7.069-0.001-9.766c-2.695-2.7-7.069-2.697-9.765-0.001 c-2.698,2.695-2.7,7.068-0.001,9.766C372.749,144.645,377.122,144.646,379.819,141.949z"></path> <path d="M327.93,231.478h-61.777l-80.037-80.037c-4.632-4.632-10.79-7.182-17.341-7.182c-6.55,0-12.708,2.551-17.338,7.182 c-9.561,9.561-9.561,25.118,0,34.678l87.218,87.219c4.631,4.632,10.79,7.182,17.34,7.182h71.934 c13.522,0,24.522-11,24.522-24.522C352.452,242.478,341.452,231.478,327.93,231.478z M261.775,261.779 c-1.543,1.543-3.595,2.393-5.779,2.393c-2.183,0-4.235-0.85-5.78-2.394l-87.218-87.219c-3.187-3.187-3.187-8.372,0-11.56 c1.543-1.543,3.595-2.393,5.778-2.393c2.184,0,4.237,0.85,5.781,2.394l87.218,87.219c1.544,1.544,2.394,3.596,2.394,5.779 C264.171,258.183,263.319,260.235,261.775,261.779z M327.93,264.174h-48.832c0.915-2.594,1.42-5.342,1.42-8.174 c0-2.831-0.503-5.58-1.42-8.174h48.832c4.508,0,8.174,3.666,8.174,8.174S332.438,264.174,327.93,264.174z"></path> <path d="M437.019,74.981C388.667,26.628,324.381,0,256,0S123.332,26.628,74.981,74.981C26.629,123.333,0,187.619,0,256 s26.628,132.668,74.981,181.019C123.333,485.371,187.62,512,256,512s132.667-26.628,181.019-74.981 C485.372,388.667,512,324.38,512,256S485.372,123.333,437.019,74.981z M425.46,425.46 c-45.265,45.264-105.447,70.192-169.46,70.192S131.805,470.724,86.54,425.46C41.276,380.195,16.348,320.014,16.348,256 S41.276,131.805,86.54,86.54C131.805,41.276,191.986,16.348,256,16.348S380.195,41.276,425.46,86.54 c45.264,45.265,70.192,105.447,70.192,169.46S470.724,380.195,425.46,425.46z"></path> </g> </g> </g> </g></svg>
                        </div>
                        <a href="javascript:void(0)" class="text-sm text-white ml-4">
                            Waktu Operasional<br>
                            Senin - Jumat, 09.00 - 16.00 WIB
                        </a>
                    </li>
                    <li class="flex">
                        <div class="mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="#fff" viewBox="0 0 512 512">
                                <path d="M391.1 351.1c-21.5 0-42.6-3.3-62.7-9.6 -10.7-3.4-22.5-.3-30.6 7.8l-43.4 32.8c-54.1-27.4-98.6-72-126-126l32.8-43.4c8.1-8.1 11.2-19.9 7.8-30.6 -6.3-20.1-9.6-41.2-9.6-62.7 0-16.5-13.5-30-30-30H90.9c-16.5 0-30 13.5-30 30 0 198.2 160.9 359.1 359.1 359.1 16.5 0 30-13.5 30-30v-57.4C421.1 365.6 407.6 351.1 391.1 351.1z"/>
                            </svg>
                        </div>
                        <a href="tel:+62214894418" class="text-sm text-white ml-4">
                            +62 (021) 4894418
                        </a>
                    </li>
                </ul>
            </div>
    
            <!-- Form Inputan -->
            @include('public.form-kontak')
        </div>
    </div>
    <main class="bg-white/10">
        <div class="mx-auto w-full max-w-7xl px-5 py-8 md:px-10 md:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">KANTOR PUSAT</h2>
                <span class="block text-center text-md italic text-gray-500 mb-8">
                    Alamat lengkap kantor pusat kami untuk keperluan administrasi dan pelayanan utama.
                </span>
            </div>            
            <div class="relative w-full h-96">
                <iframe class="absolute top-0 left-0 w-full h-full p-4"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.396668780214!2d106.88226547523857!3d-6.211300093776603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5b2cd82b5eb%3A0x61a9f281c4689c7e!2sDPP%20GABPEKNAS%20(%20Gabungan%20Perusahaan%20Kontraktor%20Nasional%20)!5e0!3m2!1sid!2sid!4v1720758142544!5m2!1sid!2sid"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
        </div>
    </main>
    <x-footer />
    <script>
        document.getElementById('no_telp').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        const toggles = document.querySelectorAll('.accordion-toggle');
    
        toggles.forEach((toggle) => {
            toggle.addEventListener('click', function () {
            const content = this.nextElementSibling;
            const icon = this.querySelector('svg');
          
            // Tutup semua selain yang diklik
            document.querySelectorAll('.accordion-content').forEach((el) => {
            if (el !== content) {
            el.style.maxHeight = null;
            el.previousElementSibling.querySelector('svg').style.transform = 'rotate(0deg)';
            }
        });
          
        // Toggle konten aktif
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.style.transform = 'rotate(0deg)';
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.style.transform = 'rotate(180deg)';
            }
        });
        });

        function loadBeritaDetail(event, url) {
            event.preventDefault();

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.text())
            .then(html => {
                const container = document.getElementById('berita-container');
                if (container) {
                    container.innerHTML = html;
                    history.pushState(null, '', url);
                    window.scrollTo({ top: container.offsetTop - 60, behavior: 'smooth' });
                }
            });
        }

        function closeBeritaDetail() {
            location.href = "{{ url()->current() }}#section-berita";
        }

        // Tambahkan handler popstate untuk back button (opsional)
        window.addEventListener('popstate', () => {
            location.reload(); // fallback reload home
        });
    </script>
</x-layouts.public>