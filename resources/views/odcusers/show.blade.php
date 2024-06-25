<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="w-1/2">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight text-left">
                    {{ __('Informations du compte de l\'utilisateur : ' . $odcuser->firstName . ' ' . $odcuser->lastName) }}
                </h2>
            </div>
            <div class="w-1/3">
                <form class="max-w-lg mx-auto">
                    <div class="flex w-full">
                        <label for="search-dropdown"
                            class="mb-2 text-base font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                        </h2>
                    </div>
            </div>
    </x-slot>

    <div class="py-6 relative overflow-x-auto">
        <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-4">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-base p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="{{ route('odcusers.edit', $odcuser->id) }}"
                                class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                Data</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-base text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $odcuser->picture }}"
                    alt="Profile Picture" />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                    {{ '' . $odcuser->firstName . ' ' . $odcuser->lastName }} </h5>
                <span class="text-base text-gray-500 dark:text-gray-400">
                    @php
                        $profession = json_decode($odcuser->profession);
                    @endphp
                    {{ $profession->translations->fr->profession }}
                </span>
            </div>
            <div>
                <div class="flex gap-9 justify-center">
                    <div class="justify-center items-center gap-8 py-6">
                        <div class="flex mb-3 gap-3 items-center">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Firstname :
                            </label>

                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                {{ $odcuser->firstName }}</p>
                        </div>
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Lastname :</label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                {{ $odcuser->lastName }}</p>

                        </div>
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Email :</label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                @foreach ($datas as $item)
                                    {{ (isset($item['E-mail'])) ? ($item['E-mail']) : ($odcuser->email) }}
                                @endforeach
                            </p>

                        </div>
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Gender :</label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                {{ $odcuser->gender }}</p>

                        </div>

                    </div>
                    <div class="justify-center items-center gap-8 py-6">
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Birthdate :
                            </label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                {{ $odcuser->birthDay }}</p>

                        </div>
                        
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Phone number :
                            </label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                @foreach ($datas as $data)
                                    {{ (isset($data['Téléphone'])) ? ($data['Téléphone']) : "Not defined" }}
                                @endforeach
                            </p>

                        </div>
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Profession
                                :</label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                @php
                                    $profession = json_decode($odcuser->profession);
                                @endphp
                                {{ $profession->translations->fr->profession }}
                            </p>
                        </div>
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Nombre de participations
                                :</label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                {{ $nbrEvents }}
                            </p>
                        </div>
                    </div>
                    <div class="justify-center items-center gap-8 py-6 mb-9">
                        <div class="flex items-center mb-3 gap-3">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">University
                                :</label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                @foreach ($datas as $data)
                                    {{ (isset($data["Nom de l'Etablissement / Université"])) ? ($data["Nom de l'Etablissement / Université"]) : "Not stored"  }}
                                @endforeach
                            </p>
                        </div>
                        <div class="items-center mb-3 gap-3 flex-col">
                            <label for="website-admin"
                                class="block mb-2 text-base font-black text-gray-900 dark:text-white">Liste des formations suivies
                                :</label>
                            <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                @foreach ($candidats as $candidat)
                                    <li class="mb-2 text-base font-medium text-gray-900 dark:text-white"">{{ (isset($candidat->activite_id)) ? ($candidat->activite->title) : "Not stored"  }}</li>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
