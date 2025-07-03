@props(['sliders'])

<div id="default-carousel" class="relative h-full py-10 bg-black/20 overflow-hidden" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative sm:h-56 md:h-96 h-48">
        @foreach ($sliders as $index => $slider)
            <div class="duration-700 ease-in-out w-full h-full flex items-center justify-center"
                data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                <div class="w-full max-w-screen-lg px-6 xl:px-12 mx-auto h-full">
                    <img src="{{ asset($slider->image) }}"
                        class="w-full h-full object-contain rounded-lg"
                        alt="{{ $slider->title ?? 'Slider' }}">
                </div>
            </div>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button"
        class="absolute top-1/2 left-0 -translate-y-1/2 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
        </span>
    </button>

    <button type="button"
        class="absolute top-1/2 right-0 -translate-y-1/2 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
        </span>
    </button>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
        @foreach ($sliders as $index => $slider)
            <button type="button" class="w-3 h-3 rounded-full bg-white/70"
                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>
</div>
