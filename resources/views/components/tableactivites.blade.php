@props(['activites'])

<table id="table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 cell-border display">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                type event
            </td>

            <td scope="col" class="px-6 py-3">
                Lieu
            </td>

            <td scope="col" class="px-6 py-3">
                Teming
            </td>

            <td scope="col" class="px-6 py-3">
                Status
            </td>

            <td scope="col" class="px-6 py-3">
                number hours
            </td>


            <td scope="col" class="px-6 py-3">
                Date_debut
            </td>
            <td scope="col" class="px-6 py-3">
                Date_fin
            </td>

            <td scope="col" class="px-6 py-3">
                Action
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($activites as $i => $item)
            <tr id="rowAll" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="col" class="px-6 py-3">
                    {{ $i + 1 }}
                </th>

                <td scope="col" class="px-6 py-3">
                    <a href="{{ route('activites.show', $item->id) }}">{{ $item->title }}</a>
                </td>

                <td scope="col" class="px-6 py-3">
                    {{ $item->categorie->name }}
                </td>
                <td scope="col" class="px-6 py-3">
                    @foreach ($item->hashtag as $hasthtag)
                        <span>{{ $hasthtag->name }}</span>
                    @endforeach
                </td>
                <td scope="col" class="px-6 py-3">
                    @foreach ($item->typEvent as $event)
                        <span>{{ $event->title }}</span>
                    @endforeach
                </td>

                <td scope="col" class="px-6 py-3">
                    {{ $item->location }}
                </td>

                <td id="nbredays">
                    {{ $item->message }}
                </td>

                <td scope="col" class="px-6 py-3">
                    {{ $item->status ? '✔️' : '⭕️' }}
                </td>


                <td scope="col" class="px-6 py-3" id="startdate">
                    {{ $item->number_hours }}
                </td>

                <td scope="col" class="px-6 py-3" id="startdate">
                    {{ $item->start_date }}
                </td>

                <td scope="col" class="px-6 py-3" id="endate">
                    {{ $item->end_date }}
                </td>



                <td>
                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $i }}"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 4 15">
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
                                <a href="{{ route('activites.edit', $item->id) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update</a>
                            </li>
                            <li>
                                @if ($item->show_in_calendar == true)
                                    <a href="{{ route('showInCalendar', $item->id) }}" data-modal-target="active"
                                        data-modal-toggle="active"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="desactiver(event)">Desactive
                                        au calendar</a>
                                @else
                                    <a href="{{ route('showInCalendar', $item->id) }}" data-modal-target="desactive"
                                        data-modal-toggle="desactive"
                                        class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="activer(event)">Active
                                        au calendar</a>
                                @endif
                            </li>

                             <li>
                                @if ($item->status == true)
                                    <a href="{{ route('send', $item->id) }}" data-modal-target="active"
                                        data-modal-toggle="active"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="desactiver(event)">Desactive
                                        Status</a>
                                @else
                                    <a href="{{ route('send', $item->id) }}" data-modal-target="desactive"
                                        data-modal-toggle="desactive"
                                        class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="activer(event)">Active
                                        Status</a>
                                @endif
                            </li>

                             <li>
                                @if ($item->show_in_calendar == true)
                                    <a href="{{ route('IsEvent', $item->id) }}" data-modal-target="active"
                                        data-modal-toggle="active"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="desactiver(event)">Desactive
                                        IsEvent</a>
                                @else
                                    <a href="{{ route('IsEvent', $item->id) }}" data-modal-target="desactive"
                                        data-modal-toggle="desactive"
                                        class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="activer(event)">Active
                                        IsEvent</a>
                                @endif
                            </li>

                             <li>
                                @if ($item->show_in_calendar == true)
                                    <a href="{{ route('bookInSeat', $item->id) }}" data-modal-target="active"
                                        data-modal-toggle="active"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="desactiver(event)">Desactive
                                        bookInSeat</a>
                                @else
                                    <a href="{{ route('showInCalendar', $item->id) }}" data-modal-target="desactive"
                                        data-modal-toggle="desactive"
                                        class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="activer(event)">Active
                                        bookInSeat</a>
                                @endif
                            </li>

                             <li>
                                @if ($item->show_in_slider == true)
                                    <a href="{{ route('showInSlider', $item->id) }}" data-modal-target="active"
                                        data-modal-toggle="active"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="desactiver(event)">Desactive
                                        showInSlider</a>
                                @else
                                    <a href="{{ route('showInSlider', $item->id) }}" data-modal-target="desactive"
                                        data-modal-toggle="desactive"
                                        class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="activer(event)">Active
                                        showInSlider</a>
                                @endif
                            </li>
                        </ul>
                        <div class="py-2">
                             <li>
                                <a onclick="destroy(event)" href="{{ route('activites.destroy', $item->id) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-target="delete" data-modal-toggle="delete">Delete</a>
                            </li>
                        </div>
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>

</table>
