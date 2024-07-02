<x-app-layout>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">

                <span class="font-medium">{{ $error }}</span>

            </div>
        @endforeach
    @endif
    <form action="{{ route('activites.update', $activite) }}" method="POST">
        <div class="p-5 md:p-5 space-y-4 text-white items-center">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="w-full h-10 rounded-md text-gray-600"
                    placeholder="Donne un titre à votre Article" required value="{{ $activite->title }}">
            </div>

            <div>
                <label for="date_debut">Start Date</label>
                <input type="date" name="startDate" id="date_debut" class="w-full h-10 rounded-md text-gray-600"
                    required value="{{ $activite->start_date }}">
            </div>

            <div>
                <label for="date_fin">End Date</label>
                <input type="date" name="endDate" id="date_fin" class="w-full h-10 rounded-md text-gray-600"
                    required value="{{ $activite->end_date }}">
            </div>

            <div>
                <label for="lieu">Location</label>
                <select name="location" id="lieu" class="w-full h-9 rounded-md text-gray-600">
                    <option value="{{ $activite->id }}">{{ $activite->location }}</option>
                    <option value="ODC Kinshasa">ODC Kinshasa</option>
                    <option value="ODC Lubumbashi">ODC Lubumbashi</option>
                    <option value="ODC Matadi">ODC Matadi</option>
                </select>
            </div>

            <div>
                <label for="tags">Hashtags</label>
                <select name="tags[]" id="tags" multiple
                    class="w-full rounded-md text-gray-600 js-example-basic-multiple">
                    @foreach ($hashtag as $item)
                        <option value="{{ $item->id }}"
                            {{ collect(old('tags', $activite->hashtag->pluck('id')->toArray()))->contains($item->id) ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4 w-full">
                <div class="w-1/2">
                    <label for="typeEvent">Type Events</label>
                    <select name="typeEvent[]" id="typeEvent"
                        class="w-full rounded-md text-gray-600 js-example-basic-multiple" multiple="multiple">
                        @foreach ($typeEvent as $event)
                            <option value="{{ $event->id }}" @if (in_array($event->id, $activite->typEvent->pluck('id')->toArray())) selected @endif>
                                {{ $event->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/2">
                    <label for="categorie_id">Categorie</label>
                    <select name="categories" id="categorie_id" class="w-full h-10 rounded-md text-gray-600">
                        <option value="{{ $activite->categorie->id }}">{{ $activite->categorie->name }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-5 mt-5">
                <label for="contenue">Content</label>
                <textarea name="contents" id="editor" class="w-full text-gray-600">{{ $activite->content }}</textarea>
            </div>
        </div>

        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">I
                accept</button>
            <button type="reset"
                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Decline</button>
        </div>
    </form>

    @section('script')
        <script type="module">
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.querySelector('#editor'), {
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
                            '@apple', '@bears', '@brownie', '@cake', '@candy', '@canes',
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
            }).catch(error => {
                console.error(error);
            });
        </script>
    @endsection
</x-app-layout>
