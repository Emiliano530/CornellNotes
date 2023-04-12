@extends('notes.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Notes Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Titulo : {{ $note->title }}</h5>
        <p class="card-text">Contenido : {{ $note->content }}</p>
        <p class="card-text">Palabras clave : {{ $note->keyWords }}</p>
        <p class="card-text">Resumen : {{ $note->summary }}</p>
        <p class="card-text">Asignatura : {{ $note->subjects->subject }}</p>

  </div>
       
    </hr>
  
  </div>
</div>