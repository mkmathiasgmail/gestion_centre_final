<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Gestion Activites') }}
                </h2>
            </div>
        </div>
    </x-slot>
    @if ($activites->isEmpty())
        <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-medium">Oups desole!</span> Change a few things up and try submitting again.
        </div>
    @else
  
        <div class="relative overflow-x-auto mt-4">
            <table id="table"  class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                           Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lieu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date_debut
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date_fin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activites as $i=> $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $item->id }}
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ route('activites.show', $item->id) }}">{{ $item->title }}</a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->categorie->categorie }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->location }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->startDate }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->endDate }}
                            </td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="{{ route('presences.create', $item->id) }}"
                                    class=" p-2 bg-blue-600">Selectionner</a>


                            </td>
                         
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    @endif



    @section('script')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script>
            new DataTable('#table');
        </script>
    @endsection
</x-app-layout>
