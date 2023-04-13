@extends('reminders.layout')
@section('content')
<div class="card">
  <div class="card-header">reminders Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Titulo : {{ $reminder->title }}</h5>
        <p class="card-text">Contenido : {{ $reminder->content }}</p>
        <p class="card-text">Importancia : {{ $reminder->value }}</p>
        <p class="card-text">Fecha de evento : {{ $reminder->event_date }}</p>
        <p class="card-text">Tema: {{ $reminder->topics->topic }}</p>
        <p class="card-text">Asignatura : {{ $reminder->topics->subjects->subject }}</p>
        
  </div>
  </div>
</div>
@endsection