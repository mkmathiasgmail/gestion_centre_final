<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Gestion Activites') }}
                </h2>
            </div>



        </div>

    </x-slot>

    <div class=" mb-4 mt-4 text-white">
        <h2 class=" text-4xl font-bold">Gestion des Activites</h2>
        <p class=" w-full md:w-1/2 dark:text-gray-400 mb-4 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus,
            quas voluptas iure, excepturi, inventore
            ipsam error itaque repellat maxime quidem quaerat? Porro harum consectetur minus delectus dignissimos quas
            labore amet!</p>


        <a class=" cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold">Create Activites</a>


    </div>

    <div class="relative overflow-x-auto mt-4">
        <table id="table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <td scope="col" class="px-6 py-3">
                        Title
                    </td>
                    <td scope="col" class="px-6 py-3">
                        categories
                    </td>
                    <td scope="col" class="px-6 py-3">
                        hashtag
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Lieu
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Date_debut
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Date_fin
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Duree
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($activites as $i => $item)
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ $i + 1 }}
                        </th>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->categorie->categorie }}
                        </td>
                        <td scope="col" class="px-6 py-3">
                            @foreach ($item->hashtag as $hasthtag)
                                <span>{{ $hasthtag->hashtag }}</span>
                            @endforeach
                        </td>
                        <td scope="col" class="px-6 py-3">
                            {{ $item->location }}
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->startDate }}
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->endDate }}
                        </td>

                        <td>

                        </td>

                        <td>
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $i }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDots{{ $i }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                        <a href="{{ route('activites.show', $item->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('activites.destroy', $item->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            id="popup-modal" onclick="delete(event)">Delete</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('activite.update', $item->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Status</a>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lieu
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categories
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date_debut
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date_fin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>



    @section('script')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script>
            new DataTable('#table');
        </script>
        <script>
            function delete(event) {
                event.preventDefault()

            }
        </script>
    @endsection


</x-app-layout>
