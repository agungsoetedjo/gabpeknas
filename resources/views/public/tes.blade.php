<!DOCTYPE html>
<html lang="en">
<head>
    ...
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- Flowbite Pro Manual -->
    <link href="{{ asset('flowbite-assets/css/flowbite.min.css') }}" rel="stylesheet">
</head>
<body>
    @yield('content')

    @vite('resources/js/app.js')

    <!-- Flowbite Pro JS -->
    <script src="{{ asset('flowbite-assets/js/flowbite.min.js') }}"></script>
</body>
</html>
