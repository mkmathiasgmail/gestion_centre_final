@props(['labels', 'candidatsData', 'url', 'id', 'activite_Id', 'odcusers', 'activite'])

@if (Session('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
        </div>
    </div>
@endif

<div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel"
    aria-labelledby="dashboard-tab">

    <a href="#" onclick="Reload()"
        class="self-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Actualiser</a>

    <div class="py-6 relative overflow-x-auto">
        @if (isset($candidatsData))
            <table id="candidatTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach (array_unique($labels) as $label)
                            @if (isset($label))
                                @if ($label != 'Cv de votre parcours (Obligatoire)')
                                    <th scope="col" title="{{ $label }}"
                                        class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $label }}
                                    </th>
                                @endif
                            @endif
                        @endforeach

                        <th scope="col" data-title="Gender"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Gender
                        </th>
                        <th scope="col" title="Profession"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Profession
                        </th>
                        <th scope="col" title="Status"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Actions
                        </th>
                        <th scope="col" title="checkbox"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidatsData as $key => $candidat)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="rowCandidat">
                            @foreach (array_unique($labels) as $label)
                                @if (isset($label))
                                    @if ($label != 'Cv de votre parcours (Obligatoire)')
                                        <td class="px-6 py-4">
                                            @php
                                                $value =
                                                    isset($candidat[$label]) && $candidat[$label] !== ''
                                                        ? $candidat[$label]
                                                        : 'N/A';
                                            @endphp
                                            {{ Str::of($value)->limit(40, '...') }}
                                            @if (strlen($value) > 40)
                                                <a href="#" onclick='readMore(event, `{{ $value }}`)'
                                                    class="dark:text-gray-500 hover:text-gray-600">Read
                                                    more</a>
                                            @endif
                                        </td>
                                    @endif
                                @endif
                            @endforeach
                            <td class="px-6 py-4">{{ $candidat['odcuser']['gender'] }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $profession = json_decode($candidat['odcuser']['profession'], true);

                                @endphp
                                {{ $profession['translations']['fr']['profession'] ?? '' }}
                            </td>
                            <td class="px-6 py-4" id="statusCell">
                                {{ $candidat['status'] }}
                            </td>
                            <td class="tdAction" style="position: relative">
                                <button id="dropdownMenuIconButton" data-target="dropdownDots{{ $key }}"
                                    class="btn-menu inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 4 15">
                                        <path
                                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownDots{{ $key }}"
                                    style="position: absolute; top:50px; right: 50px;"
                                    class="div-dropdown z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="dropdown-menu py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a data-modal-target="popup-accept" data-modal-toggle="popup-accept"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                onclick="actionStatus(event, 'accept', {{ $candidat['id'] }}, '{{ $candidat['odcuser']['first_name'] }}')">Accept</a>
                                        </li>
                                        <li>
                                            <a data-modal-target="popup-decline" data-modal-toggle="popup-decline"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                onclick="actionStatus(event, 'decline', {{ $candidat['id'] }}, '{{ $candidat['odcuser']['first_name'] }}')">Decline</a>
                                        </li>
                                        <li>
                                            <a data-modal-target="popup-wait" data-modal-toggle="popup-wait"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                onclick="actionStatus(event, 'wait', {{ $candidat['id'] }}, '{{ $candidat['odcuser']['first_name'] }}', '{{ $candidat['odcuser']['last_name'] }}')">Wait</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4" id="statusCell">
                                <input id="default-checkbox" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
                        onclick="changeStatus(event)">
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
                        onclick="changeStatus(event)">
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
                        onclick="changeStatus(event)">
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
