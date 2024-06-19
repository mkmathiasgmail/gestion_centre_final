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

        <a class=" cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold" data-modal-target="default-modal1"
            data-modal-toggle="default-modal1">Create Activites</a>


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
        </table>
    </div>

    <x-delete :name="__('Are you sure you want to delete this product? ')" />
    <div id="default-modal1" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center max-w-9xl md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Creation activites
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('activites.store') }}" method="post" id="delete">
                    <div class="p-5 md:p-5 space-y-4 text-white items-center">

                        @csrf
                        <div>
                            <div><label for="title">Title</label></div>
                            <div><input type="text" name="title" id="title"
                                    class="w-full h-10 rounded-md text-gray-600"
                                    placeholder="Donne un titre a votre Article" required></div>
                        </div>

                        <div>
                            <div><label for="date_debut">Star Date</label></div>
                            <div><input type="date" name="date_debut" id="date_debut"
                                    class="w-full h-10 rounded-md text-gray-600"
                                    placeholder="Donne un titre a votre Article" required></div>
                        </div>
                        <div>
                            <div><label for="date_fin">end Date</label></div>
                            <div><input type="date" name="date_fin" id="date_fin"
                                    class="w-full h-10 rounded-md text-gray-600"
                                    placeholder="Donne un titre a votre Article" required></div>
                        </div>

                        <div>
                            <div><label for="lieu">Location</label></div>
                            <div>
                                <select name="lieu" id="lieu" class="w-full h-9 rounded-md text-gray-600">
                                    <option value="kinshasa">Kinshasa</option>
                                    <option value="lumubumbashi">Lubumbashi</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div><label for="tags">Hashtags</label></div>
                            <div>
                                <select name="tags" id="tags" multiple
                                    class="w-full  rounded-md text-gray-600">
                                    @foreach ($hashtag as $item)
                                        <option value="{{ $item->id }}">{{ $item->hashtag }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class=" flex gap-4 w-full">
                            <div class=" w-1/2">
                                <div><label for="category_id">Type Events</label></div>
                                <div>
                                    <select name="typeEvent" id="categorie_id"
                                        class="w-full  rounded-md text-gray-600" multiple>
                                        @foreach ($typeEvent as $event)
                                            <option value="{{ $event->id }}">{{ $event->typeEvent }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class=" w-1/2">
                                <div><label for="category_id">Categorie</label></div>
                                <div>
                                    <select name="categorie_id" id="categorie_id"
                                        class="w-full h-10 rounded-md text-gray-600">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class=" mb-5 mt-5">
                            <div>
                                <label for="contenue">Content</label>
                            </div>
                            <div class="text-gray-600">
                                <textarea name="description" id="editor" class="w-full text-gray-600"></textarea>
                            </div>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="default-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-hide="default-modal" type="reset"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                // responsive: true,
                // columnDefs: [{
                //         responsivePriority: 1,
                //         targets: 0
                //     },
                //     {
                //         responsivePriority: 2,
                //         targets: -1
                //     }
                // ],
                // layout: {
                //     topStart: {
                //         pageLength: {
                //             menu: [10, 25, 50, 100, 200]
                //         }
                //     },
                //     topEnd: {
                //         search: {
                //             placeholder: 'Type search here'
                //         }
                //     },
                //     bottomEnd: {
                //         paging: {
                //             numbers: 3
                //         }
                //     },

                // }

                scrollY: 600,
                paging: false

            });

            document.addEventListener('DOMContentLoaded', function() {
                var rows = document.querySelectorAll('#table tbody tr');

                rows.forEach(function(row) {
                    var startDateText = row.querySelector('#startdate').textContent.trim();
                    var endDateText = row.querySelector('#endate').textContent.trim();

                    var startDate = new Date(startDateText);
                    var endDate = new Date(endDateText);

                    if (!isNaN(startDate) && !isNaN(endDate)) {
                        var differenceInTime = endDate - startDate;
                        var differenceInDays = Math.ceil(differenceInTime / (1000 * 60 * 60 * 24));
                        row.querySelector('#nbredays').textContent = differenceInDays + ' jours';
                    } else {
                        row.querySelector('#nbredays').textContent = 'Invalid dates';
                    }
                });
            });

            document.querySelector('.dt-layout-row label').setAttribute('class', 'text-white text-sm font-bold');
            document.querySelector('.dt-length select').setAttribute('class', 'w-1/2 h-9 rounded-md text-gray-600');
            document.querySelector('.dt-search input').setAttribute('class', 'w-1/2 h-9 rounded-md text-gray-600');
            document.querySelector('.dt-search label').setAttribute('class', 'text-white text-sm font-bold');
        </script>
    @endsection


</x-app-layout>
