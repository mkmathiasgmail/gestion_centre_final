<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/select2/dist/js/select2.full.min.js', 'node_modules/select2/dist/css/select2.min.css'])
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full p-5">
        <a href="#" class="flex space-x-2">
            <img src="{{ asset('img/orange.png') }}" class="h-8" alt="LogoOrange Digital Center" />
            <span class="self-center text-1xl font-semibold whitespace-nowrap dark:text-white">Orange Digital
                Center</span>
        </a>
    </nav>

    @if (Session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">

                <span class="font-medium">{{ $error }}</span>

            </div>
        @endforeach
    @endif

    <p class="mt-3 p-8 text-gray-500 dark:text-gray-400">Merci d'avoir pointé votre présence !
        <strong class="font-semibold text-gray-900 dark:text-white">
            Nous apprécions votre engagement et votre
            participation.
        </strong>
    </p>


</body>
