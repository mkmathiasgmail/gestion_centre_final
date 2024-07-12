<x-app-layout>
   
<form action="{{ route('send.email') }}" method="POST">
    @csrf
    <label for="message">Message:</label>
    <textarea id="message" name="message"></textarea>

    <label for="categories">Catégories:</label>
    <select id="categories" name="categories[]" multiple>
        <option value="all">Tous</option>
        <option value="women">Femmes</option>
        <option value="men">Hommes</option>
        <option value="students">Étudiants</option>
    </select>

    <button type="submit">Envoyer</button>
</form>

</x-app-layout>