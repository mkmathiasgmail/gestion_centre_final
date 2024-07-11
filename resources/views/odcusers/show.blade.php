<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="w-1/2">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight text-left">
                    {{ __('Informations du compte de l\'utilisateur : ' . $odcuser->first_name . ' ' . $odcuser->last_name) }}
                </h2>
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
                    {{ '' . $odcuser->first_name . ' ' . $odcuser->last_name }} </h5>
                <span class="text-base text-gray-500 dark:text-gray-400">
                    @php
                        $profession = json_decode($odcuser->profession);
                    @endphp
                    {{ $profession->translations->fr->profession }}
                </span>
            </div>
            <div class="py-6 relative overflow-x-auto">
                <table id="userTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Fistname
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Lastname
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Phone number
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Profession
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Education
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Candidature
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $odcuser->first_name }}</td>
                            <td class="px-6 py-4">{{ $odcuser->last_name }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $email = collect($datas)->pluck('E-mail')->unique()->first();
                                @endphp
                                {{ $email }}
                            </td>
                            <td>
                                @php
                                    $phone = collect($datas)->pluck('Téléphone')->unique()->first();
                                @endphp
                                {{ $phone }}
                            </td>
                            <td class="px-6 py-4">{{ $odcuser->birth_date }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $university = collect($datas)
                                        ->pluck("Nom de l'Etablissement / Université")
                                        ->unique()
                                        ->first();
                                @endphp
                                {{ $university }}
                            </td>
                            <td>
                                @foreach ($candidats as $candidat)
                                    @if ($candidat->activite)
                                        {{ $candidat->activite->title }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            $(document).ready(function() {
                $('#userTable').DataTable({
                    responsive: true,
                    columnDefs: [{
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ],
                    layout: {
                        topStart: {
                            pageLength: {
                                menu: [10, 25, 50, 100, 200]
                            },
                            buttons: [
                                'colvis'
                            ]
                        },
                        topEnd: {
                            search: {
                                placeholder: 'Type search here'
                            }
                        },
                        bottomEnd: {
                            paging: {
                                numbers: 3
                            }
                        },

                    },

                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All']
                    ],
                });
            });
        </script>
    @endsection

</x-app-layout>
