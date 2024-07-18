<x-app-layout>
   
<form action="{{ route('send.email') }}" method="POST">
    @csrf
    <br>
    <label for="message">Message:</label>
    <textarea id="message" name="message"></textarea><br>

    <label for="categories" >Catégories:</label>
    <select id="categories" name="categories[]">
        <option value="all">Tous</option>
        <option value="women">Femmes</option>
        <option value="men">Hommes</option>
        <option value="students">Étudiants</option>
    </select>
    <br>
    <br>
    <button type="submit" class="... ring-4" >Envoyer</button>
</form>

</x-app-layout>