<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Ver recordatorio') }}
      </h2>
    </x-slot>
    <x-container-principal>
        <x-container-secondary>
            @php
                $color = $colors[$reminder->value] ?? 'bg-green-500';
            @endphp
            <div class="grid grid-cols-12 bg-gray-900 rounded-3xl text-white">
                <div class="col-span-8 border-transparent border-b-black border-r-black border-2 w-auto p-2 ">
                    <p class="break-words text-xl">{{ $reminder->title }}</p>
                </div>
                  <div class="col-span-4 border-transparent {{$color}} rounded-tr-3xl border-b-black border-2 w-auto p-2">
                    <p class="break-words text-xl">{{ $reminder->value }}</p>
                  </div>
                  <div class="col-span-12 border-transparent bg-gray-600 border-b-black border-2 w-auto p-2">
                    <p class="break-words text-xl h-48">{{ $reminder->content }}</p>
                  </div>
                  <div class="col-span-6 text-right border border-transparent w-auto p-2">
                    <p class="break-words text-xl h-20">{{ $date }}</p>
                  </div>
                  <div class="col-span-6 text-left border border-transparent w-auto p-2">
                    <p class="break-words text-xl h-20">{{ $time }}</p>
                  </div>
        </x-container-secondary>
        <div  class="m-4 text-center">          
          <div class="inline-flex items-center">
              <a href="{{ url('/reminders/' . $reminder->id . '/edit') }}">
                  <x-secondary-button>
                      Editar
                  </x-secondary-button>
              </a>
              <x-delete-button-icon>
                  <x-slot name="url">{{ url('/reminders' . '/' . $reminder->id) }}</x-slot>
                  <button class="hover:cursor-pointer px-4 py-2 m-2 bg-white dark:bg-red-700 border border-gray-300 dark:border-gray-500 rounded-3xl font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm(&quot;¿Estás seguro? Se eliminará definitivamente&quot;)">Eliminar</button>
              </x-delete-button-icon>
          </div>
      </div>
    </x-container-principal>
</x-app-layout>