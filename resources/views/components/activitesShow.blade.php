@props(['show'])



<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel"
    aria-labelledby="profile-tab">


    <div class="flex flex-wrap justify-between">
        <div class="w-full md:w-8/12 px-4 mb-8">
            <img src="{{ $show->thumbnail_url }}" alt="Featured Image" class="w-full h-64 object-cover rounded">
            {{ $show->categorie->name }}
            <h2 class="text-4xl font-bold mt-4 mb-2">{{ $show->title }}</h2>
            {!! $show->content !!}
        </div>
        <div class="w-full md:w-4/12 px-4 mb-8">
            <div class="bg-gray-100 px-4 py-6 rounded">
                <h3 class="text-lg font-bold mb-2">Hashtags</h3>
                <ul class="list-disc list-inside">
                    @foreach ($show->hashtag as $item)
                        <li><a href="#"
                                class="mb-8 text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out rounded-full bg-gray-100 dark:bg-gray-700 px-3 py-1 text-[10px]  dark:text-gray-300">#
                                {{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
