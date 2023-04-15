<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-3xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="card">
                  <!-- Aqui empieza lo diferente del dashboard -->
                  
                  <div class="card">
  <div class="card-header">Notes Page</div>
  <div class="card-body">
      
      <form action="{{ url('notes') }}" method="post">
        {!! csrf_field() !!}
        <label>Titulo</label></br>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        @error('title')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Contenido</label></br>
        <input type="text" name="content" id="content" class="form-control" value="{{ old('content') }}">
        @error('content')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Palabras clave</label></br>
        <input type="text" name="keyWords" id="keyWords" class="form-control" value="{{ old('keyWords') }}">
        @error('keyWords')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Resumen</label></br>
        <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary') }}">
        @error('summary')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Tema</label></br>
        <input type="text" name="topic" id="topic" class="form-control" value="{{ old('topic') }}">
        @error('topic')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Asignatura</label></br>
<select id="subject" class="block mt-1 w-full h-2/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="subject" :value="old('subject')" required autofocus autocomplete="subject">
    @foreach($subjects as $subjectId => $subjectName)
        <option value="{{ $subjectId }}">{{ $subjectName }}</option>
    @endforeach
</select>
        <input type="submit" value="Save" class="mt-4 btn btn-success"></br>
    </form>
   
  </div>
</div>
<!-- Aqui termina lo diferente del dashboard -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>