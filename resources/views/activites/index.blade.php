<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Gestion Activites') }}
                </h2>
            </div>

            <div class=" flex items-center gap-5">

                <div class="">
                    <form class="max-w-lg mx-auto">
                        <div class="flex">
                            <label for="search-dropdown"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
                                Email</label>
                            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="Search Mockups, Logos, Design Templates..." required />
                                <button type="submit"
                                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </x-slot>


    <div class=" mb-4 mt-4 text-white">
        <h2 class=" text-4xl font-bold">Gestion des Activites</h2>
        <p class=" w-1/2 dark:text-gray-400 mb-4 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus,
            quas voluptas iure, excepturi, inventore
            ipsam error itaque repellat maxime quidem quaerat? Porro harum consectetur minus delectus dignissimos quas
            labore amet!</p>


        <a class=" cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold" data-modal-target="default-modal1"
            data-modal-toggle="default-modal1">Create Activites</a>


    </div>



    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
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
                        Categories
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
                @foreach ($activite as $i => $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ +$i }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('activites.show', $item->id) }}">{{ $item->title }}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ substr($item->description, 0, 100) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->categorie->categorie }}
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
                            <a href="{{ route('activites.update', $item->id) }}" class=" p-2 bg-blue-600"
                                onclick="supprimer(event)">Modification</a>
                            <a href="{{ route('activites.destroy', $item->id) }}" onclick="supprimer(event)"
                                class=" p-2 bg-red-600" data-modal-target="popup-modal"
                                data-modal-toggle="popup-modal">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




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
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                        delete this product?</h3>
                    @method('DELETE')
                    <form action="" method="post" class="delete">
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                            cancel</button>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <div id="default-modal1" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create Activites
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('activites.store') }}" method="post">
                    <div class="p-5 md:p-5 space-y-4 text-white items-center">

                        @csrf
                        <div>
                            <div><label for="title">Title</label></div>
                            <div><input type="text" name="title" id="title"
                                    class="w-full h-8 rounded-md text-gray-600"
                                    placeholder="Donne un titre a votre Article" required></div>
                        </div>

                        <div class="">
                            <div><label for="image">Image (Url)</label></div>
                            <div><input type="text" name="image" id="image"
                                    class=" w-full h-8 rounded-md text-gray-600"
                                    placeholder="Inserer un lien d'image pour votre article" required></div>
                        </div>

                        <div>
                            <div><label for="date_debut">Date debut</label></div>
                            <div><input type="date" name="date_debut" id="date_debut"
                                    class="w-full h-8 rounded-md text-gray-600"
                                    placeholder="Donne un titre a votre Article" required></div>
                        </div>
                        <div>
                            <div><label for="date_fin">Date fin</label></div>
                            <div><input type="date" name="date_fin" id="date_fin"
                                    class="w-full h-8 rounded-md text-gray-600"
                                    placeholder="Donne un titre a votre Article" required></div>
                        </div>

                        <div>
                            <div><label for="lieu">Lieu</label></div>
                            <div>
                                <select name="lieu" id="lieu" class="w-full h-8 rounded-md text-gray-600">
                                    <option value="kinshasa">Kinshasa</option>
                                    <option value="lumubumbashi">Lubumbashi</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div><label for="tags">Tags</label></div>
                            <div>
                                <select name="tags" id="tags" multiple
                                    class="w-full h-8 rounded-md text-gray-600">
                                    <option value="" disabled>selectionner un Etiquette</option>

                                    <option value=""></option>

                                </select>
                            </div>
                        </div>

                        <div>
                            <div><label for="category_id">Categorie</label></div>
                            <div>
                                <select name="categorie_id" id="categorie_id"
                                    class="w-full h-8 rounded-md text-gray-600">
                                    <option value="" disabled>selectionner une Categorie</option>
                                    @foreach ($cat as $category)
                                        <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" mb-5 mt-5">
                            <div>
                                <label for="contenue">Content</label>
                            </div>
                            <div class="text-gray-600">
                                <textarea name="description" id="contenue" required class="w-full text-gray-600"></textarea>
                            </div>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
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



    <script>
        function supprimer(event) {
            event.preventDefault()
            const lien = event.target.getAttribute('href')
            document.querySelector(".delete").setAttribute("action", lien);
        }

        function update(event) {

            alert('pas encore disponible')
            event.preventDefault();
            const form = document.querySelector(".contact form");
            const lien = event.target.getAttribute("href");
            document.querySelector(".contact form").setAttribute("action", lien);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        const quill = new Quill('#contenue', {
            theme: 'snow'
        });
    </script>

</x-app-layout>
