<x-app-layout>
@if (Auth()->user()->hasRole('super-admin'))


    <x-slot name="header">
        @section('svg')
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M10.83 5a3.001 3.001 0 0 0-5.66 0H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17ZM4 11h9.17a3.001 3.001 0 0 1 5.66 0H20a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H4a1 1 0 1 1 0-2Zm1.17 6H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17a3.001 3.001 0 0 0-5.66 0Z" />
            </svg>
        @endsection
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Paramétrer') }}
        </h2>
    </x-slot>



    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
            data-tabs-toggle="#default-styled-tab-content"
            data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
            data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
            role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                    data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">
                    Gestion D'accées</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false">
                    Gestions Utlisateur</button>
            </li>

            <li role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
                    aria-controls="contacts" aria-selected="false">Contacts</button>
            </li>
        </ul>
    </div>
    <div id="default-styled-tab-content">

        <div class="hidden p-4 rounded-lg bg-[#eaeaebf3] dark:bg-[#0F172A]" id="styled-profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex justify-end mt-4 mb-4 text-white">
                    <button type="submit" class="p-2 text-white bg-[#ff7322] hover:bg-[#ff7920] focus:bg-[#ff7910] disabled:opacity-50 rounded-md" data-modal-target="authentication-modal"

                        data-modal-toggle="authentication-modal">Créer un rôle
                    </button>
                </div>
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-[#eaeaebf3] dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-slate-700">
                                N°
                            </th>
                            <th scope="col" class="px-6 py-3 bg-slate-700">
                                Nom d'utilisateur
                            </th>
                            <th scope="col" class="px-6 py-3 bg-slate-700">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $item)
                            <tr
                                class="border-b odd:bg-[#eaeaebf3] odd:dark:bg-[#0F172A] even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $i + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('user_role.show', $item->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">

                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" {{-- d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /> --}}
                                                d="M11 5V11H5V13H11V19H13V13H19V11H13V5H11M19 15C17.95 15 16.9 15.8 16.9 16.82V18.64C16.45 18.64 16 19.07 16 19.5V22.05C16 22.56 16.45 23 16.9 23H21.03C21.55 23 22 22.56 22 22.13V19.58C22 19.07 21.55 18.64 21.1 18.64H17.88V16.82C17.88 16.24 18.4 15.87 19 15.87S20.13 16.24 20.13 16.82V17.18H21.1V16.82C21.1 15.8 20.05 15 19 15Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-[#eaeaebf3] dark:bg-[#0F172A]" id="styled-dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-transparent shadow-xl dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 bg-transparent border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <div class="text-gray-800 bg-transparent dark:text-gray-200">
                                <div class="flex flex-col bg-transparent md:flex-row">
                                    <div class="p-6 lg:w-3/5 xl:w-1/2 sm:p-12">
                                        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200">S'enregistrer</h1>
                                        <div class="flex flex-col items-center mt-12">
                                            <div class="flex-1 w-full mt-8">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf

                                                    <!-- Name -->
                                                    <div>
                                                        <x-input-label for="name"
                                                            class="text-gray-800 dark:text-gray-200"
                                                            :value="__('Nom d\'utilisateur')" />
                                                        <x-text-input id="name" class="block w-full mt-1"
                                                            type="text" name="name" :value="old('name')" required
                                                            autofocus autocomplete="name" />
                                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                    </div>

                                                    <!-- Email Address -->
                                                    <div class="mt-4">
                                                        <x-input-label for="email"
                                                            class="text-gray-800 dark:text-gray-200"
                                                            :value="__('Email')" />
                                                        <x-text-input id="email" class="block w-full mt-1"
                                                            type="email" name="email" :value="old('email')" required
                                                            autocomplete="username" />
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>


                                                    <!-- Password -->
                                                    <div class="mt-4">
                                                        <x-input-label for="password"
                                                            class="text-gray-800 dark:text-gray-200"
                                                            :value="__('Mot de passe')" />

                                                        <x-text-input id="password" class="block w-full mt-1"
                                                            type="password" name="password" required
                                                            autocomplete="new-password" />

                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>

                                                    <!-- Confirm Password -->
                                                    <div class="mt-4">
                                                        <x-input-label for="password_confirmation"
                                                            class="text-gray-800 dark:text-gray-200"
                                                            :value="__('Confirmez votre mot de passe')" />

                                                        <x-text-input id="password_confirmation"
                                                            class="block w-full mt-1" type="password"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password" />

                                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                    </div>

                                                    <div class="flex items-center justify-end mt-4">


                                                        <x-primary-button class="ms-4">
                                                            {{ __('Enregistrer') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                     class="flex-1 bg-center bg-cover" style="background-image: url('/img/logo.jpg');">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts" role="tabpanel"
            aria-labelledby="contacts-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400"> les informations des developpeurs qui concut   l'apllication. Vous pouvez
                nous joindre au numéro suivant e cas de panne ou de bug.</p>
                <strong class="font-medium text-gray-800 dark:text-white">Carlo Musongela : +33 1 23 45 67 89 </strong>.</p>
                <p class="font-medium text-gray-800 dark:text-white">Idriss elba :+33 1 23 45 67 89</p>
                <p class="font-medium text-gray-800 dark:text-white">Manasse Thims :+33 1 23 45 67 89</p>
                <p class="font-medium text-gray-800 dark:text-white">Francine Magbia :+33 1 23 45 67 89</p>
                <p class="font-medium text-gray-800 dark:text-white">Vincent thips :+33 1 23 45 67 89</p>
                <p class="font-medium text-gray-800 dark:text-white">Junior Walker :+33 1 23 45 67 89</p>

        </div>
    </div>

    @section('modal')
    <x-roleCreate />
    @endsection
@endif
</x-app-layout>
