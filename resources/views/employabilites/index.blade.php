<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Employabilites') }}
            </h2>


            </x-slot>

            <div class="flex justify-end mt-4 mb-4 text-white " >
                    <svg data-modal-target="crud-modal"
                    data-modal-toggle="crud-modal" class="w-6 h-6 text-gray-800 bg-teal-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                      </svg>
            </div>


            @if (session('error'))
            <div id="alert-2"
            class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
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
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        </button>
        </div>
        @endif

        @if (session('success'))
        <div id="alert-3"
        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
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
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            </button>
            </div>
            @endif




            <div class="relative mt-4 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400 display " style="width: 100%" id="table">
                    <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                        <th scope="col" class="px-6 py-3">
                                Id
                        </th>
                         <th scope="col" class="px-6 py-3">
                                    Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                        type contrat
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Nom entreprise
                        </th>

                        <th scope="col" class="px-6 py-3">
                           poste
                        </th>

                        <th scope="col" class="px-6 py-3">
                            periode d'employabilite
                        </th>


                        <th scope="col" class="px-6 py-3">
                            Derniere Activite
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Derniere Service
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Date participation
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
                          <a href="{{ route('odcusers.show', $item->odcuser->id) }}">  {{ $item->name }} </a>
                            </td>
                        <td class="px-6 py-4">
                            {{ $item->type_contrat }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $item->nomboite }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->poste }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->periode }}
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
                    </tr>
                    @php
                        $id_use += 1;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <x-formEmployabilite />

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
                            url: "{{ route('autocomplete') }}",
                            method: "GET",
                            data: {
                                query: query,
                                _token: _token
                            },
                            success: function(data) {
                                $('#countryList').fadeIn();
                                $('#countryList').empty(); // Vider la liste avant d'ajouter de nouveaux éléments
                                let data_user = $.each(data, function(index, item) {
                                    $('#countryList').append('<p id="id_odc" class="hidden">' +  item.id + '</p><ul class= "font-bold"><li class="pl-4 bg-gray-300 hover:bg-gray-400">' + item.first_name +
                                        '  ' + item.last_name + '</li></ul>');



                                });


                            }
                        });
                    } else {
                        $('#countryList').fadeOut();
                    }
                });

                delay:500,

                $(document).on('click', 'li', function() {
                    $('#first_name').val($(this).text());
                 var go=   $("#id_odc").text()
                 $("#id_user").attr("value", go)
                    $('#countryList').fadeOut();
                });
                        //faire une reinitialisation de champ
                    $('#resetButton').click(function() {
                $('#first_name').val(''); // Vider le champ de saisie
                $('#countryList').fadeOut(); // Cacher la liste des suggestions
        });


    });
    new DataTable('#table');

</script>
    @endsection
</x-app-layout>
