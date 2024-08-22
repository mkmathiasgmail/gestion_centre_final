<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Employabilites') }}
        </h2>


    </x-slot>

    <div class="flex justify-end mt-4 mb-4 text-white ">
        <button type="submit" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex items-center bg-black hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
            Ajouter
        </button>
    </div>
    {{-- <div class="flex justify-end my-2">
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Ajouter
        </button>
    </div> --}}
@if ($errors->any())
<div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



    @if (session('error'))
    <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
            {{ session('error') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    @if (session('success'))
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-900 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
            {{ session('success') }}
        </div>



        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif




    <div class="relative mt-4 overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400 display " style="width: 100%" id="table">
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
                         Actions
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
                        {{ (isset($item->type_contrat->libelle)) ? $item->type_contrat->libelle : '' }}
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

                               <a href=" {{ route('employabilites.destroy', $item->id) }}" onclick="supprimer(event);" data-modal-target="delete-modal" data-modal-toggle="delete-modal" type="submit">
                                 <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
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
    </div>
<x-DeleteUser1 />

    <x-formEmployabilite :typeContrats="$typeContrats" />




    @section('script')
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js "></script>



    <script>
        //scrpit pour l'autocomplete
        $(function() {
            $('#first_name').on('input', function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('autocompleted') }}"
                        , method: "GET"
                        , data: {
                            query: query
                            , _token: _token
                        }
                        , success: function(data) {
                            $('#countryList').fadeIn();
                            $('#countryList')
                                .empty(); // Vider la liste avant d'ajouter de nouveaux éléments
                            let data_user = $.each(data, function(index, item) {
                                $('#countryList').append(
                                    '<p id="id_odc" class="hidden">' + item.id +
                                    '</p><ul class= "font-bold"><li class="pl-4 bg-gray-300 hover:bg-gray-400" data-id="'+item.id+'">' +
                                    item.first_name + '  ' + item.last_name+'</li></ul>');



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
            $('#resetButton').click(function() {
                $('#first_name').val(''); // Vider le champ de saisie
                $('#countryList').fadeOut(); // Cacher la liste des suggestions
            });


        });
        /// fin script autocomplete

        //script pour
        new DataTable('#table');
        //script pour la date
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('periode').setAttribute('max', today);
        });

        //fin script date

    </script>

    <!-- Code JavaScript ajout champs -->
    <script>
        let postsNomboitesCounter = 1;
        const addButton = document.getElementById('add-button');

        function addPostesNomboites() {
            const container = document.getElementById('postes-nomboites-container');
            const newRow = document.createElement('div');
            newRow.classList.add('col-span-2', 'postes-nomboites-row');
            newRow.innerHTML = `
            <div>
                <label for="poste-${postsNomboitesCounter}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                <input id="poste-${postsNomboitesCounter}" name="poste1" type="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Veuilez saisir votre poste" autocomplete="off">
            </div>
            <div>
                <label for="nomboite-${postsNomboitesCounter}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                <input id="nomboite-${postsNomboitesCounter}" name="nomboite1" type="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Veuilez saisir le nom de votre entreprise" autocomplete="off">
            </div>
        `;
            container.appendChild(newRow);
            postsNomboitesCounter++;
            updateAddButtonState();
        }

        function updateAddButtonState() {
            const rows = document.querySelectorAll('.postes-nomboites-row');
            if (rows.length >= 2) {
                addButton.disabled = true;
            } else {
                addButton.disabled = false;
            }

        }
        document.getElementById('add-button').addEventListener('click', addPostesNomboites);

    </script>


    @endsection
</x-app-layout>
