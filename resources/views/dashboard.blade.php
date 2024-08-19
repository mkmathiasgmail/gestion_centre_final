<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class=" mt-4">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-white">
            Tableau de Bord Administratif
        </h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
            Supervision Complète : Activités, Apprenants, Employabilité et Présence</p>
    </div>

    <section class=" flex justify-between p-4 gap-4 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mb-8">

        <div
            class=" h-36  flex  items-center  p-1 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">
            <div>
                <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                    <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                </svg>

            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 ">
                    Total des activités enregistrées : <span id="count" class="text-[#ff9822]">
                        {{ $activites->count() }}</span>
                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    Toutes les activites enregistre</p>
            </div>
        </div>
        <div
            class=" flex p-2 h-36 w-full items-center  rounded-lg shadow-lg  dark:shadow-gray-500/20 backdrop-blur-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700  hover:scale-105 transition duration-700 ease-in-out hover:bg-[#f8f0e7] hover:text-black border-l-8 border-[#ff9822] hover:border-l-10 ">

            <div>
                <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M5.617 2.076a1 1 0 0 1 1.09.217L8 3.586l1.293-1.293a1 1 0 0 1 1.414 0L12 3.586l1.293-1.293a1 1 0 0 1 1.414 0L16 3.586l1.293-1.293A1 1 0 0 1 19 3v18a1 1 0 0 1-1.707.707L16 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L12 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L8 20.414l-1.293 1.293A1 1 0 0 1 5 21V3a1 1 0 0 1 .617-.924ZM9 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                        clip-rule="evenodd" />
                </svg>

            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                    Activité totale enregistrée 30 dernier jours : <span class="text-[#ff9822]">

                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    Number of activitity registered in the last 30 days.
                </p>
            </div>

        </div>
        <div
            class=" flex p-2 h-36 w-full items-center  rounded-lg shadow-lg  dark:shadow-gray-500/20 backdrop-blur-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700  hover:scale-105 transition duration-700 ease-in-out hover:bg-[#f8f0e7] hover:text-black border-l-8 border-[#ff9822] hover:border-l-10 ">

            <div>
                <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M5.617 2.076a1 1 0 0 1 1.09.217L8 3.586l1.293-1.293a1 1 0 0 1 1.414 0L12 3.586l1.293-1.293a1 1 0 0 1 1.414 0L16 3.586l1.293-1.293A1 1 0 0 1 19 3v18a1 1 0 0 1-1.707.707L16 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L12 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L8 20.414l-1.293 1.293A1 1 0 0 1 5 21V3a1 1 0 0 1 .617-.924ZM9 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                        clip-rule="evenodd" />
                </svg>

            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                    Activité totale enregistrée 30 dernier jours : <span class="text-[#ff9822]">

                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    Number of activitity registered in the last 30 days.
                </p>
            </div>

        </div>
        <div
            class="rounded-xl flex gap-1 items-center  p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700   hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">

            <div class="">
                <svg class=" w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                        clip-rule="evenodd" />
                </svg>

            </div>
            <div class="">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    Nombre total d'utilisateurs enregistrés : <span id="count"
                        class="text-[#ff9822]">{{ $user->count() }}</span>
                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    Number of activities registered in the last 3 </p>
            </div>

        </div>
    </section>

    <section class="flex justify-between p-4 gap-4 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mb-8">

        <div
            class=" bg-[#fcdab40a] dark:bg-gray-800 p-5 rounded-lg w-1/2 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 ">
            <div class=" flex gap-5">
                <div class=" ">
                    <a href="{{ route('activites.create') }}" class=" flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857ZM18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z"
                                clip-rule="evenodd" />
                        </svg>



                        <span class="text-gray-800 lg:text-sm  dark:text-gray-200">Ajouter une activite</span>

                    </a>
                </div>
                <div>
                    <a href="{{ route('rapportSemestriel.index') }}" class=" flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>


                        <span class="text-gray-800 lg:text-sm  dark:text-gray-200">Genere Rapport</span>

                    </a>
                </div>

            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class=" flex justify-between gap-4 rounded-lg w-1/2">
            <div class=" w-1/2">
                <div>
                    <h3 class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">Recent activite
                        storage</h3>
                </div>
                <div>
                    @foreach ($data as $i => $item)
                        <div
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">

                            <a href="{{ route('activites.show', $item->id) }}"
                                class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">{{ substr($item->title, 0, 50) }}...</a>

                        </div>
                    @endforeach
                </div>

            </div>

            <div class=" w-1/2">
                <div class=" m-4 ">
                    <canvas id="myChart2"></canvas>
                </div>


            </div>


        </div>

    </section>

    <!-- Table Section -->
    <div class="  p-4 sm:px-6 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Activités en cours cette semaine (Lundi - Samedi)
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Découvrez les événements et activités prévus du lundi au samedi
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                        <button id="hs-as-table-table-export-dropdown" type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                <polyline points="7 10 12 15 17 10" />
                                                <line x1="12" x2="12" y1="15" y2="3" />
                                            </svg>
                                            Export
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="hs-as-table-table-export-dropdown">
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span
                                                    class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                                    Options
                                                </span>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                    href="#">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <rect width="8" height="4" x="8" y="2"
                                                            rx="1" ry="1" />
                                                        <path
                                                            d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                                                    </svg>
                                                    Copy
                                                </a>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                    href="#">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="6 9 6 2 18 2 18 9" />
                                                        <path
                                                            d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                                        <rect width="12" height="8" x="6" y="14" />
                                                    </svg>
                                                    Print
                                                </a>
                                            </div>
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span
                                                    class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                                    Download options
                                                </span>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                    href="#">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                                        <path
                                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                    </svg>
                                                    Excel
                                                </a>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                    href="#">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z" />
                                                    </svg>
                                                    .CSV
                                                </a>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                    href="#">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                        <path
                                                            d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                                    </svg>
                                                    .PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                        <button id="hs-as-table-table-filter-dropdown" type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18" />
                                                <path d="M7 12h10" />
                                                <path d="M10 18h4" />
                                            </svg>
                                            Filter
                                            <span
                                                class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-neutral-700 dark:text-neutral-300">
                                                2
                                            </span>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="hs-as-table-table-filter-dropdown">
                                            <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                <label for="hs-as-filters-dropdown-frequency"
                                                    class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-frequency" checked>
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Frequency</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-status" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-status" checked>
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Status</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-created" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-created">
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Created</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-due-date" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-due-date">
                                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Due
                                                        Date</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-amount">
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Amount</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Download all
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <a class="group inline-flex items-center gap-x-2 text-xs font-semibold uppercase text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                            href="#">
                                            Titre
                                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m7 15 5 5 5-5" />
                                                <path d="m7 9 5-5 5 5" />
                                            </svg>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <a class="group inline-flex items-center gap-x-2 text-xs font-semibold uppercase text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                            href="#">
                                            Categorie
                                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m7 15 5 5 5-5" />
                                                <path d="m7 9 5-5 5 5" />
                                            </svg>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <a class="group inline-flex items-center gap-x-2 text-xs font-semibold uppercase text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                            href="#">
                                            Statut
                                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m7 15 5 5 5-5" />
                                                <path d="m7 9 5-5 5 5" />
                                            </svg>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <a class="group inline-flex items-center gap-x-2 text-xs font-semibold uppercase text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                            href="#">
                                            Date debut
                                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m7 15 5 5 5-5" />
                                                <path d="m7 9 5-5 5 5" />
                                            </svg>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <a class="group inline-flex items-center gap-x-2 text-xs font-semibold uppercase text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                            href="#">
                                            Date fin
                                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m7 15 5 5 5-5" />
                                                <path d="m7 9 5-5 5 5" />
                                            </svg>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($activityForWeekend as $item)
                                    <tr
                                        class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                                        <td scope="col" class="px-6 py-3">
                                            {{ $item->title }}

                                        </td>

                                        <td scope="col" class="px-6 py-3">
                                            {{ $item->categorie->name }}

                                        </td>

                                        <td scope="col" class="px-6 py-3">
                                            {{ $item->status ? '✔️' : '⭕️' }}
                                        </td>

                                         <td scope="col" class="px-6 py-3">
                                            {{ $item->start_date }}
                                        </td>

                                        <td scope="col" class="px-6 py-3">
                                            {{ $item->end_date }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    <span
                                        class="font-semibold text-gray-800 dark:text-neutral-200">{{ $activityForWeekend->count() }}</span>
                                    results
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6" />
                                        </svg>
                                        Prev
                                    </button>

                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                        Next
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const data = {
                labels: ['Hommes', 'Femmes'],
                datasets: [{
                    label: 'Participation',
                    data: [{{ $hommes }}, {{ $femmes }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // Bleu pour les hommes
                        'rgba(255, 99, 132, 0.2)' // Rose pour les femmes
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', // Bordure bleue pour les hommes
                        'rgba(255, 99, 132, 1)' // Bordure rose pour les femmes
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Participation des Hommes et des Femmes (7 Derniers Jours)'
                        }
                    }
                },
            };

            const myChart = new Chart(
                document.getElementById('myChart2'),
                config
            );



            let ctx = document.getElementById("myChart").getContext('2d');

            var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
            gradientStroke.addColorStop(0, "#ff6c00");
            gradientStroke.addColorStop(1, "#ff3b74");

            var gradientBkgrd = ctx.createLinearGradient(0, 100, 0, 400);
            gradientBkgrd.addColorStop(0, "rgba(244,94,132,0.2)");
            gradientBkgrd.addColorStop(1, "rgba(249,135,94,0)");

            let draw = Chart.controllers.line.prototype.draw;
            Chart.controllers.line = Chart.controllers.line.extend({
                draw: function() {
                    draw.apply(this, arguments);
                    let ctx = this.chart.chart.ctx;
                    let _stroke = ctx.stroke;
                    ctx.stroke = function() {
                        ctx.save();
                        //ctx.shadowColor = 'rgba(244,94,132,0.8)';
                        ctx.shadowBlur = 8;
                        ctx.shadowOffsetX = 0;
                        ctx.shadowOffsetY = 6;
                        _stroke.apply(this, arguments)
                        ctx.restore();
                    }
                }
            });




            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',


                data: {
                    labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar", "Apr"],
                    datasets: [{
                        label: "Income",
                        backgroundColor: gradientBkgrd,
                        borderColor: gradientStroke,
                        data: [5500, 2500, 10000, 6000, 14000, 1500, 7000, 20000],
                        pointBorderColor: "rgba(255,255,255,0)",
                        pointBackgroundColor: "rgba(255,255,255,0)",
                        pointBorderWidth: 0,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: gradientStroke,
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 4,
                        pointRadius: 1,
                        borderWidth: 5,
                        pointHitRadius: 16,
                    }]
                },

                // Configuration options go here
                options: {
                    tooltips: {
                        backgroundColor: '#fff',
                        displayColors: false,
                        titleFontColor: '#000',
                        bodyFontColor: '#000'

                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return (value / 1000) + 'K';
                                }
                            }
                        }],
                    }
                }
            });
        </script>
    @endsection



</x-app-layout>
