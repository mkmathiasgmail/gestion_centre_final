<x-app-layout>
    <div class=" mt-4">
        <h4
            class="mb-8 text-3xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-white text-center">
            Les rapports des activités coursera
        </h4>
    </div>
    <section class=" flex justify-between p-4 gap-4 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mb-8">

        <div
            class=" h-36  flex  items-center  p-1 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">
            <div>
                <svg class="w-12 h-12 m-4 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                    <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                </svg>

            </div>
            <button data-modal-target="default-modal-member" data-modal-toggle="default-modal-member" type="button">
                <div>
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 ">
                        Membres coursera : <span id="count" class="text-[#fcdf3f]">{{ $coursera_members }}
                        </span>
                    </h3>
                    <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                        nombre des personnes participant aux formations coursera.</p>
                </div>
            </button>
        </div>
        <div
            class=" h-36  flex  items-center  p-1 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">
            <div>
                <svg class="w-12 h-12 m-4 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                    <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                </svg>

            </div>
            <button data-modal-target="default-modal-specialite" data-modal-toggle="default-modal-specialite"
                type="button">
                <div>
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 ">
                        Nombre de specialitsations coursera : <span id="count"
                            class="text-[#fcdf3f]">{{ $specialisationsCount }}
                        </span>
                    </h3>
                    <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                        nombre des specialisations contenues dans le programme coursera.</p>
                </div>
            </button>
        </div>
        <div
            class="rounded-xl flex gap-1 items-center  p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700   hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">

            <div class="">
                <svg class="w-12 h-12 m-4 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                        clip-rule="evenodd" />
                </svg>

            </div>
            <button data-modal-target="default-modal-total_cours" data-modal-toggle="default-modal-total_cours"
                type="button">
                <div class="">
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                        Nombre total des cours sur coursera : <span id="count"
                            class="text-[#fcdf3f]">{{ $nombre_cours }}</span>
                    </h3>
                    <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                        mombre de cours accessibles sur coursera.</p>
                </div>
            </button>
        </div>
    </section>

    @section('modal')
        {{-- Nombre total des cours sur coursera  --}}
        <div id="default-modal-total_cours" dark:text-gray-300
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Total des cours sur coursera
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-total_cours">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="relative overflow-x-auto">
                        <table id="total_cours"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Cours
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($total_cours as $cour)
                                    <tr>
                                        <td class="px-6 py-4">
                                            {{ $cour->course }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>

        <!-- Main modal licences en cours d'utilisations -->
        <div id="default-modal"
            class=" dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Licences en cours d'utilisation
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
                    <div>
                        <div id="toutAfficher" role="tabpanel" aria-labelledby="toutAfficher-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="mytable"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($licence_en_cours as $licence)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $licence->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $licence->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $licence->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $licence->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal licences en cours d'utilisations à Kinshasa -->
                        <div id="kinshasa" role="tabpanel" aria-labelledby="kinshasa-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="licence_kinshasa"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($licenceKinEnCours as $licence)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $licence->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $licence->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $licence->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $licence->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal licences en cours d'utilisations à Lubumbashi -->
                        <div id="lubumbashi" role="tabpanel" aria-labelledby="lubumbashi-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="licence_lubumbashi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($licenceLubEnCours as $licence)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $licence->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $licence->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $licence->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $licence->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- licences en cours d'utilisation à Matadi --}}
                        <div id="matadi" role="tabpanel" aria-labelledby="matadi-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="licence_matadi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($licenceMatEnCours as $licence)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $licence->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $licence->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $licence->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $licence->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Licence en cours d'utilisation a kananga --}}
                        <div id="kananga" role="tabpanel" aria-labelledby="kananga-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="licence_kananga"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($licenceKanEnCours as $licence)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $licence->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $licence->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $licence->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $licence->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <a href="{{ route('licencesCoursera') }}" data-modal-hide="default-modal" type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                                Exporter en Excel</a>

                            <div class="px-8 mb-4">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                    data-tabs-toggle="#default-tab-content"
                                    data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                    role="tablist">
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="toutAfficher-tab"
                                            data-tabs-target="#toutAfficher" type="button" role="tab"
                                            aria-controls="toutAfficher" aria-selected="false"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tout
                                            afficher:
                                            {{ $licence_en_cours_count }}</button>
                                    </li>

                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="kinshasa-tab"
                                            data-tabs-target="#kinshasa" type="button" role="tab"
                                            aria-controls="kinshasa" aria-selected="false"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kinshasa:
                                            {{ $licenceKinEnCours_count }}</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="lubumbashi-tab" data-tabs-target="#lubumbashi" type="button"
                                            role="tab" aria-controls="lubumbashi" aria-selected="false"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Lubumbashi:
                                            {{ $licenceLubEnCours_count }}</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="matadi-tab" data-tabs-target="#matadi" type="button" role="tab"
                                            aria-controls="matadi" aria-selected="false"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Matadi
                                            : {{ $licenceMatEnCours_count }}</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="kananga-tab" data-tabs-target="#kananga" type="button" role="tab"
                                            aria-controls="kananga" aria-selected="false"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kananga
                                            : {{ $licenceKanEnCours_count }}</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal Nombres de ceux qui ont obtenu les certificats -->
        <div id="default-modal2"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Nombres de ceux qui ont obtenu les certificats
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal2">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div>


                        <div id="toutAfficher_certificat" role="tabpanel"
                            aria-labelledby="toutAfficher_certificat-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="mytable2"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificats as $certif)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $certif->name }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $certif->email }}
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->course }}</td>
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Nombres de ceux qui ont obtenu les certificats à kinshasa --}}
                        <div id="kinshasa_certificat" role="tabpanel"
                            aria-labelledby="kinshasa_certificat-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="certificat_kinshasa"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificat_obtenue_kinshasa as $certif)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $certif->name }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $certif->email }}
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->course }}</td>
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Main modal Nombres de ceux qui ont obtenu les certificats à lubumbashi --}}
                        <div id="lubumbashi_certificat" role="tabpanel"
                            aria-labelledby="lubumbashi_certificat-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

                            <table id="certificat_lubumbashi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificat_obtenue_lubumbashi as $certif)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $certif->name }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $certif->email }}
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->course }}</td>
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal Nombres de ceux qui ont obtenu les certificats à matadi -->
                        <div id="matadi_certificat" role="tabpanel"
                            aria-labelledby="matadi_certificat-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="certificat_matadi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificat_obtenue_matadi as $certif)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $certif->name }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $certif->email }}
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->course }}</td>
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal Nombres de ceux qui ont obtenu les certificats à kananga -->
                        <div id="kananga_certificat" role="tabpanel"
                            aria-labelledby="matadi_certificat-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="certificat_kananga"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificat_obtenue_kananga as $certif)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $certif->name }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $certif->email }}
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->course }}</td>
                                            </td>

                                            <td class="px-6 py-4">{{ $certif->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('certificatscursera') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>

                        <div class="px-8 mb-4">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                data-tabs-toggle="#default-tab-content"
                                data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                        id="toutAfficher_certificat-tab" data-tabs-target="#toutAfficher_certificat"
                                        type="button" role="tab" aria-controls="toutAfficher_certificat"
                                        aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tout
                                        afficher:
                                        {{ $certificat_count }}</button>
                                </li>

                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="kinshasa_certificat-tab"
                                        data-tabs-target="#kinshasa_certificat" type="button" role="tab"
                                        aria-controls="kinshasa_certificat" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kinshasa:
                                        {{ $certificat_obtenue_kinshasa_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="lubumbashi_certificat-tab" data-tabs-target="#lubumbashi_certificat"
                                        type="button" role="tab" aria-controls="lubumbashi_certificat"
                                        aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Lubumbashi:
                                        {{ $certificat_obtenue_lubumbashi_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="matadi_certificat-tab" data-tabs-target="#matadi_certificat" type="button"
                                        role="tab" aria-controls="matadi_certificat" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Matadi
                                        : {{ $certificat_obtenue_matadi_count }}</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="kananga_certificat-tab" data-tabs-target="#kananga_certificat" type="button"
                                        role="tab" aria-controls="kananga_certificat" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kananga
                                        : {{ $certificat_obtenue_kananga_count }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main modal nombres des personnes members depuis 30 jours et n'ont pas de certificat -->
        <div id="default-modal3"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Nombres des personnes membres depuis 30 jours et n'ont pas de certificat
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal3">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    {{-- Nombres des personnes membres depuis 30 jours et n'ont pas de certificat --}}
                    <div id="apprenant_30daysAll" role="tabpanel"
                        aria-labelledby="apprenant_30daysAll-tab p-4 md:p-5 space-y-4"
                        class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <table id="mytable3"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Course</th>

                                    <th scope="col" class="px-6 py-3">
                                        University
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apprenants_30day as $member)
                                    <tr>
                                        <td class="px-6 py-4">
                                            {{ $member->name }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $member->email }}

                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $member->course }}
                                        </td>

                                        <td class="px-6 py-4">{{ $member->university }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Main modal nombres des personnes members depuis 30 jours et n'ont pas de certificat à Kinshasa -->
                    <div>
                        <div id="apprenants_30day_kinshasa" role="tabpanel"
                            aria-labelledby="apprenants_30day_kinshasa-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="30day_kinshasa"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apprenants_30day_kinshasa as $member)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $member->name }}

                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $member->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $member->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $member->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal nombres des personnes members depuis 30 jours et n'ont pas de certificat à lubumbashi -->
                        <div id="apprenants_30day_lubumbashi" role="tabpanel"
                            aria-labelledby="apprenants_30day_lubumbashi-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="30day_lubumbashi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apprenants_30day_lubumbashi as $member)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $member->name }}

                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $member->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $member->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $member->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal nombres des personnes members depuis 30 jours et n'ont pas de certificat à matadi -->
                        <div id="apprenants_30day_matadi" role="tabpanel"
                            aria-labelledby="apprenants_30day_matadi-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="30day_matadi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apprenants_30day_matadi as $member)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $member->name }}

                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $member->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $member->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $member->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal nombres des personnes members depuis 30 jours et n'ont pas de certificat à kananga -->
                        <div id="apprenants_30day_kananga" role="tabpanel"
                            aria-labelledby="apprenants_30day_kananga-tab p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="30day_kananga"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3">Course</th>

                                        <th scope="col" class="px-6 py-3">
                                            University
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apprenants_30day_kananga as $member)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $member->name }}

                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $member->email }}

                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $member->course }}
                                            </td>

                                            <td class="px-6 py-4">{{ $member->university }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('membre_30days') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporter en Excel</a>

                        <div class="px-8 mb-4">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                data-tabs-toggle="#default-tab-content"
                                data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="apprenant_30daysAll-tab"
                                        data-tabs-target="#apprenant_30daysAll" type="button" role="tab"
                                        aria-controls="toutAfficher_certificat" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tout
                                        afficher:
                                        {{ $apprenants_30day_count }}</button>
                                </li>

                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                        id="apprenants_30day_kinshasa-tab" data-tabs-target="#apprenants_30day_kinshasa"
                                        type="button" role="tab" aria-controls="apprenants_30day_kinshasa"
                                        aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kinshasa:
                                        {{ $apprenants_30day_kinshasa_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="apprenants_30day_lubumbashi-tab"
                                        data-tabs-target="#apprenants_30day_lubumbashi" type="button" role="tab"
                                        aria-controls="apprenants_30day_lubumbashi" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Lubumbashi:
                                        {{ $certificat_30day_lubumbashi_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="apprenants_30day_matadi-tab" data-tabs-target="#apprenants_30day_matadi"
                                        type="button" role="tab" aria-controls="apprenants_30day_matadi"
                                        aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Matadi
                                        : {{ $apprenants_30day_matadi_count }}</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="apprenants_30day_kananga-tab" data-tabs-target="#apprenants_30day_kananga"
                                        type="button" role="tab" aria-controls="apprenants_30day_kananga"
                                        aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kananga
                                        : {{ $apprenants_30day_kananga_count }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal4"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Nombres des personnes invitées depuis plus de 7 jours et ne sont inscrits à aucun cours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal4">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <div id="default-styled-tab-content2">
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile2"
                            role="tabpanel" aria-labelledby="profile-tab2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow: auto;">
                                        <table id="mytable4"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>

                                                    <th scope="col" class="px-6 py-3">Course</th>

                                                    <th scope="col" class="px-6 py-3">
                                                        Universityy
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($non_inscrit_cours as $inscrit)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->name }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->email }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->course }}
                                                        </td>

                                                        <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard2"
                            role="tabpanel" aria-labelledby="dashboard-tab2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow:auto,">
                                        <table id="mytable_non_inscritKin"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>

                                                    <th scope="col" class="px-6 py-3">Course</th>

                                                    <th scope="col" class="px-6 py-3">
                                                        University
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($non_inscritKin as $inscrit)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->name }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->email }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->course_slug }}
                                                        </td>

                                                        <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings2"
                            role="tabpanel" aria-labelledby="settings-tab2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow:auto,">
                                        <table id="mytable_non_inscritLub"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>

                                                    <th scope="col" class="px-6 py-3">Course</th>

                                                    <th scope="col" class="px-6 py-3">
                                                        University
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($non_inscritLub as $inscrit)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->name }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->email }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->course_slug }}
                                                        </td>

                                                        <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </strong>
                            </p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings-mat2"
                            role="tabpanel" aria-labelledby="settings-tab2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_non_inscritMat"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">Course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    University
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($non_inscritMat as $inscrit)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->name }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->email }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->course_slug }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts2"
                            role="tabpanel" aria-labelledby="contacts-tab2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow:auto,">
                                        <table id="mytable_non_inscritKan"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>

                                                    <th scope="col" class="px-6 py-3">Course</th>

                                                    <th scope="col" class="px-6 py-3">
                                                        University
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($non_inscritKan as $inscrit)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->name }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->email }}

                                                        </td>

                                                        <td class="px-6 py-4">
                                                            {{ $inscrit->course_slug }}
                                                        </td>

                                                        <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </strong>
                            </p>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('non_inscrit_coursera') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporter en Excel</a>

                        <div class="px-16 mb-4">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab2"
                                data-tabs-toggle="#default-styled-tab-content2"
                                data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab2"
                                        data-tabs-target="#styled-profile2" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">Tout afficher: {{ $non_inscrit_cours_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="dashboard-styled-tab2" data-tabs-target="#styled-dashboard2" type="button"
                                        role="tab" aria-controls="dashboard" aria-selected="false"> Kinshasa :
                                        {{ $non_inscritKin_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-tab2" data-tabs-target="#styled-settings2" type="button"
                                        role="tab" aria-controls="settings" aria-selected="false">Lubumbashi :
                                        {{ $non_inscritLub_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-mat2" data-tabs-target="#styled-settings-mat2" type="button"
                                        role="tab" aria-controls="settings" aria-selected="false">Matadi :
                                        {{ $non_inscritMat_count }}</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="contacts-styled-tab2" data-tabs-target="#styled-contacts2" type="button"
                                        role="tab" aria-controls="contacts" aria-selected="false">Kananga :
                                        {{ $non_inscritKan_count }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal5"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Nombre des membres inactifs dépuis le 1er septembre
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal5">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <div id="default-styled-tab-content1">
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile1"
                            role="tabpanel" aria-labelledby="profile-tab1">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable5"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    university
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($last_activity as $member)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $member->name }}

                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $member->email }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $member->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $member->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard1"
                            role="tabpanel" aria-labelledby="dashboard-tab1">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_last_activityKin"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">Course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    University
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($last_activityKin as $inscrit)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->name }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->email }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings1"
                            role="tabpanel" aria-labelledby="settings-tab1">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_last_activityLub"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">Course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    University
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($last_activityLub as $inscrit)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->name }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->email }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->course_slug }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings-mat1"
                            role="tabpanel" aria-labelledby="settings-tab1">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_last_activityMat"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">Course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    University
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($last_activityMat as $inscrit)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->name }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->email }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>
                        
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts1"
                            role="tabpanel" aria-labelledby="contacts-tab1">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_last_activityKan"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">Course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    University
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($last_activityKan as $inscrit)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->name }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->email }}

                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $inscrit->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>
                    </div>

                    <!-- Modal footer -->

                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('last_activity') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>

                        <div class="px-16 mb-4">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab1"
                                data-tabs-toggle="#default-styled-tab-content1"
                                data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab1"
                                        data-tabs-target="#styled-profile1" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">Tout afficher :{{ $last_activity_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="dashboard-styled-tab1" data-tabs-target="#styled-dashboard1" type="button"
                                        role="tab" aria-controls="dashboard" aria-selected="false">Kinshasa :
                                        {{ $last_activityKin_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-tab1" data-tabs-target="#styled-settings1" type="button"
                                        role="tab" aria-controls="settings" aria-selected="false">Lubumbashi :
                                        {{ $last_activityLub_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-mat1" data-tabs-target="#styled-settings-mat1" type="button"
                                        role="tab" aria-controls="settings" aria-selected="false">Matadi :
                                        {{ $last_activityMat_count }}</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="contacts-styled-tab1" data-tabs-target="#styled-contacts1" type="button"
                                        role="tab" aria-controls="contacts" aria-selected="false">Kananga :
                                        {{ $last_activityKan_count }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal6"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Utilisateurs des licences dans les 21 derniers jours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal6">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->


                    <div id="default-styled-tab-content">
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile"
                            role="tabpanel" aria-labelledby="profile-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable6"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    university
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($taux_utilisation as $member)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $member->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $member->email }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $member->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $member->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard"
                            role="tabpanel" aria-labelledby="dashboard-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_taux_utilKin"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    university
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($taux_util_kin as $member)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $member->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $member->email }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $member->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $member->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings"
                            role="tabpanel" aria-labelledby="settings-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_taux_utilub"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Nom
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">cours</th>

                                                <th scope="col" class="px-6 py-3">
                                                    université
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($taux_util_lub as $member)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $member->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $member->email }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $member->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $member->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings-mat"
                            role="tabpanel" aria-labelledby="settings-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_taux_utilmat"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    university
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($taux_util_mat as $member)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $member->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $member->email }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $member->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $member->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts"
                            role="tabpanel" aria-labelledby="contacts-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <table id="mytable_taux_utilkan"
                                        class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>

                                                <th scope="col" class="px-6 py-3">course</th>

                                                <th scope="col" class="px-6 py-3">
                                                    university
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($taux_util_kan as $member)
                                                <tr>
                                                    <td class="px-6 py-4">
                                                        {{ $member->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $member->email }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ $member->course }}
                                                    </td>

                                                    <td class="px-6 py-4">{{ $member->university }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </p>
                        </div>
                    </div>


                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('taux_utilisation') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Experte en Excel</a>

                        <div class="px-16 mb-4">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                                data-tabs-toggle="#default-styled-tab-content"
                                data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                                        data-tabs-target="#styled-profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">Tout afficher : {{ $taux_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button"
                                        role="tab" aria-controls="dashboard" aria-selected="false">Kinshasa :
                                        {{ $taux_util_kin_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-tab" data-tabs-target="#styled-settings" type="button"
                                        role="tab" aria-controls="settings" aria-selected="false">Lubumbashi :
                                        {{ $taux_util_lub_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-mat" data-tabs-target="#styled-settings-mat" type="button"
                                        role="tab" aria-controls="settings" aria-selected="false">Matadi :
                                        {{ $taux_util_mat_count }}</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button"
                                        role="tab" aria-controls="contacts" aria-selected="false">Kananga :
                                        {{ $taux_util_kan_count }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal les specialites coursera-->
        <div id="default-modal-specialite"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Les specialisations coursera
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-specialite">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="relative overflow-x-auto">
                        <table id="mytable_specialite"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Specialisation
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre de cours
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allSpecialisations as $specialite)
                                    <tr>
                                        <td class="px-6 py-4">
                                            {{ $specialite->specialisaton }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $specialite->courses_in_specialisation }}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>

        <!-- Main modal memebres coursera-->
        <div id="default-modal-member"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Membres du programme coursera
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-member">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <div>
                        <!-- Main modal tous les memebres coursera-->
                        <div id="membersAll" role="tabpanel" aria-labelledby="membersAll-tab p-4 md:p-5 space-y-4" style="overflow: auto;"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="mytable_member"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            External Id
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Program Slug
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Enrolled Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Completed Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Member State
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Join Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Invitation Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Latest Program Activity Date
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allMembers as $member)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $member->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $member->email }}
                                            </td>
                                            <td class="px-6 py-4">{{ $member->external_id }}
                                            </td>
                                            </td>
                                            <td class="px-6 py-4">{{ $member->enrolled_courses }}
                                            </td>
                                            <td class="px-6 py-4">{{ $member->enrolled_courses }}</td>
                                            <td class="px-6 py-4">{{ $member->completed_courses }}</td>
                                            <td class="px-6 py-4">{{ $member->member_state }}</td>
                                            <td class="px-6 py-4">{{ $member->join_date }}</td>
                                            <td class="px-6 py-4">{{ $member->invitation_date }}</td>
                                            <td class="px-6 py-4">{{ $member->latest_program_activity_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal tous les memebres coursera à Kinshasa-->
                        <div id="members_kinshasa" role="tabpanel"
                            aria-labelledby="members_kinshasa p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="mytable_member_kinshasa"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            External Id
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Program Slug
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Enrolled Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Completed Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Member State
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Join Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Invitation Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Latest Program Activity Date
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membersKinshasa as $memberkin)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $memberkin->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $memberkin->email }}
                                            </td>
                                            <td class="px-6 py-4">{{ $memberkin->external_id }}
                                            </td>
                                            </td>
                                            <td class="px-6 py-4">{{ $memberkin->enrolled_courses }}
                                            </td>
                                            <td class="px-6 py-4">{{ $memberkin->enrolled_courses }}</td>
                                            <td class="px-6 py-4">{{ $memberkin->completed_courses }}</td>
                                            <td class="px-6 py-4">{{ $memberkin->member_state }}</td>
                                            <td class="px-6 py-4">{{ $memberkin->join_date }}</td>
                                            <td class="px-6 py-4">{{ $memberkin->invitation_date }}</td>
                                            <td class="px-6 py-4">{{ $memberkin->latest_program_activity_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal memebres coursera à lubumbashi -->

                        <div id="members_lubumbashi" role="tabpanel"
                            aria-labelledby="members_lubumbashi p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="mytable_member_lubumbashi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            External Id
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Program Slug
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Enrolled Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Completed Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Member State
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Join Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Invitation Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Latest Program Activity Date
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membersLubumbashi as $memberlubum)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $memberlubum->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $memberlubum->email }}
                                            </td>
                                            <td class="px-6 py-4">{{ $memberlubum->external_id }}
                                            </td>
                                            </td>
                                            <td class="px-6 py-4">{{ $memberlubum->enrolled_courses }}
                                            </td>
                                            <td class="px-6 py-4">{{ $memberlubum->enrolled_courses }}</td>
                                            <td class="px-6 py-4">{{ $memberlubum->completed_courses }}</td>
                                            <td class="px-6 py-4">{{ $memberlubum->member_state }}</td>
                                            <td class="px-6 py-4">{{ $memberlubum->join_date }}</td>
                                            <td class="px-6 py-4">{{ $memberlubum->invitation_date }}</td>
                                            <td class="px-6 py-4">{{ $memberlubum->latest_program_activity_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal memebres coursera à Matadi -->
                        <div id="members_matadi" role="tabpanel" aria-labelledby="members_matadi p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="mytable_member_matadi"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            External Id
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Program Slug
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Enrolled Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Completed Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Member State
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Join Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Invitation Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Latest Program Activity Date
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membersMatadi as $membermat)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $membermat->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $membermat->email }}
                                            </td>
                                            <td class="px-6 py-4">{{ $membermat->external_id }}
                                            </td>
                                            </td>
                                            <td class="px-6 py-4">{{ $membermat->enrolled_courses }}
                                            </td>
                                            <td class="px-6 py-4">{{ $membermat->enrolled_courses }}</td>
                                            <td class="px-6 py-4">{{ $membermat->completed_courses }}</td>
                                            <td class="px-6 py-4">{{ $membermat->member_state }}</td>
                                            <td class="px-6 py-4">{{ $membermat->join_date }}</td>
                                            <td class="px-6 py-4">{{ $membermat->invitation_date }}</td>
                                            <td class="px-6 py-4">{{ $membermat->latest_program_activity_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Main modal memebres coursera à kananga -->
                        <div id="members_kananga" role="tabpanel" aria-labelledby="members_kananga p-4 md:p-5 space-y-4"
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <table id="mytable_member_kananga"
                                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            External Id
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Program Slug
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Enrolled Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Completed Courses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Member State
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Join Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Invitation Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Latest Program Activity Date
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membersKananga as $memberkan)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $memberkan->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $memberkan->email }}
                                            </td>
                                            <td class="px-6 py-4">{{ $memberkan->external_id }}
                                            </td>
                                            </td>
                                            <td class="px-6 py-4">{{ $memberkan->enrolled_courses }}
                                            </td>
                                            <td class="px-6 py-4">{{ $memberkan->enrolled_courses }}</td>
                                            <td class="px-6 py-4">{{ $memberkan->completed_courses }}</td>
                                            <td class="px-6 py-4">{{ $memberkan->member_state }}</td>
                                            <td class="px-6 py-4">{{ $memberkan->join_date }}</td>
                                            <td class="px-6 py-4">{{ $memberkan->invitation_date }}</td>
                                            <td class="px-6 py-4">{{ $membermat->latest_program_activity_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal footer -->

                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('licencesCoursera') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>

                        <div class="px-8 mb-4">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                data-tabs-toggle="#default-tab-content"
                                data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="membersAll-tab"
                                        data-tabs-target="#membersAll" type="button" role="tab"
                                        aria-controls="membersAll" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tout
                                        afficher:
                                        {{ $coursera_members }}</button>
                                </li>

                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="members_kinshasa-tab"
                                        data-tabs-target="#members_kinshasa" type="button" role="tab"
                                        aria-controls="members_kinshasa" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kinshasa:
                                        {{ $membersKinshasa_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="members_lubumbashi-tab" data-tabs-target="#members_lubumbashi"
                                        type="button" role="tab" aria-controls="members_lubumbashi"
                                        aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Lubumbashi:
                                        {{ $membersLubumbashi_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="members_matadi-tab" data-tabs-target="#members_matadi" type="button"
                                        role="tab" aria-controls="members_matadi" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Matadi
                                        : {{ $membersMatadi_count }}</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="members_kananga-tab" data-tabs-target="#members_kananga" type="button"
                                        role="tab" aria-controls="members_kananga" aria-selected="false"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kananga
                                        : {{ $membersKananga_count }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal specialisation obtenues-->
        <div id="default-modal-obtenue"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Nombre de ceux qui ont obtenues leurs Specialisations
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-obtenue">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <div id="default-styled-tab-content3">
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile3"
                            role="tabpanel" aria-labelledby="profile-tab3">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow: auto;">
                                        <table id="mytable_obtenue"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Université
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation Complete
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Latest Program Activity Date
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getcompleteSpecialisation as $completeSpec)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->name }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->email }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->specialisaton }}
                                                        </td>
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->university }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->completed }}</td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->last_specialisation_activity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard3"
                            role="tabpanel" aria-labelledby="dashboard-tab3">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow: auto;">
                                        <table id="mytable_getcompKin"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Université
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation Complete
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Latest Program Activity Date
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getcompleteKin1 as $completeSpec)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->name }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->email }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->specialisaton }}
                                                        </td>
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->university }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->completed }}</td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->last_specialisation_activity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </strong>
                            </p>
                        </div>

                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings3"
                            role="tabpanel" aria-labelledby="settings-tab3">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow: auto;">
                                        <table id="mytable_getcompLub"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Université
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation Complete
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Latest Program Activity Date
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getcompleteLub1 as $completeSpec)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->name }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->email }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->specialisaton }}
                                                        </td>
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->university }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->completed }}</td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->last_specialisation_activity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </strong>
                            </p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings-mat3"
                            role="tabpanel" aria-labelledby="settings-tab3">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow: auto;">
                                        <table id="mytable_getcompMat"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Université
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation Complete
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Latest Program Activity Date
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getcompleteMat1 as $completeSpec)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->name }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->email }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->specialisaton }}
                                                        </td>
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->university }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->completed }}</td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->last_specialisation_activity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </strong>
                            </p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts3"
                            role="tabpanel" aria-labelledby="contacts-tab3">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong class="font-medium text-gray-800 dark:text-white">
                                    <div style="overflow: auto;">
                                        <table id="mytable_getcompKan"
                                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300 cell-border compact stripe"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Université
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Specialisation Complete
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Latest Program Activity Date
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getcompleteKan1 as $completeSpec)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->name }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->email }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->specialisaton }}
                                                        </td>
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->university }}
                                                        </td>
                                                        <td class="px-6 py-4">{{ $completeSpec->completed }}</td>
                                                        <td class="px-6 py-4">
                                                            {{ $completeSpec->last_specialisation_activity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </strong>
                            </p>
                        </div>
                    </div>


                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('complete_specialisation') }}" data-modal-hide="default-modal"
                            type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Experte en Excel</a>

                        <div class="px-16 mb-4">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab3"
                                data-tabs-toggle="#default-styled-tab-content3"
                                data-tabs-active-classes="text-orange-600 hover:text-orange-600 dark:text-orange-500 dark:hover:text-orange-500 border-orange-600 dark:border-orange-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab3"
                                        data-tabs-target="#styled-profile3" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">Tout afficher : {{ $getcomplete_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="dashboard-styled-tab3" data-tabs-target="#styled-dashboard3"
                                        type="button" role="tab" aria-controls="dashboard"
                                        aria-selected="false">Kinshasa : {{ $getcompleteKin_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-tab3" data-tabs-target="#styled-settings3" type="button"
                                        role="tab" aria-controls="settings" aria-selected="false">Lubumbashi :
                                        {{ $getcompleteLub_count }}</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="settings-styled-mat3" data-tabs-target="#styled-settings-mat3"
                                        type="button" role="tab" aria-controls="settings"
                                        aria-selected="false">Matadi : {{ $getcompleteMat_count }}</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="contacts-styled-tab3" data-tabs-target="#styled-contacts3" type="button"
                                        role="tab" aria-controls="contacts" aria-selected="false">Kananga :
                                        {{ $getcompleteKan_count }}</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    <section class="flex flex-wrap justify-evenly gap-2  lg:inset-0 h-[calc(100%-1rem)] mb-8">
        <div
            class=" bg-[#fcdab40a] dark:bg-gray-800 mb-4 p-5 rounded-lg w-1/2 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 lg:w-1/2 md:w-1/2">
            <div class="flex gap-5">
                <div class=" ">
                    <a href="{{ route('import.specialisations') }}" class=" flex items-center">
                        {{-- <span class="text-gray-800 lg:text-sm  dark:text-gray-200"></span> --}}
                        <button type="button"
                            class="text-white-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 
                        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">importer
                            le csv des specialisations</button>
                    </a>
                </div>
                <div>
                    <a href="{{ route('import.members') }}" class=" flex items-center">
                        {{-- <span class="text-gray-800 lg:text-sm  dark:text-gray-200"></span> --}}
                        <button type="button"
                            class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm 
                        px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">importer
                            le csv
                            des membres</button>
                    </a>
                </div>
                <div>
                    <a href="{{ route('import.usages') }}" class=" flex items-center">
                        <button type="button"
                            class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 
                        py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">importer
                            le csv des usages
                        </button>
                    </a>
                </div>
            </div>
            <div class="w-11/12">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="w-full max-w-sm m-4 flex justify-around gap-4 rounded-lg lg:w-1/2 md:w-1/2 p-2">
            <div class="min-w-full ">
                <div>
                    <h4 class="text-center mb-6 text-lg font-normal text-gray lg:text-2xl  dark:text-gray-400">
                        Statistiques
                        coursera
                    </h4>
                </div>
                <div style="width: 80%" class="text-left">
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block"
                        type="button">
                        <div style="width: 420px;"
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-left text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombre de licences en cours d'utilisation : <span
                                        class="text-[#36d4fc]">{{ $licence_en_cours_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    <button data-modal-target="default-modal2" data-modal-toggle="default-modal2" class="block"
                        type="button">
                        <div style="width: 420px;"
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-left text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres de ceux qui ont obtenu les certificats : <span
                                        class="text-[#36d4fc]">{{ $certificat_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    <button data-modal-target="default-modal3" data-modal-toggle="default-modal3" class="block"
                        type="button">
                        <div style="width: 420px;"
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-left text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres des personnes membres depuis 30 jours <br> et n'ont pas de certificat: <span
                                        class="text-[#36d4fc]">{{ $apprenants_30day_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>
                    <button data-modal-target="default-modal-obtenue" data-modal-toggle="default-modal-obtenue"
                        class="block" type="button">
                        <div style="width: 420px;"
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-left text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres de ceux qui ont obtenues leurs Specialisations: <span
                                        class="text-[#36d4fc]">{{ $completedSpecialisations }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    <button data-modal-target="default-modal4" data-modal-toggle="default-modal4" class="block"
                        type="button">
                        <div style="width: 420px;"
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-left text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres des personnes invitées depuis plus de 7 jours <br> et ne sont inscrit à
                                    aucun cours : <span class="text-[#36d4fc]">{{ $non_inscrit_cours_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>
                    {{-- Nombre des membres inactifs dépuis le 1er septembre --}}
                    <button data-modal-target="default-modal5" data-modal-toggle="default-modal5" class="block"
                        type="button">
                        <div style="width: 420px;"
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-left text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombre des membres inactifs dépuis le 1er septembre : <span
                                        class="text-[#36d4fc]">{{ $last_activity_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    {{-- taux d'utilisation des licences de 21 derniers jours --}}
                    <button data-modal-target="default-modal6" data-modal-toggle="default-modal6" class="block"
                        type="button">
                        <div style="width: 420px;"
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-left text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Taux d'utilisation des licences de 21 derniers jours : <span
                                        class="text-[#36d4fc]">{{ $taux }} %</span>
                                </p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>


    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            $(document).ready(function() {
                $('#mytable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                });
            });

            $(document).ready(function() {
                $('#mytable2').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                });
            });

            $(document).ready(function() {
                $('#mytable3').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                });
            });

            $(document).ready(function() {
                $('#mytable4').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                });
            });

            $(document).ready(function() {
                $('#mytable5').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                });
            });

            $(document).ready(function() {
                $('#mytable6').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                });
            });
            $(document).ready(function() {
                $('#mytable7').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                });
            });
            $(document).ready(function() {
                $('#mytable_member').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });
            $(document).ready(function() {
                $('#mytable_specialite').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#mytable_obtenue').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_getcompKin').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'specialisation_finies_Kinshasa',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });


            $(document).ready(function() {
                $('#mytable_member_kinshasa').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });


            $(document).ready(function() {
                $('#mytable_getcompKan').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'specialisation_finies_Kananga',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_member_lubumbashi').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });


            $(document).ready(function() {
                $('#mytable_getcompLub').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'specialisation_finies_Lubumbashi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_member_matadi').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_getcompMat').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'specialisation_finies_Matadi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_member_kananga').DataTable({
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_non_inscritKin').DataTable({
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'non_inscrit_cours_Kinshasa',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#licence_kinshasa').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'licence_en_cours_Kinshasa',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_non_inscritKan').DataTable({


                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'non_inscrit_cours_Kananga',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#licence_lubumbashi').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'licence_en_cours_Lubumbashi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_non_inscritMat').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'non_inscrit_cours_Matadi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#licence_matadi').DataTable({
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'licence_en_cours_Matadi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_non_inscritLub').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'non_inscrit_cours_Lubumbashi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#licence_kananga').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'licence_en_cours_kananga',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_last_activityLub').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'inactifs_depuis_1_sep_Lubumbashi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_last_activityKin').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'inactifs_depuis_1_sep_Kinshasa',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_last_activityMat').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'inactifs_depuis_1_sep_Matadi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_last_activityKan').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'inactifs_depuis_1_sep_Kananga',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_taux_utilKin').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'utilisateurs_Kinshasa',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_taux_utilkan').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'utilisateurs_Kananga',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_taux_utilmat').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'utilisateurs_Matadi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });

            $(document).ready(function() {
                $('#mytable_taux_utilub').DataTable({

                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'utilisateurs_Lubumbashi',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }],


                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                })
            });
            $(document).ready(function() {
                $('#certificat_kinshasa').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#certificat_matadi').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#certificat_lubumbashi').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#certificat_kananga').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#30day_kinshasa').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#30day_matadi').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#30day_kananga').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#30day_lubumbashi').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
            $(document).ready(function() {
                $('#total_cours').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    },
                    "dom": 'Bfrtip', // Ajouter les boutons
                    "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exporter en Excel',
                        title: 'Données Exportées',
                        exportOptions: {
                            columns: ':visible' // Exporter toutes les colonnes visibles
                        }
                    }]
                })
            });
        </script>

        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: {!! json_encode($datasets) !!}
                },
            });
        </script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    @endsection
</x-app-layout>
