<x-app-layout>





    <div class=" w-full bg-[#fcdab40a] darj p-4 rounded-lg bg-opacity-5 relative">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                Activités
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Créez des activités, modifiez, exportez et bien plus encore.
            </p>
        </div>
        <table id="table"
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 cell-border display">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Titre</th>
                    <th scope="col" class="px-6 py-3">Categories</th>
                    <th scope="col" class="px-6 py-3">Lieu</th>
                    <th scope="col" class="px-6 py-3">Book In seat</th>
                    <th scope="col" class="px-6 py-3">Date Début</th>
                    <th scope="col" class="px-6 py-3">Date Fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorie->activites as $key => $activite)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $activite->title }}</td>
                        <td>{{ $activite->categorie->name }}</td>
                        <td>{{ $activite->location }}</td>
                        <td>{{ $activite->book_a_seat }}</td>
                        <td>{{ $activite->start_date }}</td>
                        <td>{{ $activite->end_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>



    @section('script')
        <script>
            $(document).ready(function() {
                $('#table').DataTable({
                    language: {
                        lengthMenu: 'Afficher les entrées _MENU_',
                        info: 'Affichage de la page _PAGE_ sur _PAGES_'
                    },
                });


                $('.dt-container').addClass('text-base text-gray-800 dark:text-gray-400 leading-tight')

                $('.dt-buttons').addClass('mt-4')
                $('.dt-buttons buttons').addClass('cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold')

                $("#dt-length-0").addClass('text-gray-700 dark:text-gray-400 w-24 bg-white');

                $('.dt-input').addClass('w-20')



            });
        </script>
    @endsection

</x-app-layout>
