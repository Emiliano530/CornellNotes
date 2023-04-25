<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notas') }}
        </h2>
    </x-slot>
    <x-success-alert/>
    <x-error-alert/>
    <x-container-principal>
        <a href="{{ url('/reminders/create') }}">
            <div class="text-left">
                <x-primary-button class="dark:hover:bg-green-700 dark:bg-green-900 dark:focus:bg-green-900 dark:active:bg-green-900">
                    Nuevo
                </x-primary-button>
            </div>
        </a>
        <x-container-secondary>
            <x-container-header class="pb-4">
                <x-slot name="col1">
                    <form action="{{ route('reminders.index') }}" method="GET">
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
            <x-container-header class="pt-0">
                <x-slot name="col1">
                    @if (isset($search))
                        <p class="text-white">Estos son los resultados</p>
                        <p class="text-gray-300 text-sm">hay <span class="text-green-500">{{count($reminders)}}</span> coincidencia{{ count($reminders) !== 1 ? 's' : '' }}</p>
                    @else
                        <p class="text-white">Aqui estan todos tus recordatorios</p>
                        <p class="text-gray-300 text-sm">tienes <span class="text-green-500">{{count($reminders)}}</span> recordatorio{{ count($reminders) !== 1 ? 's' : '' }}</p>
                    @endif
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
                            No hay notas que mostrar
                        </h2>
                    </div>
                @endif
            </x-container-content>
        </x-container-secondary>
    </x-container-principal>
    <x-floating-button>
            <x-slot name="url">/reminders/create</x-slot>
            <x-slot name="icon">
                <x-plus-icon/>
            </x-slot>
            Nuevo
    </x-floating-button>
</x-app-layout>