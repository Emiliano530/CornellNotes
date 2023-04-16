<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notas') }}
        </h2>
    </x-slot>

    <x-container-principal>
        <x-container-secondary>
            <x-container-header>
                <x-slot name="col1">
                    <form action="{{ route('notes.index') }}" method="GET">
                        <div class="form-group">
                            <input type="text" class="w-full bg-gray-700 text-white placeholder-gray-400 rounded-3xl border-2 outline-none focus:border-green-500 border-transparent" name="search" value="{{ $search ?? '' }}" placeholder="Buscar notas..." autocomplete="off">
                        </div>
                        <x-primary-button>
                            <x-slot name="class">
                                m-2 dark:hover:bg-green-700 dark:bg-green-900 dark:focus:bg-green-900 dark:active:bg-green-900
                            </x-slot>
                            buscar
                        </x-primary-button>
                    </form>
                </x-slot>
            </x-container-header>
            
            <x-table>
                <x-slot name="header">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Titulo</th>
                    <th class="py-3 px-6 text-center">Palabras clave</th>
                    <th class="py-3 px-6 text-center">Tema</th>
                    <th class="py-3 px-6 text-center">Asignatura</th>
                    <th class="py-3 px-6 text-center">Acciones</th>
                </x-slot>
                <x-slot name="body">
                    @foreach($notes as $item)
                        <tr class="border-b border-cyan-200 hover:bg-cyan-100 hover:rounded-3xl">
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{ $item->title }}</td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{ $item->keyWords }}</td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{ $item->topics->topic }}</td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{ $item->topics->subjects->subject}}</td>

                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <div class="flex item-center justify-center">
                                    <a href="{{ url('/notes/' . $item->id) }}" title="View Note">
                                        <div class="w-4 mr-2 transform hover:text-green-600 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="{{ url('/notes/' . $item->id . '/edit') }}" title="View Note">
                                        <div class="w-4 mr-2 transform hover:text-purple-600 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>                                              
                                        </div>
                                    </a>
                                    <x-delete-button-icon>
                                        <x-slot name="url">{{ url('/notes' . '/' . $item->id) }}</x-slot>
                                        <div class="w-4 mr-2 transform hover:text-red-600 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </div>
                                    </x-delete-button-icon>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </x-container-secondary>
    </x-container-principal>
    <x-floating-button>
            <x-slot name="url">/notes/create</x-slot>
            <x-slot name="icon">
                <svg  fill="none" viewBox="0 0 24 24" stroke="white">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                </svg>
            </x-slot>
            Nuevo
    </x-floating-button>
</x-app-layout>