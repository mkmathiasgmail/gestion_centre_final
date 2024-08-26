<x-app-layout>
    
    <div class=" mt-4">
        <h4
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-white text-center">
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
                <svg class="w-12 h-12 m-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                    <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                </svg>

            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 ">
                    Total des participants : <span id="count" class="text-[#fcdf3f]">{{$coursera_members->total}}
                        </span>
                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    nombre des personnes participant aux formations coursera.</p>
            </div>
        </div>
        <div
            class=" flex p-2 h-36 w-full items-center  rounded-lg shadow-lg  dark:shadow-gray-500/20 backdrop-blur-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-700  hover:scale-105 transition duration-700 ease-in-out hover:bg-[#f8f0e7] hover:text-black border-l-8 border-[#ff9822] hover:border-l-10 ">

            <div>
                <svg class="w-12 h-12 m-4 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M5.617 2.076a1 1 0 0 1 1.09.217L8 3.586l1.293-1.293a1 1 0 0 1 1.414 0L12 3.586l1.293-1.293a1 1 0 0 1 1.414 0L16 3.586l1.293-1.293A1 1 0 0 1 19 3v18a1 1 0 0 1-1.707.707L16 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L12 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L8 20.414l-1.293 1.293A1 1 0 0 1 5 21V3a1 1 0 0 1 .617-.924ZM9 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                        clip-rule="evenodd" />
                </svg>

            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                    Total des specialisations : <span class="text-[#fcdf3f]">{{$specialisationsCount}}
                        </span>
                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    nombre des spécialisations disponible sur coursera.
                </p>
            </div>

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
            <div class="">
                <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                    Nombre total des cours sur coursera : <span id="count"
                        class="text-[#fcdf3f]">{{$coursera_usages->total}}</span>
                </h3>
                <p class="text-sm font-normal text-gray-400 dark:text-gray-400">
                    nombre de cours accessibles sur coursera.</p>
            </div>

        </div>
    </section>

    <section class="flex justify-between p-4 gap-4 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mb-8">

        <div
            class=" bg-[#fcdab40a] dark:bg-gray-800 mb-4 p-5 rounded-lg w-1/2 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 ">
            <div class="flex gap-5">
                <div class=" ">
                    <a href="{{route('import.specialisations')}}" class=" flex items-center">
                        {{-- <span class="text-gray-800 lg:text-sm  dark:text-gray-200"></span> --}}
                        <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 
                        focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">import specialisations csv</button>

                    </a>
                </div>
                 <div>
                    <a href="{{route('import.members')}}" class=" flex items-center">
                        {{-- <span class="text-gray-800 lg:text-sm  dark:text-gray-200"></span> --}}
                        <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 
                        focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">import members csv</button>
                    </a>
                </div> 
                <div>
                    <a href="{{route('import.usages')}}" class=" flex items-center">
                        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br 
                        focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">import usages csv</button>

                        {{-- <span class="text-gray-800 lg:text-sm  dark:text-gray-200">import usages csv</span> --}}
                    </a>
                </div> 

            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="m-4 flex justify-between gap-4 rounded-lg w-1/2">
            <div class=" w-1/2">
                 <div>
                    <h3 class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">Statistiques des membres</h3>
                </div>
                <div>
                        <div class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href="" class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres de ceux qui ont acceptés l'invitation : <span class="text-[#36d4fc]">{{$coursera_members->members}}</span>
                                </p>
                            </div>
                        </div>
                        <div class=" h-16 flex shadow-lg dark:shadow-lg dark:shadow-gray-500/20   w-full gap-1 items-center p-2 mb-2 rounded-xl bg-[#fcdab40a] dark:bg-gray-800 dark:hover:bg-gray-600 hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out">
                            <div>
                                <p href="" class="text-xs font-normal text-gray-800 lg:text-sm  dark:text-gray-400">
                                    Nombres de ceux qui n'ont pas accepté l'invitation: <span class="text-[#6270f3]">{{$coursera_members->invites}}</span>
                                </p>
                            </div>
                        </div>
                </div>

            </div>

            {{-- <div class=" w-1/2">
                <div class=" m-4 ">
                    <canvas id="myChart2"></canvas>
                </div>


            </div> --}}


        </div>

    </section>

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx,{
                type:'bar',
                data:{
                    labels: {!! json_encode($labels) !!},
                    datasets: {!! json_encode($datasets) !!}
                },
            });
        </script>
        
       
    @endsection



</x-app-layout>
