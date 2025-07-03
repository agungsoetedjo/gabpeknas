<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Legalitas']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Legalitas</h2>
            <div class="flex flex-col rounded-xl space-y-6 p-4 md:p-6">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @for ($i = 1; $i <= 6; $i++)
                            <div>
                                <a href="{{ asset("legalitas/portrait{$i}.jpg") }}" class="glightbox block">
                                    <img src="{{ asset("legalitas/portrait{$i}.jpg") }}"
                                        class="h-auto max-w-full rounded-lg"
                                        alt="Legalitas Portrait {{ $i }}">
                                </a>
                            </div>
                        @endfor
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @for ($i = 1; $i <= 2; $i++)
                            <div>
                                <a href="{{ asset("legalitas/landscape{$i}.jpg") }}" class="glightbox block">
                                    <img src="{{ asset("legalitas/landscape{$i}.jpg") }}"
                                        class="h-auto max-w-full rounded-lg"
                                        alt="Legalitas Landscape {{ $i }}">
                                </a>
                            </div>
                        @endfor
                    </div>
            </div>
        </div>
    </section>
<x-footer />
</x-layouts.public>