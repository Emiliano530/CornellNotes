<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar recordatorio') }}
        </h2>
    </x-slot>
    <form action="{{ url('reminders/' .$reminder->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
    <x-container-principal>
        <x-container-secondary>
            @php
                $color = $colors[$reminder->value] ?? 'bg-green-500';
            @endphp
            <div class="grid grid-cols-12 bg-gray-900 rounded-3xl text-white">
                <div class="col-span-8 border-transparent border-b-black border-r-black border-2 w-auto p-2 ">
                    <textarea type="text" name="title" id="title"  value="{{ old('title') }}"
                    class="form-control autoresize w-full min-h-10 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black align-middle" placeholder="Titulo">{{$reminder->title}}</textarea>
                    @error('title')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                </div>
                  <div class="col-span-4 border-transparent {{$color}} rounded-tr-3xl border-b-black border-2 w-auto p-2">
                    <select id="value" value="{{$reminder->value}}" class="block mt-1 w-full h-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="number" name="value" :value="old('value')" autocomplete="value">
                        <option value="1">Muy importante</option>
                        <option value="2">Importante</option>
                        <option value="3">Regular</option>
                        <option value="4">No importante</option>
                    </select>
                  </div>
                  <div class="col-span-12 border-transparent bg-gray-600 border-b-black border-2 w-auto p-2">
                    <textarea type="text" name="content" id="content"  value="{{ old('content') }}"
                    class="form-control autoresize w-full min-h-10 h-44 resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-black" placeholder="Recordatorio">{{$reminder->content}}</textarea>
                    @error('content')
                        <br>
                        <small class="text-red-900">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="col-span-6 text-black text-right border border-transparent w-auto p-2">
                    <input type="date" id="date" name="date" value="{{ $date }}">
                  </div>
                  <div class="col-span-6 text-black text-left border border-transparent w-auto p-2">
                    <input type="time" name="time" value="{{ $time }}">
                  </div>
        </x-container-secondary>
        <input type="submit" value="Actualizar" class="btn btn-success hover:cursor-pointer m-2 inline-flex items-center px-4 py-2 bg-white dark:bg-black border border-gray-300 dark:border-gray-500 rounded-3xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
    <a href="{{ url('/reminders/' . $reminder->id) }}">
        <x-secondary-button>
            Cancelar
        </x-secondary-button>
    </a>
    </x-container-principal>
    </form>
</x-app-layout>

<script>
    const autoresizeTextareas = document.querySelectorAll('.autoresize');
  
    autoresizeTextareas.forEach(function(textarea) {
        const minHeight = textarea.clientHeight;
        textarea.style.height = minHeight + 'px';

        setTimeout(() => {
            textarea.dispatchEvent(new Event('input'));
        }, 10);

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

