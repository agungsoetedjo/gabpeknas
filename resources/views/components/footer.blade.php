<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl px-4 py-6 lg:py-8">
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-6">
            {{-- Logo + Teks --}}
            <div class="flex items-start gap-4 w-full md:w-1/2">
                <img src="{{ asset('images/gabpeknas-ori.png') }}" alt="Gabpeknas Logo" class="h-24 md:h-28 object-contain" />
                <div class="flex flex-col justify-start text-left">
                    <p class="text-lg md:text-base font-semibold leading-tight dark:text-white">
                        GABUNGAN<br>
                        PERUSAHAAN<br>
                        KONTRAKTOR<br>
                        NASIONAL
                    </p>
                </div>
            </div>

            {{-- Link Sosial Media --}}
            <div class="flex flex-col justify-start">
                <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-2">
                        <a href="https://www.facebook.com/dpp.gabpeknas" target="_blank" class="hover:underline">Facebook</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/dpp.gabpeknas" target="_blank" class="hover:underline">Instagram</a>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

        <div class="sm:flex sm:items-center sm:justify-between text-center sm:text-left">
            <span class="text-sm text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} <a href="https://gabpeknas.or.id/" class="hover:underline">Gabpeknas</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
<button id="scrollToTopBtn"
    class="fixed bottom-6 right-6 z-50 hidden w-12 h-12 bg-green-600/20 border border-green-600 text-green-700 rounded-md shadow-lg hover:bg-green-600 hover:text-white transition duration-300">
    ↑
</button>