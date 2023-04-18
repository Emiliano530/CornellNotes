<x-guest-layout>
    <x-slot name="headtext"><span name="head" class="ml-2 dark:text-white font-bold text-3xl"><h1>Recuperar contraseña</h1></span></x-slot>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-center">
        <h1 class="text-lg text-white">¿Olvidaste tu contraseña?</h1>
        <br>
        Ningún problema. Ingrese su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Reestablecer contraseña') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
