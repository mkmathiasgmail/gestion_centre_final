<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestion Centre</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 ">
    <div
        class=" sm:justify-center items-center pt-6 sm:pt-0 bg-[url('https://static.vecteezy.com/ti/vecteur-libre/p1/5091603-gestion-financiere-vector-illustration-consulter-un-comptable-homme-d-affaires-calculer-le-budget-personnel-ou-d-entreprise-gerer-le-revenu-financier-vectoriel.jpg')]">
        <div
            class="backdrop-blur-md w-full min-h-screen flex flex-col bg-[#00000073] items-center pt-6 sm:justify-center">
            <div class="flex justify-center flex-1 w-4/5 m-0 bg-transparent shadow-xl sm:m-10 sm:rounded-lg">
                <div class="p-6 lg:w-3/5 xl:w-1/2 sm:p-12">
                    <div>
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-mx-auto">
                            <x-application-logo class="text-gray-500 fill-current w-50 h-50" />
                        </a>
                    </div>
                    <div class="flex flex-col items-center mt-12">
                        <div class="flex-1 w-full mt-8">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
                <div
                     class="flex-1 bg-center bg-cover" style="background-image: url('/img/logo.jpg');">
                </div>
            </div>
        </div>
    </div>

    <div id="map">

    </div>
    @yield('script')

</body>

</html>
