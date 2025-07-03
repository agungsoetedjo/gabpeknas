<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-css/>
    <x-head.tinymce-config/>
</head>


<body style="overflow-x: hidden;
--tw-bg-opacity: 1;
background-color: rgb(250 250 250 / var(--tw-bg-opacity));
background-image: url('/images/body-bg.svg');
background-size: cover;
background-repeat: repeat;
font-family: 'Outfit', sans-serif;
font-weight: 400;
line-height: 1.625;
--tw-text-opacity: 1;
color: rgb(136 136 136 / var(--tw-text-opacity));">

    <div class="min-h-full">
        <x-nav-bar></x-nav-bar>
        {{ $slot }}
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true,
            autoplayVideos: false,
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new PureCounter();
        });
    </script>
</body>

</html>
