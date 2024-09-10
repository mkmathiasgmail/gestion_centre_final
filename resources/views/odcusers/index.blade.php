<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="w-full">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight text-left">
                    {{ __('Liste des utilisateurs') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6 relative overflow-x-auto">
        <table id="usersTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Prénom
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Sexe
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Date de naissance
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Profession
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Spécialité
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#usersTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('getdata') }}",
                        "dataType": "json",
                        "type": "GET"
                    },
                    layout: {
                        topStart: {
                            pageLength: {
                                menu: [10, 25, 50, 100, 200]
                            },
                            buttons: [
                                'copy',
                                'print',

                                {
                                    extend: 'spacer',
                                    style: 'bar',
                                    text: 'Export files:'
                                },
                                'csv',
                                'excel',
                                'spacer',
                                'pdf',
                                {
                                    extend: 'spacer',
                                    style: 'bar',
                                    text: ':'
                                },

                                'colvis'
                            ]
                        },
                        topEnd: {
                            search: {
                                placeholder: 'Type search here'
                            }
                        },
                        bottomEnd: {
                            paging: {
                                numbers: 3
                            }
                        },

                    },
                    columns: [{
                            data: 'first_name',
                            name: 'first_name'
                        },
                        {
                            data: 'last_name',
                            name: 'last_name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'gender',
                            name: 'gender'
                        },
                        {
                            data: 'birth_date',
                            name: 'birth_date'
                        },
                        {
                            data: 'profession',
                            name: 'profession'
                        },
                        {
                            data: 'detail_profession',
                            name: 'detail_profession'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ]
                });

                $('#usersTable').css('width', '100%');

                $('.dt-container').addClass('text-base text-gray-800 dark:text-gray-400 leading-tight')

                $('.dt-buttons').addClass('mt-4')
                $('.dt-buttons buttons').addClass('cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold')

                $("#dt-length-0").addClass('text-gray-700 dark:text-gray-400 w-24 bg-white');
                $("label[for='dt-length-0']").addClass('text-gray-700 dark:text-gray-400').text(
                    ' Enregistrements par page');

                $('.dt-input').addClass('w-24')
            });
        </script>
    @endsection
</x-app-layout>
