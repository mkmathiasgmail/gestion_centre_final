<x-app-layout>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">

                <span class="font-medium">{{ $error }}</span>

            </div>
        @endforeach
    @endif
    <form action="{{ route('activite.store') }}" method="post">
        @csrf

                <div>
                    <h2 class=" text-white text-3xl mb-5">Formulaire</h2>
                </div>


        <div class="p-5 md:p-5 space-y-4 text-white items-center">
            @csrf

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Donne un titre à votre Article" required value="">
                </div>

            <div>
                <label for="date_debut">Start Date</label>
                <input type="date" name="startDate" id="date_debut"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required value="">
            </div>

            <div>
                <label for="date_fin">End Date</label>
                <input type="date" name="endDate" id="date_fin"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>

            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Form</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="form">
                    @foreach ($forms as $item)
                        <option value="{{ $item->_id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>

                <label for="date_debut">Upload File</label>
                <div class=" flex items-center gap-4">

                    <input type="file" id="file"
                        class="block w-full mb-4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                    <input onclick="formImg()" type="button"
                        class="py-2.5 px-5 me-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        value="Upload" id="but_upload">
                </div>

                <div class='preview' id="preview">
                    <img src="" id="img" class=" hidden w-96 h-96 object-cover">
                    <input type="text" name="thumbnailURL" value="" class=" hidden" id="imgGet">
                </div>

            </div>


            <div>
                <label for="lieu">Location</label>
                <select name="location" id="lieu"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="ODC Kinshasa">ODC Kinshasa</option>
                        <option value="ODC Lubumbashi">ODC Lubumbashi</option>
                        <option value="ODC Matadi">ODC Matadi</option>
                    </select>
                </div>

            <div>
                <label for="tags">Hashtags</label>
                <select name="hashtags[]" id="tags" multiple
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 js-example-basic-multiple">
                    @foreach ($hashtag as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}

                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4 w-full">
                <div class="w-1/2">
                    <label for="typeEvent">Type Events</label>
                    <select name="typeEvent[]" id="typeEvent"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 js-example-basic-multiple"
                        multiple="multiple">
                        @foreach ($typeEvent as $event)
                            <option value="{{ $event->id }}">
                                {{ $event->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/2">
                    <label for="categorie_id">Categorie</label>
                    <select name="categories[]" id="categorie_id"
                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..." id="paragraph" name="contents"></textarea>
            </div>



            <div id="paraphe"></div>
            <div id="socialmedia"></div>

            <div class=" flex gap-5 mb-10">
                <button
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                    type="button" onclick="addParagraph()" id="addParaphe">ajouter
                    un paragraphe</button>

                <button
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                    type="button" onclick="addSocialMedia()" id="addParaphe">ajouter
                    un Social</button>

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
        <script>
            $(document).ready(function() {
                $("#preview").click(function() {
                    var src = $(this).attr('src');
                    $('#preview').addClass('active');
                    $(".active").css({
                        background: 'RGBA(0,0,0,.5)',
                        width: '100%',
                        height: '100%',
                        position: 'fixed',
                        zIndex: '1000',
                        top: '0',
                        left: '0',
                        cursor: 'zoom-out',
                        transition: 'background-color 0.3s ease-in-out',
                        cursor: 'pointer',
                        padding: '50px'



                    }).click(function() {
                        $(this).remove();

                    });



                    $(".active img").css({

                        width: '100%',
                        height: 'auto'



                    })

                })


            })
        </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.querySelector('#paragraph'), {
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
        <script>
            async function formImg() {
                let imageodc = document.getElementById('file');
                let formData = new FormData();
                formData.append('image', imageodc.files[0]);
                console.log('loading ...')
                try {
                    let response = await axios.post('http://10.143.41.70:8000/2024/odc/public/api/events/image', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data;boundary=----WebKitFormBoundaryr1kAOhJc5HAUT41f'
                        }
                    });

                    console.log(response.data.data[0]);

                    if (response) {
                        document.getElementById('img').setAttribute('src', response.data.data[0]);
                        document.getElementById('imgGet').setAttribute('value', response.data.data[0]);
                        document.getElementById('img').style.display = 'block';
                    } else {
                        return null;
                    }

                } catch (error) {
                    console.error('Error uploading image:', error);
                    return null;
                }
            }


            function addSocialMedia() {
                let contentIndex = 0;
                contentIndex++;
                const block = `
                <div id="alert-border-5"
                           class="items-center p-4 border-t-4 border-gray-300 bg-gray-50 dark:bg-gray-800 dark:border-gray-600 mb-4"
                            role="alert">
                       <div class="flex mb-4">
                                <svg class="flex-shrink-0 w-4 h-4 dark:text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div class="ms-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                                    A simple dark alert with an <a href="#"
                                        class="font-semibold underline hover:text-gray-800 hover:no-underline dark:text-gray-300">example
                                        link</a>. Give it a click if you like.
                                </div>
                                <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                                    data-dismiss-target="#alert-border-5" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                    </div>         
                    <input type="hidden" name="content[${contentIndex}][type]" value="socialMedia">
                    <input type="text" id="socialMediaLink_${contentIndex}" name="content[${contentIndex}][link]" required  class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                </div>    
            `;
                document.getElementById('socialmedia').insertAdjacentHTML('beforeend', block);
            }

            function addParagraph() {
                let contentIndex = 0;
                contentIndex++;
                const block = `
                <div id="alert-border-5"
                           class="items-center p-4 border-t-4 border-gray-300 bg-gray-50 dark:bg-gray-800 dark:border-gray-600 mb-4"
                            role="alert">
                    <div class="flex mb-4">
                                <svg class="flex-shrink-0 w-4 h-4 dark:text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div class="ms-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                                    A simple dark alert with an <a href="#"
                                        class="font-semibold underline hover:text-gray-800 hover:no-underline dark:text-gray-300">example
                                        link</a>. Give it a click if you like.
                                </div>
                                <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                                    data-dismiss-target="#alert-border-5" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                    </div>        
                    <input type="hidden" name="content[${contentIndex}][type]" value="paragraph">
                    <textarea id="paragraph" name="content[${contentIndex}][item]" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                </div>
            `;
                document.getElementById('paraphe').insertAdjacentHTML('beforeend', block);
            }
        </script>
        <script type="module">
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endsection
</x-app-layout>
