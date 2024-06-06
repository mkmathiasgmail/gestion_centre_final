<x-app-layout>
    @if ($activites->isEmpty())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> Change a few things up and try submitting again.
        </div>
    @else
        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
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
                    @foreach ($activites as $item)
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
                                <a href="{{ route('activites.destroy', $item->id) }}"
                                    class=" p-2 bg-red-600">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
</x-app-layout>
