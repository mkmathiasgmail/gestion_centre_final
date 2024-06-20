<x-app-layout>

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

        <a class=" cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold" data-modal-target="create"
            data-modal-toggle="create">Create Activites</a>


    </div>

    <div class="relative overflow-x-auto mt-4">
        <table id="table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
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
                        Date_debut
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Date_fin
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Duree
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($activites as $i => $item)
                    <tr id="rowAll">
                        <th scope="col" class="px-6 py-3">
                            {{ $i + 1 }}
                        </th>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->categorie->categorie }}
                        </td>
                        <td scope="col" class="px-6 py-3">
                            @foreach ($item->hashtag as $hasthtag)
                                <span>{{ $hasthtag->hashtag }}</span>
                            @endforeach
                        </td>
                        <td scope="col" class="px-6 py-3">
                            @foreach ($item->typEvent as $event)
                                <span>{{ $event->typeEvent }}</span>
                            @endforeach
                        </td>
                        <td scope="col" class="px-6 py-3">
                            {{ $item->location }}
                        </td>

                        <td scope="col" class="px-6 py-3" id="startdate">
                            {{ $item->startDate }}
                        </td>

                        <td scope="col" class="px-6 py-3" id="endate">
                            {{ $item->endDate }}
                        </td>

                        <td id="nbredays">
                            {{ $item->differenceInDays }} Jours
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
            <tfoot thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
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
                        Date_debut
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Date_fin
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Duree
                    </td>
                    <td scope="col" class="px-6 py-3">
                        Action
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <x-delete :name="__('Are you sure you want to delete this product? ')" />
    <x-form :hash="$hashtag" :event="$typeEvent" :categories="$categories" />

   

    @section('script')
        <script>
            function destroy(event) {
                event.preventDefault();
                let link = event.target.getAttribute('href');
                document.querySelector('#delete').setAttribute('action', link);
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
                        }
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

                }

               

            });

            
            document.querySelector('.dt-layout-row label').setAttribute('class', 'text-white text-sm font-bold');
            document.querySelector('.dt-length select').setAttribute('class', 'w-1/2 h-9 rounded-md text-gray-600');
            document.querySelector('.dt-search input').setAttribute('class', 'w-1/2 h-9 rounded-md text-gray-600');
            document.querySelector('.dt-search label').setAttribute('class', 'text-white text-sm font-bold');
        </script>
    @endsection


</x-app-layout>
