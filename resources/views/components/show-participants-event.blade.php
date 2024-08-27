@props(['labels', 'participantsData', 'participantsData', 'url', 'id', 'activite_Id', 'odcusers', 'activite'])
<a href="{{ route('allCertificat', $id) }}"
    class="self-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generer
    tous les certificats</a>

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
