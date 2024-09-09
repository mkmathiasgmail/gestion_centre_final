<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Register') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-transparent shadow-xl dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-transparent border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-gray-800 bg-transparent dark:text-gray-200">
                        <div class="flex flex-col bg-transparent md:flex-row">
                            <div class="p-6 lg:w-3/5 xl:w-1/2 sm:p-12">
                                <div class="flex flex-col items-center mt-12">
                                    <div class="flex-1 w-full mt-8">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <!-- Name -->
                                            <div>
                                                <x-input-label for="name" class="text-gray-800 dark:text-gray-200"
                                                    :value="__('Nom d\'utilisateur')" />
                                                <x-text-input id="name" class="block w-full mt-1" type="text"
                                                    name="name" :value="old('name')" required autofocus
                                                    autocomplete="name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>

                                            <!-- Email Address -->
                                            <div class="mt-4">
                                                <x-input-label for="email" class="text-gray-800 dark:text-gray-200"
                                                    :value="__('Email')" />
                                                <x-text-input id="email" class="block w-full mt-1" type="email"
                                                    name="email" :value="old('email')" required autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>


                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-input-label for="password" class="text-gray-800 dark:text-gray-200"
                                                    :value="__('Mot de passe')" />

                                                <x-text-input id="password" class="block w-full mt-1" type="password"
                                                    name="password" required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mt-4">
                                                <x-input-label for="password_confirmation"
                                                    class="text-gray-800 dark:text-gray-200" :value="__('Confirmez votre mot de passe')" />

                                                <x-text-input id="password_confirmation" class="block w-full mt-1"
                                                    type="password" name="password_confirmation" required
                                                    autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('login') }}">
                                                    {{ __('Déjà enregistré?') }}
                                                </a>

                                                <x-primary-button class="ms-4">
                                                    {{ __('S\'enregistrer') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex-1 bg-[url('https://cdn.dribbble.com/users/1784878/screenshots/7796443/media/0031c85ef8274ccf77cad2adb3263aa4.gif')] bg-cover bg-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
