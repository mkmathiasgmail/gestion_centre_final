<x-app-layout>
      <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Presences') }}
                </h2>
            </div>



        </div>

    </x-slot>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg text-white">
    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100" id="presence">
        <thead class="text-xs text-white uppercase dark:text-white bg-slate-600">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                 <th scope="col" class="px-6 py-3">
                   Candidat_Id
                </th>
                <th scope="col" class="px-6 py-3">
                    First_name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last_name
                </th>

                <th scope="col" class="px-6 py-3">
                    DateTimeEnter
                </th>
                 <th scope="col" class="px-6 py-3">
                   Activite
                </th>
                
               
               
               
            </tr>
        </thead>
        <tbody>
            @foreach ($presences as $item)
            <tr class="bg-gray-500 border-b border-white-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{$item->id}}
                </th>
                <td class="px-6 py-4">
                    {{ $item->candidat_id }}
                </td>
                <td class="px-6 py-4">
                   {{ $item->candidat->odcuser->first_name }}
                </td>
                <td class="px-6 py-4">
                   {{ $item->candidat->odcuser->last_name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->date }}
                </td>
                <td class="px-6 py-4">
                   {{ $item->candidat->activite->title }}
                </td>
                
               
            </tr>
            @endforeach
            
           
           
        </tbody>
    </table>
</div>


@section('script')
    <script>
        new DataTable('#presence');
    </script>
@endsection

</x-app-layout>

