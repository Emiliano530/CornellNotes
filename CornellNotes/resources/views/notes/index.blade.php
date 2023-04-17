<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notas') }}
        </h2>
    </x-slot>

    <x-container-principal>
        <x-container-secondary>
            <x-container-header class="pb-4">
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
            <x-container-header class="pt-0">
                <x-slot name="col1">
                    <p class="text-white">Aqui estan todas tus notas</p>
                    <p class="text-gray-300 text-sm">tienes <span class="text-green-500">{{count($notes)}}</span> nota{{ count($notes) !== 1 ? 's' : '' }}</p>
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
                            {{ $key === (count($notes) - 1) && count($noters) > 1 ? 'rounded-r-3xl' : '' }}
                            bg-green-700">
                                <x-header-card-data>
                                    <x-slot name="col1">
                                        <h1 class="text-lg text-white uppercase">#{{$loop->iteration}}</h1>
                                    </x-slot>
                                    <x-slot name="col2">
                                        <x-delete-button-icon>
                                            <x-slot name="url">{{ url('/notes' . '/' . $note->id) }}</x-slot>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 stroke-white group-hover:stroke-cyan-400 group-hover:hover:stroke-red-500 stroke-2" className="w-6 h-6 ">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </x-delete-button-icon>
                                    </x-slot>
                                </x-header-card-data>
                                <x-content-card-data class="group-hover:text-cyan-400 ">
                                    <x-slot name="title">{{ $note->title }}</x-slot>
                                    <x-slot name="content">{{ $note->content }}</x-slot>
                                </x-content-card-data>
                                <x-link-arrow-animation class="group-hover:text-cyan-400">
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
                    </div>
                @endif
            </x-container-content>
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