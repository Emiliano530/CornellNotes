@extends('notes.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Notes Page</div>
  <div class="card-body">
      
      <form action="{{ url('note') }}" method="post">
        {!! csrf_field() !!}
        <label>Titulo</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <label>Contenido</label></br>
        <input type="text" name="content" id="content" class="form-control"></br>
        <label>Palabras clave</label></br>
        <input type="text" name="keyWords" id="keyWords" class="form-control"></br>
        <label>Resumen</label></br>
        <input type="text" name="summary" id="summary" class="form-control"></br>

<select id="subject" class="block mt-1 w-full h-2/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="subject" :value="old('subject')" required autofocus autocomplete="subject">
    @foreach($subjects as $subjectId => $subjectName)
        <option value="{{ $subjectId }}">{{ $subjectName }}</option>
    @endforeach
</select>
        <input type="submit" value="Save" class="mt-4 btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop