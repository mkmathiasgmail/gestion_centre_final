<!-- Large Modal -->
<div id="large-employé" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">



                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    parcours d'un employé
                </h3>
                <button id="resetButton2" type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="large-employé">

                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4 md:p-5">
                <div class="relative mt-4 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400 display " style="width: 100%" id="Mytable">
                        <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-slate-700">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3 bg-slate-700">
                                    Nom
                                </th>

                                <th scope="col" class="px-6 py-3 bg-slate-700">
                                    Nom entreprise
                                </th>

                                <th scope="col" class="px-6 py-3 bg-slate-700">
                                    poste
                                </th>

                                <th scope="col" class="px-6 py-3 bg-slate-700">
                                    periode d'employabilite
                                </th>
                                <th scope="col" class="px-6 py-3 bg-slate-700">
                                    Actions
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>


                </div>
                <!-- Modal footer -->


            </div>
        </div>
    </div>

    <!-- Extra Large Modal -->

