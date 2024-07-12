@props(['show'])



<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel"
    aria-labelledby="profile-tab">


    <div class=" text-white">
        <div class=" flex justify-between items-center">
            <div>
                <h2 class=" text-5xl mb-4">{{ $show->title }}</h2>
                <span
                    class="rounded-full mt-5 mb-5 bg-slate-600 pr-4 pl-4 pt-1 pb-1 text-3xl font-bold">{{ $show->categorie->name }}</span>
            </div>
            <div>
                <a href="{{ route('activites.edit', $show->id) }}"
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">update</a>
            </div>
        </div>

        <img src="{{ $show->thumbnail_url }}" alt="" class=" rounded-md mt-5 mb-5">
        @foreach ($show->hashtag as $item)
            <kbd
                class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">{{$item->name}}</kbd>
        @endforeach
       
        <div class="mt-5 mb-5 text-justify">{!! $show->content !!}</div>
    </div>
</div>
