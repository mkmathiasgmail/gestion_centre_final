<x-app-layout>

    

<h1 class=" mt-11 text-center text-5xl font-extrabold dark:text-white">Bienvenu(e) chez Orange Digital Center</h1>

<form class="mt-11 max-w-sm mx-auto" action="{{route('storeqrcode', ['id'=>$id])}}" method="POST">
    @csrf
  <div class="mb-5">
    <label for="first_name" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">First_name</label>
    <input type="text" id="first_name" value="{{$candidat->odcuser->first_name}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
  </div>
  <div class="mb-5">
    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last_name</label>
    <input type="text" id="last_name" value="{{$candidat->odcuser->last_name}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
  </div>
  <div class="mb-5">
    <label for="activite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activite</label>
    <input type="text" id="activite" value="{{$candidat->activite->title}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
  </div>

  <button type="submit" class=" items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">validate</button>
</form>
    <div class=" bg-white items-center">
      {{ $code }}
    </div>

</x-app-layout>