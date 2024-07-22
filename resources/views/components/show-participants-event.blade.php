@props(['labels', 'participantsData', 'participantsData', 'url', 'id', 'activite_Id', 'odcusers', 'activite'])

@if (Session('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
    </div>
@endif

<div class="py-11 relative overflow-x-auto">
    <table id="participantTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($labels as $label)
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                       <td>
                        @if ($participant['status'] == 'accept')
                            <a href="{{ route('generateQrCode', $participant['id']) }}">Générer un qrcode</a>
                        @else
                            <button disabled>Pas qrcode</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
