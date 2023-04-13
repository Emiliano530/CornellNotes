@extends('reminders.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('reminders/' .$reminder->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$reminder->id}}" id="id" />
        <label>Titulo</label></br>
        <input type="text" name="title" id="title" value="{{$reminder->title}}" class="form-control"></br>
        <label>Contenido</label></br>
        <input type="text" name="content" id="content" value="{{$reminder->content}}" class="form-control"></br>
        <label>Importancia</label></br>
        <select id="value" value="{{$reminder->value}}" class="block mt-1 w-full h-2/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="number" name="value" :value="old('value')" required autofocus autocomplete="value">
        <option value="1">Muy importante</option>
        <option value="2">Importante</option>
        <option value="3">Regular</option>
        <option value="4">No importante</option>
        </select>
        <label>Fecha de evento</label></br>
        <input type="date" name="event_date" id="event_date" value="{{$reminder->event_date}}" class="form-control"></br>
        <label>Tema</label></br>
        <input type="text" name="topic" id="topic" value="{{$reminder->topics->topic}}" class="form-control"></br>
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
@endsection