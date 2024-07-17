<x-app-layout>
    <div class="p-6 bg-white border-b border-gray-200 sm:px-20 dark:bg-gray-900 dark:border-gray-700">
        <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Role') }}
            </h2>
            </x-slot>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        N°
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        Nom  d'utilisateur
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i=>$item)
                <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$i+1}}
                    </th>
                    <td class="px-6 py-4">
                      {{$item->name}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('user_role.show',$item->id)}}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                {{-- d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /> --}}
                                d="M11 5V11H5V13H11V19H13V13H19V11H13V5H11M19 15C17.95 15 16.9 15.8 16.9 16.82V18.64C16.45 18.64 16 19.07 16 19.5V22.05C16 22.56 16.45 23 16.9 23H21.03C21.55 23 22 22.56 22 22.13V19.58C22 19.07 21.55 18.64 21.1 18.64H17.88V16.82C17.88 16.24 18.4 15.87 19 15.87S20.13 16.24 20.13 16.82V17.18H21.1V16.82C21.1 15.8 20.05 15 19 15Z" />
                        </svg>
                     </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>














