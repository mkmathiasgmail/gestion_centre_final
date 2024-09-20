<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-8 text-center ">
            <h1 class="text-2xl font-semibold leading-tight text-gray-200">Connexion</h1>
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1 " type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('mot de passe')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->


        <div class="mt-8 text-center ">
            <div class="mb-4 ">
                <x-primary-button class="text-center ms-3">
                    {{ __('Se connecter') }}
                </x-primary-button>
            </div>

        </div>
    </form>
</x-guest-layout>
