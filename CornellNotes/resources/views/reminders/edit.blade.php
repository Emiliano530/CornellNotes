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
                $color = $colors[$reminder->value] ?? 'bg-gray-300';
            @endphp
            <div class="grid grid-cols-12 bg-gray-900 rounded-3xl text-white">
                <div class="col-span-8 border-transparent border-b-black border-r-black border-2 w-auto p-2 ">
                    <textarea type="text" name="title" id="title"  value="{{ old('title') }}" rows="1" maxlength="220"
                    class="form-control flex items-center justify-center autoresize w-full min-h-2 h-full resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-2 bg-transparent placeholder-white align-middle" placeholder="Titulo">{{$reminder->title}}</textarea>
                    @error('title')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                  <div id="Importancia" class="col-span-4 {{$color}} border-transparent rounded-tr-3xl border-b-black border-2 w-auto p-1">
                    <select id="value"class="flex items-center text-center justify-center {{$color}} text-xl m-0 w-full h-full border-gray-300 dark:border-none dark:text-white focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-3xl shadow-sm" type="number" name="value" :value="old('value')" autocomplete="value">
                        <option value="1" data-color="bg-red-600" <?php if ($reminder->value == 'Muy importante') { echo ' selected'; } ?>>Muy importante</option>
                        <option value="2" data-color="bg-orange-600" <?php if ($reminder->value == 'Importante') { echo ' selected'; } ?>>Importante</option>
                        <option value="3" data-color="bg-yellow-600" <?php if ($reminder->value == 'Regular') { echo ' selected'; } ?>>Regular</option>
                        <option value="4" data-color="bg-green-600" <?php if ($reminder->value == 'No importante') { echo ' selected'; } ?>>No importante</option>
                    </select>
                  </div>
                  <div class="col-span-12 border-transparent bg-gray-600 border-b-black border-2 w-auto p-2">
                    <textarea type="text" name="content" id="content"  value="{{ old('content') }}" maxlength="700"
                    class="form-control flex items-center justify-center autoresize w-full min-h-10 h-44 resize-none border text-xl text-center border-none rounded-3xl px-2 r-2 py-1 bg-transparent placeholder-white" placeholder="Contenido">{{$reminder->content}}</textarea>
                    @error('content')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="col-span-6 text-black text-right border border-transparent w-auto p-2">
                    <input class="text-xl h-20 rounded-3xl bg-cyan-600 text-white" type="date" id="date" name="date" value="{{ $date }}">
                  </div>
                  <div class="col-span-6 text-black text-left border border-transparent w-auto p-2">
                    <input class="text-xl h-20 rounded-3xl bg-cyan-600 text-white" type="time" id="time" name="time" value="{{ $time }}">
                  </div>
        </x-container-secondary>
        <div  class="m-4 text-center"> 
            <input type="submit" value="Actualizar" class="btn btn-success hover:cursor-pointer m-2 inline-flex items-center px-4 py-2 bg-white dark:bg-black border border-gray-300 dark:border-gray-500 rounded-3xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
    <a href="{{ url('/reminders/' . $reminder->id) }}">
        <x-secondary-button>
            Cancelar
        </x-secondary-button>
    </a>
    </x-container-principal>
        </div>
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

    const selectElement = document.querySelector('#value');
  const containerElement = document.querySelector('#Importancia');

  selectElement.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const selectedColor = selectedOption.dataset.color || 'bg-green-600';

    containerElement.classList.remove('bg-red-600', 'bg-orange-600', 'bg-yellow-600', 'bg-green-600');
    containerElement.classList.add(selectedColor);
    this.classList.remove('bg-red-600', 'bg-orange-600', 'bg-yellow-600', 'bg-green-600');
    this.classList.add(selectedColor);
  });
  
</script>

