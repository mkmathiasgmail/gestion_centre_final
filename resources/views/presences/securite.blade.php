<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>page de la securité</title>
    <!-- Fonts -->
   <link rel="shortcut icon" href="{{ asset('img/orange.webp') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full p-5">
        <a href="#" class="flex space-x-2">
            <img src="{{ asset('img/orange.png') }}" class="h-8" alt="LogoOrange Digital Center" />
            <span class="self-center text-1xl font-semibold whitespace-nowrap dark:text-white">Orange Digital
                Center</span>
        </a>
    </nav>
    <div class="mt-14 p-5">
        <h1 class ="mb-4 text-4xl text-center font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl dark:text-white">
            Bienvenue à la page d'accueil</h1>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">

                <span class="font-medium">{{ $error }}</span>

            </div>
        @endforeach
    @endif

    <div
        class="container w-full md:max-w-2xl px-2 max-w-sm mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
            Choisisissez une action à effectuer :
        </h5>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Vous avez le choix entre voir la liste des
            activités en cours, scanner le code QR pour un candidat ou même
            en créer un.</p>
        <ul class="my-4 space-y-3">
            <li>
                <a href="{{ route('activitencours') }}"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg hover:text-orange-400 bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">
                        Voir les activités en cours
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('scanner') }}"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg hover:text-orange-400 bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M4 4h6v6H4V4Zm10 10h6v6h-6v-6Zm0-10h6v6h-6V4Zm-4 10h.01v.01H10V14Zm0 4h.01v.01H10V18Zm-3 2h.01v.01H7V20Zm0-4h.01v.01H7V16Zm-3 2h.01v.01H4V18Zm0-4h.01v.01H4V14Z" />
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01v.01H7V7Zm10 10h.01v.01H17V17Z" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Scanner le code QR</span>
                </a>
            </li>
            <li>
                <a href="#" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg hover:text-orange-400 bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Créer un compte pour un candidat</span>
                </a>
            </li>
        </ul>
        <div>
            <a href="#"
                class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Date du jour : {{ date('d/m/Y') }}
            </a>
        </div>
        <div>
            <a href="#"
                class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Heure actuelle : {{ date('H:i:s') }}
            </a>
        </div>
    </div>


    <x-userlocal-component :activites="$activites" />

</body>

</html>
