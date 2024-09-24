@props(['labels', 'participantsData', 'participantsData', 'url', 'id', 'activite_Id', 'odcusers', 'activite'])


<div class="flex justify-between mt-1 ">
    <div>
        {{-- <a href="{{ route('allCertificat', $id) }}"
            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">Generer
            tous les certificats
        </a> --}}
        {{-- Choix du model du certificat a generer --}}
        <a href="{{ route('allCertificat', $id) }}" data-modal-target="choixCertificat-modal"
            data-modal-toggle="choixCertificat-modal" onclick="choix_certificat(event)"
            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
            Choisir un model de certificat 
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>

    <div class="flex justify-between">
        <!--my code for generate certification using the evaluation logic-->
        <!--logic of evaluation-->
        <form action="{{ route('exportParticipant') }}" method="POST">
            @csrf
            <input type="hidden" name="certif" value="{{ $activite->id }}">
            <input type="hidden" name="certifTitle" value="{{ $activite->title }}">
            <button type="submit"
                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#e8eaed">
                    <path
                        d="M440-160v-326L336-382l-56-58 200-200 200 200-56 58-104-104v326h-80ZM160-600v-120q0-33 23.5-56.5T240-800h480q33 0 56.5 23.5T800-720v120h-80v-120H240v120h-80Z" />
                </svg>
                Exporter pour l'evaluation
            </button>
        </form>

        <form action="{{ route('importAndgenerate') }}" method="POST" enctype="multipart/form-data" class="flex">
            @csrf
            <input type="hidden" name="activite" value="{{ $activite->id }}">
            <div class="ml-2">
                <input
                    class="block  w-full text-sm  text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="file" type="file" accept=".xlsx"
                    name="file" ">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Importer et Generer les certificats</p>
            </div>
            <div class="ml-2">
                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d=" M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200
                    200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5
                    56.5T720-160H240Z" /></svg>
                Importer
                </button>
            </div>

        </form>
    </div>
</div>


<!-- Main modal -->

@section('modalparticipants')
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
                                <option value="4">Model Super codeurs</option>
                                <option value="5">Model maker junior</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-center mt-6">
                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e8eaed">
                                <path
                                    d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
                            </svg>
                            Télécharger
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


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
                        Certificat
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Actions
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
