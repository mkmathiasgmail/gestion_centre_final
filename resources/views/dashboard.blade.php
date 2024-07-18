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

    <section class=" mt-4 bg-no-repeat">
        <div class=" flex  2xl:flex-row xl:flex-row  gap-10 backdrop-opacity-1 overflow-hidden p-4">
            <div class=" mb-10 ">
                <div class="flex h-auto gap-4 mb-4">
                    <div
                        class=" h-auto   rounded-lg shadow-lg  dark:shadow-gray-500/20 backdrop-blur-xl bg-cover  bg-[url('https://wallpaperswide.com/download/firewatch_inspired-wallpaper-720x1280.jpg')] dark:bg-[url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0yMThiYXRjaDcta2F0aWUtNTEuanBn.jpg')] hover:scale-110 transition duration-700 ease-in-out">
                        <div class="flex items-center gap-10 p-4">
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
                                <h3 class="text-md font-semibold text-gray-700 dark:text-gray-200">
                                    Activité totale enregistrée 30 dernier jours {{ $data->sum('aggregate') }}
                                </h3>
                                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                                    Number of activitity registered in the last 30 days.
                                </p>
                            </div>

                            <div id="circle"></div>
                        </div>


                    </div>

                    <div
                        class=" flex  items-center gap-10 p-4 rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover  bg-[url('https://wallpaperswide.com/download/firewatch_inspired-wallpaper-720x1280.jpg')] dark:bg-[url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0yMThiYXRjaDcta2F0aWUtNTEuanBn.jpg')] hover:scale-110 transition duration-700 ease-in-out">
                        <div>
                            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                                <path
                                    d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                            </svg>

                        </div>
                        <div>
                            <h3
                                class="text-lg font-semibold text-gray-700 dark:text-gray-200 ">
                                Total des activités enregistrées <span id="count">{{ $activites->count() }}</span>
                            </h3>
                            <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                                Number of activities registered in the last 3 </p>
                        </div>

                        <div id="circle2"></div>


                    </div>
                    <div
                        class="rounded-xl shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover  bg-[url('https://wallpaperswide.com/download/firewatch_inspired-wallpaper-720x1280.jpg')] dark:bg-[url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0yMThiYXRjaDcta2F0aWUtNTEuanBn.jpg')] hover:scale-110 transition duration-700 ease-in-out">
                        <div class=" flex gap-10 items-center  p-4">
                            <div class="">
                                <svg class=" w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                            <div class="">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    Nombre total d'utilisateurs enregistrés <span
                                        id="count">{{ $user->count() }}</span>
                                </h3>
                                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                                    Number of activities registered in the last 3 </p>
                            </div>

                            <div id="circle3"></div>
                        </div>


                    </div>

                </div>

                <div class="rounded-lg shadow-lg dark:shadow-lg dark:shadow-cyan-100/20">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Total registered activites
                        </h3>
                    </div>
                    <div>
                        <canvas id="myChart2"></canvas>

                    </div>

                </div>
            </div>
            <div class=" flex gap-10 p-5">
                <div class=" p-4 rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Total registered activites
                        </h3>
                    </div>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>


    @section('script')
        <script>
            $(document).ready(function() {
                let value = document.getElementById('count')
                $('#circle').circleProgress({
                    value: 0.75,
                    size: 80,
                    fill: {
                        gradient: ["blue", "orange", "red"]
                    }
                });

                $('#circle2').circleProgress({
                    value: 0.85,
                    size: 80,
                    fill: {
                        gradient: ["yellow", "orange", "red"]
                    }
                });

                $('#circle3').circleProgress({
                    value: 0.85,
                    size: 80,
                    fill: {
                        gradient: ["yellow", "orange", "red"]
                    }
                });
            })
        </script>



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <script>
            const ctx = document.getElementById('myChart');
            const ctx2 = document.getElementById('myChart2');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: @json($data->map(fn($data) => $data->date)),
                    datasets: [{
                        label: 'Registered activity in the last 30 days',
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(205, 125, 186)',
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


            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: @json($data->map(fn($data) => $data->date)),
                    datasets: [{
                        label: 'Registered activity in the last 30 days',
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(205, 125, 186)',
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
