<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class=" mt-4">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-white">
            Activité enregistrée au cours des 30 derniers jours
        </h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
            Chez Orange, nous nous concentrons sur les marchés où la technologie, l'innovation et le capital peuvent
            générer de la valeur à long terme et stimuler la croissance économique.</p>
    </div>

    <section class=" flex justify-between p-4 gap-4 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mb-8">

        <div
            class=" h-36  flex  items-center  p-1 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-white dark:bg-gray-800 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">
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
            class=" flex p-2 h-36 w-full items-center  rounded-lg shadow-lg  dark:shadow-gray-500/20 backdrop-blur-xl bg-white dark:bg-gray-800 dark:hover:bg-gray-700  hover:scale-105 transition duration-700 ease-in-out hover:bg-[#f8f0e7] hover:text-black border-l-8 border-[#ff9822] hover:border-l-10 ">

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
                        {{ $data1->sum('aggregate') }}</span>
                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    Number of activitity registered in the last 30 days.
                </p>
            </div>

        </div>
        <div
            class="rounded-xl flex gap-1 items-center  p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-white dark:bg-gray-800 dark:hover:bg-gray-700   hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">

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
            class=" bg-[#fffcf883] dark:bg-gray-800 p-5 rounded-lg w-1/2 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 ">
            <div class=" flex gap-5">
                <div class=" ">
                    <a href="{{route('activites.create')}}" class=" flex items-center">
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
                    <a href="{{route('rapportSemestriel.index')}}" class=" flex items-center">
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
                            class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fffcf883] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">

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

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');
            const ctx2 = document.getElementById('myChart2');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($data1->map(fn($data) => $data->date)),
                    datasets: [{
                        label: 'Registered activity in the last 30 days',
                        backgroundColor: [
                            '#ff98225d',
                            '#ff982228'
                        ],

                        data: @json($data1->map(fn($data) => $data->aggregate)),
                    }]
                },
                options: {
                    animations: {
                        tension: {
                            duration: 5000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        },
                        scales: {
                            y: {
                                min: 40,
                                max: 100
                            }
                        }
                    }
                }
            });

            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: @json($data1->map(fn($data) => $data->date)),
                    datasets: [{
                        label: 'Registered activity in the last 30 days',
                        backgroundColor: [
                            '#ff98225d',
                            '#ff982228'
                        ],

                        data: @json($data->map(fn($data) => $data->aggregate)),
                    }]
                },
                options: {
                    animations: {
                        tension: {
                            duration: 5000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        },
                        scales: {
                            y: {
                                min: 0,
                                max: 100
                            }
                        }
                    }
                }
            });
        </script>
    @endsection



</x-app-layout>
