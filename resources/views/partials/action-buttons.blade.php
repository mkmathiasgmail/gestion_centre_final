<button id="openModal{{ $activite->id }}" data-dropdown-toggle="simpleModal{{ $activite->id }}"
    data-modal-target="simpleModal{{ $activite->id }}"
    class=" btnModal inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    type="button">
    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
        <path
            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
    </svg>
</button>


<div id="simpleModal{{ $activite->id }}"
    class=" z-40 right-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 absolute modal">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
        <li>
            <a href="{{ route('activites.show', $activite->id) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
        </li>

        <li>
            <a href="{{ route('activites.edit', $activite->id) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update</a>
        </li>

        <li>
            @if ($activite->show_in_calendar)
                <a href="{{ route('showInCalendar', $activite->id) }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Désactiver')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Désactiver au
                    calendrier</a>
            @else
                <a href="{{ route('showInCalendar', $activite->id) }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Activer')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activer au
                    calendrier</a>
            @endif

        </li>

        <li>
            @if ($activite->status)
                <a href="{{ route('send', $activite->id) }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Désactiver')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Desactiver
                    Status</a>
            @else
                <a href="{{ route('send', $activite->id) }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Activer')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Active
                    Status</a>
            @endif
        </li>

        <li>
            @if ($activite->show_in_calendar)
                <a href="{{ route('IsEvent', $activite->id) }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Désactiver')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Desactiver
                    IsEvent</a>
            @else
                <a href="{{ route('IsEvent', $activite->id) }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Activer')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Active
                    IsEvent</a>
            @endif
        </li>

        <li>
            @if ($activite->show_in_calendar)
                <a href="{{ route('bookInSeat', $activite->id) }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Désactiver')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Désactiver
                    bookInSeat</a>
            @else
                <a href="{{ route('bookInSeat', $activite->id) }}" data-modal-target="active-{{ $activite->id }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Activer')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activer
                    bookInSeat</a>
            @endif
        </li>

        <li>
            @if ($activite->show_in_slider)
                <a href="{{ route('showInSlider', $activite->id) }}" data-modal-target="active-{{ $activite->id }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Désactiver')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Désactiver
                    showInSlider</a>
            @else
                <a href="{{ route('showInSlider', $activite->id) }}" data-modal-target="active-{{ $activite->id }}"
                    onclick="return confirmAction(event, '{{ $activite->id }}', 'Activer')"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activer
                    showInSlider</a>
            @endif
        </li>

    </ul>
    <div class="py-2">
        <li>
            <a onclick="return destroy(event, '{{ route('activites.destroy', $activite->id) }}')" href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-target="delete" data-modal-toggle="delete">Delete</a>
        </li>
    </div>

</div>

<button data-modal-target="timeline-modal" data-modal-toggle="timeline-modal"
    class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Toggle modal
</button>


<x-statusactive :activiteid="$activite->id" :name="__('Would you like show in calendar this activity? ')" />

<x-statusdesactive :activiteid="$activite->id" :name="__('Would you like disable in calendar this activity? ')" />

<x-delete :activiteid="$activite->id" :name="__('Would you like disable in calendar this activity? ')" />
