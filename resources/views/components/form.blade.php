<div id="default-modal1" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center max-w-9xl md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-6xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $name }}
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
            <form action="" method="post" id="delete">
                <div class="p-5 md:p-5 space-y-4 text-white items-center">

                    @csrf
                    <div>
                        <div><label for="title">Title</label></div>
                        <div><input type="text" name="title" id="title"
                                class="w-full h-9 rounded-md text-gray-600" placeholder="Donne un titre a votre Article"
                                required></div>
                    </div>

                    <div class="">
                        <div><label for="image">Image (Url)</label></div>
                        <div><input type="text" name="image" id="image"
                                class=" w-full h-9 rounded-md text-gray-600"
                                placeholder="Inserer un lien d'image pour votre article" required></div>
                    </div>

                    <div>
                        <div><label for="date_debut">Date debut</label></div>
                        <div><input type="date" name="date_debut" id="date_debut"
                                class="w-full h-9 rounded-md text-gray-600" placeholder="Donne un titre a votre Article"
                                required></div>
                    </div>
                    <div>
                        <div><label for="date_fin">Date fin</label></div>
                        <div><input type="date" name="date_fin" id="date_fin"
                                class="w-full h-9 rounded-md text-gray-600" placeholder="Donne un titre a votre Article"
                                required></div>
                    </div>

                    <div>
                        <div><label for="lieu">Lieu</label></div>
                        <div>
                            <select name="lieu" id="lieu" class="w-full h-9 rounded-md text-gray-600">
                                <option value="kinshasa">Kinshasa</option>
                                <option value="lumubumbashi">Lubumbashi</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div><label for="tags">Tags</label></div>
                        <div>
                            <select name="tags" id="tags" multiple class="w-full h-8 rounded-md text-gray-600">
                                <option value="" disabled>selectionner un Etiquette</option>

                                <option value=""></option>

                            </select>
                        </div>
                    </div>

                    <div>
                        <div><label for="category_id">Categorie</label></div>
                        <div>
                            <select name="categorie_id" id="categorie_id" class="w-full h-9 rounded-md text-gray-600">
                                <option value="" disabled>selectionner une Categorie</option>
                                {{-- @foreach ($cat as $category)
                                    <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                                @endforeach --}}
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
