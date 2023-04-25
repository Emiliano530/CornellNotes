<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Ver recordatorio') }}
      </h2>
    </x-slot>
    <x-container-principal>
        <x-container-secondary>
            @php
                $color = $colors[$reminder->value] ?? 'bg-gray-300';
            @endphp
            <div class="grid grid-cols-12 bg-gray-900 rounded-3xl text-white">
                <div class="col-span-8 border-transparent border-b-black border-r-black border-2 w-auto p-2 ">
                    <p class="break-words text-xl h-11 flex items-center justify-center">{{ $reminder->title }}</p>
                </div>
                  <div class="col-span-4 border-transparent {{$color}} rounded-tr-3xl border-b-black border-2 w-auto p-2">
                    <p class="break-words text-xl h-11 flex items-center justify-center">{{ $reminder->value }}</p>
                  </div>
                  <div class="col-span-12 border-transparent bg-gray-600 border-b-black border-2 w-auto p-2">
                    <p class="break-words text-xl h-44 py-1">{{ $reminder->content }}</p>
                  </div>
                  <div class="col-span-12 text-center h-22 border border-transparent w-auto p-5">
                    <label class="break-words text-xl">Fecha y hora del evento:</label><br>
                    <label class="break-words text-xl mx-5">{{ $date }}</label>
                    <label class="break-words text-xl mx-5">{{ $time }}</label>
                  </div>
        </x-container-secondary>
        <div  class="m-2 text-center">          
          <div class="inline-flex items-center mb-2 mt-4">
              <a href="{{ url('/reminders/' . $reminder->id . '/edit') }}">
                  <x-secondary-button>
                      Editar
                  </x-secondary-button>
              </a>
          </div>
      </div>
    </x-container-principal>
</x-app-layout>