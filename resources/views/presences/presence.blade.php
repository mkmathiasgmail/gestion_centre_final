<x-app-layout>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
        <thead class="text-xs text-white uppercase dark:text-white">
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
               
            </tr>
            @endforeach
            
           
           
        </tbody>
    </table>
</div>



</x-app-layout>

