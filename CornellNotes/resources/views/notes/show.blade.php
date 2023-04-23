<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ver nota') }}
        </h2>
    </x-slot>

    <x-container-principal>
        @if($note->updates!=NULL)
            <select id="subject" class="form-control block mt-1 w-1/4 h-2/4 ml-auto mr-auto text-center border-gray-300 dark:border-gray-700 dark:bg-gray-opacity dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-3xl shadow-sm" type="text" name="subject" :value="old('subject')" required autofocus autocomplete="subject">
                <option value="#">Fecha de modificacion</option>
                @foreach ($updates as $update)
                <option value="#" disabled class="disabled:text-gray-200">{{ $update }}</option>
                @endforeach
            </select>
        @endif
        <x-container-secondary>
            <div class="grid grid-cols-12 bg-zinc-50 rounded-3xl">
                <div class="col-span-8 border-transparent border-b-black border-r-black border-2 w-auto p-2 ">
                    <p class="break-words text-xl">{{ $note->title }}</p>
                </div>
                  <div class="col-span-4 border-transparent border-b-black border-2 w-auto p-2">
                    <p class="break-words text-xl">{{ $note->topics->topic }}</p>
                    @auth
                        <label>{{auth()->user()->name}} {{auth()->user()->lastName}}</label></br>
                    @endauth
                    <label>{{ $note->creation_date }}</label></br>
                  </div>
                  <div class="col-span-3 border-transparent border-b-black border-r-black border-2 w-auto p-2">
                    <p class="break-words text-xl h-96">{{ $note->keyWords }}</p>
                  </div>
                  <div class="col-span-9 border-transparent border-b-black border-2 w-auto p-2">
                    <p class="break-words text-xl h-96">{{ $note->content }}</p>
                  </div>
                  <div class="col-span-12 border border-transparent w-auto p-2">
                    <p class="break-words text-xl h-20">{{ $note->summary }}</p>
                  </div>
        </x-container-secondary>
        <div  class="m-4 text-center">
            <label for="subject" class="text-white text-lg">Asignatura:</label><br>
            <input type="text" name="subject" id="subject"  value="{{ $note->topics->subjects->subject }}"
                    class="form-control bg-white rounded-3xl text-center mb-4" disabled><br>
                    
            <div class="inline-flex items-center">
                <a href="{{ url('/notes/' . $note->id . '/edit') }}">
                    <x-secondary-button>
                        Editar
                    </x-secondary-button>
                </a>
                <x-delete-button-icon>
                    <x-slot name="url">{{ url('/notes' . '/' . $note->id) }}</x-slot>
                    <button class="hover:cursor-pointer px-4 py-2 m-2 bg-white dark:bg-red-700 border border-gray-300 dark:border-gray-500 rounded-3xl font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm(&quot;¿Estás seguro? Se eliminará definitivamente&quot;)">Eliminar</button>
                </x-delete-button-icon>
            </div>
        </div>
    </x-container-principal>
</x-app-layout>