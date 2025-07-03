<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-css/>
    <x-head.tinymce-config/>
</head>


<body style="overflow-x: hidden;
--tw-bg-opacity: 1;
background-color: rgb(250 250 250 / var(--tw-bg-opacity));
background-image: url('/images/scattered-forcefields.svg');
background-size: cover;
background-repeat: repeat;
font-family: Poppins, sans-serif;
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
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>