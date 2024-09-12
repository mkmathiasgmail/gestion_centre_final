<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('GESTION DES EMPLOYABILITES') }}
        </h2>
    </x-slot>


    <div class="flex justify-end mt-4 mb-4 text-white ">
        <button type="submit" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="text-white inline-flex items-center bg-black hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Ajouter
        </button>

    </div>




    @if ($errors->any())
    <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif



    @if (session('error'))
    <div id="alert-2"
        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-700"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
            {{ session('error') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-700 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    @if (session('success'))
    <div id="alert-3"
        class="flex items-center p-4 mb-4 text-green-900 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-700"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
            {{ session('success') }}
        </div>



        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    {{-- section selected --}}
    <div class="relative mt-4 overflow-x-auto">
        <select id="columnSelect" class="p-2 mb-4 text-white bg-gray-800 border border-gray-700 rounded">
            <option value="#">Visibilité de colonne </option>
            <option value="0">id</option>
            <option value="1">name</option>
            <option value="2">type contrat</option>
            <option value="3">entreprise</option>
            <option value="4">poste</option>
            <option value="5">periode</option>
            <option value="6">derniere activite</option>
            <option value="7">derniere service</option>
            <option value="8">date de participation</option>
        </select>
        {{-- fin section --}}

        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400 display "
            style="width: 100%" id="table">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        type contrat
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
                        Derniere Activite
                    </th>

                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        Derniere Service
                    </th>

                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        Date participation
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-700">
                        Parcourir
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                $id_use = 1;
                @endphp
                @foreach ($employabilites as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <td class="px-6 py-4">
                        {{ $id_use }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('odcusers.show', $item->odcuser_id) }}"> {{ $item->name }} </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ isset($item->type_contrat->libelle) ? $item->type_contrat->libelle : '' }}
                    </td>
                    <td class="px-6 py-4">
                        {!! nl2br($item->nomboites) !!}
                    </td>
                    <td class="px-6 py-4">
                        {!! nl2br($item->postes) !!}
                    </td>
                    <td class="px-6 py-4">
                        {!! nl2br($item->periodes) !!}

                    </td>

                    <td class="px-6 py-4">
                        {{ $item->derniere_activite }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $item->derniere_service }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $item->date_participation }}
                    </td>


                    <td class="px-6 py-4">
                        <a href="#" data-id="{{ $item->id }}" onclick="supprimer(event, '{{ $item->odcuser->id }}');"
                            data-modal-target="large-employe-modal" data-modal-toggle="large-employe-modal" >
                            <svg class="w-10 h-10" xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path class="bg-teal-500 fill-current"
                                    d="M22,3H5A2,2 0 0,0 3,5V9H5V5H22V19H5V15H3V19A2,2 0 0,0 5,21H22A2,2 0 0,0 24,19V5A2,2 0 0,0 22,3M7,15V13H0V11H7V9L11,12L7,15M20,13H13V11H20V13M20,9H13V7H20V9M17,17H13V15H17V17Z" />

                            </svg>

                        </a>

                    </td>
                </tr>
                @php
                $id_use += 1;
                @endphp
                @endforeach
            </tbody>
        </table>
        @section('modal')

        <div class="flex justify-end mt-4 mb-4 text-white">
            <x-listChoice />
        </div>
        <div>
            <x-formEmployabilite :typeContrats="$typeContrats" />
        </div>
        @endsection
        <div class="flex justify-end mt-4 mb-4">
            <form method="POST" action="{{ route('importEmploye') }}" enctype="multipart/form-data"
                class="w-full max-w-md">
                @csrf
                <input type="file" name="file" accept=".csv,.xls,.xlsx" required
                    class="block w-full mt-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-black dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600">
                <button
                    class="px-2 mt-4 text-white bg-yellow-500 rounded hover:bg-green-600 dark:bg-yellow-600 dark:hover:bg-yellow-500"
                    type="submit">
                    <svg class="inline-block w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M14 2H6C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H18C19.11 22 20 21.11 20 20V8L14 2M18 20H6V4H13V9H18V20M15 11.93V19H7.93L10.05 16.88L7.22 14.05L10.05 11.22L12.88 14.05L15 11.93Z" />
                    </svg>
                    Importer
                </button>

                <a href="{{route ('exportModelEmploye') }}"
                    class="px-2 mt-4 text-white bg-blue-700 rounded hover:bg-teal-600 dark:bg-yellow-600 dark:hover:bg-yellow-500">
                    <svg class="inline-block w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2M18 20H6V4H13V9H18V20M16 11V18.1L13.9 16L11.1 18.8L8.3 16L11.1 13.2L8.9 11H16Z" />
                    </svg>
                    telecharge model
                </a>
            </form>
        </div>

    </div>

    {{-- @section('modal')
    <x-formEmployabilite :typeContrats="$typeContrats" />
    <x-listchoice />
    @endsection --}}


    @section('script')
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js "></script>

    <script>

        function bindModalEvent(modalId) {
        $(modalId).on('show.bs.modal', function () {
        manageDataTable();
            });
         }
    </script>

    <script>
        function supprimer(event, id) {
                                        let employeId = id;
                                        event.preventDefault();

                                        if ($.fn.DataTable.isDataTable('#Mytable')) {
                                            $('#Mytable').DataTable().destroy();
                                        }
                                        var url = '{{ route('getdataEmploye', ':id') }}';
                                        url = url.replace(':id', employeId);

                                        $('#Mytable').DataTable({
                                            "processing": true,
                                            "serverSide": true,
                                            "ajax": {
                                                "url": url,
                                                "dataType": "json",
                                                "type": "GET"
                                            },
                                            "columns": [{
                                                data: 'id',
                                                name: 'id'
                                            }, {
                                                data: 'name',
                                                name: 'name'
                                            }, {
                                                data: 'nomboite',
                                                name: 'nomboite'
                                            }, {
                                                data: 'poste',
                                                name: 'poste'
                                            }, {
                                                data: 'periode',
                                                name: 'periode'
                                            }, {
                                                data: 'action',
                                                name: 'action',
                                                orderable: false,
                                                searchable: false,
                                                render: function(data, type, row) {
                                                    return `<button onclick="toggleEnregistrement(${row.id})" class="flex items-center px-2 py-1 text-white bg-black hover:bg-slate-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        désactiver
                                                    </button>`;





                                                }
                                            }],
                                            "createdRow": function(row, data) {

                                                if (localStorage.getItem(`enregistrement-${data.id}`) === 'true') {
                                                    $(row).addClass('bg-teal-500 text-red-500');

                                                }
                                            }
                                        });
                                    }

                                    function toggleEnregistrement(id) {
                                        const key = `enregistrement-${id}`;
                                        const currentState = localStorage.getItem(key) === 'true';

                                        // Toggle l'état et met à jour localStorage
                                        localStorage.setItem(key, !currentState);


                                        $('#Mytable').DataTable().rows().every(function() {
                                            const rowData = this.data();
                                            if (rowData.id === id) {
                                                $(this.node()).toggleClass('bg-teal-500 text-red-500', !currentState);

                                            }
                                        });
                                    }
    </script>
    {{-- fin de script datatable --}}


    <script>
        //scrpit pour l'autocomplete
                            $(function() {
                                $('#first_name').on('input', function() {
                                    var query = $(this).val();
                                    if (query != '') {
                                        var _token = $('input[name="_token"]').val();
                                        $.ajax({
                                            url: "{{ route('autocompleted') }}",
                                            method: "GET",
                                            data: {
                                                query: query,
                                                _token: _token
                                            },
                                            success: function(data) {
                                                $('#countryList').fadeIn();
                                                $('#countryList')
                                                    .empty(); // Vider la liste avant d'ajouter de nouveaux éléments
                                                let data_user = $.each(data, function(index, item) {
                                                    $('#countryList').append(
                                                        '<p id="id_odc" class="hidden">' + item.id +
                                                        '</p><ul class= "font-bold"><li class="pl-4 bg-gray-300 hover:bg-gray-400" data-id="' +
                                                        item.id + '">' +
                                                        item.first_name + '  ' + item.last_name +
                                                        '</li></ul>');



                                                });


                                            }
                                        });
                                    } else {
                                        $('#countryList').fadeOut();
                                    }
                                });

                                delay: 500,

                                    $(document).on('click', 'li', function() {
                                        $('#first_name').val($(this).text());
                                        var go = $(this).attr("data-id")
                                        console.log('id slectionne', go)
                                        $("#id_user").attr("value", go)
                                        $('#countryList').fadeOut();
                                    });
                                //faire une reinitialisation de champ
                                $('#resetButton1').click(function() {
                                    $('#first_name').val(''); // Vider le champ de saisie
                                    $('#countryList').fadeOut(); // Cacher la liste des suggestions
                                });


                            });
                            /// fin script autocomplete

                            //script pour
                            $(document).ready(function() {
                                var table = new DataTable('#table');

                                // Vérifiez si une colonne est cachée au chargement de la page
                                var hiddenColumns = JSON.parse(localStorage.getItem('hiddenColumns')) || [];

                                hiddenColumns.forEach(function(index) {

                                    table.column(index).visible(false);
                                });

                                $('#columnSelect').on('change', function() {
                                    var columnIndex = $(this).val(); // Récupère l'index de la colonne sélectionnée
                                    var column = table.column(columnIndex);
                                    column.visible(!column.visible()); // Basculer la visibilité

                                    // Mettez à jour le stockage local
                                    if (column.visible()) {
                                        hiddenColumns = hiddenColumns.filter(function(i) {
                                            return i != columnIndex;
                                        });
                                    } else {
                                        if (!hiddenColumns.includes(columnIndex)) {
                                            hiddenColumns.push(columnIndex);
                                        }
                                    }

                                    localStorage.setItem('hiddenColumns', JSON.stringify(hiddenColumns));
                                });
                            });



                            //script pour la date
                            document.addEventListener('DOMContentLoaded', function() {
                                var today = new Date().toISOString().split('T')[0];
                                document.getElementById('periode').setAttribute('max', today);
                            });

                            //fin script date
    </script>



    <script>
        //faire une reinitialisation de champ
                            $('#resetButton2').click(function() {


                            });
    </script>
    @endsection
</x-app-layout>
