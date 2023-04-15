<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apuntes y Recordatorios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-3xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Aqui empieza lo diferente del dashboard -->

                    <!-- NOTAS -->
                    <div class="container p-0 bg-gray-700 rounded-3xl">
                    <div class="flex justify-between p-8">
    <span class="text-left">Tus Notas</span>
    <span class="text-right"><a href="{{ url('/notes') }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
Ver todas
<svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</a></span>
</div>
<div class="mt-0 p-4 pt-0 grid divide-x divide-y rounded-3xl overflow-hidden sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-5">
@if((count($notes) >0))
@foreach($notes as $key => $note)
            <div class="relative group bg-white border transition hover:z-[1] hover:shadow-2xl {{ $key === 0 ? ' rounded-l-3xl' : '' }}{{ $key === (count($notes) - 1) ? ' rounded-r-3xl' : '' }}">
                <div class="relative p-8 space-y-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#008B8B" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
</svg>    
                    <div class="space-y-2">
                        <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">{{ $note->title }}</h5>
                        <p class="text-sm text-gray-600">{{ $note->content }}</p>
                    </div>
                    <a href="{{ url('/notes/' . $note->id) }}" class="flex justify-between items-center group-hover:text-yellow-600">
                        <span class="text-sm">Read more</span>
                        <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                    </a>
                </div>
            </div>
            @endforeach  
            
        @else
        <p>No hay notas que mostrar</p>
@endif  
</div>

                    </div>
<!-- Recordatorios -->
                    <div class="container p-0 mt-6 bg-gray-700 rounded-3xl">
                    <div class="flex justify-between p-8">
    <span class="text-left">Tus Recordatorios</span>
    <span class="text-right"><a href="{{ url('/reminders') }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
Ver todas
<svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</a></span>
</div>
<div class="mt-0 p-4 pt-0 grid divide-x divide-y rounded-3xl overflow-hidden sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-5">
@foreach($reminders as $key => $reminder)
            <div class="relative group bg-white border transition hover:z-[1] hover:shadow-2xl {{ $key === 0 ? ' rounded-l-3xl' : '' }}{{ $key === (count($notes) - 1) ? ' rounded-r-3xl' : '' }}">
                <div class="relative p-8 space-y-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" stroke="#008B8B">
  <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
  <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
</svg>

                    <div class="space-y-2">
                        <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">{{ $reminder->title }}</h5>
                        <p class="text-sm text-gray-600">{{ $reminder->content }}</p>
                    </div>
                    <a href="{{ url('/reminders/' . $reminder->id) }}" class="flex justify-between items-center group-hover:text-yellow-600">
                        <span class="text-sm">Read more</span>
                        <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                    </a>
                </div>
            </div>
            @endforeach     
</div>

                    </div>

                    

                    <!-- Aqui termina lo diferente del dashboard -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
