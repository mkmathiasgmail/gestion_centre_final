<x-app-layout>
    <div class="  p-4 sm:px-6 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-[#fcdab40a] border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-[#1e293b62] dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Liste des candidats inscrits à un parcours
                                </h2>
                                
                            </div>


                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-700 dark:divide-neutral-200">
                            <thead class="bg-[#fcdab40a] dark:bg-[#fcdab40a]">
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

                            <tbody class="divide-y divide-gray-700 dark:divide-neutral-200">
                                @if ($candidats->isEmpty())
                                    <tr>
                                        <td colspan="5" class="px-6 py-3 text-center">Aucun candidat n'a été trouvé pour cette activité. Veuillez vérifier les critères de recherche.</td>
                                    </tr>
                                @else
                                    @foreach ($candidats as $item)
                                        <tr
                                            class="text-gray-700 dark:text-gray-200 bg-[#eaeaebf3] hover:bg-[#96816a0a] dark:bg-[#1e293b62] dark:hover:bg-neutral-800">
                                            <td scope="col" class="px-6 py-3">
                                                {{ $item->candidat_nom }}
                                            </td>


                                            <td scope="col" class="px-6 py-3">
                                                {{ $item->activite_title }}
                                            </td>

                                            <td scope="col" class="px-6 py-3">
                                                {{ $item->start_date }}
                                            </td>

                                            <td scope="col" class="px-6 py-3">
                                                {{ $item->end_date }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    <span
                                        class="font-semibold text-gray-800 dark:text-neutral-200">{{ $candidats->count() }}</span>
                                    results
                                </p>
                            </div>


                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
</x-app-layout>
