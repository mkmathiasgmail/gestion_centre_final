<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employabilites') }}
        </h2>
    </x-slot>


    <div class=" mb-4 mt-4 text-white">
        <h2 class=" text-4xl font-bold">Employabilites</h2>
        <p class=" w-1/2 dark:text-gray-400 mb-4 mt-4">La gestion des ressources humaines dans une entreprise passe
            inévitablement par la tenue d'une liste exhaustive des employés.!</p>


        <a class=" mt-5 bg-teal-600 p-2 rounded-sm font-bold"  data-modal-target="crud-modal" data-modal-toggle="crud-modal">AJOUTER</a>


    </div>



    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        type contrat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        genre contrat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nom entreprise
                    </th>
                    <th scope="col" class="px-6 py-3">
                        periode
                    </th>
                    <th scope="col" class="px-6 py-3">
                       action
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($employabilites as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ substr($item->type_contrat) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->genre_contrat }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->periode }}
                        </td>


                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('employabilite.show', $item->id) }}"
                                class=" p-2 bg-blue-600">details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


















<x-formEmployabilite />
</x-app-layout>
