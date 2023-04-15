<x-guest-layout>
<x-slot name="headtext"><span name="head" class="ml-2 dark:text-white font-bold text-3xl"><h1>Registrarse</h1></span></x-slot>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full h-2/4" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div  class="mt-4">
            <x-input-label for="lastName" :value="__('Apellido')" />
            <x-text-input id="lastName" class="block mt-1 w-full h-2/4" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        <!-- Control Number -->
        <div  class="mt-4">
            <x-input-label for="controlNumber" :value="__('Numero de Control')" />
            <x-text-input id="controlNumber" class="block mt-1 w-full h-2/4" type="number" name="controlNumber" :value="old('controlNumber')" required autofocus autocomplete="controlNumber" />
            <x-input-error :messages="$errors->get('controlNumber')" class="mt-2" />
        </div>

        <!-- Career -->
        <div  class="mt-4">
            <x-input-label for="" :value="__('Carerra')" />
            <select id="career" class="block mt-1 w-full h-2/4 border-gray-300 dark:border-gray-700 dark:bg-gray-opacity dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-3xl shadow-sm" type="text" name="career" :value="old('career')" required autofocus autocomplete="career">
            @foreach(DB::table('careers')->get() as $career)
            <option class="border-none" value="{{ $career->id }}">{{ $career->career }}</option>
        @endforeach
        </select>
            <x-input-error :messages="$errors->get('career')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full h-2/4" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full h-2/4"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full h-2/4"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Estas registrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
