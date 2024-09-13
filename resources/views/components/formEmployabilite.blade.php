<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="relative bg-white bg-center bg-cover rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600" style="background-image: url('/img/bug.gif');">


                    <h3 class="text-lg font-semibold text-gray-900 dark:text-black">
                        ENREGISTRER UN EMPLOYE
                    </h3>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase-business">
                        <path d="M12 12h.01" />
                        <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                        <path d="M22 13a18.15 18.15 0 0 1-20 0" />
                        <rect width="20" height="14" x="2" y="6" rx="2" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>


                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal" id="resetButton1">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>




                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('employabilites.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <input type="text" name="id_user" id="id_user" class="hidden">
                        <div class="col-span-2">
                            <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom *</label>
                            <input name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="🔤 veuillez saisir votre prenom" type="text" autocomplete="off" required>
                            <div id="countryList" class="text-black bg-gray-300 rounded-lg ">
                            </div>
                        </div>
                        {{ csrf_field() }}

                        <div class="col-span-2 ">
                            <label for="type_contrat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                                contrat *</label>
                            <select id="type_contrat_id" name="type_contrat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="#">veuilez selectionner votre type</option>
                                @foreach ($typeContrats as $typecontrat)
                                <option value="{{ $typecontrat->id }}">{{ $typecontrat->libelle }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div id="postes-nomboites-container">
                            <div class="col-span-2 sm:col-span-1 postes-nomboites-row">
                                <div>
                                    <label for="poste" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poste *</label>
                                    <input id="poste" name="poste" type="text" rows="4" class="block p-2.5 w-full text-sm
                                    text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500
                                     focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400
                                      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="💼 Veuillez saisir votre poste" autocomplete="off" required>


                                </div>
                                <div>
                                    <label for="nomboite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Entreprise *</label>
                                    <input id="nomboite" name="nomboite" type="text" rows="4" class="block p-2.5
                                   w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300
                                    focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400
                                     dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="🏢 Veuillez saisir le nom de votre entreprise" autocomplete="off" required>


                                </div>
                            </div>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="nomboite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre *</label>
                            <select name="genre" id="genre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="#">selectionner votre genre</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                            </select>



                            <label for="nomboite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tranche age *</label>
                            <select name="tranche_age" id="tranche_age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="#">selectionner votre tranche age</option>
                                <option value="18-25">18-25</option>
                                <option value="26-35">26-35</option>
                                <option value="36-45">36-45</option>
                                <option value="46-55">46-55</option>
                                <option value="56-65">56-65</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="niveau_academique" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Année académique*</label>
                            <input id="niveau_academique" name="niveau_academique" type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" 📚niveau academique ex:licence, graduat" autocomplete="off" required>
                        </div>
                        <div class="col-span-2">
                            <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periode*</label>
                            <input id="periode" name="periode" type="date" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="💼 Veuillez saisir votre poste" autocomplete="off" required>
                            </input>

                        </div>

                        {{-- insererbtn --}}
                        <button type="submit" class="text-white inline-flex items-center bg-green-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                          Enregistrer
                        </button>

                        {{-- insererbtn --}}

                </form>
            </div>
        </div>
    </div>

