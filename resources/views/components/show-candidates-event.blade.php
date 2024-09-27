@props(['labels', 'candidatsData', 'url', 'id', 'activite_Id', 'odcusers', 'activite'])

<div id="alert-success"
    class="hidden items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
    role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium" id="div-success">
        <p></p>
    </div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-success" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
<div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel"
    aria-labelledby="dashboard-tab">

    <a href="#" onclick="Reload()"
        class="self-center py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">Actualiser</a>
    <a href="{{route('parcours',$activite)}}"
        class="self-center py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">Verification</a>
    <div class="py-6 relative overflow-x-auto">
        @if ($candidatsData)
            <table id="candidatTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Prénom
                        </th>
                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Nom
                        </th>
                        @foreach (array_unique($labels) as $label)
                            @if (isset($label))
                                @if (in_array($label, [
                                        'Civilié',
                                        'Civilité',
                                        'Email',
                                        'E-mail',
                                        'E-mail(obligatoire)',
                                        'Adresse Email',
                                        'Téléphone',
                                        'Numéro de téléphone',
                                        'Numéro de l\'encadreur',
                                        'Tranche d\'âge',
                                        'Adresse',
                                        'Adresse de domicile',
                                        'Adresse de domicile (n°, avenue, Quartier, Commune)',
                                        'Profession',
                                        'Spécialité ou domaine (étude ou profession)',
                                        'Spécialité ou domaine',
                                        'Niveau d\'étude',
                                        'Niveau ou année d\'étude',
                                        'Nom de l\'Etablissement / Université',
                                        'Université',
                                        'Université/Etablissement ou Structure',
                                    ]))
                                    <th scope="col"
                                        class="display-label px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $label }}
                                    </th>
                                @elseif ($label !== 'Cv de votre parcours (Obligatoire)')
                                    <th scope="col"
                                        class="label px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $label }}
                                    </th>
                                @endif
                            @endif
                        @endforeach
                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidatsData as $candidat)
                        <tr>
                            <td class="px-6 py-3">{{ $candidat['odcuser']['first_name'] }}</td>
                            <td class="px-6 py-3">{{ $candidat['odcuser']['last_name'] }}</td>

                            @foreach (array_unique($labels) as $label)
                                @if (isset($label))
                                    @if (in_array($label, [
                                            'Civilié',
                                            'Civilité',
                                            'Email',
                                            'E-mail',
                                            'E-mail(obligatoire)',
                                            'Adresse Email',
                                            'Téléphone',
                                            'Numéro de téléphone',
                                            'Numéro de l\'encadreur',
                                            'Tranche d\'âge',
                                            'Adresse',
                                            'Adresse de domicile',
                                            'Adresse de domicile (n°, avenue, Quartier, Commune)',
                                            'Profession',
                                            'Spécialité ou domaine (étude ou profession)',
                                            'Spécialité ou domaine',
                                            'Niveau d\'étude',
                                            'Niveau ou année d\'étude',
                                            'Nom de l\'Etablissement / Université',
                                            'Université',
                                            'Université/Etablissement ou Structure',
                                        ]))
                                        <td class="px-6 py-3">{{ $candidat[$label] ?? 'N/A' }}</td>
                                    @elseif ($label !== 'Cv de votre parcours (Obligatoire)')
                                        <td class="label px-6 py-3">{{ $candidat[$label] ?? 'N/A' }}</td>
                                    @endif
                                @endif
                            @endforeach

                            <td class="px-6 py-3" id="statusCell">{{ $candidat['status'] }}</td>
                            <td class="px-6 py-3">
                                <button id="openModal{{ $candidat['id'] }}"
                                    data-dropdown-toggle="simpleModal{{ $candidat['id'] }}"
                                    data-modal-target="simpleModal{{ $candidat['id'] }}"
                                    class="btnAction relative inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 4 15">
                                        <path
                                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                </button>

                                <div id="simpleModal{{ $candidat['id'] }}"
                                    class="z-40 right-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 absolute modal">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                onclick="actionStatus(event, 'accept', '{{ $candidat['id'] }}', '{{ $candidat['odcuser']['first_name'] }}')">Accepter</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                onclick="actionStatus(event, 'decline', '{{ $candidat['id'] }}', '{{ $candidat['odcuser']['first_name'] }}')">Refuser</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                onclick="actionStatus(event, 'wait', '{{ $candidat['id'] }}', '{{ $candidat['odcuser']['first_name'] }}', '{{ $candidat['odcuser']['last_name'] }}')">Attendre</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <button type="button" data-modal-target="popup-accept" id="first-modal" data-modal-toggle="popup-accept"
                hidden>
                Launch Modal
            </button>
            <button type="button" data-modal-target="popup-decline" id="second-modal" data-modal-toggle="popup-decline"
                hidden>
                Launch Modal
            </button>
            <button type="button" data-modal-target="popup-wait" id="third-modal" data-modal-toggle="popup-wait"
                hidden>
                Launch Modal
            </button>
        @else
            <div class="flex justify-center items-center">
                <div class="text-center">
                    <p class="dark:text-gray-400 text-black">Aucun candidat n'a été trouvé sur cette activité !</p>
                </div>
            </div>
        @endif
    </div>
</div>
@section('modal')
    @if (isset($candidatsData))
        <div id="popup-accept" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-accept">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" id="popup-title-accept">
                        </h3>
                        <button id="accept-link" data-text="accept" data-modal-hide="popup-accept" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                            onclick="changeStatus(event, 'accept')">
                            Confirmer
                        </button>
                        <button data-modal-hide="popup-accept" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="popup-decline" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-decline">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" id="popup-title-decline">
                        </h3>
                        <button id="decline-link" data-text="decline" data-modal-hide="popup-decline" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                            onclick="changeStatus(event, 'decline')">
                            Confirmer
                        </button>
                        <button data-modal-hide="popup-decline" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="popup-wait" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-wait">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" id="popup-title-wait">
                        </h3>
                        <button id="wait-link" data-text="wait" data-modal-hide="popup-wait" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                            onclick="changeStatus(event, 'wait')">
                            Confirmer
                        </button>
                        <button data-modal-hide="popup-wait" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
