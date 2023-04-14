<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="card">
                  <!-- Aqui empieza lo diferente del dashboard -->
  <div class="card-header">Notes Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Titulo : {{ $note->title }}</h5>
        <p class="card-text">Contenido : {{ $note->content }}</p>
        <p class="card-text">Palabras clave : {{ $note->keyWords }}</p>
        <p class="card-text">Resumen : {{ $note->summary }}</p>
        <p class="card-text">Tema: {{ $note->topics->topic }}</p>
        <p class="card-text">Asignatura : {{ $note->topics->subjects->subject }}</p>
        
  </div>
  </div>
</div>
<!-- Aqui termina lo diferente del dashboard -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
