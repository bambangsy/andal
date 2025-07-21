<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = [
                '/img/andifa1.jpg',
                '/img/andifa2.jpg',
                '/img/andifa6.jpg'
            ];
            let currentIndex = 0;
            const changeImage = () => {
                document.body.style.backgroundImage = `url('${images[currentIndex]}')`;
                currentIndex = (currentIndex + 1) % images.length;
            };
            setInterval(changeImage, 3000); // Ganti gambar setiap 5 detik
        });
    </script>
</head>
<body class="font-sans text-gray-900 antialiased" style="background-image: url('/img/andifa2.jpg'); background-size: cover; background-position: center; transition: background-image 1s ease-in-out;">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white shadow-lg overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>