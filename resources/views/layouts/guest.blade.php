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
</head>

<body class="font-sans text-gray-900 antialiased ">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url('https://www.orangedigitalcenters.com:12345/api/v1/odcGlobal/ComingSoon%E2%80%9311652362999309.jpg')]">
        <div class="backdrop-blur-md w-full min-h-screen flex flex-col  items-center pt-6 sm:justify-center">
            <div>
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="w-50 h-50 fill-current text-gray-500" />
                </a>
            </div>

            <div
                class="w-full sm:max-w-md mt-6 p-8 py-8 bg-[#18181821] shadow-md overflow-hidden sm:rounded-lg ">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
