<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Apuntes</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/svg+xml" href="favicon.svg" />

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-950{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            @if (Route::has('login'))
                    @auth
                    <div class="dark:bg-gray-900 border-b border-b-gray-800 fixed top-0 left-0 right-0 sm:block w-full text-right">
                    @component('layouts.navigation')
    <!-- Aquí va el contenido del componente -->
@endcomponent
                    @else
                    <div class="dark:bg-gray-900 border-b border-b-gray-800 fixed top-0 left-0 right-0 px-6 py-4 sm:block w-full text-right">
                        <a href="{{ route('login') }}">
                            <x-primary-button class="ml-3">
                {{ __('Iniciar Sesión') }}
            </x-primary-button>
        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                <x-secondary-button class="ml-3">
                {{ __('Registrarse') }}
            </x-secondary-button></a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 p-8 pt-24">
            <div class="flex justify-center items-center pt-8 sm:justify-start sm:pt-0">
            @if (Route::has('login'))
                    @auth
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#106e93" class="w-12 h-12">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
</svg>
@else
<x-application-logo class="ml-3">
            </x-application-logo>
                    @endauth
            
            @endif
    <span class="ml-2 dark:text-white font-bold text-4xl"><h1>Notas de Cornell</h1></span>
</div>

                <div class="mt-8 bg-white dark:bg-cyan-950 overflow-hidden shadow sm:rounded-3xl">

                <!-- Aqui empieza lo que yo hice-->
                <div class="container m-4 mx-auto px-6">
  
    <x-principal-card>
    <x-slot name="title">¿Qué es el método Cornell?</x-slot>
    <x-slot name="content">El método Cornell es un sistema para tomar notas o apuntes creado en la Universidad de Cornell en la década de los 40 pero que se utiliza cada vez más por sus beneficios para el aprendizaje en educación y por sus ventajas para resumir y sintetizar ideas importantes. El método Cornell fue ideado por Walter Paul, doctor en Psicología en esta universidad. El profesor analizó todas las técnicas que utilizaban sus alumnos para repasar y estudiar y todas las fórmulas que ponían en práctica para tomar apuntes. Con toda esta información escribió el libro “Cómo estudiar en la universidad”. </x-slot>
</x-principal-card>

  <div class="mt-8 mb-4 md:-mx-4 md:flex">
  <x-secondary-card>
    <x-slot name="title">¿Cómo tomar notas con el método Cornell?</x-slot>
    <x-slot name="content">Para comenzar con el método Cornell solo necesitas una hoja o libreta y algo para apuntar tus notas. Traza una línea horizontal a pocos centímetros de la parte superior de tu hoja para añadir ahí el título. Después, traza una línea vertical y perpendicular a la primer línea para dividir la hoja en dos mitades. Una de las mitades será más estrecha que la otra. Ahí colocaremos las ideas clave y en la mitad más grande las notas. Por último traza otra línea horizontal, esta vez a pocos centímetros de la parte inferior para añadir ahí el resumen de la reunión. Ahora, empieza a tomar notas.</x-slot>
</x-secondary-card>
<x-secondary-card>
    <x-slot name="title">¿Qué hacemos?</x-slot>
    <x-slot name="content">En esta página buscamos facilitar la realización de notas utilizando el método de Cornell, esto con el fin de tener organizadas todas las notas y además tener la facilidad de realizarlo de manera digital. La toma de notas consiste en anotar las ideas y conectores clave del discurso, de forma que estas notas sirvan de apoyo a la memoria. Esta página además tiene el extra de poder ayudar a recordar eventos relacionados a asignaturas con los recordatorios.</x-slot>
</x-secondary-card>
  </div>
</div>
<!-- Aqui termina lo que yo hice-->

                </div>
            </div>
        </div>
    </body>
</html>
