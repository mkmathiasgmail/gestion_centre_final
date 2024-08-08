@props(['labels', 'participantsData', 'participantsData', 'url', 'id', 'activite_Id', 'odcusers', 'activite'])
    <a href="{{ route('generateAllCertificat', $id) }}"
        class="self-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generer tous les certificats</a>

<div class="py-11 relative overflow-x-auto">


    @if (isset($participantsData))
        <table id="participantTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @foreach ($labels as $label)
                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $label }}</th>
                    @endforeach

                <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Gender
                </th>
                <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Profession
                </th>
                <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Status
                </th>
                <th>
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participantsData as $participant)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($labels as $label)
                        <td class="px-6 py-4">
                            {{ isset($participant[$label]) && $participant[$label] !== '' ? $participant[$label] : 'N/A' }}
                        </td>
                    @endforeach
                    <td class="px-6 py-4">{{ $participant['odcuser']['gender'] }}</td>
                    <td class="px-6 py-4">
                        @php
                            $profession = json_decode($participant['odcuser']['profession'], true);

                        @endphp
                        {{ $profession['translations']['fr']['profession'] ?? '' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $participant['status'] }}
                    </td>

                        <td>
                            @if ($participant['status'] == 'accept')
                                <a href="{{ route('certificat', $participant['id']) }}">Générer le Certificat</a>
                            @else
                                <button disabled>Non Certifiable</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="flex justify-center items-center">
            <div class="text-center">
                <p class="dark:text-gray-400 text-black">Aucun participant n'a été trouvé sur cette activité !</p>
            </div>
        </div>
    @endif
</div>
