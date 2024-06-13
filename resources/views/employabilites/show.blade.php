<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employabilites') }}
        </h2>
    </x-slot>



        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-500  border-b border-gray-500">
                        <div class="font-semibold text-xl text-gray-800 dark:text-yellow-300 leading-tight">
                <div class="font-semibold text-xl text-gray-800 dark:text-yellow-300 leading-tight">
                    <p>{{$employabilites->name}}</p>
                </div>
                <div class="font-semibold text-xl text-gray-800 dark:text-yellow-300 leading-tight">
                    <p>{{$employabilites->type_contrat}}</p>
                </div>
                <div class="font-semibold text-xl text-gray-800 dark:text-yellow-300 leading-tight">
                    <p>{{$employabilites->nomboite}}</p>
                </div>
                <div class="font-semibold text-xl text-gray-800 dark:text-yellow-300 leading-tight">
                    <p>{{$employabilites->periode}}</p>
                </div>

        </div>








</x-app-layout>
