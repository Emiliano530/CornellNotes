<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="card">
                  <!-- Aqui empieza lo diferente del dashboard -->
                  <div class="card">
  <div class="card-header">reminders Page</div>
  <div class="card-body">
      
      <form action="{{ url('reminders') }}" method="post">
        {!! csrf_field() !!}
        <label>Titulo</label></br>
        <input type="text" name="title" id="title" class="form-control">
        @error('title')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Contenido</label></br>
        <input type="text" name="content" id="content" class="form-control">
        @error('content')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Importancia</label></br>
        <select id="value" class="block mt-1 w-full h-2/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="number" name="value" :value="old('value')" required autofocus autocomplete="value">
        <option value="1">Muy importante</option>
        <option value="2">Importante</option>
        <option value="3">Regular</option>
        <option value="4">No importante</option>
        </select>
        <label>Fecha de evento</label></br>
        <input type="date" name="event_date" id="event_date" class="form-control">
        @error('event_date')
            <br>
            <small class="text-red-900">{{ $message }}</small>
        @enderror
        </br>
        <label>Tema</label></br>
        <input type="text" name="topic" id="topic" class="form-control">
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
