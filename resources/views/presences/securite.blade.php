<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('img/orange.png') }}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-1xl font-semibold whitespace-nowrap dark:text-white">Orange Digital
                    Center</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
            </div>
        </div>
    </nav>
    <div class=" p-5">
        <h1
            class ="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl dark:text-white">
            security page</h1>
    </div>
    <div class="p-4 mb-4 text-gray-800 border border-gray-300 rounded-lg  dark:bg-orange-40 dark:border-gray-700 "
        role="alert">

        <button class="w-full dark:bg-gray-800 dark:text-orange-400 p-11 mb-6 text-white ">
             <a href="{{ route('activitencours') }}" > Voir les activites encours</a>
            
        </button>
        <button class="w-full dark:bg-gray-800 dark:text-orange-400 p-11 mb-6 text-white"> 
            <a href="{{ route('scanner') }}">Scanner le qrcode </a> 
           
        </button>
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="w-full dark:bg-gray-800 dark:text-orange-400 p-11 text-white">
            Créer un compte
        </button>
        
    </div>
    <x-userlocal-component />

</body>

</html>
