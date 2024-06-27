@props(['show'])



<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel"
    aria-labelledby="profile-tab">
    <div class=" text-white">
        <h2 class=" text-5xl">{{ $show->title }}</h2>
        <img src="{{ $show->thumbnail_url }}" alt="" class=" rounded-md mt-5 mb-5">
        <span
            class="rounded-full mt-5 mb-5 bg-slate-600 pr-4 pl-4 pt-1 pb-1 text-3xl font-bold">{{ $show->categorie->categorie }}</span>
        <p class="mt-5 mb-5">{{ $show->content }}</p>
    </div>
</div>
