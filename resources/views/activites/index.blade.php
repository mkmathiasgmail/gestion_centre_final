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

    <div class="relative overflow-x-auto mt-4">
        <table id="table"
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 cell-border">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <td scope="col" class="px-6 py-3">
                        Title
                    </td>
                    <td scope="col" class="px-6 py-3">
                        categories
                    </td>
                    <td scope="col" class="px-6 py-3">
                        hashtag
                    </td>
                    <td scope="col" class="px-6 py-3">
                        type event
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Lieu
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Teming
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Status
                    </td>

                    <td scope="col" class="px-6 py-3">
                        number hours
                    </td>


                    <td scope="col" class="px-6 py-3">
                        Date_debut
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Date_fin
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($activites as $i => $item)
                    <tr id="rowAll" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="col" class="px-6 py-3">
                            {{ $i + 1 }}
                        </th>

                        <td scope="col" class="px-6 py-3">
                            <a href="{{ route('activites.show', $item->id) }}">{{ $item->title }}</a>
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->categorie->name }}
                        </td>
                        <td scope="col" class="px-6 py-3">
                            @foreach ($item->hashtag as $hasthtag)
                                <span>{{ $hasthtag->name }}</span>
                            @endforeach
                        </td>
                        <td scope="col" class="px-6 py-3">
                            @foreach ($typeEvent as $event)
                                <span>{{ $event->title }}</span>
                            @endforeach
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->location }}
                        </td>

                        <td id="nbredays">
                            {{ $item->message }}
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->status ? '✔️' : '⭕️' }}
                        </td>


                        <td scope="col" class="px-6 py-3" id="startdate">
                            {{ $item->number_hours }}
                        </td>

                        <td scope="col" class="px-6 py-3" id="startdate">
                            {{ $item->start_date }}
                        </td>

                        <td scope="col" class="px-6 py-3" id="endate">
                            {{ $item->end_date }}
                        </td>



                        <td>
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $i }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDots{{ $i }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                        <a href="{{ route('activites.show', $item->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                    </li>
                                    <li>
                                        <a onclick="destroy(event)" href="{{ route('activites.destroy', $item->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-target="delete" data-modal-toggle="delete">Delete</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('activites.edit', $item->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Status</a>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
            {{-- <tfoot thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <td scope="col" class="px-6 py-3">
                        Title
                    </td>
                    <td scope="col" class="px-6 py-3">
                        categories
                    </td>
                    <td scope="col" class="px-6 py-3">
                        hashtag
                    </td>
                    <td scope="col" class="px-6 py-3">
                        type event
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Lieu
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Teming
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Status
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Show in Slider
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Live Status
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Book a Seat
                    </td>


                    <td scope="col" class="px-6 py-3">
                        Date_debut
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Date_fin
                    </td>

                    <td scope="col" class="px-6 py-3">
                        Action
                    </td>
                </tr>
            </tfoot> --}}
        </table>
    </div>

    <x-delete :name="__('Are you sure you want to delete this product? ')" />



    @section('script')
        <script>
            function destroy(event) {
                event.preventDefault();
                let link = event.target.getAttribute('href');
                document.querySelector('.delete').setAttribute('action', link);
            }
        </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'exportPDF', 'exportWord', '|',
                            'findAndReplace', 'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                            'removeFormat', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                            '-',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                            'alignment', '|',
                            'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                            '|',
                            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                            'textPartLanguage', '|',
                            'sourceEditing'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    list: {
                        properties: {
                            styles: true,
                            startIndex: true,
                            reversed: true
                        }
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },

                    fontFamily: {
                        options: [
                            'default',
                            'Arial, Helvetica, sans-serif',
                            'Courier New, Courier, monospace',
                            'Georgia, serif',
                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                            'Tahoma, Geneva, sans-serif',
                            'Times New Roman, Times, serif',
                            'Trebuchet MS, Helvetica, sans-serif',
                            'Verdana, Geneva, sans-serif'
                        ],
                        supportAllValues: true
                    },

                    fontSize: {
                        options: [10, 12, 14, 'default', 18, 20, 22],
                        supportAllValues: true
                    },

                    htmlSupport: {
                        allow: [{
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }]
                    },

                    htmlEmbed: {
                        showPreviews: false
                    },

                    link: {
                        decorators: {
                            addTargetToExternalLinks: true,
                            defaultProtocol: 'https://',
                            toggleDownloadable: {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'file'
                                }
                            }
                        }
                    },

                    mention: {
                        feeds: [{
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                                '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                                '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                                '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }]
                    },
                    language: 'fr',
                    licenseKey: '',
                })
                .catch(error => {
                    console.error(error);
                });
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
        <script>
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
        </script>
    @endsection


</x-app-layout>
