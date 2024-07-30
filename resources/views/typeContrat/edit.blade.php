<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifier les Types de contrats') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500">
                    <form method="POST" action="{{ route('type_Contrats.update', $typeContrat->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-bold text-gray-700">Etiquette du type de contrat</label>
                            <input type="text" name="libelle" id="name" value="{{ $typeContrat->libelle }}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                        </div>

                        <button type="submit" class="px-4 py-2 font-bold text-white rounded bg-slate-700 hover:bg-slate-800">Modifier</button>
                        <a href="{{ route('type_Contrats.index') }}" class="px-4 py-2 ml-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
