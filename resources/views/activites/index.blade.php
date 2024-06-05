<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activites') }}
        </h2>
    </x-slot>


    <div class=" mb-4 mt-4 text-white">
        <h2 class=" text-4xl font-bold">Gestion des Activites</h2>
        <p class=" w-1/2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, quas voluptas iure, excepturi, inventore
            ipsam error itaque repellat maxime quidem quaerat? Porro harum consectetur minus delectus dignissimos quas
            labore amet!</p>
    </div>



    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lieu
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
            </thead>
            <tbody>
                @foreach ($activite as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">
                            <a href="{{ route('activites.show', $item->id) }}">{{ $item->title }}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->lieu }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->date_debut }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->date_fin }}
                        </td>

                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('activites.update', $item->id) }}"
                                class=" p-2 bg-blue-600">Modification</a>
                            <a href="{{ route('activites.destroy', $item->id) }}" class=" p-2 bg-red-600">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
