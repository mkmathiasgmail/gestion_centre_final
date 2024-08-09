@props(['show', 'datachart'])



<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel"
    aria-labelledby="profile-tab">


    <div class="w-full  mx-auto">
        <div class="mx-5 my-3 text-sm">
            <a href="" class=" text-red-600 font-bold tracking-widest">{{ $show->categorie->name }}</a>
        </div>
        <div class="w-full text-gray-800 text-4xl px-5 font-bold leading-none">
            {{ $show->title }}
        </div>

        <div class="w-full text-gray-500 px-5 pb-5 pt-2">
            The war of words comes after the governor sued the Atlanta mayor over her city’s mask mandate.
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div class="md:col-span-2 lg:col-span-1">
                <div class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white">
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
                                <td class="text-gray-500">{{ $datachart->first()->total_candidats }}</td>
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
                                            <linearGradient id="paint0_linear_622:13631" x1="68" y1="7.74997"
                                                x2="1.69701" y2="8.10029" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E323FF" />
                                                <stop offset="1" stop-color="#7517F8" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">Total Garcon</td>
                                <td class="text-gray-500">{{ $datachart->first()->total_garcons }}</td>
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
                                            <linearGradient id="paint0_linear_622:13640" x1="34" y1="5"
                                                x2="34" y2="15.9524" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#8AFF6C" />
                                                <stop offset="1" stop-color="#02C751" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">Total Filles</td>
                                <td class="text-gray-500">{{ $datachart->first()->total_filles }}</td>
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
                <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
                    <h5 class="text-xl text-gray-700">Detail Activites</h5>
                   
                   
                </div>
            </div>
            <div>
                <div class="lg:h-full py-8 px-6 text-gray-600 rounded-xl border border-gray-200 bg-white">
                  
                    <div class="mt-6">
                        <h5 class="text-xl text-gray-700 text-center">Ask to customize</h5>
                       
                        <span class="block text-center text-gray-500">Compared to last week 13</span>
                    </div>
                    
                </div>
            </div>
        </div>


    </div>
</div>
