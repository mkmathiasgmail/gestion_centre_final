<x-app-layout>
    <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900"><a href="{{route('presences.create')}}">Ajouter une presence</a></button>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
        <thead class="text-xs text-white uppercase bg-yellow-500 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    DateTimeEnter
                </th>
                
                <th scope="col" class="px-6 py-3">
                   Candidat_Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                 </th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($presence as $item)
            <tr class="bg-gray-500 border-b border-white-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{$item->id}}
                </th>
                <td class="px-6 py-4">
                   {{ $item->date }}
                </td>
                
                <td class="px-6 py-4">
                    {{ $item->candidat_id }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"">modifier</a>
                </td>
            </tr>
            @endforeach
            
           
           
        </tbody>
    </table>
</div>



</x-app-layout>

