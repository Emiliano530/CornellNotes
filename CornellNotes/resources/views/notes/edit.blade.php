<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear nota') }}
        </h2>
    </x-slot>
    <form action="{{ url('notes/' .$note->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
    <x-container-principal>
        <x-container-secondary class="bg-white bg-opacity-100">
            <div class="grid grid-cols-12 bg-zinc-50 rounded-3xl">
                <div class="col-span-8 border-transparent border-b-black border-r-black border-2 w-auto p-2 ">
                    <textarea type="text" name="title" id="title"  value="{{ old('title') }}"
                    class="form-control autoresize w-full min-h-10 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black align-middle" placeholder="Titulo">{{$note->title}}</textarea>
                    @error('title')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="col-span-4 border-transparent border-b-black border-2 w-auto p-2">
                    <textarea type="text" name="topic" id="topic"  value="{{ old('topic') }}"
                    class="form-control autoresize w-full min-h-10 h-10 resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Tema">{{$note->topics->topic}}</textarea>
                    @error('topic')
                        <br>
                        <small class="text-red-900">{{ $message }}</small><br>
                    @enderror
                    @auth
                        <label>{{auth()->user()->name}} {{auth()->user()->lastName}}</label></br>
                    @endauth
                    <label>{{date("d/m/Y")}}</label></br>
                  </div>
                  <div class="col-span-3 border-transparent border-b-black border-r-black border-2 w-auto p-2">
                    <textarea type="text" name="keyWords" id="keyWords"  value="{{ old('keyWords') }}"
                    class="form-control autoresize w-full min-h-10 h-96 resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Palabras clave">{{$note->keyWords}}</textarea>
                    @error('keyWords')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                </div>
                  <div class="col-span-9 border-transparent border-b-black border-2 w-auto p-2">
                    <textarea type="text" name="content" id="content"  value="{{ old('content') }}"
                    class="form-control autoresize w-full min-h-10 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Notas">{{$note->content}}</textarea>
                    @error('content')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                </div>
                    
                  <div class="col-span-12 border border-transparent w-auto p-2">
                    <textarea type="text" name="summary" id="summary"  value="{{ old('summary') }}"
                    class="form-control autoresize w-full min-h-10 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Resumen">{{$note->summary}}</textarea>
                    @error('summary')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                </div>
        </x-container-secondary>
    </x-container-principal>
        <div  class="m-4 text-center">
            <label for="subject" class="text-white">Asignatura:</label>
            <select id="subject" class="form-control block mt-1 w-1/4 h-2/4 ml-auto mr-auto text-center border-gray-300 dark:border-gray-700 dark:bg-gray-opacity dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-3xl shadow-sm" type="text" name="subject" :value="old('subject')" required autofocus autocomplete="subject">
                @foreach($subjects as $subjectId => $subjectName)
                    <option value="{{ $subjectId }}">{{ $subjectName }}</option>
                @endforeach
            </select>
            <input type="submit" value="Actualizar" class="btn btn-success hover:cursor-pointer m-2 inline-flex items-center px-4 py-2 bg-white dark:bg-black border border-gray-300 dark:border-gray-500 rounded-3xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
        </div>
    </form>
</x-app-layout>

<script>
    const autoresizeTextareas = document.querySelectorAll('.autoresize');
  
    autoresizeTextareas.forEach(function(textarea) {
        const minHeight = textarea.clientHeight;
        textarea.style.height = minHeight + 'px';

        textarea.addEventListener('input', function() {
            if (this.scrollHeight > minHeight) {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight + 2) + 'px';
            } else {
                this.style.height = minHeight + 'px';
            }
        });

        textarea.addEventListener('keydown', function(e) {
            if ((e.key === 'Backspace' || e.key === 'Delete') && this.scrollHeight <= this.offsetHeight) {
                this.style.height = minHeight + 'px';
            }
        });

        textarea.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.style.height = minHeight + 'px';
            } else {
                const lines = this.value.split('\n').length;
                if (lines === 1 && this.scrollHeight <= minHeight) {
                    this.style.height = minHeight + 'px';
                }
            }
        });
    });
</script>
