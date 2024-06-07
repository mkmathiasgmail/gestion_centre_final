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


        <a class=" mt-5 bg-teal-600 p-2 rounded-sm font-bold"data-modal-target="default-modal1"
            data-modal-toggle="default-modal1">AJOUTER</a>


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

                </tr>
            </thead>
            <tbody>
                @foreach ($employabilites as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ substr($item->type_contrat, 0, 100) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->genre_contrat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->nomboite }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->periode }}
                        </td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('employabilite.update', $item->id) }}"
                                class=" p-2 bg-blue-600">Modification</a>

                            <a href="{{ route('employabilite.destroy', $item->id) }}"
                                class=" p-2 bg-red-600">Desactiver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>









    <button
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">

    </button>




    <div id="default-modal1" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">

        <div class="relative rounded-lg shadow dark:bg-gray-700">

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900">

                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent  hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form action="{{route('employabilite.store')}}" method="post">
                <div class="p-5 md:p-5 space-y-4 items-center">

                    @csrf

                            <h1 class="text-xl font-semibold text-yellow-500">inserer</h1>
                    <div>
                        <div><label for="name">name</label></div>
                        <div><input type="text" name="name" id="name" class="w-full h-8 rounded-md text-gray-600"
                                placeholder="" required></div>
                    </div>

                            <div class="form-group">
                                <label for="type_contrat">Type contrat</label>
                                <select name="type_contrat" class="form-control" id="type">
                                    <option value="">--choisir type contrat--</option>
                                    <option value="">CDI</option>
                                    <option value="">CDD</option>
                                    <option value="">Stage</option>
                                    <option value="">Alternance</option>
                                </select>
                            </div>
                            <div>
                                <div><label for="genre">genre contrat</label></div>
                                <div><input type="text" name="genre_contrat" id="genre" class="w-full h-8 rounded-md text-gray-600"
                                        placeholder="" required></div>
                            </div>


                            <div>
                                <div><label for="nomboite">nom entreprise</label></div>
                                <div><input type="text" name="nomboite" id="nomboite" class="w-full h-8 rounded-md text-gray-600"
                                        placeholder="" required></div>
                            </div>


                    <div >
                        <div><label for="date_debut">periode</label></div>
                        <div><input type="date" name="periode" id="date_debut" class="w-full h-8 rounded-md text-gray-600"
                                placeholder=""></div>
                    </div>


                </div>
                <!-- Modal footer -->
                <a href="/index" class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button data-modal-hide="default-modal" type="reset"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>







</x-app-layout>
