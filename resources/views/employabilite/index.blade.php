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


        <a class=" mt-5 bg-teal-600 p-2 rounded-sm font-bold"data-modal-target="popup-modal"
            data-modal-toggle="popup-modal">AJOUTER</a>


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







    </form>

    <button
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">

    </button>

    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only"></span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header ">
                                        <h4 class="text-center text 2xl:text-3xl font-bold text-yellow-500">Inserer</h4>
                                    </div>
                                    <div class=" card-body ">

                                        <form action="/index" method="POST" >
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Type contrat</label>
                                                <select name="type_contrat" class="form-control" id="type">
                                                    <option value="">--choisir type contrat--</option>
                                                    <option value="">CDI</option>
                                                    <option value="">CDD</option>
                                                    <option value="">Stage</option>
                                                    <option value="">Alternance</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">genre contrat</label>
                                                <input type="genre" class="form-control" name="genre_contrat"
                                                    id="">
                                            </div>

                                            <div class="form-group">
                                                <label for="">peroide</label>
                                                <input type="date" class="form-control" name="periode"
                                                    id="periode">
                                            </div>


                                        </form>
                                        <br>

                                                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                      ajouter
                                                </button>


                                     </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
