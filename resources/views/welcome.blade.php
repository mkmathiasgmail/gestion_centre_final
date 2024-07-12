<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Centre</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/select2/dist/js/select2.full.min.js', 'node_modules/select2/dist/css/select2.min.css'])


</head>

<body
    class="bg-[url('https://www.orangedigitalcenters.com:12345/api/v1/odcGlobal/ComingSoon%E2%80%9311652362999309.jpg')]">


    <section class="font-sans antialiased b bg-no-repeat  backdrop-blur-lg">
        <div class="px-4  backdrop-opacity-100 mx-auto max-w-screen-xl text-center py-24 lg:py-56 ">
            <div class=" flex justify-center">
                <img class="h-auto max-w-lg rounded-lg"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtezznU_jVR9aLxxoGiGKPIuHKZhfGGuuqhg&s"
                    alt="image description">

            </div>

            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Orange Digital Center, delivering digital training to all</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Orange Digital Center houses
                four strategic programs under the same roof : the coding school, the FabLab Solidaire, Orange Fab and
                Orange Digital Ventures Africa. This network of free and inclusive resources support local start-ups and
                projects using digital technology and they are being rolled out across Middle East and Africa.

            </p>
            @if (Route::has('login'))
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">

                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                            Dashboard


                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </section>

</body>

</html>
