<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apuntes y Recordatorios') }}
        </h2>
    </x-slot>
    
    <x-success-alert/>
    <x-error-alert/>
    <!-- Aqui empieza lo diferente del dashboard -->
    <x-container-principal>

        <!-- NOTAS -->
        <x-container-secondary>
            <x-container-header>
                <x-slot name="col1">
                    <span class="text-2xl font-semibold text-white">Tus Notas</span>
                </x-slot>
                <x-slot name="col2">
                    <x-link-arrow>
                        <x-slot name="url">{{ url('/notes') }}</x-slot>
                        Ver todas
                    </x-link-arrow>
                </x-slot>
            </x-container-header>
            <x-container-content>
                @if((count($notes) >0))
                    @foreach($notes as $key => $note)
                        <x-card-data class="
                        {{ $key === 0 && count($notes) === 1 ? 'rounded-3xl' : '' }}
                        {{ $key % 5 === 0 ? 'rounded-l-3xl border-none' : '' }}
                        {{ ($key + 1) % 5 === 0 ? 'rounded-r-3xl' : '' }}
                        {{ $key % 5 === 0 ? 'rounded-tl-3xl rounded-bl-3xl' : '' }}
                        {{ ($key + 1) % 5 === 0 ? 'rounded-tr-3xl rounded-br-3xl' : '' }}
                        {{ $key === (count($notes) - 1) && count($notes) > 1 ? 'rounded-r-3xl' : '' }}
                        bg-green-700">
                            <x-header-card-data>
                                <x-slot name="col1">
                                    <h1 class="text-lg text-white uppercase group-hover:text-cyan-200">#{{$loop->iteration}}</h1>
                                </x-slot>
                                <x-slot name="col2">
                                    <x-delete-button-icon>
                                        <x-slot name="url">{{ url('/notes' . '/' . $note->id) }}</x-slot>
                                        <x-delete-icon class="group-hover:stroke-cyan-200 "/>
                                    </x-delete-button-icon>
                                </x-slot>
                            </x-header-card-data>
                            <x-content-card-data class="group-hover:text-cyan-200 ">
                                <x-slot name="title">{{ $note->title }}</x-slot>
                                <x-slot name="content">{{ $note->content }}</x-slot>
                            </x-content-card-data>
                            <x-link-arrow-animation class="group-hover:text-cyan-200">
                                <x-slot name="url">{{ url('/notes/' . $note->id) }}</x-slot>
                                Ver Nota
                            </x-link-arrow-animation>
                        </x-card-data>
                    @endforeach  
                @else
                    <div class="col-span-full text-center mb-24 mt-10 text-cyan-500">
                        <h2>
                            No hay notas que mostrar
                        </h2>
                        <br>
                        <a href="{{ url('/notes/create') }}">
                            <x-primary-button class="dark:hover:bg-green-700 dark:bg-green-900 dark:focus:bg-green-900 dark:active:bg-green-900">
                                Agregemos una
                            </x-primary-button>
                        </a>
                    </div>
                @endif
            </x-container-content>
        </x-container-secondary>

        <!-- Recordatorios -->
        <x-container-secondary>
            <x-container-header>
                <x-slot name="col1">
                    <span class="text-2xl font-semibold text-white">Tus Recordatorios</span>
                </x-slot>
                <x-slot name="col2">
                    <x-link-arrow>
                        <x-slot name="url">{{ url('/reminders') }}</x-slot>
                        Ver todas
                    </x-link-arrow>
                </x-slot>
            </x-container-header>
            <x-container-content>
                @if((count($reminders) >0))
                    @foreach($reminders as $key => $reminder)
                    @php
                        $color = $colors[$reminder->value] ?? 'bg-green-500';
                    @endphp
                        <x-card-data class="
                        {{ $key === 0 && count($reminders) === 1 ? 'rounded-3xl' : '' }}
                        {{ $key % 5 === 0 ? 'rounded-l-3xl border-none' : '' }}
                        {{ ($key + 1) % 5 === 0 ? 'rounded-r-3xl' : '' }}
                        {{ $key % 5 === 0 ? 'rounded-tl-3xl rounded-bl-3xl' : '' }}
                        {{ ($key + 1) % 5 === 0 ? 'rounded-tr-3xl rounded-br-3xl' : '' }}
                        {{ $key === (count($reminders) - 1) && count($reminders) > 1 ? 'rounded-r-3xl' : '' }}
                        {{$color}}">
                            <x-header-card-data>
                                <x-slot name="col1">
                                    <h1 class="text-lg text-white uppercase group-hover:text-lime-200">#{{$loop->iteration}}</h1>
                                </x-slot>
                                <x-slot name="col2">
                                    <x-delete-button-icon>
                                        <x-slot name="url">{{ url('/reminders' . '/' . $reminder->id) }}</x-slot>
                                        <x-delete-icon class="group-hover:stroke-lime-200"/>
                                    </x-delete-button-icon>
                                </x-slot>
                            </x-header-card-data>
                            <x-content-card-data class="group-hover:text-lime-200">
                                <x-slot name="title">{{ \Carbon\Carbon::parse($reminder->event_date)->format('d') }}</x-slot>
                                <x-slot name="content">{{ $meses[\Carbon\Carbon::parse($reminder->event_date)->month - 1] }}</x-slot>
                            </x-content-card-data>
                            <x-link-arrow-animation class="group-hover:text-lime-200">
                                <x-slot name="url">{{ url('/reminders/' . $reminder->id) }}</x-slot>
                                Ver Recordatorio
                            </x-link-arrow-animation>
                        </x-card-data>
                    @endforeach
                @else
                    <div class="col-span-full text-center mb-24 mt-10 text-cyan-500">
                        <h2>
                            No hay recordatorios que mostrar
                        </h2>
                        <br>
                        <a href="{{ url('/reminders/create') }}">
                            <x-primary-button class="dark:hover:bg-green-700 dark:bg-green-900 dark:focus:bg-green-900 dark:active:bg-green-900">
                                Agregemos uno
                            </x-primary-button>
                        </a>
                    </div>
                @endif    
            </x-container-content>
            </x-container-secondary>
        </x-container-principal>
        <x-floating-button>
            <x-slot name="event">onclick=openModal()</x-slot>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-slot>
            Nuevo
        </x-floating-button>
        <x-simple-modal>
            <x-slot name="header">¿Qué quieres crear?</x-slot>
            <x-slot name="body">
                <x-list-card>
                    <x-slot name="url">
                                /notes/create
                    </x-slot>
                    <x-slot name="col1">
                                Notas
                    </x-slot>
                </x-list-card>
                <x-list-card>
                    <x-slot name="url">
                                /reminders/create
                    </x-slot>
                    <x-slot name="col1">
                                Recordatorios
                    </x-slot>
                </x-list-card>
            </x-slot>
            <x-slot name="cancel">Cancelar</x-slot>
        </x-simple-modal>
    </x-app-layout>



