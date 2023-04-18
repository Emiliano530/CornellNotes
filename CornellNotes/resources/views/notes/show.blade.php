<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear nota') }}
        </h2>
    </x-slot>

    <x-container-principal>
        <x-container-secondary class="bg-white bg-opacity-100">
            <div class="grid grid-cols-12 bg-zinc-50 rounded-3xl">
                <div class="col-span-8 border-transparent border-b-black border-r-black border-2 w-auto p-2 ">
                    <textarea type="text" name="title" id="title"  value="{{ old('title') }}"
                    class="form-control autoresize w-full min-h-10 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black align-middle" placeholder="Titulo" disabled>{{ $note->title }}</textarea>
                    @error('title')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="col-span-4 border-transparent border-b-black border-2 w-auto p-2">
                    <textarea type="text" name="topic" id="topic"  value="{{ old('topic') }}"
                    class="form-control autoresize w-full min-h-10 h-10 resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Tema" disabled>{{ $note->topics->topic }}</textarea>
                    @error('tema')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                    @auth
                        <label>{{auth()->user()->name}} {{auth()->user()->lastName}}</label></br>
                    @endauth
                    <label>{{ $note->creation_date }}</label></br>
                  </div>
                  <div class="col-span-3 border-transparent border-b-black border-r-black border-2 w-auto p-2">
                    <textarea type="text" name="keyWords" id="keyWords"  value="{{ old('keyWords') }}"
                    class="form-control autoresize w-full min-h-10 h-96 resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Palabras clave" disabled>{{ $note->keyWords }}</textarea>
                  </div>
                  <div class="col-span-9 border-transparent border-b-black border-2 w-auto p-2">
                    <textarea type="text" name="content" id="content"  value="{{ old('content') }}"
                    class="form-control autoresize w-full min-h-10 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Notas" disabled>{{ $note->content }}</textarea>
                  </div>
                  <div class="col-span-12 border border-transparent w-auto p-2">
                    <textarea type="text" name="summary" id="summary"  value="{{ old('summary') }}"
                    class="form-control autoresize w-full min-h-10 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Resumen" disabled>{{ $note->summary }}</textarea>
                  </div>
        </x-container-secondary>
    </x-container-principal>
        <div  class="m-4 text-center">
            <label for="subject" class="text-white">Asignatura:</label><br>
            <input type="text" name="subject" id="subject"  value="{{ $note->topics->subjects->subject }}"
                    class="form-control bg-white rounded-3xl text-center mb-4" disabled><br>
                    
            <a href="{{ url('/notes/' . $note->id . '/edit') }}">
                <x-secondary-button>
                    Editar
                </x-secondary-button>
            </a>
            <x-delete-button-icon>
                <x-slot name="url">{{ url('/notes' . '/' . $note->id) }}</x-slot>
                <button class="hover:cursor-pointer m-2 inline-flex items-center px-4 py-2 bg-white dark:bg-red-700 border border-gray-300 dark:border-gray-500 rounded-3xl font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm(&quot;¿Estás seguro? Se eliminará definitivamente&quot;)">Eliminar</button>
            </x-delete-button-icon>
        </div>
</x-app-layout>

