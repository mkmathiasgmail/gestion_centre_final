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
            class ="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Lists Of Ongoing Activities</h1>
    </div>
    <div class=" p-5">
        @if ($activites->isEmpty())
            <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">Oups desole!</span> Change a few things up and try submitting again.
            </div>
        @else
            @foreach ($activites as $i => $item)
                <div id="alert-additional-content-1"
                    class="p-4 mb-4 text-gray-800 border border-gray-300 rounded-lg bg-orange-50 dark:bg-gray-800 dark:text-orange-400 dark:border-gray-700"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">{{ $item->title }}</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                    </div>
                    <div class="flex">
                        <a href="{{ route('presences.create', $item->id) }}"
                            class="py-2.5 px-5 flex items-center me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 14">
                                <path
                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                            View more
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
