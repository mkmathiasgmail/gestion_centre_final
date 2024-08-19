<x-app-layout>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">

                <span class="font-medium">{{ $error }}</span>

            </div>
        @endforeach
    @endif

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Gestion Activites') }}
                </h2>
            </div>



        </div>

    </x-slot>

    <div class=" mb-4 mt-4 text-white">

        <a class=" cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold"
            href="{{ route('activites.create') }}">Create Activites</a>


    </div>

    @if (Session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- <div class="relative overflow-x-auto mt-4" id="selecteurTab">
        <x-tableactivites :activites="$activites" />
    </div> --}}

    <div class="container bg-gray-500 darj p-4 rounded-lg bg-opacity-5 relative">
        <!-- Header -->
        <div
            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                    Teams
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Create teams, edit, download and more.
                </p>
            </div>

            <div>
                <div class="inline-flex gap-x-2">

                    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        type="button">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4" />
                        </svg>

                        Export
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownInformation"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span
                                class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                Options
                            </span>
                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                                    <path
                                        d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                                </svg>
                                Copy
                            </a>
                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 6 2 18 2 18 9" />
                                    <path
                                        d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                    <rect width="12" height="8" x="6" y="14" />
                                </svg>
                                Print
                            </a>
                        </div>
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span
                                class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                Download options
                            </span>
                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                    <path
                                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                </svg>
                                Excel
                            </a>
                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z" />
                                </svg>
                                .CSV
                            </a>
                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    <path
                                        d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                </svg>
                                .PDF
                            </a>
                        </div>
                       
                    </div>


                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                        <button id="hs-as-table-table-filter-dropdown" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M3 6h18" />
                                <path d="M7 12h10" />
                                <path d="M10 18h4" />
                            </svg>
                            Filter
                            <span
                                class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-neutral-700 dark:text-neutral-300">
                                2
                            </span>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical"
                            aria-labelledby="hs-as-table-table-filter-dropdown">
                            <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <label for="hs-as-filters-dropdown-frequency" class="flex py-2.5 px-3">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="hs-as-filters-dropdown-frequency" checked>
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Frequency</span>
                                </label>
                                <label for="hs-as-filters-dropdown-status" class="flex py-2.5 px-3">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="hs-as-filters-dropdown-status" checked>
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Status</span>
                                </label>
                                <label for="hs-as-filters-dropdown-created" class="flex py-2.5 px-3">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="hs-as-filters-dropdown-created">
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Created</span>
                                </label>
                                <label for="hs-as-filters-dropdown-due-date" class="flex py-2.5 px-3">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="hs-as-filters-dropdown-due-date">
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Due
                                        Date</span>
                                </label>
                                <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="hs-as-filters-dropdown-amount">
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Amount</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Create Activites
                    </button>
                </div>
            </div>
        </div>
        <!-- End Header -->
        <table id="table"
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 cell-border display">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Categories</th>
                    <th scope="col" class="px-6 py-3">Type Event</th>
                    <th scope="col" class="px-6 py-3">Lieu</th>
                    <th scope="col" class="px-6 py-3">Teming</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Book In seat</th>
                    <th scope="col" class="px-6 py-3">Number Hours</th>
                    <th scope="col" class="px-6 py-3">Date Début</th>
                    <th scope="col" class="px-6 py-3">Date Fin</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>



    <x-statusactive :name="__('Would you like show in calendar this activity? ')" />

    <x-statusdesactive :name="__('Would you like disable in calendar this activity? ')" />

    <x-delete :name="__('Would you like disable in calendar this activity? ')" />

    @section('script')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.btnModal', function() {
                    let id = $(this).data('dropdown-toggle');
                    $('.modal').not('#' + id).hide();
                    $('#' + id).toggle();
                    event.stopPropagation();
                });

                $('body').on('click', function(event) {
                    if (!$(event.target).closest('.modal, .btnModal').length) {
                        $('.modal').hide();
                    }
                });


                $(document).on('click', '.modal', function(event) {
                    event.stopPropagation();
                });


            });
        </script>
        <script>
            function activer(event) {
                event.preventDefault();
                let link = event.target.getAttribute('href');
                document.querySelector('#desactiveStatus form').setAttribute('action', link);
            }

            function desactiver(event) {
                event.preventDefault();
                let link = event.target.getAttribute('href');
                document.querySelector('#activeStatus form').setAttribute('action', link);
            }
        </script>

        <script>
            function destroy(event) {
                event.preventDefault();
                let link = event.target.getAttribute('href');
                document.querySelector('.delete').setAttribute('action', link);
            }

            $(document).ready(function() {
                $('.dt-container').addClass('text-xl text-gray-800 dark:text-gray-200 leading-tight')

                $('.dt-buttons').addClass('mt-4')

                $('.dt-buttons buttons').addClass('cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold')
            })
        </script>

        <script>
            $(document).ready(function() {
                $('#table').on('click', '.btn-menu', function() {
                    const lien = $(this).attr('data-dropdown-toggle')
                    $('#' + lien).fadeToggle('fast')
                })
            })
        </script>

        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('get') }}",
                        type: "GET",
                        dataSrc: function(json) {
                            if (json.error) {
                                alert(json.error);
                                return [];
                            }
                            return json.data;
                        }
                    },

                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'categories',
                            name: 'categories'
                        },
                        {
                            data: 'typEvent',
                            name: 'typEvent'
                        },
                        {
                            data: 'location',
                            name: 'location'
                        },
                        {
                            data: 'message',
                            name: 'message'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'book_a_seat',
                            name: 'book_a_seat'
                        },
                        {
                            data: 'number_day',
                            name: 'number_day'
                        },
                        {
                            data: 'start_date',
                            name: 'start_date'
                        },
                        {
                            data: 'end_date',
                            name: 'end_date'
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

            });
        </script>



        {{-- <script>
            new DataTable('#table', {
                responsive: true,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    }
                ],
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

                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ],
            });
        </script> --}}
    @endsection


</x-app-layout>
