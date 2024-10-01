<x-app-layout>

    <div class=" mt-4">
        <h4
            class="mb-8 text-3xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-white text-center">
            Les rapports des activités coursera
        </h4>
        {{-- <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
            Chez Orange, nous nous concentrons sur les marchés où la technologie, l'innovation et le capital peuvent
            générer de la valeur à long terme et stimuler la croissance économique.</p> --}}
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
            <a href="">
                <div class="">
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                        Nombre total des cours sur coursera : <span id="count"
                            class="text-[#fcdf3f]">{{ $nombre_cours }}</span>
                    </h3>
                    <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                        nombre de cours accessibles sur coursera.</p>
                </div>
            </a>
        </div>
    </section>


    @section('modal')
        <!-- Main modal licences en cours d'utilisations -->
        <div id="default-modal"
            class=" dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('licencesCoursera') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>
                        <button data-modal-target="default-modal-licence-kinshasa"
                            data-modal-toggle="default-modal-licence-kinshasa" data-modal-hide="default-modal"
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kinshasa:
                            {{ $licenceKinEnCours_count }}</button>
                        <button data-modal-target="default-modal-licence-lubumbashi"
                            data-modal-toggle="default-modal-licence-lubumbashi" data-modal-hide="default-modal"
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Lubumbashi:
                            {{ $licenceLubEnCours_count }}</button>
                        <button data-modal-target="default-modal-licence-matadi"
                            data-modal-toggle="default-modal-licence-matadi" data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Matadi
                            : {{ $licenceMatEnCours_count }}</button>
                        <button data-modal-target="default-modal-licence-kananga"
                            data-modal-toggle="default-modal-licence-kananga" data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kananga
                            : {{ $licenceKanEnCours_count }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal licences en cours d'utilisations à Kinshasa -->
        <div id="default-modal-licence-kinshasa" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Licences en cours d'utilisation à Kinshasa
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
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="licence_kinshasa"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>
        <!-- Main modal licences en cours d'utilisations à Lubumbashi -->
        <div id="default-modal-licence-lubumbashi" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Licences en cours d'utilisation à Lubumbashi
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
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="licence_lubumbashi"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>
        {{-- licences en cours d'utilisation à Matadi --}}
        <div id="default-modal-licence-matadi" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Licences en cours d'utilisation à Matadi
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
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="licence_matadi"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>
         <!-- Main modal licences en cours d'utilisations à kananga -->
        <div id="default-modal-licence-kananga" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Licences en cours d'utilisation à Kinshasa
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
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="licence_kananga"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal Nombres de ceux qui ont obtenu les certificats -->
        <div id="default-modal2" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable2"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('certificatscursera') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal3"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable3"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('membre_30days') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal4"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Nombres des personnes invitées depuis plus de 7 jours et ne sont inscrits à aucun cours :
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
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable4"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>

                                    <th scope="col" class="px-6 py-3">Cours</th>

                                    <th scope="col" class="px-6 py-3">
                                        Université
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
                                            {{ $inscrit->course_slug }}
                                        </td>

                                        <td class="px-6 py-4">{{ $inscrit->university }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('non_inscrit_coursera') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>

                            <button data-modal-target="default-non_inscritKin" data-modal-toggle="default-non_inscritKin"
                            data-modal-hide="default-modal4" class="block" type="button">
                            <div
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Kinshasa : {{ $non_inscritKin_count }}
                            </div>
                        </button>

                        <button data-modal-target="default-non_inscritKan" data-modal-toggle="default-non_inscritKan"
                            data-modal-hide="default-modal4" class="block" type="button">
                            <div
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Kananga : {{ $non_inscritKan_count }}
                            </div>
                        </button>


                        <button data-modal-target="default-non_inscritLub" data-modal-toggle="default-non_inscritLub"
                            data-modal-hide="default-modal4" class="block" type="button">
                            <div
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Lubumbashi : {{ $non_inscritLub_count }}
                            </div>
                        </button>

                        <button data-modal-target="default-non_inscritKin" data-modal-toggle="default-non_inscritKin"
                        data-modal-hide="default-modal4" class="block" type="button">
                        <div
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                        dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Matadi : {{ $non_inscritMat_count }}
                        </div>
                    </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal5"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable5"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                                @foreach ($last_activity as $member)
                                    <tr>
                                        <td class="px-6 py-4">
                                            {{ $member->name }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $member->email }}

                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $member->course_slug }}
                                        </td>

                                        <td class="px-6 py-4">{{ $member->university }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('last_activity') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal6" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable6"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('taux_utilisation') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Experte en Excel</a>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal les specialites coursera-->
        <div id="default-modal-specialite" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Specialisation
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allSpecialisations as $specialite)
                                    <tr>
                                        <td class="px-6 py-4">
                                            {{ $specialite->specialisaton }}
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

        <!-- Main modal memebres coursera-->
        <div id="default-modal-member" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                    <div class="relative overflow-x-auto">
                        <table id="mytable_member"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('licencesCoursera') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Exporte en Excel</a>
                        <button data-modal-target="default-modal-member-kinshasa"
                            data-modal-toggle="default-modal-member-kinshasa" data-modal-hide="default-modal"
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kinshasa:
                            {{ $membersKinshasa_count }}</button>
                        <button data-modal-target="default-modal-member-lubumbashi"
                            data-modal-toggle="default-modal-member-lubumbashi" data-modal-hide="default-modal"
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Lubumbashi:
                            {{ $membersLubumbashi_count }}</button>
                        <button data-modal-target="default-modal-member-Matadi"
                            data-modal-toggle="default-modal-member-Matadi" data-modal-hide="default-modal"
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Matadi
                            : {{ $membersMatadi_count }}</button>
                        <button data-modal-target="default-modal-member-kananga"
                            data-modal-toggle="default-modal-member-kananga" data-modal-hide="default-modal"
                            type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kananga
                            : {{ $membersKananga_count }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main modal memebres coursera à kinshasa -->
        <div id="default-modal-member-kinshasa" dark:text-gray-300
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Membres du programme coursera à Kinshasa
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
                    <!-- Modal body -->
                    <div class="relative overflow-x-auto">
                        <table id="mytable_member_kinshasa"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>
        <!-- Main modal memebres coursera à lubumbashi -->
        <div id="default-modal-member-lubumbashi" dark:text-gray-300
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Membres du programme coursera à Lubumbashi
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
                    <!-- Modal body -->
                    <div class="relative overflow-x-auto">
                        <table id="mytable_member_lubumbashi"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal memebres coursera à Matadi -->
        <div id="default-modal-member-Matadi" dark:text-gray-300
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Membres du programme coursera à Matadi
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
                    <!-- Modal body -->
                    <div class="relative overflow-x-auto">
                        <table id="mytable_member_matadi"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal memebres coursera à kananga -->
        <div id="default-modal-member-kananga" dark:text-gray-300
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Membres du programme coursera à Kananga
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
                    <!-- Modal body -->
                    <div class="relative overflow-x-auto">
                        <table id="mytable_member_kananga"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>
        <!-- Main modal specialisation obtenues-->
        <div id="default-modal-obtenue" dark:text-gray-300
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Nombres de ceux qui ont obtenues leurs Specialisations
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-obtenue">
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
                        <table id="mytable_obtenue"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                                        <td class="px-6 py-4">{{ $completeSpec->last_specialisation_activity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a href="{{ route('complete_specialisation') }}" data-modal-hide="default-modal" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#FF7322] text-white hover:bg-[#FF6822] focus:outline-none focus:bg-[#FF6822] disabled:opacity-50 disabled:pointer-events-none">
                            Experte en Excel</a>

                        <button data-modal-target="default-getcompKin" data-modal-toggle="default-getcompKin"
                            data-modal-hide="default-modal-obtenue" class="block" type="button">
                            <div
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Kinshasa : {{ $getcompleteKin_count }}
                            </div>
                        </button>

                        <button data-modal-target="default-getcompKan" data-modal-toggle="default-getcompKan"
                            data-modal-hide="default-modal-obtenue" class="block" type="button">
                            <div
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Kananga : {{ $getcompleteKan_count }}
                            </div>
                        </button>


                        <button data-modal-target="default-getcompLub" data-modal-toggle="default-getcompLub"
                            data-modal-hide="default-modal-obtenue" class="block" type="button">
                            <div
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Lubumbashi : {{ $getcompleteLub_count }}
                            </div>
                        </button>

                        <button data-modal-target="default-getcompMat" data-modal-toggle="default-getcompMat"
                        data-modal-hide="default-modal-obtenue" class="block" type="button">
                        <div
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                        dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Matadi : {{ $getcompleteMat_count }}
                        </div>
                    </button>

                    </div>
                </div>
            </div>
        </div>


        <div id="default-getcompKin" 
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de Kinshasa qui ont fini leur parcours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-getcompKin">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_getcompKin"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                                        <td class="px-6 py-4">{{ $completeSpec->last_specialisation_activity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>


        <div id="default-getcompLub"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de Lubumbashi qui ont fini leur parcours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-getcompLub">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_getcompLub"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                                        <td class="px-6 py-4">{{ $completeSpec->last_specialisation_activity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>

        <div id="default-getcompKan"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de kananga qui ont fini leur parcours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-getcompKan">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_getcompKan"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                                        <td class="px-6 py-4">{{ $completeSpec->last_specialisation_activity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>

        <div id="default-getcompMat"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de Matadi qui ont fini leur parcours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-getcompMat">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_getcompMat"
                            class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
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
                                        <td class="px-6 py-4">{{ $completeSpec->last_specialisation_activity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>



        <div id="default-non_inscritKin"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de Kinshasa qui sont invités et ne  sont inscrit à aucun cours depuis 7 jours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-non_inscritKin">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_non_inscritKin"
                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>

                        <th scope="col" class="px-6 py-3">Cours</th>

                        <th scope="col" class="px-6 py-3">
                            Université
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
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>


        <div id="default-non_inscritKan"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de Kananga qui sont invités et ne  sont inscrit à aucun cours depuis 7 jours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-non_inscritKan">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_non_inscritKan"
                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>

                        <th scope="col" class="px-6 py-3">Cours</th>

                        <th scope="col" class="px-6 py-3">
                            Université
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
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>


        <div id="default-non_inscritLub"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de Lubumbashi qui sont invités et ne  sont inscrit à aucun cours depuis 7 jours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-non_inscritLub">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_non_inscritLub"
                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>

                        <th scope="col" class="px-6 py-3">Cours</th>

                        <th scope="col" class="px-6 py-3">
                            Université
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
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>


        <div id="default-non_inscritMat"
            class="dark:text-gray-300 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl lg:max-w-6xl xl:max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Ceux de Matadi qui sont invités et ne  sont inscrit à aucun cours depuis 7 jours
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-non_inscritMat">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <table id="mytable_non_inscritMat"
                class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300"
                style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>

                        <th scope="col" class="px-6 py-3">Cours</th>

                        <th scope="col" class="px-6 py-3">
                            Université
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
                    </div>
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>
    @endsection


    <section class="flex justify-between p-4 gap-4 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mb-8">
        <div
            class=" bg-[#fcdab40a] dark:bg-gray-800 mb-4 p-5 rounded-lg w-1/2 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 ">
            <div class="flex gap-5">
                <div class=" ">
                    <a href="{{ route('import.specialisations') }}" class=" flex items-center">
                        {{-- <span class="text-gray-800 lg:text-sm  dark:text-gray-200"></span> --}}
                        <button type="button"
                            class="text-white-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 
                        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">import
                            specialisation csv</button>
                    </a>
                </div>
                <div>
                    <a href="{{ route('import.members') }}" class=" flex items-center">
                        {{-- <span class="text-gray-800 lg:text-sm  dark:text-gray-200"></span> --}}
                        <button type="button"
                            class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm 
                        px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">import
                            members csv</button>
                    </a>
                </div>
                <div>
                    <a href="{{ route('import.usages') }}" class=" flex items-center">
                        <button type="button"
                            class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 
                        py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">import
                            usages csv</button>
                    </a>
                </div>
            </div>
            <div class="w-11/12">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="m-4 flex justify-around gap-4 rounded-lg">
            <div class="min-w-full ">
                <div>
                    <h4 class="mb-6 text-lg font-normal text-gray lg:text-2xl  dark:text-gray-400">Statistiques
                        coursera
                    </h4>
                </div>
                <div>
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block"
                        type="button">
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombre de licences en cours d'utilisation : <span
                                        class="text-[#36d4fc]">{{ $licence_en_cours_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    <button data-modal-target="default-modal2" data-modal-toggle="default-modal2" class="block"
                        type="button">
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres de ceux qui ont obtenu les certificats : <span
                                        class="text-[#36d4fc]">{{ $certificat_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    <button data-modal-target="default-modal3" data-modal-toggle="default-modal3" class="block"
                        type="button">
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres des personnes membres depuis 30 jours <br> et n'ont pas de certificat: <span
                                        class="text-[#36d4fc]">{{ $apprenants_30day_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>
                    <button data-modal-target="default-modal-obtenue" data-modal-toggle="default-modal-obtenue"
                        class="block" type="button">
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres de ceux qui ont obtenues leurs Specialisations: <span
                                        class="text-[#36d4fc]">{{ $completedSpecialisations }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    <button data-modal-target="default-modal4" data-modal-toggle="default-modal4" class="block"
                        type="button">
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres des personnes invitées depuis plus de 7 jours <br> et ne sont inscrit à
                                    aucun cours : <span class="text-[#36d4fc]">{{ $non_inscrit_cours_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>
                    {{-- Nombre des membres inactifs dépuis le 1er septembre --}}
                    <button data-modal-target="default-modal5" data-modal-toggle="default-modal5" class="block"
                        type="button">
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombre des membres inactifs dépuis le 1er septembre : <span
                                        class="text-[#36d4fc]">{{ $last_activity_count }}</span>
                                </p>
                            </div>
                        </div>
                    </button>

                    {{-- taux d'utilisation des licences de 21 derniers jours --}}
                    <button data-modal-target="default-modal6" data-modal-toggle="default-modal6" class="block"
                        type="button">
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href=""
                                    class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
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
    <section p-1.5 min-w-full inline-block align-middle>
        <div class="  p-4 sm:px-6 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="bg-[#fcdab40a] border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-[#1e293b62] dark:border-neutral-700">
                            <!-- Header -->

                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

    </section>

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            $(document).ready(function() {
                $('#mytable').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                });
            });

            $(document).ready(function() {
                $('#mytable2').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                });
            });

            $(document).ready(function() {
                $('#mytable3').DataTable({
                    "fixedColumns": {
                        "start": 3
                    }
                });
            });

            $(document).ready(function() {
                $('#mytable4').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                });
            });

            $(document).ready(function() {
                $('#mytable5').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                });
            });

            $(document).ready(function() {
                $('#mytable6').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                });
            });
            $(document).ready(function() {
                $('#mytable7').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                });
            });
            $(document).ready(function() {
                $('#mytable_member').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                })
            });
            $(document).ready(function() {
                $('#mytable_specialite').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                })
            });
            $(document).ready(function() {
                $('#mytable_obtenue').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                })
            });
            
            $(document).ready(function() {
                $('#mytable_getcompKin').DataTable({
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
                $('#mytable_member_kinshasa').DataTable({

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
                $('#mytable_getcompKan').DataTable({
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
                $('#mytable_member_lubumbashi').DataTable({
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
                $('#mytable_getcompLub').DataTable({
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
                $('#mytable_member_matadi').DataTable({
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
                $('#mytable_getcompMat').DataTable({
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
                $('#mytable_member_kananga').DataTable({

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
                $('#mytable_non_inscritKin').DataTable({
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
                $('#licence_kinshasa').DataTable({

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
                $('#mytable_non_inscritKan').DataTable({
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
                $('#licence_lubumbashi').DataTable({

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
                $('#mytable_non_inscritMat').DataTable({
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
                $('#licence_matadi').DataTable({

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
                $('#mytable_non_inscritLub').DataTable({
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
                $('#licence_kananga').DataTable({
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
