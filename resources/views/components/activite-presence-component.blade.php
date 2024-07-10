<x-app-layout>


    @props(['dates', 'data', 'presences', 'countdate', 'fullDates', 'activite', 'test', 'candidats'])


    <div class="py-6 relative overflow-x-auto">
        <table id="candidatpresence"
            class="stripe row-border order-column w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            style="width:100%">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        FirstName</th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Lastname
                    </th>
                    @foreach ($dates as $item)
                        <th scope="col"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $item)
                    <tr id="rowAll" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="col" class="px-6 py-3">
                            {{ $i + 1 }}</td>
                        <td scope="col" class="px-6 py-3">
                            {{ $item['odcuser']['first_name'] }}</td>
                        <td scope="col" class="px-6 py-3">
                            {{ $item['odcuser']['last_name'] }}
                        </td>
                        @foreach ($fullDates as $date)
                            <td scope="col" class="px-6 py-3">
                                @if (in_array($date, $item['date']))
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>
                                @else
                                    <svg class="w-6 h-6 text-red-500 bg-red bg-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                    </svg>
                                @endif

                            </td>
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>



    @section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script>
            $(document).ready(function() {
               $('#candidatpresence').DataTable();
            }); 
        </script>
    @endsection
</x-app-layout>
