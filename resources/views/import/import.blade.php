<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Importation CSV') }}
        </h2>
    </x-slot>

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto mt-4" >
        @csrf
        <div class="mb-5">
            <label for="activite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selectionne l'activité:</label>
            <select id="activite" name="activite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($activites as $activite)
                <option value="{{ $activite->id }}">{{ $activite->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Importer Fichier</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="file" type="file"  name="file">
            <div class="mt-3 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">N'importez que des fichier CSV dans ce champ</div>
        </div>
        <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Importer CSV</button>
    </form>
</x-app-layout>

