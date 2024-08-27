@props(['labels', 'participantsData', 'participantsData', 'url', 'id', 'activite_Id', 'odcusers', 'activite'])
<a href="{{ route('allCertificat', $id) }}"
    class="self-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generer
    tous les certificats</a>

{{-- Choix du model du certificat a generer --}}

<a href="{{ route('allCertificat', $id) }}" data-modal-target="choixCertificat-modal"
    data-modal-toggle="choixCertificat-modal" onclick="choix_certificat(event)"
    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    Choisir un model
    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 5h12m0 0L9 1m4 4L9 9" />
    </svg>
</a>
<!-- Main modal -->

<div id="choixCertificat-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Selectionner un model du certificat
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="choixCertificat-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="" method="post" class="p-4 md:p-5">
                @method('GET')
                <div class="flex justify-center  space-x-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="semestre"
                            class="flex justify-center mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisir
                            Model
                        </label>
                        <select id="certificat" name="certificat"
                            class="justify-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1">Model Parcours Academy</option>
                            <option value="2">Model Parcours Fablab</option>
                            <option value="3">Model Standard</option>
                            <option value="4">Model SuperCodeurs</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Generer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="py-11 relative overflow-x-auto">
    <div class="success"></div>


    @if (isset($participantsData))
        <table id="participantTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Firstname
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Lastname
                    </th>
                    @foreach (array_unique($labels) as $label)
                        @if (isset($label))
                            @if (
                                $label == 'Civilié' ||
                                    $label == 'Civilité' ||
                                    $label == 'Email' ||
                                    $label == 'E-mail' ||
                                    $label == 'E-mail(obligatoire)' ||
                                    $label == 'Adresse Email' ||
                                    $label == 'Téléphone' ||
                                    $label == 'Numéro de téléphone' ||
                                    $label == 'Numéro de l\'encadreur' ||
                                    $label == 'Tranche d\'âge' ||
                                    $label == 'Adresse' ||
                                    $label == 'Adresse de domicile' ||
                                    $label == 'Adresse de domicile (n°, avenue, Quartier, Commune)' ||
                                    $label == 'Profession' ||
                                    $label == 'Spécialité ou domaine (étude ou profession)' ||
                                    $label == 'Spécialité ou domaine' ||
                                    $label == 'Niveau d\'étude' ||
                                    $label == 'Niveau ou année d\'étude' ||
                                    $label == 'Nom de l\'Etablissement / Université' ||
                                    $label == 'Université' ||
                                    $label == 'Université/Etablissement ou Structure')
                                <th scope="col"
                                    class="display-label px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $label }}
                                </th>
                            @elseif($label !== 'Cv de votre parcours (Obligatoire)')
                                <th scope="col"
                                    class="label px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $label }}
                                </th>
                            @endif
                        @endif
                    @endforeach
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Actions
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Certificat
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    @else
        <div class="flex justify-center items-center">
            <div class="text-center">
                <p class="dark:text-gray-400 text-black">Aucun participant n'a été trouvé sur cette activité !</p>
            </div>
        </div>
    @endif
</div>
