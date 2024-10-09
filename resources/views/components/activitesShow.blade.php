@props(['show', 'datachart'])



<div class="hidden p-4 rounded-lg bg-[#eaeaebf3] dark:bg-gray-800" id="styled-profile" role="tabpanel"
    aria-labelledby="profile-tab">


    <div class="w-full  mx-auto">
        <div class="mx-5 my-3 text-sm flex justify-between">
            <a href="{{ route('categorie.activites', $show->categorie->id) }}"
                class=" text-red-600 font-bold tracking-widest">{{ $show->categorie->name }}</a>


            <a href="{{ route('activites.edit', $show->id) }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-[#ff7322] text-white hover:bg-[#ff6822] focus:outline-none focus:bg-[#ff6822] disabled:opacity-50 disabled:pointer-events-none">modifier</a>
        </div>

        @if ($show->candidat->count() == 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div>
                    <div
                        class="lg:h-full py-8 px-6 text-gray-600 dark:text-gray-200  rounded-xl border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">

                        <img src="{{ $show->thumbnail_url }}" alt="{{ $show->title }}" class=" mb-4">

                        {!! substr($show->content, 0, 600) !!} ...

                        <div class="flex justify-center gap-2 flex-wrap p-4">

                            @foreach ($show->hashtag as $item)
                                <span class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">
                                    {{ $item->name }}</span>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 lg:col-span-1">
                    <div
                        class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">
                        <div class="py-6" id="chart"></div>
                        <div>

                            <div class="mt-2 flex justify-center gap-4">
                                <h3 class="text-3xl font-bold text-gray-700">Global Activities</h3>

                            </div>
                            <span class="block text-center text-gray-500"></span>
                        </div>
                        <table class="w-full text-gray-600">
                            <tbody>
                                <tr>
                                    <td class="py-2">Total Candidat</td>
                                    <td class="text-gray-500">Pas des donnees</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <path
                                                d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5"
                                                stroke="url(#paint0_linear_622:13631)" stroke-width="2"
                                                stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13631" x1="68"
                                                    y1="7.74997" x2="1.69701" y2="8.10029"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#E323FF" />
                                                    <stop offset="1" stop-color="#7517F8" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Total Homme</td>
                                    <td class="text-gray-500">Pas des donnees</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <path
                                                d="M0 12.929C8.69077 12.929 7.66833 9.47584 17.8928 9.47584C28.1172 9.47584 25.5611 15.9524 34.2519 15.9524C42.9426 15.9524 44.8455 10.929 51.6334 10.929C58.2217 10.929 59.3092 5 68 5"
                                                stroke="url(#paint0_linear_622:13640)" stroke-width="2"
                                                stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13640" x1="34"
                                                    y1="5" x2="34" y2="15.9524"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#8AFF6C" />
                                                    <stop offset="1" stop-color="#02C751" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Total Femme</td>
                                    <td class="text-gray-500">Pas des donnees</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <path
                                                d="M0 6C8.62687 6 6.85075 12.75 17 12.75C27.1493 12.75 25.3731 9 34 9C42.6269 9 42.262 13.875 49 13.875C55.5398 13.875 58.3731 6 67 6"
                                                stroke="url(#paint0_linear_622:13649)" stroke-width="2"
                                                stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13649" x1="67"
                                                    y1="7.96873" x2="1.67368" y2="8.44377"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFD422" />
                                                    <stop offset="1" stop-color="#FF7D05" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div
                        class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="text-xl text-gray-700 mb-5">Detail Activites</h5>

                        <table class="w-full text-gray-600">
                            <tbody>
                                <tr>
                                    <td class="py-2">Identifiant</td>
                                    <td class="text-gray-500 dark:text-gray-200">


                                        {{ $show->_id }}

                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M18.045 3.007 12.31 3a1.965 1.965 0 0 0-1.4.585l-7.33 7.394a2 2 0 0 0 0 2.805l6.573 6.631a1.957 1.957 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 21 11.479v-5.5a2.972 2.972 0 0 0-2.955-2.972Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>


                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Date debut Activite</td>
                                    <td class="text-gray-500">
                                        @php
                                            $date = new DateTimeImmutable($show->start_date);
                                            $format = date_format($date, 'jS \o\f F Y');
                                        @endphp

                                        {{ $format }}

                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="py-2">Date Fin Activite</td>
                                    <td class="text-gray-500">
                                        @php
                                            $date = new DateTimeImmutable($show->end_date);
                                            $format = date_format($date, 'jS \o\f F Y');
                                        @endphp

                                        {{ $format }}

                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Formulaire</td>
                                    <td class="text-gray-500">
                                        {{ $show->book_a_seat ? '✔️' : '⭕️' }}
                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Lieu Activite</td>
                                    <td class="text-gray-500">{{ $show->location }}</td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class=" mt-6">
                            @foreach ($show->typEvent as $item)
                                <span class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">
                                    {{ $item->title }}</span>
                            @endforeach
                        </div>
                    </div>


                </div>

            </div>
        @else
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3 lg:grid-cols-3">
                <div>
                    <div
                        class="lg:h-full py-8 px-6 text-gray-600 dark:text-gray-200 rounded-xl border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">

                        <img src="{{ $show->thumbnail_url }}" alt="{{ $show->title }}" class=" mb-4">

                        {!! substr($show->content, 0, 600) !!} ...

                        <div class="flex justify-center gap-2 flex-wrap p-4">

                            @foreach ($show->hashtag as $item)
                                <span class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">
                                    {{ $item->name }}</span>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div>
                    <div
                        class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">
                        <div class="py-6" id="chart"></div>
                        <div>

                            <div class="mt-2 flex justify-center gap-4">
                                <h3 class="text-3xl font-bold text-gray-700 dark:text-gray-200">Global Activities</h3>

                            </div>
                            <span class="block text-center text-gray-500"></span>
                        </div>
                        <table class="w-full text-gray-600 dark:text-gray-200">
                            <tbody>
                                <tr>
                                    <td class="py-2">Total</td>
                                    <td class="text-gray-500 dark:text-gray-200">
                                        {{ $datachart->first()->total_candidats }}</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <path
                                                d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5"
                                                stroke="url(#paint0_linear_622:13631)" stroke-width="2"
                                                stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13631" x1="68"
                                                    y1="7.74997" x2="1.69701" y2="8.10029"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#E323FF" />
                                                    <stop offset="1" stop-color="#7517F8" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Total Hommes</td>
                                    <td class="text-gray-500 dark:text-gray-200">
                                        {{ $datachart->first()->total_garcons }}</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <path
                                                d="M0 12.929C8.69077 12.929 7.66833 9.47584 17.8928 9.47584C28.1172 9.47584 25.5611 15.9524 34.2519 15.9524C42.9426 15.9524 44.8455 10.929 51.6334 10.929C58.2217 10.929 59.3092 5 68 5"
                                                stroke="url(#paint0_linear_622:13640)" stroke-width="2"
                                                stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13640" x1="34"
                                                    y1="5" x2="34" y2="15.9524"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#8AFF6C" />
                                                    <stop offset="1" stop-color="#02C751" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Total Femme</td>
                                    <td class="text-gray-500 dark:text-gray-200">
                                        {{ $datachart->first()->total_filles }}</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1"
                                                fill="#e4e4f2" />
                                            <path
                                                d="M0 6C8.62687 6 6.85075 12.75 17 12.75C27.1493 12.75 25.3731 9 34 9C42.6269 9 42.262 13.875 49 13.875C55.5398 13.875 58.3731 6 67 6"
                                                stroke="url(#paint0_linear_622:13649)" stroke-width="2"
                                                stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13649" x1="67"
                                                    y1="7.96873" x2="1.67368" y2="8.44377"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFD422" />
                                                    <stop offset="1" stop-color="#FF7D05" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div
                        class="h-full py-6 px-6 mb-4 rounded-xl border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="text-xl text-gray-700 mb-5 dark:text-gray-200">Detail Activites</h5>

                        <table class="w-full text-gray-600 dark:text-gray-200">
                            <tbody>
                                <tr>
                                    <td class="py-2">Identifiant</td>
                                    <td class="text-gray-500 dark:text-gray-200">


                                        {{ $show->_id }}

                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="py-2">Date debut Activite</td>
                                    <td class="text-gray-500 dark:text-gray-200">
                                        @php
                                            $date = new DateTimeImmutable($show->start_date);
                                            $format = date_format($date, 'jS \o\f F Y');
                                        @endphp

                                        {{ $format }}

                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="py-2">Date Fin Activite</td>
                                    <td class="text-gray-500 dark:text-gray-200">
                                        @php
                                            $date = new DateTimeImmutable($show->end_date);
                                            $format = date_format($date, 'jS \o\f F Y');
                                        @endphp

                                        {{ $format }}

                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Formulaire</td>
                                    <td class="text-gray-500">
                                        {{ $show->book_a_seat ? '✔️' : '⭕️' }}
                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z"
                                                clip-rule="evenodd" />
                                        </svg>


                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Send</td>
                                    <td class="text-gray-500">
                                        {{ $show->send ? '✔️' : '⭕️' }}
                                    </td>
                                    <td class="">
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>


                                </tr>
                                <tr>
                                    <td class="py-2">Status</td>
                                    <td class="text-gray-500">
                                        {{ $show->status ? '✔️' : '⭕️' }}
                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z"
                                                clip-rule="evenodd" />
                                        </svg>


                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Show in slider</td>
                                    <td class="text-gray-500">
                                        {{ $show->show_in_slider ? '✔️' : '⭕️' }}
                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                                        </svg>


                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Show in calendar</td>
                                    <td class="text-gray-500">
                                        {{ $show->show_in_calendar ? '✔️' : '⭕️' }}
                                    </td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 5.05h1a2 2 0 0 1 2 2v2H3v-2a2 2 0 0 1 2-2h1v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1Zm-15 6v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8H3ZM11 18a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1Z"
                                                clip-rule="evenodd" />
                                        </svg>


                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">Lieu Activite</td>
                                    <td class="text-gray-500 dark:text-gray-200">{{ $show->location }}</td>
                                    <td>
                                        <svg class="w-16 ml-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class=" mt-6">
                            @foreach ($show->typEvent as $item)
                                <span class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">
                                    {{ $item->title }}</span>
                            @endforeach
                        </div>

                        {{-- <div class="flex w-full md:max-w-xl  rounded shadow mt-5">

                            @if ($show->status == true)
                                <a href="{{ route('send', $show->id) }}" onclick="desactiver(event)"
                                    aria-current="false" data-modal-target="active" data-modal-toggle="active"
                                    class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                    Active
                                    Status
                                </a>
                            @else
                                <a href="{{ route('send', $show->id) }}" data-modal-target="active"
                                    data-modal-toggle="active"
                                    class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white"
                                    onclick="desactiver(event)"> Desactive
                                    Status</a>
                            @endif


                            @if ($show->book_a_seat == true)
                                <a href="{{ route('bookInSeat', $show->id) }}" onclick="desactiver(event)" aria-current="page" data-modal-target="active" data-modal-toggle="active"
                                    class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-gray-900 text-white  border-gray-900 hover:bg-gray-800">
                                    Activer Form
                                </a>
                            @else
                                <a href="{{ route('bookInSeat', $show->id) }}" data-modal-target="active"
                                    data-modal-toggle="active" onclick="desactiver(event) aria-current="page"
                                    class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-gray-900 text-white  border-gray-900 hover:bg-gray-800">
                                    Desactiver Form
                                </a>
                            @endif

                            <a href="#" aria-current="false"
                                class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                Active Slider

                            </a>
                        </div> --}}


                    </div>
                </div>
            </div>

        @endif




    </div>
</div>
