<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="card">
                  <!-- Aqui empieza lo diferente del dashboard -->
                  <div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('notes/' .$note->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$note->id}}" id="id" />
        <label>Titulo</label></br>
        <input type="text" name="title" id="title" value="{{$note->title}}" class="form-control"></br>
        <label>Contenido</label></br>
        <input type="text" name="content" id="content" value="{{$note->content}}" class="form-control"></br>
        <label>Palabras clave</label></br>
        <input type="text" name="keyWords" id="keyWords" value="{{$note->keyWords}}" class="form-control"></br>
        <label>Resumen</label></br>
        <input type="text" name="summary" id="summary" value="{{$note->summary}}" class="form-control"></br>
        <label>Tema</label></br>
        <input type="text" name="topic" id="topic" value="{{$note->topics->topic}}" class="form-control"></br>
        <label>Asignatura</label></br>
<select id="subject" class="block mt-1 w-full h-2/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="subject" :value="old('subject')" required autofocus autocomplete="subject">
    @foreach($subjects as $subjectId => $subjectName)
        <option value="{{ $subjectId }}">{{ $subjectName }}</option>
    @endforeach
</select>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
<!-- Aqui termina lo diferente del dashboard -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>