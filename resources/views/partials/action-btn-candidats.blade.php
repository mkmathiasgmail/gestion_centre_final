 <button id="openModal{{ $candidat['id'] }}" data-dropdown-toggle="simpleModal{{ $candidat['id'] }}"
    data-modal-target="simpleModal{{ $candidat['id'] }}"
    class="btnAction relative inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    type="button">
    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
        <path
            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
    </svg>
</button>


<div id="simpleModal{{ $candidat['id'] }}"
    class=" z-40 right-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 absolute modal">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
        <li>
            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                onclick="actionStatus(event, 'accept', '{{ $candidat['id'] }}', '{{ $candidat['odcuser']['first_name'] }}')">Accept</a>
        </li>
        <li>
            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                onclick="actionStatus(event, 'decline', '{{ $candidat['id'] }}', '{{ $candidat['odcuser']['first_name'] }}')">Decline</a>
        </li>
        <li>
            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                onclick="actionStatus(event, 'wait', '{{ $candidat['id'] }}', '{{ $candidat['odcuser']['first_name'] }}', '{{ $candidat['odcuser']['last_name'] }}')">Wait</a>
        </li>
    </ul>

</div>
