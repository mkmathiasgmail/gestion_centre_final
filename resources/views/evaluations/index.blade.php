<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-content center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Evaluations') }}
            </h2>
        </div>
    </x-slot>
    
    @if (session("erreur"))
        <div id="alert-2" class="flex items-center p-4 mb-4 mt-8 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">{{ session("erreur") }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            </button>
        </div>
    @endif

    <div class="grid grid-cols-4 gap-4 my-8">

        <!-- Planning des activites mensuelles d'Academy Digital -->
        
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Planning des activités mensuelles d'Academy Digital</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ env("MONTHLY_PLANNING_REPORT") }}</p>
            <a href="{{route('exportMonthPlan')}}" data-modal-target="export-month-planning-modal" data-modal-toggle="export-month-planning-modal" onclick="genererPlanning(event)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Générer
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        <!-- Main modal -->
        <div id="export-month-planning-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Select a month to generate
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="export-month-planning-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="" method="post" class="p-4 md:p-5">
                        @method("GET")
                        <div class="flex justify-center">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="month" class="flex justify-center mb-2 text-sm font-medium text-gray-900 dark:text-white">Month</label>
                                <select id="month" name="month" class="justify-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                </select>
                            </div>
                        </div>
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Generate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 

        <!-- Suivie des activité hebdomadaire -->

        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Suivie des activités hebdomadaire</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ env("SUIVIE_HEBDO_ACTIVITY") }}</p>
            <a href="{{route('exportSuivieHebdo')}}" onclick="genererSuivieHebdomadaire(event)" data-modal-target="export-suivie-hebdomadaire-modal" data-modal-toggle="export-suivie-hebdomadaire-modal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Générer
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        <!-- Main modal -->
        <div id="export-suivie-hebdomadaire-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Select a year to generate
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="export-suivie-hebdomadaire-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="" method="post" class="p-4 md:p-5">
                        @method("GET")
                        <div class="flex justify-center">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="years" class="flex justify-center mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                                <select id="years" name="years" class="justify-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                </select>
                            </div>
                        </div>
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Generate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 

        <!---semestrielle rapport des activités---->
        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rapport semestriel des
                activités</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ env('SEMESTRIEL_REPORT') }}</p>
            <a href="{{ route('exportSemestre') }}" data-modal-target="semetrielrapport-modal"
                data-modal-toggle="semetrielrapport-modal" onclick="genererSemestre(event)"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Générer
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
        <!-- Main modal -->
        <div id="semetrielrapport-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Select an Semestre to generate
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="semetrielrapport-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
                                    class="flex justify-center mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    Semestre</label>
                                <select id="semestre" name="semestre"
                                    class="justify-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="1">Semestre_1</option>
                                    <option value="2">Semestre_2</option>

                                </select>
                            </div>
                            <div>
                                <label for="year"
                                    class="flex justify-center mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    Year</label>
                                <select id="year" name="year"
                                    class="justify-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

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
                                Generate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!---Wenzory rapport---->
        
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Wenzory Rapport</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ env("MONTHLY_PLANNING_REPORT") }}</p>
            <button data-modal-target="typeEvent-modal" data-modal-toggle="typeEvent-modal" onclick="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Générer
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
        </div>
        <!-- Main modal -->
        <div id="typeEvent-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center max-w-9xl md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Wenzory
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="typeEvent-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <!-- Modal body -->
                </div>
                <form action="{{route('exportWenzory')}}" method="post" id="generer">
                    @csrf
                    @method('post')
                    <div class="p-5 md:p-5 space-y-4 text-white items-center">
                        
                        
                        <div>
                            <div><label for="type">Type</label></div>
                            <div>
                                <select name="type[]" id="type" multiple class="w-full  rounded-md text-gray-600">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->typeEvent }}</option>
                                    @endforeach
            
                                </select>
                            </div>

                        <div>
                            <div><label for="categorie">Categories</label></div>
                            <div>
                                <select name="categorie[]" id="categorie" multiple class="w-full  rounded-md text-gray-600">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->categorie}}</option>
                                    @endforeach
            
                                </select>
                            </div>
                        </div>
    
                        <div>
                            <div><label for="date">Date</label></div>
                            <div><input type="date" name="monthYear" id="monthYear"
                                    class="w-full h-9 rounded-md text-gray-600" placeholder="Donne un titre a votre Article"
                                    required></div>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comparer Activités</label>
                        </div>
    
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Générer
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </button>
                        <button data-modal-hide="typeEvent-modal" type="reset"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Decline
                        </button>
                    </div>
                </form>
                        
                </div>
            </div>
        </div> 
        
    </div>

    @section("script")
<script>
            function genererPlanning(event){
                event.preventDefault()
                const lien = event.target.getAttribute("href")
                document.querySelector("#export-month-planning-modal form").setAttribute("action", lien)
            }

            function genererSuivieHebdomadaire(event){
                event.preventDefault()
                const lien = event.target.getAttribute("href")
                document.querySelector("#export-suivie-hebdomadaire-modal form").setAttribute("action", lien)
            }


            //code de Junoir
            function generateMonthOptions() {
                const select = document.getElementById('month');
                const currentDate = new Date().getFullYear();;
                const currentMonth = new Date().getMonth();

                for (let i = 0; i < 12; i++) {
                    const option = document.createElement('option');

                    const date = new Date(currentDate, i, 2);
                    const monthName = date.toLocaleString('default', { month: 'long' }) + ' ' + date.getFullYear();
                    const monthValue = date.toISOString().slice(0, 7); // YYYY-MM format

                    option.value = monthValue;
                    option.text = monthName;
                    select.appendChild(option);
                }

                if (currentMonth == 11) {
                    const option = document.createElement('option');

                    const specifieDate = new Date(currentDate + 1, 0, 2);
                    option.text = specifieDate.toLocaleString('default', { month: 'long' }) + ' ' + specifieDate.getFullYear();
                    option.value = specifieDate.toISOString().slice(0, 7); // YYYY-MM format
                    select.appendChild(option);
                }
            }
            document.addEventListener('DOMContentLoaded', generateMonthOptions);

            function generateYearOption() {
                const select = document.getElementById('years');
                const currentDate = new Date().getFullYear();;

                for (let i = 0; i <= 2; i++) {
                    const option = document.createElement('option');
                    const year = currentDate - i;

                    option.value = year;
                    option.text = year;
                    select.appendChild(option);
                }
            }
            document.addEventListener('DOMContentLoaded', generateYearOption);

            //code de Manassé
    //         document.getElementById('date').addEventListener('change', function() {
    //     var selectedDate = new Date(this.value);
    //     var monthYear = selectedDate.toLocaleString('default', { month: 'long', year: 'numeric' });
    //     document.getElementById('monthYear').value = monthYear;
    // });
    function genererSemestre(event) {
                event.preventDefault();
                const lien = event.target.getAttribute("href");
                document.querySelector("#semetrielrapport-modal form").setAttribute("action", lien);
            }

            // Improved function for generating year options
            function generateYearOptions() {
                const select = document.getElementById('year'); // Ensure ID is 'year'

                if (!select) {
                    console.error("Year select element with ID 'year' not found.");
                    return; // Prevent errors if element is missing
                }

                const currentYear = new Date().getFullYear();

                // Define range with 7 past and 8 future years (inclusive)
                const startYear = currentYear - 7;
                const endYear = currentYear + 8;

                for (let year = startYear; year <= endYear; year++) {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year;

                    if (year === currentYear) {
                        option.selected = true; // Select the current year by default
                    }

                    select.appendChild(option);
                }
            }

            // Attach generateYearOptions to DOMContentLoaded for immediate execution
            document.addEventListener('DOMContentLoaded', generateYearOptions);
        
        </script>
    @endsection
</x-app-layout>

