<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activites') }}
        </h2>
    </x-slot>


    <div class=" mb-4 mt-4 text-white">
        <h2 class=" text-4xl font-bold">Gestion des Activites</h2>
        <p class=" w-1/2 dark:text-gray-400 mb-4 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus,
            quas voluptas iure, excepturi, inventore
            ipsam error itaque repellat maxime quidem quaerat? Porro harum consectetur minus delectus dignissimos quas
            labore amet!</p>


        <a class=" mt-5 bg-slate-600 p-2 rounded-sm font-bold" data-modal-target="default-modal1"
            data-modal-toggle="default-modal1">Create Activites</a>


    </div>



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
                @foreach ($activite as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">
                            <a href="{{ route('activites.show', $item->id) }}">{{ $item->title }}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ substr($item->description, 0, 100) }}
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


    <div id="default-modal1" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="post">
                    <div class="p-4 md:p-5 space-y-4">

                        @csrf
                        <div class="flex gap-6 mb-5 text-white">
                            <div>
                                <div><label for="titre">Title</label></div>
                                <div><input type="text" name="titre" id="titre" class=" h-8 rounded-md"
                                        placeholder="Donne un titre a votre Article" required></div>
                            </div>
                            <div>
                                <div><label for="contenue">Image (Url)</label></div>
                                <div><input type="text" name="path" id="path" class="  h-8 rounded-md"
                                        placeholder="Inserer un lien d'image pour votre article" required></div>
                            </div>

                        </div>

                        <div class=" flex gap-8">
                            <div>
                                <div><label for="tags">Tags</label></div>
                                <div>
                                    <select name="tags[]" id="tags" multiple class=" h-8 rounded-md">
                                        <option value="" disabled>selectionner un Etiquette</option>

                                        <option value=""></option>

                                    </select>
                                </div>
                            </div>

                            <div>
                                <div><label for="category_id">Categorie</label></div>
                                <div>
                                    <select name="categorie_id" id="categorie_id" class=" w h-8 rounded-md">
                                        <option value="" disabled>selectionner une Categorie</option>

                                        <option value=""></option>

                                    </select>
                                </div>
                            </div>

                        </div>




                        <div class=" mb-5 mt-5">
                            <label for="contenue">Content</label>
                            <textarea name="contenue" id="contenue"></textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="default-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
