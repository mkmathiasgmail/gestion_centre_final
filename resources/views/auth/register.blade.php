<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom d\'utilisateur')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="mt-4 hidden">
            <x-input-label for="location" :value="__('Emplacement')" />
            <input type="text" name="location" id="location"
                class="block mt-1 w-full rounded-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm"
                :value="old('location')" readonly>
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmez votre mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Déjà enregistré?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'enregistrer') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the browser supports geolocation
            if (navigator.geolocation) {
                // Get the user's current position
                navigator.geolocation.getCurrentPosition(function(position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;

                        // Use Nominatim API to reverse geocode the coordinates to an address
                        axios.get('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat +
                                '&lon=' + lng + '&zoom=18&addressdetails=1')
                            .then(function(res) {
                                var data = res.data;
                                var placeName = data.address.state;
                                document.getElementById("location").value = placeName;
                            })

                            .catch(function(error) {
                                console.error('Error during reverse geocoding:', error);
                            });
                    },
                    function(error) {
                        console.error('Error getting location:', error);
                    });
            } else {
                console.error('Geolocation is not supported by this browser.');
            }
        });
    </script>
</x-guest-layout>
