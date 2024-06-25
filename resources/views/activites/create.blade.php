<x-app-layout>
    <form action="{{route("activite.store")}}" method="post">
        @csrf

        <div class=" flex w-full gap-4 p-5">
            <div class="w-2/5">

                <div>
                    <h2 class=" text-white text-3xl mb-5">Formulaire</h2>
                </div>

                <div class=" mb-4">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="name" class="w-full h-10 rounded-md text-gray-600"
                        placeholder="Write your thoughts here..." required>
                </div>

                <div class=" mb-4">
                    <label for="categories"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
                    <select class="js-example-basic-multiple w-full h-10 rounded-md text-gray-600" name="categories[]"
                        multiple="multiple">
                         @foreach ($categories as $item)
                            <option value="{{ $item->categorie }}">{{ $item->categorie }}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" mb-4">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hashtag</label>
                    <select class="js-example-basic-multiple w-full h-10 rounded-md text-gray-600" name="hashtags[]"
                        multiple="multiple">
                        @foreach ($hashtag as $item)
                            <option value="{{ $item->hashtag }}">{{ $item->hashtag }}</option>
                        @endforeach
                    </select>
                </div>


                <div class=" mb-4">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <select class="w-full h-10 rounded-md text-gray-600" name="location">
                        <option value="ODC Kinshasa">ODC Kinshasa</option>
                        <option value="ODC Lubumbashi">ODC Lubumbashi</option>
                        <option value="ODC Matadi">ODC Matadi</option>
                    </select>
                </div>

                <div class=" mb-4">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Form</label>
                    <select class="w-full h-10 rounded-md text-gray-600" name="form">
                        @foreach ($forms as $item)
                            <option value="{{ $item->odcCountry }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" mb-4">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Debut</label>
                    <input type="datetime-local" name="startDate" id="name" class="w-full h-10 rounded-md text-gray-600"
                    >
                </div>

                <div class=" mb-4">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Fin</label>
                    <input type="datetime-local" name="endDate" id="name" class="w-full h-10 rounded-md text-gray-600"
                        >
                </div>

                <div class=" mb-4">

                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Contents</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..." name="contents"></textarea>

                </div>




            </div>
            <div class="w-3/5">




            </div>
        </div>

        <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">send</button>
    </form>




    @section('script')
        <script type="module">
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endsection
</x-app-layout>
