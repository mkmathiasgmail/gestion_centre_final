 @props(['activite'])



<div class="max-w-sm mx-auto">
    

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto mt-4" >

        @csrf
        <input type="hidden" name="activite" value="{{ $activite->id }}">
        <!--<p>{{ $activite->title }}</p>-->

        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Importer Fichier</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="file" type="file" accept=".csv" name="file" placeholder="*CSV file">
            <div class="mt-3 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">N'importez que des fichier CSV dans ce champ</div>
        </div>
        <button type="submit" class="text-white bg-blue-700 border border-gray-300 focus:outline-none hover:bg-blue-800 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-800 dark:text-white dark:border-gray-600 dark:hover:bg-blue-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Importe ton CSV</button>
    </form>
    
    <form action="{{ route('export') }}" method="POST" class="ml-30 mb-10">
        @csrf
        <input type="hidden" name="activite" value="{{ $activite->id }}">

        <div class="mb-5">
            <button class="text-white bg-blue-700 border border-gray-300 focus:outline-none  focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 flex">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
                Telecharger Model 
            </button>
        </div>
    </form>
</div> 