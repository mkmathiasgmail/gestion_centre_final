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
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualiser</a>

    <div class="py-6 relative overflow-x-auto">
        <table id="candidatTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @foreach ($labels as $label)
                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $label }}</th>
                    @endforeach

                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Profession
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidatsData as $key => $candidat)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        @foreach ($labels as $label)
                            <td class="px-6 py-4">
                                {{ isset($candidat[$label]) && $candidat[$label] !== '' ? $candidat[$label] : 'N/A' }}
                            </td>
                        @endforeach
                        <td class="px-6 py-4">{{ $candidat['odcuser']['gender'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $profession = json_decode($candidat['odcuser']['profession'], true);

                            @endphp
                            {{ $profession['translations']['fr']['profession'] ?? '' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $candidat['status'] }}
                        </td>
                        <td>
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $key }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDots{{ $key }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton">

                                    <li>
                                        <a href="{{ route('candidat_validate', $candidat['id']) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Accept</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('candidat_reject', $candidat['id']) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Decline</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('candidat_await', $candidat['id']) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wait</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



