<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Struktur Organisasi']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Struktur Organisasi</h2>
            <div class="flex flex-col p-8 rounded-xl space-y-10">
                <div class="space-y-10">
                    <div class="flex justify-center">
                        <div class="w-full max-w-7xl bg-white/20 dark:bg-gray-700 rounded-xl shadow p-4">
                            <div class="overflow-hidden rounded-md">
                                <a href="{{ asset('images/struktur_noname.jpg') }}" 
                                    class="glightbox" 
                                    data-gallery="struktur-id">
                                <img src="{{ asset('images/struktur_noname.jpg') }}" class="w-full h-auto object-contain opacity-90" alt="Struktur Organisasi Gabpeknas" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-layouts.public>