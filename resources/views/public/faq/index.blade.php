<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'FAQ']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Frequently Asked Questions (FAQ)</h2>
            <div class="flex flex-col p-8 rounded-xl space-y-10">
                <div class="text-center">
                    <p class="text-gray-500 mt-2 italic text-sm">Ada beberapa pertanyaan dan mungkin yang anda cari ada disini.</p>
                </div>

                <div class="grid grid-cols-1 gap-10 items-start">

                    <div class="w-full max-w-3xl mx-auto space-y-4" id="faq-accordion">
                        @forelse($faqs as $faq)
                            <div class="accordion-item border border-gray-200 rounded-lg bg-white overflow-hidden transition-all">
                                <button type="button" class="accordion-toggle w-full px-4 py-3 flex items-center gap-x-4 text-left text-base font-semibold text-gray-800">
                                    <div class="w-8 h-8 flex items-center justify-center rounded bg-red-600 text-white">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                    <span class="flex-1">{{ $faq->question }}</span>
                                </button>
                    
                                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500 text-gray-600 pl-[3.5rem] pr-4">
                                    <p class="py-3 text-justify">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm text-center">Belum ada data FAQ yang tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggles = document.querySelectorAll(".accordion-toggle");
    
            toggles.forEach(toggle => {
                toggle.addEventListener("click", () => {
                    const content = toggle.nextElementSibling;
                    const svgIcon = toggle.querySelector("svg");
                    const isExpanded = content.style.maxHeight;
    
                    // Tutup semua accordion lain
                    document.querySelectorAll(".accordion-content").forEach(el => {
                        el.style.maxHeight = null;
                    });
                    document.querySelectorAll(".accordion-toggle svg").forEach(svg => {
                        svg.classList.remove("rotate-180");
                    });
    
                    // Toggle aktif hanya untuk yang dipilih
                    if (!isExpanded || isExpanded === "0px") {
                        content.style.maxHeight = content.scrollHeight + "px";
                        svgIcon.classList.add("rotate-180");
                    }
                });
            });
        });
    </script>
    <x-footer></x-footer>
</x-layouts.public>
