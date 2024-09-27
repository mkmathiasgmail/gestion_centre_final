<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        generate
    </title>
    <link rel="shortcut icon" href="{{ asset('img/orange.webp') }}" type="image/x-icon">
    @vite(['resources/css/app.css'])

</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full p-5">
        <a href="#" class="flex space-x-2">
            <img src="{{ asset('img/orange.png') }}" class="h-8" alt="LogoOrange Digital Center" />
            <span class="self-center text-1xl font-semibold whitespace-nowrap dark:text-white">Orange Digital
                Center</span>
        </a>
    </nav>
    <h1 class=" mt-20 text-center text-black text-5xl font-extrabold dark:text-black">Bienvenu(e) à Orange
        Digital Center</h1>
    <div
        class="container w-full md:max-w-2xl px-2 mt-10 max-w-sm mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700">
        @if (session('error'))
            <div id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Alert</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
            </div>
        @endif
       
            <h1 class=" mb-6 text-lg text-center text-black dark:text-white  "> {{ $candidat->activite->title}}</h1>


            <form class="max-w-sm mx-auto" action="{{ route('storeqrcode', ['id' => $id]) }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="first_name"
                        class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
                    <input type="text" id="first_name" value="{{ $candidat->odcuser->first_name }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="name@flowbite.com" required disabled />
                </div>
                <div class="mb-5">
                    <label for="last_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                    <input type="text" id="last_name" value="{{ $candidat->odcuser->last_name }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required disabled />
                </div>

                <button type="submit"
                    class=" w-full text-white bg-odcolor hover:bg-odcolor/75 focus:ring-4
                             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2
                              dark:bg-odcolor dark:hover:bg-odcolor/75 focus:outline-none
                               dark:focus:ring-blue-900">Valider</button>
            </form>
    </div>
    <div>

    </div>
</body>

</html>
