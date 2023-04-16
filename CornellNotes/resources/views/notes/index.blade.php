<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-cyan-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Aqui empieza lo diferente del dashboard -->
                <div class="container">
        <div class="row">

        <form action="{{ route('notes.index') }}" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" name="search" value="{{ $search ?? '' }}" placeholder="Buscar notas..." autocomplete="off">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Contenido</th>
                                        <th>Palabras clave</th>
                                        <th>Resumen</th>
                                        <th>Tema</th>
                                        <th>Asignatura</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($notes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->keyWords }}</td>
                                        <td>{{ $item->summary }}</td>
                                        <td>{{ $item->topics->topic }}</td>
                                        <td>{{ $item->topics->subjects->subject}}</td>
 
                                        <td>
                                            <a href="{{ url('/notes/' . $item->id) }}" title="View Note"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/notes/' . $item->id . '/edit') }}" title="Edit Note"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/notes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Note" onclick="return confirm(&quot;¿Estás seguro? Se eliminará definitivamente&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                        <x-floating-button>
                                <x-slot name="url">/notes/create</x-slot>
                                <x-slot name="icon">
                                    <svg  fill="none" viewBox="0 0 24 24" stroke="white">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                                    </svg>
                                </x-slot>
                                Nuevo
                        </x-floating-button>
                       
                        <svg class="w-6 h-6 text-white group-hover:inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
      </svg>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Aqui termina lo diferente del dashboard -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>