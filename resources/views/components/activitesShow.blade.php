@props(['show'])



<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel"
    aria-labelledby="profile-tab">

    
    <div class=" text-white">
        <div class=" flex justify-between items-center">
            <div>
                <h2 class=" text-5xl">{{ $show->title }}</h2>
            </div>
            <div>
                <a href="{{ route('activites.edit',$show->id) }}"  class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">update</a>
            </div>
        </div>

        <img src="{{ $show->thumbnail_url }}" alt="" class=" rounded-md mt-5 mb-5">
        <span
            class="rounded-full mt-5 mb-5 bg-slate-600 pr-4 pl-4 pt-1 pb-1 text-3xl font-bold">{{ $show->categorie->categorie }}</span>
        <p class="mt-5 mb-5">{{ $show->content}}</p>
    </div>
</div>
