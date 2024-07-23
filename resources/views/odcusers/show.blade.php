<x-app-layout>
    <section class=" w-full p-4 flex justify-between gap-8">
        <div class="">
            <div class="bg-[#fcdab40a] shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg text-center">
                <div class=" ">
                    <div class=" flex justify-center">
                        <img src="{{ $odcuser->picture }}" alt=""
                            class=" w-28 h-28 rounded-full object-cover border-4 border-white">
                    </div>
                    <div>

                        <p class="text-sm text-gray-600">{{ $odcuser->email }}</p>
                    </div>
                </div>
                <div>
                    <h2
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-5xl dark:text-white">
                        {{ $odcuser->first_name }} {{ $odcuser->last_name }}</h2>
                </div>

                <div class=" flex justify-between gap-5 text-center">
                    <div>
                        <span class="mb-6 text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">Formation
                            participe</span>
                        <p
                            class="mb-4 text-4xl  leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                            40 +</p>
                    </div>
                    <div>
                        <span
                            class="mb-6 text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">Taux Presence</span>
                        <p
                            class="mb-4 text-4xl leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                            40 %</p>
                    </div>
                    <div>
                        <span class="mb-6 text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">Formation
                            encours</span>
                        <p
                            class="mb-4 text-4xl  leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                            40 +</p>
                    </div>
                </div>

            </div>

            <div
                class=" bg-[#fcdab40a] shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">

                <div
                    class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                    <h2>Cordonnes Utilisateur</h2>
                </div>

                <div>
                    <p>Numero telephone: <span></span></p>
                </div>
                <div>
                    <p>Email :<span>{{ $odcuser->email }}</span></p>
                </div>
                <div>
                    <p> Profession :<span></span></p>
                </div>
                <div>
                    <p> linkedin :<span><a href="{{ $odcuser->linkedin }}">{{ $odcuser->linkedin }}</a></span></p>
                </div>

                <div>
                    <p> Genre :<span>{{ $odcuser->gender }}</span></p>
                </div>
                <div>
                    <p> Date de naissance :<span>
                            @php
                                $date = new DateTimeImmutable($odcuser->birth_date);
                                $format = date_format($date, 'jS \o\f F Y');
                            @endphp
                            {{ $format }}
                        </span></p>
                </div>


            </div>
        </div>

        <div class=" bg-[#fcdab40a] shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg w-full">
            <div class=" flex justify-between mb-4 items-center">
                <h3
                    class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                    Historique participation</h3>
                <span class="mb-6 text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">See all</span>
            </div>
            <div class=" flex justify-between gap-4 w-full md:inset-0  mb-8">
                <div
                    class=" h-36  flex  items-center  p-4 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-white dark:bg-gray-800 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">

                    <div>
                        <p class=" text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">Category</p>

                        <h3 class="mb-4 mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200 ">
                            Total des activités enregistrées : <span id="count" class="text-[#ff9822]">
                            </span>
                        </h3>

                        <p class="text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                            Date activite</p>
                    </div>
                </div>
                <div
                    class=" h-36  flex  items-center  p-4 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-white dark:bg-gray-800 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">

                    <div>
                        <p class=" text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">Category</p>

                        <h3 class="mb-4 mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200 ">
                            Total des activités enregistrées : <span id="count" class="text-[#ff9822]">
                            </span>
                        </h3>

                        <p class="text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                            Date activite</p>
                    </div>
                </div>
                <div
                    class=" h-36  flex  items-center  p-4 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-white dark:bg-gray-800 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 border-[#ff9822] hover:border-l-10 ">

                    <div>
                        <p class=" text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">Category</p>

                        <h3 class="mb-4 mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200 ">
                            Total des activités enregistrées : <span id="count" class="text-[#ff9822]">
                            </span>
                        </h3>

                        <p class="text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                            Date activite</p>
                    </div>
                </div>
            </div>
            <div class=" flex justify-between mb-4 items-center">
                <h3
                    class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                    Chart Frequentation Odc (30 dernier jours)</h3>
                <span class="mb-6 text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">See all</span>
            </div>
            <div>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

    </section>



    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection


</x-app-layout>



{{-- <div class="py-6 relative overflow-x-auto">
        <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-4">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-base p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="{{ route('odcusers.edit', $odcuser->id) }}"
                                class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                Data</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-base text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="py-6 relative overflow-x-auto">
                <table id="userTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Fistname
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Lastname
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Phone number
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Profession
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Education
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Candidatures
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $odcuser->first_name }}</td>
                            <td class="px-6 py-4">{{ $odcuser->last_name }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $email = collect($datas)->pluck('E-mail')->unique()->first();
                                @endphp
                                {{ $email }}
                            </td>
                            <td>
                                @php
                                    $phone = collect($datas)->pluck('Téléphone')->unique()->first();
                                @endphp
                                {{ $phone }}
                            </td>
                            <td class="px-6 py-4">{{ $odcuser->birth_date }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $university = collect($datas)
                                        ->pluck("Nom de l'Etablissement / Université")
                                        ->unique()
                                        ->first();
                                @endphp
                                {{ $university }}
                            </td>
                            <td>
                                @foreach ($candidats as $candidat)
                                    @if ($candidat->activite)
                                        <a href="{{ route('activites.show', $candidat->activite->id) }}">{{ $candidat->activite->title }} : {{ $candidat->activite->start_date }} -> {{ $candidat->activite->end_date }} </a><br>
                                    @endif
                                @endforeach
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
