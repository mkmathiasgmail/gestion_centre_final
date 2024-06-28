<x-app-layout>
    <form action="{{ route('activites.update', $activite) }}" method="post">
        <div class="p-5 md:p-5 space-y-4 text-white items-center">

            @csrf
            @method('PUT')
            <div>
                <div><label for="title">Title</label></div>
                <div><input type="text" name="title" id="title" class="w-full h-10 rounded-md text-gray-600"
                        placeholder="Donne un titre a votre Article" required value="{{ $activite->title }}"></div>
            </div>

            <div>
                <div><label for="date_debut">Star Date</label></div>
                <div><input type="date" name="date_debut" id="date_debut"
                        class="w-full h-10 rounded-md text-gray-600" placeholder="Donne un titre a votre Article"
                        required value="{{ $activite->start_date }}"></div>
            </div>
            <div>
                <div><label for="date_fin">end Date</label></div>
                <div><input type="date" name="date_fin" id="date_fin" class="w-full h-10 rounded-md text-gray-600"
                        placeholder="Donne un titre a votre Article" required value="{{ $activite->end_date }}"></div>
            </div>

            <div>
                <div><label for="lieu">Location</label></div>
                <div>
                    <select name="lieu" id="lieu" class="w-full h-9 rounded-md text-gray-600">
                        <option value="{{ $activite->location }}">{{ $activite->location }}</option>
                        <option value="kinshasa">Kinshasa</option>
                        <option value="lumubumbashi">Lubumbashi</option>
                    </select>
                </div>
            </div>

            <div>
                <div><label for="tags">Hashtags</label></div>
                <div>
                    <select name="tags[]" id="tags" multiple="multiple"
                        class="w-full  rounded-md text-gray-600 js-example-basic-multiple">
                        @foreach ($activite->hashtag as $item)
                            <option
                                value="{{ old('hashtag', implode(',', $activite->hashtag->pluck('id')->toArray())) }}">
                                {{ $item->name }}</option>
                        @endforeach

                        @foreach ($hashtag as $item)
                            <option
                                value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class=" flex gap-4 w-full">
                <div class=" w-1/2">
                    <div><label for="category_id">Type Events</label></div>
                    <div>
                        <select name="typeEvent[]" id="typeEvent"
                            class="w-full  rounded-md text-gray-600 js-example-basic-multiple" multiple="multiple">
                            @foreach ($typeEvent as $event)
                                <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class=" w-1/2">
                    <div><label for="category_id">Categorie</label></div>
                    <div>
                        <select name="categorie" id="categorie_id"
                            class="w-full h-10 rounded-md text-gray-600 " >
                            <option value="{{ $activite->categorie->id }}">{{ $activite->categorie->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                    <textarea name="description" id="editor" class="w-full text-gray-600">{{ $activite->content }}</textarea>
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

    @section('script')
        <script type="module">
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
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
    @endsection

</x-app-layout>
